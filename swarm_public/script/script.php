<?php 

//Create Script For Swarm Notification

$variable1 = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $val->swarm_name);
$variable1 = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $variable1);
$variable2 = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $val->swarm_city);
$variable2 = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $variable2);
?> 
jQuery(document).ready(function($) {


	<?php 
	//For Left-Top Position And For Left-Bottom Position And For Middle-Left Position
	if($effects_position['actual_position'] == "left-top" || $effects_position['actual_position'] == "left-bottom" || $effects_position['actual_position'] == "middle-left"){
	    if (isset($effects_position['left_position']) && $effects_position['left_position'] != 0){
	        $position = "left:'-10%'";
	    }
	}
	
	//For Right-Top Position And Right-Bottom Position And For Middle-Right Position
	if($effects_position['actual_position'] == "right-top" || $effects_position['actual_position'] == "right-bottom" || $effects_position['actual_position'] == "middle-right"){
	    if (isset($effects_position['right_position']) && $effects_position['right_position'] != 0){
	         $position = "right:'-10%'";
	    }
	}
	
	//For Middle Top Position
	if($effects_position['actual_position'] == "middle-top"){
	    if (isset($effects_position['top_position']) && $effects_position['top_position'] != 0){
	        $position = "top:'-10%'";
	    }
	}
	
	//For Middle Bottom Position
	if($effects_position['actual_position'] == "middle-bottom"){
	    if (isset($effects_position['bottom_position']) && $effects_position['bottom_position'] != 0){
	        $position = "bottom:'-10%'";
	    }
	}
	
	
	?>
	

	swarmClick<?php echo $val->id; ?> = '';	
	stop_swarm_effect<?php echo $val->id; ?> = 0;
	swarm_name_<?php echo $val->id; ?> = ["<?php echo str_replace(',','","',$variable1); ?>"];
	swarm_city_<?php echo $val->id; ?> = ["<?php echo str_replace(',','","',$variable2); ?>"];	
	
	$('#swarm-close-<?php echo $val->id;?>').click( function(){
		$('#mwp-swarm-<?php echo $val->id; ?>').animate({opacity: 0, <?php echo  $position;?>}, 400); 
		swarmClick<?php echo $val->id; ?> = 1;
	});	
	run_swarm_open_<?php echo $val->id; ?> ();
});

<?php //------------------This function for display notification with setting----------------?>

