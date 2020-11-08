<?php
require("connect.php");
session_start();

// $sql = "SELECT * FROM (research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
$sql = "SELECT * FROM (((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)
INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID)
INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader)";
// echo $sql;


?>
<html>
    <head>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="css/Show.css">
    <title>Research</title>
    </head>

<body>
<nav>
        <ul class="menu">
            
            <li class="item button"><a href="Login.php" id="login">Login</a></li>
            
            <div class="arrow-up"></div>
        </ul>
        <form action="CheckLogin.php" method="POST">
            <div class="login-form">
                    
                        <p style="font-weight: bold; font-size:25px;margin-left:160px;margin-top:10px;">Log - in</p>
                    <div style="font-weight: bold;margin-left:30px;font-size:16px; margin-top:15px;">
                        <p>Username : <input type="text" class="Username" name="User" placeholder="Username" required></p>
                        <p>Password &nbsp;&nbsp;: <input type="password" name="Pass" class="Pass" placeholder="Password" required></p>
                    </div>
                        <input type="submit" value="Log In">
                    
            </div>
        </form>
    </nav>

    <h2 class="title">รายชื่อโครงการ</h2>
    <h4 style='margin-left:55%;margin-bottom:10px;'>ค้นหา <input type="text" name="search" id="search" placeholder="ชื่อผู้วิจัย....." style="border: 1px solid"> หรือ 
    <input type="text" name="search_re" id="search_re" placeholder="ชื่อโครงการ...." style="border: 1px solid"></h4>
<div class="container">
<table id="table" class="table" >
<thead class="thead-dark">
  <tr>
    <!-- <th id='tdd'>#</th> -->
    <th id='tdd' scope="col">ผู้วิจัย</th>
    <th id='tdd' scope="col">ชื่อโครงการวิจัย(ภาษาไทย)</th>
    <th id='tdd' scope="col"><select name="" id="year"></select></th>
    <th id='tdd' scope="col"><select name="" id="publish">
        <option value="All_publish">การตีพิมพ์</option>
        <option value="✔">มีการตีพิมพ์</option>
        <option value="✖">ไม่มีการตีพิมพ์</option>
    </select></th>
    <th id='tdd' scope="col"><select name="" id="approve" >
        <option value="All_approve">สถานะโครงการ</option>
        <option value="เสนอโครงการ">เสนอโครงการ</option>
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
         echo "<form action='detail.php'>";       
         echo "<tr>";
        //  echo "<td id='tdd'><input type='text' size='1' name='status_id' value=" .$row['No']. " readonly></td>" 
         echo "<td scope='row'>". $row['Name_Leader'] ."</td>" 
         ."<td>". $row['NameRe_TH'] ."</td>"
         ."<td id='tdd'>". $row['Time_period'] ."</td>"
         ."<td id='tdd'>"; if($publish_status == 1){
            echo "<p style='color: green;'>✔</p>";
        }
        if($publish_status == 2){
            echo "<p style='color: red;'>✖</p>";
        }
        echo "</td>";
        echo "<td style='text-align: center;'>". $row['Approve'] ."</td>";
        echo "<td style='text-align: center;'>". $row['Bugget'] ."</td>";
        // echo "<td><input type='submit' value='เพิ่มเติม'></td>";
        echo "<td><a href='showUser.php?Re_id=$Re_id'><button id='btn'>เพิ่มเติม</a></button></td>";
        echo "</tr>";
        echo "</form >"; 
    
    }
    ?> 
</tbody>
</table>
</body>
    
    
</html>
<script>
    $(document).ready(function(){
        $(document).ready(function() {
            $('#table').DataTable({
            "ordering": false,
            "searching": false
            });
            
        } );
    });
       $('#publish').on("change", function() {
        var x = document.getElementById('publish').value;
        if(x == "All_publish"){
            $('table tbody tr').show();
        }
        else{
            var len = $('table tbody tr:not(.notfound) td:nth-child(4):contains("'+x+'")').length;
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
    $('#year').on("change", function() {
        var x = document.getElementById('year').value;
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
    
</script>
</script>


