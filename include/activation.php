<?php
/* ===================================== For Create Table ===================================== */

global $wpdb;
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

$charset_collate = $wpdb->get_charset_collate();
$table_name = $wpdb->prefix . 'swarm_effects';

$sql = "CREATE TABLE $table_name (
id mediumint(9) NOT NULL AUTO_INCREMENT,
title VARCHAR(200) NOT NULL,
swarm_title TEXT,
swarm_custom TEXT,
swarm_menu_icon TEXT,
swarm_custom_link TEXT,
swarm_text TEXT,
swarm_name TEXT,
swarm_city TEXT,
amount_min TEXT,
amount_max TEXT,
swarm_style LONGTEXT,
swarm_close_button LONGTEXT,
swarm_display LONGTEXT,
swarm_position LONGTEXT,
status VARCHAR(2) NOT NULL,
UNIQUE KEY id (id)
) $charset_collate;";
dbDelta($sql);

/*if (version_compare($version, '2.0') < 0) {
    $sql = "CREATE TABLE $table_name (
    id mediumint(9) NOT NULL AUTO_INCREMENT,
    title VARCHAR(200) NOT NULL,
    swarm_title TEXT,
    swarm_custom TEXT,
    swarm_menu_icon TEXT,
    swarm_custom_link TEXT,
    swarm_text TEXT,
    swarm_name TEXT,
    swarm_city TEXT,
    swarm_style TEXT,
    amount_min TEXT,
    amount_max TEXT,
    swarm_style LONGTEXT,
    swarm_close_button LONGTEXT,
    swarm_display LONGTEXT,
    swarm_position LONGTEXT,
    status VARCHAR(2) NOT NULL,
    UNIQUE KEY id (id)
    ) $charset_collate;";
    dbDelta($sql);
}*/

//Create New table for Display Rules

$swarm_display_rules = $wpdb->prefix . 'swarm_effects_display_rules';

$sql2 = "CREATE TABLE $swarm_display_rules (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        swarm_id VARCHAR(10) NOT NULL,
        post_status VARCHAR(10) NOT NULL,
        page_status VARCHAR(10) NOT NULL,
        show_url LONGTEXT,
        dont_show_url LONGTEXT,
        UNIQUE KEY id(id)
        )$charset_collate;";
        dbDelta($sql2);

       /* if (version_compare($version, '2.0') < 0) {
            $sql2 = "CREATE TABLE $swarm_display_rules (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            swarm_id VARCHAR(10) NOT NULL,
            post_status VARCHAR(10) NOT NULL,
            page_status VARCHAR(10) NOT NULL,
            show_url LONGTEXT,
            dont_show_url LONGTEXT,
            UNIQUE KEY id(id)
            )$charset_collate;";
            dbDelta($sql2);
        }*/
        //echo $wpdb->last_error;
/* ======================================== For Create Table ===================================== */