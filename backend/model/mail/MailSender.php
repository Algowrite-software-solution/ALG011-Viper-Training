<?php
# developer : janith nirmal
# algowrite software solution
## date : 30-08-2023 
## version : 1.0.0

require_once "SMTP.php";
require_once "PHPMailer.php";
require_once "Exception.php";

use PHPMailer\PHPMailer\PHPMailer;

final class MailSender
{

    private $mail;
    private $senderMail;
    private $toAddress;
    private $password;

    public function __construct($toAddress)
    {
        $this->senderMail = 'trackaaofficial@gmail.com';
        $this->password = 'gijtkbbqyrnxnwzr';
        $this->toAddress = $toAddress;
    }

    public function mailInitiate($subject, $title, $bodyContent)
    {
        // email code
        $this->mail = new PHPMailer;
        $this->mail->IsSMTP();
        $this->mail->Host = 'smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = $this->senderMail;
        $this->mail->Password = $this->password;
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
        $this->mail->setFrom($this->senderMail, $title);
        $this->mail->addReplyTo($this->senderMail, $title);
        $this->mail->addAddress($this->toAddress);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;

        $this->mail->Body    = $bodyContent;
    }

    public function sendMail()
    {
        if (!$this->mail->send()) {
            return "Verification code sending failed";
        } else {
            return "success";
        }
    }
}
