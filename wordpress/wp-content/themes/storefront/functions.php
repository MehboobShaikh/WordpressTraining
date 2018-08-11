<?php
/**
 * Storefront engine room
 *
 * @package storefront
 */

/**
 * Assign the Storefront version to a var
 */
$theme              = wp_get_theme( 'storefront' );
$storefront_version = $theme['Version'];
global $br;

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$storefront = (object) array(
	'version' => $storefront_version,

	/**
	 * Initialize all the things.
	 */
	'main'       => require 'inc/class-storefront.php',
	'customizer' => require 'inc/customizer/class-storefront-customizer.php',
);

require 'inc/storefront-functions.php';
require 'inc/storefront-template-hooks.php';
require 'inc/storefront-template-functions.php';

if ( class_exists( 'Jetpack' ) ) {
	$storefront->jetpack = require 'inc/jetpack/class-storefront-jetpack.php';
}

if ( storefront_is_woocommerce_activated() ) {
	$storefront->woocommerce = require 'inc/woocommerce/class-storefront-woocommerce.php';

	require 'inc/woocommerce/storefront-woocommerce-template-hooks.php';
	require 'inc/woocommerce/storefront-woocommerce-template-functions.php';
}

if ( is_admin() ) {
	$storefront->admin = require 'inc/admin/class-storefront-admin.php';

	require 'inc/admin/class-storefront-plugin-install.php';
}

/**
 * NUX
 * Only load if wp version is 4.7.3 or above because of this issue;
 * https://core.trac.wordpress.org/ticket/39610?cversion=1&cnum_hist=2
 */
if ( version_compare( get_bloginfo( 'version' ), '4.7.3', '>=' ) && ( is_admin() || is_customize_preview() ) ) {
	require 'inc/nux/class-storefront-nux-admin.php';
	require 'inc/nux/class-storefront-nux-guided-tour.php';

	if ( defined( 'WC_VERSION' ) && version_compare( WC_VERSION, '3.0.0', '>=' ) ) {
		require 'inc/nux/class-storefront-nux-starter-content.php';
	}
}

/**
 * Note: Do not add any custom code here. Please use a custom plugin so that your customizations aren't lost during updates.
 * https://github.com/woocommerce/theme-customisations
 */



function add_input_field(){
	echo "Hi SMS!";
}

add_action('woocommerce_login_form_end','add_input_field');



function get_brand_name(){
		if(is_user_logged_in()){
			session_start();
			return $_SESSION['brand'];
		}
		else{
			return '';
		}

}


function wc_custom_user_redirect( $redirect, $user ) {

	// global $br;
	$role = $user->roles[0];
	// $brand_name = set_or_get_brand_name($_POST['brand']);//set brand name
	// $dashboard = admin_url();
	$shop = get_permalink( wc_get_page_id( 'shop' ) );
	if( $role == 'administrator' ) {
		//Redirect administrators to the shop page
		$redirect = $shop;
		session_start();
		$_SESSION['brand'] = $_POST['brand'];
	}
	return $redirect;
}

add_filter( 'woocommerce_login_redirect', 'wc_custom_user_redirect', 10, 2 );

/*
function set_columns($columns){
$columns = 1;
return $columns;
}
add_filter('storefront_loop_columns','set_columns', 10, 1);
*/


function change_query_shop(){

$args = array(
	'post_type'=>'post',
	'posts_per_page'=>-1,
);

}

// add_filter('woocommerce_product_object_query_args','chnge_query_shop');



function dynamic_query($q){
	// global $br;
	// var_dump($br);
	$q->set('meta_key','product_brand');
	$q->set('meta_value',get_brand_name());
	// echo "<h1>SMS".var_dump(get_brand_name())."</h1>";
	// echo "<h1>SMS".var_dump($b)."</h1>";
	// var_dump($_SESSION['brand']);

}
add_action('woocommerce_product_query','dynamic_query');



function end_the_session(){
	session_unset();
	session_destroy();
}
add_action('wp_logout','end_the_session');