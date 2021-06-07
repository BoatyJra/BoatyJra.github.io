<?php
@$op = $_GET['op'];
@$ac2 = $_GET['ac2'];
@$ac3 = $_GET['ac3'];
@$ac4 = $_GET['ac4'];
@$ac5 = $_GET['ac5'];
@$action = $_GET['action'];
@$zone = $_GET['zone'];

if(empty($op)){ $op=="index"; }


//บวกเพิ่ม 2 ปี
$yy1 = date("Y")+545;
/*คำนวณปีการศึกษาและเทอม*/
	$s = "1";
	$y543 = date("Y")+543;
	$y = date("Y")+543;
	if((date("m")>=10 && date("m")<=12) || (date("m")>=1 && date("m")<=3)){
		$s = "2";
	}
	if(date("m")>=1 && date("m")<=3){
		$y = date("Y")+542;
	}
?>