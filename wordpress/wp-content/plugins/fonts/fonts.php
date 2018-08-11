<?php 
/*
Plugin Name: Fonts
Plugin URI: http://wpsites.net/plugins/fonts/
Description: Premium Upgrades: <a href="http://wpsites.net/wordpress-admin/add-google-web-fonts-to-your-wordpress-editor/">Add Google Fonts</a> | <a href="http://wpsites.net/wordpress-themes/add-custom-fonts-to-the-wordpress-editor/">Add custom fonts</a> | <a href="https://www.facebook.com/wpsites.net/messages/">Support</a> | <a href="https://wordpress.org/support/plugin/fonts/reviews/?filter=5">Click here to leave a review</a>
Version: 2.3
Author: Brad Dalton - WP Sites
Author URI: http://wpsites.net/wordpress-admin/add-google-web-fonts-to-your-wordpress-editor/
License: GPL2
*/

if ( ! defined( 'ABSPATH' ) ) {
    die( 'Sorry, you are not allowed to access this page directly.' );
}

function add_more_buttons($buttons) {
$buttons[] = 'fontselect';
$buttons[] = 'fontsizeselect';
return $buttons;
}

add_filter("mce_buttons_3", "add_more_buttons");

