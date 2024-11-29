<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

include 'dbcon.php';

$username = $_POST['username'];
$user_id = $_POST['user_id'];

// Exclude the current user's username
$query = "SELECT COUNT(*) FROM members WHERE username = '$username' AND user_id != '$user_id'";
$result = mysqli_query($con, $query);
$count = mysqli_fetch_array($result)[0];

echo $count;

?>