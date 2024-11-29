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

    <?php $page = 'member-status';
    include 'includes/sidebar.php' ?>

    <div id="content">
        <div id="content-header">
            <div id="breadcrumb"> <a href="index.php" title="Go to Home" class="tip-bottom"><i class="fas fa-home"></i>
                    Home</a> <a href="member-status.php" class="tip-bottom">Member Status</a> <a href="#"
                    class="current">Make
                    Payments</a> </div>
        </div>
        <form role="form" action="index.php" method="POST">
            <?php

            if (isset($_POST['amount'])) {

                $fullname = $_POST['fullname'];
                $membership_start = $_POST['membership_start'];
                $amount = $_POST["amount"];
                $status = $_POST["status"];
                $id = $_POST['id'];

                include 'dbcon.php';
                date_default_timezone_set('Asia/Manila');
                $current_date = date('Y-m-d h:i A');
                $exp_date_time = explode(' ', $current_date);
                $curr_date = $exp_date_time['0'];
                $curr_time = $exp_date_time['1'] . ' ' . $exp_date_time['2'];

                $membership_end = date("Y-m-d", strtotime("+12 months", strtotime($curr_date))); // Add 12 months for others
                $qry = "UPDATE members SET amount='$amount', status='$status', membership_start='$curr_date', reminder='0', membership_end='$membership_end' WHERE user_id='$id'";
                $result = mysqli_query($con, $qry);


                $sql_transaction = "INSERT INTO transaction_history (user_id, amount, date)
                VALUES ('$id', '$amount', '$curr_date')";
                $con->query($sql_transaction);

                if (!$result) { ?>
                    <h3 class="text-center">Something went wrong!</h3>
                <?php } else { ?>
                    <?php if ($status == 'Active') { ?>

                        <table class="body-wrap">
                            <tbody>
                                <tr class="no-hover">
                                    <td></td>
                                    <td class="container" width="600">
                                        <div class="content">
                                            <table class="main" width="100%" cellpadding="0" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <td class="content-wrap aligncenter print-container">
                                                            <table width="100%" cellpadding="0" cellspacing="0">
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            <h3 class="text-center">Payment Receipt</h3>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="content-block">
                                                                            <table class="invoice">
                                                                                <tbody>
                                                                                    <tr>
                                                                                        <td>
                                                                                            <div style="float:left">Invoice
                                                                                                #GMS_<?php echo (rand(100000, 10000000)); ?>
                                                                                                <br> Citywalk Sports Center,
                                                                                                <br>Malolos, Bulacan
                                                                                                <br>+63 935 776 2411
                                                                                            </div>

                                                                                        </td>
                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td class="text-center"
                                                                                            style="font-size:14px;">
                                                                                            <b>Bill To:
                                                                                                <?php echo $fullname; ?></b> <br>
                                                                                            Paid On:
                                                                                            <?php echo date("F j, Y - g:i a"); ?>
                                                                                        </td>

                                                                                    </tr>

                                                                                    <tr>
                                                                                        <td>
                                                                                            <table class="invoice-items"
                                                                                                cellpadding="0" cellspacing="0">
                                                                                                <tbody>

                                                                                                    <tr>
                                                                                                        <td><?php echo 'Valid Upto'; ?>
                                                                                                        </td>
                                                                                                        <td class="alignright">
                                                                                                            <?php echo date("M j, Y", strtotime($membership_end)); ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                    <tr class="total">
                                                                                                        <td class="alignright"
                                                                                                            width="80%">Total Amount
                                                                                                        </td>
                                                                                                        <td class="alignright">
                                                                                                            <?php echo $amount; ?>
                                                                                                        </td>
                                                                                                    </tr>
                                                                                                </tbody>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                </tbody>
                                                                            </table>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="content-block text-center">
                                                                            We sincerely appreciate your timely payments and
                                                                            continued support.
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                            <div class="footer">
                                                <table width="100%">
                                                    <tbody>
                                                        <tr class="no-hover">
                                                            <td class="aligncenter content-block"><button class="btn btn-primary"
                                                                    onclick="window.print()"><i class="fas fa-print"></i>
                                                                    Print</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <td></td>

                            </tbody>
                        </table>

                    <?php } else { ?>
                        <div class='container-fluid'>
                            <div class='row-fluid'>
                                <div class='span12'>
                                    <div class='widget-box widget-box-bordered'>
                                        <div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>
                                            <h5>Error Message</h5>
                                        </div>
                                        <div class='widget-content'>
                                            <div class='error_ex'>
                                                <h1>409</h1>
                                                <h3>Looks like you've deactivated the customer's account!</h3>
                                                <p>The selected member's account will no longer be ACTIVATED until the next
                                                    payment.</p>
                                                <a class='btn btn-inverse btn-big' href='member-status.php'>Go Back</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                <?php }
            } else { ?>
                <h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>
            <?php }
            ?>
        </form>
    </div>
    </div>
    </div>
    </div>

    <div class="row-fluid">
        <div id="footer" class="span12"> <?php echo date("Y"); ?> &copy; Fitness Infinity | Visit us at Citywalk Sports
            Center, Malolos, Bulacan | Call us: +63 935 776 2411</a> </div>
    </div>

    <style>

        body {
            -webkit-font-smoothing: antialiased;
            -webkit-text-size-adjust: none;
            width: 100% !important;
            height: 100%;
            line-height: 1.6;
        }

        table td {
            vertical-align: top;
        }

        .body-wrap .no-hover {
            background-color: #fff;
        }

        .body-wrap {
            /* background-color: #f6f6f6; */
            height: 90vh;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }

        .container {
            display: block !important;
            max-width: 600px !important;
            margin: 0 auto !important;
            clear: both !important;
        }

        .content {
            max-width: 600px;
            margin: 0 auto;
            display: block;
            padding: 20px;
        }

        .main {
            background: #fff;
            border: 1px solid #e9e9e9;
            border-radius: 3px;
        }

        .content-wrap {
            padding: 20px;
        }

        .footer {
            width: 100%;
            clear: both;
            color: #999;
            padding: 20px;
        }

        .invoice {
            margin: 22px auto;
            text-align: left;
            width: 80%;
        }

        .invoice td {
            padding: 7px 0;
        }

        .invoice .invoice-items {
            width: 100%;
        }

        .invoice .invoice-items td {
            border-top: #eee 1px solid;
        }

        .invoice .invoice-items .total td {
            border-top: 2px solid #333;
            border-bottom: 2px solid #333;
            font-weight: 700;
        }

        @media only screen and (max-width: 640px) {
            h2 {
                font-size: 18px !important;
            }

            .container {
                width: 100% !important;
            }

            .content,
            .content-wrap {
                padding: 10px !important;
            }

            .invoice {
                width: 100% !important;
            }
        }

        @media print {
            body * {
                visibility: hidden;
            }

            .print-container,
            .print-container * {
                visibility: visible;
            }

            .print-container {
                position: absolute;
                left: 0px;
                top: 0px;
                right: 0px;
            }
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