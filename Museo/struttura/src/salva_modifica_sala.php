<?php
require_once 'db_config_altervista.php'; // Connessione MySQLi: $conn

if (!isset($_POST['numero'], $_POST['superficie'], $_POST['tema'])) {
    http_response_code(400);
    echo "Parametri mancanti.";
    exit;
}

$numero = intval($_POST['numero']);
$superficie = intval($_POST['superficie']);
$tema = intval($_POST['tema']);

if ($numero <= 0 || $superficie <= 0 || $tema <= 0) {
    http_response_code(400);
    echo "Valori non validi.";
    exit;
}

// Corretto: temaSala (non 'tema')
$stmt = $conn->prepare("UPDATE Sala SET superficie = ?, temaSala = ? WHERE numero = ?");
if (!$stmt) {
    http_response_code(500);
    echo "Errore nella preparazione della query: " . $conn->error;
    exit;
}

$stmt->bind_param("iii", $superficie, $tema, $numero);

if ($stmt->execute()) {
    echo "Modifica effettuata con successo.";
} else {
    http_response_code(500);
    echo "Errore nell'esecuzione della query: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
