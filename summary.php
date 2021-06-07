<?php
require_once("load.php");
require_once("func.php");
error_reporting(E_ERROR | E_PARSE);


@$e = $_POST['e'];
@$b = $_POST['movie'];
@$c = $_POST['showtime'];
@$d = $_POST['branch'];
@$a = $_POST['theater'];
@$n = $_POST['showtimeid'];

if (isset($_GET["e"])) {
    $info['movie'] = $_GET["movie"];
    $info['theater'] = $_GET["theater"];
    $info['showtime'] = $_GET["showtime"];
    $info['branch'] = $_GET["branch"];
    $info['e'] = $_GET["e"];
    $info['Regular'] = $_GET["Regular"];
    $info['Premium'] = $_GET["Premium"];
    $info['Luxury'] = $_GET["Luxury"];
    $member_id = $_GET["member_id"];
    $info['payment_type'] = $_GET["payment_type"];
}
?>
<!DOCTYPE php>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="sumstyle.css">
    <link rel="stylesheet" type="text/css" href="print.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        window.onload = setInterval(clock, 1000);

        function clock() {
            var d = new Date();

            var date = d.getDate().toString();
            date = date.length == 1 ? 0 + date : date;

            var month = d.getMonth();
            var montharr = ["Jan", "Feb", "Mar", "April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
            month = montharr[month];

            var year = d.getFullYear();

            var day = d.getDay();
            var dayarr = ["Sun", "Mon", "Tues", "Wed", "Thurs", "Fri", "Sat"];
            day = dayarr[day];

            var hour = d.getHours();
            hour = hour.toString().length == 1 ? 0 + hour.toString() : hour;
            var min = d.getMinutes();
            min = min.length == 1 ? 0 + min : min;
            var sec = d.getSeconds();
            sec = sec.length == 1 ? 0 + sec : sec;

            document.getElementById("date").innerHTML = day + " " + date + " " + month + " " + year + " " + hour + ":" + min + ":" + sec;
        }
    </script>
    <style>
        .hide {
            display: none;
        }
    </style>
    <title>Boba Cineplex</title>
</head>

<body style="background-image: url(./asset/bg.jpg);  background-position: center; background-attachment: fixed;">

    <!-- Header -->
    <div id="non-printable">
        <?php require "nav.php" ?>
    </div>

    <div class="container bg-white pt-2 pb-4 ">
        <h4 class="display-4" id="non-printable">Summary</h4>
        <div id="invoice printable">

            <div class="toolbar hidden-print" id="non-printable">
                <div class="text-right">

                    <!-- <button class="btn btn-info"><i class="fa fa-file-pdf-o"></i> Export as PDF</button> -->
                </div>
                <hr>
            </div>
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <img class="w-50" src="./asset/LogoColor.png" data-holder-rendered="true" />
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    Movie Name :
                                    <?php echo $info['movie']; ?>
                                </h2>

                                <div>Theater :
                                    <?php echo $info['theater']; ?>

                                </div>
                                <div>Showtime :
                                    <?php echo $info['showtime']; ?>

                                </div>
                                <div>Branch Name :
                                    <?php echo $info['branch']; ?>

                                </div>
                                <div>Seat Number :
                                    <?php

                                    echo $info['e'];

                                    ?>

                                </div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <?php $stSQL = "SELECT * FROM member WHERE Member_ID = '$member_id'";
                                $stQuery = mysqli_query($mysqli, $stSQL);
                                while ($row = mysqli_fetch_array($stQuery, MYSQLI_ASSOC)) {
                                ?>
                                    <div class="text-gray-light">Member:</div>
                                    <h2 class="to">
                                        <?php
                                        echo $row['First_Name'] . " " .  $row['Last_Name'];
                                        ?>
                                    </h2>
                                    <div class="address">Member Type : <?php echo $row['Member_ID'] ?></div>
                                    <div class="email"><?php echo $row['Email'] ?></div>
                                <?php

                                } ?>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">Payment</h1>
                                <div class="date">Date of Date: <?php echo date(" j F ,Y ") . "<br>" ?> Time: <?php echo date("  h:i:s A")
                                                                                                                ?></div>
                                <div class="date">Payment Type: <?php echo $info['payment_type'] ?></div>
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">SEAT TYPE</th>
                                    <th class="text-right">PRICE/SEAT</th>
                                    <th class="text-right">QUANTITY</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 0; ?>
                                <?php
                                if ($info['Regular'] != 0) {
                                    $i = $i + 1;
                                ?>
                                    <tr>
                                        <td class="no"><?php echo $i; ?></td>
                                        <td class="text-left">
                                            <h3>
                                                Regular Seat
                                            </h3>
                                        </td>
                                        <td class="unit">
                                            <?php
                                            $stSQL = "SELECT Seat_Price FROM seatprice WHERE Seat_Type = 'Regular' ";
                                            $stQuery = mysqli_query($mysqli, $stSQL);


                                            while ($priceResultRegular = mysqli_fetch_array($stQuery)) {
                                                echo "฿";
                                                echo $priceResultRegular["Seat_Price"];
                                                $resultRegularPrice = $priceResultRegular["Seat_Price"];
                                            }
                                            ?>

                                        </td>
                                        <td class="qty"><?php echo  $info['Regular'] ?></td>
                                        <td class="total"><?php
                                                            $resultRegular = (int)$info['Regular'] * (int)$resultRegularPrice;
                                                            echo $resultRegular;

                                                            ?></td>
                                    </tr>
                                <?php
                                }
                                if ($info['Premium'] != 0) {
                                    $i = $i + 1;
                                ?>
                                    <tr>
                                        <td class="no"><?php echo $i; ?></td>
                                        <td class="text-left">
                                            <h3>Premium</h3>
                                        </td>
                                        <td class="unit">
                                            <?php
                                            $stSQL = "SELECT Seat_Price FROM seatprice WHERE Seat_Type = 'Premium' ";
                                            $stQuery = mysqli_query($mysqli, $stSQL);

                                            while ($priceResultPremium = mysqli_fetch_array($stQuery)) {
                                                echo "฿";
                                                echo $priceResultPremium["Seat_Price"];
                                                $resultPremiumPrice = $priceResultPremium["Seat_Price"];
                                            }
                                            ?>

                                        </td>
                                        <td class="qty">
                                            <?php
                                            echo  $info['Premium'];

                                            ?></td>
                                        <td class="total"><?php
                                                            $resultPremium =  (int)$info['Premium'] * (int)$resultPremiumPrice;
                                                            echo $resultPremium;

                                                            ?></td>
                                    </tr>
                                <?php
                                }
                                if ($info['Luxury'] != 0) {
                                    $i = $i + 1;
                                ?>
                                    <tr>
                                        <td class="no"><?php echo $i; ?></td>
                                        <td class="text-left">
                                            <h3>Luxury</h3>
                                        </td>
                                        <td class="unit">
                                            <?php
                                            $stSQL = "SELECT Seat_Price FROM seatprice WHERE Seat_Type = 'Luxury' ";
                                            $stQuery = mysqli_query($mysqli, $stSQL);


                                            while ($priceResultLuxury = mysqli_fetch_array($stQuery)) {
                                                echo "฿";
                                                echo $priceResultLuxury["Seat_Price"];
                                                $resultLuxuryPrice = $priceResultLuxury["Seat_Price"];
                                            }
                                            ?>
                                        </td>
                                        <td class="qty"><?php
                                                        echo  $info['Luxury'];

                                                        ?></td>
                                        <td class="total"><?php
                                                            $resultLuxury =  (int)$info['Luxury'] * (int)$resultLuxuryPrice;
                                                            echo $resultLuxury;

                                                            ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                            
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Subtotal</td>
                                    <td><?php
                                        echo $resultRegular + $resultPremium + $resultLuxury;
                                        ?> </td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Discount</td>
                                    <td> <?php $stSQL = "SELECT * FROM member WHERE Member_ID = '$member_id'";
                                            // SELECT * FROM customer WHERE CustomerID IN (SELECT CustomerID FROM audit WHERE Used >= '400000'
                                            $stQuery = mysqli_query($mysqli, $stSQL);
                                            while ($row = mysqli_fetch_array($stQuery, MYSQLI_ASSOC)) {
                                                $member_discount_id = $row["Discount_ID"];
                                                $stSQL_discount = "SELECT * FROM discount WHERE Discount_ID = '$member_discount_id'";
                                                $stQuery_discount = mysqli_query($mysqli, $stSQL_discount);
                                                while ($row1 = mysqli_fetch_array($stQuery_discount, MYSQLI_ASSOC)) {
                                                    $member_discount_id = $row1["Discount_Fee"];
                                                    // echo $member_discount_id. "%";
                                                    $subtotal =  $resultRegular + $resultPremium + $resultLuxury;
                                                    $total_discount = $subtotal * $member_discount_id / 100;
                                                    echo $total_discount;
                                                    // subtotal*ตัวdiscount/100
                                                }
                                                // subtotal*ตัวdiscount/100
                                            } ?></td>
                                </tr>
                                
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">TOTAL</td>
                                    <td><?php
                                        // session_start();
                                        // echo $resultRegular + $resultPremium + $resultLuxury;
                                        $subtotal =  $resultRegular + $resultPremium + $resultLuxury;
                                        $total = $subtotal - $total_discount;
                                        echo $total;
                                        ?>
                                    </td>   
                                </tr>
                                <tr>

                            </tfoot>
                        </table>
                        <!-- <div class="text-end float-end"> -->
                        <span class="text-start d-inline">
                            <div class="display-4" style="margin-top:-125px">Thank you!</div>
                        </span>
                        <a href="payment.php?total=<?= $total ?>">
                            <!-- <form method="post" action="payment.php"> -->
                            <div class="text-end"><br><br><br>
                            <button name="total" class="btn btn-success" value="<?php $total ?>">Proceed</button>
                            </div>
                            <!-- </div> -->
                            </form>
                        </a>


                    </main>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>

    </div>

    </div>

    <div class="footer-area footer-padding" id="non-printable" style="padding-bottom: 0; width: 100%; ">
        <!-- <div class="container"> -->

        <!-- Footer bottom -->
        <div class="row" style="background-color: #ffcc66; padding-top: 2%; box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19);">
            <div style="flex: 1; width: 100%;">
                <div class="logo" style=" text-align: center;">
                    <img src="./asset/LogoColor.png" style="width: 105px; height: 65px;" alt="" />
                </div>
                <br>
                <div class="footer-copy-right">

                    <p style="text-align:center">
                        Copyrights © 2019-2023 BOBA TEA COMPANY LIMITED. ALL RIGHTS
                        RESERVED
                    </p>
                </div>
            </div>

        </div>
        <!-- </div> -->
    </div>
    <!-- Footer End-->


</body>

</html>