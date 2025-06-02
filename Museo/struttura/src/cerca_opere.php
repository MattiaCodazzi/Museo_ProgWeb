<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header("Content-Type: application/json");

require_once("db_config.php");
file_put_contents("debug_post.txt", print_r($_POST, true));

$titolo = $_POST['titolo'] ?? '';
$autoreId = $_POST['autoreId'] ?? '';
$tipo = $_POST['tipo'] ?? '';
$salaId = (isset($_POST['salaId']) && $_POST['salaId'] !== "" && $_POST['salaId'] !== "undefined") ? intval($_POST['salaId']) : null;
$pagina = isset($_POST['pagina']) ? max(1, intval($_POST['pagina'])) : 1;
$limite = 10;
$offset = ($pagina - 1) * $limite;

$sql = "SELECT Opera.titolo, Opera.tipo, Opera.annoRealizzazione, Opera.annoAcquisto,
               CONCAT(Autore.nome, ' ', Autore.cognome) AS autore,
               Sala.nome AS sala
        FROM Opera
        LEFT JOIN Autore ON Opera.autore = Autore.codice
        LEFT JOIN Sala ON Opera.espostaInSala = Sala.numero
        WHERE 1=1";

$params = [];
$types = "";

if (!empty($titolo)) {
    $sql .= " AND Opera.titolo LIKE ?";
    $params[] = "%$titolo%";
    $types .= "s";
}
if (!empty($autoreId)) {
    $sql .= " AND Opera.autore = ?";
    $params[] = $autoreId;
    $types .= "i";
}
if (!empty($tipo)) {
    $sql .= " AND Opera.tipo = ?";
    $params[] = $tipo;
    $types .= "s";
}
if ($salaId !== null) {
    $sql .= " AND Opera.espostaInSala = ?";
    $params[] = $salaId;
    $types .= "i";
}

$sql .= " LIMIT ? OFFSET ?";
$params[] = $limite;
$params[] = $offset;
$types .= "ii";

$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(["errore" => "Errore nella preparazione della query: " . $conn->error]);
    exit;
}

$stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$opere = [];
while ($row = $result->fetch_assoc()) {
    $opere[] = $row;
}

$count_sql = "SELECT COUNT(*) as totale FROM Opera WHERE 1=1";
$count_params = [];
$count_types = "";

if (!empty($titolo)) {
    $count_sql .= " AND titolo LIKE ?";
    $count_params[] = "%$titolo%";
    $count_types .= "s";
}
if (!empty($autoreId)) {
    $count_sql .= " AND autore = ?";
    $count_params[] = $autoreId;
    $count_types .= "i";
}
if (!empty($tipo)) {
    $count_sql .= " AND tipo = ?";
    $count_params[] = $tipo;
    $count_types .= "s";
}
if ($salaId !== null) {
    $count_sql .= " AND espostaInSala = ?";
    $count_params[] = $salaId;
    $count_types .= "i";
}

$count_stmt = $conn->prepare($count_sql);
if (!empty($count_types)) {
    $count_stmt->bind_param($count_types, ...$count_params);
}
$count_stmt->execute();
$count_result = $count_stmt->get_result();
$totale = $count_result->fetch_assoc()['totale'];

echo json_encode([
    "opere" => $opere,
    "totale" => $totale,
    "limite" => $limite
]);

$conn->close();




