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
    header('location: login.php');
    die;
}
if(isset($_POST['add']))
{
    $content[0]= 'layouts/add.php';
}
if(isset($_POST['task'])&&$_POST['task']!=="")
{
    $pdo = new Database(require_once ('config/database.php'));
    $listRepository = new ToDoListRepository($pdo);
    $listRepository->addNewTask($_POST['task'], $_SESSION['userID']);
    header('location: list.php');
    die;
}
include_once 'layouts/main.php';