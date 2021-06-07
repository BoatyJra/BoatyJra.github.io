<?php

session_start();
require_once("load.php");
@$time_d = $_POST['t'];
@$name = $_POST['name'];
@$school = $_POST['school'];

@$member_id = $_POST['member_id'];
@$payment_type = $_POST['payment_type'];


@$movie = $_POST['movie'];
@$showtime = $_POST['showtime'];
@$branch = $_POST['branch'];
@$theater = $_POST['theater'];
@$showtimeid = $_POST['showtimeid'];

$error = array('paymentID'=>'','paymentType'=>'');
if (isset($_POST["submit"])) {
    if (!empty($_POST['member_id']) && !empty($_POST['payment_type'])) {
        $test = 0;
        @$member_id = $_POST['member_id'];
        @$payment_type = $_POST['payment_type'];
        $_SESSION['member_id'] = $_POST['member_id'] ; 
        $_SESSION['payment_type'] = $_POST['payment_type']; 
        $stSQL = "SELECT * FROM member WHERE Member_ID = '$member_id'";
        $stQuery = mysqli_query($mysqli,$stSQL);
        while($row = mysqli_fetch_array($stQuery, MYSQLI_ASSOC)) {
            $test = $test +1;

        }
        if($test>0){
         header("Location: save.php");
        }
       else {
            $error['paymentID'] = "Invalid Member IDs, Please Enter Again!";

        }
    } else {
        if (empty($_POST['member_id'])) {
            $error['paymentID'] = "Please Enter Your Member IDs";
        }
        if (empty($_POST['payment_type'])) {
            $error['paymentType'] = "Please Selected Your Payment Method";

        }
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>

    <title>Boba Cineplex</title>
</head>


<body style="background-image: url(bg.jpg);  background-position: center; background-attachment: fixed;">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19); background-color: #ffcc66;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html"><img src="./asset/LogoColor.png" alt="BobaByBoat" width="130px" height="80px" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="product.html">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.html">Register</a>
                    </li>
                </ul>
                <ul class="navbar-nav me-6 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="login.html">Staff Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container bg-white pt-2 pb-4 ">
        <form method="post" action="">

            <div>
                <p class="display-4">Please Enter Your Member ID</p>
            </div>
            <div class="container" style="margin-top: 10%;">
                <!-- <form> -->
                <!-- Text Field -->
                <div class="mb-3">
                    <label for="์Name" class="form-label"><b>Member ID</b></label>
                    <input name="member_id" type="text" placeholder="Type Your Member ID" class="form-control">
                    <div class="red-text"><?php echo $error['paymentID']; ?></div>
                </div>
                <!-- </form> -->
            </div>
                <p style="text-align: center;"><b>Choose Your Payment Method</b></p>
                <!-- <form> -->
                <div class="radio-buttons">
                    <label class="custom-radio">
                        <input type="radio" name="payment_type" id="Member" value="Credit" />
                        <span class="radio-btn"><i class="las la-check"></i>
                            <div class="hobbies-icon">
                                <i class="lab la-cc-mastercard"></i>
                                <h3>Credit Card</h3>
                            </div>
                        </span>
                    </label>
                    <label class="custom-radio">
                        <input type="radio" name="payment_type" id="Member" value="Cash" />
                        <span class="radio-btn"><i class="las la-check"></i>
                            <div class="hobbies-icon">
                                <i class="las la-money-bill-wave"></i>
                                <h3>Cash</h3>
                            </div>
                        </span>
                    </label>
                    <div class="red-text"><?php echo $error['paymentType']; ?></div>

                </div>
                <!-- </form> -->

            
            <div class="text-end">
            
                <br><button type="submit" name="submit" class="btn btn-success">Confirm</button>
            </div>

        </form>
     


    </div>


    <div class="footer-area footer-padding" style="padding-bottom: 0; width: 100%; ">
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
    </div>
</body>

</html>