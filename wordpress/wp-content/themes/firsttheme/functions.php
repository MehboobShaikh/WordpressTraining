<?php

/*
PHP 			=> 	Underscore( _ )
HTML / CSS 		=> 	Hyphen( - )
WORDPRESS SLUGs => 	Hyphen( - )
FILE NAME 		=> 	Hyphen( - )
*/




	//Recomended way for including google font in wordpress
/*	
	function my_google_font() {
		wp_enqueue_style( 'my-google-font', 'http://fonts.googleapis.com/css?family=Raleway' );
	}
	add_action( 'wp_enqueue_scripts', 'my_google_font' );
*/

	

	//Javascript files needed for Media Uploader

	require get_template_directory().'/inc/enqueue.php';


	// importing files like style.css and javaScript files etc

	function firsttheme_resources(){
		// Google font file 
		wp_enqueue_style('font-style',get_template_directory_uri().'/font/font-style.css');
		wp_enqueue_style('firsttheme-style',get_template_directory_uri().'/style.css');
		
		// wp_enqueue_style('movie',get_template_directory_uri().'/movie.css');
		//jquery is included
		wp_enqueue_script('jquery');
		
	}

	add_action('wp_enqueue_scripts','firsttheme_resources');

	// regitering new Menu


	function firsttheme_register_new_menu(){
		register_nav_menu('footer',__('Custom Menu'));
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
	// Post Thumbnails
	add_theme_support('post-thumbnails');
	// Custom Sizes of Image
	add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

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
		// add_submenu_page('firsttheme-menu-settings',__('First Theme Settings Options','firsttheme'),__('Settings','firsttheme'),'manage_options','firsttheme-menu-settings','firsttheme_custom_add_menu_page_settings');
		// Using above code it will not display the Parent menu name as first child name


		// For rest SubMenu Pages create using 1) SYNTAX
		//SubMenu 1
		// add_submenu_page('firsttheme-menu',__('First Theme CSS Option','firsttheme'),__('Custom CSS','firsttheme'),'manage_options','firsttheme-menu-custom-css','firsttheme_add_sub_menu_page_css');


		// Activate Custom Srttings
		add_action('admin_init','firsttheme_custom_setting');

	}
	add_action('admin_menu','firsttheme_custom_add_menu_item');


/*	=======================
		OUTPUT FUNCTIONS
	=======================
*/	


	// This function will return output page of custom setting
	function firsttheme_custom_add_menu_page_settings(){
		// var_dump(get_current_screen());
		require_once(get_template_directory().'/inc/templates/settings-page.php');
	}


	// CUSTOM CSS
	function firsttheme_add_sub_menu_page_css(){
		// var_dump(get_current_screen());
	}

