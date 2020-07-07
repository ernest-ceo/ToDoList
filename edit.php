<?php
declare(strict_types=1);
require_once 'config/session.php';
require_once 'config/menu.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
use App\Database;
use App\Repositories\ToDoListRepository;

if(!isset($_SESSION['username']))
{
    header('location: list.php');
    die;
}
elseif(isset($_POST['edit']))
{
    $pdo = new Database(require_once ('config/database.php'));
    $listRepository = new ToDoListRepository($pdo);
    $taskToDisplay = $listRepository->getTaskByID($_POST['edit']);
    $content[0]= 'layouts/edit.php';
}
elseif(isset($_POST['task'])&&$_POST['task']!=="")
{
    $pdo = new Database(require_once ('config/database.php'));
    $listRepository = new ToDoListRepository($pdo);
    $listRepository->updateTask($_POST['task'], (int)$_POST['taskID']);
    header('location: list.php');
    die;
}
else
{
    header('location: list.php');
    die;
}
include_once 'layouts/main.php';