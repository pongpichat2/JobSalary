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
<title>Edit</title>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css"> -->


    <!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script> -->
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
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
            <p style="color: white;"><?php echo $_SESSION['emailAdmin']; ?></p>
            <li class="item button secondary"><a href="logout.php">Log out</a></li>
        </ul>
        
    </nav>

    <h2 class="title">List Research</h2>
<div class="container">
<table id="table" class="table" >
<thead class="thead-dark">
  <tr>
    <!-- <th id='tdd'>#</th> -->
    <th id='tdd' scope="col">ผู้วิจัย</th>
    <th id='tdd' scope="col">ชื่อโครงการวิจัย(ภาษาไทย)</th>
    <th id='tdd' scope="col">ระยะเวลาดำเนินงาน</th>
    <th id='tdd' scope="col">ผลการตีพิมพ์</th>
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
         echo "<th scope='row'>". $row['Name_Leader'] ."</th>" 
         ."<td>". $row['NameRe_TH'] ."</td>"
         ."<td id='tdd'>". $row['Time_period'] ."</td>"
         ."<td id='tdd'>"; if($publish_status == 1){
            echo "✔";
        }
        if($publish_status == 2){
            echo "✖";
        }
        echo "</td>";
        echo "<td>". $row['Bugget'] ."</td>";
        // echo "<td><input type='submit' value='เพิ่มเติม'></td>";
        echo "<td><a href='detail.php?Re_id=$Re_id'><button id='btn'>เพิ่มเติม</a></button></td>";
        echo "</form >"; 
    
    }
    ?> 

</body>
    

    
</html>


