<?php
include "dbcon.php";
include "session.php";

$qry = "SELECT * FROM todo WHERE user_id='" . $_SESSION['user_id'] . "'";
$result = mysqli_query($con, $qry);
$qry = "select * from announcements ORDER BY date DESC";
$result1 = mysqli_query($con, $qry);
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

  <?php $page = "dashboard";
  include 'includes/sidebar.php';
  ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fas fa-home"></i>
          Home</a></div>
    </div>

    <div class="container-fluid">
      <div class="row-fluid">

        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"> <span class="icon"><i class="fas fa-pencil"></i></span>
              <h5>My To-Do List</h5>
            </div>
            <div class="widget-content nopadding">
              <?php
              echo "<table class='table table-striped table-bordered'>
              <thead>
                <tr>
                  <th>Description</th>
                  <th>Status</th>
                  <th>Opts</th>
                </tr>
              </thead>";
              while ($row = mysqli_fetch_array($result)) {
                echo "<tbody>
                <tr>
                  <td class='taskDesc'><a href='to-do.php'><i class='fas fa-circle-plus'></i></a>" . $row['task_desc'] . "</td>
                  <td class='taskStatus'><span class='in-progress'>" . $row['task_status'] . "</span></td>
                  <td class='taskOptions'><a href='update-todo.php?id=" . $row['id'] . "' class='tip-top' data-original-title='Update'><i class='fas fa-pen-to-square'></i></a>  <a href='actions/remove-todo.php?id=" . $row['id'] . "' class='tip-top' data-original-title='Done'><i class='fas fa-check'></i></a></td>
                </tr>
              </tbody>";
              }
              ?>
              </table>
            </div>
          </div>
        </div>

        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i class="fas fa-users"></i></span>
              <h5>Gym's Capacity</h5>
            </div>


            <div class="widget-content">
              <div class="todo">

                <?php
                include "dbcon.php";
                $qry_capacity = "SELECT COUNT(*) AS current_count FROM attendance";
                $result_capacity = mysqli_query($con, $qry_capacity);

                if ($result_capacity) {
                  $row_capacity = mysqli_fetch_assoc($result_capacity);
                  $current_count = $row_capacity['current_count'];
                  $max_capacity = 60;
                  $occupancy_rate = ($current_count / $max_capacity) * 100;

                  echo "<ul>";
                  echo "<li class='clearfix'>
                    <div class='txt'>
                      <span> Current users:</span> $current_count
                    </div>
                  </li>";
                  echo "<li class='clearfix'>
                    <div class='txt'>
                      <span> Max capacity:</span>  $max_capacity 
                    </div>
                  </li>";
                  echo "<li></li>";
                  echo "</ul>";

                  if ($occupancy_rate > 45) {
                    echo "<div class='alert alert-warning' role='alert'>
                      <p style='margin:0;'><i class='fas fa-triangle-exclamation'></i> Warning: Currently in peak hours. Expect higher occupancy.</p>
                  </div>";
                  }
                } else {
                  echo "<p>Unable to fetch current count or capacity.</p>";
                }
                ?>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="span12">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i class="fas fa-bullhorn"></i></span>
              <h5>Gym Announcement</h5>
            </div>
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <li>
                  <?php
                  while ($row = mysqli_fetch_array($result1)) {
                    echo "<div class='user-thumb'> <img width='70' height='40' alt='User' src='../img/loco-icon.png'> </div>";
                    echo "<div class='article-post'>";
                    echo "<span class='user-info'> By: Fitness Infinity | " . $row['date'] . " </span>";
                    echo "<p>" . $row['message'] . "</p>";
                  }
                  echo "</div>";
                  echo "</li>";
                  ?>
                </li>
                <li>
                  <a href="announcement.php"><button class="btn btn-primary btn-mini">View All</button></a>
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

  <style>
    .title {
      color: grey;
      font-size: 18px;
    }
  </style>

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
</body>

</html>