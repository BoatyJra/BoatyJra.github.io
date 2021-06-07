<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.js"></script>  
    <title>Boba Cineplex</title>
    <style>
        
            /* background-image: url("LogoColor.png"); */
        
    </style>
</head>

<body style="background-image: url(bg.jpg);  background-position: center; background-attachment: fixed;">
  
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
          </ul>
        
        </div>
      </div>
    </nav>

  <div class ="container bg-white pt-2 pb-4 ">
      <div>
          <p class="display-4">Login (Staff Only)</p>
      </div>
    

    <div class="container" style="margin-top: 10%;">
        <form action="loginGate.php" method="post"> 
            <!-- Text Field -->
            <div class="mb-3">
                <label for="์Name" class="form-label">Staff ID</label>
                <input type="text" name = "staff_id" placeholder="Type Your Staff ID" class="form-control">
            </div>
            <div class="mb-3">
                <label for="Password" class="form-label">Password</label>
                <input type="password" name = "password" placeholder="Type Your Password" class="form-control">
            </div>
            <br><input type="submit" name="submit" id="submit" value="Login" class="btn btn-success">
        </form>
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
      <!-- Footer End-->
    </footer>
</body>
</html>