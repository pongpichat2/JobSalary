<?php 
require('connect.php');
session_start();
if(!isset($_SESSION['emailAdmin'])) {
    header("Location:show.php");
}
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

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
    <link rel="stylesheet" href="css/Bugfaculty.css">
    <title>Bugget Faculty</title>
</head>

<body>

    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">Eng Up</a></li>
            <p style="color: white; position:absolute;margin-top:50px;margin-left:500px"><?php echo $_SESSION['emailAdmin']; ?></p>
            <li class="item button secondary"><a href="AddResearch.php">เพิ่มข้อมูล</a></li>
            <li class="item button secondary"><a href="edit.php">วิจัย</a></li>
            <li class="item button secondary"><a href="">รายได้คณะ</a></li>
            
            <li class="item button secondary"><a href="logout.php">Log out</a></li>
        </ul>
    </nav>


    <h4 style="margin-left:55%;margin-bottom:10px;margin-top:2%;font-family: 'Sarabun', sans-serif;" >ค้นหา <input type="text" name="search" id="search" placeholder="ชื่อโครงการวิจัย...." style="border: 1px solid"> หรือ 
    <input type="text" name="search_re" id="search_re" placeholder="ชื่อหัวหน้าโครงการ...." style="border: 1px solid"></h4>
    <div class="container" style="margin-top: 40px;">
    <div style="margin-top: 10px;">
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
            <th id='tdd' scope="col">งบประมาณ / บาท</th>
            <th id='tdd' scope="col">ค่าบำรุงคณะ 5% / บาท</th>
        </tr>
        </thead>
        <tbody >
            <?php
            
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $Re_ID = $row['Re_ID'];
                    $sql_faculty = "SELECT * FROM research INNER JOIN vat_faculty ON research.Re_ID = vat_faculty.Re_ID WHERE research.Re_ID = '$Re_ID'";
                    $faculty_query = mysqli_query($conn,$sql_faculty);
                    $rowtatalfaculty =  mysqli_fetch_assoc($faculty_query);
                    
                    $bugget = $rowtatalfaculty['faculty_total']*0.3;
                    // echo $ShareBug;
                    $remaining = $rowtatalfaculty['faculty_total']-$bugget;
                    $sql_count = "SELECT COUNT(*)  AS AllMember FROM re_member WHERE Re_ID = '$Re_ID'";
                    $count_query = mysqli_query($conn,$sql_count);
                    $rowCount = mysqli_fetch_assoc($count_query);
                    
                    
                    $Share = 70/($rowCount['AllMember']+1);
                    $Partleader = $Share+30;
                    $PartleaderTotal = round($Partleader,4);
                    $ShareBug = round($Share,4);
                    // echo $ShareBug."<br>";
                    $Remain = $rowtatalfaculty['faculty_total']*($ShareBug/100);
    
                    $Sum = $bugget+$Remain;
                    // echo $ShareBug."<br>";
                    echo "<tr>";
                    // $name_Research = $row['NameRe_TH'];
                    echo "<td style='font-weight:bold;'>" .$row["NameRe_TH"]."</td>";

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
                    echo "<td>" ."<p style='font-weight:bold;'>".$row["Name_Leader"]."</p>"."สัดส่วนการทำงานหัวหน้า ".$PartleaderTotal." % "." = ".number_format($Sum,2)." บาท."."</td>";
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
                                    
                                    echo "คนที่ ".$count_mem . ":  " .$member['MemberName'] ." สัดส่วนการทำงาน ".number_format($ShareBug,2)." %"." = ".number_format($Remain,2)." บาท"."<br>";
                                    
                                    $count_mem++;
                                }

                            }
                        echo"</td>";
                     
                    }
                    echo "<td style='text-align:center;'>".number_format($row["Bugget"],2)."</td>";
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
                                echo "งวดที่ 1 :".number_format($rowfaculty['faculty1'])."<br>";
                            }
                            if($rowfaculty['faculty2'] == "" || $rowfaculty['faculty2'] == NULL ){
                                continue;
                            }
                            else{
                                echo "งวดที่ 2 :".number_format($rowfaculty['faculty2'])."<br>";
                            }
                            if($rowfaculty['faculty3'] == "" || $rowfaculty['faculty3'] == NULL ){
                                continue;
                            }
                            else{
                                echo "งวดที่ 3 :".number_format($rowfaculty['faculty3'])."<br>";
                            }
                            
                            
                            echo "รวมเป็นเงิน :". number_format($rowfaculty['faculty_total']);

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
    $('#search').on("keyup", function() {
        var x = document.getElementById('search').value;
        if(x == "All_year"){
            $('table tbody tr').show();
        }
        else{
            var len = $('table tbody tr:not(.notfound) td:nth-child(1):contains("'+x+'")').length;
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
    $('#search_re').on("keyup", function() {
        var x = document.getElementById('search_re').value;
        if(x == "All_year"){
            $('table tbody tr').show();
        }
        else{
            var len = $('table tbody tr:not(.notfound) td:nth-child(3):contains("'+x+'")').length;
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
    $(document).ready(function(){
        $(document).ready(function() {
            $('#table').DataTable({
            "ordering": false,
            "searching": false
            });
            
        } );
    });

</script>
</html>