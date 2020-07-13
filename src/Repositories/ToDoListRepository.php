<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Database;
use PDO;
use PDOException;

class ToDoListRepository
{
    public Database $db;
    public $list;

    public function __construct($pdo)
    {
        $this->db=$pdo;
    }

    public function getAll(int $userID, string $orderBy='id')
    {
        try
        {
            $query = 'SELECT * FROM `list`
                       WHERE `user_id`=:userID
                       ORDER BY '.$orderBy;
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':userID', $userID, PDO::PARAM_INT);
            $result = $stmt->execute();
            if($result===true)
            {
                $this->list=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $this->list;
            } else {
                return;
            }
            $stmt->closeCursor();
        }
        catch (PDOException $e) {
            echo "Nie udało się odczytać danych z bazy.";
        }
    }

    public function getTaskByID($id)
    {
        try
        {
            $query = 'SELECT `id`, `task` FROM `list`
                       WHERE `id`=:id';
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            if($result===true)
            {
                $this->list=$stmt->fetch();
                return $this->list;
            } else {
                return;
            }
            $stmt->closeCursor();
        }
        catch (PDOException $e) {
            echo "Nie udało się odczytać danych z bazy.";
        }
    }

    public function addNewTask(string $task, int $categoryID, int $userID)
    {
        try
        {
            $query = "INSERT INTO `list` (user_id, task, category_id)
                        VALUES (:user_id, :task, :category_id)";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':task', $task, PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $userID, PDO::PARAM_INT);
            $stmt->bindValue(':category_id', $categoryID, PDO::PARAM_INT);
            $result = $stmt->execute();
            return (bool)($result);
        }
        catch (PDOException $e)
        {
            echo "Nie udało się dodać rekordu do bazy danych";
            return;
        }
    }

    public function updateTask(string $task, int $id)
    {
        try
        {
            $query = "UPDATE `list`
                        SET `task`=:task
                        WHERE `id`=:id";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':task', $task, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result=$stmt->execute();
            return (bool)($result);
        }
        catch (PDOException $e)
        {
            echo "Nie udało się dokonać zmiany w rekordzie.";
            return;
        }
    }

    public function deleteTask(int $id)
    {
        try
        {
            $query = "DELETE FROM `list`
                        WHERE `id`=:id";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $result = $stmt->execute();
            return (bool)($result);
        }
        catch (PDOException $e)
        {
            echo "Nie udało się usunąć danego rekordu z bazy danych";
            return;
        }
    }

    public function updateData(int $id, string $firstName, string $secondName)
    {
        try
        {
            $query = "UPDATE users SET first_name=:first_name, second_name=:second_name WHERE id=:id";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':first_name', $firstName, PDO::PARAM_STR);
            $stmt->bindValue(':second_name', $secondName, PDO::PARAM_STR);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $query = "SELECT `id`, `first_name`, `second_name`, `email`, `password` FROM `users` WHERE id=:id";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
            $_SESSION['userFirstName']=$userData['first_name'];
            $_SESSION['userSecondName']=$userData['second_name'];
            header("Refresh:0; ./userpanel.php");
        }
        catch(PDOException $e)
        {
            echo "Nie udało sie zaktualizować danych";
            return;
        }
    }

    public function updatePassword(int $id, string $passwordOld,string $passwordNew, string $passwordNewRepeated)
    {
        try
        {
            if($passwordNew===$passwordNewRepeated){
                $stmt = $this->db->pdo->prepare('SELECT `password` FROM `users` WHERE id=:id');
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                $userData = $stmt->fetch(PDO::FETCH_ASSOC);
                $passwordOldHash = $userData['password'];
                if(password_verify($passwordOld, $passwordOldHash)){
                    $passwordNewHash = password_hash($passwordNew,PASSWORD_BCRYPT);
                    $query = "UPDATE users SET password=:passwordNewHash WHERE id=:id";
                    $stmt=$this->db->pdo->prepare($query);
                    $stmt->bindValue(':passwordNewHash', $passwordNewHash, PDO::PARAM_STR);
                    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                    $stmt->execute();
                    echo('Hasło zostało zmienione');
                }else{
                    echo('Podano nieprawidłowe hasło');
                }
            }else{
                echo('Podane hasła nie są jednakowe');
            }
        }
        catch(PDOException $e)
        {
            echo "Nie udało sie zmienić hasła";
            return;
        }
    }

    public function getAllByCategory($userID, $category, $orderBy="list.id")
    {
        try
        {
            $query = "SELECT * FROM `list`, `categories`
                       WHERE list.user_id=:userID AND categories.name= $category AND list.category_id = categories.id
                       ORDER BY ".$orderBy;
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':userID', $userID, PDO::PARAM_INT);
//            $stmt->bindValue(':categoryName', $category, PDO::PARAM_STR);
            $result = $stmt->execute();
            if($result===true)
            {
                $this->list=$stmt->fetchAll(PDO::FETCH_ASSOC);
                return $this->list;
            } else {
                return;
            }
            $stmt->closeCursor();
        }
        catch (PDOException $e) {
            echo "Nie udało się odczytać danych z bazy.";
        }
    }
}