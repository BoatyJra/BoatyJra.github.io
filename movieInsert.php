<?php 
session_start();
include ('connection.php');
$id = $_POST['id'];



$image = mysqli_real_escape_string($conn,$_POST['image']);
$name = mysqli_real_escape_string($conn,$_POST['name']);
$date_in = mysqli_real_escape_string($conn,$_POST['date_in']);
$date_out = mysqli_real_escape_string($conn,$_POST['date_out']);
$duration = mysqli_real_escape_string($conn,$_POST['duration']);
$rating = mysqli_real_escape_string($conn,$_POST['rating']);
$fund = mysqli_real_escape_string($conn,$_POST['fund']);
$limit = mysqli_real_escape_string($conn,$_POST['limit']);
$status = mysqli_real_escape_string($conn,$_POST['status']);
$description = mysqli_real_escape_string($conn,$_POST['description']);
$trailer = mysqli_real_escape_string($conn,$_POST['trailer']);

    echo "Insert ";
    $query = "INSERT INTO `movie` (`Movie_Name`, `Movie_Image`, `Date_In`, `Date_Out`, 
    `Movie_Duration`, `Movie_Rating`, `Movie_Fund`, `Rating_Age`, `Movie_status`, `Movie_Description`, `Movie_Trailer`) 
    VALUES ('$name', '$image', '$date_in', '$date_out', '$duration', '$rating', '$fund', '$limit', '$status', '$description', '$trailer')";



if (mysqli_query($conn,$query))
    {
    echo "Data Inserted";
    }
else
    {
    echo "Error";
    }
