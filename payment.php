<?php
session_start();
require_once("load.php");

$member_id = $_SESSION['member_id'];
$payment_type = $_SESSION['payment_type'];
$total = $_GET['total'];
$date = date(" Y-m-d H:i:s ");
$data = array(
    'Member_ID'    =>    $member_id,
    'Payment_method'    =>    $payment_type,
    'Amount_Paid'        =>    $total,
    'Payment_Date'     =>     $date,
    'Description'	=>	"Ticket"
);
insert('payment', $data);
?>
<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=index.php?
">