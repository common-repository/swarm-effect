<?php 
$swarm_position = unserialize($swarm_effects_edit[0]->swarm_position);
//print_r($swarm_position);

if(isset($swarm_position['left_position']) && $swarm_position['left_position'] != 0){
   $active_style_left = "display: block";
}else{
   $active_style_left = "display: none";
}
if(isset($swarm_position['top_position']) && $swarm_position['top_position'] != 0){
    $active_style_top = "display: block";
}else{
    $active_style_top = "display: none";
}

if(isset($swarm_position['right_position']) && $swarm_position['right_position'] != 0){
    $active_style_right = "display: block";
}else{
    $active_style_right = "display: none";
}
if(isset($swarm_position['bottom_position']) && $swarm_position['bottom_position'] != 0){
    $active_style_bottom = "display: block";
}else{
    $active_style_bottom = "display: none";
}

?>
<div class="position-validation-error"></div>
<div class="swarm-position-div">
<div class="swarm_position_image">
    <img src="<?php echo  SWARM_EFFECT_URL ?>admin/img/laptop-full.png">
</div>
<div class="swarm-pos-left-top swarm_position_div <?php if($swarm_position['actual_position'] == "left-top"){echo "active_position";}?>" style="" data-left="2" data-right="0" data-top="6" data-bottom="0" data-position="left-top"></div>
<div class="swarm-pos-middle-top swarm_position_div <?php if($swarm_position['actual_position'] == "middle-top"){echo "active_position";}?>" style="" data-left="0" data-right="38" data-top="6" data-bottom="0" data-position="middle-top"></div>
<div class="swarm-pos-right-top swarm_position_div <?php if($swarm_position['actual_position'] == "right-top"){echo "active_position";}?>" style="" data-left="0" data-right="2" data-top="6" data-bottom="0" data-position="right-top"></div>
<div class="swarm-pos-left-bottom swarm_position_div <?php if($swarm_position['actual_position'] == "left-bottom"){echo "active_position";}?>" style="" data-left="2" data-right="0" data-top="0" data-bottom="2" data-position="left-bottom"></div>
<div class="swarm-pos-middle-bottom swarm_position_div <?php if($swarm_position['actual_position'] == "middle-bottom"){echo "active_position";}?>" style="" data-left="0" data-right="38" data-top="0" data-bottom="2" data-position="middle-bottom"></div>
<div class="swarm-pos-right-bottom swarm_position_div <?php if($swarm_position['actual_position'] == "right-bottom"){echo "active_position";}?>" style="" data-left="0" data-right="2" data-top="0" data-bottom="2" data-position="right-bottom"></div>
<div class="swarm-pos-middle-right swarm_position_div <?php if($swarm_position['actual_position'] == "middle-right"){echo "active_position";}?>" style="" data-left="0" data-right="2" data-top="45" data-bottom="0" data-position="middle-right"></div>
<div class="swarm-pos-middle-left swarm_position_div <?php if($swarm_position['actual_position'] == "middle-left"){echo "active_position";}?>" style="" data-left="2" data-right="0" data-top="45" data-bottom="0" data-position="middle-left"></div>



<div class="position-input-div">
	<h1>Position Style</h1>
	<div class="col-1-position">
    	<div class="swarm-left-position" style="<?php echo $active_style_left;?>">
        	<div class="form-label">
            <?php _ex('Left Margin', 'Add Left Pading', 'swarm'); ?>
            </div>
            <input type="text" name="swarm-left-position" placeholder="0" value="<?php echo isset($swarm_position['left_position'])?$swarm_position['left_position']:'';?>"> %
        </div>
         <div class="swarm-right-position" style="<?php echo $active_style_right;?>">
            <div class="form-label">
                <?php _ex('Right Margin', 'Add Right Padding', 'swarm'); ?>
            </div>
            <input type="text" name="swarm-right-position" placeholder="0" value="<?php echo isset($swarm_position['right_position'])?$swarm_position['right_position']:'';?>"> %
        </div>
	</div>
    <div class="col-2-position">
        <div class="swarm-top-position" style="<?php echo $active_style_top;?>">
            <div class="form-label">
                <?php _ex('Top Margin', 'Add Top Padding', 'swarm'); ?>
            </div>
            <input type="text" name="swarm-top-position" placeholder="0" value="<?php echo isset($swarm_position['top_position'])?$swarm_position['top_position']:'';?>"> %
        </div>
         <div class="swarm-bottom-position" style="<?php echo $active_style_bottom;?>">
            <div class="form-label">
                <?php _ex('Bottom Margin', 'Add Bottom Padding', 'swarm'); ?>
        	</div>
            <input type="text" name="swarm-bottom-position" placeholder="0" value="<?php echo isset($swarm_position['bottom_position'])?$swarm_position['bottom_position']:'';?>"> %
        </div>
    </div>
    
    <!-- Hidden Field  For Position value-->
    <input type="hidden" name="swarm-actual-position" value="<?php echo isset($swarm_position['actual_position'])?$swarm_position['actual_position']:'';?>">
</div>
</div>
<div class="swarm-next-btn" data-tab-page="swarm-display-rules" data-tab="swarm-display-rules">
	<input type="button" value="Next" class="btn-swarm btn-swarm-info swarm-next" >
</div>