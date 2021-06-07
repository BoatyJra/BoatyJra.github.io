<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="Datstyle.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>  
    <title>Boba Cineplex</title>
    <style>
        
            /* background-image: url("LogoColor.png"); */
        
    </style>
</head>

<body style="background-image: url(bg.jpg);  background-position: center;">
  <!-- Header -->
  <nav class="navbar navbar-expand-lg navbar-light" style = "box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19); background-color: #ffcc66;">
    <div class="container-fluid">
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
        </ul>
        <ul class="navbar-nav me-6 mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="login.php">Staff Login</a>
          </li>  
        </ul>
      
      </div>
    </div>
  </nav>

  <div class ="container bg-white pt-2 pb-4">
  <div class = "clearfix">
    <p class="display-4">Popcorn & Drinks</p><br>
    <button  style = "width: 30%; height: 30%; margin-right: 2%; background-color: white;" class = "float-start" data-bs-toggle="popover" title = "Product" data-bs-content="Popcorn that can make you smile. Made from the corn at KMUTT with the ingredients from KMITL."><img src="popcorn.png"></button>
    <h6>Boba Popcorn</h6>
    <p>Come with 3 Prices - S : 30, M : 50, L : 70</p>
  
    <form>
    <div style="margin-top: 9%;">
      <p><b>Order</b></p>
      <label for="Quantity" class="fs-4">S </label>
      <input type="number" name="Quantity" id="Spop" min=0 max=10 value="0">
      <label for="Quantity" class="fs-4">M </label>
      <input type="number" name="Quantity" id="Mpop" min=0 max=10 value="0">
      <label for="Quantity" class="fs-4">L </label>
      <input type="number" name="Quantity" id="Lpop" min=0 max=10 value="0">
    </form>
  </div>
</div>
  <hr>
  <div class = "clearfix">
    <button  style = "width: 30%; height: 30%; margin-right: 2%; background-color: white;" class = "float-start" data-bs-toggle="popover" title = "Product" data-bs-content="A cola made from the waterfall of wisdom in Thailand. The flavor can make you go to heaven"><img src="drinks2.png"></button>
    <h6>Boba Cola</h6>
    
    <p>Come with 3 Prices - S : 30, M : 50, L : 70</p>
  
    <form>
    <div style ="margin-top: 9%;">
      <p><b>Order</b></p>
      <label for="Quantity">S</label>
      <input type="number" name="Quantity" id="Scola" min=0 max=10 value="0">
      <label for="Quantity">M</label>
      <input type="number" name="Quantity" id="Mcola" min=0 max=10 value="0">
      <label for="Quantity">L</label>
      <input type="number" name="Quantity" id="Lcola" min=0 max=10 value="0">
    </form>
  </div>
</div>
  <div class="text-end">
    <button class="btn btn-success" data-bs-target="#showForm" data-bs-toggle="modal" onclick="showInput1(); showInput2(); showInput3(); showInput4(); showInput5(); showInput6();">Submit</button>
  </div>
    <div class="modal fade" id="showForm">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title">Summary</h5>
                  <button class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <form>
                  <p class="fs-4">Popcorn</p>
                  <p>Popcorn Small : <span id='display1'></span></p>
                  <p>Popcorn Medium : <span id='display2'></span></p>
                  <p>Popcorn Large : <span id='display3'></span></p>
                  <hr>
                  <p class="fs-4">Cola</p>
                  <p>Cola Small : <span id='display4'></span></p>
                  <p>Cola Medium : <span id='display5'></span></p>
                  <p>Cola Large : <span id='display6'></span></p>
                </form>
              </div>
              <div class="modal-footer">
                  <button class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button class="btn btn-success" value="Confirm">Confirm</button>
              </div>
          </div>
      </div>
  </div>
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
  
  <script>
    var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
    var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
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

</body>
</html>