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
  <link rel="stylesheet" href="../../css/uniform.css" />
  <link rel="stylesheet" href="../../css/select2.css" />
  <link rel="stylesheet" href="../../css/matrix-style.css" />
  <link rel="stylesheet" href="../../css/matrix-media.css" />
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
          Home</a> <a href="staff.php" class="current">Staff</a> </div>
      <h1 class="text-center">Staff Members List</i></h1>
    </div>
    <div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <a href="staff-entry.php"><button class="btn btn-primary">Add Staff</button></a>
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
              $qry = "select * from staffs";
              $cnt = 1;
              $result = mysqli_query($con, $qry);
              echo "<table class='table table-bordered table-hover'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Full Name</th>
                  <th>Gender</th>
                  <th>Designation</th>
                  <th>Contact</th>
                  <th>Email</th>
                  <th>Address</th>
                  <th>Actions</th>
                </tr>
              </thead>";

              while ($row = mysqli_fetch_array($result)) {
                echo "<tbody> 
                <tr class=''>
                <td><div class='text-center'>" . $cnt . "</div></td>
                <td><div class='text-center'>" . $row['fullname'] . "</div></td>
                <td><div class='text-center'>" . $row['gender'] . "</div></td>
                <td><div class='text-center'>" . $row['designation'] . "</div></td>
                <td><div class='text-center'>" . $row['contact'] . "</div></td>
                <td><div class='text-center'>" . $row['email'] . "</div></td>
                <td><div class='text-center'>" . $row['address'] . "</div></td>
                <td><div class='text-center'>
                    <a href='edit-staff-form.php?id=" . $row['user_id'] . "' title='Edit' class='tip-bottom'> <i class='fas fa-edit' style='color:#367E18'></i> | </a>
                    <a href='remove-staff.php?id=" . $row['user_id'] . "' title='Delete' class='tip-bottom' style='color:#f74d4d;'><i class='fas fa-trash'></i></a>
                </div></td>
                </tr>
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

  <script src="../../js/jquery.min.js"></script>
  <script src="../../js/jquery.ui.custom.js"></script>
  <script src="../../js/bootstrap.min.js"></script>
  <script src="../../js/jquery.uniform.js"></script>
  <script src="../../js/select2.min.js"></script>
  <script src="../../js/jquery.dataTables.min.js"></script>
  <script src="../../js/matrix.js"></script>
  <script src="../../js/matrix.tables.js"></script>
  <script src="../../js/others.js"></script>
</body>

</html>