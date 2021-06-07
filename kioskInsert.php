
<?php
session_start();
include('connection.php');
echo "Update ";
$bID = $_SESSION['branch'];
$bquery = "SELECT * FROM branch WHERE Branch_ID = $bID";
$bresult = mysqli_query($conn, $bquery);
$brow = mysqli_fetch_array($bresult);
$bname = $brow['Branch_Name'];

date_default_timezone_set('Asia/Bangkok');
$now = date('Y-d-m H:i:s', time());

if ($bID == '0001')
    {
    $proquery = "SELECT MIN(Product_ID) AS first_no FROM product_stock WHERE Branch_ID = '0001'";
    $proresult = mysqli_query($conn, $proquery);
    $prorow = mysqli_fetch_array($proresult);
    $first = $prorow['first_no'];
    echo "<br>" . "fid=" . $prorow['first_no'] . "<br>";
    echo "<br>" . "first=" . $first . "<br>";
    }
else if ($bID == '0002')
    {
    $proquery = "SELECT MIN(Product_ID) AS first_no FROM product_stock WHERE Branch_ID = '0002'";
    $proresult = mysqli_query($conn, $proquery);
    $prorow = mysqli_fetch_array($proresult);
    $first = $prorow['first_no'];
    echo "<br>" . "fid=" . $prorow['first_no'] . "<br>";
    echo "<br>" . "first=" . $first . "<br>";
    }
else
    {
    $proquery = "SELECT MIN(Product_ID) AS first_no FROM product_stock WHERE Branch_ID = '0003'";
    $proresult = mysqli_query($conn, $proquery);
    $prorow = mysqli_fetch_array($proresult);
    $first = $prorow['first_no'];
    echo "<br>" . "fid=" . $prorow['first_no'] . "<br>";
    echo "<br>" . "first=" . $first . "<br>";
    }




$Spop = mysqli_real_escape_string($conn, $_POST['Spop']);
$Mpop = mysqli_real_escape_string($conn, $_POST['Mpop']);
$Lpop = mysqli_real_escape_string($conn, $_POST['Lpop']);
$Scola = mysqli_real_escape_string($conn, $_POST['Scola']);
$Mcola = mysqli_real_escape_string($conn, $_POST['Mcola']);
$Lcola = mysqli_real_escape_string($conn, $_POST['Lcola']);

$payment = mysqli_real_escape_string($conn, $_POST['payment_type']);
if ($bID == '0001') 
    {
    $count = array(0, $Spop, $Mpop, $Lpop, $Scola, $Mcola, $Lcola);
    $count2 = array(0, $Spop, $Mpop, $Lpop, $Scola, $Mcola, $Lcola);
    } 
else if ($bID == '0002') 
    {
    $count = array(0,0,0,0,0,0,0, $Spop, $Mpop, $Lpop, $Scola, $Mcola, $Lcola);
    $count2 = array(0,0,0,0,0,0,0, $Spop, $Mpop, $Lpop, $Scola, $Mcola, $Lcola);
    }
else if ($bID == '0003') 
    {
    $count = array(0,0,0,0,0,0,0,0,0,0,0,0,0, $Spop, $Mpop, $Lpop, $Scola, $Mcola, $Lcola);
    $count2 = array(0,0,0,0,0,0,0,0,0,0,0,0,0, $Spop, $Mpop, $Lpop, $Scola, $Mcola, $Lcola);
    }
$paid = array(0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0);

$payquery = "INSERT INTO payment (Member_ID, Payment_method, Amount_Paid, Description,Payment_Date)
            VALUE ('ki000001','$payment','0','Product','$now')";
$payresult = mysqli_query($conn, $payquery);

$j = $first + 6;
for ($i = $first; $i < $j; $i++) {
    echo "i= " . $first . "<br>" . "bID = " . $bID . "<br>";
    $query = "SELECT * FROM product_stock where Product_ID = $i AND Branch_ID = $bID";
    $result = mysqli_query($conn, $query);
    $row1 = mysqli_fetch_array($result);
    $count[$i] = $row1['Product_Count'] - $count[$i];

    echo $count[$i] . "<br>" . $i . "<br>";
    echo "Update ";
    $query = "UPDATE `product_stock` SET `Product_Count` = '$count[$i]' WHERE `Product_ID` = $i";

    // --------------------------------------------------------------------------------------- //

    $paid[$i] = $row1['Price'] * $count2[$i];

    if (mysqli_query($conn, $query)) {
        echo "Data Inserted";
    } else {
        echo "Error";
    }
}

$totalpaid = array_sum($paid);
echo "<br>" . 'Total Paid:' . $totalpaid;
$idquery = "SELECT MAX(Payment_ID) AS lastNO FROM payment";
$idresult = mysqli_query($conn, $idquery);
$idrow = mysqli_fetch_array($idresult);
$lastid = $idrow['lastNO'];

$totalquery = "UPDATE `payment` SET `Amount_Paid` = $totalpaid WHERE `Payment_ID` = $lastid";
$totalresult = mysqli_query($conn, $totalquery);

for ($i = $first; $i < $j; $i++) {
    if ($count2[$i] > 0) {
        $totalcount = $count2[$i];
        echo "<br>" . $totalcount . "<br>" . $i . "<br>" . $lastid . "<br>";
        $tquery = "INSERT INTO transaction (Product_ID, PaymentID, Product_Count, Timestamp)
                        VALUE ('$i','$lastid', '$totalcount', '$now')";
        if (mysqli_query($conn, $tquery)) {
            echo "Data Inserted";
        } else {
            echo "Error";
        }
    }
}
?>