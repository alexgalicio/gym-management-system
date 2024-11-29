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
        <h1><a href="dashboard.html">Fitness Infinity</a></h1>
    </div>

    <?php include 'includes/topheader.php' ?>

    <?php $page = '';
    include 'includes/sidebar.php' ?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
                    Home</a> </div>
        </div>

        <?php
        if (isset($_GET['user_id'])) {
            echo "<div class='container-fluid'>";
            echo "<div class='row-fluid'>";
            echo "<div class='span12'>";
            echo "<div class='widget-box widget-box-bordered'>";
            echo "<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
            echo "<h5>Error Message</h5>";
            echo "</div>";
            echo "<div class='widget-content'>";
            echo "<div class='error_ex'>";
            echo "<h1 style='color:maroon;'>Oh no!</h1>";
            echo "<h3>Your payment failed</h3>";
            echo "<p>Your payment could not be processed. Please try again.</p>";
            echo "<a class='btn btn-inverse btn-big'  href='index.php'>Go Back</a> </div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        } else {
            echo "<h3>INVALID REQUEST. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
        }
        ?>

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