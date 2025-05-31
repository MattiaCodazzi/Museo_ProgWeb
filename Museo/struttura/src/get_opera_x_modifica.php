<?php
require_once 'db_config_altervista.php';

if (!isset($_GET['codice']) || !is_numeric($_GET['codice'])) {
    http_response_code(400);
    echo json_encode(["errore" => "Parametro 'codice' mancante o non valido"]);
    exit;
}

$codice = $_GET['codice'];

$query = "SELECT codice, titolo, annoRealizzazione, annoAcquisto, tipo, espostaInSala 
          FROM Opera WHERE codice = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $codice);
$stmt->execute();

$result = $stmt->get_result();
$opera = $result->fetch_assoc();

if ($opera) {
    header('Content-Type: application/json');
    echo json_encode($opera);
} else {
    http_response_code(404);
    echo json_encode(["errore" => "Opera non trovata"]);
}
?>