function run_swarm_open_<?php echo $val->id; ?>() {
	if (swarmClick<?php echo $val->id; ?> != 1){
	
	var rand_swarm_open_sec = Math.floor(Math.random() * (<?php echo $show_second['swarm_min_second_display'];?> - <?php echo $show_second['show_max_seconds_display'];?>)) + <?php echo $show_second['show_max_seconds_display'];?>;
	
	<?php 
	//For Left-Top Position And For Left-Bottom Position And For Middle-Left Position
	if($effects_position['actual_position'] == "left-top" || $effects_position['actual_position'] == "left-bottom" || $effects_position['actual_position'] == "middle-left"){
	   if (isset($effects_position['left_position']) && $effects_position['left_position'] != 0){
	        $position = "left:'".$effects_position['left_position']."%'";
	    }
	}
	
	//For Right-Top Position And Right-Bottom Position And For Middle-Right Position
	if($effects_position['actual_position'] == "right-top" || $effects_position['actual_position'] == "right-bottom" || $effects_position['actual_position'] == "middle-right"){
	    if (isset($effects_position['right_position']) && $effects_position['right_position'] != 0){
	      $position = "right:'".$effects_position['right_position']."%'";
	    }
	}
	
	//For Middle Top Position
	if($effects_position['actual_position'] == "middle-top"){
	    if (isset($effects_position['top_position']) && $effects_position['top_position'] != 0){
	        $position = "top:'".$effects_position['top_position']."%'";
	    }
	}
	
	//For Middle Bottom Position
	if($effects_position['actual_position'] == "middle-bottom"){
	    if (isset($effects_position['bottom_position']) && $effects_position['bottom_position'] != 0){
	        $position = "bottom:'".$effects_position['bottom_position']."%'";
	    }
	}
	?>
	
	var open_swarm = rand_swarm_open_sec * 1000; 
	setTimeout(function(){
			jQuery('#mwp-swarm-<?php echo $val->id; ?>').animate({opacity: 1, <?php echo $position;?>}, 400); 
			
		var swarm_text = "<?php echo $val->swarm_text; ?>";
		
		var swarm_text_new = swarm_text;
		var check_name = swarm_text_new.indexOf("[name]");
		if(check_name >= 0){
			var rand_swarm_name = Math.floor(Math.random() * swarm_name_<?php echo $val->id; ?>.length);
			if(swarm_name_<?php echo $val->id; ?>.length > 0){
				var swarm_text_new = swarm_text_new.replace("[name]", swarm_name_<?php echo $val->id; ?>[rand_swarm_name]);
			}
		}

		var check_city = swarm_text_new.indexOf("[city]");
		if(check_city >= 0){
			var rand_swarm_city = Math.floor(Math.random() * swarm_city_<?php echo $val->id; ?>.length);
			if(swarm_city_<?php echo $val->id; ?>.length > 0){
				var swarm_text_new = swarm_text_new.replace("[city]", swarm_city_<?php echo $val->id; ?>[rand_swarm_city]);
			}
		}
		
		var check_amount = swarm_text_new.indexOf("[amount]");
		
		if(check_amount >= 0){
			
			<?php 
			if(!empty($val->amount_min) && !empty($val->amount_max)){
			 ?>
			 var rand_swarm_number = Math.floor(Math.random() * (<?php echo $val->amount_min;?> - <?php echo $val->amount_max;?>)) + <?php echo $val->amount_max;?>;
			 var swarm_text_new = swarm_text_new.replace("[amount]", rand_swarm_number);
			 <?php    
			}
			?>
		}
		
		jQuery('#mwp-swarm-text-<?php echo $val->id; ?>').html(swarm_text_new);
		run_swarm_close_<?php echo $val->id; ?>();
		}, open_swarm); 
		}
}

<?php //------------------This function for close notification with setting----------------?>

function run_swarm_close_<?php echo $val->id; ?>() {
	stop_swarm_effect<?php echo $val->id; ?>++;
	<?php 
	//For Left-Top Position And For Left-Bottom Position And For Middle-Left Position
	if($effects_position['actual_position'] == "left-top" || $effects_position['actual_position'] == "left-bottom" || $effects_position['actual_position'] == "middle-left"){
	    if (isset($effects_position['left_position']) && $effects_position['left_position'] != 0){
	        $position = "left:'-10%'";
	    }
	}
	//For Right-Top Position And Right-Bottom Position And For Middle-Right Position
	if($effects_position['actual_position'] == "right-top" || $effects_position['actual_position'] == "right-bottom" || $effects_position['actual_position'] == "middle-right"){
	    if (isset($effects_position['right_position']) && $effects_position['right_position'] != 0){
	         $position = "right:'-10%'";
	    }
	}
	
	//For Middle Top Position
	if($effects_position['actual_position'] == "middle-top"){
	    if (isset($effects_position['top_position']) && $effects_position['top_position'] != 0){
	        $position = "top:'-10%'";
	    }
	}
	
	//For Middle Bottom Position
	if($effects_position['actual_position'] == "middle-bottom"){
	    if (isset($effects_position['bottom_position']) && $effects_position['bottom_position'] != 0){
	        $position = "bottom:'-10%'";
	    }
	}
	
	?>
	<?php /*var close_swarm = <?php echo $val->auto_close_sec;?> * 1000; */?>
	var close_swarm = 7000;
	setTimeout(function(){
		jQuery('#mwp-swarm-<?php echo $val->id; ?>').animate({opacity: 0, <?php echo $position;?>}, 400); 
		if (stop_swarm_effect<?php echo $val->id; ?> < 4){
			run_swarm_open_<?php echo $val->id; ?> (); 
		}
	}, close_swarm); 
		
}




