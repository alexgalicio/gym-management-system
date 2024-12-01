<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('location:../../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Fitness Infinity</title>
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
        <h1><a href="dashboard.html">Fitness Infinity</a></h1>
    </div>

    <?php include 'includes/topheader.php' ?>

    <?php $page = "membership";
    include 'includes/sidebar.php' ?>

    <?php include "dbcon.php";
    $user_id = $_SESSION['user_id'];
    ?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
                    Home</a> <a href="membership.php" class="current">Membership</a> </div>
        </div>
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class='widget-box widget-box-bordered'>


                        <div class='widget-content nopadding'>
                            <?php
                            $qry = "select * from members where user_id=$user_id";
                            $result = mysqli_query($con, $qry);


                            if ($row = mysqli_fetch_array($result)) {

                                $current_date = date('Y-m-d');
                                $expiry_date = $row['membership_end'];

                                $diff = (strtotime($expiry_date) - strtotime($current_date)) / 86400; // Difference in days
                            
                                if ($row['type'] === "Walk-in") {
                                    echo "<table class='table table-bordered table-hover'>  
                                    <thead>
                                        <tr>
                                        <th>Amount</th>
                                        <th>Membership Perks</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <tr>
                                        <td><div class='text-center'>PHP 300 (Annual Renewal)</div></td>
                                        <td><div class='text-center'>Walk-in rates: PHP 50 <br> Access to promos</div></td>
                                        <td><div class='text-center'>
                                            <form action='../../others/controllers/payment-controller.php' method='POST'>
                                                <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                                                <input type='hidden' name='offer_id' value=''>
                                                <input type='hidden' name='amount' value='300'>
                                                <input type='hidden' name='url' value='pay-membership'>
                                                <input type='hidden' name='description' value='Membership payment for " . $row['user_id'] . "'>
                                                <button type='submit' class='btn btn-info btn'>
                                                    <i class='fas fa-g'></i> Pay via GCash
                                                </button>
                                            </form>
                                        </div></td>
                                    </tr>
                                    </tbody>

                                    <tbody>
                                    <tr>
                                    <td colspan='5'>
                                        <div class='text-right'>";
                                    if (isset($_GET['payment'])) {
                                        if ($_GET['payment'] == 'success') {
                                            echo "<div class='text-success'>Payment successful! Membership activated.</div>";
                                        } else if ($_GET['payment'] == 'failed') {
                                            echo "<div class='text-error'>Payment failed. Please try again.</div>";
                                        }
                                    } else {
                                        echo "<div style='color: #999'>We currently accept GCash payments only. For other payment methods, please visit or call us.</div>";
                                    }
                                    echo "</div></td>
                                    </tr>
                                    </tbody>";
                                } else {
                                    echo "<table class='table table-bordered table-hover'>
                                    <thead>
                                        <tr>
                                        <th>Amount</th>
                                        <th>Join Date</th>
                                        <th>Expiry Date</th>
                                        <th>Actions</th>
                                        </tr>
                                    </thead>";

                                    if ($row['type'] === 'Student') {
                                        echo "<tr>
                                            <td colspan='4'><div class='text-center'>Students are automatically a member and do not need to apply</div></td>
                                        </tr>";
                                    } else {
                                        echo "<tbody> 
                                        <td><div class='text-center'>PHP " . $row['amount'] . "</div></td>
                                        <td><div class='text-center'>" . $row['membership_start'] . "</div></td>
                                        <td><div class='text-center'>" . $row['membership_end'] . "</div></td>
                                        <td><div class='text-center'>
                                            <form action='../../others/controllers/payment-controller.php' method='POST'>
                                                <input type='hidden' name='user_id' value='" . $row['user_id'] . "'>
                                                <input type='hidden' name='amount' value='" . $row['amount'] . "'>
                                                <input type='hidden' name='offer_id' value=''>
                                                <input type='hidden' name='url' value='pay-membership'>
                                                <input type='hidden' name='description' value='Membership payment for " . $row['user_id'] . "'>
                                                <button type='submit' class='btn btn-info btn' " . ($diff > 7 ? 'disabled' : '') . ">
                                                    <i class='fas fa-g'></i> Pay via GCash
                                                </button>
                                            </form>
                                        </div></td>
                                    </tbody>
                                    
                                    <tbody>
                                    <tr>
                                    <td colspan='5'>
                                        <div class='text-right'>";
                                        if (isset($_GET['payment'])) {
                                            if ($_GET['payment'] == 'success') {
                                                echo "<div class='text-success'>Payment successful! Membership activated.</div>";
                                            } else if ($_GET['payment'] == 'failed') {
                                                echo "<div class='text-error'>Payment failed. Please try again.</div>";
                                            }
                                        } else {
                                            echo "<div style='color: #999'>We currently accept GCash payments only. For other payment methods, please visit or call us.</div>";
                                        }
                                        echo "</div></td>
                                    </tr>
                                    </tbody>";
                                    }
                                }
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