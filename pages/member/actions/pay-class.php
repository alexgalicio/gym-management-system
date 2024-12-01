<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

include 'dbcon.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $classId = $_SESSION['class_id'];

    $qry = "INSERT INTO user_class (user_id, class_id) VALUES ('$userId', '$classId')";
    $result = mysqli_query($con, $qry);

    if ($result) {
        $updateQry = "UPDATE classes SET enrolled = enrolled + 1 WHERE id = '$classId'";
        $updateResult = mysqli_query($con, $updateQry);

        if ($updateResult) {
            header("Location: ../classes.php?payment=success");
        } else {
            echo "Error updating the class enrollment count.";
        }

    } else {
        echo "ERROR!!";
    }

} else {
    echo "Invalid request.";
}
?>