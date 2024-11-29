<!-- auto email notif -->

<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'http/phpmailer/src/Exception.php';
require 'http/phpmailer/src/PHPMailer.php';
require 'http/phpmailer/src/SMTP.php';

include 'dbcon.php';

$mail = new PHPMailer(true);
$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->SMTPAuth = true;
$mail->Username = 'fitnessinfinity081@gmail.com';
$mail->Password = 'fxzt zoum abho sjwf';
$mail->SMTPSecure = 'ssl';
$mail->Port = 465;

function sendEmailNotification($recipientEmail, $subject, $messageBody)
{
    global $mail;

    try {
        $mail->setFrom('fitnessinfinity081@gmail.com', 'Fitness Infinity');
        $mail->addAddress($recipientEmail);
        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $messageBody;

        $mail->send();
    } catch (Exception $e) {
        echo 'Mailer Error: ' . $mail->ErrorInfo;
    }
}

$sql = "SELECT * FROM members WHERE membership_end <= CURDATE() AND type = 'Regular'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $memberEmail = $row['email'];
        $memberName = $row['fullname'];

        $subject = 'Your Membership Has Expired';
        $messageBody = "Dear $memberName,<br><br>Your membership at Fitness Infinity has expired. Please renew your membership to continue enjoying our services.<br><br>Best regards,<br>Fitness Infinity";

        sendEmailNotification($memberEmail, $subject, $messageBody);

        $updateSql = "UPDATE members SET status = 'Expired' WHERE user_id = " . $row['user_id'];
        $con->query($updateSql);

        echo "Expired notification sent to: $memberName at $memberEmail<br>";
    }
}

$sqlSoon = "SELECT * FROM members WHERE membership_end BETWEEN CURDATE() AND DATE_ADD(CURDATE(), INTERVAL 7 DAY) AND type = 'Regular'";
$resultSoon = $con->query($sqlSoon);

if ($resultSoon->num_rows > 0) {
    while ($row = $resultSoon->fetch_assoc()) {
        $memberEmail = $row['email'];
        $memberName = $row['fullname'];

        $subject = 'Your Membership is Expiring Soon';
        $messageBody = "Dear $memberName,<br><br>Your membership will expire in 7 days. Please renew your membership soon to continue enjoying our services.<br><br>Best regards,<br>Fitness Infinity";

        sendEmailNotification($memberEmail, $subject, $messageBody);

        echo "Expiring soon notification sent to: $memberName at $memberEmail<br>";
    }
}

$con->close();
?>