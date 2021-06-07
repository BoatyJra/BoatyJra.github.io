
<?php 
session_start();
include ('connection.php');
echo "Update ";
$id = $_POST['id'];

$seat_price = mysqli_real_escape_string($conn,$_POST['seat_price']);

    echo "Update ";
    $query = "UPDATE  `seatprice` SET  `Seat_Price`= '$seat_price' WHERE `SeatType_ID` = $id";

if (mysqli_query($conn,$query))
    {
    echo "Data Inserted";
    }
else
    {
    echo "Error";
    }
?>