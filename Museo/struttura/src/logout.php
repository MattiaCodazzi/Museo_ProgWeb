<?php
session_start();            // Avvia la sessione
session_unset();            // Rimuove tutte le variabili di sessione
session_destroy();          // Distrugge la sessione

// Reindirizza alla pagina iniziale
header("Location: ../public/main.html");
exit;
?>
