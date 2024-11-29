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

  <?php $page = 'announcement';
  include 'includes/sidebar.php' ?>
  
  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a><a href="announcement.php" class="current">Announcement</a> </div>
      <h1>Announcement</h1>
    </div>
    <div class="container-fluid">
      <a href="manage-announcement.php"><button class="btn btn-inverse" type="button">Manage Announcements</button></a>
      <div class="row-fluid">
        <div class="widget-box widget-box-bordered">
          <div class="widget-title"> <span class="icon"> <i class="fas fa-bullhorn"></i> </span>
            <h5>Make Announcements</h5>
          </div>
          <div class="widget-content">
            <div class="control-group">
              <form action="post-announcement.php" method="POST">
                <div class="controls">
                  <textarea class="span12" style="resize: none;" name="message" required rows="6"
                    placeholder="Enter text ..."></textarea>
                </div>
                <div class="controls">
                  <h5>
                    <label for="Announce Date">Date:
                      <input type="date" name="date" value="<?php echo date('Y-m-d'); ?>"> </label>
                  </h5>
                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-large">Publish Now</button>
                </div>
              </form>
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
  <script src="../js/matrix.js"></script>
  <script src="../js/matrix.dashboard.js"></script>
  <script src="../js/jquery.gritter.min.js"></script>
  <script src="../js/matrix.interface.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/matrix.popover.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.tables.js"></script>
  <script src="../js/wysihtml5-0.3.0.js"></script>
  <script src="../js/bootstrap-wysihtml5.js"></script>

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
  <script>
    $('.textarea_editor').wysihtml5();
  </script>
</body>

</html>