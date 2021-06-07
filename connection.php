<?php
    
    $conn = mysqli_connect("localhost", "root", "", "boba_tea");
    date_default_timezone_set('Asia/Bangkok');

    define("DB_HOST","localhost");
    define("DB_NAME","boba_tea");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("ISO","utf-8");

    $mysqli = new mysqli(DB_HOST,DB_USERNAME,DB_PASSWORD,DB_NAME);

$mysqli->query("SET NAMES UTF8");
    if (!$conn)
    {
        die("Failed to connect the database".mysqli_error($conn));
    }
?>

<?php 

    $db_host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_name = "boba_tea";

    try {
        $db = new PDO("mysql:host={$db_host}; dbname={$db_name}", $db_user, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOEXCEPTION $e) {
        $e->getMessage();
    }

    $link = new \PDO(
        'mysql:host=localhost;dbname=boba_tea;charset=utf8', 'root','', 
        array(
            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_PERSISTENT => false
        )
    );

?>