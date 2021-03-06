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
include('includes/mails/headers.php');
include('includes/front/enqueue.php');
include('includes/front/shop.php');
include('access/restricted.php');
include('access/customize-login.php');
include('includes/activate.php');
include('includes/admin/users/fields.php');
include('includes/admin/users/update.php');
include('includes/admin/users/register.php');
include('includes/admin/styles.php');
include('includes/admin/users/inactive.php');
include('includes/admin/users/messages.php');
include('process/product-page-vue-template.php');
include('process/add-to-database.php');
include('shortcodes/client-table.php');


//HOOKS
//Action Hooks
register_activation_hook(__FILE__, 'fs_activate_plugin'); //check WP version
add_action( 'wp_enqueue_scripts','fs_plugin_styles',100);
add_action( 'woocommerce_after_shop_loop_item', 'fs_shop_display_skus', 9 );
add_action( 'template_redirect', 'fs_forcelogin' );
add_action( 'plugins_loaded', 'fs_forcelogin_load_textdomain' );
add_filter( 'rest_authentication_errors', 'fs_forcelogin_rest_access', 99 );
add_action( 'login_enqueue_scripts', 'fs_login_logo' );
add_action( 'show_user_profile', 'fs_extra_author_fields' );
add_action( 'edit_user_profile', 'fs_extra_author_fields' );
add_action( 'personal_options_update', 'save_fs_extra_author_fields' );
add_action( 'edit_user_profile_update', 'save_fs_extra_author_fields' );
add_action( 'register_form', 'fs_registration_form' );
add_action( 'user_register', 'fs_user_register' );
add_action( 'admin_head', 'fs_custom_admin_user_styles');
add_action( 'user_register','fs_inactive');
add_action( 'woocommerce_product_meta_start', 'fs_woocommerce_before_add_to_cart_form');
add_action( 'wp_ajax_fs_add_to_database', 'fs_add_to_database' );


//Filters
add_filter( 'registration_errors', 'fs_registration_errors', 10, 3 );
add_filter( 'wp_mail_from_name', 'fs_fromname');
add_filter("login_headerurl","fs_login_logo_url");


//SHORTCODES
add_shortcode('product_creator','fs_product_creator');
add_shortcode( 'clients_table', 'fs_clients_table_function' );