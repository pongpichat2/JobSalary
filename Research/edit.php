<?php
require("connect.php");
session_start();
$user = $_SESSION['Username'];
if(!isset($_SESSION['emailAdmin'])) {
    header("Location:show.php");
}


// $sql = "SELECT * FROM (research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
$sql = "SELECT * FROM (((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)
        INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID)
        INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader)";



?>
<html>
<head>
<title>Research</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"> -->


    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script> -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" type="text/javascript"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">


    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    <link rel="stylesheet" href="css/edit.css">
</head>
<style>


</style>
<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">Eng Up</a></li>
            <li class="item button secondary"><a href="AddResearch.php">เพิ่มข้อมูล</a></li>
 
            <li class="item button secondary"><a href="edit.php">วิจัย</a></li>
            <li class="item button secondary"><a href="Bugfaculty.php">รายได้คณะ</a></li>
            <p style="color: white; margin-top:15px;"><?php echo $_SESSION['emailAdmin']; ?></p>
            <li class="item button secondary"><a href="logout.php">Log out</a></li>
        </ul>
        
    </nav>

    <h2 class="title" style="font-weight: bold;Color:white;">รายชื่อโครงการ</h2>
    <h4 style='margin-left:63%;margin-bottom:10px;margin-top:50px;'>ค้นหา : <input type="text" name="search" id="search" placeholder="ชื่อผู้วิจัย....." style="border: 1px solid"> 
    หรือ <input type="text" name="search_re" id="search_re" placeholder="ชื่อโครงการ...." style="border: 1px solid"><br>
    ปีการดำเนินงาน : <input type="text" name="search_re" id="yearStart" placeholder="ค้นหาจากปีการดำเนินงาน...." style="border: 1px solid">
</h4>
<div class="container">
    <div  style="margin-top: 20px;">
<table id="table" class="table" >
<thead class="thead-dark">
  <tr>
    <!-- <th id='tdd'>#</th> -->
    <th id='tdd' scope="col">ผู้วิจัย</th>
    <th id='tdd' scope="col">ชื่อโครงการวิจัย(ภาษาไทย)</th>
    <th id='tdd' scope="col" style="display: none;">timestart</th>
    <th id='tdd' scope="col"><select name="" id="year"></select></th>
    <th id='tdd' scope="col"><select name="" id="publish">
        <option value="All_publish">การตีพิมพ์</option>
        <option value="✔">มีการตีพิมพ์</option>
        <option value="✖">ไม่มีการตีพิมพ์</option>
    </select></th>
    <th id='tdd' scope="col"><select name="" id="approve" >
        <option value="All_approve">สถานะโครงการ</option>
        <option value="เสนอโครงการ">เสนอโครงการ</option><span></span>
        <option value="เซ็นสัญญา">เซ็นสัญญา</option>
        <option value="ขออนุมัติดำเนินโครงการ">ขออนุมัติดำเนินโครงการ</option>
        <option value="ขออนุมัติเบิกเงิน(รอบ1)">ขออนุมัติเบิกเงิน(รอบ1)</option>
        <option value="ขออนุมัติเบิกเงิน(รอบ2)">ขออนุมัติเบิกเงิน(รอบ2)</option>
        <option value="ขออนุมัติเบิกเงิน(รอบ3)">ขออนุมัติเบิกเงิน(รอบ3)</option>
        <option value="ขออนุมัติขยายเวลา">ขออนุมัติขยายเวลา</option>
        <option value="สิ้นสุดโครงการ">สิ้นสุดโครงการ</option>
    </select></th>
    <th id='tdd' scope="col">งบประมาณ</th>
    <th id='tdd' scope="col">ดูรายละเอียด</th>
  </tr>
