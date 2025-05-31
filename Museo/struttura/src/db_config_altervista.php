<?php
$host = "localhost";
$user = "pwproject";
$password = "";
$dbname = "my_pwproject";

$conn = new mysqli($host, $user, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}