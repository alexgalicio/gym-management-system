<?php
session_start();
if (!isset($_SESSION['user_id'])) {
  header('location:../../index.php');
}

include "dbcon.php";

$qry = "SELECT gender, count(*) as enumber FROM members GROUP BY gender";
$result3 = mysqli_query($con, $qry);
$qry = "SELECT designation, count(*) as snumber FROM staffs GROUP BY designation";
$result5 = mysqli_query($con, $qry);
$qry = "SELECT type, count(*) as ttype FROM members GROUP BY type";
$result6 = mysqli_query($con, $qry);
$qry = "SELECT status, count(*) as sstatus FROM members GROUP BY status";
$result7 = mysqli_query($con, $qry);
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
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <script type="text/javascript">
    google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawStuff);

    function drawStuff() {
      var data = new google.visualization.arrayToDataTable([
        ['Terms', 'Total Amount',],

        <?php
        $query1 = "SELECT SUM(amount) AS numberone FROM transaction_history";
        $rezz = mysqli_query($con, $query1);
        while ($data = mysqli_fetch_array($rezz)) {
          $amount = 'Earnings';
          $numberone = $data['numberone'];
          ?>
          ['<?php echo $amount; ?>', <?php echo $numberone; ?>,],
          <?php
        }
        ?> 

      <?php
      $query10 = "SELECT quantity, SUM(amount) as numbert FROM equipment";
      $res1000 = mysqli_query($con, $query10);
      while ($data = mysqli_fetch_array($res1000)) {
        $expenses = 'Expenses';
        $numbert = $data['numbert'];
        ?>
          ['<?php echo $expenses; ?>', <?php echo $numbert; ?>,],
          <?php
      }
      ?>

      ]);

      var options = {
        width: "1050",
        legend: { position: 'none' },
        bars: 'horizontal',
        axes: {
          x: {
            0: { side: 'top', label: 'Total' }
          }
        },
        bar: { groupWidth: "100%" },
        colors: ['#ff6937']
      };

      var chart = new google.charts.Bar(document.getElementById('top_y_div'));
      chart.draw(data, options);
    };
  </script>

  <script type="text/javascript">
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Gender', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result3)) {
          echo "['" . $row["gender"] . "', " . $row["enumber"] . "],";
        }
        ?>
      ]);

      var options = {
        pieHole: 0.4,
        colors: ['#FF6937', '#FF8860', '#FFA588', '#FFC3AF', '#FFE1D7']
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
      chart.draw(data, options);
    }
  </script>

  <script>
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Designation', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result5)) {
          echo "['" . $row["designation"] . "', " . $row["snumber"] . "],";
        }
        ?>
      ]);

      var options = {
        pieHole: 0.4,
        colors: ['#FF6937', '#FF8860', '#FFA588', '#FFC3AF', '#FFE1D7']
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchart2022'));
      chart.draw(data, options);
    }
  </script>

  <script>
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Type', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result6)) {
          echo "['" . $row["type"] . "', " . $row["ttype"] . "],";
        }
        ?>
      ]);

      var options = {
        pieHole: 0.4,
        colors: ['#FF6937', '#FF8860', '#FFA588', '#FFC3AF', '#FFE1D7']
      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchartplan'));
      chart.draw(data, options);
    }
  </script>

  <script>
    google.charts.load("current", { packages: ["corechart"] });
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['Status', 'Number'],
        <?php
        while ($row = mysqli_fetch_array($result7)) {
          echo "['" . $row["status"] . "', " . $row["sstatus"] . "],";
        }
        ?>
      ]);

      var options = {
        pieHole: 0.4,
        colors: ['#FF6937', '#FF8860', '#FFA588', '#FFC3AF', '#FFE1D7']

      };

      var chart = new google.visualization.PieChart(document.getElementById('donutchartstatus'));
      chart.draw(data, options);
    }
  </script>
</head>

