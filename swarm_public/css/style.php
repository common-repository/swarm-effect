#mwp-swarm-<?php echo $val->id; ?>{	
	padding:10px; 
	z-index:9999999999; 
	position: fixed; 
	<?php
	//For Left-Top Position css
	if($effects_position['actual_position'] == "left-top"){
	    if (isset($effects_position['left_position']) && $effects_position['left_position'] != 0){
	        $position = "left:-10%;" . "top:" . $effects_position['top_position']."%;";
	    }
	}
	
	//For Left-Bottom Position css
	if($effects_position['actual_position'] == "left-bottom"){
	    if (isset($effects_position['left_position']) && $effects_position['left_position'] != 0){
	        $position = "left:-10%;" . "bottom:" . $effects_position['bottom_position']."%;";
	    }
	}
	
	//For Right-Top Position css
	if($effects_position['actual_position'] == "right-top"){
	    if (isset($effects_position['right_position']) && $effects_position['right_position'] != 0){
	        $position = "right:-10%;". "top:" . $effects_position['top_position']."%;";
	    } 
	}
	
	//For Right-Bottom Position css
	if($effects_position['actual_position'] == "right-bottom"){
	    if (isset($effects_position['right_position']) && $effects_position['right_position'] != 0){
	        $position = "right:-10%;". "bottom:" . $effects_position['bottom_position']."%;";
	    }
	}
	
	//For Middle-Top Position css
	if($effects_position['actual_position'] == "middle-top"){
	    if (isset($effects_position['top_position']) && $effects_position['top_position'] != 0){
	        $position = "top:-10%;". "right:" . $effects_position['right_position']."%;";
	    }
	}
	
	//For Middle-bottom Position css
	if($effects_position['actual_position'] == "middle-bottom"){
	    if (isset($effects_position['bottom_position']) && $effects_position['bottom_position'] != 0){
	        $position = "bottom:-10%;". "right:" . $effects_position['right_position']."%;";
	    }
	}
	
	//For Middle-left Position css
	if($effects_position['actual_position'] == "middle-left"){
	    if (isset($effects_position['left_position']) && $effects_position['left_position'] != 0){
	        $position = "left:-10%;". "top:" . $effects_position['top_position']."%;";
	    }
	}
	
	//For Middle-right Position css
	if($effects_position['actual_position'] == "middle-right"){
	    if (isset($effects_position['right_position']) && $effects_position['right_position'] != 0){
	        $position = "right:-10%;". "top:" . $effects_position['top_position']."%;";
	    }
	}
	
	
	echo $position;
	
	/*?>
	border-radius:<?php echo $val->border_radius;?>;
	height: 80px;
	background: <?php echo $val->background_color;?>;  
	border:<?php echo $val->border_width;?> solid <?php echo $val->border_color;?>;*/?>
	
	border-radius:3px;
	height: 80px;
	background: #<?php echo $swarm_style['background_color'];?>;  
	border:1px solid #dadada;	
	
	box-sizing: border-box;
	font-size:12px;
	font-family:Verdana;
	opacity:0;
}
#mwp-swarm-text-main-<?php echo $val->id; ?>{
	<?php /*color:<?php echo $val->text_color;?>;*/?>
	color:#<?php echo $swarm_style['color'];?>;
}

#mwp-swarm-icon-<?php echo $val->id;?> i{
	<?php /*color:<?php echo $val->icon_color;?>;*/?>
	color:#<?php echo $swarm_style['color'];?>;
}

#swarm-close-<?php echo $val->id;?>{
	<?php /*color: <?php echo $val->close_btn_color;?>;*/?>
	color:#<?php echo $swarm_style['color'];?>;
}
@media screen and (max-width: 480px) { 
	#mwp-swarm-<?php echo $val->id; ?> {display:none;}
}