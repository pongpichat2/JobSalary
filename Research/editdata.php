<?php
require("connect.php");
session_start();
$Re_id = $_REQUEST['Re_ID'];
// $vbvb = $_SESSION['emailAdmin'];
// echo $vbvb;
if(!isset($_SESSION['emailAdmin'])) {
    header("Location:show.php");
}

// if($_SESSION['refresh']==1){
//     $_SESSION['refresh'] = 0;
//     header("location:detail.php");
// }



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
    <script src="js/editdata1.js"></script>
    <link rel="stylesheet" href="css/editdata.css">

  
    <title>Document</title>
</head>

<body>
    <nav>
        <ul class="menu">
            <li class="logo"><a href="edit.php">Eng Up</a></li>
            <li class="item button secondary"><a href="AddResearch.php">เพิ่มข้อมูล</a></li>
            <li class="item button secondary"><a href="edit.php">วิจัย</a></li>
            <li class="item button secondary"><a href="Bugfaculty.php">รายได้คณะ</a></li>
            <p style="color: white;"><?php echo $_SESSION['emailAdmin']; ?></p>
            <li class="item button secondary"><a href="logout.php">Log out</a></li>
        </ul>
        
    </nav>
    <?php
    //leader_name and status_stake
    $leader_sql = "SELECT * FROM research INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID WHERE Re_ID = '$Re_id'";
    
    $leader_query = mysqli_query($conn,$leader_sql);
    if(mysqli_num_rows($leader_query)==1){
        $row_research = mysqli_fetch_assoc($leader_query);
        $ID_Leader = $row_research['ID_Leader'];
        $leader_name = $row_research['Name_Leader'];
        $type_stakeholder = $row_research['Status_stake'];
        $NameRe_TH = $row_research['NameRe_TH'];
        $NameRe_ENG = $row_research['NameRe_ENG'];
        $Type_research = $row_research['Type_research'];
        $fun_Status = $row_research['Funds_status'];
        $Bugget_Re = $row_research['Bugget'];
        $Time_Re = $row_research['Time_period'];
        $approve = $row_research['Approve'];
        $Time_approve = $row_research['Time_period_approve'];
        $Published_Status = $row_research['Published_status'];
        $cost1 = $row_research['cost1'];
        $cost2 = $row_research['cost2'];
        $cost3 = $row_research['cost3'];
        $cost4 = $row_research['cost4'];
        $Port = $row_research['Port'];
        $type_vat = $row_research['ID_vat'];
        $type_vat_faculty = $row_research['ID_faculty'];



        // echo $ID_Leader;
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
        <p style="font-weight: bold;">ชื่อหัวหน้าโครงงาน : 
        <select name="Leader_Re" class="Leader_Research" id="">
                <option <?php if($ID_Leader == '1'){ echo 'selected'; }?> value="1">ผศ.ดร. วสันต์ คำสนาม</option>
                <option <?php if($ID_Leader == '2'){ echo 'selected'; }?> value="2">ผศ.ดร. สุทธินันท์ ศรีรัตยาวงค์</option>
                <option <?php if($ID_Leader == '3'){ echo 'selected'; }?> value="3">ผศ.ดร. นพรัตน์ เกตุขาว</option>
                <option <?php if($ID_Leader == '4'){ echo 'selected'; }?> value="4">ผศ.ดร. ปุริมพัฒน์ สัทธรรมนุวงศ์</option>
                <option <?php if($ID_Leader == '5'){ echo 'selected'; }?> value="5">ดร. ปรเมศร์ ปธิเก</option>
                <option <?php if($ID_Leader == '6'){ echo 'selected'; }?> value="6">ดร. ฝนทิพย์ จินันทุยา</option>
                <option <?php if($ID_Leader == '7'){ echo 'selected'; }?> value="7">ดร. รัชนีวรรณ อังกุรบุตร์</option>
                <option <?php if($ID_Leader == '8'){ echo 'selected'; }?> value="8">ผศ.ดร. วิชญ์พล ฟักแก้ว</option>
                <option <?php if($ID_Leader == '9'){ echo 'selected'; }?> value="9">ผศ.ดร.สุธรรม อรุณ</option>
                <option <?php if($ID_Leader == '10'){ echo 'selected'; }?> value="10">ผศ. นัทธิ์ธนนท์ พงษ์พานิช</option>
                <option <?php if($ID_Leader == '11'){ echo 'selected'; }?> value="11">อ. อดิศร ประสิทธิ์ศักดิ์</option>
                <option <?php if($ID_Leader == '12'){ echo 'selected'; }?> value="12">รศ.ดร. เชวศักดิ์ รักเป็นไทย</option>
                <option <?php if($ID_Leader == '13'){ echo 'selected'; }?> value="13">รศ.ดร. สิทธิเดช วชิราศรีศิริกุล</option>
                <option <?php if($ID_Leader == '14'){ echo 'selected'; }?> value="14">รศ.ดร. จงลักษณ์ พาหะซา</option>
                <option <?php if($ID_Leader == '15'){ echo 'selected'; }?> value="15">ผศ.ดร. ณัฐพงษ์ โปธิ</option>
                <option <?php if($ID_Leader == '16'){ echo 'selected'; }?> value="16">ผศ. ดวงดี แสนรักษ์</option>
                <option <?php if($ID_Leader == '17'){ echo 'selected'; }?> value="17">ดร. ดำรงค์ อมรเดชาพล</option>
                <option <?php if($ID_Leader == '18'){ echo 'selected'; }?> value="18">ผศ. ดร.ธนาทิพย์ จันทร์คง</option>
                <option <?php if($ID_Leader == '19'){ echo 'selected'; }?> value="19">อ. สุรพล ดำรงกกิตติกุล</option>
                <option <?php if($ID_Leader == '20'){ echo 'selected'; }?> value="20">อ. กรวิน สุวรรรภักดิ์</option>
                <option <?php if($ID_Leader == '21'){ echo 'selected'; }?> value="21">ดร. เกรียงศักดิ์ ไกรกิจราษฎร์</option>
                <option <?php if($ID_Leader == '22'){ echo 'selected'; }?> value="22">อ. ธนกานต์ สวนกัน</option>
                <option <?php if($ID_Leader == '23'){ echo 'selected'; }?> value="23">ดร. บรรเทิง ยานะ</option>
                <option <?php if($ID_Leader == '24'){ echo 'selected'; }?> value="24">อ. วาสนา นากุ</option>
                <option <?php if($ID_Leader == '25'){ echo 'selected'; }?> value="25">อ.ศราวุธ แต้โอสถ</option>
                <option <?php if($ID_Leader == '26'){ echo 'selected'; }?> value="26">รศ.ดร.ณัฐพงศ์ ดำรงวิริยะนุภาพ</option>
                <option <?php if($ID_Leader == '27'){ echo 'selected'; }?> value="27">รศ. กิตติพงษ์ วุฒิจำนงค์</option>
                <option <?php if($ID_Leader == '28'){ echo 'selected'; }?> value="28">รศ.ดร. ธนกร ชมภูรัตน์</option>
                <option <?php if($ID_Leader == '29'){ echo 'selected'; }?> value="29">ผศ.ดร. ปรีดา ไชยมหาวัน</option>
                <option <?php if($ID_Leader == '30'){ echo 'selected'; }?> value="30">ผศ.ดร. สมบูรณ์ เซี่ยงฉิน</option>
                <option <?php if($ID_Leader == '31'){ echo 'selected'; }?> value="31">ผศ.ดร. สุริยาวุธ ประอ้าย</option>
                <option <?php if($ID_Leader == '32'){ echo 'selected'; }?> value="32">ผศ. ปิยพงษ์ สุวรรณมณีโชติ</option>
                <option <?php if($ID_Leader == '33'){ echo 'selected'; }?> value="33">ดร. ธีรพจน์ ศุภวิริยะกิจ</option>
                <option <?php if($ID_Leader == '34'){ echo 'selected'; }?> value="34">ดร. ขวัญสิรินภา ธนะวงศ์</option>
                <option <?php if($ID_Leader == '35'){ echo 'selected'; }?> value="35">ดร. ปาลินี สุมิตสวรรค์</option>
                <option <?php if($ID_Leader == '36'){ echo 'selected'; }?> value="36">ดร. อภิชาต บัวกล้า</option>
                <option <?php if($ID_Leader == '37'){ echo 'selected'; }?> value="37">อ. ธเนศ ทองเดชศรี</option>
                <option <?php if($ID_Leader == '38'){ echo 'selected'; }?> value="38">อ. ชัยวัฒน์ แสงศรีจันทร์</option>
                <option <?php if($ID_Leader == '39'){ echo 'selected'; }?> value="39">อ. สุรเชษ ศรีนารา</option>
                <option <?php if($ID_Leader == '40'){ echo 'selected'; }?> value="40">อ. วรจักร จันทร์แว่น</option>
                <option <?php if($ID_Leader == '41'){ echo 'selected'; }?> value="41">อ. ณพล ศรีศักดา</option>
                <option <?php if($ID_Leader == '42'){ echo 'selected'; }?> value="42">ดร. วรเทพ แซ่ล่อง</option>
                <option <?php if($ID_Leader == '43'){ echo 'selected'; }?> value="43">ดร. ทรงวุฒิ ประกายวิเชียร</option>
                <option <?php if($ID_Leader == '44'){ echo 'selected'; }?> value="44">ผศ. เอราวิล ถาวร</option>
                <option <?php if($ID_Leader == '45'){ echo 'selected'; }?> value="45">ผศ. จักรทอง ทองจัตุ</option>
                <option <?php if($ID_Leader == '46'){ echo 'selected'; }?> value="46">ผศ. ดร. พจนศักดิ์ พจนา</option>
                <option <?php if($ID_Leader == '47'){ echo 'selected'; }?> value="47">ดร.อัจฉราวดี แก้ววรรณดี</option>
                <option <?php if($ID_Leader == '48'){ echo 'selected'; }?> value="48">อ.คมกฤต เมฆสกุล</option>
                <option <?php if($ID_Leader == '49'){ echo 'selected'; }?> value="49">อ. พงศ์วิทย์ พรมสุวรรณ</option>
                <option <?php if($ID_Leader == '50'){ echo 'selected'; }?> value="50">ดร. อภิศักดิ์ วิทยาประภากร</option>
                <option <?php if($ID_Leader == '51'){ echo 'selected'; }?> value="51">อ. อธิคม บุญซื่อ</option>
                <option <?php if($ID_Leader == '52'){ echo 'selected'; }?> value="52">อ. เอกชัย แผ่นทอง</option>
                <option <?php if($ID_Leader == '53'){ echo 'selected'; }?> value="53">อ. อโณทัย กล้าการขาย</option>
                <option <?php if($ID_Leader == '54'){ echo 'selected'; }?> value="54">นางสาวพิมพ์ผกา แก้วษา</option>
                <option <?php if($ID_Leader == '55'){ echo 'selected'; }?> value="55">นายกิตติ ไพเจริญ</option>
                <option <?php if($ID_Leader == '56'){ echo 'selected'; }?> value="56">นางสาวรสนันท์ เอื้อพิทักษ์สกุล</option>
                <option <?php if($ID_Leader == '57'){ echo 'selected'; }?> value="57">นางสาวศิริเพ็ญ บุญสม</option>
                <option <?php if($ID_Leader == '58'){ echo 'selected'; }?> value="58">ว่าที่ ร.ต. หญิงสุพัตรา ใจมูลมั่ง</option>
                <option <?php if($ID_Leader == '59'){ echo 'selected'; }?> value="59">นางกตัญชลี วันแก้ว</option>
                <option <?php if($ID_Leader == '60'){ echo 'selected'; }?> value="60">นางสาวกันติชา ราชคม</option>
                <option <?php if($ID_Leader == '61'){ echo 'selected'; }?> value="61">นายรณภัทร อักษรศิริ</option>
                <option <?php if($ID_Leader == '62'){ echo 'selected'; }?> value="62">นายธนัตถ์กานต์ ใจสวัสดิ์</option>
                <option <?php if($ID_Leader == '63'){ echo 'selected'; }?> value="63">นายเฉลิมรัฐ เกาะแก้ว</option>
                <option <?php if($ID_Leader == '64'){ echo 'selected'; }?> value="64">นางสาวสุทธิดา ใจมูลมั่ง</option>
                <option <?php if($ID_Leader == '65'){ echo 'selected'; }?> value="65">นางสาวกายรวี ฟูแสง</option>
            </select> </p>

        <div>
        <p style="font-weight: bold;"><input type="checkbox" class="checkbox" name="TypeMember_Re"  id="AddMember_Re" value="1" <?php if($type_stakeholder==1){echo 'checked';} ?>> มีผู้ร่วมวิจัย
            <input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re2"  value="2" <?php if($type_stakeholder==2){echo 'checked';}?> > ไม่มีผู้ร่วมวิจัย</p>
            <div id="ShowAddMember_Re" style="display:none">
                        <?php
                         if($type_stakeholder=='1'){
                            $sql_count = "SELECT COUNT(*)  AS AllMember FROM re_member WHERE Re_ID = '$Re_id'";
                            $count_query = mysqli_query($conn,$sql_count);
                            $rowCount = mysqli_fetch_assoc($count_query);
                            
                            
                            echo "<p style='display:none' id='NumMember'><input type='text' id='MebmerAll' value=".$rowCount['AllMember']."><p>";
                            
                            echo "<p> จำนวนผู้ร่วมวิจัย : <input type='text' id='Mebmer_Num' placeholder='จำนวนผู้วิจัย' value=".$rowCount['AllMember']." class='Member_NumRe'> /คน";
                            echo"<button type='button' class='But-AddMem' id='AddMem' onclick='add();'>ยืนยัน</button> </p> ";
                            echo "<div id='new_chq'>";
                            if(mysqli_num_rows($member_query)>0){
                            while ($member_row = mysqli_fetch_assoc($member_query)){
                                $Num = 1;
                                $member_name = $member_row['MemberName'];
                                $member_no = $member_row['NO'];
                                echo "<input type='text'  name='no[]' value='$member_no' style='display: none;'>";
                                echo" <input type='text' class='MemberResearch' value='$member_name' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ ".$Num."'>";
                                }
                                $Num++;
                            }
                            
                            echo "</div>";
                            echo "<div id='new_Mem'>";
                            echo "</div>";
                            echo " <input type='hidden' value='1' id='total_chq'>";
                      
                        }
                        
                        else if($type_stakeholder=='2'){
                            
                            echo "<p> จำนวนผู้ร่วมวิจัย : <input type='text' id='Mebmer_Num' placeholder='จำนวนผู้วิจัย' class='Member_NumRe'> /คน";
                            echo"<button type='button' class='But-AddMem' id='AddMem' onclick='addnoneMem();'>ยืนยัน</button> </p> ";
                            echo "<div id='new_chq'>";
                            echo "</div>";
                            echo "<input type='hidden' value='1' id='total_chq'>";
                            
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
                    <p id= "Re_CapOut" style="display: none;"> <input type="text" name="Agency_out_other" id="" value="<?php if($fun_Status == '2'){if($type_Funout == '1'){echo $Funout_Agency;}}?>" placeholder="โปรดระบุ" style="border: 1px solid"></p>
                    
                    </div>
                </div>
                <div>
                <input type="checkbox" class="checkbox2" name="Type_funds_out" id="BoxService_Aca" <?php if($fun_Status == '2'){if($type_Funout == '2'){echo 'checked' ;}}?>  value="2"> บริการวิชาการ
                    <p id= "ShowService_Aca" style="display: none;"> <input type="text" name="Agency_out_service" id="" class="Other" placeholder="โปรดระบุ" value="<?php if($fun_Status == '2'){if($type_Funout == '2'){echo $Funout_Agency ;}}?>" ></p>
                </div>

            </div>
            </p>
            <p style="font-weight: bold; margin-left:20px; margin-top:20px;" >งบประมาณ</p>
                <table border="2px" style="margin-left: 20px; " class="Bugget_Re">
                    <thead>
                        <tr>
                        <td>ค่า/งวด</td>
                        <td>งวดที่ 1</td>
                        <td>งวดที่ 2</td>
                        <td>งวดที่ 3</td>
                        <td>งวดที่ 4</td>
                        <td>ค่าประเมิลผลงาน</td>
                        <td>รวม</td>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <?php 
                            echo" <td style='text-align: center; font-weight:bold;' >จำนวน</td>";
                            echo" <td><input type='number' name='cost_1' class='cost' id='cost-one' value='$cost1' required pattern='0-9' title='กรอกได้เฉพาะตัวเลขเท่านั้น'></td>";
                            echo "<td><input type='number' name='cost_2' class='cost' id='cost-two' value='$cost2' required pattern='0-9' title='กรอกได้เฉพาะตัวเลขเท่านั้น'></td>";
                            echo "<td><input type='number' name='cost_3' class='cost' id='cost-tree' value='$cost3' required pattern='0-9' title='กรอกได้เฉพาะตัวเลขเท่านั้น'></td>";
                            echo "<td><input type='number' name='cost_4' class='cost' id='cost-four' value='$cost4' required pattern='0-9' title='กรอกได้เฉพาะตัวเลขเท่านั้น'></td>";
                            echo "<td><input type='number' name='cost_5' class='cost' id='cost-five' value='$Port' required pattern='0-9' title='กรอกได้เฉพาะตัวเลขเท่านั้น'></td>";
                            echo "<td class='non_input'><input id='sum-cost' name='Bugget' value='$Bugget_Re' type='number' placeholder='รวม' readonly></td>";
                            ?>
                        </tr>
                        <tr class="tr-non_input">
                            <?php
                            if($type_vat == '1'){
                                $sql_vat = "SELECT * FROM research INNER JOIN vat ON research.Re_ID = vat.Re_ID WHERE research.Re_ID ='$Re_id'";
                                $sql_vat_query = mysqli_query($conn,$sql_vat);
                                $rowvat = mysqli_fetch_assoc($sql_vat_query);
                                echo"<td ><input type='checkbox' class='Checkbox-Bugget' value='1' name='type_vat_Re' id='' checked>ค่าบำรุงมหาวิทยาลัย 10%</td>";
                                echo" <td class='non_input'><input id='cost-one-vat' name='Vat1' value='".$rowvat['Vat1']."' class='vat' type='number'  readonly></td>";
                                echo' <td class="non_input"><input id="cost-two-vat" name="Vat2" value="'.$rowvat["Vat2"].'" class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="cost-tree-vat" name="Vat3" value="'.$rowvat["Vat3"].'" class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="cost-four-vat" name="Vat4" value="'.$rowvat["Vat4"].'" class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="cost-five-vat" name="Vat5" value="'.$rowvat["PortVat"].'" class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="sum-cost-vat" name="Vat_total" value="'.$rowvat["Vat_total"].'" type="number" readonly></td>';
                            }
                            elseif($type_vat == '2'){
                                echo"<td ><input type='checkbox' class='Checkbox-Bugget' value='2' name='type_vat_Re' id='' >ค่าบำรุงมหาวิทยาลัย 10%</td>";
                                echo" <td class='non_input'><input id='cost-one-vat' name='Vat1'  class='vat' type='number'  readonly></td>";
                                echo' <td class="non_input"><input id="cost-two-vat" name="Vat2"  class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="cost-tree-vat" name="Vat3"  class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="cost-four-vat" name="Vat4"  class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="cost-five-vat" name="Vat5"  class="vat" type="number" readonly></td>';
                                echo' <td class="non_input"><input id="sum-cost-vat" name="Vat_total"  type="number" readonly></td>';
                            }
                            
                            
                            ?>
                        </tr>
                        <tr class="tr-non_input">
                            <?php
                            if($type_vat_faculty == '1'){
                                $sql_vat_faculty = "SELECT * FROM research INNER JOIN vat_faculty ON research.Re_ID = vat_faculty.Re_ID WHERE research.Re_ID ='$Re_id'";

                                $sql_vat_facultyquery = mysqli_query($conn,$sql_vat_faculty);
                                $rowvatfaculty = mysqli_fetch_assoc($sql_vat_facultyquery);
                                echo'<td ><input type="checkbox" class="Checkbox-Bugget-faculty" value="1" name="type_vat_faculty" id="" checked>ค่าบำรุงคณะ 5%</td>';
                                echo'<td class="non_input"><input id="cost-one-vat-faculty" name="vat_facul1" class="vat-faculty" value="'.$rowvatfaculty['faculty1'].'" type="number"  readonly></td>';
                                echo'<td class="non_input"><input id="cost-two-vat-faculty" name="vat_facul2" class="vat-faculty" value="'.$rowvatfaculty['faculty2'].'" type="number" readonly></td>';
                                echo'<td class="non_input"><input id="cost-tree-vat-faculty" name="vat_facul3" class="vat-faculty" value="'.$rowvatfaculty['faculty3'].'" type="number" readonly></td>';
                                echo'<td class="non_input"><input id="cost-four-vat-faculty" name="vat_facul4" class="vat-faculty" value="'.$rowvatfaculty['faculty4'].'" type="number" readonly></td>';
                                echo'<td class="non_input"><input id="cost-five-vat-faculty" name="vat_facul5" class="vat-faculty" value="'.$rowvatfaculty['faculty_Port'].'" type="number" readonly></td>';
                                echo'<td class="non_input"><input id="sum-cost-vat-faculty" name="vat_facul_total" type="number" value="'.$rowvatfaculty['faculty_total'].'" readonly></td>';
                            }
                            elseif($type_vat_faculty == '2'){
                                echo'<td ><input type="checkbox" class="Checkbox-Bugget-faculty" value="2" name="type_vat_faculty" id="" >ค่าบำรุงคณะ 5%</td>';
                                echo'<td class="non_input"><input id="cost-one-vat-faculty" name="vat_facul1" class="vat-faculty"  type="number"  readonly></td>';
                                echo'<td class="non_input"><input id="cost-two-vat-faculty" name="vat_facul2" class="vat-faculty"  type="number" readonly></td>';
                                echo'<td class="non_input"><input id="cost-tree-vat-faculty" name="vat_facul3" class="vat-faculty" type="number" readonly></td>';
                                echo'<td class="non_input"><input id="cost-four-vat-faculty" name="vat_facul4" class="vat-faculty" value="" type="number" readonly></td>';
                                echo'<td class="non_input"><input id="cost-five-vat-faculty" name="vat_facul5" class="vat-faculty" value="" type="number" readonly></td>';
                                echo'<td class="non_input"><input id="sum-cost-vat-faculty" name="vat_facul_total" type="number"  readonly></td>';
                            }
                            
                            ?>
                            
                        </tr>
                    </tbody>
                </table>

                <div style="font-weight: bold; margin-top:10px;">ระยะเวลาในการดำเนิน :
            <input type="text" name="datefilter" class="Date-time-approve" value="<?php echo $Time_Re;?>" ></div>

        </div>
        </fieldset>
        </div>
        <!-- Stop แหล่งเงินทุน -->
        <br>
        

        <div style="font-weight: bold;">
        <table border="2px" >
            <thead>
                <tr>
                <th>ครั้งที่</td>
                <th>สถานะโครงการ</td>
                <th>ระยะเวลาขอนุมัติ</td>
                </tr>
            </thead>
            <tbody>
            <tr>
                        <td style="text-align: center;">1</td>
                        <td><?php echo $approve ?></td>
                        <td><?php echo $Time_approve?></td>
                        </tr>
                
                    <?php
                    $Log_Approve = "SELECT * FROM research INNER JOIN log_approve ON research.Re_ID = log_approve.Re_ID INNER JOIN ";
                    $Log_Approve .= "approve_status ON log_approve.Approve_status = approve_status.Approve_ID WHERE research.Re_ID = '$Re_id'";
                    $Log_Approve_Query = mysqli_query($conn,$Log_Approve);
                    if(mysqli_num_rows($Log_Approve_Query)>0){
                        $numrow = 2;
                        while($rowLog_Approve = mysqli_fetch_assoc($Log_Approve_Query)){
                            echo "<tr>";
                            echo "<td style='text-align:center'>".$numrow."</td>";
                            echo "<td>".$rowLog_Approve['Approve']."</td>";
                            echo "<td>".$rowLog_Approve['Time_period_log']."</td>";
                            echo "</tr>";
                            $numrow++;

                        }
                        
                    }
                    ?>
                
                <tr>
                    <td>ครั้งถัดไป</td>
                    <td><select name="approve_Type" id="">
                    <option value="" selected disabled hidden>โปรดเลือกสถานะโครงการ</option>
                    <option value="1">เสนอโครงการ</option>
                    <option value="2">เซ็นสัญญา</option>
                    <option value="3">ขออนุมัติดำเนินโครงการ</option>
                    <option value="4">ขออนุมัติเบิกเงิน(รอบ1)</option>
                    <option value="5">ขออนุมัติเบิกเงิน(รอบ2)</option>
                    <option value="6">ขออนุมัติเบิกเงิน(รอบ3)</option>
                    <option value="7">ขออนุมัติขยายเวลา</option>
                    <option value="8">สิ้นสุดโครงการ</option>
                </select></td>
                    <td><input type="text" name="Time_period" value="" class="Date-time-approve" placeholder="โปรดกรอกระยะเวลา ..." ></td>
                </tr>
            </tbody>
        </table>
            
        

        <div style="margin-top: 15px;">
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
                    No. ISSUE : <input type="text" class="Other" placeholder="No. ISSUE" name="ISSUE" value="<?php if($Published_Status == '1'){echo $Issue;}?>"> <br>
                    หน้าที่พิมพ์ :  <input type="text" class="Other" name="Page_Published" placeholder="หน้าที่พิมพ์" value="<?php if($Published_Status == '1'){echo $Page;}?>">
                </div>
                </p>
                </fieldset>
            </div>
        </div>

        <input type="text" name="Re_id_Edit" value="<?php echo $Re_id;?>" style="display: none;">
        <div style="text-align: center; height: 70px; margin-top:20px;">
        <button type="submit" class="Btu-Sub" value="back" name="but_Submit">back</button>
        <button type="submit" class="Btu-Sub" value="Update" name="but_Submit" onClick="return confirm('คุณต้องการที่อัพเดทข้อมูลนี้หรือไม่ ?');">Save</button>
        </div>
    </form>
    </div>
    </div>

    

    
</body>
<script>

    // location.reload();
    // console.log("page");
    // return false;
    $(document).ready(function(){     
        // location.reload();
        // console.log("page");
        // return false;
    });

        // location.reload();
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
        function add(){
        $("#new_Mem").empty();
        var Nummem = document.getElementById("MebmerAll").value ;
        var i = document.getElementById("Mebmer_Num").value ;
    
        var remain = Math.abs(Nummem-i) ;
        
        for (Num = 1; Num <= remain; Num++) {
            Nummem++
            var new_input="<input type='text' class='MemberResearch'  name='Member[]' placeholder='ผู้ร่วมวิจัยคน"+Nummem+"' required >";
            // var new_input="<input type='text' class='' id='Member_"+Num+"' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ "+Num+"' required ><button type='button' class='but-Delete' onclick='remove();' id='MemberRe_"+Num+"'>x</button>";
            $('#new_Mem').append(new_input);
            $('#total_chq').val(i);
        }


    }

   

        
</script>


</html>