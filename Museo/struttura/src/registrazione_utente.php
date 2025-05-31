<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conn = new mysqli("localhost", "pwproject", "", "my_pwproject");
    if ($conn->connect_error) die("Errore connessione");

    $username = $_POST["username"];
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $password_raw = $_POST["password"];

    $error = [];

    if (strlen($username) < 5) {
        $error[] = "Lo username deve contenere almeno 5 caratteri.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error[] = "Email non valida.";
    }

    if (strlen($password_raw) < 8) {
        $error[] = "La password deve contenere almeno 8 caratteri.";
    }

    if (!empty($error)) {
        $messaggio = "<div class='messaggio errore'>";
        foreach ($error as $e) {
            $messaggio .= "<p>$e</p>";
        }
        $messaggio .= "</div>";
    } else {
        // Controllo se username già esistente
        $check = $conn->prepare("SELECT * FROM utenti WHERE username = ?");
        $check->bind_param("s", $username);
        $check->execute();
        $result = $check->get_result();
        if ($result->num_rows > 0) {
            $messaggio = "<div class='messaggio errore'>Username già registrato.</div>";
        } else {
            $password = password_hash($password_raw, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO utenti (username, nome, cognome, email, password) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $username, $nome, $cognome, $email, $password);

        if ($stmt->execute()) {
            $messaggio = "<div class='messaggio successo'>Registrazione completata con successo!</div>";
            $messaggio = "<div class='messaggio successo'>Registrazione completata con successo!</div>";
        } else {
            $messaggio = "<div class='messaggio errore'>Errore: username o email già esistenti.</div>";
        }

        $stmt->close();
    }
}

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Registrazione Utente</title>
    <link rel="stylesheet" href="../Public/style.css">
    <link rel="stylesheet" href="../Public/img.css">

</head>
<body>

	<div class="logo-museo">
		<img src="../icon/logo.png" alt="Logo Museo">
</div>

    <header>
        <h1>Registrazione Nuovo Utente</h1>
    </header>

    <nav>
        <a href="../public/main.html">Home</a>
    </nav>

    <main class="container">
        

        <div class="form-container">
        <form method="post" action="registrazione_utente.php">
            <input type="text" name="username" placeholder="Username" required><br><br>
            <input type="text" name="nome" placeholder="Nome" required><br><br>
            <input type="text" name="cognome" placeholder="Cognome" required><br><br>
            <input type="email" name="email" placeholder="Email" required><br><br>
            <input type="password" name="password" placeholder="Password" required><br><br>
            <button type="submit" class="btn">Registrati</button>
        </form>
    <?php if (isset($messaggio)) echo $messaggio; ?>
    </div>
    <div class="galleria">
        <img id="immagine-corrente" src="../immagini/galleria2.jpg" alt="Opera">
        <button id="next-btn">
            <img src="../icon/play-button.png" alt="Avanti">
        </button>
    </div>
    </main>
 
    <footer>
        <p>&copy; 2025 Museo Virtuale</p>
        <small>
        <a href="https://www.flaticon.com/free-icons/play-button" title="play button icons" class="flaticon-link">Play button icons created by Freepik - Flaticon</a>
        </small>
    </footer>

</body>
   <script>
        const immagini = [
        "../immagini/galleria2.jpg",
        "../immagini/galleria1.jpg",
        "../immagini/galleria3.jpg",
        ];
        let indice = 0;

        document.getElementById("next-btn").addEventListener("click", () => {
        indice = (indice + 1) % immagini.length;
        document.getElementById("immagine-corrente").src = immagini[indice];
        });
    </script>
</html>
