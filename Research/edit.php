<?php
require("connect.php");
session_start();


// $sql = "SELECT * FROM (research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
$sql = "SELECT * FROM ((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)"
        ."INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID)";



?>
<html>
<head>
<title>Edit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css">


    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
</head>
<style>
    body{
        height: 100%;
        margin: 0;
        background-size: cover;
        background-position: center;
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
input[type="submit"]{
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
input[type="submit"]:hover{
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
            <li class="item button secondary"><a href="#">Log out</a></li>
        </ul>
        
    </nav>

    <div class="container-show">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th class="title-show">ผู้วิจัย</th>
                <th class="title-show">ชื่อโครงการวิจัย(ภาษาไทย)</th>
                <th class="title-show">ระยะเวลาดำเนินงาน</th>
                <th class="title-show">งบประมาณ</th>
                <th class="title-show">Action</th>
                <th class="title-show">ขออนุมัติดำเนินโครงงาน</th>
                <th class="title-show">แหล่งเงินทุน</th>
                <th class="title-show">ชื่อโครางงานวิจัย(ภาษาอังกฤษ)</th>
                <th class="title-show">ชื่อผู้ร่วมวิจัย</th>
                <th class="title-show">ประเภทงานวิจัย</th>
                <th class="title-show">ผลงานตีพิมพ์</th>
            </tr>
        </thead>
        <tbody>
            <!-- <tr> -->
                <?php
                $result = mysqli_query($conn,$sql);
                while ($row = mysqli_fetch_assoc($result)){
                    $funds_status = $row['Funds_status'];
                    $funds_type = $row['Funds'];
                    $Re_id = $row['Re_ID'];
                    $publish_status = $row['Published_status'];
                    $CheckPublished_status = $row['Published_status'];

                    
                    //Start Check Member in Research
                    $CheckStake = "SELECT * FROM research INNER JOIN status_stakeholder ON research.Status_stake = status_stakeholder.Status_stake_ID WHERE research.Re_ID = '$Re_id'";
                    $CheckStake_query = mysqli_query($conn,$CheckStake);
                    while ($rowStake = mysqli_fetch_assoc($CheckStake_query)){
                        $StatusStake = $rowStake['Status_stake_ID'];
                    }
                    //ผู้ร่วมวิจัย
                    if($StatusStake == '1'){
                        $member = "SELECT * FROM (((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
                        $member .="INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID)INNER JOIN re_member ON re_member.Re_ID = research.Re_ID)";

                        $member_query = mysqli_query($conn,$member);
                        // echo $member;
                        // echo "<br>";
                        if (mysqli_num_rows($member_query)>0){
                            $count = 1;
                            $member.="WHERE research.Re_ID = '$Re_id'";
                            $member_fetch_query = mysqli_query($conn,$member);
                            if(mysqli_num_rows($member_fetch_query) == 1){
                                while ($member_fetch_row = mysqli_fetch_assoc($member_fetch_query)){
                                $membername = $member_fetch_row['MemberName'];
                                }
                            }
                            elseif(mysqli_num_rows($member_fetch_query) == 2){
                                while ($member_fetch_row = mysqli_fetch_assoc($member_fetch_query)){
                                $membername = $member_fetch_row['MemberName'];
                                if($count == 1){
                                    $membername1 = $member_fetch_row['MemberName'];
                                    // echo $membername1;
                                }
                                elseif($count == 2){
                                    $membername2 = $member_fetch_row['MemberName'];
                                    // echo $membername2;
                                }
                                $count = $count+1;
                                }
                                $membername = $membername1.",".$membername2;
                            }
                            elseif(mysqli_num_rows($member_fetch_query) == 3){
                                while ($member_fetch_row = mysqli_fetch_assoc($member_fetch_query)){
                                $membername = $member_fetch_row['MemberName'];
                                if($count == 1){
                                    $membername1 = $member_fetch_row['MemberName'];
                                    // echo $membername1;
                                }
                                elseif($count == 2){
                                    $membername2 = $member_fetch_row['MemberName'];
                                    // echo $membername2;
                                }
                                elseif($count == 3){
                                    $membername3 = $member_fetch_row['MemberName'];
                                    // echo $membername3;
                                }
                                $count = $count+1;
                                }
                                $membername = $membername1.",".$membername2.",".$membername3;
                            }
                            
                        }
                    }
                    elseif($StatusStake == '2'){
                        $StringNonStake = ": ไม่มีผู้ร่วมวิจัย";

                    }
                    // Stop Check Member in Research

                    // Check Published_status in research
                    if($CheckPublished_status == '1'){
                        $sql_Published_status = "SELECT * FROM ((research INNER JOIN published ON research.Re_ID = published.Re_ID) ";
                        $sql_Published_status .= "INNER JOIN typepublished ON published.TypePublished = typepublished.Published_Inter_Status) WHERE research.Re_ID = '$Re_id'";
                        
                        $published_status_query = mysqli_query($conn,$sql_Published_status);
                        while ($rowpublished = mysqli_fetch_assoc($published_status_query)){
                            $typePublished = $rowpublished['Published_Inter'];
                            $datePublished = $rowpublished['date_published'];
                            $Volume = $rowpublished['Volume'];
                            $ISSUE = $rowpublished['Issue'];
                            $Page = $rowpublished['Page'];
                            $DataPublished ="ประเภทของงานตีพิมพ์ : " .$typePublished."<br>" . "วันที่ตีพิมพ์ : " .$datePublished."<br>" ."VOLUME : ".$Volume."<br>". "ISSUE : ".$ISSUE."<br>"
                            ."Page : ".$Page ;
            
                        }

                    }

                    //เงินทุนภายใน
                    if($funds_status == "1"){
                        $funds_in = "SELECT * FROM ((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
                        $funds_in .="INNER JOIN funds_in ON research.Re_ID = funds_in.Re_ID)";
                        
                        
                        $funds_in_query = mysqli_query($conn,$funds_in);
                        if (mysqli_num_rows($funds_in_query)>0){
                            $fund_in_sql = "SELECT * FROM ((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
                            $fund_in_sql .="INNER JOIN funds_in ON research.Re_ID = funds_in.Re_ID) WHERE research.Re_ID = '$Re_id'";
                            $fund_in_sql_query = mysqli_query($conn,$fund_in_sql);
                            while ($fund_in_sql_row = mysqli_fetch_assoc($fund_in_sql_query)){
                                $fund = $fund_in_sql_row['Name_Agency'];
                            }
                        }

                    }
                    //เงินทุนภายนอก
                    if($funds_status == "2"){
                        $funds_out = "SELECT * FROM ((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
                        $funds_out .="INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID)"; 
                        // $funds_out .="INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status)";
                        // echo $funds_out;                     
                        $funds_out_query = mysqli_query($conn,$funds_out);
                        if (mysqli_num_rows($funds_out_query)>0){
                            $fund_out_sql = "SELECT * FROM (((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
                            $fund_out_sql .="INNER JOIN funds_out ON research.Re_ID = funds_out.Re_ID)";
                            $fund_out_sql .= "INNER JOIN funds_out_status ON funds_out.Type_Funds_out = funds_out_status.Funds_out_Status) WHERE research.Re_ID = '$Re_id'";
                            $fund_out_sql_query = mysqli_query($conn,$fund_out_sql);
                            while ($fund_out_sql_row = mysqli_fetch_assoc($fund_out_sql_query)){
                                $fund = $fund_out_sql_row['Agency_name'];
                                $funds_out_type = $fund_out_sql_row['Funds_out'];
                            }
                            $string = '  ประเภท :   '. $funds_out_type ;

                        }}
                        //มีการตีพิมพ์
                        if($publish_status == 1){
                    $publish = "SELECT * FROM ((research INNER JOIN published_status ON research.Published_status = published_status.Published_status)";
                    $publish .= "INNER JOIN published ON research.Re_ID = published.Re_ID) WHERE research.Re_ID = '$Re_id'";
                    // echo $publish;
                    $publish_query = mysqli_query($conn,$publish);
                    if (mysqli_num_rows($publish_query)>0){
                        while ($publish1_row = mysqli_fetch_assoc($publish_query)){
                            $publish_1 = $publish1_row['Published'];
                            $non_publish1 = "ไม่มีผลงานตีพิมพ์";
                            
                        }
                    }}
                    
                    echo "<tr>";
                    echo "<form action='insertResearch.php' method='POST' >";
                    echo "<td>". $row['Name_leader'] ."</td>"
                    ."<td>".$row['NameRe_TH']."</td>"
                    ."<td>". $row['Time_period'] ."</td>"
                    ."<td>". $row['Bugget'] ."</td>"

                    ."<td><button  value='Edit_Research' type='Submit' class='but-Edit' name='but_Submit'>แก้ไขข้อมูล </button>
                    <button style='margin-left:10px;' value='Delete' class='but-Delete' onclick='return Con_Delete();' type='submit' name='but_Submit'>ลบข้อมูล</button></td>"
                    ."<td>".$row['Approve'] ."  ระยะเวลา :  ". $row['Time_period_approve'] ."</td>"
                    ."<td>". $funds_type; if ($funds_status == 2){echo "<br>".$string."<br>";}  echo "  จากหน่วยงาน :  ". $fund ."</td>";
                    echo "<td>". $row['NameRe_ENG'] ."</td>";
                    if($StatusStake == '1'){

                        echo "<td>". $membername . "<input type='text'  name='Re_id_Delete' value='$Re_id' style='display: none;'>" ."</td>";
                    }
                    elseif($StatusStake == '2'){
                        echo "<td>". $StringNonStake ."</td>";
                    }
                    echo"<td>". $row['Type_research'] ."</td>"
                    
                    ."<td>"; if($publish_status == 1){echo $publish_1."<br>" .$DataPublished;} 
                    if($publish_status == 2){echo $non_publish1;} echo " </td>";
                    
                    echo "</form>";
                    echo "</tr>";
                }
                ?>
            <!-- </tr> -->
        </tbody>
    </table>
    </div>
    

</body>
    

    
</html>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
    // $('#vbvb').
    
} );
function Con_Delete(){
    return confirm('คุณต้องการลบงานวิจัยใช่ไหม ?');
    
}
</script>


