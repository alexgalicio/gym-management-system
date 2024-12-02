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

  <?php $page = "promo-offers";
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="promo-offers.php" class="tip-bottom">Promo & Offers</a> <a href="#" class="current">Enrolled
          Members</a> </div>
      <h1 class="text-center">Promo & Offers Members</h1>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class='widget-box widget-box-bordered'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-ad'></i> </span>
              <h5>Promo & Offers</h5>

            </div>

            <div class='widget-content nopadding'>
              <?php
              include "dbcon.php";

              $id = isset($_GET['id']) ? (int) $_GET['id'] : 0;

              $class_query = "SELECT * FROM offers WHERE id = $id";

              $result = mysqli_query($con, $class_query);
              $row = mysqli_fetch_array($result);
              echo "<table class='table table-bordered table-hover'>
              <thead>
                  <tr>
                      <th>Name</th>
                      <th>Amount</th>
                      <th>Duration</th>
                      <th>Type</th>
                      <th>Description</th>
                  </tr>
              </thead>

              <tbody>
                  <tr>
                      <td><div class='text-center'>" . $row['name'] . "</div></td>
                      <td><div class='text-center'>" . $row['amount'] . "</div></td>
                      <td><div class='text-center'>" . $row['duration'] . "</div></td>
                      <td><div class='text-center'>" . $row['type'] . "</div></td>
                      <td><div class='text-center'>" . $row['description'] . "</div></td>
                  </tr>
              </tbody>
            </table>";

              ?>

            </div>
          </div>

          <br>

          <div class='widget-box widget-box-bordered'>
            <div class='widget-title'> <span class='icon'> <i class='fas fa-ad'></i> </span>
              <h5>Enrolled Members</h5>


            </div>
            <div class='widget-content nopadding'>

              <?php
              include "dbcon.php";

              $qry = "SELECT DISTINCT m.* 
              FROM members m 
              INNER JOIN user_offers uo ON m.user_id = uo.user_id
              WHERE uo.offer_id = $id";

              $result1 = mysqli_query($con, $qry);

              echo "<table class='table table-bordered table-hover'>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Full Name</th>
                    <th>Gender</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Type</th>
                </tr>
            </thead>";

              $cnt = 1;
              while ($row = mysqli_fetch_array($result1)) {
                echo "<tbody> 
        <td><div class='text-center'>" . $cnt . "</div></td>
        <td><div class='text-center'>" . $row['fullname'] . "</div></td>
        <td><div class='text-center'>" . $row['gender'] . "</div></td>
        <td><div class='text-center'>" . $row['contact'] . "</div></td>
        <td><div class='text-center'>" . $row['email'] . "</div></td>
        <td><div class='text-center'>" . $row['type'] . "</div></td>
    </tbody>";
                $cnt++;
              }

              if (mysqli_num_rows($result1) == 0) {
                echo "<tr><td colspan='7'><div class='text-center'>No members in this promo & offers</div></td></tr>";
              }

              echo "</table>";
              ?>
              </table>

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