<?php
require("conn.php")

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
            margin: 10% 33%;
        }
    </style>
</head>
<body>
<div class="inputPro">
    <form action="Upload.php" method="POST" enctype="multipart/form-data">
    <p>First Name : <br><input type="text" name="Fname"></p>
    <p>Last Name : <br><input type="text" name="lname"></p>
    <p>Student Code : <br><input type="text" name="Stu_ID"></p>
    <p>Branch : <select name="Branch" id="">
        <option value="1">วิศวกรรมเครื่องกล</option>
        <option value="2">วิศกรรมไฟฟ้า</option>
        <option value="3">วิศวกรรมโยธา</option>
        <option value="4">วิศวกรรมอุตสาหการ</option>
    </select></p>
    <p>Project Name : <br><input type="text" name="Proname"></p>
    <p>File Project : <input type="file" name="Pro_file"> 
    Year : <input type="text" name="year"></p>

    <button type="submit" name="Submit">Submit</button>
    
    </form>
    <a href="ShowPro.php">Show</a>
</div>
</body>
</html>