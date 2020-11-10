<?php
require("connect.php");
session_start();
$Re_id = $_REQUEST['Re_id'];
if(!isset($_SESSION['emailAdmin'])) {
    header("Location:show.php");
}

$_SESSION['refresh'] = 1;

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

    <link rel="stylesheet" href="css/detail.css">
    <title>Document</title>
</head>

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
    <?php
    require_once __DIR__ . '/vendor/autoload.php';

    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];

    $mpdf = new \Mpdf\Mpdf([
        'fontDir' => array_merge($fontDirs, [
            __DIR__ . '/tmp',
        ]),
        'fontdata' => $fontData + [
            'sarabun' => [
                'R' => 'THSarabunNew.ttf',
                'I' => 'THSarabunNew Italic.ttf',
                'B' => 'THSarabunNew Bold.ttf',
                'BI' => 'THSarabunNew BoldItalic.ttf'
            ]
        ],
        'default_font' => 'sarabun'
    ]);
ob_start();
    //leader_name and status_stake
    $leader_sql = "SELECT * FROM research INNER JOIN name_leader ON research.ID_Leader = name_leader.ID_Leader INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID WHERE Re_ID = '$Re_id'";

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
        $type_vat = $row_research['ID_vat'];
        $type_vat_faculty = $row_research['ID_faculty'];
        $cost1 = $row_research['cost1'];
        $cost2 = $row_research['cost2'];
        $cost3 = $row_research['cost3'];
        $approve = $row_research['Approve'];
        $cost4 = $row_research['cost4'];
        $Port = $row_research['Port'];


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
    // echo $Check_Published_sql;
    $Published_query = mysqli_query($conn,$Check_Published_sql);
    if(mysqli_num_rows($Published_query)==1){
        $row_Published = mysqli_fetch_assoc($Published_query);
        $type_Published_inter = $row_Published['TypePublished'];
        $date_Published = $row_Published['date_published'];
        $Volume = $row_Published['Volume'];
        $Issue = $row_Published['Issue'];
        $Page = $row_Published['Page'];
    }
    $Check_Published_sql1 = "SELECT * FROM research INNER JOIN published ON research.Re_id = published.Re_id ";
    $Check_Published_sql1 .= " INNER JOIN pro_name ON research.Re_id = pro_name.Re_ID WHERE research.Re_ID = '$Re_id'";
    // echo $Check_Published_sql1;
    // echo $Check_Published_sql;
    $Published_query1 = mysqli_query($conn,$Check_Published_sql1);
    if(mysqli_num_rows($Published_query1)>0){
        $row_Published = mysqli_fetch_assoc($Published_query1);
        $proname = $row_Published['Pname'];
        $pro_status = $row_Published['pro_status'];
    }
    if(mysqli_num_rows($Published_query1)==0){
        $row_Published = mysqli_fetch_assoc($Published_query1);
        $proname = "";
        $pro_status = "";
    }

    ?>
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
                if($type_Funout == "1"){echo "งานวิจัย <br><br> จากหน่วยงาน : "; echo $Funout_Agency;}
                else{echo "บริการวิชาการ";
                    echo "<br>";
                    echo "<br>";
                    echo "จากหน่วยงาน :  ".$Funout_Agency;
                } 
                
            } ?>
            <?php
         
            echo "<p class='Buggettext'>".'เงินทุน : งวดที่ 1 :'.number_format($cost1).", งวดที่ 2 : ".number_format($cost2).", งวดที่ 3 : ".number_format($cost3).", งวดที่ 4 : ".number_format($cost4).", ค่าประเมิลผลงาน : ".number_format($Port)." รวมเป็นเงิน : ".number_format($Bugget_Re)." บาท"."</p>";
            if($type_vat == '1'){
                $sql_vat = "SELECT * FROM research INNER JOIN vat ON research.Re_ID = vat.Re_ID WHERE research.Re_ID ='$Re_id'";
                $sql_vat_query = mysqli_query($conn,$sql_vat);
                $rowvat = mysqli_fetch_assoc($sql_vat_query);
                echo "<p>".'ค่าบำรุงมหาวิทยาลัย 10% : งวดที่ 1 :'.number_format($rowvat['Vat1']).", งวดที่ 2 : ".number_format($rowvat['Vat2']).", งวดที่ 3 : ".number_format($rowvat['Vat3']).", งวดที่ 4 : ".number_format($rowvat['Vat4']).", ค่าประเมิลผลงาน : ".number_format($rowvat['PortVat'])." รวมเป็นเงิน : ".$rowvat['Vat_total']." บาท"."</p>";

            }
            else{
                echo"<p>ไม่มีค่าบำรุงมหาวิทยาลัย 10%</p>";
            }
            if($type_vat_faculty == '1'){
                $sql_vat_faculty = "SELECT * FROM research INNER JOIN vat_faculty ON research.Re_ID = vat_faculty.Re_ID WHERE research.Re_ID ='$Re_id'";

                $sql_vat_facultyquery = mysqli_query($conn,$sql_vat_faculty);
                $rowvatfaculty = mysqli_fetch_assoc($sql_vat_facultyquery);
                echo "<p>".'ค่าบำรุงคณะ 5% : งวดที่ 1 :'.number_format($rowvatfaculty['faculty1']).", งวดที่ 2 : ".number_format($rowvatfaculty['faculty2']).", งวดที่ 3 : ".number_format($rowvatfaculty['faculty3']).", งวดที่ 4 : ".number_format($rowvatfaculty['faculty4']).", ค่าประเมิลผลงาน : ".number_format($rowvatfaculty['faculty_Port'])." รวมเป็นเงิน : ".number_format($rowvatfaculty['faculty_total'])." บาท"."</p>";
            }
            else{
                echo"<p>ไม่มีค่าบำรุงคณะ 5%</p>";
            }
            ?>
        </fieldset>
        </div>
        <!-- Stop แหล่งเงินทุน -->
        <br>


        <div style="font-weight: bold;">ระยะเวลาในการดำเนิน : <?php echo $Time_Re;?>

        </div><br>

        <div style="font-weight: bold;">
        <table border="2px">
            <thead>
                <tr>
                <th>ครั้งที่</td>
                <th>สถานะโครงการ</td>
                <th>ระยะเวลาขอนุมัติ</td>
                </tr>
            </thead>
            <tbody>
                
                
                    <?php
                    $Log_Approve = "SELECT * FROM research INNER JOIN log_approve ON research.Re_ID = log_approve.Re_ID INNER JOIN ";
                    $Log_Approve .= "approve_status ON log_approve.Approve_status = approve_status.Approve_ID WHERE research.Re_ID = '$Re_id'";
                    $Log_Approve_Query = mysqli_query($conn,$Log_Approve);
                    if(mysqli_num_rows($Log_Approve_Query)>0){
                        $numrow = 1;
                        while($rowLog_Approve = mysqli_fetch_assoc($Log_Approve_Query)){
                            echo "<tr>";
                            echo "<td>".$numrow."</td>";
                            echo "<td>".$rowLog_Approve['Approve']."</td>";
                            echo "<td>".$rowLog_Approve['Time_period_log']."</td>";
                            echo "</tr>";
                            $numrow++;

                        }
                        
                    }
                    ?>
            </tbody>
        </table>
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
                    <?php if($pro_status==1){echo "<br><br>ผลงานที่อัปโหลด: "; echo "<a href='".$proname."' style='color: blue;'>รายละเอียด</a>";} ?>
                </div>
                </p>
                </fieldset>
            <?php 
            }
            if($Published_Status == '2'){echo '<p style="font-weight: bold;">ไม่มีผลงานตีพิมพ์</p>';}
             ?>
        </div>
        <?php
    $html = ob_get_contents();
    $mpdf->WriteHTML($html);
    // $mpdf->WriteHTML("dfdf");
    $mpdf->Output("Myreport.pdf");
    ob_flush();

    ?>

        <input type="text" name="Re_id_Edit" value="<?php echo $Re_id;?>" style="display: none;">
        <div style="text-align: center; height: 70px; margin-top:20px;">
        <button type="submit" class="Btu-Sub-Back" value="back" name="but_Submit">Back</button>
        <button type="button" class="Btu-Sub-Edit" value="" name="" style="width:180px;"><a href="Myreport.pdf" class="btn btn-primary" style="color:blue;">โหลดรายงาน (pdf)</a></button>
        <button type="submit" class="Btu-Sub-Edit" value="Edit" name="but_Submit">Edit</button>
        <button type="submit" class="Btu-Sub-Delete" value="Delete" name="but_Submit" onClick="return confirm('คุณต้องการที่จะลบข้อมูลนี้หรือไม่ ?');">Delete</button>
        </div>
    </form>
    </div>
    </div>
    



    

    
</body>



</html>