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
            <h3 aligh="conter">Movie Information</h3>
            <br><br>
            <div align="right">
                <button name="add" id="add" data-toggle="modal" data-target="#addModal" class="btn btn-success">Add</button><br><br>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="35%">Image</th>
                        <th width="35%">Name</th>
                        <th width="10%">View</th>
                        <th width="10%">Delete</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM movie";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><img src = "./asset/<?php echo $row['Movie_Image']?>" style = "width: 150px; height: 180px;"></td>
                            <td><?php echo $row['Movie_Name']; ?></td>
                            <td><input type="button" name="view" value="view" class="btn btn-info btn-xs view_detail" id="<?php echo $row['Movie_ID']; ?>" /> </td>
                            <td><input type="button" name="delete" value="delete" class="btn btn-danger btn-xs delete_detail" id="<?php echo $row['Movie_ID']; ?>" /> </td>
                        
                        </tr>

                    <?php
                    } ?>
                </table>
            </div>
        </div>
        <?php require 'movieModal.php' ?>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('#insert-form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:"movieInsert.php",
                method:"post",
                data:$('#insert-form').serialize(),
                beforeSend:function(){
                    $('#insert').val('Insert..');
                },
                success:function(data){
                    $('#insert-form')[0].reset();
                    $('#addModal').modal('hide');
                    // location.reload();
                }
            });
        });



        $('.delete_detail').click(function(){
            var uid = $(this).attr("id");
            var status = confirm("Are you sure?");
            if (status)
            {
                $.ajax({
                    url: "movieDelete.php",
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
                url: "movieSelect.php",
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
                url: "movieFetch.php",
                method: "post",
                data: {
                    id: uid
                },
                dataType:"json",
                success: function(data) {
                    $('#id').val(data.Movie_ID);
                    $('#image').val(data.Movie_Image);
                    $('#name').val(data.Movie_Name);
                    $('#date_in').val(data.Date_In);
                    $('#date_out').val(data.Date_Out);
                    $('#duration').val(data.Movie_Duration);
                    $('#rating').val(data.Movie_Rating);
                    $('#fund').val(data.Movie_Fund);
                    $('#limit').val(data.Rating_age);
                    $('#status').val(data.Movie_status);
                    $('#description').val(data.Movie_Description);
                    $('#trailer').val(data.Movie_Trailer);
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