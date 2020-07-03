<?php
session_start();
if(isset($_SESSION['user'])){
    echo 'Zostales wylogowany';
}else{
    echo 'Nie jestes zalogowany';
}
session_destroy();