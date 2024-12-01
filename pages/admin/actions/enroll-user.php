<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header('location:../index.php');
}

include 'dbcon.php';

$class_id = $_GET['class_id'];
$user_id = $_GET['id'];
$action = $_GET['action'];

if ($class_id && $user_id && $action) {
	$stmt = $con->prepare("SELECT capacity, enrolled FROM classes WHERE id = ?");
	$stmt->bind_param("i", $class_id);
	$stmt->execute();
	$result = $stmt->get_result();

	if ($result->num_rows > 0) {
		$class = $result->fetch_assoc();
		$capacity = $class['capacity'];
		$enrolled = $class['enrolled'];

		if ($action == 'enroll') {
			if ($enrolled < $capacity) {
				$new_enrolled = $enrolled + 1;

				$stmt = $con->prepare("SELECT amount FROM classes WHERE id = ?");
				$stmt->bind_param("i", $class_id);
				$stmt->execute();
				$result = $stmt->get_result();

				if ($result->num_rows > 0) {
					$class = $result->fetch_assoc();
					$amount = $class['amount'];
				} else {
					echo "<script>alert('Class not found.'); window.location.href='../book-class.php?id=$class_id';</script>";
					exit();
				}

				// insert to transaction history
				$currDate = date('Y-m-d');
				$stmt = $con->prepare("INSERT INTO transaction_history (user_id, amount, date) VALUES (?, ?, ?)");
				$stmt->bind_param("ids", $user_id, $amount, $currDate);
				$stmt->execute();

				// insert to user class
				$stmt = $con->prepare("INSERT INTO user_class (user_id, class_id) VALUES (?, ?)");
				$stmt->bind_param("ii", $user_id, $class_id);
				$stmt->execute();

				// update new enrolled count
				$stmt = $con->prepare("UPDATE classes SET enrolled = ? WHERE id = ?");
				$stmt->bind_param("ii", $new_enrolled, $class_id);
				$stmt->execute();

				echo "<script>alert('Booked successfully'); window.location.href='../book-class.php?id=$class_id';</script>";

			} else {
				echo "<script>alert('Sorry, this class is full.'); window.location.href='../book-class.php?id=$class_id';</script>";
			}
		} elseif ($action == 'remove') {
			// Remove the user from the class if they are enrolled
			$stmt = $con->prepare("SELECT * FROM user_class WHERE user_id = ? AND class_id = ?");
			$stmt->bind_param("ii", $user_id, $class_id);
			$stmt->execute();
			$result = $stmt->get_result();

			if ($result->num_rows > 0) {
				$new_enrolled = $enrolled - 1;

				$stmt = $con->prepare("DELETE FROM user_class WHERE user_id = ? AND class_id = ?");
				$stmt->bind_param("ii", $user_id, $class_id);
				$stmt->execute();

				$stmt = $con->prepare("UPDATE classes SET enrolled = ? WHERE id = ?");
				$stmt->bind_param("ii", $new_enrolled, $class_id);
				$stmt->execute();

				echo "<script>alert('User successfully removed from the class!'); window.location.href='../book-class.php?id=$class_id';</script>";
			} else {
				echo "<script>alert('User is not enrolled in this class.'); window.location.href='../book-class.php?id=$class_id';</script>";
			}
		}
	} else {
		echo "Class not found.";
	}
} else {
	echo "Invalid class or user information.";
}
?>