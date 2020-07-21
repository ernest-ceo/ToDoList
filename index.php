<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';
$content = array();

if(isset($_SESSION['username']))
{
    header("location: list.php");
    die;
}
$content[0] = "./layouts/index.php";
include_once "./layouts/main.php";