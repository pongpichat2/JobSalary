<?php

use function PHPSTORM_META\type;

require('connect.php');
$LeaderName = "";
//  รับค่าเป็น Array
$MemberName = ""; 
$StatusMemRe = "";
$NameRe_TH = "";
$NameRe_Eng = "";

// ประเภทงานวิจัย if type == Other input value input.text
$TypeRe = "";
$Type_ReOther = "";

//แหล่งเงินทุน 
$Status_Funds = "";
// ถายใน value == 1 insert Capital_Sidein_Re
$Funds_in = "";
$Agencyin = "";
// ถายovd value == 2 insert Capital_Sidein_Re
$Funds_out = "";
$type_funds_out = "";
$Agencyout = "";
$Agencyout_service = "";
$Agencyout_other = "";

$cost1 = "";
$cost2 = "";
$cost3 = "";
$Bugget = "";

$vat1 = "";
$vat2 = "";
$vat3 = "";
$vat_total = "";

$vat_facul1 = "";
$vat_facul2 = "";
$vat_facul3 = "";
$vat_facul_total = "";


$dateperiod = "";
$Approve_Type = "";
$Time_period = "";
$Published_Status = "";
$type_Publishedinter = "";
$datePublished = "";
$Volume = "";
$ISSUE = "";
$PageNo  = "";
$NO_Edit = "";
$Re_id_Edit = "";

if(isset($_POST['Re_id_Edit'])) $Re_id_Edit = $_POST['Re_id_Edit'];
if(isset($_POST['no'])) $NO_Edit = $_POST['no'];
if(isset($_POST['Leader_Re'])) $LeaderName = $_POST['Leader_Re'];
if(isset($_POST['NameRe_TH'])) $NameRe_TH = $_POST['NameRe_TH'];
if(isset($_POST['NameRe_Eng'])) $NameRe_Eng = $_POST['NameRe_Eng'];
if(isset($_POST['Type_Re_Other'])) $Type_ReOther = $_POST['Type_Re_Other'];
if(isset($_POST['Type_Re'])) $TypeRe = $_POST['Type_Re'];
if(isset($_POST['Bugget'])) $Bugget = $_POST['Bugget'];
if(isset($_POST['datefilter'])) $dateperiod = $_POST['datefilter'];
if(isset($_POST['Member'])) $MemberName = $_POST['Member'];
if(isset($_POST['TypeMember_Re'])) $StatusMemRe = $_POST['TypeMember_Re'];
if(isset($_POST['approve_Type'])) $Approve_Type = $_POST['approve_Type'];
if(isset($_POST['Time_period'])) $Time_period = $_POST['Time_period'];
if(isset($_POST['Published'])) $Published_Status = $_POST['Published'];
if(isset($_POST['type_Published_inter'])) $type_Publishedinter = $_POST['type_Published_inter'];
if(isset($_POST['DateDocument'])) $datePublished = $_POST['DateDocument'];
if(isset($_POST['Volome'])) $Volome = $_POST['Volome'];
if(isset($_POST['ISSUE'])) $ISSUE = $_POST['ISSUE'];
if(isset($_POST['Page_Published'])) $PageNo = $_POST['Page_Published'];
if(isset($_POST['FundsType'])) $Status_Funds = $_POST['FundsType'];
if(isset($_POST['Agency_Sidein_Name'])) $Agencyin = $_POST['Agency_Sidein_Name'];
if(isset($_POST['Type_funds_out'])) $type_funds_out = $_POST['Type_funds_out'];
if(isset($_POST['Agency_out'])) $Agencyout = $_POST['Agency_out'];
if(isset($_POST['Agency_out_other'])) $Agencyout_other = $_POST['Agency_out_other'];
if(isset($_POST['Agency_out_service'])) $Agencyout_service = $_POST['Agency_out_service'];

if(isset($_POST['but_Submit'])) $But_Sub = $_POST['but_Submit'];
if(isset($_POST['Re_id_Edit'])) $Re_id_De = $_POST['Re_id_Edit'];

if(isset($_POST['cost_1'])) $cost1 = $_POST['cost_1'];
if(isset($_POST['cost_2'])) $cost2 = $_POST['cost_2'];
if(isset($_POST['cost_3'])) $cost3 = $_POST['cost_3'];

if(isset($_POST['Vat1'])) $vat1 = $_POST['Vat1'];
if(isset($_POST['Vat2'])) $vat2 = $_POST['Vat2'];
if(isset($_POST['Vat3'])) $vat3 = $_POST['Vat3'];
if(isset($_POST['Vat_total'])) $vat_total = $_POST['Vat_total'];

if(isset($_POST['vat_facul1'])) $vat_facul1 = $_POST['vat_facul1'];
if(isset($_POST['vat_facul2'])) $vat_facul2 = $_POST['vat_facul2'];
if(isset($_POST['vat_facul3'])) $vat_facul3 = $_POST['vat_facul3'];
if(isset($_POST['vat_facul_total'])) $vat_facul_total = $_POST['vat_facul_total'];


