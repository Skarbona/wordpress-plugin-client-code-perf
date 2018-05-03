<?php

function fs_activate_plugin()  {


    if(version_compare(get_bloginfo('version'),'4.9' ,'<')) {

        wp_die('You must update Wordpress to use this plugin!');

    }


    global $wp_roles;
    add_role('product_adder','Front End Product Adder',array(
        'read' => true,
        'upload_files' => true,
        'edit_posts' => true
    ));

    global $wpdb; //Global for WP database

    $prefixDb = $wpdb->prefix;
    $tablename = $prefixDb . 'clients_needs';
    $charsetDb = $wpdb->get_charset_collate();

    //Creating Data Base

    $createSQL = "CREATE TABLE $tablename (
	`id` INT NOT NULL AUTO_INCREMENT , `client_id` INT(255) NOT NULL , `product_id` INT(255) NOT NULL , `quantity` VARCHAR(255) NOT NULL , `date` DATETIME NOT NULL , `probability` VARCHAR(255) NOT NULL , PRIMARY KEY (`id`)
    ) $charsetDb; ";


    require_once( ABSPATH . '/wp-admin/includes/upgrade.php' );
    //ABSPATH DIRECT TO WP INSTALLATION

    dbDelta($createSQL); //Connect database to CREATE TABLE
}