<?php
require_once("load.php");
@$time_d 	= $_GET['time_d'];
@$name 		= $_GET['name'];
@$school 	= $_GET['school'];
@$e 		= $_GET['e'];
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name=viewport content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<title>ระบบจองตั๋วออนไลน์</title>
<link rel="shortcut icon" href="images/favicon.ico">
<link href="css/style.css" rel="stylesheet" type="text/css">

</head>

<body class="responsive ">
	<?php
	//echo $resultArray[$e];
	?>
	<center><h1 class="color-white" style="padding-top: 20px; padding-bottom: 20px;">ระบบจองตั๋วออนไลน์</h1></center>
	<div style="width: 90%; margin: 0 auto; background-color: #FFF; border-radius: 20px; padding-top: 10px; padding-bottom: 10px;">
		<div style="width: 98%; margin: 0 auto; padding: 20px; font-size: 26px;">
				รอบฉาย : <?=$time_d.".00 น.";?><br>
		ชื่อ : <?=$name;?><br>
		โรงเรียน : <?=$school;?><br>
	
	</div>
	<div class="center" style="width: 50%; margin: 0 auto; padding: 20px; font-size: 30px;">
				
		เลขที่นั่ง  <br><font style="font-weight: bold; font-size: 80px;"><?=$e;?></font>
	</div>
	<center><span class="color-red">กรุณาแคปภาพหน้าจอ เพื่อใช้ยืนยันกับเจ้าหน้าที่</span></center>
		<fieldset class="center submit"><button class=" save button" type="button" onclick="location.href='index.php'">เสร็จสิ้น</button></fieldset>
		
	</div><br>

	</body>
</html>