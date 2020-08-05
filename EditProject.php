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
        <form action="" method="GET" enctype="multipart/form-data">
            
            <?php
            $sql = "SELECT * FROM project INNER JOIN branch ON project.Branch_NO = branch.Branch_NO WHERE Mem_Code = '$MemCode'";
            $result = mysqli_query($conn,$sql);
            
            // echo $sql;

            $row = mysqli_fetch_assoc($result);
            
            echo"<p>ชื่อโครงงาน : <input type='text' value=". $row['Pro_name'] ." name = 'Proname'></p>";
            echo"<p>คณะผู้จัดทำ  
                <p>คนที่ 1 : <input type='text' name='Stu_code1' value=". $row['Stu_code'] ."></p>
                <p>คนที่ 2 : <input type='text' name='Stu_code2' value=". $row['Stu_code2'] ."></p>
            </p>";
            // แสดงค่า ที่มีอยู่แล้ว
            
            echo "<p>Branch : <select name='Branch' id=''>";
            if($row['branch_name'] == 'วิศวกรรมเครื่องกล'){
                echo "<option value = '1'>".$row['branch_name']."</option>";
                echo "<option value = '2'>วิศวกรรมไฟฟ้า</option>";
                echo "<option value= '3'>วิศวกรรมโยธา</option>";
                echo "<option value = '4'>วิศวกรรมอุตสาหการ</option>";
            }
            elseif($row['branch_name'] == 'วิศกรรมไฟฟ้า'){
                echo "<option value = '2'>".$row['branch_name']."</option>";
                echo "<option value = '1'>วิศวกรรมเครื่องกล</option>";
                echo "<option value= '3'>วิศวกรรมโยธา</option>";
                echo "<option value = '4'>วิศวกรรมอุตสาหการ</option>";
            }
            elseif($row['branch_name'] == 'วิศวกรรมโยธา'){
                echo "<option value = '3'>".$row['branch_name']."</option>";
                echo "<option value = '1'>วิศวกรรมเครื่องกล</option>";
                echo "<option value = '2'>วิศวกรรมไฟฟ้า</option>";
                echo "<option value = '4'>วิศวกรรมอุตสาหการ</option>";
            }
            elseif($row['branch_name'] == 'วิศวกรรมอุตสาหการ'){
                echo "<option value = '4'>".$row['branch_name']."</option>";
                echo "<option value = '1'>วิศวกรรมเครื่องกล</option>";
                echo "<option value = '2'>วิศวกรรมไฟฟ้า</option>";
                echo "<option value= '3'>วิศวกรรมโยธา</option>";
            }
                
            echo "</select> ปีการศึกษาโครงงาน : <input type='text' name='year'  value=". $row['Pro_year'] ."></p>";

            echo "<p>อาจารย์ที่ปรึกษา : <input type='text' name='Pro_teacher' value=". $row['Pro_teacher'] ."></p>";
            echo "<p>อาจารย์ที่ปรึกษา : ".$row['Pro_teacher']."  </p>";
            echo "<p>บทคัดย่อ   :<input type='text' name='Abstract' value=". $row['Abstract'] ."></p>";

            echo "<p>File Project : <input type='file' name='Pro_file'> </p>";

            echo "<button type='submit' name='Edit' value ='Edit'>Edit</button>";


            ?>
        </form>
    </div>


</body>
</html>