<?php
require_once 'session.php';
if(isset($_SESSION['username']))
{
    $menu = [
        "index.php" => "Home",
        "logowanie.php" => "Logowanie",
        "rejestracja.php" => "Rejestracja",
        "list.php" => "Lista"
    ];

} else {
    $menu = [
        "index.php" => "Home",
        "logowanie.php" => "Logowanie",
        "rejestracja.php" => "Rejestracja"
    ];
}