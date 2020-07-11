<?php
require('conn.php');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Time Project</title>
</head>
<body>
    <h1>Show Log Project</h1>

    <table border="2px"> 
        <tr>
            <!-- <th>รหัสนิสิต</th>
            <th>ชื่อ</th>
            <th>สกุล</th> -->
            <th>หัวข้อโปรเจค</th>
            <th>Activity</th>
            <th>เวลา</th>
        </tr>
        <?php

        // $sql = "SELECT * FROM ((project INNER JOIN student ON project.Mem_Code = student.Mem_Code )
        // INNER JOIN log_pro ON project.Pro_name = log_pro.Pro_name)";
        $sql = "SELECT * FROM log_pro";

        $result = mysqli_query($conn,$sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                echo "<tr>";
                // echo "<th>".$row['Mem_Code']." </th>";
                // echo "<th>".$row['Fname']." </th>";
                // echo "<th>".$row['Lname']." </th>";
                echo "<th>".$row['Pro_name']." </th>";
                echo "<th>".$row['type']." </th>";
                echo "<th>".$row['TIME']." </th>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>
</html>