<body>

  <div id="header">
    <h1><a href="dashboard.html">Fitness Infinity Gym Admin</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>

  <?php $page = 'dashboard';
  include 'includes/sidebar.php' ?>

  <div id="content">
    <div id="content-header">
      <div id="breadcrumb"> <a href="index.php" title="You're right here" class="tip-bottom"><i class="fa fa-home"></i>
          Home</a></div>
    </div>

    <div class="container-fluid">
      <div class="quick-actions_homepage">
        <ul class="quick-actions">
          <li class=" span3"></i> <a href="members.php" style="font-size: 16px;"><i class="fas fa-users"></i>
              <strong><?php include 'dashboard-usercount.php'; ?></strong><small>Total Members</small> </a>
          </li>
          <li class=" span3"></i> <a href="staff.php" style="font-size: 16px;"><i class="fas fa-id-card"></i>
              <strong><?php include 'actions/dashboard-staff-count.php'; ?></strong> <small>Total Staff</small>
            </a>
          </li>
          <li class=" span3"></i> <a href="equipment.php" style="font-size: 16px;"><i class="fas fa-dumbbell"></i>
              <strong><?php include 'actions/count-equipments.php'; ?></strong><small>Available Equipments</small> </a>
          </li>
          <li class=" span3"></i> <a href="" style="font-size: 16px;"><i class="fas fa-peso-sign"></i>
              <strong><?php include 'income-count.php'; ?></strong><small>Total Earnings</small> </a>
          </li>
          <li class=" span3"></i> <a href="staff.php" style="font-size: 16px;"><i class="fas fa-chalkboard-user"></i>
              <strong><?php include 'actions/count-trainers.php'; ?></strong><small>Active Gym Trainers</small> </a>
          </li>
          <li class="span3"></i> <a href="announcement.php" style="font-size: 16px;"><i class="fas fa-bullhorn"></i>
              <strong><?php include 'actions/count-announcements.php'; ?></strong><small>Announcements</small> </a>
          </li>
        </ul>
      </div>

      <div class="row-fluid">
        <div class="widget-box widget-box-bordered">
          <div class="widget-title"><span class="icon"><i class="fas fa-file"></i></span>
            <h5>Earnings & Expenses Reports</h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              <div class="span12">
                <div id="top_y_div" style="width: 100%; height: 180px;"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i
                  class="fa-solid fa-venus-mars"></i></span>
              <h5>Gender Distribution of Registered Members</h5>
            </div>
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <div id="donutchart" style="width: 600px; height: 300px;"></div>
              </ul>
            </div>
          </div>
        </div>

        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i class="fas fa-briefcase"></i></span>
              <h5>Designation Distribution of Staff Members</h5>
            </div>
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <div id="donutchart2022" style="width: 600px; height: 300px;"></div>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i class="fas fa-gift"></i></span>
              <h5>Membership Type Distribution</h5>
            </div>
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <div id="donutchartplan" style="width: 600px; height: 300px;"></div>
              </ul>
            </div>
          </div>
        </div>

        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i
                  class="fa-solid fa-chart-line"></i></span>
              <h5>Membership Status Distribution</h5>
            </div>
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <div id="donutchartstatus" style="width: 600px; height: 300px;"></div>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="row-fluid">
        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"> <span class="icon"><i class="fas fa-wrench"></i></span>
              <h5>Equipment Status</h5>
            </div>
            <div class="widget-content">
              <div class="todo">
                <ul>
                  <?php
                  include "dbcon.php";
                  $qry = "SELECT * FROM equipment WHERE status IN ('Maintenance', 'Repair Needed')";
                  $result = mysqli_query($con, $qry);

                  while ($row = mysqli_fetch_array($result)) { ?>
                    <li class='clearfix'>
                      <div class='txt'> <?php echo $row["name"] ?>
                        <?php if ($row["status"] == "Maintenance") {
                          echo '<span class="by label label-warning">Maintenance</span>';
                        } else if ($row["status"] == "Repair Needed") {
                          echo '<span class="by label label-important">Repair needed</span>';
                        } ?>
                      </div>
                    <?php }
                  echo "</li>";
                  echo "</ul>";
                  ?>
              </div>
            </div>
          </div>

        </div>
        <div class="span6">
          <div class="widget-box widget-box-bordered">
            <div class="widget-title"><span class="icon"><i
                  class="fas fa-users"></i></span>
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
                      <span>Current users:</span> $current_count
                    </div>
                  </li>";
                  echo "<li class='clearfix'>
                    <div class='txt'>
                      <span>Max capacity:</span>  $max_capacity 
                    </div>
                  </li>";
                  echo "<li></li>";
                  echo "</ul>";

                  if ($occupancy_rate > 45) {
                    echo "<div class='alert alert-warning' role='alert'>
                      <p style='margin:0;'>Warning: Currently in peak hours. Expect higher occupancy.</p>
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
            <div class="widget-title"><span class="icon"><i
                  class="fas fa-bullhorn"></i></span>
              <h5>Gym Announcements</h5>
            </div>
            <div class="widget-content nopadding">
              <ul class="recent-posts">
                <li>
                  <?php
                  include "dbcon.php";
                  $qry = "SELECT * FROM announcements Order by date desc";
                  $result = mysqli_query($con, $qry);

                  while ($row = mysqli_fetch_array($result)) {
                    echo "<div class='user-thumb'> <img width='70' height='40' alt='User' src='../../img/loco-icon.png'> </div>";
                    echo "<div class='article-post'>";
                    echo "<span class='user-info'> By: Fitness Infinity | " . $row['date'] . " </span>";
                    echo "<p>" . $row['message'] . "</p>";
                  }
                  echo "</div>";
                  echo "</li>";
                  ?>
                </li>
                <li> <a href="manage-announcement.php"><button class="btn btn-primary btn-mini">View All</button></a>
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
    #piechart {
      width: 800px;
      height: 280px;
      margin-left: auto;
      margin-right: auto;
    }
  </style>

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