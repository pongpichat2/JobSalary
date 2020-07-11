<?php
    require("conn.php");


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Show Project</title>
</head>
<body>
    <div>
        <!-- Show table Data All -->
    <table border="1px" >
        <tr>
                <th>ชื่อโปรเจค</th>
                <th>บทคัดย่อ</th>
                <th>สาขา</th>
                <th>ปีการศึกษา</th>
                <th>View</th>
        </tr>
        <?php

        $sql = "SELECT * FROM project INNER JOIN branch ON project.branch_NO = branch.branch_NO";


    
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<form action='' method = 'GET'>";
                echo "<tr>";
                echo "<th>". $row["Pro_name"] ."</th>";
                echo "<th><input type='text' value=". $row['Abstract'] ." name='Abstract'></th>";
                echo "<th><input type='text' value=". $row['branch_name'] ." name='branch'></th>";
                echo "<th><input type='text' value=". $row['Pro_year'] ." name='year'></th>";
                echo "<th><a href=".$row['file_pro']." >รายละเอียด</a></th>";

                echo "</tr>";
                echo "</form>";
            }
        }

        ?>
    </table></div>

    <a href="ShowLog.php">ShowLog</a>
    
</body>
</html>