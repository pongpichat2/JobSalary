<?php
require("conn.php");
session_start();

$MemCode = $_SESSION['Mem_code'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Project</title>
</head>
<body>
    <a href="AddProject.php">AddProject</a>

    <div>
        <form action="" method="POST" enctype="multipart/form-data">
            
            <?php
            $sql = "SELECT * FROM project WHERE Mem_Code = '$MemCode'";
            $result = mysqli_query($conn,$sql);
            $row = mysqli_fetch_assoc($result);
            echo"<p>ชื่อโครงงาน : <input type='text' value=". $row['Pro_name'] ." name = 'Proname'></p>";
            echo"<p>คณะผู้จัดทำ  
                <p>คนที่ 1 : <input type='text' name='Stu_code1' value=". $row['Stu_code'] ."></p>
                <p>คนที่ 2 : <input type='text' name='Stu_code2' value=". $row['Stu_code2'] ."></p>
            </p>";
            // แสดงค่า ที่มีอยู่แล้ว
            echo "<p>Branch : <select name='Branch' id=''>
                <option value='1'>วิศวกรรมเครื่องกล</option>
                <option value='2'>วิศกรรมไฟฟ้า</option>
                <option value='3'>วิศวกรรมโยธา</option>
                <option value='4'>วิศวกรรมอุตสาหการ</option>
            </select> ปีการศึกษาโครงงาน : <input type='text' name='year'  value=". $row['Pro_year'] ."></p>";

            echo "<p>อาจารย์ที่ปรึกษา : <input type='text' name='Pro_teacher' value=". $row['Pro_teacher'] ."></p>";
            echo "<p>บทคัดย่อ :  :<input type='text' name='Abstract' value=". $row['Abstract'] ."></p>";


            echo "<p>File Project : <input type='file' name='Pro_file'> </p>";

            echo "<button type='submit' name='Edit' value ='Edit'>Edit</button>";

            echo $row['Pro_teacher'];
            ?>
        </form>
    </div>

    <!-- Update Edit Project -->
    <?php
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

    echo "$Pro_teacher <br>";
    // echo "$type <br>";
    // echo "$stu_code2 <br>";
    // echo "$stu_code1 <br>";
    // echo "$Proname <br>";
    // echo "$year <br>";
    // echo "$Abstract <br>";
    // echo $filePro;

    $target_file = basename($filePro);

    // path ที่ต้องการเก็บ File
    $pathFile = "UploadPro/";

    // นามสกุลของไฟส์
    $FileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // ตั้งชื่อไฟส์ใหม่
    $newFilename = $pathFile. $Proname."_".uniqid().".".$FileType;


    if ($FileType == "pdf" || $FileType == "docx"){
        if (move_uploaded_file($_FILES["Pro_file"]["tmp_name"], $newFilename)) {
      
          $sql = "UPDATE project SET Pro_name = '$Proname', Stu_code = '$stu_code1', Stu_code2 = '$stu_code2', Abstract = '$Abstract',
           file_pro = '$newFilename' , Pro_year = '$year', Pro_teacher = '$Pro_teacher', branch_NO = '$Branch' WHERE Mem_Code = '$MemCode'";
    
          $sql_Log = "INSERT INTO log_pro (Pro_name, type) Value ('$Proname', '$type')";

          echo $sql;
    
        //   $result = mysqli_query($conn,$sql);
        //   $result2 = mysqli_query($conn,$sql_Log);
    

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
    
</body>
</html>