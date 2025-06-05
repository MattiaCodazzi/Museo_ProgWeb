<?php
header('Content-Type: application/json');
require_once 'db_config_altervista.php'; // contiene $conn = new mysqli(...)

try {
    $stmt = $conn->prepare("SELECT codice, descrizione FROM Tema ORDER BY descrizione ASC");
    $stmt->execute();
    $result = $stmt->get_result();

    $temi = [];
    while ($row = $result->fetch_assoc()) {
        $temi[] = $row;
    }

    echo json_encode($temi);
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode(['errore' => 'Errore nel recupero dei temi: ' . $e->getMessage()]);
}
?>

