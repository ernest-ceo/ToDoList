<?php
    session_start();
    require_once 'config/menu.php';

$content = array();
$content[0] = "./layouts/index.php";
include_once "./layouts/main.php";