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
function addnoneMem(){
    $("#new_chq").empty();
   
    var i= document.getElementById("Mebmer_Num").value ;
    
    for (Num = 1; Num <= i; Num++) {

        var new_input="<input type='text' class='MemberResearch' id='Member_"+Num+"' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ "+Num+"' required >";
        // var new_input="<input type='text' class='' id='Member_"+Num+"' name='Member[]' placeholder='ผู้ร่วมวิจัยคนที่ "+Num+"' required ><button type='button' class='but-Delete' onclick='remove();' id='MemberRe_"+Num+"'>x</button>";
        $('#new_chq').append(new_input);
        $('#total_chq').val(i);
    }


}
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

$(document).ready(function(){
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
            $('#cost-five-vat').val("");
            $('#sum-cost-vat').val("");
        }
    
    });

    $('.Checkbox-Bugget-faculty').click(function(){
        if ($(this).is(":checked")){
    
            $(this).val('1');
    
            var costone = document.getElementById('cost-one').value;
            var costone_faculty = costone*0.050
            $('#cost-one-vat-faculty').val(costone_faculty);
    
            var costtwo = document.getElementById('cost-two').value;
            var costtwo_faculty = costtwo*0.050
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


