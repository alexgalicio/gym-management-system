<?php
$trainer = $_SESSION['user_id'];

include 'dbcon.php';

$qry = "SELECT COUNT(DISTINCT uc.user_id) AS enrollment_count
        FROM user_class uc
        INNER JOIN classes c ON uc.class_id = c.id
        WHERE c.trainer = $trainer";

$query = $con->query($qry);

if ($query) {
    $row = $query->fetch_assoc();
    echo $row['enrollment_count'];
} else {
    echo "Error: " . $con->error;
}
?>
