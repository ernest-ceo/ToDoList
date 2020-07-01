<?php
declare(strict_types=1);

require_once("db_pass.php");

$dsn = "mysql:dbname=$dbname;host=$host";

try {
    $db = new PDO($dsn, $user, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}