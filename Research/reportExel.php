<?php
require("connect.php");
$Leader_name = '';
$name_research = '';
// if(isset($_POST['abc'])) $Type_re = $_POST['abc'];
// $Type_re = $_POST['abc'];
if(isset($_REQUEST['select_type'])) $Type_re = $_REQUEST['select_type'];
if(isset($_REQUEST['search'])) $Leader_name = $_REQUEST['search'];
if(isset($_REQUEST['search_re'])) $name_research = $_REQUEST['search_re'];
// $Type_re = $_REQUEST['select_type'];
if($Type_re == 'บริการวิชาการ'){
    $Type_re = '2';
}
if($Type_re == 'งานวิจัย'){
    $Type_re = '1';
}
if($Type_re == 'All'){
    $Type_re = '';
}
// echo $Type_re;
// echo $Leader_name;
session_start();
if($Type_re != null || $Leader_name != '' || $name_research != ''){
    $sql = "SELECT * FROM (((research INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID) 
    INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status)
    INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader) 
    WHERE funds_out_status.Funds_out_Status LIKE '%$Type_re%' AND research.NameRe_TH LIKE '%$name_research%' 
    AND name_leader.Name_Leader LIKE '%$Leader_name%' AND research.ID_faculty = '1'";
}

// if($Type_re == 'บริการวิชาการ'){
//     $sql = "SELECT * FROM (((research INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID) 
//     INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status)
//     INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader) 
//     WHERE funds_out_status.Funds_out_Status = '2' AND research.ID_faculty = '1'";
// }
// elseif($Type_re == 'งานวิจัย'){
//     $sql = "SELECT * FROM (((research INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID) 
//     INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status)
//     INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader) 
//     WHERE funds_out_status.Funds_out_Status = '1' AND research.ID_faculty = '1'";
// }
// elseif($name_research != '' && $name_research != null){
//     $sql = "SELECT * FROM (((research INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID) 
//     INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status) 
//     INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader) 
//     WHERE research.NameRe_TH LIKE '%$name_research%' AND research.ID_faculty = '1'";
// }
// elseif($Leader_name != '' && $Leader_name != null){
//     $sql = "SELECT * FROM (((research INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID) 
//     INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status) 
//     INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader) 
//     WHERE name_leader.Name_Leader LIKE '%$Leader_name%' AND research.ID_faculty = '1'";
// }
if($Type_re == null && $Leader_name == '' && $name_research == ''){
    $sql = "SELECT * FROM research INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader WHERE ID_faculty = '1'";
}

echo $sql;
header("Content-Type: application/vnd.ms-excel"); // ประเภทของไฟล์
header('Content-Disposition: attachment; filename="myexcel.xls"'); //กำหนดชื่อไฟล์
header("Content-Type: application/force-download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Type: application/octet-stream"); 
header("Content-Type: application/download"); // กำหนดให้ถ้าเปิดหน้านี้ให้ดาวน์โหลดไฟล์
header("Content-Transfer-Encoding: binary"); 
header("Content-Length: ".filesize("myexcel.xls"));   

@readfile($filename); 
?>
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<html>
<body>
<table id="table" class="table" border="1">
        <thead>
        <tr>
            <th >ชื่อโครงการวิจัย(ภาษาไทย)</th>
            <th >ประเภทงานวิจัย</th>
            <th >หัวหน้าโครงการ</th>
            <th >ผู้ร่วมวิจัย</th>
            <th >งบประมาณ</th>
            <th >ค่าคณะ 5%</th>
        </tr>
        </thead>
        <tbody >
            <?php
            
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $Re_ID = $row['Re_ID'];
                    echo "<tr>";
                    // $name_Research = $row['NameRe_TH'];
                    echo "<td>" .$row["NameRe_TH"]. "</td>";

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
                    echo "<td>" .$row["Name_Leader"]. "</td>";
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
                                    
                                    echo "คนที่ ".$count_mem . ":  " .$member['MemberName'] ."<br>";
                                    
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
</html>