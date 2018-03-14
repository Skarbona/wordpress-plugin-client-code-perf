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


}