<?php
session_start();

$conn = new mysqli("localhost", "pwproject", "", "my_pwproject"); // ← Sostituisci con il nome reale del tuo DB
if ($conn->connect_error) die("Errore connessione");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM utenti WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["nome"] = $row["nome"];
            echo "OK";
        } else {
            echo "Password errata.";
        }
    } else {
        echo "Utente non trovato.";
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>
