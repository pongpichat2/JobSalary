<?php
require("conn.php");
session_start();

$Proname = "";
$stu_code1 = "";
$stu_code2 = "";
$Branch = "";
$year = "";
$Abstract = "";
$Pro_teacher = "";
$type = "";
$filePro = "";

if(isset($_REQUEST['Proname'])) $Proname = $_REQUEST['Proname'];
if(isset($_REQUEST['Stu_code1'])) $stu_code1 = $_REQUEST['Stu_code1'];
if(isset($_REQUEST['Stu_code2'])) $stu_code2 = $_REQUEST['Stu_code2'];
if(isset($_REQUEST['Branch'])) $Branch = $_REQUEST['Branch'];
if(isset($_REQUEST['year'])) $year = $_REQUEST['year'];
if(isset($_REQUEST['Abstract'])) $Abstract = $_REQUEST['Abstract'];
if(isset($_REQUEST['Pro_teacher'])) $Pro_teacher = $_REQUEST['Pro_teacher'];
if(isset($_REQUEST['Edit'])) $type = $_REQUEST['Edit'];

if(isset($_FILES["Pro_file"]["name"])) $filePro = $_FILES["Pro_file"]["name"];

    // echo "$Pro_teacher <br>";
    // echo "$type <br>";
    // echo "$stu_code2 <br>";
    // echo "$stu_code1 <br>";
    // echo "$Proname <br>";
    // echo "$Branch <br>";
    // echo "$year <br>";
    // echo "$Abstract <br>";
    // echo $filePro;


    // path ที่ต้องการเก็บ File
    $pathFile = "UploadPro/";

    // นามสกุลของไฟส์
    $FileType = strtolower(pathinfo($filePro,PATHINFO_EXTENSION));

    // ตั้งชื่อไฟส์ใหม่
    $newFilename = $pathFile. $Proname."_".uniqid().".".$FileType;


    if ($FileType == "pdf" || $FileType == "docx"){
        if (move_uploaded_file($_FILES["Pro_file"]["tmp_name"], $newFilename)) {
      
          $sql = "UPDATE project SET (Pro_name = '$Proname', Stu_code = '$stu_code1', Stu_code2 = '$stu_code2', Abstract = '$Abstract',
           file_pro = '$newFilename' , Pro_year = '$year', Pro_teacher = '$Pro_teacher', branch_NO) WHERE Mem_Code = '$MemCode'";
    
          $sql_Log = "INSERT INTO log_pro (Pro_name, type) Value ('$Proname', '$type')";

          echo $sql;
    
          $result = mysqli_query($conn,$sql);
          $result2 = mysqli_query($conn,$sql_Log);
    
          header("Location:EditProject.php");
    
        } 
        else {
            echo "Sorry, there was an error uploading your file.";
          }
      }
      else{
        echo "Sorry, there was an error uploading your file.";
        exit();
      }


?>