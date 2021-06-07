<?php
$id = $_POST['id'];
$outp='';
session_start();
include ('connection.php');
$query = "SELECT * FROM movie WHERE Movie_ID = $id";
$result = mysqli_query($conn,$query);
$outp.="<div class = 'table table-responsive'>
<table class = 'table table-bordered' >";
while ($row = mysqli_fetch_array($result))
    {
        $img = "./asset/".$row['Movie_Image'];
        $outp.='<img src ='. $img. ' style = "width: 150px; height: 180px;"/>'.'<br><br>';
        $outp.='<tr><td width = "30%"><label>Name</label></td>
                <td width = "70%">'.$row['Movie_Name'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Description</label></td>
                <td width = "70%">'.$row['Movie_Description'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Trailer</label></td>
                <td width = "70%">'.$row['Movie_Trailer'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Date In</label></td>
                <td width = "70%">'.$row['Date_In'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Date Out</label></td>
                <td width = "70%">'.$row['Date_Out'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Duration</label></td>
                <td width = "70%">'.$row['Movie_Duration'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Rating</label></td>
                <td width = "70%">'.$row['Movie_Rating'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Fund</label></td>
                <td width = "70%">'.$row['Movie_Fund'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Limit Age</label></td>
                <td width = "70%">'.$row['Rating_Age'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Status</label></td>
                <td width = "70%">'.$row['Movie_status'].'</td>
                </tr>';
    }
$outp.="</table></div>";
echo $outp;
?>
