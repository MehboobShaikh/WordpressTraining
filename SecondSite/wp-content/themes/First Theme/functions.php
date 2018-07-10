<?php

	function firsttheme_resources(){
		wp_enqueue_style('style',getstylesheet_uri());
	}

	add_action('wp_enqueue_style','firsttheme_resources');

?>