<?php 
$swarm_display = unserialize($swarm_effects_edit[0]->swarm_display);
//print_r($swarm_display);
$swarm_style = unserialize($swarm_effects_edit[0]->swarm_style);
//print_r($swarm_style);
if(isset($swarm_style) && !empty($swarm_style)){
    $swarm_bg = $swarm_style['background_color'];
    $swarm_color = $swarm_style['color'];
}else{
    $swarm_bg = "";
    $swarm_color = "";
}

?>
   

<div class="swarm-style">
    <h1>
        <?php _ex('Style', 'Add New Swarm Contents Style', 'swarm'); ?>      
    </h1>
	<div class="swarm-backdround-select-div">
		<div class="swarm-backdround-select">
			<div class="swarm-backdround-theme">
    			<div class="form-label">
                    <?php _ex('Notification Theme', 'Add Notification Theme', 'swarm'); ?><span class="required">*</span>
                </div>
                <select name="swarm-background-color" id="swarm-background-color">
                		<option value="000000" <?php if($swarm_bg == "000000"){echo 'selected';}?>>Black</option>
                		<option value="ffffff" <?php if($swarm_bg == "ffffff"){echo 'selected';}?>>White</option>
                		<option value="26C281" <?php if($swarm_bg == "26C281"){echo 'selected';}?>>Green</option>
                </select>
            </div>
            <div class="swarm-backdround-theme-preview">
            	<div class="form-label">
                    <?php _ex('Preview', 'Add Notification Preview', 'swarm'); ?>
                </div>
                <div class="swarm_previw_bg" style="background-color:#<?php echo $swarm_bg;?>;color:#<?php echo $swarm_color;?>;border:1pc solid #<?php $swarm_color;?>">
                	<div id="swarm-close-preview" class="mwp-swarm-close">X</div>
                	<div class="mwp-swarm-block-preview">
                    	<div id="mwp-swarm-icon-preview" class="mwp-swarm-img">
                        	<i class="fa fa-android mwp-swarm-icon" aria-hidden="true"></i>
                        </div>
                        <div id="mwp-swarm-text-main-preview" class="mwp-swarm-text">
                        	<div class="mwp-swarm-title-preview">New Order</div>
                        	<div id="mwp-swarm-text-preview">[name] from [city] has just placed an order for $[amount].</div>
                        </div>
                	</div>
                </div>
            </div>
		</div>
	</div>
 <!--<div class="swarm-col-1">
        <div class="swarm-border-radius">
            <div class="form-label">
                <?php _ex('Border Radius', 'Add border radius', 'swarm'); ?>
            </div>
            <input type="text" name="swarm-border-radius" placeholder="0">px
        </div>
        
        <div class="swarm-text-color">
            <div class="form-label">
                <?php _ex('Text Color', 'Add Text Color', 'swarm'); ?>
            </div>
            <div class="input-group">
            		<ul class="colorlist">
    					<li>
    						<span id="swarm_text_color_span" style="border: 1px solid #ddd;padding:3px;">&emsp;&ensp;</span>
    					</li>
    					<li>
    						<input type="text" id="swarm_text_color" name="swarm-text-color" value="" placeholder="" />
    					</li>
    				</ul>
            </div>
        </div>
    </div>
        <div class="swarm-col-2">
        <div class="swarm-border-width">
            <div class="form-label">
                <?php _ex('Border Width', 'Add border width', 'swarm'); ?>
            </div>
            <input type="text" name="swarm-border-width" placeholder="0">px
        </div>
       
        <div class="swarm-icon-color">
            <div class="form-label">
                <?php _ex('Icon Color', 'Add Icon Color', 'swarm'); ?>
            </div>
            <div class="input-group">
           			<ul class="colorlist">
    					<li>
    						<span id="swarm_icon_color_span" style="border: 1px solid #ddd;padding:3px;">&emsp;&ensp;</span>
    					</li>
    					<li>
    						<input type="text" id="swarm_icon_color" name="swarm-icon-color" value="" placeholder="" />
    					</li>
    				</ul>
            </div>
        </div>
    </div>
   <div class="swarm-col-3">
        
        <div class="swarm-background-color">
            <div class="form-label">
                <?php _ex('Background color', 'Add Background Color', 'swarm'); ?>
            </div>

            <div class="input-group">
        		<ul class="colorlist">
					<li>
						<span id="swarm_background_color_span" style="border: 1px solid #ddd;padding:3px;">&emsp;&ensp;</span>
					</li>
					<li>
						<input type="text" id="swarm_background_color" name="swarm-background-color" value="" placeholder="" />
					</li>
				</ul>
            </div>
        </div>
        <div class="swarm-dont-show-on-less-than">
            <div class="form-label">
                <?php _ex("Don't show on screens less than ", 'Add Background Color', 'swarm'); ?>
            </div>
            <input type="text" name="swarm-dont-show-on-less-than" placeholder="480">px
        </div>
    </div>
     <div class="swarm-col-4">
       
        <div class="swarm-border-color">
            <div class="form-label">
                <?php _ex('Border color', 'Add Border Color', 'swarm'); ?>
            </div>                 
            <div class="input-group">
            	<ul class="colorlist">
					<li>
						<span id="swarm_border_color_span" style="border: 1px solid #ddd;padding:3px;">&emsp;&ensp;</span>
					</li>
					<li>
						<input type="text" id="swarm_border_color" name="swarm-background-color" value="" placeholder="" />
					</li>
				</ul>
            </div>
        </div>
    </div>-->
