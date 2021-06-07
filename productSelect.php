<?php
$id = $_POST['id'];
$outp='';
session_start();
include ('connection.php');

$query = "SELECT * FROM product_stock WHERE Product_ID = $id";
$result = mysqli_query($conn,$query);
$outp.="<div class = 'table table-responsive'>
<table class = 'table table-bordered' >";
while ($row = mysqli_fetch_array($result))
    {
        $outp.='<tr><td width = "30%"><label>Product ID</label></td>
                    <td width = "70%">'.$row['Product_ID'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Product Name</label></td>
                    <td width = "70%">'.$row['Product_Name'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Type</label></td>
                <td width = "70%">'.$row['Product_Type'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Count</label></td>
                    <td width = "70%">'.$row['Product_Count'].'</td>
                </tr>';
        $outp.='<tr><td width = "30%"><label>Price</label></td>
                <td width = "70%">'.$row['Price'].'</td>
                </tr>';
    }
$outp.="</table></div>";
echo $outp;
?>
