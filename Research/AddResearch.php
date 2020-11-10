<?php 
require('connect.php');
session_start();
if(!isset($_SESSION['emailAdmin'])) {
    header("Location:show.php");
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
     
    <link rel="stylesheet" href="css/AddResearch.css">
    <script src="js/AddResearch.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
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
    <div class="FormAddRe" style="background: white;">
        <div style="margin-left: 30px;">
        <form action="insertResearch.php" method="POST" enctype="multipart/form-data">
            <p style="font-weight: bold;">ชื่อหัวหน้าโครงงาน :
            <select name="Leader_Re" class="Leader_Research" id="">
                <option value="" selected disabled hidden>โปรดเลือกหัวหน้าโครงงาน</option>
                <option value="1">ผศ.ดร. วสันต์ คำสนาม</option>
                <option value="2">ผศ.ดร. สุทธินันท์ ศรีรัตยาวงค์</option>
                <option value="3">ผศ.ดร. นพรัตน์ เกตุขาว</option>
                <option value="4">ผศ.ดร. ปุริมพัฒน์ สัทธรรมนุวงศ์</option>
                <option value="5">ดร. ปรเมศร์ ปธิเก</option>
                <option value="6">ดร. ฝนทิพย์ จินันทุยา</option>
                <option value="7">ดร. รัชนีวรรณ อังกุรบุตร์</option>
                <option value="8">ผศ.ดร. วิชญ์พล ฟักแก้ว</option>
                <option value="9">ผศ.ดร.สุธรรม อรุณ</option>
                <option value="10">ผศ. นัทธิ์ธนนท์ พงษ์พานิช</option>
                <option value="11">อ. อดิศร ประสิทธิ์ศักดิ์</option>
                <option value="12">รศ.ดร. เชวศักดิ์ รักเป็นไทย</option>
                <option value="13">รศ.ดร. สิทธิเดช วชิราศรีศิริกุล</option>
                <option value="14">รศ.ดร. จงลักษณ์ พาหะซา</option>
                <option value="15">ผศ.ดร. ณัฐพงษ์ โปธิ</option>
                <option value="16">ผศ. ดวงดี แสนรักษ์</option>
                <option value="17">ดร. ดำรงค์ อมรเดชาพล</option>
                <option value="18">ผศ. ดร.ธนาทิพย์ จันทร์คง</option>
                <option value="19">อ. สุรพล ดำรงกกิตติกุล</option>
                <option value="20">อ. กรวิน สุวรรรภักดิ์</option>
                <option value="21">ดร. เกรียงศักดิ์ ไกรกิจราษฎร์</option>
                <option value="22">อ. ธนกานต์ สวนกัน</option>
                <option value="23">ดร. บรรเทิง ยานะ</option>
                <option value="24">อ. วาสนา นากุ</option>
                <option value="25">อ.ศราวุธ แต้โอสถ</option>
                <option value="26">รศ.ดร.ณัฐพงศ์ ดำรงวิริยะนุภาพ</option>
                <option value="27">รศ. กิตติพงษ์ วุฒิจำนงค์</option>
                <option value="28">รศ.ดร. ธนกร ชมภูรัตน์</option>
                <option value="29">ผศ.ดร. ปรีดา ไชยมหาวัน</option>
                <option value="30">ผศ.ดร. สมบูรณ์ เซี่ยงฉิน</option>
                <option value="31">ผศ.ดร. สุริยาวุธ ประอ้าย</option>
                <option value="32">ผศ. ปิยพงษ์ สุวรรณมณีโชติ</option>
                <option value="33">ดร. ธีรพจน์ ศุภวิริยะกิจ</option>
                <option value="34">ดร. ขวัญสิรินภา ธนะวงศ์</option>
                <option value="35">ดร. ปาลินี สุมิตสวรรค์</option>
                <option value="36">ดร. อภิชาต บัวกล้า</option>
                <option value="37">อ. ธเนศ ทองเดชศรี</option>
                <option value="38">อ. ชัยวัฒน์ แสงศรีจันทร์</option>
                <option value="39">อ. สุรเชษ ศรีนารา</option>
                <option value="40">อ. วรจักร จันทร์แว่น</option>
                <option value="41">อ. ณพล ศรีศักดา</option>
                <option value="42">ดร. วรเทพ แซ่ล่อง</option>
                <option value="43">ดร. ทรงวุฒิ ประกายวิเชียร</option>
                <option value="44">ผศ. เอราวิล ถาวร</option>
                <option value="45">ผศ. จักรทอง ทองจัตุ</option>
                <option value="46">ผศ. ดร. พจนศักดิ์ พจนา</option>
                <option value="47">ดร.อัจฉราวดี แก้ววรรณดี</option>
                <option value="48">อ.คมกฤต เมฆสกุล</option>
                <option value="49">อ. พงศ์วิทย์ พรมสุวรรณ</option>
                <option value="50">ดร. อภิศักดิ์ วิทยาประภากร</option>
                <option value="51">อ. อธิคม บุญซื่อ</option>
                <option value="52">อ. เอกชัย แผ่นทอง</option>
                <option value="53">อ. อโณทัย กล้าการขาย</option>
                <option value="54">นางสาวพิมพ์ผกา แก้วษา</option>
                <option value="55">นายกิตติ ไพเจริญ</option>
                <option value="56">นางสาวรสนันท์ เอื้อพิทักษ์สกุล</option>
                <option value="57">นางสาวศิริเพ็ญ บุญสม</option>
                <option value="58">ว่าที่ ร.ต. หญิงสุพัตรา ใจมูลมั่ง</option>
                <option value="59">นางกตัญชลี วันแก้ว</option>
                <option value="60">นางสาวกันติชา ราชคม</option>
                <option value="61">นายรณภัทร อักษรศิริ</option>
                <option value="62">นายธนัตถ์กานต์ ใจสวัสดิ์</option>
                <option value="63">นายเฉลิมรัฐ เกาะแก้ว</option>
                <option value="64">นางสาวสุทธิดา ใจมูลมั่ง</option>
                <option value="65">นางสาวกายรวี ฟูแสง</option>
            </select> </p>
            <div>
            <p style="font-weight: bold;"><input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re" value="1" > มีผู้ร่วมวิจัย
                <input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re2"  value="2" > ไม่มีผู้ร่วมวิจัย</p>

                
                    <div id="ShowAddMember_Re" style="display:none">
                        
                            <p> จำนวนผู้ร่วมวิจัย : <input type="text" id="Mebmer_Num" placeholder="จำนวนผู้วิจัย" class="Member_NumRe"> /คน 
                            <button type="button" class="But-AddMem" id="AddMem" onclick="add()">ยืนยัน</button> </p> 
                             <div id="new_chq"></div>
                            <input type="hidden" value="1" id="total_chq">


                    </div>

            </div>

            <div>
            
            <p style="font-weight: bold;"> 
            ชื่อโครงงาน : <input type="text" class="Re_Name" id="" placeholder="TH" name="NameRe_TH" required>
            ภาษาอังกฤษ : <input type="text" class="Re_Name"  name="NameRe_Eng" id="" placeholder="EN" required></p> 
                <p style="font-weight: bold;"> ประเภทงานวิจัย : <Select id="Type_Re" name ="Type_Re" onchange="yesCheck(this);">
                    <option value="" selected disabled hidden>โปรดเลือกประเภทงานวิจัย</option>
                    <option value="การฝึกอบรม/สัมนา/อภิปรายและบรรยาย">การฝึกอบรม/สัมนา/อภิปรายและบรรยาย</option>
                    <option value="การค้นคว้า/สำรวจ/วิเคราะห์/ทดสอบและตรวจสอบ">การค้นคว้า/สำรวจ/วิเคราะห์/ทดสอบและตรวจสอบ</option>
                    <option value="การให้คำปรึกษาทางวิชาการและวิชาชีพ">การให้คำปรึกษาทางวิชาการและวิชาชีพ</option>
                    <option value="การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน">การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน</option>
                    <option value="การให้บริการทางด้านเทคโนโลยีการศึกษา">การให้บริการทางด้านเทคโนโลยีการศึกษา</option>
                    <option value="การให้บริการวิจัย">การให้บริการวิจัย</option>
                    <option value="การวางระบบ/ออกแบบและประดิษฐ์">การวางระบบ/ออกแบบและประดิษฐ์</option>
                    <option value="การเขียนทางวิชาการและงานแปล">การเขียนทางวิชาการและงานแปล</option>
                    <option value="การให้บริการสารสนเทศ">การให้บริการสารสนเทศ</option>
                    <option value="Other">อื่น ๆ (ระบุ)</option>
                    
                </Select>
                <p id= "TypeRe_Other" style="display: none;"> <input type="text" class="Other" name="Type_Re_Other" id="" placeholder="โปรดระบุประเภทงานวิจัย" ></p>
                </p>
            </div>

            <!-- start แหล่งเงินทุน -->
            <div style="width: 95%;">
            <fieldset class="fieldset">
                <legend> <p>แหล่งเงินทุน</p></legend>

                <p style="font-weight: bold;"><input type="checkbox" class="checkbox1" name="FundsType" id="Capital_Sidein" value="1">แหล่งทุนภายใน
                <div id="ShowCapital_in"  style="display: none;"> <input type="text" class="Other" name="Agency_Sidein_Name" id="" placeholder="โปรดกรอกหน่วยงาน"></div>
                </p>

                <p style="font-weight: bold;">
                <input type="checkbox" class="checkbox1" name="FundsType" id="Capital_Sideout" value="2">แหล่งทุนภายนอก</p>
                <div id="ShowCapital_out" style="display: none;">

                    <div>
                        <input type="checkbox" class="checkbox2" name="Type_funds_out" id="Cap_Reseach" value = "1"> งานวิจัย
                        <div id="ShowDetil_TypeRe" style="display: none; ">
                        <select name="Agency_out" id="" onchange="CheckCap_Out(this);">
                        <option value="แผ่นดิน">แผ่นดิน</option>
                        <option value="รายได้">รายได้</option>
                        <option value="รายได้คณะ">รายได้คณะ</option>
                        <option value="สวทช.">สวทช.</option>
                        <option value="สกสว.">สกสว.</option>
                        <option value="วช.">วช.</option>
                        <option value="อว.">อว.</option>
                        <option value="อวน.">อวน.</option>
                        <option value="Other">อื่น ๆ </option>
                        </select>
                        <p id= "Re_CapOut" style="display: none;"> <input type="text" class="Other" name="Agency_out_other" id="" placeholder="โปรดระบุ"></p>

                        </div>
                    </div>

                    <div>
                        <input type="checkbox" class="checkbox2" name="Type_funds_out" id="BoxService_Aca"  value="2" > บริการวิชาการ
                        <p id= "ShowService_Aca" style="display: none;"> <input type="text" class="Other" name="Agency_out_service" id="" placeholder="โปรดระบุ"></p>
                    </div>

                </div>
                <!-- <div> <p style="font-weight: bold;"> งบประมาณ : <input type="text" name="Bugget" class="Buggle" required > / บาท </p></div> -->
                <p style="font-weight: bold; margin-left:50px; margin-top:40px;" >งบประมาณ</p>
                <table border="2px"  class="Bugget_Re">
                    <thead>
                        <tr>
                        <td>ค่า/งวด</td>
                        <td>งวดที่ 1</td>
                        <td>งวดที่ 2</td>
                        <td>งวดที่ 3</td>
                        <td>งวดที่ 4</td>
                        <td>ค่าประกันผลงาน</td>
                        <td>รวม</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="text-align: center; font-weight:bold;" >จำนวน</td>
                            <td><input type="number" name="cost_1" class="cost" id="cost-one" required pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td><input type="number" name="cost_2" class="cost" id="cost-two" required pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td><input type="number" name="cost_3" class="cost" id="cost-tree" required pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td><input type="number" name="cost_4" class="cost" id="cost-four" required pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td><input type="number" name="cost_5" class="cost" id="cost-five" required pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td class="non_input"><input id="sum-cost" name="Bugget" type="number" placeholder="รวม" readonly></td>
                        </tr>
                        <tr class="tr-non_input">
                            <td ><input type="checkbox" class="Checkbox-Bugget" value="2" name="type_vat_Re" id="">ค่าบำรุงมหาวิทยาลัย 10%</td>
                            <td class="non_input"><input id="cost-one-vat" name="Vat1" class="vat" type="number"  readonly></td>
                            <td class="non_input"><input id="cost-two-vat" name="Vat2" class="vat" type="number" readonly></td>
                            <td class="non_input"><input id="cost-tree-vat" name="Vat3" class="vat" type="number" readonly></td>
                            <td class="non_input"><input id="cost-four-vat" name="Vat4" class="vat" type="number" readonly></td>
                            <td class="non_input"><input id="cost-five-vat" name="Vat5" class="vat" type="number" readonly></td>
                            <td class="non_input"><input id="sum-cost-vat" name="Vat_total" type="number" readonly></td>
                        </tr>
                        <tr class="tr-non_input">
                            <td ><input type="checkbox" class="Checkbox-Bugget-faculty" value="2" name="type_vat_faculty" id="">ค่าบำรุงคณะ 5%</td>
                            <td class="non_input"><input id="cost-one-vat-faculty" name="vat_facul1" class="vat-faculty" type="number"  readonly></td>
                            <td class="non_input"><input id="cost-two-vat-faculty" name="vat_facul2" class="vat-faculty" type="number" readonly></td>
                            <td class="non_input"><input id="cost-tree-vat-faculty" name="vat_facul3" class="vat-faculty" type="number" readonly></td>
                            <td class="non_input"><input id="cost-four-vat-faculty" name="vat_facul4" class="vat-faculty" type="number" readonly></td>
                            <td class="non_input"><input id="cost-five-vat-faculty" name="vat_facul5" class="vat-faculty" type="number" readonly></td>
                            <td class="non_input"><input id="sum-cost-vat-faculty" name="vat_facul_total" type="number" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                </p>
                    
            </fieldset>
            <!-- Stop แหล่งเงินทุน -->

            

            <div> <p style="font-weight: bold;">ระยะเวลาในการดำเนิน :
                <input type="text" name="datefilter" autocomplete="off" class="Date-time-approve" value="" required>
                </p> 
            </div>

            <div>
                <p style="font-weight: bold;">
                สถานะโครงการ : <select name="approve_Type" id="">
                    <option value="" selected disabled hidden>โปรดเลือกสถานะโครงการ</option>
                    <option value="1">เสนอโครงการ</option>
                    <option value="2">เซ็นสัญญา</option>
                    <option value="3">ขออนุมัติดำเนินโครงการ</option>
                    <option value="4">ขออนุมัติเบิกเงิน(รอบ1)</option>
                    <option value="5">ขออนุมัติเบิกเงิน(รอบ2)</option>
                    <option value="6">ขออนุมัติเบิกเงิน(รอบ3)</option>
                    <option value="7">ขออนุมัติขยายเวลา</option>
                    <option value="8">สิ้นสุดโครงการ</option>
                </select>
                </p>
                <div>
                    <p style="font-weight: bold;">ระยะเวลาขอนุมัติ :
                    <input type="text" name="Time_period" autocomplete="off" value="" class="Date-time-approve" >
                    </p> 
                </div>
            </div>

            <div >
                <p style="font-weight: bold;">
                <input type="checkbox" class="checkbox3" name="Published" id="Working" value="1"  >มีผลงานตีพิมพ์
                <input type="checkbox" class="checkbox3" name="Published" id="Working2"  value="2" >ไม่มีผลงานตีพิมพ์
                </p>
                <div id="ShowWorking" style="display: none;">
                    <fieldset style="width:90%;"><legend>ผลงานตีพิมพ์</legend>
                    <p style="font-weight: bold;">
                    ประเภทของงานตีพิมพ์ :
                        <input type="checkbox" class="checkbox4" name="type_Published_inter" id="Inter" value="1"> วารสารระดับชาติ
                        <input type="checkbox" class="checkbox4" name="type_Published_inter" id="Inter2" value="2"> วารสารระดับนานาชาติ <br>
                    </p>
                    <p style="font-weight: bold;">ว/ด/ป ที่เผยแพร่ : <input type="text" autocomplete="off" name="DateDocument" value="" class="Date-time-approve" required></p>
                    
                    <div>
                    <p style="font-weight: bold;">  Volome : <input type="text" placeholder="No." class="Other" name="Volome"> No. ISSUE : <input type="text" class="Other" placeholder="No. ISSUE" name="ISSUE"> <br>
                        หน้าที่พิมพ์ :  <input type="text" name="Page_Published" class="Other" placeholder="หน้าที่พิมพ์">
                        อัปโหลดผลงาน : <input type="file" name="Myfile"><br></p>
                    </div>
                    </fieldset>
                </div>
            </div>
            <div style="text-align: center; height: 70px; margin-top:20px;">
            <button type="submit" class="Btu-Sub" value="Insert" name="but_Submit">Save</button>
            </div>
        </form>
        </div>
    </div>





    
</body>


<script>
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
</script>
</html>