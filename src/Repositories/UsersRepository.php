<?php


namespace App\Repositories;

use App\Database;
use PDO;
use PDOException;

class UsersRepository
{
    public $connection;

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
        $stmt = $this->connection->pdo->prepare('SELECT `id`, `email`, `password`, `verified`, `first_name`, `second_name` FROM `users` WHERE email=:email');
        $stmt->bindValue(':email', $emailTrimmed, PDO::PARAM_STR);
        $stmt->execute();
        $userData = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($userData) {
            if (password_verify($passwordTrimmed, $userData['password']) && $userData['verified'] === 1) {
                $_SESSION['username'] = $userData['email'];
                $_SESSION['userID'] = $userData['id'];
                $_SESSION['userFirstName']=$userData['first_name'];
                $_SESSION['userSecondName']=$userData['second_name'];
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
        if($newPassword===$newPasswordValidate) {
            if (strlen($newPassword) < 8) {
                $_SESSION['info'] = "Hasło musi mieć co najmniej 8 znaków!";
                return false;
            } elseif ($newPassword === strtolower($newPassword) OR $newPassword===strtoupper($newPassword)) {
                $_SESSION['info'] = "Hasło musi składać się z małych i wielkich liter!";
                return false;
            } elseif (!preg_match("/\d/", $newPassword) OR !preg_match("/\W/", $newPassword) OR preg_match("/\s/", $newPassword)) {
                $_SESSION['info'] = "Hasło musi zawierać co najmniej jeden znak specjalny, cyfrę oraz nie może składać się ze znaków białych!";
                return false;
            } else {
                return true;
            }
        }
        else
        {
            $_SESSION['info'] = "Podane hasła są różne!";
            return false;
        }
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

    public function registration($firstName, $secondName, $email, $password)
    {
        $hashPassword = password_hash($password,PASSWORD_BCRYPT);

        $sth = $this->connection->pdo->prepare('INSERT INTO users (first_name, second_name, email, password) VALUE (:first_name,:second_name,:email,:password)');
        $sth->bindValue(':first_name', $firstName, PDO::PARAM_STR);
        $sth->bindValue(':second_name', $secondName, PDO::PARAM_STR);
        $sth->bindValue(':email', $email, PDO::PARAM_STR);
        $sth->bindValue(':password', $hashPassword, PDO::PARAM_STR);
        $sth->execute();

        die('Rejestracja pomyslna!');

    }

    public function saveResetKey(string $email, string $rkey)
    {
        try
        {
            $stmt = $this->connection->pdo->prepare('UPDATE users SET rkey=:rkey WHERE email=:email;');
            $stmt->bindValue(':rkey', $rkey, PDO::PARAM_STR);
            $stmt->bindValue(':email', $email, PDO::PARAM_STR);
            $stmt->execute();
        }
        catch(PDOException $e)
        {
            echo "Nie udało sie wysłac emaila";
            return;
        }
    }

    public function resetPassword(string $rkey, string $password, string $passwordRepeated)
    {
        try
        {
            if($password===$passwordRepeated){
                $stmt = $this->connection->pdo->prepare('UPDATE users SET password=:passwordNew WHERE rkey=:rkey;');
                $passwordHash = password_hash($password,PASSWORD_BCRYPT);
                $stmt->bindValue(':passwordNew', $passwordHash, PDO::PARAM_STR);
                $stmt->bindValue(':rkey', $rkey, PDO::PARAM_STR);
                $stmt->execute();
            }else{
                $_SESSION['info']="Podane hasła nie są jednakowe.";
            }
        }
        catch(PDOException $e)
        {
            echo "Nie udało sie zresetować hasła";
            return;
        }
    }
}