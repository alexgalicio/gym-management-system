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
    <link rel="stylesheet" href="../css/jquery.gritter.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <div id="header">
        <h1><a href="dashboard.html">Fitness Infinity</a></h1>
    </div>

    <?php include 'includes/topheader.php' ?>

    <?php $page = 'account';
    include 'includes/sidebar.php' ?>

    <?php
    include 'dbcon.php';
    include "session.php";
    $qry = "select * from staffs WHERE user_id='" . $_SESSION['user_id'] . "'";
    $result = mysqli_query($con, $qry);
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div id="content">
            <div id="content-header">
                <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
                        Home</a> <a href="edit-account.php" class="current">Account</a> </div>
            </div>

            <div class="container-fluid">
                <div class="row-fluid">
                    <div class="span6">
                        <div class="widget-box widget-box-bordered">

                            <div class="widget-title"> <span class="icon"> <i class="fas fa-user"></i> </span>
                                <h5>Personal Information</h5>
                            </div>

                            <div class="widget-content nopadding">
                                <form action="edit-account-req.php" method="POST" class="form-horizontal" id="memberForm">
                                    <div class="control-group">
                                        <label class="control-label">Full Name :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="fullname" required minlength="3"
                                                value='<?php echo $row['fullname']; ?>' />
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Username :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="username" id="username"
                                                placeholder="Username" required minlength="4"
                                                value='<?php echo $row['username']; ?>' />
                                            <input type="hidden" id="user_id" name="user_id"
                                                value="<?php echo $row['user_id']; ?>">
                                            <span class="text-error" id="username-error" style="display: none;">Username
                                                already exists</span>
                                            <span class="text-success" id="username-success" style="display: none;">Username
                                                is available</span>
                                        </div>
                                    </div>

                                    <div class="control-group">
                                        <label class="control-label">Gender :</label>
                                        <div class="controls">
                                            <select name="gender" required="required" id="select" class="span11" required>
                                                <option value="Male" <?php if ($row['gender'] == 'Male')
                                                    echo 'selected'; ?>>Male</option>
                                                <option value="Female" <?php if ($row['gender'] == 'Female')
                                                    echo 'selected'; ?>>Female</option>
                                                <option value="Other" <?php if ($row['gender'] == 'Other')
                                                    echo 'selected'; ?>>Other</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="widget-title"> <span class="icon"> <i class="fas fa-address-book"></i>
                                        </span>
                                        <h5>Contact Details</h5>
                                    </div>
                                    <div class="control-group">
                                        <label for="normal" class="control-label">Contact Number</label>
                                        <div class="controls">
                                            <input type="text" id="mask-phone" name="contact" pattern="09[0-9]{9}"
                                                class="span11 mask text" value='<?php echo $row['contact']; ?>' required>
                                            <span class="help-block blue span8">Format: 09XXXXXXXXX</span>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Email :</label>
                                        <div class="controls">
                                            <input type="email" class="span11" name="email" required
                                                value='<?php echo $row['email']; ?>' />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Address :</label>
                                        <div class="controls">
                                            <input type="text" class="span11" name="address" required minlength="10"
                                                value='<?php echo $row['address']; ?>' />
                                        </div>
                                    </div>
                                    <div class="form-actions text-center">
                                        <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="span6">
                        <div class="widget-box widget-box-bordered">
                            <div class="widget-title"> <span class="icon"> <i class="fas fa-lock"></i>
                                </span>
                                <h5>Change Password</h5>
                            </div>
                            <div class="widget-content nopadding">
                                <div class="form-horizontal">
                                    <form action="actions/change-password.php" method="POST">
                                        <div class="control-group">
                                            <label class="control-label">Current Password :</label>
                                            <div class="controls">
                                                <input type="password" class="span11" name="current_password" required />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">New Password :</label>
                                            <div class="controls">
                                                <input type="password" class="span11" name="new_password"
                                                    pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$"
                                                    title="Password must contain at least one uppercase letter, one lowercase letter, one number, one symbol, and be at least 8 characters long."
                                                    required />
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Confirm Password :</label>
                                            <div class="controls">
                                                <input type="password" class="span11" name="confirm_password"
                                                    required />
                                                <span class="help-block">
                                                    <?php
                                                    if (isset($_SESSION['error'])) {
                                                        echo '<span style="color: red;">' . $_SESSION['error'] . '</span>';
                                                        unset($_SESSION['error']);
                                                    }
                                                    if (isset($_SESSION['success'])) {
                                                        echo '<span style="color: green;">' . $_SESSION['success'] . '</span>';
                                                        unset($_SESSION['success']);
                                                    }
                                                    ?>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="form-actions text-center">
                                            <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
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