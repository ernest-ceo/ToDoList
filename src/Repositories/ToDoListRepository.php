<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Database;
use PDO;
use PDOException;

class ToDoListRepository
{
    public $db;
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

    public function getDateByID($id)
    {
        try
        {
            $query = 'SELECT `id`, `date` FROM `list`
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

    public function addNewTask(string $task, int $categoryID, int $userID, $dateTimeAdd)
    {
        try
        {
            $query = "INSERT INTO `list` (user_id, task, date, category_id)
                        VALUES (:user_id, :task, :date_time_add, :category_id)";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':task', $task, PDO::PARAM_STR);
            $stmt->bindValue(':user_id', $userID, PDO::PARAM_INT);
            $stmt->bindValue(':date_time_add', $dateTimeAdd, PDO::PARAM_INT);
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

    public function updateTask(string $task, int $id, $date)
    {
        try
        {
            $query = "UPDATE `list`
                        SET `task`=:task, `date`=:date
                        WHERE `id`=:id";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':task', $task, PDO::PARAM_STR);
            $stmt->bindValue(':date', $date, PDO::PARAM_STR);
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
                    $_SESSION['info'] = "Podano błędne hasło";
                }
            }else{
                $_SESSION['info'] = "Podane hasła nie są jednakowe";
            }
        }
        catch(PDOException $e)
        {
            echo "Nie udało sie zaktualizować hasła";
            return;
        }
    }

    public function getAllByCategory($userID, $category, $sortBy="list.id", $orderBy="")
    {
        try
        {
            if($category==="'all'")
            {
                $query = "SELECT list.id, list.task, list.category_id, list.user_id, list.date FROM `list`, `categories`
                       WHERE list.user_id=:userID AND list.category_id = categories.id
                       ORDER BY $sortBy $orderBy";
            }
            else
            {

                $query = "SELECT list.id, list.task, list.category_id, list.user_id, list.date FROM `list`, `categories`
                       WHERE list.user_id=:userID AND categories.name= $category AND list.category_id = categories.id
                       ORDER BY ".$sortBy." ".$orderBy;
            }
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
}