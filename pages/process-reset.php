<?php
$token = $_POST["token"];
$token_hash = hash("sha256", $token);

include "dbcon.php";

$sql = "SELECT * FROM members
        WHERE reset_token_hash = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $token_hash);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user === null) {
    die("Token not found");
}

if (strtotime($user["reset_token_hash_exp_at"]) <= time()) {
    die("Token has expired");
}

$password_hash = md5($_POST["password"]);

$sql = "UPDATE members
        SET password = ?,
            reset_token_hash = NULL,
            reset_token_hash_exp_at = NULL
        WHERE user_id = ?";

$stmt = $con->prepare($sql);

$stmt->bind_param("ss", $password_hash, $user["user_id"]);

if ($stmt->execute()) {
    header("Location: login.php?message=Password%20changed%20successfully");
    exit;
} else {
    echo "Error updating password: " . $stmt->error;
}