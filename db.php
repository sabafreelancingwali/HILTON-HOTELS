<?php
// Database connection (update only if your creds change)
$DB_HOST = 'localhost';
$DB_NAME = 'dbrh5xhgulsyab';
$DB_USER = 'uei4bkjtcem6s';
$DB_PASS = 'wmhalmspfjgz';
 
 
try {
$pdo = new PDO("mysql:host=$DB_HOST;dbname=$DB_NAME;charset=utf8mb4", $DB_USER, $DB_PASS, [
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
} catch (Exception $e) {
die('Database connection failed: ' . htmlspecialchars($e->getMessage()));
}
?>
