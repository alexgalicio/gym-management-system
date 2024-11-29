<?php

include 'dbcon.php';

$sql = "SELECT SUM(amount) FROM transaction_history";

$amountsum = mysqli_query($con, $sql) or die(mysqli_error($sql));
$row_amountsum = mysqli_fetch_assoc($amountsum);

$total_amount = number_format($row_amountsum['SUM(amount)'], 2);

echo $total_amount;
?>