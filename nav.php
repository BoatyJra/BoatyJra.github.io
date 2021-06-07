<?php
session_start();
include('connection.php');
$branch_id = $_SESSION['branch'];


?>
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

<nav class="navbar navbar-expand-lg navbar-light" style="box-shadow: 0 4px 8px 0 rgba(0, 0,0, 0.2), 0 6px 20px 0 rgba(0,0,0, 0.19); background-color: #ffcc66;">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="LogoColor.png" alt="BobaByBoat" width="130px" height="80px" /></a>
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
      <span id="date"> </span>
      <ul class="navbar-nav me-6 mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="login.php">Staff Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>