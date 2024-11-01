<?php

function swarm_effect_admin_menu() {
    
    $icon = SWARM_EFFECT_URL  .  "admin/img/bee.png";
    add_menu_page('Swarm Effect', 'Swarm Effect', 'manage_options', 'swarm-effect', 'swarm_effect_settings_page', $icon, 99);
    add_submenu_page('swarm-effect', 'Swarm Effect', 'Settings', 'manage_options', 'swarm-effect', 'swarm_effect_settings_page');
}

add_action('admin_menu', 'swarm_effect_admin_menu');
add_action('plugins_loaded', 'swarm_effect_input_settings');


if ( !function_exists( 'swarm_effects_single_submenu_dropdown_link' ) ) {
    function swarm_effects_single_submenu_dropdown_link() {
        global $submenu;
        
        $link_to_add = 'https://wordpress.org/support/plugin/swarm-effect/reviews/';
        // change edit.php to the top level menu you want to add it to
        $submenu['swarm-effect'][] = array('Reviews', 'manage_options', $link_to_add);
    }
    add_action('admin_menu', 'swarm_effects_single_submenu_dropdown_link');
}

//Load All Style And Script
//function swarm_effects_script(){
    
    wp_enqueue_style('swarm_effect_main_script', SWARM_EFFECT_URL . 'admin/css/swarm-main.css');
    wp_enqueue_style('swarm_list_script', SWARM_EFFECT_URL . 'admin/css/swarm-list.css');
    wp_enqueue_style('swarm_add_script', SWARM_EFFECT_URL . 'admin/css/swarm-add.css');
    wp_enqueue_style('swarm_notification', SWARM_EFFECT_URL . 'admin/css/common.css');
    wp_enqueue_style('swarm_instructions', SWARM_EFFECT_URL . 'admin/css/swarm-instructions.css');
    wp_enqueue_style('swarm_display_rules', SWARM_EFFECT_URL . 'admin/css/swarm-display-rules.css');
    wp_enqueue_style('swarm_font-awesome', SWARM_EFFECT_URL . 'admin/css/font-awesome.css');
    
    wp_enqueue_script('jquery');
    wp_enqueue_script('swarm_swarm_jquery_ui', SWARM_EFFECT_URL . 'admin/js/jquery-ui.min.js');
    wp_enqueue_script('swarm_script_custom', SWARM_EFFECT_URL . 'admin/js/swarm.js');
    wp_enqueue_script( 'swarm_script_colorpicker_iris', SWARM_EFFECT_URL.'admin/colorpicker/color/dist/iris.min.js', array(), '1.0.0', true );
//}

//add_action( 'wp_enqueue_scripts', 'swarm_effects_script' );

function swarm_effect_settings_page() {

    include SWARM_EFFECT_DIR . 'admin/pages/swarm.php';
   
} 

//For Insert and Update Swarm Data

function swarm_effect_input_settings(){
    
   $objectItem = new SWARMEFFECTClass();
    
    if(isset($_POST) && isset($_POST['submit'])){
        if (sanitize_text_field($_POST["addswarm"]) == "1") {
            $objectItem->addNewSwarmEffect($_POST);
        }else if (sanitize_text_field($_POST["addswarm"]) == "2") {
            $objectItem->editSwarmEffect($_POST);
        }
    }
}

//For Change Status (Enable/Disable) Swarm

add_action("wp_ajax_swarm_effect_status_ajax_request", "swarm_effect_status_ajax_request");

function swarm_effect_status_ajax_request(){
    $objectItem = new SWARMEFFECTClass();
    if(isset($_POST) && isset($_POST['swarm_status']) && sanitize_text_field($_POST['swarm_status'])){
        $objectItem->ChangeStatusSwarmEffect($_POST);
    }
}

//For Remove Swarm
add_action("wp_ajax_swarm_effect_remove_swarm_ajax_request", "swarm_effect_remove_swarm_ajax_request");

function swarm_effect_remove_swarm_ajax_request(){
    $objectItem = new SWARMEFFECTClass();
    if(isset($_POST) && isset($_POST['swarm_delete_id']) && sanitize_text_field($_POST['swarm_delete_id'])){
        $objectItem->RemoveSwarmEffect($_POST);
    }
}

?>
