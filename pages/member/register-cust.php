<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fitness Infinity</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../../css/fullcalendar.css" />
    <link rel="stylesheet" href="../../css/matrix-style.css" />
    <link rel="stylesheet" href="../../css/matrix-media.css" />
    <link rel="stylesheet" href="../../css/jquery.gritter.css" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <form role="form" action="index.php" method="POST">
        <?php

        if (isset($_POST['fullname'])) {
            $fullname = $_POST["fullname"];
            $username = $_POST["username"];
            $password = $_POST["password"];
            $gender = $_POST["gender"];
            $type = $_POST["type"];
            $email = $_POST["email"];
            $address = $_POST["address"];
            $contact = $_POST["contact"];

            $password = md5($password);

            $amount = 0;
            $status = 'Active';
            $membership_start = null;
            $membership_end = null;

            if ($type === 'Regular') {
                $amount = 300;
                $status = 'Pending';
                $membership_start = 'Pending';
                $membership_end = 'Pending';
            }

            include 'dbcon.php';
            $qry = "insert into members(fullname,username,password,gender,type,email,address,contact,status,membership_start, membership_end,amount) 
            values ('$fullname','$username','$password','$gender','$type', '$email','$address','$contact', '$status', '$membership_start', '$membership_end', '$amount')";
            $result = mysqli_query($con, $qry);

            if (!$result) {
                echo "<div class='container-fluid'>";
                echo "<div class='row-fluid'>";
                echo "<div class='span12'>";
                echo "<div class='widget-box widget-box-bordered'>";
                echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                echo "<h5>Error Message</h5>";
                echo "</div>";
                echo "<div class='widget-content'>";
                echo "<div class='error_ex'>";
                echo "<h1 style='color:maroon;'>Error</h1>";
                echo "<h3>Oops! Something went wrong while processing your request.</h3>";
                echo "<p>We couldn't find the page you were looking for, or there was an issue with the details you entered.</p>";
                echo "<a class='btn btn-warning btn-big'  href='pages/index.php'>Go Back</a> </div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
            } else {

                header('location:../login.php');

            }

        } else {
            echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
        }

        ?>
    </form>


    <script src="../../js/excanvas.min.js"></script>
    <script src="../../js/jquery.min.js"></script>
    <script src="../../js/jquery.ui.custom.js"></script>
    <script src="../../js/bootstrap.min.js"></script>
    <script src="../../js/jquery.flot.min.js"></script>
    <script src="../../js/jquery.flot.resize.min.js"></script>
    <script src="../../js/jquery.peity.min.js"></script>
    <script src="../../js/fullcalendar.min.js"></script>
    <script src="../../js/matrix.js"></script>
    <script src="../../js/matrix.dashboard.js"></script>
    <script src="../../js/jquery.gritter.min.js"></script>
    <script src="../../js/matrix.interface.js"></script>
    <script src="../../js/jquery.validate.js"></script>
    <script src="../../js/matrix.form_validation.js"></script>
    <script src="../../js/jquery.wizard.js"></script>
    <script src="../../js/jquery.uniform.js"></script>
    <script src="../../js/select2.min.js"></script>
    <script src="../../js/matrix.popover.js"></script>
    <script src="../../js/jquery.dataTables.min.js"></script>
    <script src="../../js/matrix.tables.js"></script>

</body>

</html>