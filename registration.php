<?php
declare(strict_types=1);
use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
use App\Database;
use App\Repositories\UsersRepository;
use App\Mailer;

require 'vendor/autoload.php';
require_once "config/session.php";
require_once "config/menu.php";
require_once "src/Database.php";
require_once "src/Repositories/UsersRepository.php";
require_once "src/Mailer.php";

if(isset($_POST['register']))
{
    if($_POST['first_name']==="" OR $_POST['second_name']==="" OR $_POST['email']==="" OR $_POST['password']==="" OR $_POST['confirmPassword']==="")
    {
        $_SESSION['info'] = "Wypełnij wymagane pola!";
    }
    else
    {
        $pdo = new Database(require_once ('config/database.php'));
        $users = new UsersRepository($pdo);
        if($users->checkIfEmailTaken($_POST['email']))
        {
            $_SESSION['info'] = "Podany adres e-mail jest zajęty! Wprowadź inne dane.";
        }
        else
        {
            if($users->checkIfNewPasswordIsOk($_POST['password'], $_POST['confirmPassword']))
            {
                $vkey = md5(time().$_POST['email']);
                $PHPmailer = new PHPMailer(true);
                $mailer = new Mailer($PHPmailer);
                if($mailer->sendAccountActivationMessage($_POST['email'], $vkey))
                {
                    $hashedPassword = password_hash($_POST['password'],PASSWORD_BCRYPT);
                    $users->createNewUser($_POST['first_name'], $_POST['second_name'], $_POST['email'], $hashedPassword, $vkey);
                    $_SESSION['confirmation'] = "Dodano nowego użytkownika. Link aktywacyjny został wysłany na podany adres e-mail.";
                }
            }
        }
    }
}
$content = array();
$content[0] = "layouts/registration.php";
include_once 'layouts/main.php';