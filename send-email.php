<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'http/phpmailer/src/Exception.php';
require 'http/phpmailer/src/PHPMailer.php';
require 'http/phpmailer/src/SMTP.php';


$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'fitnessinfinity081@gmail.com';
$mail->Password = 'fxzt zoum abho sjwf';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

$mail->setFrom('fitnessinfinity081@gmail.com');
$mail->addAddress('fitnessinfinity081@gmail.com');
$mail->addReplyTo($_POST["email"]);

$mail->isHTML(true);
$mail->Subject = $_POST["subject"];
$mail->Body = $_POST["message"];

try {
    $mail->send();
    echo "
        <script>
        alert('Message sent successfully!');
        document.location.href = 'contact.php';
        </script>
    ";
} catch (Exception $e) {
    echo "
        <script>
        alert('Message could not be sent. Mailer Error: {$mail->ErrorInfo}');
        document.location.href = 'contact.php';
        </script>
    ";
}

?>