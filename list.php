<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
use App\Database;
use App\Repositories\ToDoListRepository;

if(isset($_SESSION['username']))
{
    $pdo = new Database(require_once 'config/database.php');
    $listRepository = new ToDoListRepository($pdo);
    $_SESSION['userID']=1;
    $listArray = $listRepository->getAll($_SESSION['userID']);
}
else
{
    header('location: logowanie.php');
    die;
}
$content[0] = 'layouts/list.php';
include_once 'layouts/main.php';