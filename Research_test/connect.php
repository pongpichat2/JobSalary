<?php
$servername = "localhost";
$username = "root";
$password = "";
$DB = "research";

//create connection
$conn = mysqli_connect($servername, $username, $password, $DB);
mysqli_set_charset($conn,"utf8");

//check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}
else "Connection succesfully";

?>