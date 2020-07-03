<?php
declare(strict_types=1);
require_once "config/database.php";
require_once 'config/menu.php';
require_once 'config/session.php';

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

$content = array();
$content[0] = "./layouts/registration.php";
include_once "./layouts/main.php";