<?php 
global $wpdb;
require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

$charset_collate = $wpdb->get_charset_collate();
$table_display_rules = $wpdb->prefix . 'swarm_effects_display_rules';

if(isset($_GET) && isset($_GET['swarm_id'])){
    
    $swarm_effects_display_rules = $wpdb->get_results("SELECT * FROM $table_display_rules WHERE swarm_id='".sanitize_text_field($_GET['swarm_id'])."'");
    
}

if(isset($swarm_effects_display_rules[0]->page_status)){
    $page_status = $swarm_effects_display_rules[0]->page_status;
}else{
    $page_status = "";
}

if(isset($swarm_effects_display_rules[0]->post_status)){
    $post_status = $swarm_effects_display_rules[0]->post_status;
}else{
    $post_status = "";
}

if(isset($swarm_effects_display_rules[0]->show_url)){
    $unser_show_url = unserialize($swarm_effects_display_rules[0]->show_url);
    $imp_show_url = implode(",\n", $unser_show_url);
}

//print_r($imp_show_url);

if(isset($swarm_effects_display_rules[0]->dont_show_url)){
    $unser_dont_show_url = unserialize($swarm_effects_display_rules[0]->dont_show_url);
    $imp_dont_show_url = implode(",\n", $unser_dont_show_url);
}

if(!isset($_GET['swarm_id'])){
    $page_status = 1;
    $post_status = 1;
}

//print_r($unser_dont_show_url);

?>
<div class="show-swarm-effect">
    <h1>
        <?php _ex('Show Swarm Effect', 'Swarm Display Box', 'swarm'); ?>      
    </h1>
    <div class="swarm-col-4 wid">
        <div class="borderclass">
            <div class="swarm-pages-chk">
                <div class="form-label top">            
                    <?php _ex('Pages', 'Display Model Window', 'swarm'); ?>
                </div>
                <div class="show-model-chk">
                    <input type="checkbox" name="swarm_page_status" value="1" <?php if($page_status == 1){echo 'checked="checked"';}?>>
                </div>
            </div>

            <div class="swarm-posts-chk">
                <div class="form-label top">            
                    <?php _ex('Posts', 'Display Ids', 'swarm'); ?>
                </div>
                <div class="show-model-pchk">
                    <input type="checkbox" name="swarm_post_status" value="1" <?php if($post_status == 1){echo 'checked="checked"';}?>>
                </div>
            </div>
        </div>
        <!--<div class="show-model-window">
            <select name="show-model-window" class="show-model-window">
                <option value="Pages With Certain IDs">Pages With Certain IDs</option>
                <option value="Pages With Certain IDs">Pages With Certain IDs</option>
            </select>
        </div>-->
    </div>

    <!--<div class="swarm-col-4 wid">
        <div class="form-label top">            
    <?php /* _ex('Posts', 'Display Ids', 'swarm'); */ ?>
        </div>
        <div class="show-model-pchk">
            <div class="swarm-pchk">
                <input type="checkbox" name="swarm-ids">
            </div>
        </div>
    </div>
    <div class="display-rules">
        <div class="swarm-show-url-box">
            <h1>
                <?php _ex('Show URL Box', 'Swarm Display Box', 'swarm'); ?>      
            </h1>
            <div class="swarm-show-textbox">
                <textarea cols="50" rows="5" name="swarm_show_url"><?php echo $imp_show_url;?></textarea>
            </div>
            <div class="dshow-notice">
                <?php _ex("Enter Full URL'S Saperated With Comas", 'Swarm Display Box', 'swarm'); ?>
            </div>
        </div>
        <div class="swarm-dshow-url-box">
            <h1>
                <?php _ex("Don't Show URL Box", 'Swarm Display Box', 'swarm'); ?>      
            </h1>
            <div class="swarm-show-textbox">
                <textarea cols="50" rows="5" name="swarm_dont_show_url"><?php echo $imp_dont_show_url;?></textarea>
            </div>
            <div class="dshow-notice">
                <?php _ex("Enter Full URL'S Saperated With Comas", 'Swarm Display Box', 'swarm'); ?>
            </div>
        </div>
    </div>-->
