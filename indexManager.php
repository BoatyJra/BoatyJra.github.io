<?php
session_start();
include('connection.php');

$branch_id = $_SESSION['branch'];
$id =  $_SESSION['staff_id'];

$iquery = "SELECT * FROM branch WHERE Branch_ID = $branch_id";
$iresult = mysqli_query($conn, $iquery);
$irow = mysqli_fetch_array($iresult);

$squery = "SELECT * FROM staff WHERE Staff_ID = $id";
$sresult = mysqli_query($conn, $squery);
$srow = mysqli_fetch_array($sresult);

$user = $srow['Firstname']." ".$srow['Lastname'];
$role = $srow['Role'];
$salary = $srow['Salary'] ;
$id_no = $srow['ID_NO'] ;
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

<?php require 'headerManager.php';?>


    <div class="container bg-white pt-2 pb-4 ">
        <div class="container" style="width:700px;">
            <h3 aligh="conter">Your Information</h3>
            <br>
            <div class="table-responsive">
            <div align="right">
            <input type="button" name="edit" value="edit" class="btn btn-warning btn-sm edit_detail" id="<?php echo $id; ?>" /><br><br>
            </div>
                <table class="table table-bordered">
                    <tr>
                    <td width = "30%"><label>Staff ID</label></td>
                    <td width = "70%"><?php echo $id?></td>
                    </tr>
                    <tr>
                    <td width = "30%"><label>Name</label></td>
                    <td width = "70%"><?php echo $user?></td>
                    </tr>
                    <tr>
                    <td width = "30%"><label>Age</label></td>
                    <td width = "70%"><?php echo $diff->format('%y')?></td>
                    </tr>
                    <td width = "30%"><label>ID card Number</label></td>
                    <td width = "70%"><?php echo $id_no?></td>
                    </tr>
                    <tr>
                    <td width = "30%"><label>Telephone Number</label></td>
                    <td width = "70%"><?php echo $tel?></td>
                    </tr>
                    <tr>
                    <td width = "30%"><label>Address</label></td>
                    <td width = "70%"><?php echo $address?></td>
                    </tr>
                    <tr>
                    <td width = "30%"><label>Role</label></td>
                    <td width = "70%"><?php echo $role?></td>
                    </tr>
                    <tr>
                    <td width = "30%"><label>Salary</label></td>
                    <td width = "70%"><?php echo $salary?></td>
                    </tr>
                    <tr>
                    <td width = "30%"><label>Branch</label></td>
                    <td width = "70%"><?php echo $irow['Branch_Name']?></td>
                    </tr>
                </table>
                
                
            </div>
        </div>
        <?php require 'staffModal.php' ?>
    </div>
</body>
<script>
    $(document).ready(function(){

        $('#insert-form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:"staffInsert.php",
                method:"post",
                data:$('#insert-form').serialize(),
                beforeSend:function(){
                    $('#insert').val('Insert..');
                },
                success:function(data){
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
                dataType:"json",
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
    $(function(){
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
