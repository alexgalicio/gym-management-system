<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fitness Infinity Gym Admin</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bootstrap.min.css" />
  <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
  <link rel="stylesheet" href="../css/fullcalendar.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link rel="stylesheet" href="../css/jquery.gritter.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
  <div id="header">
    <h1><a href="dashboard.html">Fitness Infinity Gym Admin</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>

  <?php $page = 'manage-members';
  include 'includes/sidebar.php' ?>

  <?php
  include 'dbcon.php';
  ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="members.php" class="tip-bottom">Members</a> <a href="member-entry.php" class="current">Add
          Members</a> </div>
      <h1 class="text-center">Member Registration Form</h1>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"> <span class="icon"> <i class="fas fa-user"></i> </span>
              <h5>Personal Information</h5>
            </div>
            <div class="widget-content nopadding">
              <form action="add-member-req.php" method="POST" class="form-horizontal" id="memberForm">
                <div class="control-group">
                  <label class="control-label">Full Name :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="fullname" placeholder="Full Name" minlength="3" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Username :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="username" id="username" placeholder="Username" required
                      minlength="4" />
                    <span class="text-error" id="username-error" style="display: none;">Username already exists</span>
                    <span class="text-success" id="username-success" style="display: none;">Username is available</span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Password :</label>
                  <div class="controls">
                    <input type="password" class="span11" name="password" minlength="8" placeholder="**********"
                      required />
                    <span class="help-block">Note: The given information will create an account for this particular
                      member</span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Gender :</label>
                  <div class="controls">
                    <select name="gender" class="span11" required="required" id="select" required>
                      <option value="Male" selected="selected">Male</option>
                      <option value="Female">Female</option>
                      <option value="Other">Other</option>
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
                    <input type="text" id="mask-phone" name="contact" pattern="09[0-9]{9}" class="span11 mask text"
                      placeholder="09876543211" required>
                    <span class="help-block blue span8">Format: 09XXXXXXXXX</span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Email :</label>
                  <div class="controls">
                    <input type="email" class="span11" name="email" placeholder="email@domain.com" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Address :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="address" placeholder="Address" minlength="10" required />
                  </div>
                </div>
              </div>
              <div class="widget-title"> <span class="icon"> <i class="fas fa-gift"></i> </span>
                <h5>Membership</h5>
              </div>
              <div class="widget-content nopadding">
                <div class="form-horizontal">
                  <div class="control-group">
                    <label class="control-label">Membership Type :</label>
                    <div class="controls">
                      <select name="type" class="span11"  required>
                        <option value="Walk-in" selected="selected">Walk-in</option>
                        <option value="Regular">Regular</option>
                        <option value="Student">Student</option>
                      </select>
                      <span class="help-block">Note: Regular members must apply for annual renewal</span>
                    </div>
                  </div>
                  <div class="form-actions text-center">
                    <button type="submit" class="btn btn-primary">Add Member</button>
                  </div>
                  </form>
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
  
  <script src="../js/excanvas.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.ui.custom.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/jquery.flot.min.js"></script>
  <script src="../js/jquery.flot.resize.min.js"></script>
  <script src="../js/jquery.peity.min.js"></script>
  <script src="../js/fullcalendar.min.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/matrix.dashboard.js"></script>
  <script src="../js/jquery.gritter.min.js"></script>
  <script src="../js/matrix.interface.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/matrix.form_validation.js"></script>
  <script src="../js/jquery.wizard.js"></script>
  <script src="../js/jquery.uniform.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/matrix.popover.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.tables.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="../js/others.js"></script>
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