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
    <p>Branch : <br><input type="text" name="Branch"></p>
    <p>Project Name : <br><input type="text" name="Proname"></p>
    <p>File Project : <input type="file" name="Pro_file"> 
    Year : <input type="text" name="year"></p>

    <button type="submit" name="Submit">Submit</button>
    
    </form>
</div>
</body>
</html>