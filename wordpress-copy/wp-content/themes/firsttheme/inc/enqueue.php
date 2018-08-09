<?php


function firsttheme_media_uploader(){

	wp_enqueue_media();

	wp_register_script('firsttheme-media-uploader',get_template_directory_uri().'/js/firsttheme-media-uploader.js',array('jquery'),'1.0.0',true);
	wp_enqueue_script('firsttheme-media-uploader');
}
add_action('admin_enqueue_scripts','firsttheme_media_uploader');


?>