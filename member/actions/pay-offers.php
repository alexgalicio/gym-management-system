<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../index.php');
}

include 'dbcon.php';

if (isset($_GET['user_id'])) {
    $userId = $_GET['user_id'];
    $offerId = $_SESSION['offer_id'];
    
    $qry = "INSERT INTO user_offers (user_id, offer_id) VALUES ('$userId', '$offerId')";
    
    $result = mysqli_query($con, $qry);

    if ($result) {
        header("Location: ../promo-offers.php?payment=success");
    } else {
        echo "ERROR!!";
    }

} else {
    echo "Invalid request.";
}
?>