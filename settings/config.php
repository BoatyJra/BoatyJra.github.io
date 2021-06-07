<?php
/* config.php */
$action = $_GET['action'];
$op =$_GET['op'];
if(empty($op)){
	$op = "index";
}
define("web_title", "ระบบแสดงภาพพร้อมข้อความ แบบReal Time");
define("web_title2", "wetrwetwr");
