<?php
require("connect.php");
session_start();
$Re_id = $_REQUEST['Re_id'];
if(isset($_SESSION['emailAdmin'])) {
    header("Location:edit.php");
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- calendar -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@300&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<style>
.FormAddRe .Btu-Sub{

font-family: 'Sarabun', sans-serif;
font-size: 20px;
font-weight: bold;
width: 70px;
height: 40px;
background: white;
border: 2px solid black;
transition: 0.5s;
}
.FormAddRe .Btu-Sub:hover{
border-radius: 10px;
background: rgba(105, 177, 230, 0.81);
box-shadow: 1px 1px 0 black;
}
    .title {
        text-align: center;
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .container {
    width: 70%;
    background: white ;
    border: 2px solid;
    box-shadow: 0 0 15px black;
    border-radius: 25px;
    margin-top: 40px;
    margin-left: 15%;
    /* margin-right: 20%;  */
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
    <?php
    //leader_name and status_stake
    $leader_sql = "SELECT * FROM research INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader WHERE Re_ID = '$Re_id'";
    // echo $leader_sql;
    $leader_query = mysqli_query($conn,$leader_sql);
    if(mysqli_num_rows($leader_query)==1){
        $row_research = mysqli_fetch_assoc($leader_query);
        $leader_name = $row_research['Name_Leader'];
        $type_stakeholder = $row_research['Status_stake'];
        $NameRe_TH = $row_research['NameRe_TH'];
        $NameRe_ENG = $row_research['NameRe_ENG'];
        $Type_research = $row_research['Type_research'];
        $fun_Status = $row_research['Funds_status'];
        $Bugget_Re = $row_research['Bugget'];
        $Time_Re = $row_research['Time_period'];
        $type_approve = $row_research['Approve_status'];
        $Time_approve = $row_research['Time_period_approve'];
        $Published_Status = $row_research['Published_status'];


        // echo $fun_Status;
    }
    // 
    $member_sql = "SELECT * FROM (((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
    $member_sql .="INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID)";
    $member_sql .= "INNER JOIN re_member ON re_member.Re_ID = research.Re_ID)WHERE research.Re_ID = '$Re_id'";
    // echo $member_sql;
    $member_query = mysqli_query($conn,$member_sql);


    $Check_Funin_sql = "SELECT * FROM research INNER JOIN funds_in ON research.Re_id = funds_in.Re_id WHERE research.Re_ID = '$Re_id'";
    $Funin_query = mysqli_query($conn,$Check_Funin_sql);
    if(mysqli_num_rows($Funin_query)==1){
        $row_Funin = mysqli_fetch_assoc($Funin_query);
        $Funin_Agency = $row_Funin['Name_Agency'];

    }
    $Check_Funout_sql = "SELECT * FROM research INNER JOIN funds_out ON research.Re_id = funds_out.Re_id WHERE research.Re_ID = '$Re_id'";
    $Funout_query = mysqli_query($conn,$Check_Funout_sql);
    if(mysqli_num_rows($Funout_query)==1){
        $row_Funout = mysqli_fetch_assoc($Funout_query);
        $type_Funout = $row_Funout['Type_Funds_out'];
        $Funout_Agency = $row_Funout['Agency_name'];
    }


    $Check_Published_sql = "SELECT * FROM research INNER JOIN published ON research.Re_id = published.Re_id WHERE research.Re_ID = '$Re_id'";
    $Published_query = mysqli_query($conn,$Check_Published_sql);
    if(mysqli_num_rows($Published_query)==1){
        $row_Published = mysqli_fetch_assoc($Published_query);
        $type_Published_inter = $row_Published['TypePublished'];
        $date_Published = $row_Published['date_published'];
        $Volume = $row_Published['Volume'];
        $Issue = $row_Published['Issue'];
        $Page = $row_Published['Page'];


    }

    ?>
    <div class="container">
    <div class="FormAddRe" style="background: white;">
    <div style="margin-left: 30px;">
    <form action="insertResearch.php" method="POST">
        <p style="font-weight: bold;">ชื่อหัวหน้าโครงงาน
        <label for="">: <?php echo $leader_name;?></label></p>
        <!-- <input type="text" class="Leader_Name" name="Leader_Re" value="<?php //echo $leader_name;?>" placeholder="หัวหน้าโครงงาน"> -->

        <div>
        <!-- <p style="font-weight: bold;"><input type="checkbox" class="checkbox" name="TypeMember_Re"  id="AddMember_Re" value="1" <?php //if($type_stakeholder==1){echo 'checked';} ?>> มีผู้ร่วมวิจัย
            <input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re2"  value="2" <?php //if($type_stakeholder==2){echo 'checked';}?> > ไม่มีผู้ร่วมวิจัย</p> -->
            <p style="font-weight: bold;"><label for=""><?php if($type_stakeholder==1){echo 'มีผู้ร่วมวิจัย';} if($type_stakeholder==2){echo 'ไม่มีผู้ร่วมวิจัย';} ?></label></p>
                <?php if(mysqli_num_rows($member_query)>0){
                    $count_mem = 1;
                    while($member = mysqli_fetch_assoc($member_query)){
                            // echo $member['MemberName'];
                        echo "<label for=''>". $count_mem . ":  " . $member ['MemberName'] ."   </label>";
                        $count_mem++;
                    }       
                }
                 ?>
        </div>
        
        <div style="font-weight: bold;">
        <p > ชื่อโครงงาน ภาษาไทย 
        <?php
        echo "<label for=''>:  ". $NameRe_TH ."</label><br><br>";
        
        echo "ชื่อโครงงาน ภาษาอังกฤษ <label for=''>:  ". $NameRe_ENG ."</label>"; 
        ?>
            <p style="font-weight: bold;"> ประเภทงานวิจัย : <?php echo $Type_research;?>
            </p>
        </div></p>
  
        <!-- start แหล่งเงินทุน -->
        <div style="width: 95%;">
        <fieldset class="fieldset">
            <legend> <p style="font-weight: bold;">แหล่งเงินทุน</p></legend>
            <p style="font-weight: bold;"><?php if($fun_Status == '1'){echo 'แหล่งทุนภายใน';echo " :  "; echo $Funin_Agency; } ?></p>
            <p style="font-weight: bold;"><?php if($fun_Status == '2'){
                echo 'แหล่งทุนภายนอก  ';  
                echo 'ประเภท :  ';
                if($type_Funout == "1"){echo "งานวิจัย";}
                else{echo "บริการวิชาการ";
                    echo "<br>";
                    echo "<br>";
                    echo "จากหน่วยงาน :  ".$Funout_Agency;
                } 
                
            } ?>
                
        </fieldset>
        </div>
        <!-- Stop แหล่งเงินทุน -->
        <br>
        <div style="font-weight: bold;"><?php echo "งบประมาณ  :   ".$Bugget_Re;?> บาท</div><br>

        <div style="font-weight: bold;">ระยะเวลาในการดำเนิน : <?php echo $Time_Re;?>

        </div><br>

        <div style="font-weight: bold;">
            สถานะโครงการ : 
            <?php
            if($type_approve == '1'){
                echo "เสนอโครงการ";
            }
            if($type_approve == '2'){
                echo "เซ็นสัญญา";
            }
            if($type_approve == '3'){
                echo "ขออนุมัติดำเนินโครงการ";
            }
            if($type_approve == '4'){
                echo "ขออนุมัติเบิกเงิน(รอบ1)";
            }
            if($type_approve == '5'){
                echo "ขออนุมัติเบิกเงิน(รอบ2)";
            }
            if($type_approve == '6'){
                echo "ขออนุมัติเบิกเงิน(รอบ3)";
            }
            if($type_approve == '7'){
                echo "ขออนุมัติขยายเวลา";
            }
            if($type_approve == '8'){
                echo "สิ้นสุดโครงการ";
            }
            ?>
        <br><br>
            <div style="font-weight: bold;">ระยะเวลาขอนุมัติ :
                <?php echo $Time_approve?>
            </div>
        </div>
            <br>
        <div>            
            <?php
            if($Published_Status == '1'){
                echo '<p style="font-weight: bold;">มีผลงานตีพิมพ์</p>';
            
            ?>
                <fieldset><legend><p>ผลงานตีพิมพ์</p></legend>
                <p style="font-weight: bold;"> ประเภทของงานตีพิมพ์ :
                    <?php if($Published_Status == '1'){if($type_Published_inter == '1'){echo 'วารสารระดับชาติ';}}?>
                    <?php if($Published_Status == '1'){if($type_Published_inter == '2'){echo ' วารสารระดับนานาชาติ';}}?> <br>

                <p style="font-weight: bold;">
                ว/ด/ป ที่เผยแพร่ : <?php if($Published_Status == '1'){echo $date_Published;}?>
                </p>
                <div style="font-weight: bold;">
                    Volome : <?php if($Published_Status == '1'){echo $Volume;}?>
                    No. ISSUE : <?php if($Published_Status == '1'){echo $Issue;}?>
                    หน้าที่พิมพ์ :  <?php if($Published_Status == '1'){echo $Page;}?>
                </div>
                </p>
                </fieldset>
            <?php 
            }
            if($Published_Status == '2'){echo '<p style="font-weight: bold;">ไม่มีผลงานตีพิมพ์</p>';}
             ?>
        </div>

        <input type="text" name="Re_id_Edit" value="<?php echo $Re_id;?>" style="display: none;">
        <div style="text-align: center; height: 70px; margin-top:20px;">
        <button type="submit" class="Btu-Sub" value="back" name="but_Submit">Back</button>
        </div>
    </form>
    </div>
    </div>
    </div>
    



    

    
</body>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
// //สำหรับ show dropdown
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


</html>