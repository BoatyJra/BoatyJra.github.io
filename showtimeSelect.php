<?php
$id = $_POST['id'];
$outp='';
session_start();
include ('connection.php');

$query = "SELECT * FROM showtime WHERE Showtime_ID = $id";
$result = mysqli_query($conn,$query);
$outp.="<div class = 'table table-responsive'>
<table class = 'table table-bordered' >";
while ($row = mysqli_fetch_array($result))
    {
        $mID = $row['Movie_ID'];
        $mquery = "SELECT * FROM movie WHERE Movie_ID = $mID";
        $mresult = mysqli_query($conn,$mquery);
        $mrow = mysqli_fetch_array($mresult);

        $outp.='<tr><td width = "30%"><label>Showtime ID</label></td>
                    <td width = "70%">'.$row['Showtime_ID'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Movie Name</label></td>
                    <td width = "70%">'.$mrow['Movie_Name'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Theater ID</label></td>
                <td width = "70%">'.$row['Theater_ID'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Show time</label></td>
                    <td width = "70%">'.$row['Showtime'].'</td>
                </tr>';
    }
$outp.="</table></div>";
echo $outp;
?>
