<?php
require_once 'db_config.php';
header('Content-Type: text/plain');

// Ricezione dati dal form
$codice = $_POST['codice'] ?? null;
$titolo = $_POST['titolo'] ?? null;
$annoRealizzazione = $_POST['annoRealizzazione'] ?? null;
$annoAcquisto = $_POST['annoAcquisto'] ?? null;
$tipo = $_POST['tipo'] ?? null;
$sala = $_POST['espostaInSala'] ?? null;

// Validazione base
if (!$codice || !$titolo || !$annoRealizzazione || !$annoAcquisto || !$tipo) {
    http_response_code(400);
    exit("Dati mancanti");
}

// Se il campo è vuoto, lo convertiamo in null
$sala = ($sala === "") ? null : (int)$sala;

// Query con binding
$sql = "UPDATE Opera 
        SET titolo = ?, annoRealizzazione = ?, annoAcquisto = ?, tipo = ?, espostaInSala = ?
        WHERE codice = ?";
$stmt = $conn->prepare($sql);

// Binding parametri
$stmt->bind_param("siisii", $titolo, $annoRealizzazione, $annoAcquisto, $tipo, $sala, $codice);

// Esecuzione e risposta
if ($stmt->execute()) {
    echo "✅ Opera aggiornata con successo";
} else {
    http_response_code(500);
    echo "❌ Errore durante l'aggiornamento: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

