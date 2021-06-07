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
            <h3 aligh="conter">Seat price Information</h3>
            <br><br>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="70%">Seat Type</th>
                        <th width="15%">View</th>
                        <th width="15%">Edit</th>
                    </tr>
                    <?php
                    $query = "SELECT * FROM seatprice";
                    $result = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <tr>
                            <td><?php echo $row['Seat_Type']; ?></td>
                            <td><input type="button" name="view" value="view" class="btn btn-info btn-xs view_detail" id="<?php echo $row['SeatType_ID']; ?>" /> </td>
                            <td><input type="button" name="edit" value="edit" class="btn btn-warning btn-xs edit_detail" id="<?php echo $row['SeatType_ID']; ?>" /> </td>
                        </tr>

                    <?php
                    } ?>
                </table>
            </div>
        </div>
        <?php require 'seatPriceModal.php' ?>
    </div>
</body>
<script>
    $(document).ready(function(){
        $('.view_detail').click(function() {
            var uid = $(this).attr("id");
            $.ajax({
                url: "seatPriceSelect.php",
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

        $('#insert-form').on('submit',function(e){
            e.preventDefault();
            $.ajax({
                url:"seatPriceInsert.php",
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
                url: "seatPriceFetch.php",
                method: "post",
                data: {
                    id: uid
                },
                dataType:"json",
                success: function(data) {
                    $('#id').val(data.SeatType_ID);
                    $('#seat_price').val(data.Seat_Price);
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