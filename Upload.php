<?php
require("conn.php");

$Fname = "";
$Lname = "";
$Stu_ID = "";
$branch = "";
$Proname = "";
$year = "";

if(isset($_REQUEST['Fname'])) $Fname = $_REQUEST['Fname'];
if(isset($_REQUEST['lname'])) $Lname = $_REQUEST['lname'];
if(isset($_REQUEST['Stu_ID'])) $Stu_ID= $_REQUEST['Stu_ID'];
if(isset($_REQUEST['Branch'])) $branch= $_REQUEST['Branch'];
if(isset($_REQUEST['Proname'])) $Proname= $_REQUEST['Proname'];
if(isset($_REQUEST['year'])) $year= $_REQUEST['year'];


// รับ File ที่ส่งมา
$target_file = basename($_FILES["Pro_file"]["name"]);


// path ที่ต้องการเก็บ File
$pathFile = "UploadPro/";

// นามสกุลของไฟส์
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$newFilename = $pathFile. 'Project_'.uniqid().".".$FileType;

echo $newFilename;



if ($FileType == "pdf" || $FileType == "docx"){
  if (move_uploaded_file($_FILES["Pro_file"]["tmp_name"], $newFilename)) {

    $sql = "INSERT INTO student_info (f_name, l_name, student_code, pro_name, year) 
        Value ('$Fname', '$Lname', '$Stu_ID', '$Proname', '$year')";

    $sql_Pro = "INSERT INTO pro_name (pro_name, file_pro, branch_NO) 
    Value ('$Proname', '$newFilename', '$branch')";

    if ($conn->query($sql) === TRUE) {
       if($conn->query($sql_Pro) === TRUE) {
       
          echo "successfully Pro Name";
      }
        echo "successfully  Student";
    }
    else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  
  $conn->close();


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