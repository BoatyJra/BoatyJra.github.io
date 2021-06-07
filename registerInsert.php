<?php
session_start();
include('connection.php');


$member_type = mysqli_real_escape_string($conn, $_POST['discount_id']);
$First_Name = mysqli_real_escape_string($conn, $_POST['firstname']);
$Last_Name = mysqli_real_escape_string($conn, $_POST['lastname']);
//$pre_tel = $_POST['pre_tel'];
$Tel = mysqli_real_escape_string($conn, $_POST['tel']);
$Member_Address = mysqli_real_escape_string($conn, $_POST['address']);
$Email = mysqli_real_escape_string($conn, $_POST['email']);
$ID_NO = mysqli_real_escape_string($conn, $_POST['id_no']);
$payment = mysqli_real_escape_string($conn, $_POST['payment_type']);

$id_check = "SELECT * FROM member WHERE ID_NO = '$ID_NO' LIMIT 1";
$result = mysqli_query($conn, $id_check);
$member = mysqli_fetch_assoc($result);

if ($member['ID_NO'] === $ID_NO) {
    echo "<script>alert('Identified Number already exists');</script>";
    echo "HELLO";
} else {
    $queryNO = "SELECT MAX(Member_NO) as lastNO FROM member";
    $resultlastNO = mysqli_query($conn, $queryNO);
    $rs = mysqli_fetch_array($resultlastNO);
    $lastNO = $rs['lastNO'];

    if ($lastNO == '') {
        $lastNO = 1;
    } else {
        $lastNO = ($lastNO + 1);
        echo $lastNO;
    }

    $lastID = substr("000000" . $lastNO, -6);
    $Member_ID = $member_type . $lastID;
    $expire = strtotime("next Year");
    $Member_Exp = date("Y-m-d", $expire);
    //$Tel = $pre_tel.$Tel;

    echo $Member_ID . "<br>" . $lastNO . "<br>" . $First_Name . "<br>" . $Last_Name . "<br>" . $Tel . "<br>" . $Member_Address . "<br>" . $ID_NO .
        "<br>" . $member_type . "<br>" . $Member_Exp;
    $query = "INSERT INTO member (Member_ID, Member_NO, First_Name, Last_Name, Tel, Member_Address, Email, ID_NO, Discount_ID, Member_Exp)
                    VALUE ('$Member_ID','$lastNO', '$First_Name', '$Last_Name','$Tel', '$Member_Address','$Email','$ID_NO', '$member_type', '$Member_Exp')";
    $result = mysqli_query($conn, $query);

    if ($member_type == 'sl') {
        $paid = 100;
    } else if ($member_type == 'gd') {
        $paid = 200;
    } else {
        $paid = 300;
    }
    date_default_timezone_set('Asia/Bangkok');
    $now = date('Y-d-m H:i:s', time());

    echo "<br>".$Member_ID ."<br>". $payment ."<br>". $paid ."<br>". $now ."<br>";
    $pquery = "INSERT INTO payment (Member_ID,Payment_method,Amount_Paid,Payment_Date,Description)
            VALUE ('$Member_ID','$payment','$paid','$now','Register')";
    $presult = mysqli_query($conn, $pquery);

    $alert_success =  "Insert member: " . $Member_ID . " successfully" . "<br>" .
        $First_Name . "<br>" . $Last_Name . "<br>" . $Tel . "<br>" . $Member_Address . "<br>" . $ID_NO .
        "<br>" . $member_type . "<br>" . $Member_Exp;
    $alert_error   =  "Something went wrong";


    if ($result && $presult) {
        $_SESSION['success'] = "<script>alert('$alert_success');</script>";
        // header("Location: index.php");
    } else {
        $_SESSION['error'] = "<script>alert('$alert_error')</script>";
        // header("Location: index.php");
    }
}
