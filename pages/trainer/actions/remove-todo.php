<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include 'dbcon.php';


    $qry = "delete from todo where id=$id";
    $result = mysqli_query($con, $qry);

    if ($result) {
        echo "DELETED";
        header('Location:../index.php');
    } else {
        echo "ERROR!!";
    }
}
?>