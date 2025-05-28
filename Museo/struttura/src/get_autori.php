<?php
require_once 'db_config.php';

$sql = "SELECT codice, nome, cognome FROM Autore ORDER BY cognome, nome";
$result = $conn->query($sql);

$autori = [];

while ($row = $result->fetch_assoc()) {
    $autori[] = [
        "codice" => $row["codice"],
        "nome" => $row["nome"],
        "cognome" => $row["cognome"]
    ];
}

echo json_encode($autori);
$conn->close();
?>

