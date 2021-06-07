<?php
session_start();
require_once("load.php");

$movie = $_SESSION['movie'];
$showtime = $_SESSION['showtime'];
$branch = $_SESSION['branch']; 
$theater = $_SESSION['theater'];
$showtimeid = $_SESSION['showtimeid']; 
$e = $_SESSION['e'];
$e_length = $_SESSION['e_length']; 
$member_id = $_SESSION['member_id']; 
$payment_type = $_SESSION['payment_type']; 

$regular = 0;
$premium = 0;
$luxury = 0;
for($r=0;$r<count($e_length);$r++){
	$exr = explode(",", $e);
	$seat_type = '';
	
	$_SESSION1 = $exr;

	if($exr[$r] >= 51 && $exr[$r] <= 80){
        $seat_type = 'Regular';
		$regular = $regular + 1;

    }
    else if($exr[$r] >= 21 && $exr[$r] <= 50){
       
        $seat_type = 'Premium';
		$premium = $premium + 1;

    }
    else if($exr[$r] >= 1 && $exr[$r] <= 20){
      
        $seat_type = 'Luxury';
		$luxury = $luxury + 1;

    }
	$data2 = array(
		'Seat_Number'	=>	$exr[$r],
		'Seat_Status'	=>	"1",
		'Seat_Type'		=>	$seat_type,
		'Theater_ID' 	=> 	$theater,
		'Showtime_ID' 	=> 	$showtimeid
	);
	
	insert('seat',$data2);

}
?>
<meta HTTP-EQUIV="REFRESH" CONTENT="0; URL=summary.php?
movie=<?= $movie; ?>
&showtime=<?= $showtime; ?>
&branch=<?= $branch; ?>
&theater=<?= $theater; ?>
&showtimeid=<?= $showtimeid; ?>
&member_id=<?= $member_id; ?>
&payment_type=<?= $payment_type; ?>
&e=<?= $e; ?>
&Regular=<?= $regular; ?>
&Premium=<?=  $premium;?>
&Luxury=<?=  $luxury;?>
">