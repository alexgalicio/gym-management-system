
<?php
$trainer_id = $_SESSION['user_id'];

include 'dbcon.php';

$sql = "SELECT * from classes WHERE trainer = $trainer_id";
$query = $con->query($sql);

echo "$query->num_rows";
?>