<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Fitness Infinity</title>
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
    <h1><a href="index.php">Fitness Infinity</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>

  <?php $page = "announcement";
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="announcement.php" class="current">Announcement</a> </div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i
                  class="fas fa-bullhorn"></i></span>
              <h5>Gym Announcement</h5>
            </div>
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <li>
                  <?php
                  include "dbcon.php";
                  $qry = "select * from announcements order by date desc";
                  $result = mysqli_query($con, $qry);

                  while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='user-thumb'> <img width='50' height='50' alt='User' src='../img/loco-icon.png'> </div>";
                    echo "<div class='article-post'>";
                    echo "<span class='user-info'> By: Fitness Infinity | " . $row['date'] . " </span>";
                    echo "<p><a href='#'>" . $row['message'] . "</a> </p>";
                  }
                  echo "</div>";
                  echo "</li>";
                  ?>
                </li>
              </ul>
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
  </script>
</body>

</html>