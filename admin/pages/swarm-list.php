<?php 
global $wpdb;

require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'swarm_effects';

$swarm_effects_list = $wpdb->get_results("SELECT * FROM $table_name");

$url = admin_url() . "admin-ajax.php";
//echo $url;
?>

<div class="swarm-list">
	<?php 
	if(count($swarm_effects_list) > 0){
	?>
    <table class="swarm-list-table">
    	<tr>
    		<th><strong>Sr.No.</strong></th>
    		<th><strong>Name</strong></th>
    		<th><strong>Edit</strong></th>
    		<th><strong>Delete</strong></th>
    		<th><strong>Activate/De-Activate</strong></th>
    	</tr>
    	<?php
    	
        	$page = 1;
        	foreach ($swarm_effects_list as $swarm){
        	   // print_r($swarm);
        	   if($swarm->status == 1){
        	       $checked = "checked";
        	   }else{
        	       $checked = "";
        	   }
        	   ?>
        	    <tr>
        	    	<td><?php echo $page;?></td>
        	    	<td><?php echo $swarm->title;?></td>
        	    	<td><a class="btn-swarm btn-swarm-info btn-swarm-sm" href="admin.php?page=swarm-effect&swarm=new&swarm_id=<?php echo $swarm->id;?>" title="Edit"><i class="fa fa-paint-brush" aria-hidden="true"></i></a></td>
        	    	<td>
        	    		<a class="btn-swarm btn-swarm-danger btn-swarm-sm remove-swarm" href="#" title="Remove" data-id="<?php echo $swarm->id;?>" >
        	    			<i class="fa fa-trash" aria-hidden="true"></i>
        	    		</a>
        	    		<div id="swarm-remove-div-<?php echo $swarm->id;?>" class="swarm-remove-popup" style="display: none">
        	    			<div class="swarm-remove-info">
        	    				Are You sure You want to Remove?<br>
        	    				<strong><?php echo $swarm->title;?></strong>
        	    			</div>
        	    			<div class="swarm-remove-button">
        	    				<button class="btn btn-primary btn-sm swarm-remove-yes" data-id="<?php echo $swarm->id;?>" data-url="<?php echo $url;?>">Yes</button>
        	    				<button class="btn btn-info btn-sm swarm-remove-no" data-id="<?php echo $swarm->id;?>">No</button>
        	    			</div>
        	    		</div>
        	    	</td>
        	    	<td><label class="switch swarm_switch" data-id="<?php echo $swarm->id;?>" data-status="<?php echo $swarm->status;?>" data-url="<?php echo $url;?>"><input type="checkbox" id="swarm-input-<?php echo $swarm->id;?>" <?php echo $checked;?>><div class="slider"></div></label></td>
        	    </tr>
        	   <?php 
        	   $page++;
        	}
    	?>
    	
    </table>
    <?php 
    }else{
    	    ?>
    	    <div class="list-text-notify">
    	    	<div>You don't have any notifications. Create one to make your website look Swarmed.</div>
    	    </div>
    	    <div class="list-btn-notify">
    	    	<div><a href="admin.php?page=swarm-effect&swarm=new" class="btn-swarm btn-swarm-success btn-swarm-lg swarm_effect_add_new_link">Create Notification Now</a></div>
    	    </div>
    	    <?php 
    	}
    	?>
    	
</div>

