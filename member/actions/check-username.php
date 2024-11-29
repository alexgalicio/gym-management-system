<?php
include 'dbcon.php';

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

$username = $_POST['username'];
$id = $_POST["id"];

// Exclude the current user's username
$query = "SELECT COUNT(*) FROM members WHERE username = '$username' AND user_id != '$id'";
$result = mysqli_query($con, $query);
$count = mysqli_fetch_array($result)[0];
?>