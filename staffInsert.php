<?php 
session_start();
include ('connection.php');
$branch_id = $_SESSION['branch'];
$id = $_POST['id'];

$firstname = mysqli_real_escape_string($conn,$_POST['firstname']);
$lastname = mysqli_real_escape_string($conn,$_POST['lastname']);
$id_no = mysqli_real_escape_string($conn,$_POST['id_no']);
$tel = mysqli_real_escape_string($conn,$_POST['tel']);
$role = mysqli_real_escape_string($conn,$_POST['role']);
$dob = mysqli_real_escape_string($conn,$_POST['dob']);
$password = mysqli_real_escape_string($conn,$_POST['password']);
$address = mysqli_real_escape_string($conn,$_POST['address']);
$salary = mysqli_real_escape_string($conn,$_POST['salary']);
$passwordenc = md5($password);
if($id!= ''){
    echo "Update ";
    $query = "UPDATE  `staff` SET  `Password`= '$passwordenc', `Role` = '$role' , `Salary` = ' $salary',
            `Branch_ID` = '$branch_id', `Firstname` = '$firstname', `Lastname` = '$lastname', `ID_NO` = '$id_no',
            `Staff_Tel` = '$tel', `Address` ='$address', `Staff_DoB` = '$dob' WHERE Staff_ID = $id";
}
else{
    echo "Insert ";
    $query = "INSERT INTO  staff( Password, Role, Salary, Branch_ID, Firstname, Lastname, ID_NO, Staff_Tel, Address, Staff_DoB) 
            VALUES ('$passwordenc', '$role' , '$salary', '$branch_id', '$firstname', '$lastname', '$id_no', '$tel', '$address', '$dob')";
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