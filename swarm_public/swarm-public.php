<?php
global $wpdb;

require_once (ABSPATH . 'wp-admin/includes/upgrade.php');

$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'swarm_effects';

//-------------------------Check Display Rules-----------------------------------//
$table_display_rules = $wpdb->prefix . 'swarm_effects_display_rules';

//-------------------------Check Display Rules-----------------------------------//



$swarm_effects = $wpdb->get_results("SELECT * FROM $table_name WHERE status = '1'");

//print_r($swarm_effects);
//exit;

//For Create CSS File and Script File and Load On Window Load

if(count($swarm_effects) > 0){
    
    foreach ($swarm_effects as $key => $val) {
        
        //-------------------------Check Display Rules-----------------------------------//
        
        
       // $screen = get_current_screen();
       // var_dump($screen);
        $display_rules = $wpdb->get_results("SELECT * FROM $table_display_rules WHERE swarm_id = '".$val->id."'");
        
        if(!empty($display_rules)){
           
            $page_type = $_COOKIE['pagetype'];
           // echo $page_type;
            
            if($page_type == "post"){
                
                if($display_rules[0]->post_status == 1){
                    $display = "yes";
                }else{
                    $display = "no";
                }
            }
            
            //For Display All Pages
            if($page_type == "page"){
               
                if($display_rules[0]->page_status == 1){
                    $display = "yes";
                }else{
                    $display = "no";
                }  
            }
            
            if($page_type == all){
                $display = "yes";
            }
            
        }else{
            $display = "yes";
        }
      
       if($display == "yes"){
        
            $show_second = unserialize($val->swarm_display);
            $effects_position = unserialize($val->swarm_position);
            $swarm_style = unserialize($val->swarm_style);
            
            include 'swarm-view.php' ;
           
            //For Create Swarm Css File
            
            $swarm_upload_dir = wp_upload_dir(__FILE__);
            
            wp_mkdir_p( $swarm_upload_dir['basedir'] . "/swarm_effect_assets/css" );
            
            $path_style = $swarm_upload_dir['basedir'] . "/swarm_effect_assets/css/swarmstyle-".$val->id.".css";
          
            ob_start();
            include ( 'css/style.php');
            $content_style = ob_get_contents();
            ob_end_clean();
            file_put_contents($path_style, $content_style);
            
            wp_enqueue_style( 'swarm-effects-style-'.$val->id,$swarm_upload_dir['baseurl'] . '/swarm_effect_assets/css/swarmstyle-'.$val->id.'.css');
           
            //For Create Swarm Js File
            
            wp_mkdir_p( $swarm_upload_dir['basedir'] . "/swarm_effect_assets/js" );
            
            $path_script = $swarm_upload_dir['basedir'] ."/swarm_effect_assets/js/swarmscript-".$val->id.".js";
            ob_start();
            include ('script/script.php');
            $content_script = ob_get_contents();
           // $packer = new SWARMEFFECTJavaScriptPacker($content_script, 'Normal', true, false);
           // $packed = $packer->pack();
            ob_end_clean();
            file_put_contents($path_script, $content_script);
            wp_enqueue_script( 'swarm-effects-'.$val->id,  $swarm_upload_dir['baseurl']. '/swarm_effect_assets/js/swarmscript-'.$val->id.'.js', array( 'jquery' ) );
            
            
            $swarm_upload_dir = wp_upload_dir(__FILE__);
            
            wp_mkdir_p( $swarm_upload_dir['basedir'] . "/swarm_effect_assets/js" );
            
            $path_script_view = $swarm_upload_dir['basedir'] . "/swarm_effect_assets/js/swarmview-".$val->id.".js";
            
            ob_start();
            include ('script/append_swarm.php');
            $content_swarm_view = ob_get_contents();
            ob_end_clean();
            file_put_contents($path_script_view, $content_swarm_view);
            wp_enqueue_script( 'swarm-effects-view-'.$val->id,  $swarm_upload_dir['baseurl']. '/swarm_effect_assets/js/swarmview-'.$val->id.'.js', array( 'jquery' ) );
    
       }
    }
}