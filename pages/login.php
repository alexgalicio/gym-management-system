<?php session_start();
include('dbcon.php'); ?>

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
            <form id="loginform" method="POST" action="#" class="form">

                <div class="form-greet">
                    <h2>Hello Again!</h2>
                    <h3>Welcome back</h3>
                </div>

                <?php
                if (isset($_GET['message'])) {
                    echo "<p class='success-message'>" . htmlspecialchars($_GET['message']) . "</p>";
                }
                ?>

                <div class="input-fields">
                    <input type="text" name="user" placeholder="Username" required>
                    <input type="password" name="pass" placeholder="Password" required />
                    <a href="forgot-password.php" class="align-right">Forgot password?</a>
                </div>

                <div class="submit">
                    <button class="login" type="submit" name="login" value="Admin Login">Log In</button>
                    <a href="member/register.php" class="align-center">Don't have an account? Click here</a>
                </div>

                <?php
                if (isset($_POST['login'])) {
                    $username = mysqli_real_escape_string($con, $_POST['user']);
                    $password = mysqli_real_escape_string($con, $_POST['pass']);

                    $password = md5($password);

                    // admin
                    $query_admin = mysqli_query($con, "SELECT * FROM admin WHERE  password='$password' and username='$username'");
                    $row_admin = mysqli_fetch_array($query_admin);
                    $num_row_admin = mysqli_num_rows($query_admin);

                    if ($num_row_admin > 0) {
                        $_SESSION['user_id'] = $row_admin['user_id'];
                        header('location:admin/index.php');

                    }

                    // user
                    $query_user = mysqli_query($con, "SELECT * FROM members WHERE  password='$password' and username='$username'");
                    $row_user = mysqli_fetch_array($query_user);
                    $num_row_user = mysqli_num_rows($query_user);

                    if ($num_row_user > 0) {
                        $_SESSION['user_id'] = $row_user['user_id'];
                        header('location:member/index.php');
                    }

                    // trainer
                    $query_trainer = mysqli_query($con, "SELECT * FROM staffs WHERE password='$password' and username='$username'");
                    $row_trainer = mysqli_fetch_array($query_trainer);
                    $num_row_trainer = mysqli_num_rows($query_trainer);

                    if ($num_row_trainer > 0) {
                        $_SESSION['user_id'] = $row_trainer['user_id'];
                        header('location:trainer/index.php');
                    }

                    echo "<div class='alert-error' role='alert'>
                                Invalid Username or Password
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                    <span aria-hidden='true'>&times;</span>
                                </button>
                                </div>";

                }
                ?>

            </form>
        </div>
    </main>

    <script src="../js/jquery.min.js"></script>
    <script src="../js/matrix.login.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/matrix.js"></script>

</body>

</html>