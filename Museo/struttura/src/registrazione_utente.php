<?php
// Registrazione al submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "root", "", "museo"); // <-- Sostituisci con il tuo DB
    if ($conn->connect_error) die("Errore connessione");

    $username = $_POST["username"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO utenti (username, nome, cognome, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $nome, $cognome, $email, $password);

    if ($stmt->execute()) {
        $messaggio = "Registrazione completata con successo!";
    } else {
        $messaggio = "Errore: username o email già esistenti.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione Utente</title>
    <link rel="stylesheet" href="../Public/style.css">
</head>
<body>

    <header>
        <h1>Registrazione Nuovo Utente</h1>
    </header>

    <nav>
        <a href="../public/main.html">Home</a>
    </nav>

    <main class="container">
        <?php if (isset($messaggio)) echo "<p style='color:green;'>$messaggio</p>"; ?>

        <form method="post" action="registrazione_utente.php">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="text" name="nome" placeholder="Nome" required><br><br>
            <input type="text" name="cognome" placeholder="Cognome" required><br><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <input type="submit" value="Registrati" class="btn">
        </form>
    </main>

    <footer>
        <p>&copy; 2025 Museo Virtuale</p>
    </footer>

</body>
</html>
