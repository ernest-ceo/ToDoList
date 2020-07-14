<?php
declare(strict_types=1);
require_once 'config/session.php';

if(isset($_SESSION['username']))
{
    $menu = [
        "index.php" => "Home",
        "list.php" => "Lista",
        "userpanel.php" => "Panel",
        "logout.php" => "Wyloguj"
    ];

} else {
    $menu = [
        "index.php" => "Home",
        "registration.php" => "Rejestracja",
        "login.php" => "Logowanie"
    ];
}
