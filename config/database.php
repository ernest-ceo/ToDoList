<?php
declare(strict_types=1);

$dsn = 'mysql:dbname=todo;host=127.0.0.1';
$user = 'root';
$password = '';

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}