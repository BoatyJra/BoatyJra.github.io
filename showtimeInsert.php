<?php 
session_start();
include ('connection.php');
$branch_id = $_SESSION['branch'];
$id = $_POST['id'];

$movie = mysqli_real_escape_string($conn,$_POST['movie']);
$theater = mysqli_real_escape_string($conn,$_POST['theater']);
$showtime = mysqli_real_escape_string($conn,$_POST['showtime']);
$showtime = $showtime.":00";
echo $id."<br>";
echo $movie."<br>";
echo $theater."<br>";
echo $showtime."<br>";

if($id!= ''){
    echo "Update ";
    $query = "UPDATE  `showtime` SET  `Theater_ID` = '$theater', `Showtime` = '$showtime' WHERE `Showtime_ID` = $id";
}
else{
    echo "Insert ";
    $query = "INSERT INTO `showtime` (`Showtime_ID`, `Movie_ID`, `Theater_ID`, `Showtime`) 
            VALUES (NULL, '$movie', '$theater', '$showtime')";
}

if ($member_type == 'sl')
    {
        $paid = 100;
    }
else if ($member_type == 'sl')
    {
     $paid = 200;
    }
else 
    {
    $paid = 300;
    }

if (mysqli_query($conn,$query))
    {
    echo "Data Inserted";
    }
else
    {
    echo "Error";
    }
?>