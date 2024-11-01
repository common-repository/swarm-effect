<?php
/*
  Plugin Name: Swarm Effect
  Description: Create and display fictitious notifications on your website to show an effect of a busy store that motivates your users to take action.  With this plugin, you will be able to create a FOMO (Fear Of Missing Out) effect which creates a feeling of being left out from something interesting. 

  What can you do with Swarm Effect?
  - Create fictitious notification by using custom text and variables.
  - Easily select display from 8 different on-screen placements.
  - Randomized timing to make your notifications look real
  - 3 beautiful themes to choose from.
  - Ability to select font awesome icons (or custom icons) to add to your notifications.
  Version: 1.2.7
  Author: ItsGuru, uhpatel, urvihpatel
  Author URI: https://www.itsguru.com
  Plugin URI: https://wordpress.org/plugins/swarm-effect/
  License: GPL2
  Text Domain: swarm-effect
 */

if ( ! defined( 'SWARM_EFFECT_DIR' ) ) {
    define( 'SWARM_EFFECT_DIR', plugin_dir_path( __FILE__ ) );
}
if ( ! defined( 'SWARM_EFFECT_URL' ) ) {
    define( 'SWARM_EFFECT_URL', plugin_dir_url( __FILE__ ) );
}

//For Active Plugin

function activate_swarm_effect() {
    include SWARM_EFFECT_DIR . 'include/activation.php';
}
//register_activation_hook( __FILE__, 'activate_swarm_effect' );
add_action( 'admin_init', 'activate_swarm_effect' );


//For Uninstall Plugin

function swarm_effects_de_activate(){
   //For Drop Table From Database When unInstall plugin
   
    if (!defined('WP_UNINSTALL_PLUGIN')) {
        die;
    }
    
    global $wpdb;
    $swarm_effects = $wpdb->prefix . 'swarm_effects';
    $wpdb->query("DROP TABLE IF EXISTS $swarm_effects");
    
    
    $swarm_display_rules = $wpdb->prefix . 'swarm_effects_display_rules';
    $wpdb->query("DROP TABLE IF EXISTS $swarm_display_rules");
}

register_uninstall_hook(__FILE__, 'swarm_effects_de_activate');

//exit;

include SWARM_EFFECT_DIR . 'admin/swarm-effects-option.php';

if(!class_exists('SWARMEFFECTClass')){
    include SWARM_EFFECT_DIR . 'include/swarmclass.php';
}

if( !class_exists( 'SWARMEFFECTJavaScriptPacker' )) {
    require_once SWARM_EFFECT_DIR . 'include/class.JavaScriptPacker.php';
}

include SWARM_EFFECT_DIR . 'swarm_public/swarm-public.php';

function swarm_effect_options_link($links) {

    $settingsText = sprintf(_x('Settings', 'text for the link on the plugins page', 'swarm-effect'));

    $settings_link = '<a href="admin.php?page=swarm-effect">' . $settingsText . '</a>';

    array_unshift($links, $settings_link);

    return $links;
}

$swarmeffectlink = plugin_basename(__FILE__);
add_filter("plugin_action_links_".plugin_basename(__FILE__), 'swarm_effect_options_link');

?>