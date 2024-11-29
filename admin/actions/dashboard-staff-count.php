<?php

include 'dbcon.php';

$sql = "SELECT * FROM staffs";
$query = $con->query($sql);

echo "$query->num_rows";
?>