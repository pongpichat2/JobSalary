<?php
require("connect.php");
session_start();
if(isset($_SESSION['emailAdmin'])) {
    header("Location:edit.php");
}
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
    <title>Research</title>
    </head>
    <style>
    .title {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
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
        body{
            height: 100vh;
            margin: 0;
            background-size: cover;
            background-position: center;
            font-family: 'Sarabun', sans-serif;
        }
        .container-show{
            width: 1500px;
            margin-left: 20px;
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
        nav{
        background: #9b2c2c;
        padding: 5px 5px;
        height: 90px;
        transition: 0.8s;
    }
    nav:hover{
        box-shadow: 0 0 15px black;
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

    }
    .toggle{
        order: 1;
    }
    .item.button{
        margin-left: 90%;
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

        width: 18px;
    }
    .bars::before,.bars::after{
        background: #999;
        content: "";
        display: inline-block;
        height: 2px;

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
        right: 50px;
        top: 60px;
        display: none;
    }
    .login-form{
        position: fixed;
        width: 400px;
        border: 2px solid black;
        background: #fff;
        right: 10px;
        top: 75px;
        border-radius: 5px;
        display: none;
    }
    .login-form>form{
        width: 250px;
    }
    .login-form input[type='text'],input[type='password']{
        border: black 2px solid;
        text-align: center;
        height: 40px;
        width: 230px;
        border-radius: 5px;
        transition: 0.8s;
    }
    .login-form input[type='text']:focus,input[type='password']:focus{
        width: 235px;
        box-shadow: 0 0 0 3px #9b2c2c;
    }
    .login-form input[type='submit']{
        width: 90px;
        height: 40px;
        border: 2px solid black;
        margin-left: 180px;
        font-weight: bold;
        background: white;
        transition: 0.8s;
    }
    .login-form input[type='submit']:hover{
        background: rgba(155, 44, 44,0.8);
        color: white;
        border-radius: 15px;
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
        background: white;
        color: black;
        font-weight: bold;
        border: 2px solid black;
        border-radius: 5px;
        transition: 0.8s;
    }
    .button.secondary a{
        background: transparent;
    }
    .button a:hover{
        transition: all .25s;
    }
    .button:not(.secondary) a:hover{
        border-radius: 15px ;
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
        echo "<td><a href='showUser.php?Re_id=$Re_id'><button id='btn'>เพิ่มเติม</a></button></td>";
        echo "</form >"; 
    
    }
    ?> 
</tbody>
</table>
</body>
    
    
</html>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
//สำหรับ show dropdown
// $(document).ready(function(){
//         var arrow = $(".arrow-up");
//         var form = $(".login-form");
//         var status = false;
//         $("#login").click(function(event){
//             event.preventDefault();
//             if(status == false){
//                 arrow.fadeIn();
//                 form.fadeIn();
//                 status = true;
//             }else{
//                 arrow.fadeOut();
//                 form.fadeOut();
//                 status = false;
//             }
//         })

//     })
//     //script สำหรับทำ responsive web
//     $(function() {
//             $(".toggle").on("click", function(){
//                 if($(".item").hasClass("active")){
//                     $(".item").removeClass("active");
                    
//                 }
//                 else{
//                     $(".item").addClass("active");

//                 }
//             })
//         });
</script>


