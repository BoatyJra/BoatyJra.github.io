<?php
session_start();
require_once("load.php");
@$time_d = $_POST['t'];
@$name = $_POST['name'];
@$school = $_POST['school'];
@$e = implode(',', $_POST['e']);

$_SESSION['movie'] = $_POST['movie'];
$_SESSION['showtime'] = $_POST['showtime'];
$_SESSION['branch'] = $_POST['branch'];
$_SESSION['theater'] = $_POST['theater'];
$_SESSION['showtimeid'] = $_POST['showtimeid'];
$_SESSION['e'] = implode(',', $_POST['e']);
$_SESSION['e_length'] = $_POST['e'];

?>
<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=MemberPayment.php?
">