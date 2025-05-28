<?php
require_once 'db_config.php';

$sql = "SELECT numero, nome FROM Sala ORDER BY nome";
$result = $conn->query($sql);

$sale = [];

while ($row = $result->fetch_assoc()) {
    $sale[] = [
        "numero" => $row["numero"],
        "nome" => $row["nome"]
    ];
}

echo json_encode($sale);
$conn->close();
?>