</div>

<!--<div class="show-swarm-effect">
    <h1>
<?php /* _ex('Display Rules', 'Swarm Display Box', 'swarm'); */ ?>      
    </h1>
    <div class="swarm-col-4 wid show" style="width: 100%;">
        <div>
            <div class="form-label top">            
<?php /* _ex('Show Rules', 'Display Rules', 'swarm'); */ ?>
            </div>
            <div class="add-rules">
                <div>
                    Highlighter will only show on pages that match a "Show" rule.
                </div>
                <div>
                    <div class="show_box">
                        By default, Highlighter shows on all pages.
                    </div>
                    <div class="show_box_add">
                        <div class="swarm-dynamic-show-hide">
                            <div class="swarm-dynamic" id="remove-">
                                <div class="show">                                
                                    <select name="show_rules" class="show">
                                        <option value="Select Option">Select Option</option>
                                        <option value="On URL Paths...">On URL Paths...</option>
                                        <option value="On The Home Page">On The Home Page</option>
                                    </select>
                                </div>
                                <div class="matching">
                                    <select name="matching">
                                        <option value="Exactly matching">Exactly matching</option>
                                        <option value="Beginning With">Beginning With</option>
                                        <option value="Containing">Containing</option>
                                    </select>
                                </div>
                                <div class="swarm-right-div">
                                    <div class="rules-box">
                                        <input type="text" name="rules-box" placeholder="/example">
                                    </div>
                                    <div class="swarm-delete-rule"> 
                                        <span class="dashicons dashicons-no-alt"></span> 
                                    </div>
                                </div>                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="add_show">
                <input id="show" type="button" name="show_rules" value="Add A 'Show' Rule ">
            </div>
            <div class="add-another-rule">
                <input id="another" type="button" value="Add Another Rule" name="addtorule">
            </div>
        </div>
    </div>

    <div class="swarm-col-4 wid dshow" style="width: 100%;">
        <div>
            <div class="form-label top">            
<?php /* _ex("Don't Show Rules", 'Display Rules', 'swarm'); */ ?>
            </div>
            <div class="add-rules">
                <div>
                    Highlighter will not show on pages that match a "Don't Show" rule.
                </div>
                <div>
                    <div class="dshow_box">
                        By default, Highlighter shows on every page matching any "Show" Rule.
                    </div>
                </div>
                <div class="dshow_box_add">
                    <div class="swarm-dynamic-dshow-hide">
                        <div class="swarm-ddynamic">
                            <div class="dshow">                                
                                <select name="dshow_rules">
                                    <option value="On URL Paths...">On URL Paths...</option>
                                    <option value="On The Home Page">On The Home Page</option>
                                </select>
                            </div>
                            <div class="dmatching">
                                <select name="dmatching">
                                    <option value="Exactly matching">Exactly matching</option>
                                    <option value="Beginning With">Beginning With</option>
                                    <option value="Containing">Containing</option>
                                </select>
                            </div>
                            <div class="swarm-dright-div">
                                <div class="drules-box">
                                    <input type="text" name="drules-box" placeholder="/example">
                                </div>

                                <div class="swarm-delete-drule"> 
                                    <span class="dashicons dashicons-no-alt"></span> 
                                </div>
                            </div>                            
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
        <div class="add_dshow">
            <input id="dshow" type="button" name="dshow_rules" value="Add A 'Show' Rule ">
        </div>
        <div class="add-another-drule">
            <input id="danother" type="button" value="Add Another Rule" name="daddtorule">
        </div>
    </div>
</div>-->
<!--<div class="display_url">
<?php /* include 'swarm_get_url.php'; */ ?>
    <div class="search">
    </div>
</div>-->

 <div class="swarm-btn">
        <input type="submit" name="submit" value="Submit" style="" class="btn-swarm btn-swarm-success">
        <input type="hidden" name="addswarm" value="<?php echo $addswarm;?>">
        <input type="hidden" name="swarm_edit_id" value="<?php echo isset($swarm_edit_id)?$swarm_edit_id:'';?>">
 </div>