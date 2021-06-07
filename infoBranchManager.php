<?php
session_start();
include('connection.php');
$branch_id = $_SESSION['branch'];

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
            <h3 aligh="conter">Branch Information</h3>
            <br>
            <div class="table-responsive">
            
                <?php
                $bquery = "SELECT * FROM branch";
                $bresult = mysqli_query($conn, $bquery);
                while ($brow = mysqli_fetch_array($bresult)) {
                    ?>
                    <div>
                    <button type="button" class="btn btn-link" data-toggle="collapse" data-target="#<?php echo $brow["Branch_ID"] ?>"><?php echo $brow['Branch_Name']; ?></button>
                    </div>
                    <div id="<?php echo $brow["Branch_ID"] ?>" class="collapse">
                                <table class="table table-bordered data">
                                    <tr>
                                        <td width="30%"><label>Branch Name</label></td>
                                        <td width="70%"><?php echo $brow['Branch_Name'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><label>Address</label></td>
                                        <td width="70%"><?php echo $brow['Branch_Address'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><label>Phone Number</label></td>
                                        <td width="70%"><?php echo $brow['Branch_Tel'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><label>Number of Theater</label></td>
                                        <td width="70%"><?php echo $brow['Number_Theater'] ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%"><label>Open-Close Time</label></td>
                                        <td width="70%"><?php echo $brow['OC_Time'] ?></td>
                                    </tr>
                                </table>
                                <br>
                    </div>
                    <?php
                    } ?>
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
                url:"productInsert.php",
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