<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (!isset($_GET['confirm'])) {
        echo '<script>
            if(confirm("DELETE THIS CLASS? You will not be able to recover it")) {
                window.location.href = "' . $_SERVER['PHP_SELF'] . '?id=' . $id . '&confirm=yes";
            } else {
                window.location.href = "../classes.php";
            }
        </script>';
    } else {
        include 'dbcon.php';

        mysqli_begin_transaction($con);

        try {
            $enrollments_query = "DELETE FROM user_class WHERE class_id = ?";
            $stmt = mysqli_prepare($con, $enrollments_query);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);

            $class_query = "DELETE FROM classes WHERE id = ?";
            $stmt = mysqli_prepare($con, $class_query);
            mysqli_stmt_bind_param($stmt, 'i', $id);
            mysqli_stmt_execute($stmt);

            mysqli_commit($con);

            header('location:../classes.php');
            exit();
        } catch (Exception $e) {
            mysqli_roll_back($con);
            echo "ERROR: " . $e->getMessage();
        }
    }
}
?>