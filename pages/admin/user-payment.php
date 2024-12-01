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
    <h1><a href="">Fitness Infinity Gym Admin</a></h1>
  </div>

  <?php include 'includes/topheader.php' ?>

  <?php $page = 'member-status';
  include 'includes/sidebar.php' ?>

  <?php
  include 'dbcon.php';
  $id = $_GET['id'];
  $qry = "select * from members where user_id='$id'";
  $result = mysqli_query($con, $qry);

  while ($row = mysqli_fetch_array($result)) {
    ?>
    <div id="content">
      <div id="content-header">
        <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
            Home</a> <a href="member-status.php">Member Status</a> <a href="#" class="current">Invoice</a> </div>
        <h1>Payment Form</h1>
      </div>
      <div class="container-fluid" style="margin-top:-38px;">
        <div class="row-fluid">
          <div class="span12">
            <div class="widget-box widget-box-bordered">
              <div class="widget-title"> <span class="icon"> <i class="fa-solid fa-money-bill-wave"></i></span>
                <h5>Payments</h5>
              </div>
              <div class="widget-content">
                <div class="row-fluid">
                  <div class="span5">
                    <table class="table-no-hover">
                      <tbody>
                        <tr class="no-hover">
                          <td><img src="../img/fitness-infinity-logo.png" alt="Gym Logo" style="border-radius: 4px"
                              width="175"></td>
                        </tr>
                        <tr class="no-hover">
                          <td>
                            <h4>Fitness Infinity</h4>
                          </td>
                        </tr>
                        <tr class="no-hover">
                          <td>Citywalk Sports Center, Malolos, Bulacan</td>
                        </tr>
                        <tr class="no-hover">
                          <td>Call us: +63 935 776 2411</td>
                        </tr>
                        <tr class="no-hover">
                          <td>Email: fitnessinfinityph@gmail.com</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>

                  <div class="span7">
                    <table class="table table-bordered table-invoice">
                      <tbody>
                        <form action="userpay.php" method="POST">
                          <tr>
                          <tr>
                            <td class="width30">Member's Name:</td>
                            <input type="hidden" name="fullname" value="<?php echo $row['fullname']; ?>">
                            <td class="width70"><strong><?php echo $row['fullname']; ?></strong></td>
                          </tr>
                          <td class="width30">Type:</td>
                          <td class="width70">
                            <input type="text" name="type" value="<?php echo $row['type']; ?>" readonly>
                          </td>
                          <tr>
                            <td>Amount:</td>
                            <td>
                              <input type="number" name="amount" min="0" step="0.01" id="amount" value="300">
                            </td>
                          </tr>
                          <input type="hidden" name="membership_start" value="<?php echo $row['membership_start']; ?>">
                          <tr>
                          </tr>
                          <td class="width30">Member's Status:</td>
                          <td class="width70">
                            <div class="controls">
                              <select name="status" required="required" id="select">
                                <option value="Active" selected="selected">Active</option>
                                <option value="Expired">Expired</option>
                              </select>
                            </div>
                          </td>
                          </tr>
                      </tbody>
                    </table>
                  </div>
                </div>

                <div class="row-fluid">
                  <div class="span12">
                    <hr>
                    <div class="text-center">
                      <input type="hidden" name="id" value="<?php echo $row['user_id']; ?>">
                      <button class="btn btn-primary btn-large" type="SUBMIT" href="">Make Payment</button>
                    </div>
                    </form>
                  </div>
                </div>
                <?php
  }
  ?>
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