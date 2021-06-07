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
// $_SESSION['e'] = implode(',', $_POST['e']);
// $_SESSION['e_length'] = $_POST['e'];

//print("<pre>".print_r($e,true)."</pre>");
//echo $b."<br>";
//echo $c."<br>";
//echo $d."<br>";

if (isset($_GET["Showtime_ID"])) {
  $showtime_id = $_GET["Showtime_ID"];
  //echo "Showtime_ID ==> ". $_GET["Showtime_ID"];
  $shwSQL = "SELECT DISTINCT showtime.* , movie.* ,branch.*  FROM showtime 
  INNER JOIN 
  movie ON showtime.Movie_ID = movie.Movie_ID
  INNER JOIN
  theater ON theater.Theater_ID = showtime.Theater_ID 
  INNER JOIN
  branch ON theater.Branch_ID = branch.Branch_ID AND showtime.Showtime_ID = $showtime_id";
  $showQuery = mysqli_query($mysqli, $shwSQL);
  $showResult = mysqli_fetch_array($showQuery);
  //echo "<br>".$showResult['Showtime']."<br>".$showResult['Movie_Name']."<br>".$showResult['Branch_Name']."<br>".$showResult['Theater_ID'];
}

?>

<!DOCTYPE html>

<head>
  <!-- <titile>Second page</titile> -->
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
  <script type="text/javascript" src="./js/bootstrap.min"></script>

  <title>Seating page</title>
  <style>
    /* .background2{
              color:lightblue;
            } */
    body {
      background-color: lightblue;
    }

    footer {}

    #screen {
      background-color: white;
      width: 100%;
      height: auto;
      border: 10px solid green;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      /* margin: 20px; */
      text-align: center;
      box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
      border-radius: 10px;
    }

    #box {
      background-color: #fada98;
      width: 100%;
      height: auto;
      font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
      border-radius: 10px;
      padding-top: 20px;
      padding-bottom: 20px;

    }

    #th-left {
      background-color: black;
      color: white;
      text-align: center;
      /* width: 100%; */
    }

    #td-center {
      background-color: white;
      color: black;
      text-align: center;
    }
  </style>

</head>


