<?php


namespace App\Repositories;

use App\Database;
use PDO;
use PDOException;

class UsersRepository
{
    public Database $connection;

    public function __construct($pdo)
    {
        $this->connection=$pdo;
    }

    public function checkIfUserExists(string $email)
    {
        try
        {
            $query = $this->connection->pdo->prepare('SELECT * FROM `users`
                                                            WHERE `email`=:email');
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            return (bool)($query->fetch());
        }
        catch (PDOException $e)
        {
            echo "Nie udało się pobrać rekordu z bazy danych!";
        }
    }

    public function tryToLogIn($email, $password)
    {
        $emailTrimmed = trim($email);
        $passwordTrimmed = trim($password);
        $stmt = $this->connection->pdo->prepare('SELECT `id`, `email`, `password`, `verified` FROM `users` WHERE email=:email');
        $stmt->bindValue(':email', $emailTrimmed, PDO::PARAM_STR);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            if (password_verify($passwordTrimmed, $userData['password']) && $userData['verified'] === 1) {
                $_SESSION['username'] = $userData['email'];
                $_SESSION['userID'] = $userData['id'];
                return true;
            } else {
                return false;
            }
        }
        else
        {
            return false;
        }
    }

    public function checkIfEmailTaken(string $email)
    {
        try
        {
            $query = $this->connection->pdo->prepare('SELECT * FROM `users`
                                                                WHERE `email`=:email');
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->execute();
            return (bool)($query->fetch());
        }
        catch (PDOException $e)
        {
            echo "Nie udało się pobrać rekordu z bazy danych!";
        }
    }

    public function checkIfNewPasswordIsOk(string $newPassword, string $newPasswordValidate)
    {
        return (bool) ($newPassword===$newPasswordValidate);
    }

    public function createNewUser(string $firstName, $secondName, $email, string $hashedPassword, string $vkey)
    {
        try
        {
            $query = $this->connection->pdo->prepare('INSERT INTO `users` (first_name, second_name, email, password, vkey, verified) 
                                                                VALUES (:first_name, :second_name, :email, :hashedPassword, :vkey, 0)');
            $query->bindValue(':first_name', $firstName, PDO::PARAM_STR);
            $query->bindValue(':second_name', $secondName, PDO::PARAM_STR);
            $query->bindValue(':email', $email, PDO::PARAM_STR);
            $query->bindValue(':hashedPassword', $hashedPassword, PDO::PARAM_STR);
            $query->bindValue(':vkey', $vkey, PDO::PARAM_STR);
            $query->execute();
        }
        catch (PDOException $e)
        {
            echo "Nie udało się zarejestrować użytkownika!";
        }
    }

    public function verifyAccount(string $vkey)
    {
        try
        {
            $query = $this->connection->pdo->prepare('UPDATE `users` 
                                                                SET `verified`=1
                                                                WHERE `vkey`=:vkey');
            $query->bindValue(':vkey', $vkey, PDO::PARAM_STR);
            return (bool)($query->execute());
        }
        catch (PDOException $e)
        {
            echo "Nie udało się zweryfikować konta!";
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