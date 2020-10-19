<?php
require("connect.php");
session_start();
$user = $_SESSION['Username'];
if(!isset($_SESSION['emailAdmin'])) {
    header("Location:show.php");
}


// $sql = "SELECT * FROM (research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
$sql = "SELECT * FROM ((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)"
        ."INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID)";



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
</head>
<style>
    .title {
    text-align: center;
    margin-top: 35px;
}
.container {
    width: 100%;
    background: white ;
    border: 2px solid;
    box-shadow: 0 0 15px black;
    border-radius: 25px;
}
#container {
    margin-top: 20px;
}
#table {
    margin-top: 20px;
}
#tdd {
    text-align: center;
}
/* table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
} */
    body{
        height: 100%;
        margin: 0;
        background-size: cover;
        background-position: center;
        background: #9b2c2c;
        }
    .container-show{
        position: fixed;
        width: 1000px;
        margin-left: 20%;
        margin-top: 20px;
        }
    .container-show table{
        font-family: 'Sarabun', sans-serif;
    }
    .container-show table thead .title-show{
        text-align: center;
        height: 50px;
        background: rgba(151, 57, 57, 0.7);
        border-collapse: collapse;
    }
    .container-show table tbody .but-Edit{
        border: 2px solid black ;

        height: 35px;

        font-weight: bold;
        box-shadow: 1px 1.5px black;
        transition: 0.8s;
    }
    .container-show table tbody .but-Edit:hover{
        background: rgba(99, 240, 96, 0.83);
    }
    .container-show table tbody .but-Delete{
        border: 2px solid black ;

        height: 35px;
 
        font-weight: bold;
        box-shadow: 1px 1.5px black;
        transition: 0.8s;
    }
    .container-show table tbody .but-Delete:hover{
        background: rgba(244, 46, 46, 0.81);
    }
    nav{
    top: 0;
    background: #222;
    padding: 5px 20px;
}
ul{
    list-style-type: none;
}
a{
    color: white;
    text-decoration: none;
}
a:hover{
    text-decoration: underline;
}
.menu li{
    font-size: 16px;
    padding: 15px 5px;
}
.menu li a {
    display: block;
}
.logo a {
    font-size: 20px;
}
.botton.secondary {
    border-bottom: 1px #444 solid;
}

/* Mobile menu */
.menu{
    
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: center;
}
.toggle{
    order: 1;
}
.item.button{
    order: 2;
}
.item{
    width: 100%;
    text-align: center;
    order: 3;
    display: none;
}
.item.active{
    display: block;
}
.toggle{
    cursor: pointer;
}
.bars{
    background: #999;
    display: inline-block;
    height: 2px;
    position: relative;
    width: 18px;
}
.bars::before,.bars::after{
    background: #999;
    content: "";
    display: inline-block;
    height: 2px;
    position: absolute;
    width: 18px;
}
.bars::before{
    top: 5px;
}
.bars::after{
    top: -5px;
}
.arrow-up{
    width: 0;
    height: 0;
    position: absolute;
    border-left: 20px solid transparent;
    border-right: 20px solid transparent;
    border-bottom: 20px solid #fff;
    right: 35px;
    top: 55px;
    display: none;
}
.login-form{
    position: absolute;
    width: 300px;
    height: auto;
    background: #fff;
    right: 10px;
    top: 70px;
    border-radius: 2px;
    border-bottom: 5px solid gray;
    display: none;
}
.login-form>form{
    width: 250px;
    margin: 25px auto;
    font-size: 16px;
    font-family: sans-serif,Arial;
    color: gray;
    letter-spacing: -0.05em;
}
input[type="text"],
input[type="password"]{
    width: 240px;
    height: 35px;
    border: 0px;
    outline: none;
    box-shadow: inset 0 0 10px #eee;
    border-radius: 5px;
    border-bottom: 10px;
    margin-top: 5px;
    font-family: sans-serif,Arial;
    font-size: 16px;
}
.label{
    width: 240px;
    height: 35px;
    border: 0px;
    outline: none;
    box-shadow: inset 0 0 10px #eee;
    border-radius: 5px;
    border-bottom: 10px;
    margin-top: 5px;
    font-family: sans-serif,Arial;
    font-size: 16px;
}
#btn,input[type="submit"]{
    width: 95%;
    height: 35px;
    background: #0b8256;
    font-size: 16px;
    font-weight: bold;
    font-family: sans-serif,Arial;
    color: white;
    outline: none;
    border: 0px;
    border-radius: 3px;
    letter-spacing: -0.05em;
    cursor: pointer;
}
#btn,input[type="submit"]:hover{
    background: #0a4b33;
}


/* Tablet menu */
@media all and (min-width:468px){
    .menu{
        justify-content: center;
    }
    .logo{
        flex: 1;
    }
    .item.button{
        width: auto;
        order: 1;
        display: block;
    }
    .toggle{
        order: 2;
    }
    .button.secondary{
        border: 0;
    }
    .button a{
        text-decoration: none;
        padding: 7px 15px;
        background: teal;
        border: 1px solid #006d6d;
        border-radius: 50em;
    }
    .button.secondary a{
        background: transparent;
    }
    .button a:hover{
        transition: all .25s;
    }
    .button:not(.secondary) a:hover{
        background: #006d6d;
        border-color: #005959;
    }
    .button.secondary a:hover{
        color: #ddd;
    }
}
@media all and (min-width:768px){
    .item{
        display: block;
        width: auto;
    }
    .toggle{
        display: none;
    }
    .logo{
        order: 0;
    }
    .item{
        order: 1;
    }
    .button{
        order: 2px;
    }
    .menu li{
        padding: 15px 10px;
    }
    .menu li.button{
        padding-right: 0;
    }
}

</style>
<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="#">Eng Up</a></li>
            <li class="item button secondary"><a href="AddResearch.php">เพิ่มข้อมูล</a></li>
            <li class="item button secondary"><a href="edit.php">วิจัย</a></li>
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
         echo "<th scope='row'>". $row['Name_leader'] ."</th>" 
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


