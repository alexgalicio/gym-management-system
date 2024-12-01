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

  <?php $page = 'promo-offers';
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="promo-offers.php" class="tip-bottom">Promo & Offers</a> <a href="#" class="current">Add
          Promo & Offers </a> </div>
      <h1 class="text-center">Promo and Offers Details</h1>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"> <span class="icon"> <i class="fas fa-align-justify"></i> </span>
              <h5>Information</h5>
            </div>
            <div class="widget-content nopadding">
              <form action="add-promo-offers-req.php" method="POST" class="form-horizontal">
                <div class="control-group">
                  <label class="control-label">Name :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="name" placeholder="Name" minlength="3" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Amount :</label>
                  <div class="controls">
                    <input type="number" min="0" step="0.01" class="span11" name="amount" placeholder="0" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Duration (Days) :</label>
                  <div class="controls">
                    <input type="number" min="0" class="span11" name="duration" placeholder="0" required />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Membership Type :</label>
                  <div class="controls">
                    <label>
                      <input type="checkbox" name="type[]" value="Walk-in"> Walk-in
                    </label>
                    <label>
                      <input type="checkbox" name="type[]" value="Regular"> Regular
                    </label>
                    <label>
                      <input type="checkbox" name="type[]" value="Student"> Student
                    </label>
                    <span class="help-block">Only selected membership type can avail this promo/offers.</span>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Description :</label>
                  <div class="controls">
                    <input type="text" class="span11" name="description" placeholder="Ex. For members only" />
                  </div>
                </div>
                <div class="form-actions text-center">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
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