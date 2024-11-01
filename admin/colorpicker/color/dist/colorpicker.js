/*$ = jQuery.noConflict();
jQuery(document).ready(function($){
   $('#color-picker').iris({
    palettes: true,
    change: function(event, ui) {
    $("#color1").css( 'background', ui.color.toString());
    }
   });
   $('#color-picker1').iris({
     palettes: true,
     change: function(event, ui) {
    $("#color2").css( 'background', ui.color.toString());
    }
   });
    $('#color-picker2').iris({
         palettes: true,
         change: function(event, ui) {
    $("#color3").css( 'background', ui.color.toString());
    }
    });


$(document).click(function (e) {
        if (!$(e.target).is("#color-picker, .iris-picker, .iris-picker-inner")) {
            $('#color-picker').iris('hide');
        
        }
    });
    $('#color-picker').click(function (event) {
        $('#color-picker').iris('hide');
        $(this).iris('show');
    
    });
    $(document).click(function (e) {
        if (!$(e.target).is("#color-picker1, .iris-picker, .iris-picker-inner")) {
            $('#color-picker1').iris('hide');
        
        }
    });
    $('#color-picker1').click(function (event) {
        $('#color-picker1').iris('hide');
        $(this).iris('show');
    
    });
        $(document).click(function (e) {
        if (!$(e.target).is("#color-picker2, .iris-picker, .iris-picker-inner")) {
            $('#color-picker2').iris('hide');
        
        }
    });
    $('#color-picker2').click(function (event) {
        $('#color-picker2').iris('hide');
        $(this).iris('show');
    
    });





});*/

$ = jQuery.noConflict();
jQuery(document).ready(function($){
   $('#color-picker').iris({
    palettes: true,
    change: function(event, ui) {
    $("#color1").css( 'background', ui.color.toString());
    }
   });
   $('#color-picker1').iris({
     palettes: true,
     change: function(event, ui) {
    $("#color2").css( 'background', ui.color.toString());
    }
   });
    $('#color-picker2').iris({
         palettes: true,
         change: function(event, ui) {
    $("#color3").css( 'background', ui.color.toString());
    }
    });
	
	 $('#color-picker3').iris({
         palettes: true,
         change: function(event, ui) {
    $("#color4").css( 'background', ui.color.toString());
    }
    });
	
	 $('#color-picker4').iris({
         palettes: true,
         change: function(event, ui) {
    $("#color5").css( 'background', ui.color.toString());
    }
    });


$(document).click(function (e) {
        if (!$(e.target).is("#color-picker, .iris-picker, .iris-picker-inner")) {
            $('#color-picker').iris('hide');
        
        }
    });
    $('#color-picker').click(function (event) {
        $('#color-picker').iris('hide');
        $(this).iris('show');
    
    });
    $(document).click(function (e) {
        if (!$(e.target).is("#color-picker1, .iris-picker, .iris-picker-inner")) {
            $('#color-picker1').iris('hide');
        
        }
    });
    $('#color-picker1').click(function (event) {
        $('#color-picker1').iris('hide');
        $(this).iris('show');
    
    });
        $(document).click(function (e) {
        if (!$(e.target).is("#color-picker2, .iris-picker, .iris-picker-inner")) {
            $('#color-picker2').iris('hide');
        
        }
    });
    $('#color-picker2').click(function (event) {
        $('#color-picker2').iris('hide');
        $(this).iris('show');
    
    });
	
	 $(document).click(function (e) {
        if (!$(e.target).is("#color-picker3, .iris-picker, .iris-picker-inner")) {
            $('#color-picker3').iris('hide');
        
        }
    });
    $('#color-picker3').click(function (event) {
        $('#color-picker3').iris('hide');
        $(this).iris('show');
    
    });
	
	 $(document).click(function (e) {
        if (!$(e.target).is("#color-picker4, .iris-picker, .iris-picker-inner")) {
            $('#color-picker4').iris('hide');
        
        }
    });
    $('#color-picker4').click(function (event) {
        $('#color-picker4').iris('hide');
        $(this).iris('show');
    
    });





});