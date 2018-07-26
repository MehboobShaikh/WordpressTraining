<!-- 

PHP 			=> 	Underscore( _ )
HTML / CSS 		=> 	Hyphen( - )
WORDPRESS SLUGs => 	Hyphen( - )
FILE NAME 		=> 	Hyphen( - )

 -->

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

	//=============================================== SUPPORT ==================================
	
	// Add Post Format Support
	add_theme_support('post-formats',array(
		'aside',
		'gallery',
		'link',
	));

	 // ====================================== WIDGET LOCATION =================================

	function firsttheme_custom_widget(){
		register_sidebar(array(
			'name' => __('Sidebar','firsttheme'),
			'id' => 'sidebar1',
			'description' => 'Drop your widgets to appear on right side of the page',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
		));
		
		register_sidebar(array(
			'name' => __('Footer Area 1','firsttheme'),
			'id' => 'footer1',
			'description' => 'Drop your widgets to appear in footer column 1 of the page',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
		));
		
		register_sidebar(array(
			'name' => __('Footer Area 2','firsttheme'),
			'id' => 'footer2',
			'description' => 'Drop your widgets to appear in footer column 2 of the page',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
		));
		
		register_sidebar(array(
			'name' => __('Footer Area 3','firsttheme'),
			'id' => 'footer3',
			'description' => 'Drop your widgets to appear in footer column 3 of the page',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
		));
		
		register_sidebar(array(
			'name' => __('Footer Area 4','firsttheme'),
			'id' => 'footer4',
			'description' => 'Drop your widgets to appear in footer column 4 of the page',
			'before_widget' => '<div class="widget-item">',
			'after_widget' => '</div>',
		));
	}

	add_action('widgets_init','firsttheme_custom_widget');


	 // ======================================= CUSTOMIZER =====================================

	function firsttheme_customize_register($wp_customize){

	//---------------------------------- Section for Color -------------------------------------

		$wp_customize->add_section('firsttheme_color',array(
			'title' => __('Colors','firsttheme'),
			'description' => 'Modify the theme'
		));

		$colors = array();
		$font_families = array();

	//Background Color
		$colors[] = array(
		  'slug'=>'background_color', 
		  'default' => '#f1f1f1',
		  'label' => __('Website Background', 'firsttheme')
		);
	//Post Title Color
		$colors[] = array(
		  'slug'=>'post_title_color', 
		  'default' => '#4cbfd5',
		  'label' => __('Post Title', 'firsttheme')
		);
	//Post Content Color
		$colors[] = array(
		  'slug'=>'post_content_color', 
		  'default' => '#333',
		  'label' => __('Post Content', 'firsttheme')
		);

	//Website Name Font Family
		$font_families[] = array(
			'slug' => 'site_name_font_family',
			'default' => 'san-serif',
			'label' => __('Website Site Name','firsttheme'),
		);

	//Post Title Font Family
		$font_families[] = array(
			'slug' => 'post_title_font_family',
			'default' => 'san-serif',
			'label' => __('Post Title','firsttheme'),
		);

	//Post Content Font Family
		$font_families[] = array(
			'slug' => 'post_content_font_family',
			'default' => 'san-serif',
			'label' => __('Post Content','firsttheme'),
		);


	//Website Name Font Size
		$font_sizes[] = array(
			'slug' => 'site_name_font_size',
			'default' => 2,
			'label' => __('Website Site Name','firsttheme'),
		);

	//Post Title Font Size
		$font_sizes[] = array(
			'slug' => 'post_title_font_size',
			'default' => 1.5,
			'label' => __('Post Title','firsttheme'),
		);

	//Post Content Font Size
		$font_sizes[] = array(
			'slug' => 'post_content_font_size',
			'default' => 1,
			'label' => __('Post Content','firsttheme'),
		);


		foreach( $colors as $color ) {
	// COLOR SETTINGS
		  $wp_customize->add_setting($color['slug'], array(
		  	'default' => $color['default'],
		    'type' => 'option', 
		    'capability' => 'edit_theme_options',
		));
		  
	// COLOR CONTROLS
		  $wp_customize->add_control(new WP_Customize_Color_Control(
		  	$wp_customize,$color['slug'],array(
		  		'description' => 'Select Color',
		  		'label' => $color['label'],
		  		'section' => 'firsttheme_color',
		  		'settings' => $color['slug'])
		  ));
		}

		foreach( $font_families as $font_family ) {
	// FONT FAMILY SETTINGS
		  $wp_customize->add_setting($font_family['slug'], array(
		  	'default' => $font_family['default'],
		    'capability' => 'edit_theme_options',
		  ));
		  
	// FONT FAMILY CONTROLS
		  $wp_customize->add_control($font_family['slug'],array(
			'description' => 'Select the Font Family.',
		  	'label' => $font_family['label'], 
		    'section' => 'firsttheme_color',
		    'settings' => $font_family['slug'],
		    'type' => 'select',
		    'choices' => array(
		    	//Value => Option
		    	$font_family['default'] => __($font_family['default'],'firsttheme'),
		    	'Arial' => 'Arial',
		    	'Crimson Text' => __('Crimson Text'),
		    	'Markazi Text' => __('Markazi Text'),
		    	'Artifika' => __('Artifika'),
		    ),
		  ));

		}


		foreach( $font_sizes as $font_size ) {
	// FONT SIZE SETTINGS
		  $wp_customize->add_setting($font_size['slug'], array(
		  	'default' => $font_size['default'],
		    'capability' => 'edit_theme_options',
		  ));
		  
	// FONT SIZE CONTROLS
		  $wp_customize->add_control($font_size['slug'],array(
			'description' => 'Enter the Font Size in em.',
		  	'label' => $font_size['label'], 
		    'section' => 'firsttheme_color',
		    'settings' => $font_size['slug'],
		    'type' => 'number',
		  ));

		}


	//----------------------------------- Section for Copyright -----------------------------------

		$wp_customize->add_section('firsttheme_copyright',array(
			'title' => __('Copyright','firsttheme'),
			'description' => 'Edit Copyright of your site'
		));

	//COPYRIGHT SETTINGS

		$wp_customize->add_setting('copyright',array(
			'default' => '&copy; 2018 My Blog'
		));

	//COPYRIGHT CONTROLS

		$wp_customize->add_control('copyright',array(
			'label' => __('Enter Copyright of your site','firsttheme'),
			'section' => 'firsttheme_copyright',
			'setting' => 'copyright'
		));


	//FONT COLOR SETTINGS

		$wp_customize->add_setting('copyright_font_color',array(
			'default' => '#6c3e1e'
		));

	//FONT COLOR CONTROLS

		$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize,'copyright_font_color',array(
			'description' => 'Select the Font Color for Copyright',
			'label' => __('Font Color','firsttheme'),
			'section' => 'firsttheme_copyright',
			'setting' => 'copyright_font_color'
		)));

	}


	// CSS Customizer Function

	function firsttheme_css_customizer(){
		$background_color = get_option('background_color');
		$post_title_color = get_option('post_title_color');
		$post_content_color = get_option('post_content_color');
		?>

		<style type="text/css">
			body{
				background-color: #<?php echo $background_color; ?>;
			}
			.copyright {
				color: <?php echo get_theme_mod('copyright_font_color'); ?>;
			}
			a.post-title {
				color: <?php echo $post_title_color; ?>;
				font-family: <?php echo get_theme_mod('post_title_font_family'); ?>;
				font-size: <?php echo get_theme_mod('post_title_font_size').'em'; ?>;
			}
			div.post-content {
				color: <?php echo $post_content_color; ?>;
				font-family: <?php echo get_theme_mod('post_content_font_family'); ?>;
				font-size: <?php echo get_theme_mod('post_content_font_size').'em'; ?>;
			}
			a.site-name {
				font-family: <?php echo get_theme_mod('site_name_font_family'); ?>;
				font-size: <?php echo get_theme_mod('site_name_font_size').'em'; ?>;
			}
		</style>

		<?php
	}


	//hook for css output i.e. Live Preview
	add_action('wp_head','firsttheme_css_customizer');

	//hook for registering Customizer
	add_action('customize_register','firsttheme_customize_register');


	// ================================== CUSTOM SETTING PAGE ===================================

