<?php
declare(strict_types=1);
require_once("config/database.php");
require("config/database.php");
session_start();

if(isset($_SESSION['user'])){
    die ("<h3>Jestes juz zalogowany</h3>");
}

if(isset($_POST['login'])){
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    $sth = $db->prepare('SELECT * FROM users WHERE email=:email limit 1');
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->execute();
    $user = $sth->fetch(PDO::FETCH_ASSOC);
    if($user){
        if(password_verify($password,$user['password'])){
            $_SESSION['user'] = htmlspecialchars($_POST['email']);
            // header("Location: http://localhost/index.php");
            die("<h3>Uzytkownik zalogowany pomyslnie</h3>");
        }else{
            echo "<h3>Nieprawidlowe haslo</h3>";
        }
    }else{
        echo "<h3>Nie znaleziono uzytkownika</h3>";
    }
}
?>
<h1>Logowanie</h1>
<form method="post">
    <input type="text" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Hasło">
    <button type="submit" name="login">Zaloguj</button>
</form>