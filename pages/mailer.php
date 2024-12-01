<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require '../others/phpmailer/src/Exception.php';
require '../others/phpmailer/src/PHPMailer.php';
require '../others/phpmailer/src/SMTP.php';

include 'dbcon.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->Host = 'smtp.gmail.com';
$mail->Username = 'fitnessinfinity081@gmail.com';
$mail->Password = 'fxzt zoum abho sjwf';
$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
$mail->Port = 587;

$mail->isHTML(true);
return $mail;

?>