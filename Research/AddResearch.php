<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.syncfusion.com/ej2/dist/ej2.min.js"></script>
    <link href="https://cdn.syncfusion.com/ej2/material.css" rel="stylesheet">
    <title>Document</title>
</head>
<style>
    .FormAddRe{
        width: 1000px;
        height: 700px;
        background: none;
        border: 2px solid black;
    }
</style>
<body>
    <div class="FormAddRe">
    <form action="" method="get">
        <p>ชื่อหัวหน้าโครงงาน <br> <input type="text" placeholder="หัวหน้าโครงงาน"></p>

        <div>
            <p><input type="checkbox" name="Member_Re" id="AddMember_Re" value="Me" onclick="ShowAddMem()" > มีผู้ร่วมวิจัย
            <input type="checkbox" name="Member_Re" id="AddMember_Re2"  value="Non" > ไม่มีผู้ร่วมวิจัย</p>

            
                <p id="ShowAddMember_Re" style="display:none">
                <input type="text" name="" id="" placeholder="ผู้ร่วมวิจัยคนที่ 1">
                <input type="text" name="" id="" placeholder="ผู้ร่วมวิจัยคนที่ 2">
                <input type="text" name="" id="" placeholder="ผู้ร่วมวิจัยคนที่ 3">
                </p>

        </div>

        <div>
        
            ชื่อโครงงาน  <br> ภาษาไทย <input type="text" name="" id="" placeholder="Thailand"> ภาษาอังกฤษ <input type="text" name="" id="" placeholder="English">
            <p> ประเภทงานวิจัย : <Select id="Type_Re" onchange="yesCheck(this);">
                <option value="">การฝึกอบรม สัมนา ออภิปรายและบรรยาย</option>
                <option value="">การค้นคว้า สำรวจ วิเคราะห์ ทดสอบและตรวจสอบ</option>
                <option value="">การให้คำปรึกษาทางวิชาการและวิชาชีพ</option>
                <option value="">การให้บริการเกี่ยวกับหลักสูตรการเรียนการสอน</option>
                <option value="">การให้บริการทางด้านเทคโนโลยีการศึกษา</option>
                <option value="">การให้บริการวิจัย</option>
                <option value="">การวางระบบ ออกแบบและประดิษฐ์</option>
                <option value="">การเขียนทางวิชาการและงานแปล</option>
                <option value="">การให้บริการสารสนเทศ</option>
                <option value="Other">อื่น ๆ (ระบุ)</option>
                
            </Select>
            <p id= "TypeRe_Other" style="display: none;"> <input type="text" name="" id="" placeholder="โปรดระบุประเภทงานวิจัย"></p>
            </p>
        </div>

        <!-- start แหล่งเงินทุน -->
        <fieldset class="fieldset">
            <legend> <p>แหล่งเงินทุน</p></legend>

            <p><input type="checkbox" name="" id="Capital_Sidein" onclick="Cap_Sidein()" >แหล่งทุนภายใน
            <div id="ShowCapital_in" style="display: none;"> <input type="text" name="" id="" placeholder="โปรดกรอกหน่วยงานภายใน"></div>
            </p>

            <p>
            <input type="checkbox" name="" id="Capital_Sideout" onclick="Cap_Sideout()">แหล่งทุนภายนอก
            <div id="ShowCapital_out" style="display: none;">

                <div>
                    <input type="checkbox" name="" id="Cap_Reseach" onclick="Detil_TypeRe()"> งานวิจัย

                    <div id="ShowDetil_TypeRe" style="display: none; ">   
                    <select name="" id="" onchange="CheckCap_Out(this);">
                    <option value="">แผ่นดิน</option>
                    <option value="Other">อื่น ๆ </option>
                    </select>
                    <p id= "Re_CapOut" style="display: none;"> <input type="text" name="" id="" placeholder="โปรดระบุ"></p>

                    </div>
                </div>

                <div>
                    <input type="checkbox" name="" id="BoxService_Aca" onclick="Service_Aca()"> บริการวิชาการ
                    <p id= "ShowService_Aca" style="display: none;"> <input type="text" name="" id="" placeholder="โปรดระบุ"></p>
                </div>

            </div>
            </p>
                
        </fieldset>
        <!-- Stop แหล่งเงินทุน -->

        <div> งบประมาณ <input type="text"> /บาท </div>

        <div>ระยะเวลาในการดำเนิน 
        <input id="datepicker" type="text">

        <script>
            var datepicker = new ej.calendars.DatePicker({ width: "255px" });
            datepicker.appendTo('#datepicker');
        </script>

    
        </div>
        <button type="submit">Save</button>
    </form>
    </div>



    

    
</body>
<script>
            


        function ShowAddMem() {

            var checkBox = document.getElementById("AddMember_Re");
            var text = document.getElementById("ShowAddMember_Re");
            if (checkBox.checked == true){
                text.style.display = "block";
            } 
            else{
                text.style.display = "none";
            }
        }
        function yesCheck(SelectOther) {
            var ShowOther = document.getElementById("TypeRe_Other");

            if (SelectOther.value == "Other") {
                ShowOther.style.display = "block";
            } else {
                ShowOther.style.display = "none";
            }
        }
        function Cap_Sidein(){
            var BoxCap = document.getElementById("Capital_Sidein");
            var ShowCap_Sidein = document.getElementById("ShowCapital_in");
            if (BoxCap.checked == true){
                ShowCap_Sidein.style.display = "block";
            }
            else{
                ShowCap_Sidein.style.display = "none";
            }
        }
        function Cap_Sideout(){
            var BoxCap = document.getElementById("Capital_Sideout");
            var ShowCap_Sideout = document.getElementById("ShowCapital_out");
            if (BoxCap.checked == true){
                ShowCap_Sideout.style.display = "block";
            }
            else{
                ShowCap_Sideout.style.display = "none";
            }
        }
        function Detil_TypeRe(){
            var BoxCap_outRe = document.getElementById("Cap_Reseach");
            var ShowCap_outTypeRe = document.getElementById("ShowDetil_TypeRe");
            if (BoxCap_outRe.checked == true){
                ShowCap_outTypeRe.style.display = "block";
            }
            else{
                ShowCap_outTypeRe.style.display = "none";
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
        function Service_Aca() {
            var Box_Aca = document.getElementById("BoxService_Aca");
            var Show_Aca = document.getElementById("ShowService_Aca");
            if (Box_Aca.checked == true){
                Show_Aca.style.display = "block";
            }
            else{
                Show_Aca.style.display = "none";
            }
        }
</script>


</html>