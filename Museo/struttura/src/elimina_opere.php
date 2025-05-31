<?php
require_once 'db_config_altervista.php';
header('Content-Type: text/plain');

// Logging in file
function log_to_file($msg) {
    file_put_contents(__DIR__ . '/log_elimina.txt', date('H:i:s') . ' ' . $msg . "\n", FILE_APPEND);
}

// Ricezione e normalizzazione
$codici = $_POST['codici'] ?? [];
if (!is_array($codici)) $codici = [$codici];
log_to_file("POST: " . print_r($codici, true));

$codici = array_filter(array_map('intval', $codici), function($c) { return $c > 0; });
log_to_file("Codici puliti: " . implode(', ', $codici));

if (count($codici) === 0) {
    http_response_code(400);
    exit("Errore: Nessun ID valido per l'eliminazione.");
}

$placeholders = implode(',', array_fill(0, count($codici), '?'));
$sql = "DELETE FROM Opera WHERE codice IN ($placeholders)";
log_to_file("SQL: $sql");

$stmt = $conn->prepare($sql);
if (!$stmt) {
    http_response_code(500);
    exit("Errore SQL: " . $conn->error);
}

// Binding con diagnostica
$types = str_repeat('i', count($codici));
$params = array_merge([$types], $codici);

$tmp = [];
foreach ($params as $k => $v) {
    $tmp[$k] = &$params[$k];
}
log_to_file("Bind types: $types");
log_to_file("Bind values: " . implode(', ', $codici));

call_user_func_array([$stmt, 'bind_param'], $tmp);

if ($stmt->execute()) {
    log_to_file("Query eseguita. Affected rows: " . $stmt->affected_rows);
    echo "✅ Eliminazione riuscita: " . $stmt->affected_rows . " opera/e.";
} else {
    log_to_file("Errore esecuzione: " . $stmt->error);
    http_response_code(500);
    echo "❌ Errore durante l'eliminazione: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>







