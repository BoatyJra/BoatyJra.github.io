<?php 

    session_start();

    if (isset($_POST['staff_id'])) {

        include('connection.php');

        $staff_id = $_POST['staff_id'];
        $password = $_POST['password'];
        $passwordenc = md5($password);

        $query = "SELECT * FROM staff WHERE Staff_ID = '$staff_id' AND Password = '$passwordenc'";

        $result = mysqli_query($conn, $query);
        //echo "result:".$result."<br>";
        if (mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_array($result);

            $_SESSION['staff_id'] = $row['Staff_ID'];
            $_SESSION['user'] = $row['Firstname'] . " " . $row['Lastname'];
            $_SESSION['role'] = $row['Role'];
            $_SESSION['branch'] = $row['Branch_ID'];
            $_SESSION['salary'] = $row['Salary'];
            $_SESSION['id_no'] = $row['ID_NO'];
            $_SESSION['tel'] = $row['Staff_Tel'];
            $_SESSION['address'] = $row['Address'];
            $_SESSION['dob'] = $row['Staff_DoB'];

            if ($_SESSION['role'] == 'Manager') {
                header("Location: indexManager.php");
            }
            else {
                header("Location: indexStaff.php");
            }


        } else {
            echo "<script>alert('User หรือ Password ไม่ถูกต้อง);</script>";
            header("Location: index.php");
        }
    } else {
        header("Location: index.php");
    }


?>