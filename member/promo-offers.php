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

    <?php $page = "promo-offers";
    include 'includes/sidebar.php' ?>

    <?php include "dbcon.php";
    $user_id = $_SESSION['user_id'];
    ?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
                    Home</a> <a href="promo-offers.php" class="current">Promo & Offers</a> </div>
        </div>
        <div class="container-fluid">

            <div class="row-fluid">
                <div class="span12">

                    <div class='widget-box widget-box-bordered'>
                        <div class='widget-title'> <span class='icon'> <i class='fas fa-rectangle-ad'></i> </span>
                            <h5>My Promo & Offers</h5>
                        </div>
                        <div class='widget-content nopadding'>
                            <?php
                            $qry = "SELECT o.* 
                            FROM offers o
                            INNER JOIN user_offers uo ON o.id = uo.offer_id
                            WHERE uo.user_id = '$user_id'";
                            $cnt = 1;
                            $result = mysqli_query($con, $qry);

                            echo "<table class='table table-bordered table-hover'>
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Next Payment</th>
                                <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>";
                            if (mysqli_num_rows($result) > 0) {

                                while ($row = mysqli_fetch_array($result)) {

                                    $enrollment_date = new DateTime();
                                    $duration_days = $row['duration'];
                                    $next_payment_date = clone $enrollment_date;
                                    $next_payment_date->modify("+$duration_days days");

                                    $today = new DateTime();
                                    $remaining_days = $today->diff($next_payment_date)->days;

                                    $next_payment_display = $remaining_days > 0 ? $next_payment_date->format('F d, Y') : 'Paid';

                                    echo "
                            <td><div class='text-center'>" . $cnt . "</div></td>
                            <td><div class='text-center'>" . $row['name'] . "</div></td>
                            <td><div class='text-center'>PHP " . $row['amount'] . "</div></td>
                            <td><div class='text-center'>" . $row['description'] . "</div></td>
                            <td><div class='text-center'>" . $next_payment_display . "</div></td>
                            <td><div class='text-center'>";

                                    if ($remaining_days <= 1) {
                                        echo "<button type='button' class='btn btn-info' disabled> Paid</button>";
                                    } else {
                                        echo "
                                <form action='../http/controllers/payment-controller.php' method='POST'>
                                    <input type='hidden' name='user_id' value='" . $user_id . "'>
                                    <input type='hidden' name='offer_id' value='" . $row['id'] . "'>
                                    <input type='hidden' name='amount' value='" . $row['amount'] . "'>
                                    <input type='hidden' name='description' value='Membership payment for " . $user_id . "'>
                                    <input type='hidden' name='url' value='pay-offers'>
                                    <button type='submit' class='btn btn-info'>
                                        <i class='fas fa-g'></i> Renew
                                    </button>
                                </form>";
                                    }

                                    echo " </div></td>
                        </tbody>";
                                    $cnt++;
                                }

                            } else {
                                echo "<tr>
                                <td colspan='6'>
                                <div class='text-center'>
                                    No offers enrolled yet.
                                </div>
                                </td>
                                </tr>";
                            }
                            echo "</tbody></table>";
                            ?>

                        </div>
                    </div>

                    <br>

                    <div class='widget-box widget-box-bordered'>
                        <div class='widget-title'> <span class='icon'> <i class='fas fa-rectangle-ad'></i> </span>
                            <h5>Available Promo & Offers</h5>

                        </div>
                        <div class='widget-content nopadding'>

                            <?php
                            include "dbcon.php";

                            $user_qry = "SELECT * FROM members WHERE user_id = '$user_id'";
                            $user_result = mysqli_query($con, $user_qry);
                            $user_row = mysqli_fetch_assoc($user_result);
                            $member_type = $user_row['type'];
                            $user_status = $user_row['status'];

                            $qry1 = "select * from offers";

                            $result1 = mysqli_query($con, $qry1);

                            echo "<table class='table table-bordered table-hover'>
                            <thead>
                                <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Description</th>
                                <th>Actions</th>
                                </tr>
                            </thead>";


                            $cnt = 1;
                            while ($row = mysqli_fetch_array($result1)) {
                                $allowed_types = $row['type'];
                                $is_allowed = empty($allowed_types) || in_array($member_type, explode(',', $allowed_types));
                                $is_regular = strpos($allowed_types, 'Regular') !== false;


                                echo "<tbody> 
                            <td><div class='text-center'>" . $cnt . "</div></td>
                            <td><div class='text-center'>" . $row['name'] . "</div></td>
                            <td><div class='text-center'>PHP " . $row['amount'] . "</div></td>
                            <td><div class='text-center'>" . $row['description'] . "</div></td>
                            
                            <td><div class='text-center'>";
                                if ($user_status === 'Pending' && $is_regular) {
                                    echo "<button type='button' class='btn btn-secondary tip-bottom' disabled 
                title='Your membership is pending. Regular offers are unavailable for pending payment.'>
                Not Eligible
              </button>";
                                } else if ($is_allowed) {
                                    echo "
                                            <form action='../http/controllers/payment-controller.php' method='POST'>
                                                <input type='hidden' name='user_id' value='" . $user_id . "'>
                                                <input type='hidden' name='offer_id' value='" . $row['id'] . "'>
                                                <input type='hidden' name='amount' value='" . $row['amount'] . "'>
                                                <input type='hidden' name='url' value='pay-offers'>
                                                <input type='hidden' name='description' value='Membership payment for " . $user_id . "'>
                                                <button type='submit' class='btn btn-info btn'>
                                                    <i class='fas fa-g'></i> Pay
                                                </button>
                                            </form>";

                                } else {
                                    echo "<button type='button' class='btn btn-secondary' disabled>Not Eligible</button>";
                                }

                                echo "</div></td></tbody>";
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