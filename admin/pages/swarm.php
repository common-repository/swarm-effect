<?php
if (isset($_GET) && sanitize_text_field($_GET['swarm']) == "new") {
    $display_new = "display:block";
    $display_list = "display:none";
    $display_inst = "display:none";
    $class_new = "current";
    $class_list = "";
    $class_inst = "";
    
    $overlay_height = "height:825px";
    
} elseif (isset($_GET) && sanitize_text_field($_GET['swarm']) == "instructions") {
    $display_new = "display:none";
    $display_list = "display:none";
    $display_inst = "display:block";
    $class_new = "";
    $class_list = "";
    $class_inst = "current";
    
    $overlay_height = "height:400px";
    
} else {
    $display_new = "display:none";
    $display_list = "display:block";
    $display_inst = "display:none";
    $class_new = "";
    $class_list = "current";
    $class_inst = "";
    
    $overlay_height = "height:360px";
}


if (isset($_GET) && isset($_GET ['token']) && !isset($_GET['err']) && sanitize_text_field($_GET['token']) || sanitize_text_field($_GET['err'])) {

    $token = get_option('swarn-effect-token');

    $ex = explode("-", sanitize_text_field($_GET ['token']));

    //print_r($ex);

    if (count($token) == 1) {

        update_option('swarn-effect-token', sanitize_text_field($_GET ['token']));
        update_option('swarn-effect-twitter-username',$ex[0]);

    } else {

        add_option('swarn-effect-token', sanitize_text_field($_GET ['token']));
        add_option('swarn-effect-twitter-username',$ex[0]);
    }
}


$token = (isset($_GET ['token'])) ? $_GET ['token'] : get_option('swarn-effect-token');

//print $token;

$token = "123";

if ($token) {

    $style = "display:none";

    $btn_style = "display:none";
} else {

    $style = "display:block";

    $btn_style = "";
}



?>

    <div class="wrap">
        <h1><?php _e('Swarm Effects') ?></h1>
        <hr>
        <div class="swarm-settings">
            <nav class="swarm-tab" >
                <a href="admin.php?page=swarm-effect" id="swarm-list" class="<?php echo $class_list; ?>">List</a> 
                <a href="admin.php?page=swarm-effect&swarm=new" id="swarm-new-item" class="<?php echo $class_new; ?>">Add New</a> 
                <!-- <a href="#" id="swarm-premium" >Get Pro Version</a> --> 
                <a href="admin.php?page=swarm-effect&swarm=instructions" id="swarm-instruction" class="<?php echo $class_inst; ?>" >Instructions</a>
            </nav>
            
             <div class="swarm_effect_overlay" style="<?php echo $style;?>;<?php echo $overlay_height; ?>">
                        
                            <?php $current_url = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']; ?>

                            <div class="swarm_effect_overlay-content">

                                <div><img src="<?php echo SWARM_EFFECT_URL ?>admin/img/padlock.png"></div>

                                <div class="swarm_effect_overlay-inst"><h1>Please Login With Twitter</h1></div>

                                <div>

                                    <a class="button button-primary swarm_effect_twitter_login_link" href="http://www.itsguru.com/swarm_effect/twitter_oauth/twtconnect.php?source=wp&ref=<?php echo $current_url; ?>" >

                                        Login With Twitter

                                    </a>

                                </div>

                                <?php
                                if (isset($_GET['err'])) {
                                    ?>

                                    <div class="swarm_effect_error_overlay">

                                        This Twitter account is already linked with another website. Please login with another account.

                                    </div>

                                    <?php
                                }
                                ?>
                            </div>

                        </div>
                        
            <div class="swarm-tab-div">
                <div id="List" class="swarm-effects-tab-div" style="<?php echo $display_list; ?>">
                    <?php include SWARM_EFFECT_DIR . "admin/pages/swarm-list.php"; ?>
                </div>
                <div id="Add" class="swarm-effects-tab-div" style="<?php echo $display_new; ?>">
                    <?php include SWARM_EFFECT_DIR . "admin/pages/swarm-add.php"; ?>
                </div>
                <div id="Instructions" class="swarm-effects-tab-div" style="<?php echo $display_inst; ?>">
                    <?php include SWARM_EFFECT_DIR . "admin/pages/swarm-instructions.php"; ?>
                </div>
            </div>
        </div>
    </div>