$type_vat = $_POST['type_vat_Re'];
$type_vat_faculty = $_POST['type_vat_faculty'];
// echo "ค่าบำรุง".$type_vat."<br>";
// echo "ค่าคณะ".$type_vat_faculty;

if($But_Sub == 'Insert'){

        // Add table research
    $Re_ID = $NameRe_TH."_".uniqid();
    if ($TypeRe == "Other"){
        $TypeRe = $Type_ReOther;
    }
    if ($type_vat == '1'){
        $type_vat = 1;
        
        $sql_vat = "INSERT INTO vat (Re_ID, Vat1, Vat2, Vat3, Vat_total) Value ('$Re_ID','$vat1','$vat2','$vat3','$vat_total')";

        if ($conn->query($sql_vat) === TRUE) {
            echo "New record created successfully";
          } else {
            echo "Error: " . $sql_vat . "<br>" . $conn->error;
          }
    }
    else{
        $type_vat = 2;
    }

    if ($type_vat_faculty == '1'){
        $type_vat_faculty = 1;
        $sql_vat_faculty = "INSERT INTO vat_faculty (Re_ID, faculty1, faculty2, faculty3, faculty_total) Value ('$Re_ID','$vat_facul1','$vat_facul2','$vat_facul3','$vat_facul_total')";
  
        $vat_faculry = mysqli_query($conn,$sql_vat_faculty);
    }
    else{
        $type_vat_faculty = 2;
    }
    

    $sqlResearch = "INSERT INTO research (Re_ID, ID_Leader, NameRe_TH, NameRe_ENG, Type_research, cost1, cost2, cost3, Bugget, ID_vat, ID_faculty, Time_period, Status_stake, Approve_status, Time_period_approve, Published_status, Funds_status) "; 
    $sqlResearch .= "Value ('$Re_ID','$LeaderName','$NameRe_TH','$NameRe_Eng','$TypeRe','$cost1','$cost2','$cost3','$Bugget','$type_vat','$type_vat_faculty','$dateperiod','$StatusMemRe', '$Approve_Type' ,'$Time_period', '$Published_Status', '$Status_Funds')";

    $result = mysqli_query($conn,$sqlResearch);

    // มีผู้ร่วมวิจัย
    if($StatusMemRe == "1"){
        foreach ($MemberName as $Mam_Name ){
            if($Mam_Name == Null or $Mam_Name == ''){
                break;
            }
            else{
                $sqlMember = "INSERT INTO re_member (Re_ID, MemberName) Value ('$Re_ID', '$Mam_Name')";
                $result2 = mysqli_query($conn,$sqlMember);
            }
        
    }

    // มีการตีพิมพ์
    }
    if($Published_Status == "1"){
        $sqlPublished = "INSERT INTO published (Re_ID, TypePublished, date_published, Volume, Issue, Page) Value ('$Re_ID', '$type_Publishedinter', '$datePublished','$Volome','$ISSUE','$PageNo')";
        $result3 = mysqli_query($conn,$sqlPublished);
        echo "seccess";
    }

    // กองทุนภายใน
    if($Status_Funds == "1"){
        $sql_funds_in = "INSERT INTO funds_in (Re_ID, Name_Agency) Value ('$Re_ID','$Agencyin')";
        $result4 = mysqli_query($conn,$sql_funds_in);
    }
    // กองทุนภายนอก
    elseif($Status_Funds == "2"){
        if($type_funds_out == "1"){
            if ($Agencyout == "Other"){
                $Agencyout = $Agencyout_other;
            }
            $sql_funds_out = "INSERT INTO funds_out (Re_ID, Type_Funds_out, Agency_name) Value ('$Re_ID','$type_funds_out','$Agencyout')";
            $result5 = mysqli_query($conn,$sql_funds_out);
        }
        elseif($type_funds_out == "2"){
            $sql_funds_out = "INSERT INTO funds_out (Re_ID, Type_Funds_out, Agency_name) Value ('$Re_ID','$type_funds_out','$Agencyout_service')";
            $result5 = mysqli_query($conn,$sql_funds_out);
        }
        

    }
    header("Location:AddResearch.php");
}

