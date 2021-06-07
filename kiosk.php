<?php
session_start();
include('connection.php');
$bID = $_SESSION['branch'];
$bquery = "SELECT * FROM branch WHERE Branch_ID = $bID";
$bresult = mysqli_query($conn, $bquery);
$brow = mysqli_fetch_array($bresult);
$bname = $brow['Branch_Name'];

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="crudstyle.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css" />
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <title>Boba Cineplex</title>
  <style>
    /* background-image: url("LogoColor.png"); */
  </style>
</head>

<body style="background-image: url(./asset/bg.jpg);  background-position: center;">
  <nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19); background-color: #ffcc66;">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="./asset/LogoColor.png" alt="Boba" width="130px" height="80px" /></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kiosk.php">Products</a>
          </li>
        </ul>
        <ul class="navbar-nav me-6 mb-2 mb-lg-0">
          <li class="dropdown">
            <a href="indexStaff.php" class="nav-link" >Back to Staff Index  </a>
            <ul class="dropdown-menu">
              <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container bg-white pt-2 pb-4">
    <div class="clearfix">
      <p class="display-4">Popcorn & Drinks</p><br>
      <button style="width: 30%; height: 30%; margin-right: 2%; background-color: white;" class="float-start" data-bs-toggle="popover" title="Product" data-bs-content="Popcorn that can make you smile. Made from the corn at KMUTT with the ingredients from KMITL."><img src="./asset/popcorn.png"></button>
      <h6>Boba Popcorn</h6>
      <p>Come with 3 Prices - Small : 30, Medium : 50, Large : 70</p><br><br><br><br>
      <form method="post" id="insert-form" class="row g-3">
        <div class="col-auto">
          <label for="Quantity" class="fs-5">Small </label>
          <input type="number" name="Spop" id="Spop" class="form-control" min=0 max=10 value="0">
        </div>
        <div class="col-auto">
          <label for="Quantity" class="fs-5">Medium </label>
          <input type="number" name="Mpop" id="Mpop" class="form-control" min=0 max=10 value="0">
        </div>
        <div class="col-auto">
          <label for="Quantity" class="fs-5">Large </label>
          <input type="number" name="Lpop" id="Lpop" class="form-control" min=0 max=10 value="0">
        </div>
    </div>
    <hr>
    <div class="clearfix">
      <button style="width: 30%; height: 30%; margin-right: 2%; background-color: white;" class="float-start" data-bs-toggle="popover" title="Product" data-bs-content="A cola made from the waterfall of wisdom in Thailand. The flavor can make you go to heaven"><img src="./asset/drinks2.png"></button>
      <h6>Boba Cola</h6>
      <p>Come with 3 Prices - Small : 30, Medium : 50, Large : 70</p><br><br><br><br>
      <div class="row g-3">
        <div class="col-auto">
          <label for="Quantity">Small</label>
          <input type="number" name="Scola" id="Scola" class="form-control" min=0 max=10 value="0">
        </div>
        <div class="col-auto">
          <label for="Quantity">Medium</label>
          <input type="number" name="Mcola" id="Mcola" class="form-control" min=0 max=10 value="0">
        </div>
        <div class="col-auto">
          <label for="Quantity">Large</label>
          <input type="number" name="Lcola" id="Lcola" class="form-control" min=0 max=10 value="0">
        </div>
      </div>
    </div>
    <div class="text-end">
      <br><input type="button" name="add" value="Confirm" class="btn btn-success" data-bs-target="#addModal" data-bs-toggle="modal" onclick="showInput1(); showInput2(); showInput3(); showInput4(); showInput5(); showInput6();"></input><br><br>
    </div>
    <div id="addModal" class="modal fade" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Summary</h5>
            <button class="btn-close" data-bs-dismiss="modal"></button>
          </div>
          <div class="modal-body">
            <p class="fs-4">Popcorn</p>
            <p>Popcorn Small : <span id='display1'></span></p>
            <p>Popcorn Medium : <span id='display2'></span></p>
            <p>Popcorn Large : <span id='display3'></span></p>
            <hr>
            <p class="fs-4">Cola</p>
            <p>Cola Small : <span id='display4'></span></p>
            <p>Cola Medium : <span id='display5'></span></p>
            <p>Cola Large : <span id='display6'></span></p>
            <br>
            <hr>
            <p style="text-align: center;" class="h4"><br>Choose Your Payment Method</p>
            <div class="radio-buttons">
              <label class="custom-radio">
                <input type="radio" name="payment_type" id="payment_type" value="Credit" />
                <span class="radio-btn"><i class="las la-check"></i>
                  <div class="hobbies-icon">
                    <i class="lab la-cc-mastercard"></i>
                    <h3>Credit Card</h3>
                  </div>
                </span>
              </label>
              <label class="custom-radio">
                <input type="radio" name="payment_type" id="payment_type" value="Cash" />
                <span class="radio-btn"><i class="las la-check"></i>
                  <div class="hobbies-icon">
                    <i class="las la-money-bill-wave"></i>
                    <h3>Cash</h3>
                  </div>
                </span>
              </label>
              <br>
              <hr>
              <div>
                <button class="btn btn-secondary float-start" data-bs-dismiss="modal">Cancel</button>
                <input type="submit" id="insert" class="btn btn-success float-end" /></input>
              </div>
            </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php require 'footer.php' ?>
</body>
<script>
  $(document).ready(function() {
    $('#insert-form').on('submit', function(e) {
      e.preventDefault();
      $.ajax({
        url: "kioskInsert.php",
        method: "post",
        data: $('#insert-form').serialize(),
        beforeSend: function() {
          $('#insert').val('Submit');
        },
        success: function(data) {
          $('#insert-form')[0].reset();
          $('#addModal').modal('hide');
          location.reload();
        }
      });
    });
  });
</script>

<script>
  var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
  var popoverList = popoverTriggerList.map(function(popoverTriggerEl) {
    return new bootstrap.Popover(popoverTriggerEl)
  });
</script>

<script language="JavaScript">
  function showInput1() {
    document.getElementById('display1').innerHTML =
      document.getElementById("Spop").value;
  }
</script>

<script language="JavaScript">
  function showInput2() {
    document.getElementById('display2').innerHTML =
      document.getElementById("Mpop").value;
  }
</script>

<script language="JavaScript">
  function showInput3() {
    document.getElementById('display3').innerHTML =
      document.getElementById("Lpop").value;
  }
</script>

<script language="JavaScript">
  function showInput4() {
    document.getElementById('display4').innerHTML =
      document.getElementById("Scola").value;
  }
</script>

<script language="JavaScript">
  function showInput5() {
    document.getElementById('display5').innerHTML =
      document.getElementById("Mcola").value;
  }
</script>

<script language="JavaScript">
  function showInput6() {
    document.getElementById('display6').innerHTML =
      document.getElementById("Lcola").value;
  }
</script>

</body>
</html>