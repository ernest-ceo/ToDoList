<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
use App\Database;
use App\Repositories\ToDoListRepository;

if(isset($_POST['update']))
{
    $pdo = new Database(require_once ('config/database.php'));
    $userPanel = new ToDoListRepository($pdo);
    $userPanel->updateData($_SESSION['userID'], $_POST['firstName'], $_POST['secondName']);
}

$content = array();
$content[0] = "./layouts/userpanel.php";
include_once "./layouts/main.php";