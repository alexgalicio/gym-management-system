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
  <link rel="stylesheet" href="../css/uniform.css" />
  <link rel="stylesheet" href="../css/select2.css" />
  <link rel="stylesheet" href="../css/matrix-style.css" />
  <link rel="stylesheet" href="../css/matrix-media.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
  <div id="header">
    <h1><a href="dashboard.html">Fitness Infinity Gym Admin</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>

  <?php $page = "attendance";
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a> <a href="attendance.php" class="current">Manage Attendance</a> </div>
      <h1 class="text-center">Attendance List</i></h1>
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
              <table class='table table-bordered table-hover'>
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Fullname</th>
                    <th>Username</th>
                    <th>Type</th>
                    <th>Membership Status</th>
                    <th>Attendance Count</th>
                    <th>Action</th>
                  </tr>
                </thead>

                <?php include "dbcon.php";
                date_default_timezone_set('Asia/Manila');
                $current_date = date('Y-m-d h:i A');
                $exp_date_time = explode(' ', $current_date);
                $todays_date = $exp_date_time['0'];
                $qry = "SELECT * FROM members";
                $result = mysqli_query($con, $qry);
                $i = 1;
                $cnt = 1;
                while ($row = mysqli_fetch_array($result)) { ?>
                  <tbody>
                    <td>
                      <div class='text-center'><?php echo $cnt; ?></div>
                    </td>
                    <td>
                      <div class='text-center'><?php echo $row['fullname']; ?></div>
                    </td>
                    <td>
                      <div class='text-center'><?php echo $row['username']; ?></div>
                    </td>
                    <td>
                      <div class='text-center'><?php echo $row['type']; ?></div>
                    </td>

                    <td>
                      <div class='text-center'>
                        <?php

                        if ($row['status'] == 'Active') {
                          echo '<i class="fas fa-circle" style="color:#367E18;"></i> Active';
                        } else if ($row['status'] == 'Expired') {
                          echo '<i class="fas fa-circle" style="color:#f74d4d;"></i> Expired';
                        } else if ($row['status'] == 'Pending') {
                          echo '<i class="fas fa-circle" style="color:#FF9A00;"></i> Pending';
                        } else {
                          echo $row['status'];
                        } ?>
                      </div>
                    </td>

                    <td>
                      <div class='text-center'>
                        <?php if ($row['attendance_count'] == 1) {
                          echo $row['attendance_count'] . ' Day';
                        } else if ($row['attendance_count'] == '0') {
                          echo 'None';
                        } else {
                          echo $row['attendance_count'] . ' Days';
                        } ?>
                      </div>
                    </td>

                    <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">
                    <?php
                    $qry = "SELECT * FROM attendance WHERE curr_date = '$todays_date' AND user_id = '" . $row['user_id'] . "'";
                    $res = $con->query($qry);
                    $num_count = mysqli_num_rows($res);
                    $row_exist = mysqli_fetch_array($res);

                    if ($row_exist) {
                      $curr_date = $row_exist['curr_date'];
                    } else {
                      $curr_date = '';
                    }
                    if ($curr_date == $todays_date) {
                      ?>
                      <td>
                        <div class='text-center'><span class="label label-inverse"><?php echo $row_exist['curr_date']; ?>
                            <?php echo $row_exist['curr_time']; ?></span></div>
                        <div class='text-center'><a
                            href='actions/delete-attendance.php?id=<?php echo $row['user_id']; ?>'><button
                              class='btn btn-inverse'>Check Out <i class='fas fa-clock'></i></button> </a></div>
                      </td>
                    <?php } else {
                      ?>
                      <td>
                        <div class='text-center'><a
                            href='actions/check-attendance.php?id=<?php echo $row['user_id']; ?>'><button
                              class='btn btn-primary'>Check In <i class='fas fa-map-marker-alt'></i></button> </a></div>
                      </td>
                    <?php }
                    ?>
                  </tbody>
                  <?php $cnt++;
                } ?>
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

  <script src="../js/jquery.min.js"></script>
  <script src="../js/jquery.ui.custom.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/matrix.js"></script>
  <script src="../js/jquery.validate.js"></script>
  <script src="../js/jquery.uniform.js"></script>
  <script src="../js/select2.min.js"></script>
  <script src="../js/jquery.dataTables.min.js"></script>
  <script src="../js/matrix.tables.js"></script>
  <script src="../js/others.js"></script>

  </script>
</body>

</html>