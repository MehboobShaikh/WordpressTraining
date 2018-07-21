<?php


	//Recomended way for including google font in wordpress
/*	
	function my_google_font() {
		wp_enqueue_style( 'my-google-font', 'http://fonts.googleapis.com/css?family=Raleway' );
	}
	add_action( 'wp_enqueue_scripts', 'my_google_font' );
*/

	
	// importing files like style.css and javaScript files etc

	function firsttheme_resources(){
		// Google font file 
		wp_enqueue_style('font-style',get_template_directory_uri().'/font/font-style.css');
		wp_enqueue_style('style',get_template_directory_uri().'/style.css');
		wp_enqueue_style('movie',get_template_directory_uri().'/movie.css');
		wp_enqueue_script('jssor-slider',get_template_directory_uri().'/jssor-slider.js');
	}

	add_action('wp_enqueue_scripts','firsttheme_resources');

	// regitering new Menu


	function firsttheme_register_new_menu(){
		register_nav_menu('new-menu',__('Custom Menu'));
	}

	add_action('init','firsttheme_register_new_menu');

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


	// Checking for Easing Slider plugin installed and Activated or not.
/*
	function showMessagesToAdmin(){
		include_once(ABSPATH.'wp-admin/includes/plugin.php');

		if(!is_plugin_active('easing-slider/easing-slider.php')){
			echo '<div id="alert" class="error">';
			echo '<p>Please install and activate Easing Slider plugin to use this site.</p>';
			echo '</div>';
		}
	}

	add_action('admin_notices','showMessagesToAdmin');

*/

	// Add Post Format Support
	add_theme_support('post-formats',array(
		'aside',
		'gallery',
		'link'
	));

	 // Custom Customizer

	function firsttheme_customize_register($wp_customize){

	//-------------------- Section for Background Color

		$wp_customize->add_section('firsttheme_color',array(
			'title' => __('Colors','firsttheme'),
			'description' => 'Modify the theme colour'
		));

		$wp_customize->add_setting('background_color',array(
			'default' => '#fff'
		));

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'background_color',array(
			'label' => __('Change Background Color','firsttheme'),
			'section' => 'firsttheme_color',
			'setting' => 'background_color'
		)));

	//--------------------- Section for Copyright

		$wp_customize->add_section('firsttheme_copyright',array(
			'title' => __('Copyright','firsttheme'),
			'description' => 'Edit Copyright of your site'
		));

		$wp_customize->add_setting('copyright',array(
			'default' => '&copy; 2018 My Blog'
		));

		$wp_customize->add_control('copyright',array(
			'label' => __('Enter Copyright of your site','firsttheme'),
			'section' => 'firsttheme_copyright',
			'setting' => 'copyright'
		));

	}

	function firsttheme_css_customizer(){
		?>

		<style type="text/css">
			body{
				background-color: #<?php echo get_theme_mod('background_color'); ?>;
			}
		</style>

		<?php
	}


	add_action('wp_head','firsttheme_css_customizer');

	add_action('customize_register','firsttheme_customize_register');


?>