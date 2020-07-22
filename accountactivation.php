<?php
use App\Database;
use App\Repositories\UsersRepository;

require_once 'src/Database.php';
require_once 'src/Repositories/UsersRepository.php';
require_once 'config/session.php';

if(isset($_GET['vkey']))
{
    $vkey = $_GET['vkey'];
    $pdo = new Database(require_once ('config/database.php'));
    $users = new UsersRepository($pdo);
    if($users->verifyAccount($vkey))
    {
        $_SESSION['confirmation']="Pomyślnie aktywowano konto. Możesz się zalogować.";
        header('location: login.php');
    }
    else
    {
        $_SESSION['info']="Konto nie istnieje! Zarejestruj się.";
        header('location: registration.php');
    }
}
else
{
    $_SESSION['info']="Dostęp zabroniony.";
    header('location: index.php');
}