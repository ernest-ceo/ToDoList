<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';

if(isset($_SESSION['username'])){
    echo 'Zostales wylogowany';
    header('location: index.php');
}else{
    echo 'Nie jestes zalogowany';
}
session_destroy();