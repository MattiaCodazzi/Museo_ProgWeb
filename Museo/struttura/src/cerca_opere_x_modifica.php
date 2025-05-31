<?php
require_once 'db_config_altervista.php';

// Recupera i filtri dal POST
$titolo = $_POST['titolo'] ?? '';
$autoreId = $_POST['autoreId'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$salaId = $_POST['salaId'] ?? '';
$pagina = $_POST['pagina'] ?? 1;
$limite = 10;
$offset = ($pagina - 1) * $limite;

// Costruzione query con filtri
$query = "SELECT o.codice, o.titolo, o.annoAcquisto, o.annoRealizzazione, o.tipo,
                 CONCAT(a.nome, ' ', a.cognome) AS autore,
                 s.nome AS sala
          FROM Opera o
          LEFT JOIN Autore a ON o.autore = a.codice
          LEFT JOIN Sala s ON o.espostaInSala = s.numero
          WHERE 1=1";

$params = [];
$types = "";

// Aggiunta filtri
if (!empty($titolo)) {
    $query .= " AND o.titolo LIKE ?";
    $params[] = "%$titolo%";
    $types .= "s";
}
if (!empty($autoreId)) {
    $query .= " AND o.autore = ?";
    $params[] = $autoreId;
    $types .= "i";
}
if (!empty($tipo)) {
    $query .= " AND o.tipo = ?";
    $params[] = $tipo;
    $types .= "s";
}
if (!empty($salaId)) {
    $query .= " AND o.espostaInSala = ?";
    $params[] = $salaId;
    $types .= "i";
}

// Query per conteggio totale risultati
$countQuery = "SELECT COUNT(*) as totale FROM ($query) AS sub";
$countStmt = $conn->prepare($countQuery);
if (!empty($params)) {
    $countStmt->bind_param($types, ...$params);
}
$countStmt->execute();
$countResult = $countStmt->get_result();
$totale = $countResult->fetch_assoc()['totale'] ?? 0;

// Applica LIMIT e OFFSET
$query .= " LIMIT ? OFFSET ?";
$params[] = $limite;
$params[] = $offset;
$types .= "ii";

$stmt = $conn->prepare($query);
$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$opere = [];
while ($row = $result->fetch_assoc()) {
    $opere[] = $row;
}

// Risposta JSON
header('Content-Type: application/json');
echo json_encode([
    "opere" => $opere,
    "totale" => $totale,
    "limite" => $limite
]);
?>
