<?php
/*
Plugin Name: Chili IT for Perfecta
Description: Personalized plugin for Perfecta. Add to wishlist button. Contact button on product page.
Block Website for none register users.
Customize login page.
 */

if ( !function_exists( 'add_action' ) ) {
    echo 'Hi there!  I\'m just a plugin, not much I can do when called directly.';
    exit;
}
//SETUP
define('PORTFOLIO_PLUGIN_URL',__FILE__);


//INCLUDES
include('includes/front/enqueue.php');
include('includes/front/shop.php');
include('access/restricted.php');
include('access/customize-login.php');
include('includes/activate.php');


//HOOKS


//Action Hooks
register_activation_hook(__FILE__, 'fs_activate_plugin'); //check WP version
add_action( 'wp_enqueue_scripts','fs_plugin_styles',100);
add_action( 'woocommerce_after_shop_loop_item', 'fs_shop_display_skus', 9 );
add_action( 'plugins_loaded', 'fs_register_users_only' );
add_action( 'login_enqueue_scripts', 'fs_login_logo' );



//add_filter( 'woocommerce_bundled_product_gallery_classes', 'fs_pb_remove_images_class', 10, 2 );
add_filter("login_headerurl","fs_login_logo_url");






//Filter Hooks

//DODAC INCLUDE KTÓRY BĘDZIE GENEROWAC ID PRODUKTU NA DOLE STRONY, A POZNIEJ DODAC POPUP W BOOTSTRAPIE


//SHORTCODES

add_shortcode('product_creator','fs_product_creator');