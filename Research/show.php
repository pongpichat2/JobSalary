<?php
require("connect.php");
// $sql = "SELECT * FROM (research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)";
$sql = "SELECT * FROM ((research INNER JOIN fundsstatus ON research.Funds_Status = fundsstatus.Funds_Status)"
        ."INNER JOIN approve_status ON research.Approve_status = approve_status.Approve_ID)";
// echo $sql;


?>
<html>
<title>Research</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.5/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/dataTables.responsive.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.5/js/responsive.bootstrap.min.js"></script>
    

    <a href="AddResearch.php">AddResearch Page</a>
    <div class="container">
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
        <thead>
            <tr>
                <th>ผู้วิจัย</th>
                <th>ชื่อโครงการวิจัย(ภาษาไทย)</th>
                <th>ระยะเวลาดำเนินงาน</th>
                <th>งบปนะมาณ</th>
                <th>ขออุมัติดำเนินโครงงาน</th>
                <th>แหล่งเงินทุน</th>
                <th>ชื่อโครางงานวิจัย(ภาษาอังกฤษ)</th>
                <th>ชื่อผู้ร่วมวิจัย</th>
                <th>ประเภทงานวิจัย</th>
                <th>ผลงานตีพิมพ์</th>
                <!-- <?php if($funds_status_row == 1){echo "<th>Volume</th>";}?>
                <?php if($funds_status_row == 2){echo "";}?> -->
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
                    // echo $member;
                    $member_query = mysqli_query($conn,$member);
                    if (mysqli_num_rows($member_query)>0){
                        $count = 1;
                        $member.="WHERE research.Re_ID = '$Re_id'";
                        $member_fetch_query = mysqli_query($conn,$member);
                        while ($member_fetch_row = mysqli_fetch_assoc($member_fetch_query)){
                            $membername = $member_fetch_row['MemberName'];
                            if($count == 1){
                                $membername1 = $member_fetch_row['MemberName'];
                            }
                            if($count == 2){
                                $membername2 = $member_fetch_row['MemberName'];
                            }
                            if($count == 3){
                                $membername3 = $member_fetch_row['MemberName'];
                            }
                            $count = $count+1;
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
                    echo "<td>". $row['Name_leader'] ."</td>" 
                    ."<td>". $row['NameRe_TH'] ."</td>"
                    ."<td>". $row['Time_period'] ."</td>"
                    ."<td>". $row['Bugget'] ."</td>"
                    ."<td>".$row['Approve'] ."  ระยะเวลา :  ". $row['Time_period_approve'] ."</td>"
                    ."<td>". $funds_type; if ($funds_status == 2){echo $string;}  echo "  จากหน่วยงาน :  ". $fund ."</td>";
                    echo "<td>". $row['NameRe_ENG'] ."</td>";
                    if($StatusStake == '1'){
                        echo "<td>". $membername1 ." , ".$membername2." , ".$membername3."</td>";
                    }
                    elseif($StatusStake == '2'){
                        echo "<td>". $StringNonStake ."</td>";
                    }
                    
                    echo"<td>". $row['Type_research'] ."</td>"
                    ."<td>"; if($publish_status == 1){echo $publish_1."<br>" .$DataPublished;} 
                    if($publish_status == 2){echo $non_publish1;} echo " </td>";

                }
          
                ?>
            </tr>
        </tbody>
    </table>
    </div>
    

</html>
<script>
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>


