<?php
session_start();
include('connection.php');

$branch_id = $_SESSION['branch'];
$id =  $_SESSION['staff_id'];

$bID = $_SESSION['branch'];
$bquery = "SELECT * FROM branch WHERE Branch_ID = $bID";
$bresult = mysqli_query($conn, $bquery);
$brow = mysqli_fetch_array($bresult);
$bname = $brow['Branch_Name'];

$squery = "SELECT * FROM staff WHERE Staff_ID = $id";
$sresult = mysqli_query($conn, $squery);
$srow = mysqli_fetch_array($sresult);

$user = $srow['Firstname'] . " " . $srow['Lastname'];
$role = $srow['Role'];
$salary = $srow['Salary'];
$id_no = $srow['ID_NO'];
$tel = $srow['Staff_Tel'];
$address = $srow['Address'];
$dob = $srow['Staff_DoB'];


$today = date("Y-m-d");
$diff = date_diff(date_create($dob), date_create($today));
?>

<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="crudstyle.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <title>Boba Cineplex</title>
</head>

<body>

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
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome: <?php echo $_SESSION['user'] . '<br>' . $bname; ?> <b class="fa fa-angle-down"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <?php
                        if ($role == "Kiosk") { ?>
                            <a href="kiosk.php">Product Website</a>
                        <?php    }
                        ?>
                        <?php
                        if ($role == "Ticket_Saleman") { ?>
                            <a href="index.php">Ticket Website</a>
                        <?php    }
                        ?>
                        <!--                        <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-fw fa-search"></i> DATA<i class="fa fa-fw fa-angle-down pull-right"></i></a>
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
                </ul> -->
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        <br><br>


        <div class="container bg-white pt-2 pb-4 ">
            <div class="container" style="width:700px;">
                <h3 aligh="conter">Welcome: <?php echo $role ?></h3>
                <br>
                <div class="table-responsive">
                    <div align="right">
                        <input type="button" name="edit" value="edit" class="btn btn-warning btn-sm edit_detail" id="<?php echo $id; ?>" /><br><br>
                    </div>
                    <table class="table table-bordered">
                        <tr>
                            <td width="30%"><label>Staff ID</label></td>
                            <td width="70%"><?php echo $id ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><label>Name</label></td>
                            <td width="70%"><?php echo $user ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><label>Age</label></td>
                            <td width="70%"><?php echo $diff->format('%y') ?></td>
                        </tr>
                        <td width="30%"><label>ID card Number</label></td>
                        <td width="70%"><?php echo $id_no ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><label>Telephone Number</label></td>
                            <td width="70%"><?php echo $tel ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><label>Address</label></td>
                            <td width="70%"><?php echo $address ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><label>Role</label></td>
                            <td width="70%"><?php echo $role ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><label>Salary</label></td>
                            <td width="70%"><?php echo $salary ?></td>
                        </tr>
                        <tr>
                            <td width="30%"><label>Branch</label></td>
                            <td width="70%"><?php echo $brow['Branch_Name'] ?></td>
                        </tr>
                    </table>


                </div>
            </div>
            <?php require 'staffModal.php' ?>
        </div>
</body>
<script>
    $(document).ready(function() {

        $('#insert-form').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "staffInsert.php",
                method: "post",
                data: $('#insert-form').serialize(),
                beforeSend: function() {
                    $('#insert').val('Insert..');
                },
                success: function(data) {
                    $('#insert-form')[0].reset();
                    $('#addModal').modal('hide');
                    location.reload();
                }
            });
        });

        $('.edit_detail').click(function() {
            var uid = $(this).attr("id");
            $.ajax({
                url: "staffFetch.php",
                method: "post",
                data: {
                    id: uid
                },
                dataType: "json",
                success: function(data) {
                    $('#id').val(data.Staff_ID);
                    $('#firstname').val(data.Firstname);
                    $('#lastname').val(data.Lastname);
                    $('#id_no').val(data.ID_NO);
                    $('#tel').val(data.Staff_Tel);
                    $('#branch_id').val(data.Branch_ID);
                    $('#role').val(data.Role);
                    $('#dob').val(data.Staff_DoB);
                    $('#password').val(data.Password);
                    $('#address').val(data.Address);
                    $('#salary').val(data.Salary);
                    $('#insert').val("Update");
                    $('#addModal').modal('show');
                }
            })
        });
    });
</script>
<script>
    $(function() {
        $('[data-toggle="tooltip"]').tooltip();
        $(".side-nav .collapse").on("hide.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
        });
        $('.side-nav .collapse').on("show.bs.collapse", function() {
            $(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");
        });
    })
</script>

</html>