//+++++++++++++++++++++++++++++++++++++++++ TAKE A LOOK ON CODE ++++++++++++++++++++++++++++++++++++++++++++++++++



	//In this function we are registering and creating setting sections
	function firsttheme_custom_setting(){


		// Personal Setting Part
		//Schema
		register_setting('firsttheme-settings-group','first_name');	//firstname
		register_setting('firsttheme-settings-group','last_name');	//lastname
		register_setting('firsttheme-settings-group','profile_description');//Profile Description
		register_setting('firsttheme-settings-group','twitter_url'/*,'firsttheme_sanitize_twitter_url'*/);//Twitter Url
		register_setting('firsttheme-settings-group','google_plus_url');//Google plus Url
		register_setting('firsttheme-settings-group','facebook_url');//Facebook Url
		register_setting('firsttheme-settings-group','profile_img');//Profile Image


		//sections
		add_settings_section('firsttheme-settings-section',__('Settings Section','firsttheme'),'firsttheme_settings_section','firsttheme-menu-settings');//Setting Section


		//Setting Fields
		add_settings_field('settings-field-firstname',__('Full Name','firsttheme'),'settings_field_fullname','firsttheme-menu-settings','firsttheme-settings-section'); //Fullname field

		add_settings_field('settings-field-description',__('Description','firsttheme'),'settings_field_description','firsttheme-menu-settings','firsttheme-settings-section'); //Description field

		add_settings_field('settings-field-twitter',__('Twitter','firsttheme'),'settings_field_twitter','firsttheme-menu-settings','firsttheme-settings-section');//Twitter field

		add_settings_field('settings-field-google-plus',__('Google +','firsttheme'),'settings_field_google_plus','firsttheme-menu-settings','firsttheme-settings-section');//Google+ field

		add_settings_field('settings-field-facebook',__('Facebook','firsttheme'),'settings_field_facebook','firsttheme-menu-settings','firsttheme-settings-section');//Facebook field

		add_settings_field('settings-field-profile-img',__('Profile Image','firsttheme'),'settings_field_profile_img','firsttheme-menu-settings','firsttheme-settings-section');//Profile Image field

		// Social URL's Setting Part

	}


	function firsttheme_settings_section(){
		echo "Customize Your Personal Details Here";	//Setting Section output
	}

	function settings_field_fullname(){

		$firstname = esc_attr(get_option('first_name'));
		$lastname = esc_attr(get_option('last_name'));

		echo '<input type="text" name="first_name" value="' . $firstname . '" placeholder="Enter First Name" />';
		echo '<input type="text" name="last_name" value="' . $lastname . '" placeholder="Enter Last Name" />';
	}

	function settings_field_description(){

		$profile_description = esc_attr(get_option('profile_description'));

		echo '<textarea name="profile_description" rows="5" cols="50" placeholder="Enter Short Description">'.$profile_description. '</textarea><p class="description">Enter 50-60 Character About your profile</p>';
	}

	function settings_field_twitter(){
		$twitter_url = esc_attr(get_option('twitter_url'));
		echo '<input type="text" name="twitter_url" value="' . $twitter_url . '" placeholder="Enter Twitter Url" /><p class="description">Do not Enter @ Symbol</p>';
	}

	// Sanitize Setting of Twitter Url

	/*function firsttheme_sanitize_twitter_url( $input ){
		$sanitize_output = sanitize_text_field($input);
		$sanitize_output = str_replace('@', '', $sanitize_output);
		return $sanitize_output;
	}*/

	function settings_field_google_plus(){
		$google_plus_url = esc_attr(get_option('google_plus_url'));
		echo '<input type="text" name="google_plus_url" value="' . $google_plus_url . '" placeholder="Enter Google Plus Url" /><p class="description">Eg. https://www.google.plus/xyz</p>';
	}

	function settings_field_facebook(){
		$facebook_url = esc_attr(get_option('facebook_url'));
		echo '<input type="text" name="facebook_url" value="' . $facebook_url . '" placeholder="Enter Facebook Url" /><p class="description">Eg. https://www.facebook.com/xyz</p>';
	}

	function settings_field_profile_img(){
		$profile_img = get_option('profile_img');

		echo '<input type="button" class="bitton button-secondary" value="Upload Profile Picture" id="upload-button" /><input type="hidden" id="profile_img" name="profile_img" value="'. $profile_img .'" />';
	}




//=========================================== POST VIEWS =============================================

	// function to display number of posts.

	function getPostViews($postID){
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	        return "0 View";
	    }
	    return $count.' Views';
	}

	// function to count views.
	function setPostViews($postID) {
	    $count_key = 'post_views_count';
	    $count = get_post_meta($postID, $count_key, true);
	    if($count==''){
	        $count = 0;
	        delete_post_meta($postID, $count_key);
	        add_post_meta($postID, $count_key, '0');
	    }else{
	        $count++;
	        update_post_meta($postID, $count_key, $count);
	    }
	}



//====================================== FILTER USING AJAX ==============================================

	add_action('filter_my_categories','filter_post_category_wise');

	function filter_post_category_wise(){
		// get_template_part('filter-function');
		require_once 'filter-function.php';
	}

	//AJAX ACTION on FILTER

	add_action('wp_ajax_filter_ajax_action','filter_post_ajax_action');
	add_action('wp_ajax_nopriv_filter_ajax_action','filter_post_ajax_action');

	function filter_post_ajax_action(){
		// require get_template_part('filter-content');
		require 'filter-content.php';
	}



//==================================== CUSTOM BUTTONS IN VISIUAL EDITOR ===================================

	function add_style_select_buttons( $buttons ) {
    array_unshift( $buttons, 'styleselect' );
    return $buttons;
}
// Register our callback to the appropriate filter
// add_filter( 'mce_buttons', 'add_style_select_buttons' );



/*
============================
	CONTROL Image Quality
============================
*/

	//80 percent in below example
	// add_filter( 'jpeg_quality', create_function( '', 'return 80;' ) );


//======================================== WISIBIK EDITOR ==============================================

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');




