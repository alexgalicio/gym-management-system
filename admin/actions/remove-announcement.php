<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!isset($_GET['confirm'])) {
        echo '<script>
        if(confirm("DELETE THIS ANNOUNCEMENT? You will not be able to recover it")) {
            window.location.href = "' . $_SERVER['PHP_SELF'] . '?id=' . $id . '&confirm=yes";
        } else {
            window.location.href = "../manage-announcement.php";
        }
    </script>';
    } else {
        include 'dbcon.php';

        $qry = "delete from announcements where id=$id";
        $result = mysqli_query($con, $qry);
    
        if ($result) {
            echo "DELETED";
            header('Location:../manage-announcement.php');
        } else {
            echo "ERROR!!";
        }
    }

   
}
?>