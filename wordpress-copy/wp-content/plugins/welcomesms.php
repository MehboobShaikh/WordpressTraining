<?php

/*
Plugin Name: Welcome Message by SMS
Description: This is Welcome message plugin by Mehboob. It will Show your Name and Role in the Dashboard. as well as Remove Howdy and display Hi in adminbar.
Author: Mehboob Shaikh
Version: 1.0
Author URI: https://www.twitter.com/mehboob_siraj
*/

function welcome_message() {
	/** These is the msg */
	$user_obj = wp_get_current_user();
	$site = get_bloginfo('name');
	$role = $user_obj->roles[0];
	$user =$user_obj->data->display_name;
	$msg = 'Hello, <span id="name">'."$user".'</span> Welcome to the '."$site".' Dashboard <p>You are the <span id="role">'."$role".'</span> for this site</p>';

	return $msg;
}

// This just echoes the chosen line, we'll position it later
function w_message() {
	$chosen = welcome_message();
	echo "<div class='user-details notice notice-success'><h4>User Detail</h4><p id='msg'>$chosen</p></div>";
}
//While Admin Dashboard Home Page loading
add_action( 'wp_dashboard_setup', 'w_message' );
// add_action( 'plugins_loaded', 'w_message' );

//CSS
function welcome_css() {

	echo "
	<style type='text/css'>
	#msg {
		color: gray;		
		margin: 0;
		font-size: 12px;
	}
	#name,#role {
	    text-transform: capitalize;
		font-size: 13px;
		font-weight: bold;
		color: #0073aa;
	}
	</style>
	";
}

add_action( 'admin_head', 'welcome_css' );

//========================================= EDIT Howdy in ADMIN BAR =============================================

	function change_howdy_message($text) {
	$text = str_replace('Howdy', 'Hi', $text);
	return $text;
	}
	add_filter('gettext', 'change_howdy_message');
	

?>
