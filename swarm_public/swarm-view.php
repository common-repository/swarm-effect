<?php
//For Swarm View
if($val->swarm_custom == '1' ){
	$icon = '<img src="'.$val->swarm_custom_link.'"  width="35" height="35">'; 
}else{
	$icon = '<i class="fa '.$val->swarm_menu_icon.' mwp-swarm-icon" aria-hidden="true"></i>';
}	
	 $mwpswarm = '';
	 $mwpswarm .= '<div id="mwp-swarm-'.$val->id.'">';	 
	 $mwpswarm .= '<div class="mwp-swarm-close" id="swarm-close-'.$val->id.'">X</div>';     
	 $mwpswarm .= '<div class="mwp-swarm-block">';
	 $mwpswarm .= '<div class="mwp-swarm-img" id="mwp-swarm-icon-'.$val->id.'">'.$icon.'</div>';
	 $mwpswarm .= '<div class="mwp-swarm-text" id="mwp-swarm-text-main-'.$val->id.'">';
	 $mwpswarm .= '<div class="mwp-swarm-title">'.$val->swarm_title.'</div>';	 
	 $mwpswarm .= '<div id="mwp-swarm-text-'.$val->id.'"></div>';
	 $mwpswarm .= '</div></div></div>';		 
	
	
	/* if(!is_admin()){
	     $mwpswarm = $mwpswarm;
	 }else{
	     $mwpswarm = "";
	 }
	  */

?>
