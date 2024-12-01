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
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>

  <div id="header">
    <h1><a href="dashboard.html">Fitness Infinity Gym Admin</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>

  <?php $page = 'member-status';
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="member-status.php" class="current">Member Status</a> </div>
      <h1 class="text-center">Member's Current Status</i></h1>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class='widget-box'>
            <form id="custom-search-form" class="form-search form-horizontal pull-right">
              <div class="input-append span12">
                <input type="text" id="searchInput" class="search-query" placeholder="Search" onkeyup="searchTable()">
                <button type="button" class="btn"><i class="fas fa-search"></i></button>
              </div>
            </form>
            <div class='widget-content nopadding'>
              <?php
              include "dbcon.php";
              $qry = "select * from members where type='Regular'";
              $cnt = 1;
              $result = mysqli_query($con, $qry);
              echo "<table class='table table-bordered table-hover data-table'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Contact Number</th>
                  <th>Join Date</th>
                  <th>End Date</th>
                  <th>Type</th>
                  <th>Membership Status</th>
                  <th>Remind</th>
                  <th>Action</th>
                </tr>
              </thead>";

              while ($row = mysqli_fetch_array($result)) {

                echo "<tbody>
                    <td><div class='text-center'>{$cnt}</div></td>
                    <td><div class='text-center'>{$row['fullname']}</div></td>
                    <td><div class='text-center'>{$row['contact']}</div></td>
                    <td><div class='text-center'>{$row['membership_start']}</div></td>
                    <td><div class='text-center'>{$row['membership_end']}</div></td>
                    <td><div class='text-center'>{$row['type']}</div></td>
                    <td><div class='text-center'>";

                if ($row['status'] == 'Active') {
                  echo '<i class="fas fa-circle" style="color:#367E18;"></i> Active';
                } else if ($row['status'] == 'Expired') {
                  echo '<i class="fas fa-circle" style="color:#f74d4d;"></i> Expired';
                } else if ($row['status'] == 'Pending') {
                  echo '<i class="fas fa-circle" style="color:#FF9A00;"></i> Pending';
                } else {
                  echo $row['status'];
                }
                echo "</div></td>
                  <td><div class='text-center'>
                      <a href='sendReminder.php?id=" . $row['user_id'] . "'>
                        <button class='btn btn-inverse' " . ($row['reminder'] == 1 ? "disabled" : "") . ">Alert</button>
                      </a>
                    </div>
                  </td>
                  <td>
                      <div class='text-center'>
                      <a href='user-payment.php?id=" . $row['user_id'] . "'><button
                            class='btn btn-primary btn'></i> Pay</button></a></div>
                  </td>
                </tbody>";
                $cnt++;
              }
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