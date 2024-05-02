<?php
require_once("MailSender.php");

$mailer = new MailSender("rmjanithnirmal@gmail.com");
$mailer->mailInitiate("mail sender test", "this is title", "<h1 style='color: red;'>Hellow World!</h1>");

$error = $mailer->sendMail();
if ($error) {
    echo $error;
} else {
    echo "no";
}
