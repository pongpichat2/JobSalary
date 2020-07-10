<?php
require("conn.php");
session_start();


$username = "";
$Password = "";

    if(isset($_REQUEST['Username'])) $username = $_REQUEST['Username'];
    if(isset($_REQUEST['Password'])) $Password = $_REQUEST['Password'];

    $sql = "SELECT * FROM `student` INNER JOIN status ON student.Status_ID = status.Status_ID WHERE Username = '$username' AND Password = '$Password'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1 ){


        $row = mysqli_fetch_assoc($result);
        echo $row['Status'];

        $_SESSION['Mem_code'] = $row['Mem_Code'];
        $_SESSION['fname'] = $row['Fname'];
        $_SESSION['lname'] = $row['Lname'];

        if( $row['Status'] == 'Student'){
            header("Location:AddProject.php");
        }
        else{
            header("Location:ShowProject.php");
        }

    }
    else{
        echo "<script>";
        echo "alert('รหัสผ่านผิด !!!');";
        echo "window.location='login.php';";
        echo "</script>";
    }

?>