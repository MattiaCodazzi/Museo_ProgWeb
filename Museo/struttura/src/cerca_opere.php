<?php
require_once 'db_config.php';
header('Content-Type: application/json');

// Ricezione dati da POST
$titolo = $_POST['titolo'] ?? '';
$autoreId = $_POST['autoreId'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$salaId = $_POST['salaId'] ?? '';

// Costruzione query dinamica
$sql = "SELECT 
            o.codice,
            o.titolo,
            o.tipo,
            o.annoRealizzazione,
            o.annoAcquisto,
            a.nome AS nomeAutore,
            a.cognome AS cognomeAutore,
            s.nome AS nomeSala
        FROM Opera o
        LEFT JOIN Autore a ON o.autore = a.codice
        LEFT JOIN Sala s ON o.espostaInSala = s.numero
        WHERE 1=1";

$params = [];
$types = "";

// Filtro titolo
if (!empty($titolo)) {
    $sql .= " AND o.titolo LIKE ?";
    $params[] = "%$titolo%";
    $types .= "s";
}

// Filtro autore
if (!empty($autoreId)) {
    $sql .= " AND o.autore = ?";
    $params[] = $autoreId;
    $types .= "i";
}

// Filtro tipo
if (!empty($tipo)) {
    $sql .= " AND o.tipo = ?";
    $params[] = $tipo;
    $types .= "s";
}

// Filtro sala
if (!empty($salaId)) {
    $sql .= " AND o.espostaInSala = ?";
    $params[] = $salaId;
    $types .= "i";
}

// Prepara ed esegui query
$stmt = $conn->prepare($sql);
if (!empty($params)) {
    $stmt->bind_param($types, ...$params);
}
$stmt->execute();
$result = $stmt->get_result();

$opere = [];

while ($row = $result->fetch_assoc()) {
    $opere[] = [
        'codice' => $row['codice'], // ✅ necessario per modifica_opera.html
        'titolo' => $row['titolo'],
        'autore' => trim($row['nomeAutore'] . ' ' . $row['cognomeAutore']),
        'tipo' => $row['tipo'],
        'annoRealizzazione' => $row['annoRealizzazione'],
        'annoAcquisto' => $row['annoAcquisto'],
        'sala' => $row['nomeSala'] ?? '—'
    ];
}

echo json_encode($opere);
$stmt->close();
$conn->close();
?>



