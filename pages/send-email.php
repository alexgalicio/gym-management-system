<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../others/phpmailer/src/Exception.php';
require '../others/phpmailer/src/PHPMailer.php';
require '../others/phpmailer/src/SMTP.php';

// fitness infinity gmail
// email: fitnessinfinity081@gmail.com
// password: f!tness!nf!n!ty
// app password: dflf qlwz uuaz pktv

$mail = new PHPMailer(true);

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'fitnessinfinity081@gmail.com';
$mail->Password = 'dflf qlwz uuaz pktv';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
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