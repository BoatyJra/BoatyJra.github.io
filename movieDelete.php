<?php
    session_start();
    include('connection.php');
    $id = $_POST['id'];
    $query = "DELETE FROM movie WHERE Movie_ID = $id";
    $result = mysqli_query($conn,$query);

?>