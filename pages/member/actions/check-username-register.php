<?php
include 'dbcon.php';

$username = $_GET['username'];

$username = mysqli_real_escape_string($con, $username);

$query = "SELECT * FROM members WHERE username = '$username'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    echo "not_available";
} else {
    echo "available";
}

$con->close();
?>