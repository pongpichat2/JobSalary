<?php 
require('connect.php');



$email = $_POST['email'];
$password = $_POST['Pass'];

$login = "SELECT * FROM admin WHERE email= '$email' AND Password = '$password' limit 1";
$login_query = mysqli_query($conn,$login);

if (mysqli_num_rows($login_query) == 1){
        
    $row = mysqli_fetch_assoc($login_query);

    // $_SESSION['username'] = $username;
    // $_SESSION['pass'] = $password;
    // $_SESSION['name'] = $row['NAME'];
    // $_SESSION['IDRoom'] = $row['IDRoom'];
    // $_SESSION['Status'] = $row['Status'];
    
    header("Location:edit.php");

}
else{
echo "<script>";
 echo "alert('รหัสผ่านผิด !!!');";
 echo "window.location='show.php';";
echo "</script>";
}
?>