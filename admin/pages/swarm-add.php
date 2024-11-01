<?php 
global $wpdb;

require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'swarm_effects';

if(isset($_GET) && isset($_GET['swarm_id'])){
    //print_r($_GET['swarm_id']);
   
    
    $swarm_effects_edit = $wpdb->get_results("SELECT * FROM $table_name WHERE id='".sanitize_text_field($_GET['swarm_id'])."'");
  // print_r($swarm_effects_edit);
  
    $addswarm = "2";
    $swarm_edit_id = sanitize_text_field($_GET['swarm_id']);
}else{
    $addswarm = "1";
}


$swarm_effects_all = $wpdb->get_results("SELECT * FROM $table_name");

?>
<div class="swarm_effects_exists_count" data-count="<?php echo count($swarm_effects_all);?>" style="opacity: 0;"></div>
<?php 
if(count($swarm_effects_all) == 3 && !isset($_GET['swarm_id'])){
?>
	<div class="swarm-error"><strong>Your Swarm Effects Limit is Over.Delete any one Swarm Effects and than Add New.</strong></div>
<?php 
}
?>
<form method="post" action="admin.php?page=swarm-effect&swarm=new" id="swarm-form">
    <div class="swarm-tabs-menu">
        <ul class="swarm-nav swarm-nav-tabs">
            <li id="swarm-add" class="swarm-tab-nav"><a href="#">Add New</a></li>
            <li id="swarm-design" class="swarm-tab-nav"><a href="#">Design</a></li>
            <li id="swarm-position" class="swarm-tab-nav"><a href="#">Position</a></li>
            <li id="swarm-display-rules" class="swarm-tab-nav"><a href="#">Display Rules</a></li>
        </ul>
    </div>
    <div class="swarm-tab-div-page swarm-add-form swarm-add">
       	<?php include SWARM_EFFECT_DIR . 'admin/pages/swarm-add-tabs/swarm-add-form.php'; ?>
    </div>

    <div class="swarm-tab-div-page swarm-design">
        	<?php include SWARM_EFFECT_DIR . 'admin/pages/swarm-add-tabs/swarm-design.php'; ?>
    </div>

    <div class="swarm-tab-div-page swarm-position">
        	<?php include SWARM_EFFECT_DIR . 'admin/pages/swarm-add-tabs/swarm-position.php'; ?>
    </div>

    <div class="swarm-tab-div-page swarm-display-rules">
        	<?php include SWARM_EFFECT_DIR . 'admin/pages/swarm-add-tabs/swarm-display-rules.php'; ?>
    </div>

   
</form>
