<?php
declare(strict_types=1);
require_once 'config/session.php';
require_once 'config/database.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
use App\Database;
use App\Repositories\ToDoListRepository;

if(!isset($_SESSION['user']))
{
    header('location: login.php');
    die;
}
else
{
    if(isset($_POST['print']))
    {
        $pdo = new Database(require_once 'config/database.php');
        $listRepository = new ToDoListRepository($pdo);
        $_SESSION['userID']=1;
        $listArray = $listRepository->getAll($_SESSION['userID']);
    }
}
