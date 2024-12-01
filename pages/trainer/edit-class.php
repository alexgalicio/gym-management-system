<?php
session_start();
if (!isset($_SESSION['user_id'])) {
	header('location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Fitness Infinity</title>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" href="../../css/bootstrap.min.css" />
	<link rel="stylesheet" href="../../css/bootstrap-responsive.min.css" />
	<link rel="stylesheet" href="../../css/fullcalendar.css" />
	<link rel="stylesheet" href="../../css/matrix-style.css" />
	<link rel="stylesheet" href="../../css/matrix-media.css" />
	<link rel="stylesheet" href="../../css/jquery.gritter.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
	<div id="header">
		<h1><a href="dashboard.html">Fitness Infinity</a></h1>
	</div>

	<?php include 'includes/topheader.php' ?>

	<?php $page = 'classes';
	include 'includes/sidebar.php' ?>

	<?php
	include 'dbcon.php';
	$id = $_GET['id'];
	$qry = "SELECT * from classes WHERE id = '$id'";
	$result = mysqli_query($con, $qry);

	while ($row = mysqli_fetch_array($result)) {
		$selectedTrainer = $row["trainer"];
		?>
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
						Home</a> <a href="classes.php" class="tip-bottom">Classes</a> <a href="#" class="current">Edit
						Class</a>
				</div>
				<h1 class="text-center">Edit Class Details</h1>
			</div>
			<div class="container-fluid">
				<div class="row-fluid">
					<div class="span6">
						<div class="widget-box widget-box-bordered">
							<div class="widget-title"> <span class="icon"> <i class="fas fa-chalkboard"></i> </span>
								<h5>Class Information</h5>
							</div>
							<div class="widget-content nopadding">
								<form action="edit-class-req.php" method="POST" class="form-horizontal" id="memberForm">
									<div class="control-group">
										<label class="control-label">Class Name :</label>
										<div class="controls">
											<input type="text" class="span11" name="classname" minlength="3" required
												value='<?php echo $row['classname']; ?>' />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Capacity :</label>
										<div class="controls">
											<input type="number" class="span11" name="capacity" min="0" required
												value='<?php echo $row['capacity']; ?>' />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Amount :</label>
										<div class="controls">
											<input type="number" class="span11" name="amount" min="0" step="0.01" required
												value='<?php echo $row['amount']; ?>' />
										</div>
									</div>
							</div>
						</div>
					</div>

					<div class="span6">
						<div class="widget-box widget-box-bordered">
							<div class="widget-title"> <span class="icon"> <i class="fas fa-clock "></i> </span>
								<h5>Date & Time</h5>
							</div>
							<div class="widget-content nopadding">
								<div class="form-horizontal">
									<div class="control-group">
										<label class="control-label">Date :</label>
										<div class="controls">
											<input type="date" class="span11" name="date"
												value='<?php echo $row['date']; ?>' required />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">Start Time :</label>
										<div class="controls">
											<input type="time" class="span11" name="start_time"
												value='<?php echo $row['start_time']; ?>' required />
										</div>
									</div>
									<div class="control-group">
										<label class="control-label">End Time :</label>
										<div class="controls">
											<input type="time" class="span11" name="end_time"
												value='<?php echo $row['end_time']; ?>' />
										</div>
									</div>
									<div class="form-actions text-center">
										<input type="hidden" name="id" value="<?php echo $row['id']; ?>">
										<button type="submit" class="btn btn-primary">Save</button>
									</div>
									</form>
								</div>
							</div>
							<?php
	}
	?>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row-fluid">
		<div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Fitness Infinity | Visit us at Citywalk Sports
			Center, Malolos, Bulacan | Call us: +63 935 776 2411</a> </div>
	</div>

	<script src="../../js/excanvas.min.js"></script>
	<script src="../../js/jquery.min.js"></script>
	<script src="../../js/jquery.ui.custom.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/jquery.flot.min.js"></script>
	<script src="../../js/jquery.flot.resize.min.js"></script>
	<script src="../../js/jquery.peity.min.js"></script>
	<script src="../../js/fullcalendar.min.js"></script>
	<script src="../../js/matrix.js"></script>
	<script src="../../js/matrix.dashboard.js"></script>
	<script src="../../js/jquery.gritter.min.js"></script>
	<script src="../../js/matrix.interface.js"></script>
	<script src="../../js/jquery.validate.js"></script>
	<script src="../../js/matrix.form_validation.js"></script>
	<script src="../../js/jquery.wizard.js"></script>
	<script src="../../js/jquery.uniform.js"></script>
	<script src="../../js/select2.min.js"></script>
	<script src="../../js/matrix.popover.js"></script>
	<script src="../../js/jquery.dataTables.min.js"></script>
	<script src="../../js/matrix.tables.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="../../js/others.js"></script>

	<script type="text/javascript">
		function goPage(newURL) {
			if (newURL != "") {
				if (newURL == "-") {
					resetMenu();
				}
				else {
					document.location.href = newURL;
				}
			}
		}

		function resetMenu() {
			document.gomenu.selector.selectedIndex = 2;
		}
	</script>
</body>

</html>