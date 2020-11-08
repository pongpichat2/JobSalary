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
                  $("#new_chq").empty();
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
            $('#sum-cost').val(sum_cost);
            });
            

            var sum_cost_vat = 0;
            $('.vat').each(function(){
                var total_cost_vat = $(this).val();
                if($.isNumeric(total_cost_vat)){
                    sum_cost_vat += parseFloat(total_cost_vat);
                }
                $('#sum-cost-vat').val(sum_cost_vat);
            });
            

           
            var sum_cost_vat_faculty = 0;
            $('.vat-faculty').each(function(){
                var total_cost_vat_faculty = $(this).val();
                if($.isNumeric(total_cost_vat_faculty)){
                    sum_cost_vat_faculty += parseFloat(total_cost_vat_faculty);
                }
                
            });
            $('#sum-cost-vat-faculty').val(sum_cost_vat_faculty);
           
        });
        // var sum_cost = parseFloat(costone)+parseFloat(costtwo)+parseFloat(costtree)
        
    });

    $('.Checkbox-Bugget').click(function(){
        if ($(this).is(":checked")){

            $(this).val('1');
  
            var costone = document.getElementById('cost-one').value;
            var costone_maintain = costone*0.1
            $('#cost-one-vat').val(costone_maintain);

            var costtwo = document.getElementById('cost-two').value;
            var costtwo_maintain = costtwo*0.1
            $('#cost-two-vat').val(costtwo_maintain);

            var costtree = document.getElementById('cost-tree').value;
            var costtree_maintain = costtree*0.1
            $('#cost-tree-vat').val(costtree_maintain);

            var costtree = document.getElementById('cost-four').value;
            var costtree_maintain = costtree*0.1
            $('#cost-four-vat').val(costtree_maintain);

            var costtree = document.getElementById('cost-five').value;
            var costtree_maintain = costtree*0.1
            $('#cost-five-vat').val(costtree_maintain);

            $('#cost-one').on('input',function(){
                var costone = document.getElementById('cost-one').value;
                var costone_maintain = costone*0.1
 
                $('#cost-one-vat').val(costone_maintain);
                
            });
            $('#cost-two').on('input',function(){
                var costtwo = document.getElementById('cost-two').value;
                var costtwo_maintain = costtwo*0.1

                $('#cost-two-vat').val(costtwo_maintain);

            });
            $('#cost-tree').on('input',function(){
                var costtree = document.getElementById('cost-tree').value;
                var costtree_maintain = costtree*0.1
                $('#cost-tree-vat').val(costtree_maintain);
            });

            $('#cost-four').on('input',function(){
                var costtree = document.getElementById('cost-four').value;
                var costtree_maintain = costtree*0.1
                $('#cost-four-vat').val(costtree_maintain);
            });

            $('#cost-five').on('input',function(){
                var costtree = document.getElementById('cost-five').value;
                var costtree_maintain = costtree*0.1
                $('#cost-five-vat').val(costtree_maintain);
            });
        
        
            var sum_cost_vat = 0;
            
            $('.vat').each(function(){
                var total_cost_vat = $(this).val();
                if($.isNumeric(total_cost_vat)){
                    sum_cost_vat += parseFloat(total_cost_vat);
                }
            });
            $('#sum-cost-vat').val(sum_cost_vat);


            
            

        }
        else{
            $(this).val('2');
            $('#cost-one-vat').val("");
            $('#cost-two-vat').val("");
            $('#cost-tree-vat').val("");
            $('#cost-four-vat').val("");
            $('#cost-fivr-vat').val("");
            $('#sum-cost-vat').val("");
        }

    });

    $('.Checkbox-Bugget-faculty').click(function(){
        if ($(this).is(":checked")){

            $(this).val('1');

            var costone = document.getElementById('cost-one').value;
            var costone_faculty = costone*0.05
            $('#cost-one-vat-faculty').val(costone_faculty);

            var costtwo = document.getElementById('cost-two').value;
            var costtwo_faculty = costtwo*0.05
            $('#cost-two-vat-faculty').val(costtwo_faculty);

            var costtree = document.getElementById('cost-tree').value;
            var costtree_faculty = costtree*0.050
            $('#cost-tree-vat-faculty').val(costtree_faculty);

            var costtree = document.getElementById('cost-four').value;
            var costtree_faculty = costtree*0.050
            $('#cost-four-vat-faculty').val(costtree_faculty);

            var costtree = document.getElementById('cost-five').value;
            var costtree_faculty = costtree*0.050
            $('#cost-five-vat-faculty').val(costtree_faculty);


            $('#cost-one').on('input',function(){
                var costone = document.getElementById('cost-one').value;
                var costone_faculty = costone*0.050
 
                $('#cost-one-vat-faculty').val(costone_faculty);
                
            });
            $('#cost-two').on('input',function(){
                var costtwo = document.getElementById('cost-two').value;
                var costtwo_faculty = costtwo*0.050

                $('#cost-two-vat-faculty').val(costtwo_faculty);

            });
            $('#cost-tree').on('input',function(){
                var costtree = document.getElementById('cost-tree').value;
                var costtree_faculty = costtree*0.050
                $('#cost-tree-vat-faculty').val(costtree_faculty);
            });
        
            $('#cost-four').on('input',function(){
                var costtree = document.getElementById('cost-four').value;
                var costtree_faculty = costtree*0.050
                $('#cost-four-vat-faculty').val(costtree_faculty);
            });

            $('#cost-five').on('input',function(){
                var costtree = document.getElementById('cost-five').value;
                var costtree_faculty = costtree*0.050
                $('#cost-five-vat-faculty').val(costtree_faculty);
            });
        
            var sum_cost_vat_faculty = 0;
            $('.vat-faculty').each(function(){
                var total_cost_vat_faculty = $(this).val();
                if($.isNumeric(total_cost_vat_faculty)){
                    sum_cost_vat_faculty += parseFloat(total_cost_vat_faculty);
                }
            });

            $('#sum-cost-vat-faculty').val(sum_cost_vat_faculty);

            // $('.vat-faculty').on('keyup change',function(){
            //     var sum_cost_vat_faculty = 0;
            //     $('.vat-faculty').each(function(){
            //         var total_cost_vat_faculty = $(this).val();
            //         if($.isNumeric(total_cost_vat_faculty)){
            //             sum_cost_vat_faculty += parseFloat(total_cost_vat_faculty);
            //         }
            //     });
            //     $('#sum-cost-vat-faculty').val(sum_cost_vat_faculty)
            // });

        }
        else{

            $(this).val('2');
            $('#cost-one-vat-faculty').val("");
            $('#cost-two-vat-faculty').val("");
            $('#cost-tree-vat-faculty').val("");
            $('#cost-four-vat-faculty').val("");
            $('#cost-five-vat-faculty').val("");
            $('#sum-cost-vat-faculty').val("");
        }

    });

    

});


function add(){
    $("#new_chq").empty();
   
    var i= document.getElementById("Mebmer_Num").value ;
    
    for (Num = 1; Num <= i; Num++) {

        var new_input="<input type='text' class='MemberResearch' id='Member_"+Num+"' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ "+Num+"' required >";
        // var new_input="<input type='text' class='' id='Member_"+Num+"' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ "+Num+"' required ><button type='button' class='but-Delete' onclick='remove();' id='MemberRe_"+Num+"'>x</button>";
        $('#new_chq').append(new_input);
        $('#total_chq').val(i);
    }


}

    