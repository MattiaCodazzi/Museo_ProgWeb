<?php
require_once 'db_config_altervista.php';
header('Content-Type: application/json');

$codice = $_GET['codice'] ?? null;
if (!$codice) {
  http_response_code(400);
  echo json_encode(["errore" => "Codice mancante"]);
  exit;
}

$sql = "SELECT * FROM Opera WHERE codice = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $codice);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {
  echo json_encode($row);
} else {
  echo json_encode(["errore" => "Opera non trovata"]);
}

$stmt->close();
$conn->close();
?>
