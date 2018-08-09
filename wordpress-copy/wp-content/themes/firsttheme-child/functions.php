<?php


//Child theme Resources

function childtheme_resources(){
	wp_enqueue_style('child-style',get_stylesheet_directory_uri().'/style.css');
}
add_action('wp_enqueue_scripts','childtheme_resources');


?>



