<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fitness Infinity Gym Admin</title>
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
        <h1><a href="dashboard.html">Fitness Infinity Gym Admin</a></h1>
    </div>

    <?php include 'includes/topheader.php' ?>

    <?php $page = 'manage-staff';
    include 'includes/sidebar.php' ?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
                    Home</a> <a href="staff.php">Staff</a> <a href="staff-entry.php" class="current">Add Staff</a>
            </div>
            <h1 class="text-center">Staff Information Form</i></h1>
        </div>

        <div class="container-fluid">
            <div class="row-fluid">
                <div class="span6">
                    <div class="widget-box widget-box-bordered">
                        <div class="widget-title"> <span class="icon"> <i class="fas fa-user"></i> </span>
                            <h5>Personal Information</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <form action="add-staff.php" method="POST" class="form-horizontal">
                                <div class="control-group">
                                    <label class="control-label">Full Name :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="fullname" placeholder="Full Name"
                                            minlength="3" required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Gender :</label>
                                    <div class="controls">
                                        <select name="gender" required="required" id="select" class="span11" required>
                                            <option value="Male" selected="selected">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Other">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Designation</label>
                                    <div class="controls">
                                        <select name="designation" id="designation" class="span11">
                                            <option value="Cashier">Cashier</option>
                                            <option value="Trainer">Trainer</option>
                                            <option value="GYM Assistant">GYM Assistant</option>
                                            <option value="Front Desk Staff">Front Desk Staff</option>
                                            <option value="Manager">Manager</option>
                                        </select>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>

                <div class="span6">
                    <div class="widget-box widget-box-bordered">
                        <div class="widget-title"> <span class="icon"> <i class="fas fa-address-book"></i> </span>
                            <h5>Contact Details</h5>
                        </div>
                        <div class="widget-content nopadding">
                            <div class="form-horizontal">
                                <div class="control-group">
                                    <label for="normal" class="control-label">Contact Number</label>
                                    <div class="controls">
                                        <input type="text" id="mask-phone" name="contact" pattern="09[0-9]{9}"
                                            placeholder="09876543211" class="span11 mask text" required>
                                        <span class="help-block blue span8">Format: 09XXXXXXXXX</span>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Email :</label>
                                    <div class="controls">
                                        <input type="email" class="span11" name="email" placeholder="email@domain.com"
                                            required />
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label">Address :</label>
                                    <div class="controls">
                                        <input type="text" class="span11" name="address" placeholder="Address"
                                            minlength="10" required />
                                    </div>
                                </div>
                                <div class="form-actions text-center">
                                    <button type="submit" class="btn btn-primary">Add Staff</button>
                                </div>
                            </div>
                        </div>
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