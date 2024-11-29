<?php
include 'dbcon.php';

$sql = "SELECT * FROM staffs WHERE designation='Trainer'";
$query = $con->query($sql);

echo "$query->num_rows";
?>