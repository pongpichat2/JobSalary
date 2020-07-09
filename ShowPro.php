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
    <table border="1px">
        <tr>
                <th>ชื่อโปรเจค</th>
                <th>สาขา</th>
                <th>ปีการศึกษา</th>
                <th>View</th>
                <th>download</th>
        </tr>
        <a href="downloads/"></a>
        <?php

        $sql = "SELECT * FROM project INNER JOIN branch ON project.branch_ON = branch.branch_NO";


    
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<form action=''>";
                echo "<tr>";
                echo "<th>". $row["Pro_name"] ."</th>";
                echo "<th>". $row["branch_name"] ."</th>";
                echo "<th>". $row["Pro_year"] ."</th>";
                echo "<th><a href=".$row['file_pro']." >รายละเอียด</a></th>";

                echo "</tr>";
                echo "</form>";
            }}

        ?>
    </table></div>
    <a href="AddProject.php">ADd</a>
    
</body>
</html>