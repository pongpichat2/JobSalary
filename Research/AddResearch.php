<?php 
require('connect.php');
session_start();
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
        margin-top: 20px;
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
    .Bugget_Re tbody .tr-non_input .non_input{
        background: rgba(138, 138, 138, 0.46);
    }
    .Bugget_Re tbody .tr-non_input .non_input input[type='number']{
        border: none;
        width: 100%;
        background: none;
    }
    .Bugget_Re tbody tr input[type='number']{
        border: none;
        box-shadow: none;
        width: 100%;
        background: none;
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
    <div class="FormAddRe" style="background: white;">
        <div style="margin-left: 30px;">
        <form action="insertResearch.php" method="POST">
            <p style="font-weight: bold;">ชื่อหัวหน้าโครงงาน : <input type="text" class="Leader_Name" name="Leader_Re" placeholder="หัวหน้าโครงงาน" required></p>

            <div>
            <p style="font-weight: bold;"><input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re" value="1" > มีผู้ร่วมวิจัย
                <input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re2"  value="2" > ไม่มีผู้ร่วมวิจัย</p>

                
                    <p id="ShowAddMember_Re" style="display:none">
                    <input type="text" class="Member_Re" name="Member[]" id="" placeholder="ผู้ร่วมวิจัยคนที่ 1">
                    <input type="text" class="Member_Re" name="Member[]" id="" placeholder="ผู้ร่วมวิจัยคนที่ 2">
                    <input type="text" class="Member_Re" name="Member[]" id="" placeholder="ผู้ร่วมวิจัยคนที่ 3">
                    </p>

            </div>

            <div>
            
            <p style="font-weight: bold;"> 
            ชื่อโครงงาน : <input type="text" class="Re_Name" id="" placeholder="TH" name="NameRe_TH" required>
            ภาษาอังกฤษ : <input type="text" class="Re_Name" name="NameRe_Eng" id="" placeholder="EN" required></p> 
                <p style="font-weight: bold;"> ประเภทงานวิจัย : <Select id="Type_Re" name ="Type_Re" onchange="yesCheck(this);">
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
                <div> <p style="font-weight: bold;"> งบประมาณ : <input type="text" name="Bugget" class="Other" class="Buggle" required > / บาท </div></p>

                <table border="2px" class="Bugget_Re">
                    <thead>
                        <tr>
                        <td>ค่า/งวด</td>
                        <td>งวดที่ 1</td>
                        <td>งวดที่ 2</td>
                        <td>งวดที่ 3</td>
                        <td>รวม</td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>จำนวน</td>
                            <td><input type="number" class="cost" id="cost-one"  pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td><input type="number" class="cost" id="cost-two" pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td><input type="number" class="cost" id="cost-tree" pattern="0-9" title="กรอกได้เฉพาะตัวเลขเท่านั้น"></td>
                            <td class="non_input"><input id="sum-cost" type="number" placeholder="รวม" readonly></td>
                        </tr>
                        <tr class="tr-non_input">
                            <td ><input type="checkbox" class="Checkbox-Bugget"  name="" id="">ค่าบำรุง 40%</td>
                            <td class="non_input"><input id="cost-one-vat" class="vat" type="number"  readonly></td>
                            <td class="non_input"><input id="cost-two-vat" class="vat" type="number" readonly></td>
                            <td class="non_input"><input id="cost-tree-vat" class="vat" type="number" readonly></td>
                            <td class="non_input"><input id="sum-cost-vat" type="number" readonly></td>
                        </tr>
                        <tr class="tr-non_input">
                            <td ><input type="checkbox" class="Checkbox-Bugget-faculty"  name="" id="">คณะ 5%</td>
                            <td class="non_input"><input id="cost-one-vat-faculty" class="vat-faculty" type="number"  readonly></td>
                            <td class="non_input"><input id="cost-two-vat-faculty" class="vat-faculty" type="number" readonly></td>
                            <td class="non_input"><input id="cost-tree-vat-faculty" class="vat-faculty" type="number" readonly></td>
                            <td class="non_input"><input id="sum-cost-vat-faculty" type="number" readonly></td>
                        </tr>
                    </tbody>
                </table>
            </div>
                </p>
                    
            </fieldset>
            <!-- Stop แหล่งเงินทุน -->

            

            <div> <p style="font-weight: bold;">ระยะเวลาในการดำเนิน :
                <input type="text" name="datefilter" class="Date-time-approve" value="" required>
                </p> 
            </div>

            <div>
                <p style="font-weight: bold;">
                ขอนุมัติดำเนินโครงการ : <select name="approve_Type" id="">
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
                    <input type="text" name="Time_period" value="" class="Date-time-approve">
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
                    <p style="font-weight: bold;">ว/ด/ป ที่เผยแพร่ : <input type="text" name="DateDocument" value="" class="Date-time-approve" required></p>
                    
                    <div>
                    <p style="font-weight: bold;">  Volome : <input type="text" placeholder="No." class="Other" name="Volome"> No. ISSUE : <input type="text" class="Other" placeholder="No. ISSUE" name="ISSUE"> 
                        หน้าที่พิมพ์ :  <input type="text" name="Page_Published" class="Other" placeholder="หน้าที่พิมพ์"></p>
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
    $(document).ready(function(){
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
            if ($(this).is(":checked")) {
                $("#ShowAddMember_Re").show();
            } else {
                $("#ShowAddMember_Re").hide();
            }
        });
        $("#AddMember_Re2").click(function () {
                  if ($(this).is(":checked")) {
                      $("#ShowAddMember_Re").hide();
                  } else {
                      $("#ShowAddMember_Re").hide();
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
        $("#Working2").click(function () {
                  if ($(this).is(":checked")) {
                      $("#ShowWorking").hide();
                  } else {
                      $("#ShowWorking").hide();
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
        $("#BoxService_Aca").click(function () {
                  if ($(this).is(":checked")) {
                      $("#ShowDetil_TypeRe").hide();
                      $("#ShowService_Aca").show();
                  } else {
                      $("#ShowDetil_TypeRe").hide();
                      
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
        $("#Capital_Sideout").click(function () {
                  if ($(this).is(":checked")) {
                    $("#ShowCapital_out").show();
                      $("#ShowCapital_in").hide();
                  } else {
                      $("#ShowCapital_out").hide();
                      
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


        $(function(){
           
            $('.cost').on('input',function(){
                var sum_cost = 0;
                $('.cost').each(function(){
                    var total_cost = $(this).val();
                    if($.isNumeric(total_cost)){
                        sum_cost += parseFloat(total_cost);
                    }
                });
                $('#sum-cost').val(sum_cost)
            });
            // var sum_cost = parseFloat(costone)+parseFloat(costtwo)+parseFloat(costtree)
            
        });

        $('.Checkbox-Bugget').click(function(){
            if ($(this).is(":checked")){
                var costone = document.getElementById('cost-one').value;
                var costone_maintain = costone*0.4
                $('#cost-one-vat').val(costone_maintain);

                var costtwo = document.getElementById('cost-two').value;
                var costtwo_maintain = costtwo*0.4
                $('#cost-two-vat').val(costtwo_maintain);

                var costtree = document.getElementById('cost-tree').value;
                var costtree_maintain = costtree*0.4
                $('#cost-tree-vat').val(costtree_maintain);

                $('#cost-one').on('input',function(){
                    var costone = document.getElementById('cost-one').value;
                    var costone_maintain = costone*0.4
     
                    $('#cost-one-vat').val(costone_maintain);
                    
                });
                $('#cost-two').on('input',function(){
                    var costtwo = document.getElementById('cost-two').value;
                    var costtwo_maintain = costtwo*0.4
  
                    $('#cost-two-vat').val(costtwo_maintain);

                });
                $('#cost-tree').on('input',function(){
                    var costtree = document.getElementById('cost-tree').value;
                    var costtree_maintain = costtree*0.4
                    $('#cost-tree-vat').val(costtree_maintain);
                });
            
            
                var sum_cost_vat = 0;
                $('.vat').each(function(){
                    var total_cost_vat = $(this).val();
                    if($.isNumeric(total_cost_vat)){
                        sum_cost_vat += parseFloat(total_cost_vat);
                    }
                });
                $('#sum-cost-vat').val(sum_cost_vat)


                // $('#cost-tree-vat').val('99999999').change();
                // $('.vat').on('change keyup',function(){
                //     var sum_cost_vat = 0;
                //     $('.vat').each(function(){
                //         var total_cost_vat = $(this).val();
                //         if($.isNumeric(total_cost_vat)){
                //             sum_cost_vat += parseFloat(total_cost_vat);
                //         }
                //     });
                //     $('#sum-cost-vat').val(sum_cost_vat)
                // });
                

            }
            else{
                $('#cost-one-vat').val("");
                $('#cost-two-vat').val("");
                $('#cost-tree-vat').val("");
                $('#sum-cost-vat').val("")
            }

        });
        $('.Checkbox-Bugget-faculty').click(function(){
            if ($(this).is(":checked")){
                var costone = document.getElementById('cost-one').value;
                var costone_faculty = costone*0.05
                $('#cost-one-vat-faculty').val(costone_faculty);

                var costtwo = document.getElementById('cost-two').value;
                var costtwo_faculty = costtwo*0.05
                $('#cost-two-vat-faculty').val(costtwo_faculty);

                var costtree = document.getElementById('cost-tree').value;
                var costtree_faculty = costtree*0.05
                $('#cost-tree-vat-faculty').val(costtree_faculty);

                $('#cost-one').on('input',function(){
                    var costone = document.getElementById('cost-one').value;
                    var costone_faculty = costone*0.05
     
                    $('#cost-one-vat-faculty').val(costone_faculty);
                    
                });
                $('#cost-two').on('input',function(){
                    var costtwo = document.getElementById('cost-two').value;
                    var costtwo_faculty = costtwo*0.05
  
                    $('#cost-two-vat-faculty').val(costtwo_faculty);

                });
                $('#cost-tree').on('input',function(){
                    var costtree = document.getElementById('cost-tree').value;
                    var costtree_faculty = costtree*0.05
                    $('#cost-tree-vat-faculty').val(costtree_faculty);
                });
            
            
                var sum_cost_vat_faculty = 0;
                $('.vat-faculty').each(function(){
                    var total_cost_vat_faculty = $(this).val();
                    if($.isNumeric(total_cost_vat_faculty)){
                        sum_cost_vat_faculty += parseFloat(total_cost_vat_faculty);
                    }
                });
                $('#sum-cost-vat-faculty').val(sum_cost_vat_faculty)


                $('.vat-faculty').on('keyup change',function(){
                    var sum_cost_vat_faculty = 0;
                    $('.vat-faculty').each(function(){
                        var total_cost_vat_faculty = $(this).val();
                        if($.isNumeric(total_cost_vat_faculty)){
                            sum_cost_vat_faculty += parseFloat(total_cost_vat_faculty);
                        }
                    });
                    $('#sum-cost-vat-faculty').val(sum_cost_vat_faculty)
                });

            }
            else{
                $('#cost-one-vat-faculty').val("");
                $('#cost-two-vat-faculty').val("");
                $('#cost-tree-vat-faculty').val("");
                $('#sum-cost-vat-faculty').val("")
            }

        });

        
 
    });
        
</script>


</html>