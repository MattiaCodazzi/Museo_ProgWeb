<?php
require_once 'db_config.php';

// Controlla che arrivi una richiesta POST
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Metodo non consentito");
}

// Ricezione dati
$titolo = $_POST['titolo'] ?? null;
$autore = $_POST['autore'] ?? null;
$annoRealizzazione = $_POST['annoRealizzazione'] ?? null;
$annoAcquisto = $_POST['annoAcquisto'] ?? null;
$tipo = $_POST['tipo'] ?? null;
$sala = $_POST['sala'] !== "" ? $_POST['sala'] : null;

// Controllo minimo
if (!$titolo || !$autore || !$annoRealizzazione || !$annoAcquisto || !$tipo) {
    http_response_code(400);
    exit("Dati mancanti o non validi");
}

// Generazione codice
$result = $conn->query("SELECT MAX(codice) AS max_cod FROM Opera");
$row = $result->fetch_assoc();
$codice = $row['max_cod'] + 1;

// Query
$stmt = $conn->prepare("INSERT INTO Opera (codice, autore, titolo, annoAcquisto, annoRealizzazione, tipo, espostaInSala)
                        VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("iisissi", $codice, $autore, $titolo, $annoAcquisto, $annoRealizzazione, $tipo, $sala);

if ($stmt->execute()) {
    echo "✅ Opera inserita con successo.";
} else {
    http_response_code(500);
    echo "❌ Errore: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>


