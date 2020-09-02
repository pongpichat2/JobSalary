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

    <title>Document</title>
</head>
<style>
    .FormAddRe{
        width: 1000px;
        height: 900px;
        background: none;
        border: 2px solid black;
    }
</style>
<body>
    <a href="edit.php">edit page</a>
    <div class="FormAddRe">
    <form action="insertResearch.php" method="POST">
        <p>ชื่อหัวหน้าโครงงาน <br> <input type="text" name="Leader_Re" placeholder="หัวหน้าโครงงาน"></p>

        <div>
        <p><input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re" value="1" > มีผู้ร่วมวิจัย
            <input type="checkbox" class="checkbox" name="TypeMember_Re" id="AddMember_Re2"  value="2" > ไม่มีผู้ร่วมวิจัย</p>

            
                <p id="ShowAddMember_Re" style="display:none">
                <input type="text" name="Member[]" id="" placeholder="ผู้ร่วมวิจัยคนที่ 1">
                <input type="text" name="Member[]" id="" placeholder="ผู้ร่วมวิจัยคนที่ 2">
                <input type="text" name="Member[]" id="" placeholder="ผู้ร่วมวิจัยคนที่ 3">
                </p>

        </div>

        <div>
        
        ชื่อโครงงาน  <br> ภาษาไทย <input type="text"  id="" placeholder="Thailand" name="NameRe_TH"> ภาษาอังกฤษ <input type="text" name="NameRe_Eng" id="" placeholder="English">
            <p> ประเภทงานวิจัย : <Select id="Type_Re" name ="Type_Re" onchange="yesCheck(this);">
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
            <p id= "TypeRe_Other" style="display: none;"> <input type="text" name="Type_Re_Other" id="" placeholder="โปรดระบุประเภทงานวิจัย"></p>
            </p>
        </div>

        <!-- start แหล่งเงินทุน -->
        <fieldset class="fieldset">
            <legend> <p>แหล่งเงินทุน</p></legend>

            <p><input type="checkbox" class="checkbox1" name="FundsType" id="Capital_Sidein" value="1">แหล่งทุนภายใน
            <div id="ShowCapital_in"  style="display: none;"> <input type="text" name="Agency_Sidein_Name" id="" placeholder="โปรดกรอกหน่วยงานภายใน"></div>
            </p>

            <p>
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
                    <p id= "Re_CapOut" style="display: none;"> <input type="text" name="Agency_out_other" id="" placeholder="โปรดระบุ"></p>

                    </div>
                </div>

                <div>
                <input type="checkbox" class="checkbox2" name="Type_funds_out" id="BoxService_Aca"  value="2"> บริการวิชาการ
                    <p id= "ShowService_Aca" style="display: none;"> <input type="text" name="Agency_out_service" id="" placeholder="โปรดระบุ"></p>
                </div>

            </div>
            </p>
                
        </fieldset>
        <!-- Stop แหล่งเงินทุน -->

        <div> งบประมาณ <input type="text" name="Bugget"> /บาท </div>

        <div>ระยะเวลาในการดำเนิน 
            <input type="text" name="datefilter" value="" >

        </div><br>

        <div>
            ขอนุมัติดำเนินโครงการ <select name="approve_Type" id="">
            <option value="1">เสนอโครงการ</option>
            <option value="2">เซ็นสัญญา</option>
            <option value="3">ขออนุมัติดำเนินโครงการ</option>
            <option value="4">ขออนุมัติเบิกเงิน(รอบ1)</option>
            <option value="5">ขออนุมัติเบิกเงิน(รอบ2)</option>
            <option value="6">ขออนุมัติเบิกเงิน(รอบ3)</option>
            <option value="7">ขออนุมัติขยายเวลา</option>
            <option value="8">สิ้นสุดโครงการ</option>
            </select>
            <div>ระยะเวลาขอนุมัติ
                <input type="text" name="Time_period" value="" >
            </div>
        </div>

        <div>
            <input type="checkbox" class="checkbox3" name="Published" id="Working" value="1"  >มีผลงานตีพิมพ์
            <input type="checkbox" class="checkbox3" name="Published" id="Working2"  value="2" >ไม่มีผลงานตีพิมพ์

            <div id="ShowWorking" style="display: none;">
                <fieldset><legend><p>ผลงานตีพิมพ์</p></legend>
                ประเภทของงานตีพิมพ์ :
                    <input type="checkbox" class="checkbox4" name="type_Published_inter" id="Inter" value="1"> วารสารระดับชาติ
                    <input type="checkbox" class="checkbox4" name="type_Published_inter" id="Inter2" value="2"> วารสารระดับนานาชาติ <br>

                ว/ด/ป ที่เผยแพร่ <input type="text" name="DateDocument" value=""><br>
                
                <div>
                    Volome : <input type="text" placeholder="No." name="Volome"> No. ISSUE : <input type="text" placeholder="No. ISSUE" name="ISSUE"> 
                    หน้าที่พิมพ์ :  <input type="text" name="Page_Published" placeholder="หน้าที่พิมพ์">
                </div>
                </fieldset>
            </div>
        </div>
        <button type="submit" value="Insert" name="but_Submit">Save</button>
    </form>
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
        
</script>


</html>