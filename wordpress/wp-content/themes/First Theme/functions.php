<?php

	// importing files like style.css

	function firsttheme_resources(){
		wp_enqueue_style('style',getstylesheet_uri());
	}

	add_action('wp_enqueue_script','firsttheme_resources');

	// regitering menus primary and footer menus

	register_nav_menu(array(
		'primary' => __( 'Primary Menu'),
		'footer' => __( 'Footer Menu')
	));

	function get_top_ancestor_id(){
		global $post;

			// check for is it has a parent or not

				// echo $post->post_parent;
			if($post->post_parent == 0){
				return $post->ID;
				}
			else{
				// echo "Hi";
				// echo $post->post_parent;

				/*below function returns an array but it store in ascending ordr 
				  but we want last ancestor nat first eg. we want grand father not father so we reverse the array */

				$ancestors = array_reverse(get_post_ancestors($post->ID));

				return $ancestors[0];
			}
	}


?>