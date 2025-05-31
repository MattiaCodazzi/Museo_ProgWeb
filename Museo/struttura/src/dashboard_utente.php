<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../Public/main.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Utente</title>
    <link rel="stylesheet" href="../public/style.css">
    <link rel="stylesheet" href="../public/news.css">
    <link rel="stylesheet" href="../public/img.css">
    <style>
        main.container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: calc(100vh - 200px);
            padding: 2rem;
        }
        .news-museo {
            text-align: center;
            max-width: 1000px;
        }
    </style>
</head>

<body>

<div class="logo-museo">
		<img src="../icon/logo.png" alt="Logo Museo">
</div>

<header>
    <h1>Benvenuto, <?php echo htmlspecialchars($_SESSION["nome"]); ?></h1> 
    <a href="logout.php" class="logout-absolute">Logout</a>
</header>

<nav>
    <a href="../public/utente/opere_utente.html">Opere</a>
    <a href="../public/utente/autori_utente.html">Autori</a>
    <a href="../public/utente/sale_utente.html">Sale</a>
    <a href="../public/utente/temi_utente.html">Temi</a>
</nav>

<main class="container">
    <section class="news-museo">
        <h2></h2>
        <div class="news-container">
            <div class="news-card" style="background-image: url('../immagini/opere_perdute.jpg');"
                 data-title="Ritornano le opere perdute"
                 data-content="Una selezione di opere recentemente ritrovate sarà nuovamente visibile al pubblico.">
                <div class="overlay"><h3>Ritornano le opere perdute</h3></div>
            </div>

            <div class="news-card" style="background-image: url('../immagini/laboratorio_didattico.jpg');"
                 data-title="Nuovo laboratorio didattico"
                 data-content="Il museo avvia un laboratorio per bambini e famiglie con attività creative e interattive.">
                <div class="overlay"><h3>Nuovo laboratorio didattico</h3></div>
            </div>

            <div class="news-card" style="background-image: url('../immagini/vitual_reality.jpg');"
                 data-title="Visita guidata in realtà aumentata"
                 data-content="Scopri le opere del museo grazie alla nuova esperienza interattiva in realtà aumentata.">
                <div class="overlay"><h3>Visita guidata in realtà aumentata</h3></div>
            </div>
        </div>
    </section>
</main>

<!-- POPUP -->
<div id="newsPopup" class="popup hidden">
    <div class="popup-content">
        <span class="close" id="closePopup">&times;</span>
        <h3 id="popupTitle"></h3>
        <p id="popupContent"></p>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const cards = document.querySelectorAll('.news-card');
        const popup = document.getElementById('newsPopup');
        const popupTitle = document.getElementById('popupTitle');
        const popupContent = document.getElementById('popupContent');
        const closeBtn = document.getElementById('closePopup');

        cards.forEach(card => {
            card.addEventListener('click', () => {
                const title = card.getAttribute('data-title');
                const content = card.getAttribute('data-content');
                popupTitle.textContent = title;
                popupContent.textContent = content;
                popup.classList.remove('hidden');
            });
        });

        closeBtn.addEventListener('click', () => {
            popup.classList.add('hidden');
        });

        popup.addEventListener('click', (e) => {
            if (e.target === popup) {
                popup.classList.add('hidden');
            }
        });
    });
</script>

<footer>
    <p>&copy; 2025 Museo Virtuale</p>
</footer>

</body>
</html>

