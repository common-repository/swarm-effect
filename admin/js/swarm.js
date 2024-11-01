$ = jQuery.noConflict();
jQuery(document).ready(function () {

	/*-----------------------------Validation for Swarm Effects Form--------------------------------*/
	
	$('#swarm-form').submit(function () {
        var error = 0;
        
        $(".swarm-tab-div-page").hide();
		$(".swarm-active-tab").removeClass("swarm-active-tab");
		
        $count = $(".swarm_effects_exists_count").attr("data-count");
        $edit_swarm = $("input[name='addswarm']").val();
        //alert($edit_swarm);
        if($count == 3 && $edit_swarm == 1){
        	//alert("false");
        	error = 1;
    	} 
       
        $min = $('input[name="swarm-amount-min"]').val();
    	$max = $('input[name="swarm-amount-max"]').val();
    	
    	$min_sec = $('input[name="show-min-second"]').val();
	       
	    $max_sec = $('input[name="show-max-second"]').val();
	
		//alert($min.length);
		//alert($max.length);
        $(".swarm-error-validation").remove();
        
        if ($.trim($('input[name="swarm-add-name"]').val()) === '') {
            $('input[name="swarm-add-name"]').after("<span class='swarm-error-validation'>Please Enter Name</span>");
           
            $("#swarm-add").addClass("swarm-active-tab");
			$(".swarm-add").show();
            
			error = 1;
            
        }else if ($.trim($('input[name="swarm-add-title"]').val()) === '') {
            $('input[name="swarm-add-title"]').after("<span class='swarm-error-validation'>Please Enter Title</span>");
            
            $("#swarm-add").addClass("swarm-active-tab");
			$(".swarm-add").show();
            
			error = 1;
            
        }else if($.trim($('select[name="swarm_menu_icon"]').val()) === ''){
        	 $('select[name="swarm_menu_icon"]').after("<span class='swarm-error-validation'>Please Select Icon</span>");
             
        	 $("#swarm-add").addClass("swarm-active-tab");
 			 $(".swarm-add").show();
        	 
 			error = 1;
        	 
        }else if($.trim($('textarea[name="swarm-add-text"]').val()) === ''){
        	$('textarea[name="swarm-add-text"]').after("<span class='swarm-error-validation'>Please Enter Text</span>");
           
        	$("#swarm-add").addClass("swarm-active-tab");
			$(".swarm-add").show();
        	
			error = 1;
        	
        }else if(($min.length  >= 1) && ($max.length < 1)){
        	//alert("in");
    		$('input[name="swarm-amount-max"]').after("<span class='swarm-error-validation'>Please Enter Maximum Amount</span>");
        	
    		$("#swarm-add").addClass("swarm-active-tab");
			$(".swarm-add").show();
    		
			error = 1;
        	
        }else if(($min.length  >= 1) && (parseFloat($min) > parseFloat($max)) && $max.length >= 1){	
    		//alert("in");
    		$('input[name="swarm-amount-min"]').after("<span class='swarm-error-validation'>Minimum Amount must be less than Maximum Amount.</span>");
    		$('input[name="swarm-amount-max"]').after("<span class='swarm-error-validation'>Maximum Amount must be Greater than Minimum Amount.</span>");
    		
    		$("#swarm-add").addClass("swarm-active-tab");
			$(".swarm-add").show();
    		
			error = 1;
    			
        }else if(($max.length >= 1) && ($min.length < 1)){
        	//alert("in");
    		$('input[name="swarm-amount-min"]').after("<span class='swarm-error-validation'>Please Enter Minimum Amount</span>");
        	
    		$("#swarm-add").addClass("swarm-active-tab");
			$(".swarm-add").show();
    		
			error = 1;
   			
        }else if ($.trim($('select[name="swarm-background-color"]').val()) === '') {
        	
           $('select[name="swarm-background-color"]').after("<span class='swarm-error-validation'>Please Select Theme</span>");
           
           $("#swarm-design").addClass("swarm-active-tab");
		   $(".swarm-design").show();
           
		   error = 1;
			   
	    }else if ($.trim($('input[name="show-min-second"]').val()) === '') {
        	
            $('.swarm-min-sec-text').after("<span class='swarm-error-validation'>Please Enter Min Value</span>");
            
            $("#swarm-design").addClass("swarm-active-tab");
			$(".swarm-design").show();
            
			error = 1;
			
        }else if ($.trim($('input[name="show-max-second"]').val()) === '') {
            
	    	$('.swarm-max-sec-text').after("<span class='swarm-error-validation'>Please Enter Max Value</span>");
           
            $("#swarm-design").addClass("swarm-active-tab");
			$(".swarm-design").show();
            
			error = 1;
			
        }else if(($('input[name="show-min-second"]').val() != '') && ($.trim($('input[name="show-min-second"]').val()) < 15)){
	    	   
        		$('.swarm-min-sec-text').after("<span class='swarm-error-validation'>Enter Value Minimum 15 Seconds or Greater</span>");
	           
        		$("#swarm-design").addClass("swarm-active-tab");
     			$(".swarm-design").show();
        		
        		error = 1;
	           
	           
	    }else if(parseFloat($max_sec) < parseFloat($min_sec)){
	    	   
	    	   $('.swarm-max-sec-text').after("<span class='swarm-error-validation'>Maximum Seconds must be Greater than Minimum Seconds.</span>");
	          
	    	    $("#swarm-design").addClass("swarm-active-tab");
				$(".swarm-design").show();
	    	   
	    	   error = 1;
	           
	    }else if($.trim($('input[name="swarm-actual-position"]').val()) === ''){
        	//alert("blank");
        	$('.position-validation-error').html("<span class='swarm-error-validation'>Please Select Position</span>");
        	
        	$("#swarm-position").addClass("swarm-active-tab");
			$(".swarm-position").show();
        	
			error = 1;
        }  
       

        if (error) {
            return false;
        } else {
            return true;
        }
    });

	/*-----------------------------Validation for Swarm Effects Form--------------------------------*/
	
	/*---------------------------------Go to next tab -----------------------------------*/
	$(".swarm-next-btn").click(function(){
		var error;
		
		$active_tab_id = $(".swarm-active-tab").attr("id");
		
		$(".swarm-error-validation").remove();
		
		if($active_tab_id == "swarm-add"){	
			
	        if ($.trim($('input[name="swarm-add-name"]').val()) === '') {
	            $('input[name="swarm-add-name"]').after("<span class='swarm-error-validation'>Please Enter Name</span>");
	            error = 1;
	        }
	        
	        if ($.trim($('input[name="swarm-add-title"]').val()) === '') {
	            $('input[name="swarm-add-title"]').after("<span class='swarm-error-validation'>Please Enter Title</span>");
	            error = 1;
	        }
	        
	        if($.trim($('select[name="swarm_menu_icon"]').val()) === ''){
	       	 $('select[name="swarm_menu_icon"]').after("<span class='swarm-error-validation'>Please Select Icon</span>");
	            error = 1;
	       }
	       if($.trim($('textarea[name="swarm-add-text"]').val()) === ''){
	       	$('textarea[name="swarm-add-text"]').after("<span class='swarm-error-validation'>Please Enter Text</span>");
	           error = 1;
	       }
       
		}
       
		if($active_tab_id == "swarm-design"){
				
		   if ($.trim($('select[name="swarm-background-color"]').val()) === '') {
	           $('select[name="swarm-background-color"]').after("<span class='swarm-error-validation'>Please Select Theme</span>");
	           error = 1;
	       }
		   
		   if ($.trim($('input[name="show-min-second"]').val()) === '') {
	           $('.swarm-min-sec-text').after("<span class='swarm-error-validation'>Please Enter Min Seconds</span>");
	           error = 1;
	       }
		   
		   if(($('input[name="show-min-second"]').val() != '') && ($.trim($('input[name="show-min-second"]').val()) < 15)){
	    	   $('.swarm-min-sec-text').after("<span class='swarm-error-validation'>Enter Value Minimum 15 Seconds or Greater</span>");
	           error = 1;
	       }
		   
	       if ($.trim($('input[name="show-max-second"]').val()) === '') {
	           $('.swarm-max-sec-text').after("<span class='swarm-error-validation'>Please Enter Max Seconds</span>");
	           error = 1;
	       }
	       
	       $min_sec = $('input[name="show-min-second"]').val();
	       
	       $max_sec = $('input[name="show-max-second"]').val();
	       
	       if(parseFloat($max_sec) < parseFloat($min_sec)){
	    	   $('.swarm-max-sec-text').after("<span class='swarm-error-validation'>Maximum Seconds must be Greater than Minimum Seconds.</span>");
	           error = 1;
	       }

		}
		
		if($active_tab_id == "swarm-position"){
			
			if($.trim($('input[name="swarm-actual-position"]').val()) === ''){
	        	//alert("blank");
	        	$('.position-validation-error').html("<span class='swarm-error-validation'>Please Select Position</span>");
	        	 error = 1;
	        }
		}
		
		//--------------------For Validation Of Amount Min/Max(Optional)------------------------------//
		
        if($('input[name="swarm-amount-min"]').val().length  >= 1){
        	       	
        	if($('input[name="swarm-amount-max"]').val() === ''){
        		$('input[name="swarm-amount-max"]').after("<span class='swarm-error-validation'>Please Enter Maximum Amount</span>");
	        	 error = 1;
        	}
        	
        	$min = $('input[name="swarm-amount-min"]').val();
        	$max = $('input[name="swarm-amount-max"]').val();

        	if((parseFloat($min) > parseFloat($max)) && $('input[name="swarm-amount-max"]').val().length >= 1){
        	//	alert("in");
        		$('input[name="swarm-amount-min"]').after("<span class='swarm-error-validation'>Minimum Amount must be less than Maximum Amount.</span>");
        		$('input[name="swarm-amount-max"]').after("<span class='swarm-error-validation'>Maximum Amount must be Greater than Minimum Amount.</span>");
        		error = 1;
        	}
        }
        if($('input[name="swarm-amount-max"]').val().length >= 1){
        	if($('input[name="swarm-amount-min"]').val() === ''){
        		$('input[name="swarm-amount-min"]').after("<span class='swarm-error-validation'>Please Enter Minimum Amount</span>");
	        	 error = 1;
        	}
        }
        
        
      //--------------------For Validation Of Amount Min/Max(Optional)------------------------------//
        
        
        if (error) {
            return false;
        } else {     
		
			$(".swarm-tab-div-page").hide();
			$(".swarm-active-tab").removeClass("swarm-active-tab");
			
			$next_tab = $(this).attr("data-tab");
			$next_tab_page = $(this).attr("data-tab-page");
			$("#"+$next_tab).addClass("swarm-active-tab");
			$("."+$next_tab_page).show();
		
		
			return true;
        }
		
	});
	/*---------------------------------Go to next tab -----------------------------------*/
	
	/*-----------------------------Set Cookie onload page get type of page---------------------------*/
	
	if($("body").hasClass("page")){
		document.cookie="pagetype=page";
		//$.cookie("pagetype", "page");
	}else if($("body").hasClass("single")){
		document.cookie="pagetype=post";
		//$.cookie("pagetype", "single");
	}else if($("body").hasClass("home")){
		document.cookie="pagetype=all";
	}
	
	/*-----------------------------Set Cookie onload page get type of page---------------------------*/
	
	
    

    /*----------------------------For Change Add New Menu Tabs-------------------------*/
   
    $(".swarm-tab-div-page").hide();
    $(".swarm-add-form").show();
   
    $('#swarm-add').click(function () {
    	$(".swarm-tab-div-page").hide();
        $(".swarm-add-form").show();
    });
    $('#swarm-design').click(function () {
    	$(".swarm-tab-div-page").hide();
        $(".swarm-design").show();
    });
    $('#swarm-position').click(function () {
    	$(".swarm-tab-div-page").hide();
        $(".swarm-position").show();
    });
    $('#swarm-display-rules').click(function () {
        $(".swarm-tab-div-page").hide();
        $(".swarm-display-rules").show();
    });

    $('#swarm-add').addClass('swarm-active-tab');
    $('.swarm-tab-nav').click(function () {
        $(this).addClass('swarm-active-tab');
        $(this).siblings().removeClass('swarm-active-tab');
    });

    /*----------------------------For Change Add New Menu Tabs-------------------------*/
    
    
    /*----------------------------For Change Add New Menu Tabs-------------------------*/
    $(function () {
        $(".swarm_position_div").click(function () {
            if (!$(this).hasClass("active_position")) {
            	$(".active_position").removeClass("active_position");
                $(this).addClass("active_position");
                
                $right = $(this).attr("data-right");
                $left = $(this).attr("data-left");
                $top = $(this).attr("data-top");
                $bottom = $(this).attr("data-bottom");
                $actual_position = $(this).attr("data-position");
                
                $("input[name='swarm-left-position']").val($left);
                $("input[name='swarm-top-position']").val($top);
                $("input[name='swarm-right-position']").val($right);
                $("input[name='swarm-bottom-position']").val($bottom);
                
                //hidden field
                $("input[name='swarm-actual-position']").val($actual_position);
               
                var arr = $actual_position.split('-');
                               
                //Display Input Fields
                
                $(".position-input-div div input").parent().css("display","none");
                
                if($actual_position == "middle-top"){
                	arr[0] = "right";
                }else if($actual_position == "middle-bottom"){
                	arr[0] = "right";
                }else if($actual_position == "middle-right"){
                	arr[0] = "top";
                }else if($actual_position == "middle-left"){
                	arr[0] = "top";
                }
                
                $("input[name='swarm-"+arr[0]+"-position']").parent().css("display","block");
                $("input[name='swarm-"+arr[1]+"-position']").parent().css("display","block");
                
            } else {
                $(this).removeClass("active_position");
            }
        });
    });
    /*----------------------------For Change Add New Menu Tabs-------------------------*/
    
    
    /*-----------------------------Display Rules div add/remove new div------------------------*/

    $('.show_box').show();
    $('.show_box_add').hide();
    $('#show').click(function () {
        $('.show_box').toggle();
        $('.show_box_add').toggle();
    });

    $('.dshow_box').show();
    $('.dshow_box_add').hide();
    $('#dshow').click(function () {
        $('.dshow_box').toggle();
        $('.dshow_box_add').toggle();
    });

    var counter = 0;
    $("#another").click(function () {
        $(".swarm-dynamic-show-hide").append('<div class="swarm-dynamic" id="remove-' + (counter) + '"> <div class="show"> <select name="show_rules"> <option value="page1">On URL Paths...</option> <option value="page2">Page 2</option> </select> </div> <div class="matching"> <select name="matching"> <option value="Exactly matching">Exactly matching</option> <option value="Exactly matching">Exactly matching</option> </select> </div> <div class="swarm-right-div"> <div class="rules-box"> <input type="text" name="rules-box"> </div> <div class="swarm-delete-rule"> <span class="dashicons dashicons-no-alt"></span> </div> </div> </div> </div>');
        counter++;
        $(".swarm-delete-rule").click(function () {
            $(this).parent().parent().remove();
        });
        return false;
    });


    $(".add-another-rule").hide();
    $("#show").click(function () {
        $("#show").hide();
        $(".add-another-rule").show();
    });

    $("#another").click(function () {
        $(".swarm-dynamic-dshow-hide").append(' <div class="swarm-dynamic"> <div class="dshow"> <select name="dshow_rules"> <option value="page1">On URL Paths...</option> <option value="page2">Page 2</option> </select> </div> <div class="dmatching"> <select name="dmatching"> <option value="Exactly matching">Exactly matching</option> <option value="Exactly matching">Exactly matching</option> </select> </div> <div class="swarm-dright-div"> <div class="drules-box"> <input type="text" name="rules-box"> </div> <div class="swarm-delete-drule"> <span class="dashicons dashicons-no-alt"></span> </div> </div> </div>');
        return false;
    });

    $(".add-another-drule").hide();
    $("#dshow").click(function () {
        $("#dshow").hide();
        $(".add-another-drule").show();
    });
    
    /*-----------------------------Display Rules div add/remove new div------------------------*/
   
    
});

