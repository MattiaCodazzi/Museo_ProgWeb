<?php
require_once 'db_config_altervista.php'; // modifica il path se necessario

// Verifica parametri
if (
    !isset($_POST['codice'], $_POST['titolo'], $_POST['annoRealizzazione'], 
             $_POST['annoAcquisto'], $_POST['tipo'])
) {
    http_response_code(400);
    echo "Parametri mancanti.";
    exit;
}

$codice = $_POST['codice'];
$titolo = $_POST['titolo'];
$annoRealizzazione = $_POST['annoRealizzazione'];
$annoAcquisto = $_POST['annoAcquisto'];
$tipo = $_POST['tipo'];
$espostaInSala = isset($_POST['espostaInSala']) && $_POST['espostaInSala'] !== '' 
    ? $_POST['espostaInSala'] 
    : null;

// Prepara query
$query = "UPDATE Opera SET titolo = ?, annoRealizzazione = ?, annoAcquisto = ?, tipo = ?, espostaInSala = ? WHERE codice = ?";
$stmt = $conn->prepare($query);

if (!$stmt) {
    http_response_code(500);
    echo "Errore nella preparazione della query.";
    exit;
}

// Bind (5 stringhe: titolo, tipo, + 3 interi: anni, codice)
$stmt->bind_param("siissi", $titolo, $annoRealizzazione, $annoAcquisto, $tipo, $espostaInSala, $codice);

if ($stmt->execute()) {
    echo "Modifica salvata con successo.";
} else {
    http_response_code(500);
    echo "Errore nel salvataggio della modifica.";
}
?>


