<?php function fs_forcelogin() {

// Exceptions for AJAX, Cron, or WP-CLI requests
if ( ( defined( 'DOING_AJAX' ) && DOING_AJAX ) || ( defined( 'DOING_CRON' ) && DOING_CRON ) || ( defined( 'WP_CLI' ) && WP_CLI ) ) {
return;
}

// Redirect unauthorized visitors
if ( !is_user_logged_in() ) {
// Get URL
$url  = isset( $_SERVER['HTTPS'] ) && 'on' === $_SERVER['HTTPS'] ? 'https' : 'http';
$url .= '://' . $_SERVER['HTTP_HOST'];
// port is prepopulated here sometimes
if ( strpos( $_SERVER['HTTP_HOST'], ':' ) === FALSE ) {
$url .= in_array( $_SERVER['SERVER_PORT'], array('80', '443') ) ? '' : ':' . $_SERVER['SERVER_PORT'];
}
$url .= $_SERVER['REQUEST_URI'];

// Apply filters
$bypass = apply_filters( 'v_forcelogin_bypass', false );
$whitelist = apply_filters( 'v_forcelogin_whitelist', array() );
$redirect_url = apply_filters( 'v_forcelogin_redirect', $url );

// Redirect
if ( preg_replace('/\?.*/', '', $url) != preg_replace('/\?.*/', '', wp_login_url()) && !in_array($url, $whitelist) && !$bypass ) {
wp_safe_redirect( wp_login_url( $redirect_url ), 302 ); exit();
}
}
else {
// Only allow Multisite users access to their assigned sites
if ( function_exists('is_multisite') && is_multisite() ) {
$current_user = wp_get_current_user();
if ( !is_user_member_of_blog( $current_user->ID ) && !is_super_admin() )
wp_die( __( "You're not authorized to access this site.", 'wp-force-login' ), get_option('blogname') . ' &rsaquo; ' . __( "Error", 'wp-force-login' ) );
}
}
}


/**
* Restrict REST API for authorized users only
*
* @param WP_Error|null|bool $result WP_Error if authentication error, null if authentication
*                              method wasn't used, true if authentication succeeded.
*/
function fs_forcelogin_rest_access( $result ) {
if ( null === $result && !is_user_logged_in() ) {
return new WP_Error( 'rest_unauthorized', __( "Only authenticated users can access the REST API.", 'wp-force-login' ), array( 'status' => rest_authorization_required_code() ) );
}
return $result;
}


/*
* Localization
*/
function fs_forcelogin_load_textdomain() {
load_plugin_textdomain( 'wp-force-login', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

