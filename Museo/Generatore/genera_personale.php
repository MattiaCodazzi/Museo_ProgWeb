<?php
$personale = [
    ['username' => 'mrossi', 'nome' => 'Marco', 'cognome' => 'Rossi', 'ruolo' => 'Curatore', 'email' => 'marco.rossi@museo.it', 'password' => 'password1'],
    ['username' => 'gbianchi', 'nome' => 'Giulia', 'cognome' => 'Bianchi', 'ruolo' => 'Addetto Sala', 'email' => 'giulia.bianchi@museo.it', 'password' => 'password2'],
    ['username' => 'lverdi', 'nome' => 'Luca', 'cognome' => 'Verdi', 'ruolo' => 'Restauratore', 'email' => 'luca.verdi@museo.it', 'password' => 'password3'],
    ['username' => 'cneri', 'nome' => 'Chiara', 'cognome' => 'Neri', 'ruolo' => 'Guida Turistica', 'email' => 'chiara.neri@museo.it', 'password' => 'password4'],
    ['username' => 'frusso', 'nome' => 'Francesco', 'cognome' => 'Russo', 'ruolo' => 'Responsabile Collezioni', 'email' => 'francesco.russo@museo.it', 'password' => 'password5'],
    ['username' => 'lromano', 'nome' => 'Laura', 'cognome' => 'Romano', 'ruolo' => 'Direttrice', 'email' => 'laura.romano@museo.it', 'password' => 'password6'],
    ['username' => 'pgreco', 'nome' => 'Paolo', 'cognome' => 'Greco', 'ruolo' => 'Addetto Sicurezza', 'email' => 'paolo.greco@museo.it', 'password' => 'password7'],
    ['username' => 'slombardi', 'nome' => 'Serena', 'cognome' => 'Lombardi', 'ruolo' => 'Catalogatore', 'email' => 'serena.lombardi@museo.it', 'password' => 'password8'],
    ['username' => 'gferrari', 'nome' => 'Giorgio', 'cognome' => 'Ferrari', 'ruolo' => 'Conservatore', 'email' => 'giorgio.ferrari@museo.it', 'password' => 'password9'],
    ['username' => 'mbarbieri', 'nome' => 'Marta', 'cognome' => 'Barbieri', 'ruolo' => 'Addetta Bookshop', 'email' => 'marta.barbieri@museo.it', 'password' => 'password10'],
    ['username' => 'dgalli', 'nome' => 'Davide', 'cognome' => 'Galli', 'ruolo' => 'Tecnico Luci', 'email' => 'davide.galli@museo.it', 'password' => 'password11'],
    ['username' => 'sfontana', 'nome' => 'Sofia', 'cognome' => 'Fontana', 'ruolo' => 'Coordinatrice Eventi', 'email' => 'sofia.fontana@museo.it', 'password' => 'password12'],
    ['username' => 'amarino', 'nome' => 'Alessandro', 'cognome' => 'Marino', 'ruolo' => 'Responsabile Didattica', 'email' => 'alessandro.marino@museo.it', 'password' => 'password13'],
    ['username' => 'eferri', 'nome' => 'Elena', 'cognome' => 'Ferri', 'ruolo' => 'Assistente Curatore', 'email' => 'elena.ferri@museo.it', 'password' => 'password14'],
    ['username' => 'sbruno', 'nome' => 'Stefano', 'cognome' => 'Bruno', 'ruolo' => 'Manutentore', 'email' => 'stefano.bruno@museo.it', 'password' => 'password15'],
    ['username' => 'ctesta', 'nome' => 'Camilla', 'cognome' => 'Testa', 'ruolo' => 'Archivista', 'email' => 'camilla.testa@museo.it', 'password' => 'password16'],
    ['username' => 'mmartini', 'nome' => 'Matteo', 'cognome' => 'Martini', 'ruolo' => 'Responsabile Mostre', 'email' => 'matteo.martini@museo.it', 'password' => 'password17'],
    ['username' => 'ibianco', 'nome' => 'Irene', 'cognome' => 'Bianco', 'ruolo' => 'Receptionist', 'email' => 'irene.bianco@museo.it', 'password' => 'password18'],
    ['username' => 'gcosta', 'nome' => 'Gabriele', 'cognome' => 'Costa', 'ruolo' => 'Allestitore', 'email' => 'gabriele.costa@museo.it', 'password' => 'password19'],
    ['username' => 'acolombo', 'nome' => 'Angela', 'cognome' => 'Colombo', 'ruolo' => 'Ufficio Stampa', 'email' => 'angela.colombo@museo.it', 'password' => 'password20'],
];

foreach ($personale as $p) {
    $hash = password_hash($p['password'], PASSWORD_DEFAULT);
    echo "INSERT INTO personale (username, nome, cognome, ruolo, email, password) VALUES (";
    echo "'" . $p['username'] . "', ";
    echo "'" . $p['nome'] . "', ";
    echo "'" . $p['cognome'] . "', ";
    echo "'" . $p['ruolo'] . "', ";
    echo "'" . $p['email'] . "', ";
    echo "'" . $hash . "'";
    echo ");\n";
}
?>
