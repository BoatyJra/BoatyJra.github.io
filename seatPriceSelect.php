<?php
$id = $_POST['id'];
$outp='';
session_start();
include ('connection.php');
$query = "SELECT * FROM seatprice WHERE SeatType_ID = $id";
$result = mysqli_query($conn,$query);
$outp.="<div class = 'table table-responsive'>
<table class = 'table table-bordered' >";

while ($row = mysqli_fetch_array($result))
    {
        $outp.='<tr><td width = "30%"><label>Seat_Type</label></td>
                    <td width = "70%">'.$row['Seat_Type'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Seat_Price</label></td>
                    <td width = "70%">'.$row['Seat_Price'].'</td>
                </tr>';
    }
$outp.="</table></div>";
echo $outp;
?>
