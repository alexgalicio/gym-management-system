<?php session_start();
include 'dbcon.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitness Infinity</title>
    <link rel="stylesheet" href="../css/loginregister.css">
</head>

<body>

    <main>
        <div class="background">
            <a href="../index.php">
                <h1>Fitness Infinity</h1>
            </a>
        </div>

        <div class="form-container">
            <form method="POST" action="#" class="form">
                <div class="form-greet">
                    <h2>Reset Password</h2>
                </div>

                <div class="input-fields">
                    <input type="email" name="email" placeholder="Enter you email" required>
                </div>

                <div class="submit">
                    <button class="login" name="forgot-password">Send</button>
                </div>

                <?php

                if (isset($_POST['forgot-password'])) {
                    $email = $_POST["email"];

                    $token = bin2hex(random_bytes(16));
                    $token_hash = hash("sha256", $token);
                    $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

                    $sql = "update members set reset_token_hash = ?,
                reset_token_hash_exp_at = ? where email = ?";
                    $stmt = $con->prepare($sql);
                    $stmt->bind_param("sss", $token_hash, $expiry, $email);
                    $stmt->execute();


                    if ($con->affected_rows) {
                        $mail = require __DIR__ . "/mailer.php";

                        $mail->setFrom("noreply@gmail.com");
                        $mail->addAddress($email);
                        $mail->Subject = "Fitness Infinity Account Recovery";
                        $mail->Body = <<<END

                        We received a request to change the password associated with your email address ($email).
                        If you would like to change your password, please click 
                        <a href="http://localhost/Gym-System/pages/reset-password.php?token=$token">here</a>.
                        If you didn't make this request, or no longer need to change your password, you can ignore this email.

                        END;

                        try {
                            $mail->send();
                            echo "<span class='warning-message'>If an account exists for $email, 
                            we'll send an email with instructions on how to reset your password..</span>";
                        } catch (Exception $e) {
                            echo "<span class='error-message'>Message could not be sent. Mailer error: {$mail->ErrorInfo}</span>";
                        }

                    }
                }
                ?>



            </form>
        </div>
    </main>

</body>

</html>