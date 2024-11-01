<div class="swarm-add-name">
    <div class="form-label">
        <?php _ex('Name', 'Add New Swarm Title', 'swarm'); ?><span class="required">*</span>
    </div>
    <input type="text" name="swarm-add-name" placeholder="Name is used only for admin purposes" value="<?php echo isset($swarm_effects_edit[0]->title)?$swarm_effects_edit[0]->title:''?>">
</div>
<div class="swarm-add-content">
    <h1>
        <?php _ex('Content', 'Add New Swarm Contents', 'swarm'); ?>      
    </h1>
    <div class="swarm-main">
        <div class="swarm-add-title">
            <div class="form-label">
                <?php _ex('Title', 'Add New Swarm Title', 'swarm'); ?><span class="required">*</span>
            </div>
            <input type="text" name="swarm-add-title" placeholder="Add Title" value="<?php echo isset($swarm_effects_edit[0]->swarm_title)?$swarm_effects_edit[0]->swarm_title:''?>">
        </div>
        <div>
            <div class="swarm-add-icon-custom form-label">
                <?php _ex('Icon', 'Add New Swarm Icon', 'swarm'); ?><span class="required">*</span>
            </div>
            <div class="swarm-add-icon">
                <?php
                
                $menu_icon_select = $swarm_effects_edit[0]->swarm_menu_icon;
                 
                include SWARM_EFFECT_DIR . 'admin/pages/swarm-add-tabs/icon.php';
                echo '<select name="swarm_menu_icon" id="swarm_menu_icon" style="font-family: \'FontAwesome\', Helvetica;">';
                foreach($icons as $key=>$value){
                    
                	if ('fa-'.$key == $menu_icon_select){		 
                		echo '<option selected value="fa-'.$key.'">'.$value.' '.$key.'</option>';
                	}else {
                		echo '<option value="fa-'.$key.'">'.$value.' '.$key.'</option>';
                	}
                }
                echo '</select>';
                
                
                if(isset($menu_icon_select) && !empty($menu_icon_select)){
                    $exist_icon = 'fa ' . $menu_icon_select;
                }else{
                    $exist_icon = "fa fa-500px";
                }
                
                ?><br/>
                <span class="preview_icon"><i class="<?php echo $exist_icon;?>" aria-hidden="true"></i></span>
            </div>
        </div>
    </div>  
    
    <?php 
    if(isset($swarm_effects_edit[0]->swarm_text)){
        $swarm_text = $swarm_effects_edit[0]->swarm_text;
    }else{
       $swarm_text = "[name] from [city] has just placed an order for $[amount].";
    }
    ?>
    
    <div class="swarm-add-text">
        <div class="form-label">
            <?php _ex('Text', 'Add New Swarm Title', 'swarm'); ?><span class="required">*</span>
        </div>
        <textarea name="swarm-add-text"><?php echo $swarm_text;?></textarea>
        <div>Use [variables] to construct your swarm effect message</div> 
        <div class="swarm-text-variable"><strong>Variables :</strong> [name] , [city] , [amount]</div>
    </div>

</div>

<div class="swarm-nca">
    <h1>
        <?php _ex('Name,City,Amount', 'Swarm Display Box', 'swarm'); ?>
    </h1>
    <div class="swarm-col-4 city-min">
        <div class="form-label"> 
            <?php _ex('Names', 'Add New Swarm Title', 'swarm'); ?>
        </div>       
        <div class="swarm-name">
            <textarea name="names"><?php echo isset($swarm_effects_edit[0]->swarm_name)?$swarm_effects_edit[0]->swarm_name:''; ?></textarea>
            <div class="swarm-names-text">Enter Names ,(comma) separated by comma</div>
        </div>
        <div class="form-label top"> 
            <?php _ex('Amount Min', 'Add New Swarm Title', 'swarm'); ?>
        </div>
        <div class="swarm-amount-Min">
            <input type="text" name="swarm-amount-min" value="<?php echo isset($swarm_effects_edit[0]->amount_min)?$swarm_effects_edit[0]->amount_min:'';?>">
        </div>
    </div>
    <div class="swarm-col-4 city-max">
        <div class="form-label"> 
            <?php _ex('Cities', 'Add New Swarm Title', 'swarm'); ?>
        </div>
        <div class="swarm-city">
            <textarea name="cities"><?php echo isset($swarm_effects_edit[0]->swarm_city)?$swarm_effects_edit[0]->swarm_city:'';?></textarea>
            <div class="swarm-cities-text">Enter Cities ,(comma) separated by comma</div>
        </div>

        <div class="form-label top"> 
            <?php _ex('Amount Max', 'Add New Swarm Title', 'swarm'); ?>
        </div>
        <div class="swarm-amount-Max">
            <input type="text" name="swarm-amount-max" value="<?php echo isset($swarm_effects_edit[0]->amount_max)?$swarm_effects_edit[0]->amount_max:'';?>">
        </div>
    </div>
</div>
<div class="swarm-next-btn" data-tab-page="swarm-design" data-tab="swarm-design">
	<input type="button" value="Next" class="btn-swarm btn-swarm-info swarm-next" >
</div>