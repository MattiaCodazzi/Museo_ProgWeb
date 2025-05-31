<?php
require_once 'db_config_altervista.php';
header('Content-Type: application/json');

$nome = $_POST['nome'] ?? '';
$cognome = $_POST['cognome'] ?? '';
$nazione = $_POST['nazione'] ?? '';

$sql = "SELECT * FROM Autore WHERE 1=1";
$params = [];
$types = "";

if (!empty($nome)) {
  $sql .= " AND nome = ?";
  $params[] = $nome;
  $types .= "s";
}

if (!empty($cognome)) {
  $sql .= " AND cognome = ?";
  $params[] = $cognome;
  $types .= "s";
}

if (!empty($nazione)) {
  $sql .= " AND nazione = ?";
  $params[] = $nazione;
  $types .= "s";
}

$stmt = $conn->prepare($sql);
if (!empty($params)) {
  $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$autori = [];
while ($row = $result->fetch_assoc()) {
  $autori[] = $row;
}

echo json_encode($autori);
$stmt->close();
$conn->close();
?>