elseif($But_Sub == 'Update'){
        // Add table research
        if ($TypeRe == "Other"){
            $TypeRe = $Type_ReOther;
        }

        $sqlResearch = "UPDATE research SET Name_Leader = '$LeaderName', NameRe_TH = '$NameRe_TH', NameRe_ENG = '$NameRe_Eng', Type_research = '$TypeRe' ";
        $sqlResearch .= ",Bugget = '$Bugget', Time_period = '$dateperiod', Status_stake = '$StatusMemRe', Approve_status = '$Approve_Type', Time_period_approve = '$Time_period'";
        $sqlResearch .= ",Published_status = '$Published_Status', Funds_status = '$Status_Funds' WHERE Re_ID = '$Re_id_Edit'"; 


        $result = mysqli_query($conn,$sqlResearch);
        if($Published_Status == "1"){
            $sqlPublished = "UPDATE published SET TypePublished = '$type_Publishedinter', date_published = '$datePublished'";
            $sqlPublished .=", Volume ='$Volome', Issue = '$ISSUE', Page = '$PageNo' WHERE Re_ID = '$Re_id_Edit'";
            $result3 = mysqli_query($conn,$sqlPublished);
            
        }
        elseif($Published_Status == "2"){
            $sqlDelete = "DELETE published WHERE Re_ID = '$Re_id_Edit'";
            $resultDelete3 = mysqli_query($conn,$sqlDelete);
        }
    
        // กองทุนภายใน
        if($Status_Funds == "1"){
            $sql_funds_in = "UPDATE funds_in SET  Name_Agency = '$Agencyin' WHERE Re_ID = '$Re_id_Edit'";
            $result4 = mysqli_query($conn,$sql_funds_in);

            $sql_funds_out_Delete = "DELETE funds_out WHERE Re_ID = '$Re_id_Edit'";
            $result4Delete_out = mysqli_query($conn,$sql_funds_out_Delete);
        }
        // กองทุนภายนอก
        elseif($Status_Funds == "2"){
            $sql_funds_in_Delete = "DELETE funds_in WHERE Re_ID = '$Re_id_Edit'";
            $result4Delete = mysqli_query($conn,$sql_funds_in_Delete);
            if($type_funds_out == "1"){
                if ($Agencyout == "Other"){
                    echo $Agencyout_other;
                    $Agencyout = $Agencyout_other;
                }
                $sql_funds_out = "UPDATE funds_out SET Type_Funds_out = '$type_funds_out', Agency_name = '$Agencyout' WHERE Re_ID = '$Re_id_Edit' ";
                $result5 = mysqli_query($conn,$sql_funds_out);
                // echo $sql_funds_out;
            }
            elseif($type_funds_out == "2"){
                $sql_funds_out = "UPDATE funds_out SET Type_Funds_out = '$type_funds_out', Agency_name = '$Agencyout_service' WHERE Re_ID = '$Re_id_Edit'";
                $result5 = mysqli_query($conn,$sql_funds_out);
            }
            
    
        }
        //แก้ไขผู้ร่วมวิจัย
        if ($StatusMemRe == 1){
            $membersql = "SELECT * FROM re_member WHERE Re_ID = '$Re_id_Edit'";
            $membersql_query = mysqli_query($conn,$membersql);
            if(mysqli_num_rows($membersql_query)>0){
                for ($i=0;$i < count($NO_Edit);$i++){
                    if($MemberName[$i] == null or $MemberName[$i] == ''){
                        mysqli_query($conn,"DELETE FROM re_member WHERE NO = $NO_Edit[$i]");
                    }
                    else{
                        $MemberName_sql0 = "UPDATE re_member SET MemberName = '$MemberName[$i]' WHERE NO = $NO_Edit[$i]";
                        $MemberName_sql0_query = mysqli_query($conn,$MemberName_sql0);
                    }
                    
                }
            }
            else{
                for ($i=0;$i < count($MemberName);$i++){
                    $MemberName_sql1 = "INSERT INTO re_member (Re_ID, MemberName) VALUE ('$Re_id_Edit','$MemberName[$i]')";
                    $MemberName_sql1_query = mysqli_query($conn,$MemberName_sql1);
                }
            }
        }
        elseif ($StatusMemRe == 2){
            for ($i=0;$i < count($NO_Edit);$i++){
                $MemberName_delete0 = "DELETE FROM re_member WHERE NO = '$NO_Edit[$i]'";
                $MemberName_delete0_query = mysqli_query($conn,$MemberName_delete0);
            } 
        }
    // echo "<script>";
    // echo "alert('อัพเดทข้อมูลสำเร็จ !');";
    // echo "window.location='edit.php';";
    // echo "</script>";
    // header("Location:edit.php");

    

}
elseif($But_Sub == 'Delete'){
    $Delete_sql = "DELETE FROM research WHERE Re_ID = '$Re_id_De'";
    echo $Delete_sql;
    $Delete_query = mysqli_query($conn,$Delete_sql);


    echo "<script>";
    echo "alert('ทำการลบข้อมูลงานวิจัยเสร็จสิ้น');";
    echo "window.location='edit.php';";
    echo "</script>";
}
elseif($But_Sub == 'Edit'){
    header("Location:editdata.php?Re_ID=$Re_id_Edit");
    // echo $Re_id_Edit;
}
elseif($But_Sub == 'back'){
    header("Location:edit.php");
}


?>
