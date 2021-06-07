<?php 
error_reporting(0);
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
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;700;800&display=swap" rel="stylesheet" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
  <script src="js/bootstrap.js"></script>
  <title>Boba Cineplex</title>
  <style>
    /* background-image: url("LogoColor.png"); */
  </style>
</head>

<body style="background-image: url(bg.jpg);  background-position: center; background-attachment: fixed;">

  <!-- Header -->
  <?php require 'nav.php' ?>

  <div class="container bg-white pt-2 pb-4">
    <p class="display-4">Registration Form</p>
    <div>
      <h2 style="text-align: center;"><br>Please Choose Your Membership</h2>
      <form method="post" id="insert-form">
        <div class="radio-buttons">
          <label class="custom-radio">
            <input type="radio" name="discount_id" id="discount_id" value="sl" />
            <span class="radio-btn"><i class="las la-check"></i>
              <div class="hobbies-icon">
                <i class="las la-coins"></i>
                <h3>Silver<br>100฿</h3>

              </div>
            </span>
          </label>
          <label class="custom-radio">
            <input type="radio" name="discount_id" id="discount_id" value="gd" />
            <span class="radio-btn"><i class="las la-check"></i>
              <div class="hobbies-icon">
                <i class="las la-money-bill-wave-alt"></i>
                <h3>Gold<br>200฿</h3>
              </div>
            </span>
          </label>
          <label class="custom-radio">
            <input type="radio" name="discount_id" id="discount_id" value="pt" />
            <span class="radio-btn"><i class="las la-check"></i>
              <div class="hobbies-icon">
                <i class="las la-gem"></i>
                <h3>platinum<br>300฿</h3>
              </div>
            </span>
          </label>
        </div>
    </div>
    <br>




    <strong>Please Type Your Information Here</strong>
    <div class="container" style="margin-top: 20px;">
      <!-- Text Field -->
      <div class="mb-3">
        <label for="name" class="form-label">Firstname</label>
        <input type="text" id="firstname" name="firstname" placeholder="Please Type Your Firstname" class="form-control" require>
      </div>
      <div class="mb-3">
        <label for="name" class="form-label">Lastname</label>
        <input type="text" id="lastname" name="lastname" placeholder="Please Type Your Lastname" class="form-control" require>
      </div>
      <div class="mb-3">
        <label for="text" class="form-label">Phone Number</label>
        <input type="tel" class="form-control" id="tel" name="tel" placeholder="Your Phone Number" pattern="[0-9]{10}" required>
      </div>
      <div class="mb-3">
        <label for="number" class="form-label">ID Card Number</label>
        <input type="tel" id="id_no" name="id_no" placeholder="Please Type Your ID" class="form-control" pattern="[0-9]{13}" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" id="email" name="email" placeholder="Please Type Your Email" class="form-control">
      </div>
      <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea class="form-control" id="address" name="address" cols="30" rows="5" placeholder="Please Type Your Address"></textarea>
      </div>

    </div>


    <br>





    <div class="text-end">
      <input type="button" name="add" value="Confirm" class="btn btn-success" data-bs-target="#addModal" data-bs-toggle="modal" onclick="showInput1(); showInput2(); showInput3(); showInput4(); showInput6(); showInput7(); showInput8();"></input>
    </div>
  </div>


  <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Please Check Your Information</h5>
          <button class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <p class="fs-4">Membership Type</p>
          <p>Your Membership : <span id='display1'></span></p>
          <hr>
          <p class="fs-4">Information</p>
          <p>Firstname : <span id='display2'></span></p>
          <p>Lastname : <span id='display3'></span></p>
          <p>Phone Number : <span id='display4'></span></p>
          <p>ID Card Number : <span id='display6'></span></p>
          <p>Email : <span id='display7'></span></p>
          <p>Address : <span id='display8'></span></p>
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
            <br><hr>
           <div>
            <button class="btn btn-secondary float-start" data-bs-dismiss="modal">Cancel</button>
            <input type="submit" id="insert" class="btn btn-success float-end" /></input>
            </div>
          </div>
        </div>
      </div>
      </form>
    </div>
  </div>

  <?php require 'footer.php' ?>

  <script>
    $(document).ready(function() {
      $('#insert-form').on('submit', function(e) {
        e.preventDefault();
        $.ajax({
          url: "registerInsert.php",
          method: "post",
          data: $('#insert-form').serialize(),
          beforeSend: function() {
            $('#insert').val('Submit');
          },
          success: function(data) {
            $('#insert-form')[0].reset();
            $('#addModal').modal('hide');
            // location.reload();
          }
        });
      });
    });
  </script>

  <script language="JavaScript">
    function showInput1() {
      document.getElementById('display1').innerHTML =
        document.querySelector('input[id="discount_id"]:checked').value;
    }
  </script>

  <script language="JavaScript">
    function showInput2() {
      document.getElementById('display2').innerHTML =
        document.getElementById("firstname").value;
    }
  </script>

  <script language="JavaScript">
    function showInput3() {
      document.getElementById('display3').innerHTML =
        document.getElementById("lastname").value;
    }
  </script>

  <script language="JavaScript">
    function showInput4() {
      document.getElementById('display4').innerHTML =
        document.getElementById("tel").value;
    }
  </script>

  <script language="JavaScript">
    function showInput6() {
      document.getElementById('display6').innerHTML =
        document.getElementById("id_no").value;
    }
  </script>

  <script language="JavaScript">
    function showInput7() {
      document.getElementById('display7').innerHTML =
        document.getElementById("email").value;
    }
  </script>

  <script language="JavaScript">
    function showInput8() {
      document.getElementById('display8').innerHTML =
        document.getElementById("address").value;
    }
  </script>

</body>

</html>