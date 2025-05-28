<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../Public/main.html"); // o dove sta la tua homepage
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Utente</title>
    <link rel="stylesheet" href="../Public/style.css">
</head>
<body>

<header>
    <h1>Benvenuto, <?php echo htmlspecialchars($_SESSION["nome"]); ?>! <a href="logout.php">Logout</a></h1>
    <nav>
    <a href="dashboard_utente.php" class="attivo">Home</a>
    <a href="../public/utente/opere_utente.html">Opere</a>
    <a href="../public/utente/autori_utente.html">Autori</a>
    <a href="../public/utente/sale_utente.html">Sale</a>
    <a href="../public/utente/temi_utente.html">Temi</a>
    </nav>
</header>

<main class="container">
    <p>Questa è l’area utente registrato. Qui potrai accedere a contenuti personalizzati o preferiti, se previsti.</p>
</main>

<footer>
    <p>&copy; 2025 Museo Virtuale</p>
</footer>

</body>
</html>
