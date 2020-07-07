<?php
declare(strict_types=1);
require_once 'config/session.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
use App\Database;
use App\Repositories\ToDoListRepository;

if(!isset($_SESSION['username']))
{
    header('location: login.php');
    die;
}
if(isset($_POST['delete']))
{
    $pdo = new Database(require_once ('config/database.php'));
    $listRepository = new ToDoListRepository($pdo);
    $listRepository->deleteTask((int)$_POST['delete']);
    header('location: list.php');
}