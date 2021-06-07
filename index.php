<?php
  error_reporting(0);
  session_start();
  include('connection.php');
  $_SESSION['branch'] = '';
  $branchSelected = $_SESSION['branch'];

?>

<!DOCTYPE php>
<php lang="en">
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

<body style="background-image: url(./asset/bg.jpg);  background-position: center; background-attachment: fixed;">

    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light" style = "box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19); background-color: #ffcc66;">        
    <div class="container-fluid">
          <a class="navbar-brand" href="index.php"><img src="./asset/LogoColor.png" alt = "BobaByBoat" width="130px" height="80px"/></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
              </li> 
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>         
            </ul>
            <span id="date">  </span>
            <ul class="navbar-nav me-6 mb-2 mb-lg-0">
              <li class="nav-item">
                <?php
                if($_SESSION['branch']== '')
                {
                ?>
                <a class="nav-link" href="login.php">Staff Login</a>
                <?php } 
                else{ ?>
                <a class="nav-link" href="logout.php">Log Out</a>
                <?php
                }
                ?>
              </li>  
            </ul>
          </div>
        </div>
      </nav>

      
    <div class ="container bg-white pt-2 pb-4 ">

      <div class="container">
        <div class="row">
            <div class="col-sm-6 m-auto d-inline float-start">
              <!-- Carousel Test -->
              <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                  <div class="carousel-inner">                  
                    <div class="carousel-item active" data-bs-interval="4000">
                      <img src="./asset/fast7acc.jpg" class="d-block w-100 float-start border border-dark border-4" style="height: 375px;" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                      <img src="./asset/mifacc.jpg" class="d-block w-100 float-start border border-dark border-4" style="height: 375px;" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="4000">
                      <img src="./asset/gvkacc.jpg" class="d-block w-100 float-start border border-dark border-4" style="height: 375px;" alt="...">
                    </div>
                  </div>
                  <div class="col-sm-6 m-auto">
                  </div>
                  <button class="carousel-control-prev float-start" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                  </button>
                  <button class="carousel-control-next float-start" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                  </button>
                </div>
            </div>
          </div>
        </div>

        <span><p align = "center"><b>Featured Movies</b></p></span>
        <br>
        
        
        <button class="w-100">
        <form action="" method = "post" name = "myform">
        <select  name = "branch" class="div-toggle text-center w-100 text-center bg-warning form-select" id="mySelect" >
        <option selected value="0000" data-show=".data">Branch Select</option>
        <?php
        $strSQL = "SELECT * FROM branch ORDER BY Branch_ID ASC";
        $objQuery = mysqli_query($conn,$strSQL);
        while($brachResult = mysqli_fetch_array($objQuery))
            {
            ?>

            <option  name = "Branch_ID" value="<?php echo $brachResult["Branch_ID"];  ?>" data-show=".hide"><?php echo $brachResult["Branch_Name"];?></option>
            <?php
            }
        ?>
        </select>
        <input type = "submit" name = "submit" value = "Select" >
        </form>
        </button>
        
    
        <p id="demo"></p>
    <script>
        function myFunction() {
            var x = document.getElementById("mySelect").value;
            document.getElementById("demo").innerHTML = "You selected: " + x;
        }
    </script>
    <?php  

        if(isset($_POST["submit"])){
            $branchSelected=$_POST["branch"];
            $bcnSQL = "SELECT * FROM branch WHERE Branch_ID = $branchSelected";
            $branchSelectedQuery = mysqli_query($conn,$bcnSQL);
            $branchSelectedName = mysqli_fetch_array($branchSelectedQuery);
        }
    ?>
    <script>
        $(document).on('change', '.div-toggle', function() {
        var target = $(this).data('target');
        var show = $("option:selected", this).data('show');
        $(target).children().addClass('hide');
        $(show).removeClass('hide');
        });

        $(document).ready(function(){
        $('.div-toggle').trigger('change');
        });
    </script>
        
        

    <!-- Movie -->
    <hr> 
    <div class = "data hide">
    <div class="border border-5 rounded-3 bg-info text-white py-3 ps-4" style="margin-bottom: 2%;" role="alert">
        <b><?php echo $branchSelectedName["Branch_Name"];?></b>
    </div>
    
    <?php
    
    $movieSQL = "SELECT DISTINCT movie.* FROM movie INNER JOIN 
                    showtime ON showtime.Movie_ID = movie.Movie_ID
                    INNER JOIN
                    theater ON theater.Theater_ID = showtime.Theater_ID AND theater.Branch_ID = $branchSelected";
    /*
    $movieQuery = mysqli_query($conn,$movieSQL);*/
        /*$movieSQL = "SELECT * FROM movie ";*/
        $movieQuery = mysqli_query($conn,$movieSQL);
        while($movieResult = mysqli_fetch_array($movieQuery, MYSQLI_ASSOC))
            {
            $movieID = $movieResult["Movie_ID"];
            ?>
            
            <div class="clearfix" style="margin-left: 3%;">
            <div>
                <a href = "index.php"><img src = "./asset/<?php echo $movieResult["Movie_Image"]?>" style="width: 15%; height: 30%;" class="border border-2 border-dark float-start"></a>
                <h3 class="fw-bold " style="margin-left: 16%;"><?php echo $movieResult["Movie_Name"];?></h3>
                <p style="margin-left: 16%;">Duration : <?php echo $movieResult["Movie_Duration"];?> Minutes</p>
            
                <a href = https://www.youtube.com/watch?<?php echo $movieResult["Movie_Trailer"];?> target="_blank" class = "btn btn-dark d-inline" style="margin-left: 1%;">Trailer</a>
                <button class="btn btn-dark" 
                    data-bs-toggle="collapse"
                    data-bs-target="#collapse-content<?php echo $movieID ?>">Details</button>  
                    <!-- Content -->
                    <br>
                    <div id="collapse-content<?php echo $movieID ?>" class="collapse my-2">
                        <div class="card">
                            <div class="card-body">
                            <p ><?php echo $movieResult["Movie_Description"];?> </p>
                            </div>
                        </div>
                </div>
            </div>
            </div>
            <br>
            <div>
            <h5 class = "fw-bold d-inline" style="margin-left: 3%;">Showtime :</h5>
            
            <?php

              $stSQL = "SELECT * FROM showtime WHERE Movie_ID = $movieID AND Theater_ID LIKE '$branchSelected%'";
                $stQuery = mysqli_query($conn,$stSQL);
                while($stResult = mysqli_fetch_array($stQuery))
                    {
                    ?>
                    <form action = "second.php" method = "get" class="d-inline">
                    <button name="Showtime_ID" type="submit" class="btn btn-dark" value=" <?php echo $stResult['Showtime_ID'] ?>"> <?php echo $stResult['Showtime'] ?></button>
                  </form>
                    <?php
                    }
                ?>

            </div>
            <hr>
            <?php
            }
        ?>
        
</div>
    </div>

<?php require "footer.php" ?>

</body>
</php>