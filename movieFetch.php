<?php
    $id = $_POST['id'];
    include('connection.php');
    $query = "SELECT * FROM movie WHERE Movie_ID = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    echo json_encode($row);
    

    
?>