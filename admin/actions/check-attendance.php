<?php

session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
}

include('../dbcon.php');
date_default_timezone_set('Asia/Manila');
$current_date = date('Y-m-d h:i A');
$exp_date_time = explode(' ', $current_date);
$curr_date = $exp_date_time['0'];
$curr_time = $exp_date_time['1'] . ' ' . $exp_date_time['2'];

$user_id = $_GET['id'];

$sql = "INSERT INTO attendance (user_id, curr_date,curr_time,present)
   VALUES ('$user_id','$curr_date','$curr_time',1)";


if ($con->query($sql) === TRUE) {
  $attend_count = 0;
  $attend = "select * from members where user_id = '$user_id'";
  $result_attend = $con->query($attend);
  $row_attend = mysqli_fetch_array($result_attend);
  $cnt = $row_attend['attendance_count'];
  $attend_count = $attend_count + 1;
  $sql1 = "UPDATE members SET attendance_count = attendance_count + '$attend_count' where user_id='$user_id'";
  $con->query($sql1);


  if ($row_attend['type'] == 'Regular' || $row_attend['type'] == 'Student') {
    $amount = 50;
  } elseif ($row_attend['type'] == 'Walk-in') {
    $amount = 80;
  } else {
    $amount = 0;
  }

  $sql_transaction = "INSERT INTO transaction_history (user_id, amount, date)
                      VALUES ('$user_id', '$amount', '$curr_date')";
  $con->query($sql_transaction);

  ?>
  <script type="text/javascript">
    window.location = "../attendance.php";
  </script>
  <?php
} else {

  $_SESSION['error'] = 'Something Went Wrong';
  ?>
  <script type="text/javascript">
    window.location = "../attendance.php";
  </script>
  <?php
}

?>