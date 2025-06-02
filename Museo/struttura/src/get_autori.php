<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db_config.php'; // Assicurati che config.php sia nella stessa cartella
header('Content-Type: application/json');

$sql = "SELECT codice, nome, cognome, nazione, dataNascita, tipo, dataMorte FROM Autore";
$result = $conn->query($sql);

if (!$result) {
    echo json_encode(["errore" => $conn->error]);
    exit;
}

$autori = [];
while ($row = $result->fetch_assoc()) {
    $autori[] = $row;
}

echo json_encode($autori);
$conn->close();

?>
