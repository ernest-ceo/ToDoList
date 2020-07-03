<?php
declare(strict_types=1);
require_once("config/database.php");
session_start();

if(isset($_POST['register'])){
    $first_Name = $_POST['first_name'];
    $second_Name = $_POST['second_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $hashPassword = password_hash($password,PASSWORD_BCRYPT);

    $sth = $db->prepare('INSERT INTO users (first_name, second_name, email, password) VALUE (:first_name,:second_name,:email,:password)');
    $sth->bindValue(':first_name', $first_Name, PDO::PARAM_STR);
    $sth->bindValue(':second_name', $second_Name, PDO::PARAM_STR);
    $sth->bindValue(':email', $email, PDO::PARAM_STR);
    $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
    $sth->execute();

    die('Rejestracja pomyslna!');

}
?>
<h1>Formularz rejestracyjny</h1>
<form method="post">
    <input type="text" name="first_name" placeholder="Imię">
    <input type="text" name="second_name" placeholder="Nazwisko">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Hasło">
    <button type="submit" name="register">Zarejestruj</button>
</form>