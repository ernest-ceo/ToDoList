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
        $stmt = $this->connection->pdo->prepare('SELECT `email`, `password` FROM `users` WHERE email=:email');
        $stmt->bindValue(':email', $emailTrimmed, PDO::PARAM_STR);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if($userData){
            if(password_verify($passwordTrimmed, $userData['password'])){
                $_SESSION['username']=$userData['email'];
                header('location: index.php');
                die("<h3>Uzytkownik zalogowany pomyslnie</h3>");
            }else{
                echo "<h3>Nieprawidlowe haslo</h3>";
            }
        }else{
            echo "<h3>Nie znaleziono uzytkownika</h3>";
        }
    }
}