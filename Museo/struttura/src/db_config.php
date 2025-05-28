<?php
$host = "localhost";
$user = "root";
$password = "";
$dbname = "museo";

$conn = new mysqli($host, $user, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
?>
