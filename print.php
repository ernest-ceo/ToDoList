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

        $listArray = $listRepository->getAll($_SESSION['userID']);
        $listPrinter = new ListPrinter();
        $mpdf = new Mpdf();
        $listToPrint = $listPrinter->printTheList($listArray);
        $mpdf->WriteHTML($listToPrint);
        $mpdf->Output('Lista.pdf', 'D');
        header('location: list.php');
    }
}