</thead>
<tbody>
    <?php
     $result = mysqli_query($conn,$sql);
     
     while ($row = mysqli_fetch_assoc($result)){
         $funds_status = $row['Funds_status'];
         $funds_type = $row['Funds'];
         $Re_id = $row['Re_ID'];
        //  echo $Re_id;
         $publish_status = $row['Published_status'];
         $CheckPublished_status = $row['Published_status'];
         $StartTime = substr($row['Time_period'],6,-11) ;
         $Stoptime = substr($row['Time_period'],17);
         $Beween =  (int)$Stoptime-(int)$StartTime ;
 
        // echo $Beween."<br>";
        echo "<form action='detail.php'>";       
         echo "<tr>";
        //  echo "<td id='tdd'><input type='text' size='1' name='status_id' value=" .$row['No']. " readonly></td>" 
         echo "<td scope='row'>". $row['Name_Leader'] ."</td>" 
         ."<td>". $row['NameRe_TH'] ."</td>";
         if($Beween>0){
             echo"<td style='display: none;'><p id='timestart' class='timestart' >$StartTime<br>";
             for($Start = 0;$Start<$Beween;$Start++){
                $StartTime++;
                echo "$StartTime<br>";
             }
             
             echo "</p></td>";
         }
         else{
            echo "<td style='display: none;'><p id='timestart' class='timestart'>$StartTime<br></p></td>";
         }
         echo "<td style='text-align:center;'>". $row['Time_period'] ."</td>"
         ."<td style='text-align:center;'>"; if($publish_status == 1){
            echo "<p style='color: green;'>✔</p>";
        }
        if($publish_status == 2){
            echo "<p style='color: red;'>✖</p>";
        }
        echo "</td>";
        echo "<td style='text-align: center;'>". $row['Approve'] ."</td>";
        echo "<td style='text-align: center;'>". number_format($row['Bugget']) ."</td>";
        // echo "<td><input type='submit' value='เพิ่มเติม'></td>";
        echo "<td><a href='detail.php?Re_id=$Re_id' style='text-decoration-line: none;'><button id='btn'>เพิ่มเติม</a></button></td>";
        echo "</tr>";
        echo "</form >"; 

    }
    ?> 
</tbody>
</table>
</div>
</body>
<script>
    
    $(document).ready(function(){
       
        
            $('#publish').on("change", function() {
            var x = document.getElementById('publish').value;
            if(x == "All_publish"){
                $('table tbody tr').show();
            }
            else{
                var len = $('table tbody tr:not(.notfound) td:nth-child(5):contains("'+x+'")').length;
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
        $('#approve').on("change", function() {
            var x = document.getElementById('approve').value;
            if(x == "All_approve"){
                $('table tbody tr').show();
                // console.log(x);
            }
            else{
                var len = $('table tbody tr:not(.notfound) td:nth-child(6):contains("'+x+'")').length;
            $('table tbody tr').hide();
            // console.log(x);
    
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
        $('#year').on("change", function() {
            var x = document.getElementById('year').value;
            if(x == "All_year"){
                $('table tbody tr').show();
            }
            else{
                

                var len = $('table tbody tr:not(.notfound) td:nth-child(3):contains('+x+')').length;

                $('table tbody tr').hide();
        
                if(len > 0){

                    $('table tbody tr:not(.notfound) td:contains("'+x+'")').each(function(){
                        
                        // console.log($(this).closest('tr'));
                        $(this).closest('tr').show();
                        
                    });
                }
                else{
                    $('.notfound').show();
                }
            }
        });
        $('#yearStart').on("keyup", function() {
            var x = document.getElementById('yearStart').value;
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
        
        var start = 9;
        var end = new Date().getFullYear();
        var option = "<option value='All_year'>ระยะเวลาดำเนินงาน</option>";
        for (var year = end ; year >= end - start ; year--){
            option += "<option>"+ year +"</option>";
        }
        document.getElementById("year").innerHTML = option;

        $(document).ready(function(){
            $(document).ready(function() {
                $('#table').DataTable({
                "ordering": false,
                "searching": false
                });
                
            } );
        });
    });
    
</script>

    
</html>