/*------------------------Preview Icon On Select------------------------------*/
jQuery(document).on("change","#swarm_menu_icon",function(){
	$val = $(this).val();
	//alert($val);
	$(".preview_icon i").removeAttr("class");
	$(".preview_icon i").addClass("fa "+$val+"");
});
/*------------------------Preview Icon On Select------------------------------*/

/*-----------------------Active/InActive Swarm Notiofication----------------------*/
jQuery(document).on("change",".swarm_switch",function(e){
	 e.preventDefault();
	$swarm_id = $(this).attr("data-id");
	$swarm_status = $(this).attr("data-status");
	$url = $(this).attr("data-url");
	
	if($("#swarm-input-"+$swarm_id+"").is(':checked')){
		$swarm_status = 1;
		$(this).attr("data-status","0");
	}else{
		$swarm_status = 0;
		$(this).attr("data-status","1");
	}
	
	$.ajax({
		type:"POST",
		data:{'action':'swarm_effect_status_ajax_request','swarm_edit_id':$swarm_id,'swarm_status':$swarm_status},
		url:$url,
		success:function(){
			if($swarm_status == 1){
				$("body").append("<div class='success_alert' style='display:none;'>Enable</div>");
				$(".success_alert").fadeIn( "slow" );
			}else{
				$("body").append("<div class='success_alert' style='display:none;'>Disable</div>");
				$(".success_alert").fadeIn( "slow" );
			}
			
			setTimeout(function(){ 
				$(".success_alert").fadeOut( "2000",function(){ $(this).remove();} );
			}, 5000);
			
		}
	});
});