/*
	=======================
		OUTPUT FUNCTIONS
	=======================
*/	


	// This function will return output page of custom setting
	function firsttheme_custom_add_menu_page_settings(){
		require_once(get_template_directory().'/inc/templates/settings-page.php');
	}


	// CUSTOM CSS
	function firsttheme_add_sub_menu_page_css(){

	}

//+++++++++++++++++++++++++++++++++++++++++ REWRITE BELOW CODE ++++++++++++++++++++++++++++++++++++++++++++++++++

	//In this function we are registering and creating setting sections
	function firsttheme_custom_setting(){


		// Personal Setting Part

		register_setting('firsttheme-settings-group','first_name');	//Schema

		add_settings_section('firsttheme-settings-section',__('Settings Section','firsttheme'),'firsttheme_settings_section','firsttheme-menu-settings');

		add_settings_field('settings-field-name',__('First Name','firsttheme'),'settings_field_name','firsttheme-menu-settings','firsttheme-settings-section');

		// Social URL's Setting Part
//========================================================Continue COde Here

	}


	function firsttheme_settings_section(){
		echo "Customize Your Information Here";
	}

	function settings_field_name(){

		$firstname = esc_attr(get_option('first_name'));

		echo '<input type="text" value="' . $firstname . '" placeholder="Enter First Name" />';
	}

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++


	// This function creates an Custom Menu Item on lefthand side of Dashboard
	function firsttheme_custom_add_menu_item() {

		//Page-Title, Menu-Title, Capability, slug, Callback-Function-Name, Icon-URL, Position-of-Item
		// dashicons-admin-generic => It is Wordpress dash Icon
		add_menu_page(__('First Theme Settings Options','firsttheme'),__('First Theme','firsttheme'),'manage_options','firsttheme-menu-settings','firsttheme_custom_add_menu_page_settings','dashicons-admin-generic');

		// Creating Sub Menu Items
		// 1) SYNTAX => Parent-Slug, Page-Title, Menu-Title, Capability, Slug, Function-Name
	/*
		NOTE:- To remove redundant name in menu item, as it repeats first item same as parent to remove this we use below SYNTAX
	*/
		// 2) SYNTAX => Parent-Slug, Same-Page-Title-as-Parent, Menu-Title, Capability, Parent-Slug, Parent-Function
		add_submenu_page('firsttheme-menu-settings',__('First Theme Settings Options','firsttheme'),__('Settings','firsttheme'),'manage_options','firsttheme-menu-settings','firsttheme_custom_add_menu_page_settings');
		// Using above code it will not display the Parent menu name as first child name



		// For rest SubMenu Pages create using 1) SYNTAX
		//SubMenu 1
		add_submenu_page('firsttheme-menu',__('First Theme CSS Option','firsttheme'),__('Custom CSS','firsttheme'),'manage_options','firsttheme-menu-custom-css','firsttheme_add_sub_menu_page_css');


		// Activate Custom Srttings
		add_action('admin_init','firsttheme_custom_setting');

	}

	add_action('admin_menu','firsttheme_custom_add_menu_item');



?>