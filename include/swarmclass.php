<?php

class SWARMEFFECTClass
{
    // For Insert Swarm Notification Data
    function addNewSwarmEffect($postdata)
    {
        
        // print_r($postdata);
        global $wpdb;
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'swarm_effects';
        
        if (isset($_POST['swarm-background-color']) && sanitize_text_field($_POST['swarm-background-color'])) {
            if (sanitize_text_field($_POST['swarm-background-color']) == "000000") {
                $txtcolor = "ffffff";
            } elseif (sanitize_text_field($_POST['swarm-background-color']) == "ffffff") {
                $txtcolor = "000000";
            } elseif (sanitize_text_field($_POST['swarm-background-color']) == "26C281") {
                $txtcolor = "000000";
            }
        }
        
        $swarm_style = array(
            "background_color" => sanitize_text_field($_POST['swarm-background-color']),
            "color"=>$txtcolor
        );
        
        $swarm_display = array(
            "swarm_min_second_display" => sanitize_text_field($_POST['show-min-second']),
            "show_max_seconds_display" => sanitize_text_field($_POST['show-max-second'])
        );
        $swarm_position = array(
            "actual_position" => sanitize_text_field($_POST['swarm-actual-position']),
            "left_position" => sanitize_text_field($_POST['swarm-left-position']),
            "right_position" => sanitize_text_field($_POST['swarm-right-position']),
            "top_position" => sanitize_text_field($_POST['swarm-top-position']),
            "bottom_position" => sanitize_text_field($_POST['swarm-bottom-position'])
        );
        
        $insertdata = array(
            "title" => sanitize_text_field($_POST['swarm-add-name']),
            "swarm_title" => sanitize_text_field($_POST['swarm-add-title']),
            "swarm_menu_icon" => sanitize_text_field($_POST['swarm_menu_icon']),
            "swarm_text" => sanitize_text_field($_POST['swarm-add-text']),
            "swarm_name" => sanitize_text_field($_POST['names']),
            "swarm_city" => sanitize_text_field($_POST['cities']),
            "amount_min" => sanitize_text_field($_POST['swarm-amount-min']),
            "amount_max" => sanitize_text_field($_POST['swarm-amount-max']),
            "swarm_style" => serialize($swarm_style),
            "swarm_display" => serialize($swarm_display),
            "swarm_position" => serialize($swarm_position),
            "status" => "0"
        );
        // print_r($insertdata);
        $wpdb->insert($table_name, $insertdata);
        
        // Insert Data For Display Rules
        $swarm_id = $wpdb->insert_id;
        
        $table_display_rules = $wpdb->prefix . 'swarm_effects_display_rules';
        
        // $show_url = explode(",", sanitize_text_field($_POST['swarm_show_url']));
        // $dont_show_url = explode(",", sanitize_text_field($_POST['swarm_dont_show_url']));
        
        if (empty($_POST['swarm_post_status'])) {
            $_POST['swarm_post_status'] = "0";
        }
        if (empty($_POST['swarm_page_status'])) {
            $_POST['swarm_page_status'] = "0";
        }
        
        $display_rules_data = array(
            "swarm_id" => $swarm_id,
            "post_status" => sanitize_text_field($_POST['swarm_post_status']),
            "page_status" => sanitize_text_field($_POST['swarm_page_status'])
        )
        ;
        
        $wpdb->insert($table_display_rules, $display_rules_data);
        
        wp_redirect("admin.php?page=swarm-effect");
    }
    
