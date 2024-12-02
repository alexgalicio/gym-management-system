<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fitness Infinity Gym Admin</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../../css/matrix-style.css" />
  <link rel="stylesheet" href="../../css/matrix-media.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <div id="header">
    <h1><a href="dashboard.html">Fitness Infinity Gym Admin</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>

  <?php $page = 'manage-staff';
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="staffs.php">Staff</a> <a href="staffs-entry.php" class="current">Add Staff</a> </div>
    </div>

    <form role="form" action="index.php" method="POST">
      <?php
      if (isset($_POST['fullname'])) {
        $fullname = $_POST["fullname"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $designation = $_POST["designation"];
        $gender = $_POST["gender"];
        $contact = $_POST["contact"];

        $first_name = strtok($fullname, " ");
        $last_4_digits = substr($contact, -4);
        if ($designation == 'Trainer') {
          $username = $first_name . $last_4_digits; 
          $password = md5($first_name . $last_4_digits);
        } else {
          $username = '';
          $password = '';
        }

        include 'dbcon.php';
        $qry = "insert into staffs(fullname,email,address,designation,gender,contact,username,password) values ('$fullname','$email','$address','$designation','$gender','$contact','$username', '$password')";
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
          echo "<a class='btn btn-warning btn-big'  href='staff.php'>Go Back</a> </div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        } else {
          echo "<div class='container-fluid'>";
          echo "<div class='row-fluid'>";
          echo "<div class='span12'>";
          echo "<div class='widget-box widget-box-bordered'>";
          echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
          echo "<h5>Message</h5>";
          echo "</div>";
          echo "<div class='widget-content'>";
          echo "<div class='error_ex'>";
          echo "<h1>Success</h1>";
          echo "<h3>Staff details has been added!</h3>";
          echo "<p>Click the button to go back.</p>";
          echo "<a class='btn btn-inverse btn-big'  href='staff.php'>Go Back</a> </div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
          echo "</div>";
        }
      } else {
        echo "<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
      }
      ?>
    </form>
  </div>
  </div>
  </div>
  </div>
  <div class="row-fluid">
    <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Fitness Infinity | Visit us at Citywalk Sports
      Center, Malolos, Bulacan | Call us: +63 935 776 2411</a> </div>
  </div>

  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/jquery.ui.custom.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.validate.js"></script>
  <script src="../../js/jquery.wizard.js"></script>
  <script src="../../js/matrix.js"></script>
  <script src="../../js/matrix.wizard.js"></script>
</body>

</html>