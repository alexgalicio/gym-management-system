<?php

include 'dbcon.php';

$sql = "SELECT * FROM equipment";
$query = $con->query($sql);

echo "$query->num_rows";
?>