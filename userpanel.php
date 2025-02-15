<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
require_once 'src/Repositories/UsersRepository.php';
use App\Database;
use App\Repositories\ToDoListRepository;
use App\Repositories\UsersRepository;

if(isset($_POST['updateData']))
{
    $pdo = new Database(require_once ('config/database.php'));
    $userPanel = new ToDoListRepository($pdo);
    $userPanel->updateData($_SESSION['userID'], $_POST['firstName'], $_POST['secondName']);
}

if(isset($_POST['updatePassword']))
{
    $pdo = new Database(require_once ('config/database.php'));
    $userPanel = new ToDoListRepository($pdo);
    $users = new UsersRepository($pdo);
    if($users->checkIfNewPasswordIsOk($_POST['passwordNew'], $_POST['passwordNewRepeated']))
    {
        $userPanel->updatePassword($_SESSION['userID'], $_POST['passwordOld'], $_POST['passwordNew'], $_POST['passwordNewRepeated']);
    }
}

$content = array();
$content[0] = "./layouts/userpanel.php";
include_once "./layouts/main.php";