function my_mce_before_init_insert_formats( $init_array ) {  

	$style_formats = array(
		array(  
            'title' => 'Content Block',  
            'block' => 'span',  
            'classes' => 'content-block',
            'wrapper' => true,
             
        ),  
        array(  
            'title' => 'Blue Button',  
            'block' => 'span',  
            'classes' => 'blue-button',
            'wrapper' => true,
        ),
        array(  
            'title' => 'Red Button',  
            'block' => 'span',  
            'classes' => 'red-button',
            'wrapper' => true,
        ),
    );

    $init_array['style_formats'] = json_encode( $style_formats );

    return $init_array;  
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 



function my_theme_add_editor_styles() {
    add_editor_style( 'editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );



//========================================= CREATE CUSTOM TAXONOMY ======================================


function create_custom_taxonomy(){
	//For News
	register_taxonomy(
		'news-category',
		'news',
		array(
			'label' => __('News Categories','firsttheme'),
			'rewrite' => array( 'slug' => 'news-category' ),
            'hierarchical' => true,
            'show_admin_column' => true,
		)
	);

	//For Movies
	register_taxonomy(
		'movies-category',
		'movies',
		array(
			'label' => __('Movie Categories','firsttheme'),
			'rewrite' => array('slug' => 'movies-category'),
			'hierarchical' => true,
		)
	);
}

add_action('init','create_custom_taxonomy');


// =========== DISABLE EDITOR ON CHILD PAGES WHOSE PARENT TITLE AS -> PAGE USING ACF <- ===========


function hide_editor() {
  // Get the Post ID.
  $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
  if( !isset( $post_id ) ) return;
  
  $post_parent_id = wp_get_post_parent_id( $post_id );
  if( !isset( $post_parent_id ) ) return;

  // Hide the editor on the parent page titled 'Page Using Acf'
  $page_parent_title = get_the_title($post_parent_id);
  if($page_parent_title == 'Page Using Acf'){ 
    remove_post_type_support('page', 'editor');
  }
}

add_action( 'admin_init', 'hide_editor' );

// ======================================= SLICK SLIDER ============================================
	
function add_scripts_for_slick_slider(){
	wp_enqueue_style('slick-slider-one','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css');
	wp_enqueue_style('slick-slider-two','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick-theme.min.css');
	wp_enqueue_script('slick-slider-script-one','https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.js');
}
add_action('wp_enqueue_scripts','add_scripts_for_slick_slider');


function add_my_js_for_slick_slider(){
	wp_enqueue_script('my-slick-slider-script',get_template_directory_uri().'/js/slick-slider.js');
}
add_action('wp_footer','add_my_js_for_slick_slider');







// ========================== ADD DROPDOWN IN ADMIN FOR CUSTOMIZE FILTERING ===========================

/*POSTS
===============
	GUI PART
===============
*/

//defining the filter that will be used so we can select posts by 'author'
function create_dropdown_for_author_list_in_admin(){

    //execute only on the 'post' content type
    global $post_type;
    if($post_type == 'post'){

        //get a listing of all users that are 'author'
        $user_args = array(
            'show_option_all'   => 'All Users',
            'orderby'           => 'display_name',
            'order'             => 'ASC',
            'name'              => 'aurthor_admin_filter',
            'include_selected'  => true
        );

        //determine if we have selected a user to be filtered by already
        if(isset($_GET['aurthor_admin_filter'])){
            //set the selected value to the value of the author   ID is Received
            $user_args['selected'] = (int)sanitize_text_field($_GET['aurthor_admin_filter']);
        }

        //display the users as a drop down
        wp_dropdown_users($user_args);
        //below code is for tags
        // wp_dropdown_categories(array('taxonomy'=> 'post_tag','hide_empty' => 0, 'name' => 'my_tags'));
    }

}
add_action('restrict_manage_posts','create_dropdown_for_author_list_in_admin');


/*POSTS
=====================
	FILTERING PART
=====================
*/


//restrict the posts by an author filter
function filter_dropdown_for_author_list_in_admin($query){

    global $post_type, $pagenow; 

    //if we are currently on the edit screen of the post type given below
    if($pagenow == 'edit.php' && $post_type == 'post'){

        if(isset($_GET['aurthor_admin_filter'])){	//variable received from GUI we have named up side

            //set the query variable for 'author' to the desired value
            $author_id = sanitize_text_field($_GET['aurthor_admin_filter']);

            //if the author is not 0 (meaning all)
            if($author_id != 0){
                $query->query_vars['author'] = $author_id;
            }

        }
    }
}

add_action('pre_get_posts','filter_dropdown_for_author_list_in_admin');





/*CUSTOM-POST-TYPE { NEWS }
===============
	GUI PART
===============
*/

//defining the filter that will be used so we can select posts by News Categories
function create_dropdown_for_news_category_in_admin(){

    //execute only on the 'post' content type given below i.e. News
    global $post_type;
    if($post_type == 'news'){

        //get a listing of all news categories
        $news_args = array(
            'show_option_all'   => 'All News',
            'orderby'						=> 'Name',
            'order'             => 'ASC',
            'name'              => 'news_admin_filter',
            'taxonomy'					=> 'news-category',
            'include_selected'  => true
        );

        //determine if we have selected a News Category to be filtered by already
        if(isset($_GET['news_admin_filter'])){
            //set the selected value to the value of the News Category
            $news_args['selected'] = sanitize_text_field($_GET['news_admin_filter']);
        }

        //display the News Catogories as a drop down
        wp_dropdown_categories($news_args);
    }

}
add_action('restrict_manage_posts','create_dropdown_for_news_category_in_admin');


/*CUSTOM-POST-TYPE
=====================
	FILTERING PART
=====================
*/

//restrict the posts by the chosen news category/taxonomy
function add_news_filter_to_posts($query){

    global $post_type, $pagenow;

    //if we are currently on the edit screen of the post type news
    if($pagenow == 'edit.php' && $post_type == 'news'){
        if(isset($_GET['news_admin_filter'])){

            //get the desired news category
            $news_category = sanitize_text_field($_GET['news_admin_filter']);
            //if the news category is not 0 (which means all)
            if($news_category != 0){
            	// var_dump($news_category);
                $query->query_vars['tax_query'] = array(
                    array(
                        'taxonomy'  => 'news-category',
                        'field'     => 'ID',
                        'terms'     => array($news_category)
                    )
                );

            }
        }
    }   
}
add_action('pre_get_posts','add_news_filter_to_posts');





// ================================== REMOVING FILTERS FROM ADMIN ===================================


add_action( 'load-edit.php', 'no_category_dropdown' );
function no_category_dropdown() {

    //below filter removes CTEGORY WISE
    // add_filter( 'wp_dropdown_cats', '__return_false' );

    //below filter removes BULK ACTIONS
    // add_filter( 'bulk_actions-' . 'edit-post', '__return_empty_array' );

    //below filter removes ALL DATES
    // add_filter('months_dropdown_results', '__return_empty_array');
}



// ====================================== CREATE OPTION PAGE ========================================


/*
if( function_exists('acf_add_options_page') ) {

$args = array(
	'page_title' => 'Options',
	'menu_title' => 'My Options',
	'menu_slug' => 'firsttheme-options',
	'capability' => 'edit_posts',
	// 'parent_slug' => '',
	// 'icon_url' => false,
	'redirect' => false,
	'update_button'		=> __('Save', 'acf'),
	'updated_message'	=> __("Options Saved", 'acf'),
);

acf_add_options_page( $args );
// acf_add_options_page('Theme Settings');
}
*/
if( function_exists('acf_add_options_page') ) {
	// OPTION PAGE THEME SETTING
	acf_add_options_page(array(
		'page_title' 	=> 'First Theme Settings',
		'menu_title'	=> 'My Settings',
		'menu_slug' 	=> 'firsttheme-settings',
		'post_id'		=> 'theme_settings_1',
		'update_button'		=> __('Save Options', 'acf'),
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	// SUB PAGE HEADER
	acf_add_options_sub_page(array(
		'page_title' 	=> 'First Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'firsttheme-settings',
	));
	// SUB PAGE FOOTER
	acf_add_options_sub_page(array(
		'page_title' 	=> 'First Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'firsttheme-settings',
	));
	
}





// ====================================== Customize Site Logo ========================================

function firstheme_customize_site_logo($wp_customize){
	// Header Logo
	/*$wp_customize->add_section('firsttheme_site_logo_section',array(
		'title'				=>	__('Site Logos','firsttheme'),
		'description'	=>	'Edit your Site Logo'
	));*/

	$wp_customize->add_setting('firsttheme_site_header_logo_setting',array(
		'default'	=>	'https://via.placeholder.com/150x50'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'firsttheme_site_header_logo_setting',array(
		'label'			=>	__('Site Header Logo','firsttheme'),
		'section'		=>	'title_tagline',
		'setting'		=>	'firsttheme_site_header_logo_setting'
	)));

	// Footer Logo
	$wp_customize->add_setting('firsttheme_site_footer_logo_setting',array(
		'default'	=>	'https://via.placeholder.com/50x50'
	));

	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'firsttheme_site_footer_logo_setting',array(
		'label'			=>	__('Site Footer Logo','firsttheme'),
		'section'		=>	'title_tagline',
		'setting'		=>	'firsttheme_site_footer_logo_setting'
	)));

}
add_action('customize_register','firstheme_customize_site_logo');




?>