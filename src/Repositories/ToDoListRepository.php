<?php
declare(strict_types=1);
namespace App\Repositories;
use App\Database;
use PDOException;

class ToDoListRepository
{
    public Database $db;
    public $list;

    public function __construct()
    {
        $this->db=new Database;
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

    public function addNewTask(string $task, int $userID)
    {
        try
        {
            $query = "INSERT INTO `list` (user_id, task)
                        VALUES (:user_id, :task)";
            $stmt=$this->db->pdo->prepare($query);
            $stmt->bindValue(':task', $task, PDO::PARAM_STR);
            $stmt->bindValue(':userID', $userID, PDO::PARAM_INT);
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
                        WHERE `id=:id`";
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
}