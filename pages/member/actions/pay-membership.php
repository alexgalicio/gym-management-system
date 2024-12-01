<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

include 'dbcon.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];

    $qry = "UPDATE members 
        SET status = 'Active', 
            type = 'Regular', 
            amount = 300, 
            membership_start = CURDATE(), 
            membership_end = DATE_ADD(CURDATE(), INTERVAL 12 MONTH) 
        WHERE user_id = $userId";

    $result = mysqli_query($con, $qry);

    if ($result) {
        header("Location: ../membership.php?payment=success");
    } else {
        echo "ERROR!!";
    }

} else {
    echo "Invalid request.";
}

?>