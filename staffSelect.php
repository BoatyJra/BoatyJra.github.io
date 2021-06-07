<?php
$id = $_POST['id'];
$outp='';
session_start();
include ('connection.php');
$query = "SELECT * FROM staff WHERE Staff_ID = $id";
$result = mysqli_query($conn,$query);
$today = date("Y-m-d");
$outp.="<div class = 'table table-responsive'>
<table class = 'table table-bordered' >";
while ($row = mysqli_fetch_array($result))
    {
        $diff = date_diff(date_create($row['Staff_DoB']), date_create($today));
        $bID = $row['Branch_ID'];
        $bquery = "SELECT * FROM branch WHERE Branch_ID = $bID";
        $bresult = mysqli_query($conn,$bquery);
        $brow = mysqli_fetch_array($bresult);
        $outp.='<tr><td width = "30%"><label>StaffID</label></td>
                    <td width = "70%">'.$row['Staff_ID'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Name</label></td>
                    <td width = "70%">'.$row['Firstname'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>LastName</label></td>
                <td width = "70%">'.$row['Lastname'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Role</label></td>
                    <td width = "70%">'.$row['Role'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Salary</label></td>
                    <td width = "70%">'.$row['Salary'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Branch</label></td>
                    <td width = "70%">'.$brow['Branch_Name'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Telephone</label></td>
                    <td width = "70%">'.$row['Staff_Tel'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Address</label></td>
                    <td width = "70%">'.$row['Address'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Age</label></td>
                <td width = "70%">'.$diff->format('%y').'</td>
                </tr>';
    }
$outp.="</table></div>";
echo $today;
echo $outp;
?>
