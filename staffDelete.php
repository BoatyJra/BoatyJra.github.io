<?php
    session_start();
    include('connection.php');
    $id = $_POST['id'];
    $query = "DELETE FROM staff WHERE Staff_ID = $id";
    $result = mysqli_query($conn,$query);

?>