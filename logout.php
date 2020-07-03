<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';

if(isset($_SESSION['user'])){
    echo 'Zostales wylogowany';
}else{
    echo 'Nie jestes zalogowany';
}
session_destroy();