/*-----------------------Active/InActive Swarm Notiofication----------------------*/

/*---------------------------------Remove Swarm Notiofication-------------------------*/
jQuery(document).on("click",".remove-swarm",function(){
	$swarm_id = $(this).attr("data-id");
	
	$("#swarm-remove-div-"+$swarm_id+"").show();
	$("body").append('<div class="remove-popup-background"></div>');
});

jQuery(document).on("click",".swarm-remove-yes",function(e){
	e.preventDefault();
	$swarm_id = $(this).attr("data-id");
	$url = $(this).attr("data-url");
	
	$.ajax({
		type:"POST",
		data:{'action':'swarm_effect_remove_swarm_ajax_request','swarm_delete_id':$swarm_id},
		url:$url,
		success:function(){
			
			$("#swarm-remove-div-"+$swarm_id+"").parent().parent().remove();
			
			$(".remove-popup-background").remove();
			$("body").append("<div class='success_alert' style='display:none;'>Deleted</div>");
			$(".success_alert").fadeIn( "slow" );
			
			setTimeout(function(){ 
				$(".success_alert").fadeOut( "2000",function(){ $(this).remove();} );
			}, 5000);
			
			
			
		}
	});
	
});

jQuery(document).on("click",".swarm-remove-no",function(){
	
	$swarm_id = $(this).attr("data-id");
	
	$(".remove-popup-background").remove();
	$("#swarm-remove-div-"+$swarm_id+"").hide();
});

