<?php

session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

include 'dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['id'];
    $current_password = md5($_POST['current_password']);
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    if ($new_password !== $confirm_password) {
        $_SESSION['error'] = "New password and confirm password do not match";
        header("Location: ../edit-account.php");
        exit();
    }

    $sql = "SELECT * FROM staffs WHERE user_id = ? AND password = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("is", $user_id, $current_password);
    $stmt->execute();
    $result = $stmt->get_result();  

    if ($result->num_rows > 0) {
        $new_password_hash = md5($new_password);
        $update_sql = "UPDATE staffs SET password = ? WHERE user_id = ?";
        $update_stmt = $con->prepare($update_sql);
        $update_stmt->bind_param("si", $new_password_hash, $user_id);
        
        if ($update_stmt->execute()) {
            $_SESSION['success'] = "Password changed successfully";
        } else {
            $_SESSION['error'] = "Error changing password";
        }
    } else {
        $_SESSION['error'] = "Current password is incorrect";
    }

    header("Location: ../edit-account.php");

}
?>