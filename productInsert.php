
<?php 
session_start();
include ('connection.php');
echo "Update ";
$id = $_POST['id'];

$count = mysqli_real_escape_string($conn,$_POST['count']);
$price = mysqli_real_escape_string($conn,$_POST['price']);
echo $price."<br>".$count."<br>".$id."<br>";
    echo "Update ";
    $query = "UPDATE `product_stock` SET `Product_Count` = '$count', `Price` = '$price' WHERE `Product_ID` = $id";

if (mysqli_query($conn,$query))
    {
    echo "Data Inserted";
    }
else
    {
    echo "Error";
    }
?>