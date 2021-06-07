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

<?php  require'headermanager.php';?>


    <div class="container bg-white pt-2 pb-4 ">
        <div class="container" style="width:700px;">
            <h3 aligh="conter">Showtime Information</h3>
            <br><br>
            <div align="right">
                <button name="add" id="add" data-toggle="modal" data-target="#addModal" class="btn btn-success">Add</button><br><br>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Image</th>
                        <th width="30%">Name</th>
                        <th width="35%">Show time</th>
                        <th width="10%">View</th>
                        <th width="10%">Edit</th>
                        <th width="10%">Delete</th>
                    </tr>
                    <?php
                    $query = "SELECT DISTINCT showtime.* FROM showtime INNER JOIN 
                    theater ON theater.Theater_ID = showtime.Theater_ID AND theater.Branch_ID = $branch_id";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <?php $mID = $row['Movie_ID'];
                                $mquery = "SELECT * FROM movie WHERE Movie_ID = $mID";
                                $mresult = mysqli_query($conn,$mquery);
                                $mrow = mysqli_fetch_array($mresult);
                            ?>

                            <td><img src = "./asset/<?php echo $mrow['Movie_Image']?>" style = "width: 150px; height: 180px;"></td>
                            <td><?php echo $mrow['Movie_Name']; ?></td>
                            <td><?php echo $row['Showtime']; ?></td>
                            <td><input type="button" name="view" value="view" class="btn btn-info btn-xs view_detail" id="<?php echo $row['Showtime_ID']; ?>" /> </td>
                            <td><input type="button" name="edit" value="edit" class="btn btn-warning btn-xs edit_detail" id="<?php echo $row['Showtime_ID']; ?>" /> </td>
                            <td><input type="button" name="delete" value="delete" class="btn btn-danger btn-xs delete_detail" id="<?php echo $row['Showtime_ID']; ?>" /> </td>
                        
                        </tr>

                    <?php
                    } ?>
                </table>
            </div>
        </div>
        <?php require 'showtimeModal.php' ?>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#insert-form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:"showtimeInsert.php",
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



        $('.delete_detail').click(function(){
            var uid = $(this).attr("id");
            var status = confirm("Are you sure?");
            if (status)
            {
                $.ajax({
                    url: "showtimeDelete.php",
                    method: "post",
                    data: {
                        id: uid
                    },
                    success: function(data) {
                        location.reload();
                    }
                })
            }
        });

        $('.view_detail').click(function() {
            var uid = $(this).attr("id");
            $.ajax({
                url: "showtimeSelect.php",
                method: "post",
                data: {
                    id: uid
                },
                success: function(data) {
                    $('#detail').html(data);
                    $('#dataModal').modal('show');
                }
            })
        });

        $('.edit_detail').click(function() {
            var uid = $(this).attr("id");
            $.ajax({
                url: "showtimeFetch.php",
                method: "post",
                data: {
                    id: uid
                },
                dataType:"json",
                success: function(data) {
                    $('#id').val(data.Showtime_ID);
                    $('#movie').val(data.Movie_ID);
                    $('#theater').val(data.Theater_ID);
                    $('#showtime').val(data.Showtime);
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