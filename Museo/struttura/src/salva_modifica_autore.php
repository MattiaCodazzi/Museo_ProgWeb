<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');
require_once("db_config_altervista.php");

$response = ["success" => false, "errors" => []];

// Raccolta dati POST
$codice = $_POST['codice'] ?? null;
$nome = trim($_POST['nome'] ?? '');
$cognome = trim($_POST['cognome'] ?? '');
$dataNascita = $_POST['dataNascita'] ?? null;
$dataMorte = $_POST['dataMorte'] ?? null;
$tipo = $_POST['tipo'] ?? null;

if (!$codice || !is_numeric($codice)) {
    $response["errors"][] = "Codice autore mancante o non valido.";
}
if ($nome === '') {
    $response["errors"][] = "Il nome è obbligatorio.";
}
if ($cognome === '') {
    $response["errors"][] = "Il cognome è obbligatorio.";
}
if (!in_array($tipo, ['vivo', 'morto'])) {
    $response["errors"][] = "Tipo non valido (accettati: vivo, morto).";
}
if ($tipo === 'morto' && (!$dataMorte || $dataMorte === '')) {
    $response["errors"][] = "Se l'autore è morto, la data di morte è obbligatoria.";
}
if ($tipo === 'vivo') {
    $dataMorte = null; // forza a NULL
}

if (!empty($response["errors"])) {
    echo json_encode($response);
    exit;
}

// Recupera dataNascita originale se vuota
if ($dataNascita === '') {
    $get = $conn->prepare("SELECT dataNascita FROM Autore WHERE codice = ?");
    $get->bind_param("i", $codice);
    $get->execute();
    $get->bind_result($dataNascita);
    $get->fetch();
    $get->close();
}

// Verifica esistenza autore
$check = $conn->prepare("SELECT 1 FROM Autore WHERE codice = ?");
$check->bind_param("i", $codice);
$check->execute();
$check->store_result();

if ($check->num_rows === 0) {
    $response["errors"][] = "Nessun autore trovato con il codice specificato.";
    echo json_encode($response);
    exit;
}

// Esegui UPDATE
$stmt = $conn->prepare("UPDATE Autore SET nome = ?, cognome = ?, dataNascita = ?, dataMorte = ?, tipo = ? WHERE codice = ?");
$stmt->bind_param("sssssi", $nome, $cognome, $dataNascita, $dataMorte, $tipo, $codice);

if ($stmt->execute()) {
    $response["success"] = true;
} else {
    $response["errors"][] = "Errore durante la modifica: " . $stmt->error;
}

echo json_encode($response);
$conn->close();
?>