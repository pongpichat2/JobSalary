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


// path ที่ต้องการเก็บ File
$pathFile = "Project/";

$target_file = $pathFile . basename($_FILES["Pro_file"]["name"]);

$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($FileType == "pdf" || $FileType == "docx"){
  if (move_uploaded_file($_FILES["Pro_file"]["tmp_name"], $target_file)) {
    echo "The file  has been uploaded.";
    $sql = "INSERT INTO student_info (f_name, l_name, student_code, branch, pro_name, year) 
        Value ('$Fname', '$Lname', '$Stu_ID', '$branch', '$Proname', '$year')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
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