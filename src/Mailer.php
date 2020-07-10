<?php

declare(strict_types = 1);
namespace App;

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;


class Mailer
{
    public PHPMailer $mailer;
    public UsersRepository $users;

    public function __construct(PHPMailer $mailer)
    {
        $this->mailer = $mailer;
        try {
            $this->mailer->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );
//            $this->mailer->SMTPDebug = SMTP::DEBUG_SERVER;
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->Username = 'todolistwo6@gmail.com';
            $this->mailer->Password = 'todolist12345';
            $this->mailer->SMTPAuth = true;
            $this->mailer->SMTPSecure = "tls";
            $this->mailer->Port = 587;
        } catch (Exception $e) {
            echo "Nie udało się poprawnie zainicjować obiektu klasy Mailer.";
        }
    }

    public function sendAccountActivationMessage(string $receiver, string $verificationKey)
    {
        try {
            $this->mailer->setFrom('todolist@gmail.com', 'ToDoList');
            $this->mailer->addAddress($receiver);
            $this->mailer->isHTML(true);
            $this->mailer->Subject = 'Aktywacja konta';
            $body = '<a href="http://localhost/ToDoList/accountactivation.php?vkey=' . $verificationKey . '">Aktywuj konto</a>';
            $this->mailer->Body = $body;
            $this->mailer->AltBody = $body;
            $this->mailer->send();
            $this->mailer->smtpClose();
            return true;
        } catch (Exception $e) {
            echo "Wiadomość nie została wysłana!";
            return false;
        }
    }
}