    // For Edit Notification Data
    function editSwarmEffect($postdata)
    {
        global $wpdb;
       
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'swarm_effects';
        
        
        if (isset($_POST['swarm-background-color']) && sanitize_text_field($_POST['swarm-background-color'])) {
            if (sanitize_text_field($_POST['swarm-background-color']) == "000000") {
                $txtcolor = "ffffff";
            } elseif (sanitize_text_field($_POST['swarm-background-color']) == "ffffff") {
                $txtcolor = "000000";
            } elseif (sanitize_text_field($_POST['swarm-background-color']) == "26C281") {
                $txtcolor = "000000";
            }
        }
        
        $swarm_style = array(
            "background_color" => sanitize_text_field($_POST['swarm-background-color']),
            "color"=>$txtcolor
        );
        
        $swarm_display = array(
            "swarm_min_second_display" => sanitize_text_field($_POST['show-min-second']),
            "show_max_seconds_display" => sanitize_text_field($_POST['show-max-second'])
        );
        $swarm_position = array(
            "actual_position" => sanitize_text_field($_POST['swarm-actual-position']),
            "left_position" => sanitize_text_field($_POST['swarm-left-position']),
            "right_position" => sanitize_text_field($_POST['swarm-right-position']),
            "top_position" => sanitize_text_field($_POST['swarm-top-position']),
            "bottom_position" => sanitize_text_field($_POST['swarm-bottom-position'])
        );
        
        $update_data = array(
            "title" => sanitize_text_field($_POST['swarm-add-name']),
            "swarm_title" => sanitize_text_field($_POST['swarm-add-title']),
            "swarm_menu_icon" => sanitize_text_field($_POST['swarm_menu_icon']),
            "swarm_text" => sanitize_text_field($_POST['swarm-add-text']),
            "swarm_name" => sanitize_text_field($_POST['names']),
            "swarm_city" => sanitize_text_field($_POST['cities']),
            "amount_min" => sanitize_text_field($_POST['swarm-amount-min']),
            "amount_max" => sanitize_text_field($_POST['swarm-amount-max']),
            "swarm_style" => serialize($swarm_style),
            "swarm_display" => serialize($swarm_display),
            "swarm_position" => serialize($swarm_position)
        );
        
        $where = array(
            "id" => sanitize_text_field($_POST['swarm_edit_id'])
        );
        $wpdb->update($table_name, $update_data, $where);
        
        // Update display rules data
        
        $table_display_rules = $wpdb->prefix . 'swarm_effects_display_rules';
        
        // print $_POST['swarm_show_url'];
        
        // $show_url = explode(",", sanitize_text_field($_POST['swarm_show_url']));
        // $dont_show_url = explode(",", sanitize_text_field($_POST['swarm_dont_show_url']));
        
        // print $show_url;
        
        if (empty($_POST['swarm_post_status'])) {
            $_POST['swarm_post_status'] = "0";
        }
        if (empty($_POST['swarm_page_status'])) {
           $_POST['swarm_page_status'] = "0";
        }
        
        $display_rules_data = array(
            "post_status" => sanitize_text_field($_POST['swarm_post_status']),
            "page_status" => sanitize_text_field($_POST['swarm_page_status'])
        );
        
        $where2 = array(
            "swarm_id" => sanitize_text_field($_POST['swarm_edit_id'])
        );
        $wpdb->update($table_display_rules, $display_rules_data, $where2);
        
        wp_redirect("admin.php?page=swarm-effect");
    }
    
    // For Enable/Disale Swarm Effects
    function ChangeStatusSwarmEffect($postdata)
    {
        global $wpdb;
               
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'swarm_effects';
        // print_r($_POST);
        $update_data = array(
            "status" => sanitize_text_field($_POST['swarm_status'])
        );
        
        $where = array(
            "id" => sanitize_text_field($_POST['swarm_edit_id'])
        );
        $wpdb->update($table_name, $update_data, $where);
    }
    
    // For Remove Swarm Effects
    function RemoveSwarmEffect($postdata)
    {
        global $wpdb;
        
        require_once (ABSPATH . 'wp-admin/includes/upgrade.php');
        
        $charset_collate = $wpdb->get_charset_collate();
        $table_name = $wpdb->prefix . 'swarm_effects';
        
        $where = array(
            "id" => sanitize_text_field($_POST['swarm_delete_id'])
        );
        
        $wpdb->delete($table_name, $where);
        
        // Delete Data from display rules table
        
        $table_display_rules = $wpdb->prefix . 'swarm_effects_display_rules';
        
        $where2 = array(
            "swarm_id" => sanitize_text_field($_POST['swarm_delete_id'])
        );
        
        $wpdb->delete($table_display_rules, $where2);
        
        
        $swarm_upload_dir = wp_upload_dir(__FILE__);
        
        $style_delete = $swarm_upload_dir['basedir'] . "/swarm_effect_assets/css/swarmstyle-".sanitize_text_field($_POST['swarm_delete_id']).".css";
        $sript_delete = $swarm_upload_dir['basedir'] . "/swarm_effect_assets/js/swarmscript-".sanitize_text_field($_POST['swarm_delete_id']).".js";
        $sript_view_delete = $swarm_upload_dir['basedir'] . "/swarm_effect_assets/js/swarmview-".sanitize_text_field($_POST['swarm_delete_id']).".js";
        
        unlink($style_delete);
        unlink($sript_delete);
        unlink($sript_view_delete);
    }
}