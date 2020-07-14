<?php
declare(strict_types=1);
require_once 'config/menu.php';
require_once 'config/session.php';
require_once 'src/Database.php';
require_once 'src/Repositories/UsersRepository.php';
use App\Database;
use App\Repositories\UsersRepository;

if(isset($_POST['resetPassword']))
{
    $pdo = new Database(require_once ('config/database.php'));
    $passwordReset = new UsersRepository($pdo);
    $passwordReset->resetPassword($_GET['rkey'], $_POST['password'], $_POST['passwordRepeated']);
}

$content = array();
$content[0] = "./layouts/resetpassword.php";
include_once "./layouts/main.php";