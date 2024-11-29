<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    if (!isset($_GET['confirm'])) {
        echo '<script>
            if(confirm("DELETE THIS STAFF? You will not be able to recover it")) {
                window.location.href = "' . $_SERVER['PHP_SELF'] . '?id=' . $id . '&confirm=yes";
            } else {
                window.location.href = "staff.php";
            }
        </script>';
    } else {
        include 'dbcon.php';
        
        $qry = "delete from staffs where user_id=$id";
        $result = mysqli_query($con, $qry);
        if ($result) {
            header('location:staff.php');
            exit();
        } else {
            echo "ERROR!!";
        }
    }
}
?>
