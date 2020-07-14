<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';
require_once 'config/config.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
use App\Database;
use App\Repositories\ToDoListRepository;

if(isset($_SESSION['userID']))
{
    $pdo = new Database(require_once ('config/database.php'));
    $listRepository = new ToDoListRepository($pdo);
    if(isset($_GET['category']))
    {
        $categoryURL = "?category=".$_GET['category'];
        $category = "'".$_GET['category']."'";
    }
    else
    {
        $categoryURL = "?category=all";
        $category = "categories.name";
    }

    if(isset($_GET['sortBy']))
    {
        $sortByURL = "&sortBy=".$_GET['sortBy'];
        $sortBy = $_GET['sortBy'];
    }
    else
    {
        $sortBy = "list.id";
    }

    if(isset($_GET['orderBy'])&&$_GET['orderBy']==="ASC")
    {
        $orderBy = "ASC";
    }
    elseif (isset($_GET['orderBy'])&&$_GET['orderBy']==="DESC")
    {
        $orderBy = "DESC";
    }
    else
    {
        $orderBy = "";
    }
    $listArray = $listRepository->getAllByCategory($_SESSION['userID'], $category, $sortBy, $orderBy);
}
else
{
    header('location: login.php');
    die;
}
$content[0] = 'layouts/list.php';
include_once 'layouts/main.php';