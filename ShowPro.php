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
                <th>ชื่อผู้จัดทำ</th>
                <th>ชื่อโปรเจค</th>
                <th>สาขา</th>
                <th>ปีการศึกษา</th>
                <th>View</th>
        </tr>
        <?php

        $sql = "SELECT * FROM ((`pro_name` INNER JOIN student_info ON pro_name.pro_name = student_info.pro_name)
        INNER JOIN branch ON pro_name.branch_NO = branch.branch_NO)";
    
        $result = mysqli_query($conn,$sql);

        if (mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)){
                echo "<form action=''>";
                echo "<tr>";
                echo "<th>". $row["f_name"] ." ". $row["l_name"] ."</th>";
                echo "<th>". $row["pro_name"] ."</th>";
                echo "<th>". $row["branch_name"] ."</th>";
                echo "<th>". $row["year"] ."</th>";
                echo "<th><a href=".$row["file_pro"].">รายละเอียด</a></th>";
                echo "</tr>";
                echo "</form>";
            }}

        ?>
    </table></div>
    <a href="AddPro.php">ADd</a>
    
</body>
</html>