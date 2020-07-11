<?php
require("conn.php");
session_start();

echo $_SESSION['Mem_code'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload</title>
    <style>
        .inputPro{
            border: black solid 2px;
            width: 600px;
            margin: 5% 33%;

        }
    </style>
</head>
<body>
    <a href="EditProject.php">Edit Project</a>
        <h1 style="text-align: center;"> Upload Project </h1>
<div class="inputPro">
    <form action="UploadProject.php" method="POST" enctype="multipart/form-data">
    <p>Project Name : <br><input type="text" name="Proname"></p>
    <p>คณะผู้จัดทำ  
        <p>คนที่ 1 : <input type="text" name="Stu_code1" placeholder="รหัสนิสิต"></p>
   
        <p>คนที่ 2 : <input type="text" name="Stu_code2" placeholder="รหัสนิสิต"></p>
    </p>
    <p>Branch : <select name="Branch" id="">
        <option value="1">วิศวกรรมเครื่องกล</option>
        <option value="2">วิศกรรมไฟฟ้า</option>
        <option value="3">วิศวกรรมโยธา</option>
        <option value="4">วิศวกรรมอุตสาหการ</option>
    </select> ปีการศึกษาโครงงาน : <input type="text" name="year"></p>
    <p>อาจารย์ที่ปรึกษา :<input type="text" name="Pro_teacher" ></p>
    
    <p>บทคัดย่อ : <textarea name="Abstract" id="" cols="50" rows="10"></textarea></p>

    <p>File Project : <input type="file" name="Pro_file"> </p>
    

    <button type="submit" name="Submit">Submit</button>
    
    </form>
   
</div> 
</body>
</html>