<body style="background-image: url(./asset/bg.jpg);  background-position: center; background-attachment: fixed;">
  <!-- Header -->
  <!-- Header -->

  <nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19); background-color: #ffcc66;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="./asset/LogoColor.png" alt="BobaByBoat" width="130px" height="80px" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <span id="date"> </span>
        <ul class="navbar-nav me-6 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-end"><?php echo "Movie: " . $showResult['Movie_Name'] . "<br>" . "Showtime: " . $showResult['Showtime'] .
                                            "<br>" . "Theater: " . $showResult['Theater_ID'] . "<br>" . "Branch: " . $showResult['Branch_Name']; ?> </a>
          </li>
        </ul>
      </div>
    </div>
  </nav>



  <div class="mx-auto" style="width: 80%; margin-bottom:20px; margin-top:20px; margin: left 200px;">
    <div id="screen" style="border-color: #ffcc66;">
      <h1>SCREEN</h1>
    </div>
  </div>

  <div class="mx-auto" style="width: 80%;">
    <div id="box">


      <div class="d-flex justify-content-around">
        <table class="text-center">
          <form method="post" action="tmp.php">
            <tr>
              <td>H</td>
              <?php
              for ($i = 80; $i >= 71; $i--) { ?>
                <td class="center">
                  <?php
                  $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'");
                  $chk = $sql_[0];

                  $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>

                    <img src='asset/com.png'><br>
                    <?= $i; ?>
                  <?php } else { ?>
                    <label>
                      <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                      <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                      <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                    </label>
                  <?php } ?>
                </td>
              <?php
              } ?>
              <td>H</td>
            </tr>

            <tr>
              <td style="padding: right 130px;">G</td>
              <?php
              for ($i = 70; $i >= 61; $i--) { ?>
                <td class="center">
                  <?php
                  $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'");
                  $chk = $sql_[0];
                  $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>
                    <img src='asset/com.png'><br>
                    <?= $i; ?>
                  <?php } else { ?>
                    <label>
                      <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                      <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                      <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                    </label>
                  <?php } ?>
                </td>
              <?php
              } ?>
              <td>G</td>
            </tr>

            <tr>
              <td style=padding: right 130px;>F</td>
              <?php
              for ($i = 60; $i >= 51; $i--) { ?>
                <td class="center">
                  <?php
                  $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id' ");
                  $chk = $sql_[0];
                  $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>
                    <img src='asset/com.png'><br>
                    <?= $i; ?>
                  <?php } else { ?>
                    <label>
                      <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                      <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                      <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                    </label>
                  <?php } ?>
                </td>
              <?php
              } ?>
              <td>F</td>
            </tr>
        </table>
      </div>
      <!-- <hr style="width:90%; text-align:center"> -->
      <!-- <hr style=" border: 30px solid yellow"> -->
      <!-- <div>
          <td style="background-color: coral; align:center"> Second class</td>
          </div> -->
      <!-- <h2>primierm</h2> -->

      <div class="d-flex justify-content-around">
        <table class="text-center">
          <tr>
            <td style=padding: right 130px;>E</td>
            <?php
            for ($i = 50; $i >= 41; $i--) { ?>
              <td class="center">
                <?php
                $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id' ");
                $chk = $sql_[0];
                $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>
                  <img src='asset/com.png'><br>
                  <?= $i; ?>
                <?php } else { ?>
                  <label>
                    <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                    <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                    <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                  </label>
                <?php } ?>
              </td>
            <?php
            } ?>
            <td>E</td>
          </tr>


          <tr>
            <td style=padding: right 130px;>D</td>
            <?php
            for ($i = 40; $i >= 31; $i--) { ?>
              <td class="center">
                <?php
                $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id' ");
                $chk = $sql_[0];
                $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>
                  <img src='asset/com.png'><br>
                  <?= $i; ?>
                <?php } else { ?>
                  <label>
                    <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                    <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                    <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                  </label>
                <?php } ?>
              </td>
            <?php
            } ?>
            <td>D</td>
          </tr>

          <tr>
            <td style=padding: right 130px;>C</td>
            <?php
            for ($i = 30; $i >= 21; $i--) { ?>
              <td class="center">
                <?php
                $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id' ");
                $chk = $sql_[0];
                $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>
                  <img src='asset/com.png'><br>
                  <?= $i; ?>
                <?php } else { ?>
                  <label>
                    <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                    <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                    <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                  </label>
                <?php } ?>
              </td>
            <?php
            } ?>
            <td>C</td>
          </tr>

        </table>


      </div>

      <!-- <hr> -->

      <div class="d-flex justify-content-around">
        <table class="text-center">
          <tr>
            <td style=padding: right 130px;>B</td>
            <?php
            for ($i = 20; $i >= 11; $i--) { ?>
              <td class="center">
                <?php
                $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id' ");
                $chk = $sql_[0];
                $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>
                  <img src='asset/com.png'><br>
                  <?= $i; ?>
                <?php } else { ?>
                  <label>
                    <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                    <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                    <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                  </label>
                <?php } ?>
              </td>
            <?php
            } ?>
            <td>B</td>
          </tr>


          <tr>
            <td style="padding: right 130px;">A</td>
            <?php
            for ($i = 10; $i >= 1; $i--) { ?>
              <td class="center">
                <?php
                $sql_ = select("select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id' ");
                $chk = $sql_[0];
                $fetch = "select * from seat where Seat_Number='$i' and Showtime_ID ='$showtime_id'";
                  $result = mysqli_query($mysqli, $fetch);
                  $movie = mysqli_fetch_all($result, MYSQLI_ASSOC);

                  if (count($movie) > 0) {?>
                  <img src='asset/com.png'><br>
                  <?= $i; ?>
                <?php } else { ?>
                  <label>
                    <img onclick="img('1','<?= $i; ?>');" id="<?= $i; ?>c" src="asset/chair.png">
                    <img onclick="img('0','<?= $i; ?>');" id="<?= $i; ?>s" src="asset/select.png" style="display: none;"><br>
                    <input name="e[]" type="checkbox" value="<?= $i; ?>" hidden=""><?= $i; ?>
                  </label>
                <?php } ?>
              </td>
            <?php
            } ?>
            <td>A</td>
          </tr>
        </table>
      </div>
    </div>
    <br>
    <div class="text-start">
  
      <input type="hidden" name="movie" value="<?= $showResult['Movie_Name'] ?>">
      <input type="hidden" name="showtime" value="<?= $showResult['Showtime'] ?>">
      <input type="hidden" name="branch" value="<?= $showResult['Branch_Name'] ?>">
      <input type="hidden" name="theater" value="<?= $showResult['Theater_ID'] ?>">
      <input type="hidden" name="showtimeid" value="<?= $showtime_id ?>">
    </div>
    
    <div class="text-end float-end">
      <button class="btn btn-success">Next</button>
    </div>
    </form>
    
    <a href="index.php">
    <button class="btn btn-primary">Back</button>
    </a>
    <br>
    <br>
    
  </div>
  <br>

<?php require "footer.php" ?>
  </html>
