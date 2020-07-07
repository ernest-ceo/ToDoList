<?php


namespace App\Repositories;

use App\Database;
use PDO;

class UsersRepository
{
    public Database $connection;

    public function __construct($pdo)
    {
        $this->connection=$pdo;
    }

    public function tryToLogIn($email, $password)
    {
        $emailTrimmed = trim($email);
        $passwordTrimmed = trim($password);
        $stmt = $this->connection->pdo->prepare('SELECT `id`, `email`, `password` FROM `users` WHERE email=:email');
        $stmt->bindValue(':email', $emailTrimmed, PDO::PARAM_STR);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if($userData){
            if(password_verify($passwordTrimmed, $userData['password'])){
                $_SESSION['username']=$userData['email'];
                $_SESSION['userID']=$userData['id'];
                header('location: index.php');
                die("<h3>Uzytkownik zalogowany pomyslnie</h3>");
            }else{
                echo "<h3>Nieprawidlowe haslo</h3>";
            }
        }else{
            echo "<h3>Nie znaleziono uzytkownika</h3>";
        }
    }

    public function registration($first_Name, $second_Name, $email, $password)
    {
        $hashPassword = password_hash($password,PASSWORD_BCRYPT);

        $sth = $this->connection->pdo->prepare('INSERT INTO users (first_name, second_name, email, password) VALUE (:first_name,:second_name,:email,:password)');
        $sth->bindValue(':first_name', $first_Name, PDO::PARAM_STR);
        $sth->bindValue(':second_name', $second_Name, PDO::PARAM_STR);
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $sth->execute();

        die('Rejestracja pomyslna!');

    }
}