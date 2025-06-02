<?php
session_start();

// Connessione DB
$conn = new mysqli("localhost", "root", "", "museo");
if ($conn->connect_error) {
    die("Errore connessione");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $stmt = $conn->prepare("SELECT * FROM personale WHERE username = ?");
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($pass, $row["password"])) {
            $_SESSION["username"] = $row["username"];
            $_SESSION["nome"] = $row["nome"];
            $_SESSION["ruolo"] = $row["ruolo"];
            echo "OK"; // ⚠️ SOLO QUESTO!
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

