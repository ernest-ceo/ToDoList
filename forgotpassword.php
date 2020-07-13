<?php
declare(strict_types=1);
use PHPMailer\PHPMailer\PHPMailer;
use App\Database;
use App\Repositories\UsersRepository;
use App\Mailer;

require 'vendor/autoload.php';
require_once "config/session.php";
require_once "config/menu.php";
require_once "src/Database.php";
require_once "src/Repositories/UsersRepository.php";
require_once "src/Mailer.php";


if(isset($_POST['email'])){
    $pdo = new Database(require_once ('config/database.php'));
    $createTemporaryKey = new UsersRepository($pdo);
        if($createTemporaryKey->checkIfEmailTaken($_POST['email']))
        {
            $rkey = md5(time().$_POST['email']);
            $createTemporaryKey->saveResetKey($_POST['email'], $rkey);
            $PHPmailer = new PHPMailer(true);
            $mailer = new Mailer($PHPmailer);
            $mailer->sendPasswordResetMessage($_POST['email'], $rkey);
            $_SESSION['info']="Wysłano emaila.";
        }else{
            $_SESSION['info']="Podano nieprawidłowy email.";
        }
}

$content = array();
$content[0] = "./layouts/forgotpassword.php";
include_once "./layouts/main.php";