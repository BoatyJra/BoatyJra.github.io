<?php
session_start();
include('connection.php');


if (isset($_POST['membertype'])) {

    $member_type = $_POST['membertype'];
    $First_Name = $_POST['Firstname'];
    $Last_Name = $_POST['Lastname'];
    //$pre_tel = $_POST['pre_tel'];
    $Tel = $_POST['PhoneNumber'];
    $Member_Address = $_POST['Address'];
    $Email = $_POST['Email'];
    $ID_NO = $_POST['IDNumber'];

    
    $id_check = "SELECT * FROM member WHERE ID_NO = '$ID_NO' LIMIT 1";
    $result = mysqli_query($conn, $id_check);
    $member = mysqli_fetch_assoc($result);

    
    if ($member['ID_NO'] === $ID_NO) {
        echo "<script>alert('Idendifine Number already exists');</script>";
    } 
    else {

        $queryNO = "SELECT MAX(Member_NO) as lastNO FROM member";
        $resultlastNO = mysqli_query($conn, $queryNO); 
        $rs = mysqli_fetch_array($resultlastNO);
        $lastNO = $rs['lastNO'];

        if($lastNO==''){
            $lastNO=1;
        }else{
            $lastNO = ($lastNO + 1);
            echo $lastNO;
        }

        $lastID = substr("000000".$lastNO,-6);
        $Member_ID = $member_type.$lastID;
        $expire = strtotime("next Year");
        $Member_Exp = date("Y-m-d", $expire);
        //$Tel = $pre_tel.$Tel;
        echo $Member_ID . "<br>". $lastNO . "<br>". $First_Name. "<br>". $Last_Name. "<br>". $Tel. "<br>". $Member_Address . "<br>". $ID_NO.
        "<br>". $member_type. "<br>". $Member_Exp; 
        $query = "INSERT INTO member (Member_ID, Member_NO, First_Name, Last_Name, Tel, Member_Address, Email, ID_NO, Discount_ID, Member_Exp)
                    VALUE ('$Member_ID','$lastNO', '$First_Name', '$Last_Name','$Tel', '$Member_Address','$Email','$ID_NO', '$member_type', '$Member_Exp')";
        $result = mysqli_query($conn, $query);

        $alert_success =  "Insert member: ".$Member_ID." successfully". "<br>".
                            $First_Name. "<br>". $Last_Name. "<br>". $Tel. "<br>". $Member_Address . "<br>". $ID_NO.
                            "<br>". $member_type. "<br>". $Member_Exp;
        $alert_error   =  "Something went wrong";
    
        
        if ($result) {
            $_SESSION['success'] ="<script>alert('$alert_success');</script>";
            header("Location: index.php");
        } else {
            $_SESSION['error'] ="<script>alert('$alert_error')</script>";
            header("Location: index.php");
        }
    }

}
?>