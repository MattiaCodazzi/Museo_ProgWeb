<?php
session_start();

// Protezione accesso: se non loggato, torna alla home
if (!isset($_SESSION["username"])) {
    header("Location: main.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Personale</title>
    <link rel="stylesheet" href="../public/style.css">
</head>
<body>

<header>
    <h1>Benvenuto, <?php echo $_SESSION["nome"]; ?> (<?php echo $_SESSION["ruolo"]; ?>) </h1> 
    <a href="logout.php" class="logout-absolute">Logout</a>
    <nav>
    <a href="../public/personale/opere.html">Opere</a>
    <a href="../public/personale/autori.html">Autori</a>
    <a href="../public/personale/sale.html">Sale</a>
    <a href="../public/personale/temi.html">Temi</a>
    </nav>
</header>

<main class="container">
    
</main>

<footer>
    <p>&copy; 2025 Museo Virtuale</p>
</footer>

</body>
</html>
