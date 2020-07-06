<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';
//session_destroy();
var_dump($_SESSION['userID']);
$content = array();
$content[0] = "./layouts/index.php";
include_once "./layouts/main.php";