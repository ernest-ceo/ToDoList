<?php
declare(strict_types=1);
require_once 'config/session.php';
if(isset($_SESSION['username']))
{
    $menu = [
        "index.php" => "Home",
        "login.php" => "Logowanie",
        "registration.php" => "Rejestracja",
        "list.php" => "Lista"
    ];

} else {
    $menu = [
        "index.php" => "Home",
        "login.php" => "Logowanie",
        "registration.php" => "Rejestracja"
    ];
}
