<?php
    $id = $_POST['id'];
    include('connection.php');
    $query = "SELECT * FROM staff WHERE Staff_ID = $id";
    $result = mysqli_query($conn,$query);
    $row = mysqli_fetch_array($result);

    echo json_encode($row);
    

?>