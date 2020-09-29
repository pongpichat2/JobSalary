<?php
require("connect.php");
session_start();
$Re_id = $_REQUEST['Re_ID'];


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
    body{
        height: 100vh;
        margin: 0;
        background-size: cover;
        background-position: center;
        background: #9b2c2c;
    }
    .FormAddRe{
        margin-top: 30px;
        width: 1000px;
        background: none;
        border: 2px solid black;
        border-radius: 15px;
        margin-left: 20%;
        box-shadow: 0 0 15px black;
        font-family: 'Sarabun', sans-serif;
    }
    .FormAddRe .Leader_Name{
        font-family: 'Sarabun', sans-serif;
        margin-left: 5px;
        height: 30px;
        border: 1.5px solid black;
        border-radius: 10px;
        transition: 0.5s;
    }
    .FormAddRe .Leader_Name:focus{
        box-shadow: 0 0 0 4px rgba(105, 177, 230, 0.81);
    }
    .FormAddRe .Member_Re{
        font-family: 'Sarabun', sans-serif;
        margin-left: 5px;
        height: 20px;
        border: 1.5px solid black;
        border-radius: 10px;
        transition: 0.5s;
    }
    .FormAddRe .Member_Re:focus{
        box-shadow: 0 0 0 4px rgba(105, 177, 230, 0.81);
    }
    .FormAddRe .Re_Name{
        font-family: 'Sarabun', sans-serif;
        margin-left: 5px;
        height: 25px;
        border: 1.5px solid black;
        border-radius: 10px;
        transition: 0.5s;
    }
    .FormAddRe .Re_Name:focus{
        box-shadow: 0 0 0 4px rgba(105, 177, 230, 0.81);
    }
    .FormAddRe .Other{
        font-family: 'Sarabun', sans-serif;
        margin-left: 5px;
        height: 25px;
        border: 1.5px solid black;
        border-radius: 10px;
        transition: 0.5s;
    }
    .FormAddRe .Other:focus{
        box-shadow: 0 0 0 4px rgba(105, 177, 230, 0.81);
    }
    .FormAddRe .Date-time-approve{
        font-family: 'Sarabun', sans-serif;
        margin-left: 5px;
        height: 25px;
        width: 150px;
        border: 1.5px solid black;
        border-radius: 10px;
        transition: 0.5s;

    }
    .FormAddRe .Date-time-approve:focus{
        box-shadow: 0 0 0 4px rgba(105, 177, 230, 0.81);
    }
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
    select{
        height: 30px;
        transition: 0.4s;
        font-family: 'Sarabun', sans-serif;
    }
    select:focus{
        background: rgba(151, 57, 57, 0.7);
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
    height: 30px;
    font-size: 16px;
    padding: 5px 5px;
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
    <?php
    //leader_name and status_stake
    $leader_sql = "SELECT * FROM research WHERE Re_ID = '$Re_id'";
    // echo $leader_sql;
    $leader_query = mysqli_query($conn,$leader_sql);
    if(mysqli_num_rows($leader_query)==1){
        $row_research = mysqli_fetch_assoc($leader_query);
        $leader_name = $row_research['Name_leader'];
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
    <div class="FormAddRe" style="background: white;">
    <div style="margin-left: 30px;">
    <form action="insertResearch.php" method="POST">
        <p style="font-weight: bold;">ชื่อหัวหน้าโครงงาน <input type="text" class="Leader_Name" name="Leader_Re" value="<?php echo $leader_name;?>" placeholder="หัวหน้าโครงงาน"></p>

        <div>
        <p style="font-weight: bold;"><input type="checkbox" class="checkbox" name="TypeMember_Re"  id="AddMember_Re" value="1" <?php if($type_stakeholder==1){echo 'checked';} ?>> มีผู้ร่วมวิจัย
            <input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re2"  value="2" <?php if($type_stakeholder==2){echo 'checked';}?> > ไม่มีผู้ร่วมวิจัย</p>

            
                <p id="ShowAddMember_Re" style="display:none" >
                <?php if(mysqli_num_rows($member_query)==0){
                    echo "<input type='text' class='Member_Re' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ 1'>";
                    echo "<input type='text' class='Member_Re' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ 2'>";
                    echo "<input type='text' class='Member_Re' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ 3'>";
                        
                }
                elseif(mysqli_num_rows($member_query)==1){
                    while ($member_row = mysqli_fetch_assoc($member_query)){
                        $member_name = $member_row['MemberName'];
                        $member_no = $member_row['NO'];
                        echo "<input type='text' class='Member_Re' name='Member[]' value='$member_name'>";
                        echo "<input type='text'  name='no[]' value='$member_no' style='display: none;'>";
                        }
                    echo "<input type='text' class='Member_Re' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ 2'>";
                    echo "<input type='text' class='Member_Re' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ 3'>";
                }
                elseif(mysqli_num_rows($member_query)==2){
                    while ($member_row = mysqli_fetch_assoc($member_query)){
                        $member_name = $member_row['MemberName'];
                        $member_no = $member_row['NO'];
                        echo "<input type='text' class='Member_Re' name='Member[]' value='$member_name'>";
                        echo "<input type='text' name='no[]' value='$member_no' style='display: none;'>";
                        }

                    echo "<input type='text' class='Member_Re' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ 3'>";
                }
                elseif(mysqli_num_rows($member_query)>2){
                    while ($member_row = mysqli_fetch_assoc($member_query)){
                        $member_name = $member_row['MemberName'];
                        $member_no = $member_row['NO'];
                        echo "<input type='text' class='Member_Re' name='Member[]' value='$member_name'>";
                        echo "<input type='text' name='no[]' value='$member_no' style='display: none;'>";
                        }
                }
                
                 ?>
                </p>

        </div>
        
        <div style="font-weight: bold;">
        
        <p > ชื่อโครงงาน : ภาษาไทย <input type="text" class="Re_Name" placeholder="TH" id="" value="<?php echo $NameRe_TH;?>" name="NameRe_TH">
                         ภาษาอังกฤษ <input type="text" class="Re_Name" placeholder="EN" name="NameRe_Eng" id="" value="<?php echo $NameRe_ENG;?>">
            <p style="font-weight: bold;"> ประเภทงานวิจัย : <Select id="Type_Re"  name ="Type_Re" onchange="yesCheck(this);">
                <option value="การฝึกอบรม/สัมนา/อภิปรายและบรรยาย" <?php if($Type_research == "การฝึกอบรม/สัมนา/อภิปรายและบรรยาย"){echo "selected";} ?>>การฝึกอบรม/สัมนา/อภิปรายและบรรยาย</option>
                <option value="การค้นคว้า/สำรวจ/วิเคราะห์/ทดสอบและตรวจสอบ" <?php if($Type_research == "การค้นคว้า/สำรวจ/วิเคราะห์/ทดสอบและตรวจสอบ"){echo "selected";} ?>>การค้นคว้า/สำรวจ/วิเคราะห์/ทดสอบและตรวจสอบ</option>
                <option value="การให้คำปรึกษาทางวิชาการและวิชาชีพ" <?php if($Type_research == "การให้คำปรึกษาทางวิชาการและวิชาชีพ"){echo "selected";} ?>>การให้คำปรึกษาทางวิชาการและวิชาชีพ</option>
                <option value="การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน"<?php if($Type_research == "การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน"){echo "selected";} ?>>การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน</option>
                <option value="การให้บริการทางด้านเทคโนโลยีการศึกษา"<?php if($Type_research == "การให้บริการทางด้านเทคโนโลยีการศึกษา"){echo "selected";} ?>>การให้บริการทางด้านเทคโนโลยีการศึกษา</option>
                <option value="การให้บริการวิจัย" <?php if($Type_research == "การให้บริการวิจัย"){echo "selected";} ?>>การให้บริการวิจัย</option>
                <option value="การวางระบบ/ออกแบบและประดิษฐ์"<?php if($Type_research == "การวางระบบ/ออกแบบและประดิษฐ์"){echo "selected";} ?>>การวางระบบ/ออกแบบและประดิษฐ์</option>
                <option value="การเขียนทางวิชาการและงานแปล"<?php if($Type_research == "การเขียนทางวิชาการและงานแปล"){echo "selected";} ?>>การเขียนทางวิชาการและงานแปล</option>
                <option value="การให้บริการสารสนเทศ"<?php if($Type_research == "การให้บริการสารสนเทศ"){echo "selected";} ?>>การให้บริการสารสนเทศ</option>
                <option value="Other"<?php if($Type_research != "Other" && $Type_research != "การฝึกอบรม/สัมนา/อภิปรายและบรรยาย" && $Type_research != "การค้นคว้า/สำรวจ/วิเคราะห์/ทดสอบและตรวจสอบ" 
                && $Type_research != "การให้คำปรึกษาทางวิชาการและวิชาชีพ" && $Type_research != "การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน" && $Type_research != "การให้บริการทางด้านเทคโนโลยีการศึกษา" 
                && $Type_research != "การให้บริการวิจัย" && $Type_research != "การวางระบบ/ออกแบบและประดิษฐ์" && $Type_research != "การเขียนทางวิชาการและงานแปล" && $Type_research != "การให้บริการสารสนเทศ"){echo "selected";} ?>>อื่น ๆ (ระบุ)</option>
                
            </Select>
            <p id= "TypeRe_Other" style="display: none;"> 
            <input type="text" class="Other" name="Type_Re_Other" id=""<?php if($Type_research != "Other" && $Type_research != "การฝึกอบรม/สัมนา/อภิปรายและบรรยาย" && $Type_research != "การค้นคว้า/สำรวจ/วิเคราะห์/ทดสอบและตรวจสอบ" 
                && $Type_research != "การให้คำปรึกษาทางวิชาการและวิชาชีพ" && $Type_research != "การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน" && $Type_research != "การให้บริการทางด้านเทคโนโลยีการศึกษา" 
                && $Type_research != "การให้บริการวิจัย" && $Type_research != "การวางระบบ/ออกแบบและประดิษฐ์" && $Type_research != "การเขียนทางวิชาการและงานแปล" 
                && $Type_research != "การให้บริการสารสนเทศ"){echo "value='$Type_research'";}else {echo "placeholder='โปรดกรอกข้อมูล' ";}?>></p>
            </p>
        </div></p>
  
        <!-- start แหล่งเงินทุน -->
        <div style="width: 95%;">
        <fieldset class="fieldset">
            <legend> <p style="font-weight: bold;">แหล่งเงินทุน</p></legend>
            <p style="font-weight: bold;"><input type="checkbox" class="checkbox1" name="FundsType" id="Capital_Sidein" <?php if($fun_Status == '1'){echo 'checked';} ?> value="1">แหล่งทุนภายใน
            <div id="ShowCapital_in"  style="display: none;"> <input type="text" class="Other" name="Agency_Sidein_Name"  id="" value="<?php  if($fun_Status == '1'){echo $Funin_Agency;} ?>" placeholder="โปรดกรอกข้อมูล"></div>
            </p>
            <p style="font-weight: bold;">
            <input type="checkbox" class="checkbox1" name="FundsType" class="Other" id="Capital_Sideout"  <?php if($fun_Status == '2'){echo 'checked';} ?> value="2">แหล่งทุนภายนอก</p>
            <div id="ShowCapital_out" style="display: none;">

                <div>
                    <input type="checkbox" class="checkbox2" name="Type_funds_out" id="Cap_Reseach"<?php if($fun_Status == '2'){if($type_Funout == '1'){echo 'checked' ;}}?> value = "1"> งานวิจัย
                    <div id="ShowDetil_TypeRe" style="display: none; ">
                    <select name="Agency_out" id="Agency_out" onchange="CheckCap_Out(this);">
                    <option value="แผ่นดิน" <?php if($fun_Status == '2'){if($Funout_Agency == 'แผ่นดิน'){echo 'selected';}} ?>>แผ่นดิน</option>
                    <option value="รายได้" <?php if($fun_Status == '2'){if($Funout_Agency == 'รายได้'){echo 'selected';}} ?>>รายได้</option>
                    <option value="รายได้คณะ" <?php if($fun_Status == '2'){if($Funout_Agency == 'รายได้คณะ'){echo 'selected';}} ?>>รายได้คณะ</option>
                    <option value="สวทช." <?php if($fun_Status == '2'){if($Funout_Agency == 'สวทช.'){echo 'selected';}}?>>สวทช.</option>
                    <option value="สกสว." <?php if($fun_Status == '2'){if($Funout_Agency == 'สกสว.'){echo 'selected';}} ?>>สกสว.</option>
                    <option value="วช." <?php if($fun_Status == '2'){if($Funout_Agency == 'วช.'){echo 'selected';}} ?>>วช.</option>
                    <option value="อว." <?php if($fun_Status == '2'){if($Funout_Agency == 'อว.'){echo 'selected';}} ?>>อว.</option>
                    <option value="อวน." <?php if($fun_Status == '2'){if($Funout_Agency == 'อวน.'){echo 'selected';}} ?>>อวน.</option>
                    <option value="Other"<?php if($fun_Status == '2'){if($Funout_Agency != 'อวน.' && $Funout_Agency != 'อว.' && $Funout_Agency != 'วช.' && $Funout_Agency != 'สกสว.' && $Funout_Agency != 'สวทช.' && $Funout_Agency != 'รายได้คณะ' && 
                    $Funout_Agency != 'รายได้' && $Funout_Agency != 'แผ่นดิน' && $Funout_Agency != 'Other' ){echo "selected";}} ?> >อื่น ๆ </option>
                    </select>
                    <p id= "Re_CapOut" style="display: none;"> <input type="text" name="Agency_out_other" id="" value="<?php if($fun_Status == '2'){if($type_Funout == '1'){echo $Funout_Agency;}}?>" placeholder="โปรดระบุ" ></p>
                    </div>
                </div>
                <div>
                <input type="checkbox" class="checkbox2" name="Type_funds_out" id="BoxService_Aca" <?php if($fun_Status == '2'){if($type_Funout == '2'){echo 'checked' ;}}?>  value="2"> บริการวิชาการ
                    <p id= "ShowService_Aca" style="display: none;"> <input type="text" name="Agency_out_service" id="" class="Other" placeholder="โปรดระบุ" value="<?php if($fun_Status == '2'){if($type_Funout == '2'){echo $Funout_Agency ;}}?>" ></p>
                </div>

            </div>
            </p>
                
        </fieldset>
        </div>
        <!-- Stop แหล่งเงินทุน -->
        <br>
        <div style="font-weight: bold;"> งบประมาณ : <input type="text" class="Other" name="Bugget" value="<?php echo $Bugget_Re;?>"> /บาท </div><br>

        <div style="font-weight: bold;">ระยะเวลาในการดำเนิน :
            <input type="text" name="datefilter" class="Date-time-approve" value="<?php echo $Time_Re;?>" >

        </div><br>

        <div style="font-weight: bold;">
            ขอนุมัติดำเนินโครงการ : <select name="approve_Type" id="">
            <option value="1" <?php if($type_approve == '1'){echo 'selected';}?>>เสนอโครงการ</option>
            <option value="2" <?php if($type_approve == '2'){echo 'selected';}?>>เซ็นสัญญา</option>
            <option value="3" <?php if($type_approve == '3'){echo 'selected';}?>>ขออนุมัติดำเนินโครงการ</option>
            <option value="4" <?php if($type_approve == '4'){echo 'selected';}?>>ขออนุมัติเบิกเงิน(รอบ1)</option>
            <option value="5" <?php if($type_approve == '5'){echo 'selected';}?>>ขออนุมัติเบิกเงิน(รอบ2)</option>
            <option value="6" <?php if($type_approve == '6'){echo 'selected';}?>>ขออนุมัติเบิกเงิน(รอบ3)</option>
            <option value="7" <?php if($type_approve == '7'){echo 'selected';}?>>ขออนุมัติขยายเวลา</option>
            <option value="8" <?php if($type_approve == '8'){echo 'selected';}?>>สิ้นสุดโครงการ</option>
            </select>
        <br><br>
            <div style="font-weight: bold;">ระยะเวลาขอนุมัติ :
                <input type="text" class="Date-time-approve" name="Time_period" value="<?php echo $Time_approve?>" >
            </div>
        </div>

        <div>
            <input type="checkbox" class="checkbox3" name="Published" id="Working" value="1" <?php if($Published_Status == '1'){echo 'checked';}?>>มีผลงานตีพิมพ์
            <input type="checkbox" class="checkbox3" name="Published" id="Working2"  value="2"  <?php if($Published_Status == '2'){echo 'checked';}?>>ไม่มีผลงานตีพิมพ์

            <div id="ShowWorking" style="display: none; width:95%;" >
                <fieldset><legend><p>ผลงานตีพิมพ์</p></legend>
                <p style="font-weight: bold;"> ประเภทของงานตีพิมพ์ :
                    <input type="checkbox" class="checkbox4" name="type_Published_inter" id="Inter" value="1" <?php if($Published_Status == '1'){if($type_Published_inter == '1'){echo 'checked';}}?>> วารสารระดับชาติ
                    <input type="checkbox" class="checkbox4" name="type_Published_inter" id="Inter2" value="2" <?php if($Published_Status == '1'){if($type_Published_inter == '2'){echo 'checked';}}?>> วารสารระดับนานาชาติ <br>

                <p style="font-weight: bold;">
                ว/ด/ป ที่เผยแพร่ : <input type="text" class="Date-time-approve" name="DateDocument" value="<?php if($Published_Status == '1'){echo $date_Published;}?>"  >
                </p>
                <div style="font-weight: bold;">
                    Volome : <input type="text" class="Other" placeholder="No." name="Volome" value="<?php if($Published_Status == '1'){echo $Volume;}?>">
                    No. ISSUE : <input type="text" class="Other" placeholder="No. ISSUE" name="ISSUE" value="<?php if($Published_Status == '1'){echo $Issue;}?>"> 
                    หน้าที่พิมพ์ :  <input type="text" class="Other" name="Page_Published" placeholder="หน้าที่พิมพ์" value="<?php if($Published_Status == '1'){echo $Page;}?>">
                </div>
                </p>
                </fieldset>
            </div>
        </div>

        <input type="text" name="Re_id_Edit" value="<?php echo $Re_id;?>" style="display: none;">
        <div style="text-align: center; height: 70px; margin-top:20px;">
        <button type="submit" class="Btu-Sub" value="Update" name="but_Submit">Save</button>
        </div>
    </form>
    </div>
    </div>
    



    

    
</body>
<script>
        // checkbox code ผุ้ร่วมวิจัย 
        $('.checkbox').click(function(){
            $('.checkbox').each(function(){
                $(this).prop('checked', false); 
            }); 
            $(this).prop('checked', true);
        });
        $('.checkbox1').click(function(){
            $('.checkbox1').each(function(){
                $(this).prop('checked', false); 
            }); 
            $(this).prop('checked', true);
        });
        $('.checkbox2').click(function(){
            $('.checkbox2').each(function(){
                $(this).prop('checked', false); 
            }); 
            $(this).prop('checked', true);
        });
        $('.checkbox3').click(function(){
            $('.checkbox3').each(function(){
                $(this).prop('checked', false); 
            }); 
            $(this).prop('checked', true);
        });
        $('.checkbox4').click(function(){
            $('.checkbox4').each(function(){
                $(this).prop('checked', false); 
            }); 
            $(this).prop('checked', true);
        });

    $(function () {
        $("#AddMember_Re").click(function () {
            if ($(AddMember_Re).is(":checked")) { 
                $("#ShowAddMember_Re").show();

            } else {
                $("#ShowAddMember_Re").hide();
            }
        });
        $("#AddMember_Re").ready(function () {
            if ($(AddMember_Re).is(":checked")) {
                $("#ShowAddMember_Re").show();
            } else {
                $("#ShowAddMember_Re").hide();
            }
        });
        $("#AddMember_Re2").click(function () {
            console.log("vbvb1");
                  if ($(this).is(":checked")) {
                      $("#ShowAddMember_Re").hide();
                  } else {
                      $("#ShowAddMember_Re").hide();
                  }
        });
        $("#AddMember_Re2").ready(function () {
                  if ($(AddMember_Re2).is(":checked")) {
                      console.log("vbvb");
                      $("#ShowAddMember_Re").hide();
                  }//if($(AddMember_Re2).is(":checked")) {
                //       $("#ShowAddMember_Re").hide();
                //       console.log("vbvb111");
                //    } //else {
                //       $("#ShowAddMember_Re").hide();
                //       console.log("vbvb111");
                //   }
        }); 
        $("#Type_Re").ready(function () {

            if ((Type_Re.value) == "Other") {
                $("#TypeRe_Other").show();
            } else {
                $("#TypeRe_Other").hide();
            }
        });   
    });

    //checkbox code ผลงานตีพิมพ์
    $(function () {
    $("#Working").click(function () {
            if ($(this).is(":checked")) {
                $("#ShowWorking").show();
            } else {
                $("#ShowWorking").hide();
            }
        });
        $("#Working").ready(function () {
            if ($(Working).is(":checked")) {
                $("#ShowWorking").show();
            } else {
                $("#ShowWorking").hide();
            }
        });
        $("#Working2").click(function () {
                  if ($(this).is(":checked")) {
                      $("#ShowWorking").hide();
                  } else {
                      $("#ShowWorking").hide();
                  }
        });
    });

    //checkbox code แหล่งทุนภายในและแหล่งทุนภายนอก
    $(function () {
    $("#Capital_Sidein").click(function () {
            if ($(this).is(":checked")) {
                $("#ShowCapital_in").show();
                $("#ShowCapital_out").hide();
            } else {
                $("#ShowCapital_in").hide();
            }
        });
        $("#Capital_Sidein").ready(function () {
            if ($(Capital_Sidein).is(":checked")) {
                console.log('แหล่งเงินทุนภายใน')
                $("#ShowCapital_in").show();
            } else {
                $("#ShowCapital_in").hide();
            }
        });
        $("#Capital_Sideout").ready(function () {
            if ($(Capital_Sideout).is(":checked")) {

                $("#ShowCapital_out").show();
            } else {
                $("#ShowCapital_out").hide();
            }
        });
        $("#Capital_Sideout").click(function () {
                  if ($(this).is(":checked")) {
                    $("#ShowCapital_out").show();
                      $("#ShowCapital_in").hide();
                  } else {
                      $("#ShowCapital_out").hide();
                      
                  }
        });
    });
        //checkbox code งานวิจัยและบริการวิชาการ
    $(function () {
    $("#Cap_Reseach").click(function () {
            if ($(this).is(":checked")) {
                $("#ShowDetil_TypeRe").show();
                $("#ShowService_Aca").hide();
            } else {
                $("#ShowDetil_TypeRe").hide();
            }
        });
    $("#Cap_Reseach").ready(function () {
            if ($(Cap_Reseach).is(":checked")) {

                $("#ShowDetil_TypeRe").show();
            } else {
                $("#ShowDetil_TypeRe").hide();
            }
        });

    $("#Agency_out").ready(function () {
    if ((Agency_out.value) == "Other") {

            $("#Re_CapOut").show();
        } else {
            $("#Re_CapOut").hide();
        }
        });   
    $("#BoxService_Aca").click(function () {
                  if ($(this).is(":checked")) {
                      $("#ShowDetil_TypeRe").hide();
                      $("#ShowService_Aca").show();
                  } else {
                      $("#ShowDetil_TypeRe").hide();
                      
                  }
        });
        $("#BoxService_Aca").ready(function () {
            if ($(BoxService_Aca).is(":checked")) {

                $("#ShowService_Aca").show();
            } else {
                $("#ShowService_Aca").hide();
            }
        });
    });

        function yesCheck(SelectOther) {
            var ShowOther = document.getElementById("TypeRe_Other");

            if (SelectOther.value == "Other") {
                ShowOther.style.display = "block";
            } else {
                ShowOther.style.display = "none";
            }
        }
        function CheckCap_Out(Other_Capout) {
            var ShowOther = document.getElementById("Re_CapOut");

            if (Other_Capout.value == "Other") {
                ShowOther.style.display = "block";
            } else {
                ShowOther.style.display = "none";
            }
        }
        $(function() {

            $('input[name="datefilter"]').daterangepicker({
                
                autoUpdateInput: false,
                locale: {
                    "format": "DD/MM/YYYY"
                }
            });

            $('input[name="datefilter"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + '-' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('input[name="datefilter"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });
        $(function() {

            $('input[name="Time_period"]').daterangepicker({
                
                autoUpdateInput: false,
                locale: {
                    "format": "DD/MM/YYYY"
                }
            });

            $('input[name="Time_period"]').on('apply.daterangepicker', function(ev, picker) {
                $(this).val(picker.startDate.format('DD/MM/YYYY') + '-' + picker.endDate.format('DD/MM/YYYY'));
            });

            $('input[name="Time_period"]').on('cancel.daterangepicker', function(ev, picker) {
                $(this).val('');
            });

        });

        $(function() {
            $('input[name="DateDocument"]').daterangepicker({
                // autoUpdateInput: false,
                singleDatePicker: true,
                showDropdowns: true,
                minYear: 1900,
                locale: {
                    "format": "DD/MM/YYYY"
                }
                
            });
            
        });
        
</script>


</html>