</div>

<!-- <div class="swarm-close-button">
    <h1>
        <?php _ex('Close Button', 'Swarm Close Button', 'swarm'); ?>      
    </h1>
    <div class="swarm-col-3">
        <div class="form-label close-btn">            
            <?php _ex('Hide close Button', 'Swarm Close Button', 'swarm'); ?>
        </div> 
        <div class="hide-close-chk">
            <input type="checkbox" name="hide-close-chk">  
        </div>
    </div>
    <div class="swarm-col-3">
        <div class="form-label">            
            <?php _ex('Auto Close', 'Swarm Close Button', 'swarm'); ?>
        </div>                
        <input type="text" name="hide-close-txt">sec            
    </div>
    <div class="swarm-col-3">
        <div class="form-label">            
            <?php _ex('Color', 'Swarm Close Button', 'swarm'); ?>
        </div>

        <div id="cp5" class="input-group colorpicker-component">
            <input id="cp5" type="text" name="hide-close-color sample-selector">            
            <span class="input-group-addon"><i></i></span>
        </div>
    </div>  
</div>-->
<div class="swarm-display">
    <h1>
        <?php _ex('Display', 'Swarm Display Box', 'swarm'); ?>      
    </h1>
    <div class="swarm-col-3">
        <!-- <div class="form-label">            
            <?php _ex('Animated Display', 'Animated Display', 'swarm'); ?>
        </div> 
        <div class="swarm-animated-display">
            <select name="swarm-display" class="swarm-dis">
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
        </div> -->
        <div class="form-label top">            
            <?php _ex('Show Min Every', 'Animated Display', 'swarm'); ?><span class="required">*</span>
        </div>
        <div class="swarm-show-min-every">
            <input type="text" name="show-min-second" value="<?php echo isset($swarm_display['swarm_min_second_display'])?$swarm_display['swarm_min_second_display']:'';?>"><div class="swarm-min-sec-text">sec</div>
        </div>
        
        
    </div>
    <div class="swarm-col-3">
        <!--<div class="form-label">            
            <?php _ex('Animated duration', 'Animated Display', 'swarm'); ?>
        </div>
        <div class="swarm-animated-duration">
            <input type="text" name="animated-duration">ms
        </div>-->
		<div class="form-label top">            
            <?php _ex('Show Max Every', 'Animated Display', 'swarm'); ?><span class="required">*</span>
        </div>
        <div class="swarm-show-max-every">
            <input type="text" name="show-max-second" value="<?php echo isset($swarm_display['show_max_seconds_display'])?$swarm_display['show_max_seconds_display']:'';?>" ><div class="swarm-max-sec-text">sec</div>
        </div>
        
    </div>

    <div class="swarm-col-3">
    
   		<!--<div class="form-label">            
            <?php _ex('Animated Mode', 'Animated Display', 'swarm'); ?>
        </div>
        <div class="swarm-appearance-mode">
            <select name="swarm-appearance" class="swarm-appearance">
                <option value="Random">Random</option>
                <option value="Shuffle">Shuffle</option>
            </select>
        </div>-->
    </div>
    <div class="min-max-second-text">Notification will be displayed randomly between <strong>[Min]</strong> and <strong>[Max]</strong> secs.</div>
</div>
<div class="swarm-next-btn" data-tab-page="swarm-position" data-tab="swarm-position">
	<input type="button" value="Next" class="btn-swarm btn-swarm-info swarm-next" >
</div>