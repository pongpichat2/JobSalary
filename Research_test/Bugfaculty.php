<?php 
require('connect.php');
session_start();

$sql = "SELECT * FROM research INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader WHERE ID_faculty = '1'";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>

    <link rel="stylesheet" href="css/Bugfaculty.css">
    <title>Bugget Faculty</title>
</head>

<body>

    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">Eng Up</a></li>
            <li class="item button secondary"><a href="AddResearch.php">เพิ่มข้อมูล</a></li>
            <li class="item button secondary"><a href="edit.php">วิจัย</a></li>
            <li class="item button secondary"><a href="">รายได้คณะ</a></li>
            <p style="color: white;"><?php echo $_SESSION['emailAdmin']; ?></p>
            <li class="item button secondary"><a href="logout.php">Log out</a></li>
        </ul>
    </nav>



    <div class="container" style="margin-top: 40px;">
    <table id="table" class="table" >
        <thead class="thead-dark">
        <tr>
            <th id='tdd' scope="col">ชื่อโครงการวิจัย(ภาษาไทย)</th>
            <th id='tdd' scope="col">
            <select name="" id="searchSelect">
                <option value="All" >โปรดเลือก...</option>
                <option value="งานวิจัย">งานวิจัย</option>
                <option value="บริการวิชาการ">บริการวิชาการ</option>
            </select></th>
            <th id='tdd' scope="col">หัวหน้าโครงการ</th>
            <th id='tdd' scope="col">ผู้ร่วมวิจัย</th>
            <th id='tdd' scope="col">งบประมาณ</th>
            <th id='tdd' scope="col">ค่าคณะ 5%</th>
        </tr>
        </thead>
        <tbody >
            <?php
            
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $Re_ID = $row['Re_ID'];
                    $bugget = $row["Bugget"]*0.3;
                    // echo $ShareBug;
                    $remaining = $row["Bugget"]-$bugget;
                    $sql_count = "SELECT COUNT(*)  AS AllMember FROM re_member WHERE Re_ID = '$Re_ID'";
                    $count_query = mysqli_query($conn,$sql_count);
                    $rowCount = mysqli_fetch_assoc($count_query);
                    
                    
                    $Share = 70/($rowCount['AllMember']+1);
                    $ShareBug = round($Share, 2);
                    // echo $ShareBug."<br>";
                    $Remain = $remaining*($ShareBug/100);
                    $Sum = $bugget+$Remain;
                    // echo $ShareBug."<br>";
                    echo "<tr>";
                    // $name_Research = $row['NameRe_TH'];
                    echo "<td>" .$row["NameRe_TH"]."</td>";

                    echo "<td>";
                    if($row["Funds_status"] == '1'){
                        echo "-";
          
                    }
                    elseif($row["Funds_status"] == '2'){
                        $sql_funout = "SELECT * FROM research INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID ";
                        $sql_funout .= "INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status WHERE research.Re_ID = '$Re_ID'";
                        $Funout_query = mysqli_query($conn,$sql_funout);

                        $rowFunout = mysqli_fetch_assoc($Funout_query);
                        echo $rowFunout['Funds_out'];

                    }
                    echo "</td>";
                    echo "<td>" .$row["Name_Leader"]. "<br>"."ส่วนแบ่งหัวหน้า 30 % = "." $bugget"." บาท. "."<br>"."ส่วนแบ่งทั้งหมด"."$ShareBug"." % = "."$Remain"." บาท. "
                    ."<br>"."รวม = ".$Sum." บาท."."</td>";
                    if($row["Status_stake"]== "2"){
                        echo "<td><p>ไม่มีผู้ร่วมวิจัย<p></td>";
                    }
                    elseif($row["Status_stake"]== "1"){
                        $member_sql = "SELECT * FROM research INNER JOIN re_member ON re_member.Re_ID = research.Re_ID WHERE research.Re_ID = '$Re_ID'";
         
                        echo"<td>";
                        $member_query = mysqli_query($conn,$member_sql);
                        if(mysqli_num_rows($member_query)>0){
                                $count_mem = 1;
                                while($member = mysqli_fetch_assoc($member_query)){
                                        // echo $member['MemberName'];
                                    // echo "<td>". $count_mem . ":  " . $member ['MemberName'] ."<br>"." </td>";
                                    
                                    echo "คนที่ ".$count_mem . ":  " .$member['MemberName'] ." ส่วนแบ่ง "." $ShareBug"." %"." = "." $Remain "." บาท"."<br>";
                                    
                                    $count_mem++;
                                }

                            }
                        echo"</td>";
                     
                    }
                    echo "<td>"."จำนวน : " .$row["Bugget"]." /บาท" ."</td>";
                    echo "<td>";
                    if($row["ID_faculty"] == '1'){
                        $sql_faculty = "SELECT * FROM research INNER JOIN vat_faculty ON research.Re_ID = vat_faculty.Re_ID WHERE research.Re_ID = '$Re_ID'";
                        $faculty_query = mysqli_query($conn,$sql_faculty);
                        // echo $sql_faculty;
                        while($rowfaculty = mysqli_fetch_assoc($faculty_query)){
                            if($rowfaculty['faculty1'] == "" || $rowfaculty['faculty1'] == NULL ){
                                continue;
                            }
                            else{
                                echo "งวดที่ 1 :".$rowfaculty['faculty1']." /บาท"."<br>";
                            }
                            if($rowfaculty['faculty2'] == "" || $rowfaculty['faculty2'] == NULL ){
                                continue;
                            }
                            else{
                                echo "งวดที่ 2 :".$rowfaculty['faculty2']." /บาท"."<br>";
                            }
                            if($rowfaculty['faculty3'] == "" || $rowfaculty['faculty3'] == NULL ){
                                continue;
                            }
                            else{
                                echo "งวดที่ 3 :".$rowfaculty['faculty3']." /บาท"."<br>";
                            }
                            
                            
                            echo "รวมเป็นเงิน :". $rowfaculty['faculty_total']." /บาท";

                        }
                    }
                    echo "</td>";

                    echo "</tr>";
                }
            }
            ?>
        </tbody>
    </table>
    </div>
</body>
<script>
    $('#searchSelect').on("change", function() {
        var x = document.getElementById('searchSelect').value;
        
        if(x == "All"){
            $('table tbody tr').show();
        }
        else{
            var len = $('table tbody tr:not(.notfound) td:nth-child(2):contains("'+x+'")').length;
        $('table tbody tr').hide();
 
        if(len > 0){

        $('table tbody tr:not(.notfound) td:contains("'+x+'")').each(function(){
            $(this).closest('tr').show();
        });
        }
        else{
        $('.notfound').show();
        }
        }
        


    });

</script>
</html>