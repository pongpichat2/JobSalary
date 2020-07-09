<?php 
require("conn.php");

$Proname = $_POST["Proname"];
$stu_code1 = $_POST["Stu_code1"];
// $Fname1 = $_POST["fname1"];
// $Lname1 = $_POST["lname1"];
$stu_code2 = $_POST["Stu_code2"];
// $Fname2 = $_POST["fname2"];
// $Lname2 = $_POST["lname2"];
$Branch = $_POST["Branch"];
$year = $_POST["year"];
$Abstract = $_POST["Abstract"];
$Pro_teacher = $_POST["Pro_teacher"];

// echo "$Proname <br> ";
// echo "$stu_code1 <br> ";
// echo "$Fname1 <br> ";
// echo "$Lname1 <br> ";
// echo "$stu_code2 <br> ";
// echo "$Fname2 <br> ";
// echo "$Lname2 <br> ";
// echo "$Branch <br> ";
// echo "$year <br> ";
// echo "$Abstract <br> ";

$target_file = basename($_FILES["Pro_file"]["name"]);

// path ที่ต้องการเก็บ File
$pathFile = "UploadPro/";

// นามสกุลของไฟส์
$FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$newFilename = $pathFile. $Proname."_".uniqid().".".$FileType;

if ($FileType == "pdf" || $FileType == "docx"){
    if (move_uploaded_file($_FILES["Pro_file"]["tmp_name"], $newFilename)) {
  
      $sql = "INSERT INTO project (Pro_name, Stu_code, Stu_code2, Abstract, file_pro, Pro_year, Pro_teacher, branch_NO) 
        Value ('$Proname', '$stu_code1', '$stu_code2', '$Abstract', '$newFilename', '$year', '$Pro_teacher', $Branch)";
  
      
    //   $result = mysqli_query($conn,$sql);
    if ($conn->query($sql) === TRUE) {
        
         echo "successfully  Student";
     }
     else {
       echo "Error: " . $sql . "<br>" . $conn->error;
     }



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