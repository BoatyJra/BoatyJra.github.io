<?php
    session_start();
    include('connection.php');
    $id = $_POST['id'];
    $query = "DELETE FROM product_stock WHERE Product_ID = $id ";
    if($result = mysqli_query($conn,$query))
    {
        echo "deleted";
    }
    else{
        echo "ERROR EIEI";
    }

?>