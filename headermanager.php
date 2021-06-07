<?php
    $bID = $_SESSION['branch'];
    $bquery = "SELECT * FROM branch WHERE Branch_ID = $bID";
    $bresult = mysqli_query($conn,$bquery);
    $brow = mysqli_fetch_array($bresult);
    $bname = $brow['Branch_Name'];

?>
<div id="throbber" style="display:none; min-height:120px;"></div>
<div id="noty-holder"></div>
<div id="wrapper">
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <h3>Boba Tools</h3>
            </a>
        </div>
        <!-- Top Menu Items -->
        <ul class="nav navbar-right top-nav">           
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome: <?php echo $_SESSION['user'].'<br>'.$bname; ?> <b class="fa fa-angle-down"></b></a>
                <ul class="dropdown-menu">
                    <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav side-nav">
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i>  DATA<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-1" class="collapse">
                        <li><a href="indexManager.php"><i class="fa fa-angle-double-right"></i> Your Information</a></li>
                        <li><a href="infoBranchManager.php"><i class="fa fa-angle-double-right"></i> Branch Information</a></li>
                        <li><a href="staffManager.php"><i class="fa fa-angle-double-right"></i> Staff</a></li>
                        <li><a href="movieManager.php"><i class="fa fa-angle-double-right"></i> Movie</a></li>
                        <li><a href="showtimeManager.php"><i class="fa fa-angle-double-right"></i> Showtime</a></li>
                        <li><a href="seatPriceManager.php"><i class="fa fa-angle-double-right"></i> Seat Price</a></li>
                        <li><a href="productManager.php"><i class="fa fa-angle-double-right"></i> Product Stock</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-fw fa-search"></i>Analysis<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                    <ul id="submenu-2" class="collapse">
                        <li><a href="infoPayment.php"><i class="fa fa-angle-double-right"></i> Payment Information</a></li>
                        <li><a href="infoStaff.php"><i class="fa fa-angle-double-right"></i> Staff Information</a></li>
                        <li><a href="infoMovie.php"><i class="fa fa-angle-double-right"></i> Movie Information</a></li>
                        <li><a href="infoMember.php"><i class="fa fa-angle-double-right"></i> Member Information</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </nav>
    <br><br>
