<?php
include 'dbcon.php';

$sql = "SELECT * FROM members";
$query = $con->query($sql);

echo "$query->num_rows";
?>