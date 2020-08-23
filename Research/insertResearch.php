<?php
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

$Bugget = "";
$dateperiod = "";
$Approve_Type = "";
$Time_period = "";
$Published_Status = "";
$type_Publishedinter = "";
$datePublished = "";
$Volume = "";
$ISSUE = "";
$PageNo  = "";


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

// Add table research
if ($TypeRe == "Other"){
    $TypeRe = $Type_ReOther;
}
$Re_ID = $NameRe_TH."_".uniqid();

$sqlResearch = "INSERT INTO research (Re_ID, Name_Leader, NameRe_TH, NameRe_ENG, Type_research, Bugget, Time_period, Status_stake, Approve_status, Time_period_approve, Published_status, Funds_status) 
        Value ('$Re_ID','$LeaderName','$NameRe_TH','$NameRe_Eng','$TypeRe','$Bugget','$dateperiod','$StatusMemRe', '$Approve_Type' ,'$Time_period', '$Published_Status', '$Status_Funds')";

$result = mysqli_query($conn,$sqlResearch);

// มีผู้ร่วมวิจัย
if($StatusMemRe == "1"){
    foreach ($MemberName as $Mam_Name ){
    $sqlMember = "INSERT INTO re_member (Re_ID, MemberName) Value ('$Re_ID', '$Mam_Name')";
    $result2 = mysqli_query($conn,$sqlMember);
}

// มีการตีพิมพ์
}
if($Published_Status == "1"){
    $sqlPublished = "INSERT INTO published (Re_ID, TypePublished, date_published, Volume, Issue, Page) Value ('$Re_ID', '$type_Publishedinter', '$datePublished','$Volome','$ISSUE','$PageNo')";
    $result3 = mysqli_query($conn,$sqlPublished);
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






?>