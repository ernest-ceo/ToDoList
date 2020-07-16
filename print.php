<?php
declare(strict_types=1);
require_once 'config/session.php';
require_once 'config/menu.php';
require_once 'src/Database.php';
require_once 'src/Repositories/ToDoListRepository.php';
require_once 'src/ListPrinter.php';
require_once __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;
use App\Database;
use App\Repositories\ToDoListRepository;
use App\ListPrinter;

if(!isset($_SESSION['username']))
{
    header('location: login.php');
    die;
}
else
{
    if(isset($_POST['print']))
    {
        $pdo = new Database(require_once ('config/database.php'));
        $listRepository = new ToDoListRepository($pdo);

        if(isset($_POST['category']))
        {
            $categoryURL = "?category=".$_POST['category'];
            $category = $_POST['category'];
        }
        else
        {
            $categoryURL = "?category=all";
            $category = "categories.name";
        }

        if(isset($_POST['sortBy']))
        {
            $sortByURL = "&sortBy=".$_POST['sortBy'];
            $sortBy = $_POST['sortBy'];
        }
        else
        {
            $sortBy = "list.id";
        }

        if(isset($_POST['orderBy'])&&$_POST['orderBy']==="ASC")
        {
            $orderBy = "ASC";
        }
        elseif (isset($_POST['orderBy'])&&$_POST['orderBy']==="DESC")
        {
            $orderBy = "DESC";
        }
        else
        {
            $orderBy = "";
        }

        $listArray = $listRepository->getAllByCategory($_SESSION['userID'], $category, $sortBy, $orderBy);
        $listPrinter = new ListPrinter();
        $mpdf = new Mpdf();
        $listToPrint = $listPrinter->printTheList($listArray);
        $mpdf->WriteHTML($listToPrint);
        $mpdf->Output('Lista.pdf', 'D');
        header('location: list.php');
    }
}
