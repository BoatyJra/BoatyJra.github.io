<?php
  session_start();
  include('connection.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script> 
    <script src="js/bootstrap.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
    window.onload = setInterval(clock,1000);

    function clock()
    {
      var d = new Date();
      
      var date = d.getDate().toString();
      date=date.length==1 ? 0+date : date;
      
      var month = d.getMonth();
      var montharr =["Jan","Feb","Mar","April","May","June","July","Aug","Sep","Oct","Nov","Dec"];
      month=montharr[month];
      
      var year = d.getFullYear();
      
      var day = d.getDay();
      var dayarr =["Sun","Mon","Tues","Wed","Thurs","Fri","Sat"];
      day=dayarr[day];
      
      var hour =d.getHours();
      hour=hour.toString().length==1? 0+hour.toString() : hour;
      var min = d.getMinutes();
      min=min.length==1 ? 0+min : min;
      var sec = d.getSeconds();
      sec=sec.length==1 ? 0+sec : sec;

      document.getElementById("date").innerHTML=day+" "+date+" "+month+" "+year+" "+hour+":"+min+":"+sec;
    }
  </script>
    <style>
    .hide {
        display: none;
        }
    </style>
    <title>Boba Cineplex</title>
</head>

<body style="background-image: url(bg.jpg);  background-position: center; background-attachment: fixed;">
  
    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light" style = "box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19); background-color: #ffcc66;">        <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="LogoColor.png" alt = "BobaByBoat" width="130px" height="80px"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="product.php">Products</a>
              </li>      
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>         
            </ul>
            <span id="date">  </span>
            <ul class="navbar-nav me-6 mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="login.php">Staff Login</a>
              </li>  
            </ul>
          </div>
        </div>
      </nav>

    <div class ="container bg-white pt-2 pb-4 ">
        <?php 
        if(isset($_GET["Showtime_ID"])){
            $showtime_id = $_GET["Showtime_ID"];
            echo "Showtime_ID ==> ". $_GET["Showtime_ID"];
            $shwSQL = "SELECT DISTINCT showtime.* , movie.* ,branch.*  FROM showtime 
            INNER JOIN 
            movie ON showtime.Movie_ID = movie.Movie_ID
            INNER JOIN
            theater ON theater.Theater_ID = showtime.Theater_ID 
            INNER JOIN
            branch ON theater.Branch_ID = branch.Branch_ID AND showtime.Showtime_ID = $showtime_id";
            $showQuery= mysqli_query($conn,$shwSQL);
            $showResult = mysqli_fetch_array($showQuery);
            echo "<br>".$showResult['Showtime']."<br>".$showResult['Movie_Name']."<br>".$showResult['Branch_Name'];
          
        }
        ?>












    </div>
    <div class="footer-area footer-padding" style="padding-bottom: 0; width: 100%; ">
    <!-- <div class="container"> -->

        <!-- Footer bottom -->
        <div class="row" style="background-color: #ffcc66; padding-top: 2%; box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19);" >
        <div style="flex: 1; width: 100%;">
            <div class="logo" style=" text-align: center;">
            <img
                src="LogoColor.png"
                style="width: 105px; height: 65px;"
                alt=""
            />
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

    </footer>

</body>
</html>