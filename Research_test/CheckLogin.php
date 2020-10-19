<?php 
require('connect.php');
session_start();


$User = $_POST['User'];
$password = $_POST['Pass'];
$login = "SELECT * FROM admin WHERE Username= '$User' AND Password = '$password' limit 1";
$login_query = mysqli_query($conn,$login);

if (mysqli_num_rows($login_query) == 1){

    $row = mysqli_fetch_assoc($login_query);

    $_SESSION['Username'] = $User;
    $_SESSION['emailAdmin'] = $row['email'];

    header("Location:edit.php");

}
else{
echo "<script>";
echo "alert('รหัสผ่านผิด !!!');";
echo "window.location='show.php';";
echo "</script>";
}
?>