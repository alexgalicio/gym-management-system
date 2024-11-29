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

  <?php $page = "promo-offers";
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php  " title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="promo-offers.php" class="current">Promo & Offers</a> </div>
      <h1 class="text-center">Promo and Offers List <i class="fas fa-group"></i></h1>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <a href="promo-offers-entry.php"><button class="btn btn-primary">Add</button></a>
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
              $qry = "select * from offers";
              $cnt = 1;
              $result = mysqli_query($con, $qry);
              echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Amount</th>
                  <th>Duration (Days)</th>
                  <th>Type</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>";

              while ($row = mysqli_fetch_array($result)) {

                echo "<tbody> 
                <td><div class='text-center'>" . $cnt . "</div></td>
                <td><div class='text-center'>" . $row['name'] . "</div></td>
                <td><div class='text-center'>PHP " . $row['amount'] . "</div></td>
                <td><div class='text-center'>" . $row['duration'] . "</div></td>
                <td><div class='text-center'>" . $row['type'] . "</div></td>
                <td><div class='text-center'>" . $row['description'] . "</div></td>
                <td><div class='text-center'>
                    <a href='enrolled-members.php?id=" . $row['id'] . "'  style='color:#FF9A00' title='View' class='tip-bottom'>
                        <i class='fas fa-eye'></i> |
                    </a>
                    <a href='edit-promo-offers-form.php?id=" . $row['id'] . "'  style='color:#367E18' title='Edit' class='tip-bottom'>
                        <i class='fas fa-edit'></i> |
                    </a>
                    <a href='actions/delete-promo-offers.php?id=" . $row['id'] . "' style='color:#f74d4d;' title='Delete' class='tip-bottom'>
                        <i class='fas fa-trash'></i> </a>
                </div></td>
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