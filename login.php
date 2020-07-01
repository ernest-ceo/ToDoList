<?php
declare(strict_types=1);
require_once("config/database.php");
require_once 'config/menu.php';
$content = array();
$content[0] = "./layouts/login.php";
include_once "./layouts/main.php";

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sth = $db->prepare('SELECT * FROM users WHERE email=:email limit 1');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->execute();
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    if($user){
        if(password_verify($password,$user['password'])){
            die("<h3>Uzytkownik zalogowany pomyslnie</h3>");
        }else{
            echo "<h3>Nieprawidlowe haslo</h3>";
        }
    }else{
        echo "<h3>Nie znaleziono uzytkownika</h3>";
    }
}
