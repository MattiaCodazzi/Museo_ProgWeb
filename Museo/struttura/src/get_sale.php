<?php
header("Content-Type: application/json");
require_once("db_config_altervista.php");

$sql = "SELECT numero, nome, superficie, temaSala FROM Sala";
$result = $conn->query($sql);

$sale = [];
while ($row = $result->fetch_assoc()) {
    $sale[] = [
        "numero" => $row["numero"],
        "nome" => $row["nome"],
        "superficie" => $row["superficie"],
        "tema" => $row["temaSala"]
    ];
}

echo json_encode($sale);
$conn->close();