/*---------------------------------Remove Swarm Notiofication-------------------------*/

/*---------------------------------Background color preview--------------------------*/
jQuery(document).on("change","#swarm-background-color",function(){
	$val = $(this).val();
	//alert($val);
	$(".swarm_previw_bg").css("background-color","#"+$val+"");
	//alert($val);
	if($val == "000000"){
		$color="ffffff";
	}else if($val == "ffffff"){
		$color="000000";
	}else if($val == "26C281"){
		$color="000000";
	}
	//alert($color);
	$(".swarm_previw_bg").css("color","#"+$color+"");
	
});

/*---------------------------------Background color preview--------------------------*/
/*-----------------------------For Get Color Picker---------------------------*/


jQuery(document).ready(function($){
	
	
	//###############################Swarm Text Color
	 $('#swarm_text_color').iris({
		    palettes: true,
		    change: function(event, ui) {
		    $("#swarm_text_color_span").css( 'background', ui.color.toString());
		    }
	 });


	$(document).click(function (e) {
        if (!$(e.target).is("#swarm_text_color, .iris-picker, .iris-picker-inner")) {
            $('#swarm_text_color').iris('hide');
        
        }
    });
    $('#swarm_text_color').click(function (event) {
        $('#swarm_text_color').iris('hide');
        $(this).iris('show');
    
    });
    
  //###############################Swarm Text Color
    
  //###############################Swarm Icon Color
    
    $('#swarm_icon_color').iris({
	    palettes: true,
	    change: function(event, ui) {
	    $("#swarm_icon_color_span").css( 'background', ui.color.toString());
	    }
    });

	$(document).click(function (e) {
	    if (!$(e.target).is("#swarm_icon_color, .iris-picker, .iris-picker-inner")) {
	        $('#swarm_icon_color').iris('hide');
	    
	    }
	});
	$('#swarm_icon_color').click(function (event) {
	    $('#swarm_icon_color').iris('hide');
	    $(this).iris('show');
	
	});
	
  //###############################Swarm Icon Color
	
//###############################Swarm Background Color
    
    $('#swarm_background_color').iris({
	    palettes: true,
	    change: function(event, ui) {
	    $("#swarm_background_color_span").css( 'background', ui.color.toString());
	    }
    });

	$(document).click(function (e) {
	    if (!$(e.target).is("#swarm_background_color, .iris-picker, .iris-picker-inner")) {
	        $('#swarm_background_color').iris('hide');
	    
	    }
	});
	$('#swarm_background_color').click(function (event) {
	    $('#swarm_background_color').iris('hide');
	    $(this).iris('show');
	
	});
	
  //###############################Swarm Background Color
  //###############################Swarm Border Color
    
    $('#swarm_border_color').iris({
	    palettes: true,
	    change: function(event, ui) {
	    $("#swarm_border_color_span").css( 'background', ui.color.toString());
	    }
    });

	$(document).click(function (e) {
	    if (!$(e.target).is("#swarm_border_color, .iris-picker, .iris-picker-inner")) {
	        $('#swarm_border_color').iris('hide');
	    
	    }
	});
	$('#swarm_border_color').click(function (event) {
	    $('#swarm_border_color').iris('hide');
	    $(this).iris('show');
	
	});
	
  //###############################Swarm Border Color
});

/*-----------------------------For Get Color Picker---------------------------*/

