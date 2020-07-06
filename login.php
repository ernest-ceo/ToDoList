<?php
declare(strict_types=1);

require_once 'config/session.php';
require_once 'config/menu.php';
require_once 'src/Database.php';
require_once 'src/Repositories/UsersRepository.php';
use App\Database;
use App\Repositories\UsersRepository;


if(isset($_SESSION['username'])){
    header('location: index.php');
    die ("<h3>Jestes juz zalogowany</h3>");
}

if(isset($_POST['login'])){
    $pdo = new Database(require_once ('config/database.php'));
    $users = new UsersRepository($pdo);
    $users->tryToLogIn($_POST['email'], $_POST['password']);
}

$content = array();
$content[0] = "./layouts/login.php";
include_once "./layouts/main.php";