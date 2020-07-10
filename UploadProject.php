<?php 
require("conn.php");
session_start();

$MemCode = $_SESSION['Mem_code'];

$Proname = $_POST["Proname"];
$stu_code1 = $_POST["Stu_code1"];

$stu_code2 = $_POST["Stu_code2"];

$Branch = $_POST["Branch"];
$year = $_POST["year"];
$Abstract = $_POST["Abstract"];
$Pro_teacher = $_POST["Pro_teacher"];



$target_file = basename($_FILES["Pro_file"]["name"]);

// path ที่ต้องการเก็บ File
$pathFile = "UploadPro/";

// นามสกุลของไฟส์
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$newFilename = $pathFile. $Proname."_".uniqid().".".$FileType;

if ($FileType == "pdf" || $FileType == "docx"){
    if (move_uploaded_file($_FILES["Pro_file"]["tmp_name"], $newFilename)) {
  
      $sql = "INSERT INTO project (Pro_name, Mem_Code, Stu_code, Stu_code2, Abstract, file_pro, Pro_year, Pro_teacher, branch_NO) 
        Value ('$Proname', '$MemCode', '$stu_code1', '$stu_code2', '$Abstract', '$newFilename', '$year', '$Pro_teacher', $Branch)";
  
      
    $result = mysqli_query($conn,$sql);

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