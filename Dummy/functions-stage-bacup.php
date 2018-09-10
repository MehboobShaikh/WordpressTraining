<?php
/**
 * prdxn functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 ********************************************************************************/


/**
 * prdxn only works in WordPress 4.4 or later.
 ********************************************************************************/
if ( version_compare( $GLOBALS['wp_version'], '4.4-alpha', '<' ) ) {
	require get_template_directory() . '/inc/back-compat.php';
}


if ( ! function_exists( 'prdxn_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own prdxn_setup() function to override in a child theme.
 *
 * @since prdxn 1.0
 */

function prdxn_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/prdxn
	 * If you're building a theme based on prdxn, use a find and replace
	 * to change 'prdxn' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'prdxn' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for custom logo.
	 *
	 *  @since prdxn 1.2
	 ********************************************************************************/
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );


	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 *********************************************************************************************/
	add_theme_support( 'post-thumbnails' );
	add_image_size('featuredImageCropped', 500, 500, true);
    the_post_thumbnail('featuredImageCropped');
    set_post_thumbnail_size( 500, 500, array( 'center', 'center'));


	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'prdxn' ),
		'social'  => __( 'Social Links Menu', 'prdxn' ),
	) );


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 ********************************************************************************/
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );


	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 ********************************************************************************/
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
		'gallery',
		'status',
		'audio'
	) );


	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 ********************************************************************************/
	add_editor_style( array( 'css/editor-style.css', prdxn_fonts_url() ) );


	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
endif; // prdxn_setup

add_action( 'after_setup_theme', 'prdxn_setup' );

if ( ! function_exists( 'prdxn_fonts_url' ) ) :

/**
 * Register Google fonts for prdxn.
 *
 * Create your own prdxn_fonts_url() function to override in a child theme.
 *
 * @since prdxn 1.0
 *
 * @return string Google fonts URL for the theme.
 ********************************************************************************/


/*custom slider code*/
if (empty($cutom_post_types)) :

// Set which custom post types you want to include in your theme
  $cutom_post_types = array(
      'slick-sllider' => array()
  );
endif;

function create_custom_post() {
  global $cutom_post_types;
  foreach ($cutom_post_types as $key => $val) :
    $labels = array(
        'name' => _x($key, 'post type general name'),
        'singular_name' => _x($key, 'post type singular name'),
        'add_new' => _x('Add New', $key),
        'add_new_item' => __('Add New ' . $key),
        'edit_item' => __('Edit ' . $key),
        'new_item' => __('New ' . $key),
        'all_items' => __('All ' . $key),
        'view_item' => __('View ' . $key),
        'search_items' => __('Search ' . $key),
        'not_found' => __('No ' . $key . ' found'),
        'not_found_in_trash' => __('No ' . $key . ' found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => $key
    );
    if (!empty($val)):
      foreach ($val as $keys => $vals) :
        $labels[$keys] = $vals;
      endforeach;
    endif;
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our ' . $key . ' specific data',
        'public' => true,
        'menu_position' => 2,
        'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
        'has_archive' => true,
    );
    if (!empty($val)):
      foreach ($val as $keys => $vals) :
        $args[$keys] = $vals;
      endforeach;
    endif;
    register_post_type($key, $args);
  endforeach;
}

if (!empty($cutom_post_types)):
  add_action('init', 'create_custom_post', 10);
endif;
/*End custom post Code For Slider*/


function prdxn_fonts_url() {
	$fonts_url = '';
	$fonts     = array();
	$subsets   = 'latin,latin-ext';

	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'prdxn' ) ) {
		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
	}

	/* translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'prdxn' ) ) {
		$fonts[] = 'Montserrat:400,700';
	}

	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'prdxn' ) ) {
		$fonts[] = 'Inconsolata:400';
	}

	if ( $fonts ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $fonts ) ),
			'subset' => urlencode( $subsets ),
		), 'https://fonts.googleapis.com/css' );
	}

	return $fonts_url;
}
endif;


/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since prdxn 1.0
 ****************************************************************************************/
function prdxn_javascript_detection() {
	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
}

add_action( 'wp_head', 'prdxn_javascript_detection', 0 );


/**
 * Enqueues scripts and styles.
 *
 * @since prdxn 1.0
 ********************************************************************************/
function prdxn_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'prdxn-fonts', prdxn_fonts_url(), array(), null );

	// Theme stylesheet.
	wp_enqueue_style( 'prdxn-style', get_stylesheet_uri().'?'.time() );

	// Load the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'prdxn-ie', get_template_directory_uri() . '/css/ie.css', array( 'prdxn-style' ), '20160816' );
	wp_style_add_data( 'prdxn-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	wp_enqueue_style( 'prdxn-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'prdxn-style' ), '20160816' );
	wp_style_add_data( 'prdxn-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	wp_enqueue_style( 'prdxn-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'prdxn-style' ), '20160816' );
	wp_style_add_data( 'prdxn-ie7', 'conditional', 'lt IE 8' );

	//style for the datepciker

	wp_enqueue_style( 'jquery-ui-css', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css' );

	//style for scroll pane

	wp_enqueue_style( 'scroll-pane-css', get_template_directory_uri() . '/assets/vendor/jquery.jscrollpane.css', array( 'prdxn-style' ), '20160816' );

	wp_enqueue_style('prdxn-scroll-style', get_template_directory_uri() . '/assets/vendor/jquery.mCustomScrollbar.min.css', array(), '3.5');

    wp_enqueue_style( 'font-awesome-cdn', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' );


	// Load the html5 shiv.
	wp_enqueue_script( 'prdxn-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'prdxn-html5', 'conditional', 'lt IE 9' );

	wp_enqueue_script( 'prdxn-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20160816', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'prdxn-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20160816' );
	}

    wp_enqueue_script('prdxn-jquery', get_template_directory_uri() . '/assets/js/jquery-1.8.3.min.js', array('jquery'), true);

	wp_enqueue_script( 'prdxn-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20160816', true );
        
        // Load google reCaptcha script
        //if(is_page_template('jobpost-template-default')) {
            wp_enqueue_script( 'google-recaptcha', 'https://www.google.com/recaptcha/api.js', array(), '', true );            
        //}


    // Load scroll pane scripts


	wp_enqueue_script( 'jquery-mousewheel-script', get_template_directory_uri() . '/assets/vendor/jquery.mousewheel.js', array('jquery'), '20160816', true );

	wp_enqueue_script( 'scroll-pane-script', get_template_directory_uri() . '/assets/vendor/jquery.jscrollpane.min.js', array('jquery'), '20160816', true );

	// wp_enqueue_style('prdxn-flexslider-style', get_template_directory_uri() . '/assets/vendor/flexslider.min.css', array(), '3.2');

	wp_enqueue_script('prdxn-customscrollbar-script',get_template_directory_uri(). '/assets/vendor/jquery.mCustomScrollbar.concat.min.js', array('jquery'));


	if (is_page('people')) {
		wp_enqueue_script( 'prdxn-insta-script', get_template_directory_uri() . '/assets/js/instafeed.min.js', array( 'jquery' ), '', true );
	}

	wp_enqueue_script( 'prdxn-flex-script', get_template_directory_uri() . '/assets/js/jquery.flexslider-min.js', array( 'jquery' ), '20160840', true );

	if (is_front_page()) {
		wp_enqueue_script( 'prdxn-ui-script', get_template_directory_uri() . '/assets/js/jquery-ui.min.js', array( 'jquery' ), '201608546', true );
		wp_enqueue_script( 'prdxn-video-script', get_template_directory_uri() . '/assets/js/video.js', array( 'jquery' ), '20160849', true );
		wp_enqueue_script( 'prdxn-bigvideo-script', get_template_directory_uri() . '/assets/js/bigvideo.min.js', array( 'jquery' ), '20160850', true );
	}

  global $wp_query;
  $max = $wp_query->max_num_pages;
  $paged = ( get_query_var('paged') > 1 ) ? get_query_var('paged') : 1;
	wp_localize_script( 'prdxn-script', 'screenReaderText', array(
		'expand'   => __( 'expand child menu', 'prdxn' ),
		'collapse' => __( 'collapse child menu', 'prdxn' ),
		//Load More localize script
		array (
      'startPage' => $paged,
      'maxPages' => $max,
      'nextLink' => next_posts($max, false)
    )
	) );

	wp_register_style('su_slick', get_stylesheet_directory_uri() . '/slick-slider/slick.css');

    wp_enqueue_style('su_slick');

    wp_register_style('su_slick-theme', get_stylesheet_directory_uri() . '/slick-slider/slick-theme.css');

    wp_enqueue_style( 'su_slick-theme' );
    
    wp_enqueue_script("su_slick-js", "/wp-content/themes/prdxn/slick-slider/slick.js",array(),false,false);

	wp_enqueue_script( 'prdxn-jsscript', get_template_directory_uri() . '/assets/js/script.js?'.time(), array( 'jquery' ), '20160818', true );

}
add_action( 'wp_enqueue_scripts', 'prdxn_scripts' );

function wp_custom_admin_scripts() {
   wp_enqueue_script( 'custom_wp_admin_script', get_template_directory_uri() . '/assets/js/admin-style.js' ,array( 'jquery' ), '20160818', true );
}
add_action( 'admin_enqueue_scripts', 'wp_custom_admin_scripts' );


function wp_custom_admin_style() {
   wp_register_style( 'custom_wp_admin_css', get_theme_file_uri( '/css/admin-style.css' ), false, '1.0.0' );
   wp_enqueue_style( 'custom_wp_admin_css' );
}
add_action( 'admin_enqueue_scripts', 'wp_custom_admin_style' );


/**
 * Custom template tags for this theme.
 ********************************************************************************/
require get_template_directory() . '/inc/template-tags.php';


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since prdxn 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 ****************************************************************************************/
function prdxn_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];

	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}

	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'prdxn_content_image_sizes_attr', 10 , 2 );


/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since prdxn 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 ********************************************************************************************/
function prdxn_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}

add_filter( 'wp_get_attachment_image_attributes', 'prdxn_post_thumbnail_sizes_attr', 10 , 3 );


/**
 * create custom theme settings menu functionality
 * for header and footer setting page
 *
 * @since prdxn 1.0
 *
 *
 * @return Null
 ***********************************************************************/
	add_action('admin_menu', 'theme_setting_menu');


/**
 * Create theme setting menu
 *
 * @since prdxn 1.0
 *
 * @return Null
 *
***********************************************************************/
	function theme_setting_menu() {

	//create new top-level menu
		add_theme_page('Theme Settings', 'Theme Settings', 'administrator', 'theme_setting', 'header_footer_settings_page' , get_template_directory_uri() . '/assets/images/settings1.gif' );
	
		//create new top-level menu
		add_theme_page('theme_setting', 'Header_footer','Header_footer','administrator',  'theme_setting', 'header_footer_settings_page');

		//call register settings function
		add_action( 'admin_init', 'register_theme_settings' );
	}


/**
 *
 * register our settings fields with its group
 *
 * @since prdxn 1.0
 *
 * @return Null
**********************************************************************************/
	function register_theme_settings() {
		register_setting( 'header-theme-settings-group', 'headerlogo' );
		register_setting( 'footer-theme-settings-group', 'footerlogo' );
		register_setting( 'footer-theme-settings-group', 'contact1' );
		register_setting( 'footer-theme-settings-group', 'contact2' );
		register_setting( 'footer-theme-settings-group', 'email' );
		register_setting( 'footer-theme-settings-group', 'address1' );
		register_setting( 'footer-theme-settings-group', 'address1_redirect' );
		register_setting( 'footer-theme-settings-group', 'address2' );
		register_setting( 'footer-theme-settings-group', 'address2_redirect' );
	}


/**
 * Added header setting page fields
 *
 * @since prdxn 1.0
 *
 * @return Null
***************************************************************************/
	function header_footer_settings_page() {
		?>
      <script>
        jQuery(document).ready(function() {

          function uploadImage($buttonid, $textid) {
            jQuery($buttonid).click(function() {
             formfield = jQuery($textid).attr('name');
             tb_show('Upload a Logo', 'media-upload.php?type=image&amp;TB_iframe=true&post_id=0', false);
             return false;
            });

            window.send_to_editor = (function(html) {
              var imgurl = jQuery('img',html).attr('src');
             jQuery($textid).val(imgurl);
             tb_remove();
            });
          }
          uploadImage('#upload_image_button', '#upload_image');
        });
      </script>
      <!-- Header Section Code -->
		<div class="wrap">
			<h2>Header Settings</h2>
			<?php settings_errors(); ?>
			<form method="post" action="options.php">
				<?php settings_fields( 'header-theme-settings-group' ); ?>
				<?php do_settings_sections( 'header-theme-settings-group' ); ?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Header Logo</th>
						<td><label for="upload_image">
							<input id="upload_image" type="text" size="36" name="headerlogo" value="<?php echo esc_attr( get_option('headerlogo') ); ?>" />
							<input id="upload_image_button" type="button" name="headerlogo" value="Upload Logo" />
							<br />Enter an URL or upload an image for the header logo.
						</label></td>
					</tr>
				</table>

				<!-- Footer Section Code -->

				<h2>Footer Settings</h2>
			    <?php settings_errors(); ?>
			    <form method="post" action="options.php">
				<?php settings_fields( 'footer-theme-settings-group' ); ?>
				<?php do_settings_sections( 'footer-theme-settings-group' );
				?>
				<table class="form-table">
					<tr valign="top">
						<th scope="row">Footer Logo</th>
						<td><label for="upload_image">
							<input id="upload_image" type="text" size="36" name="footerlogo" value="<?php echo esc_attr( get_option('footerlogo') ); ?>" />
							<input id="upload_image_button" type="button" name="footerlogo" value="Upload Image" />
							<br />Enter an URL or upload an image for the banner.
						</label></td>
						</tr>
					<tr valign="top">
						<th scope="row">Enter Contact1</th>
						<td><input type="tel" name="contact1" value="<?php echo esc_attr( get_option('contact1') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Enter Contact2</th>
						<td><input type="tel" name="contact2" value="<?php echo esc_attr( get_option('contact2') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Enter Email Address</th>
						<td><input type="email" name="email" value="<?php echo esc_attr( get_option('email') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Enter Address1 to be display</th>
						<td><input type="text" name="address1" value="<?php echo esc_attr( get_option('address1') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Enter Address1 to be redirect</th>
						<td><input type="text" name="address1_redirect" value="<?php echo esc_attr( get_option('address1_redirect') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Enter Address2 to be display</th>
						<td><input type="text" name="address2" value="<?php echo esc_attr( get_option('address2') ); ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row">Enter Address2 to be redirect</th>
						<td><input type="text" name="address2_redirect" value="<?php echo esc_attr( get_option('address2_redirect') ); ?>" /></td>
					</tr>
				</table>

				<?php submit_button(); ?>
			</form>
		</div>
		<?php
	}

/**
 * Added footer setting page fields
 * Added Media upload functionality for logo
 * for header and footer setting page
 *
 * @since prdxn 1.0
 *
 * @return Null
 ******************************************************************************/
	function my_admin_scripts() {
		wp_enqueue_script('media-upload');
	 	wp_enqueue_script('thickbox');
  }

	function my_admin_styles() {
		wp_enqueue_style('thickbox');
	 }

	 if (isset($_GET['page']) && ($_GET['page'] ==  'theme_setting' || $_GET['page'] =='footer_setting')  ) {
	 	add_action('admin_print_scripts', 'my_admin_scripts');
	 	add_action('admin_print_styles', 'my_admin_styles');
	}


/**
 * Added Custom Posts type
 *
 * @since prdxn 1.0
 *
 * @return Null
 ************************************************************************/

add_action( 'init', 'prdxn_custom_posttype_call' );

function prdxn_custom_posttype($post_type, $name, $support = array( 'title', 'editor', 'thumbnail'), $menu_icon, $taxonomy = '') {
  register_post_type( $post_type,
    array(
      'labels' => array(
        'name' => $name,
        'singular_name' => $name
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => $post_type),
      'supports' => $support,
      'menu_icon' => $menu_icon,
      'taxonomies' => array( $taxonomy )
    )
  );
}

function prdxn_custom_posttype_call() {
  prdxn_custom_posttype('work', 'Work', array( 'title', 'thumbnail', 'page-attributes'), 'dashicons-products', 'work_team');
  prdxn_custom_posttype('case_study', 'Case Study', array( 'title', 'editor', 'thumbnail','page-attributes'), 'dashicons-media-text', 'work_team');
  prdxn_custom_posttype('service', 'Services', array( 'title', 'editor', 'thumbnail'), 'dashicons-networking');
  prdxn_custom_posttype('technologies', 'Tools & Technologies', array( 'title'), 'dashicons-awards');
  prdxn_custom_posttype('testimonials', 'Testimonials', array( 'title', 'editor', 'thumbnail','page-attributes'), 'dashicons-id');
}


/**
 * Add new manu image default sizes
 *
 * @since prdxn 1.0
 *
 * @return $sizes which gives the size of an image
 *********************************************************************************/
add_filter( 'menu_image_default_sizes', function($sizes){

  // remove the default 36x36 size
  unset($sizes['menu-36x36']);

  // add a new size
  $sizes['menu-50x50'] = array(50,50);

  // return $sizes (required)
  return $sizes;

});


 /**
 * Add CUSTOM ADMIN LOGIN HEADER LOGO
 *
 * @since prdxn 1.0
 *
 * @return Null
 ******************************************************************************/
function prdxn_custom_login_logo()
{
    echo '<style  type="text/css"> h1 a {  background-image:url(' . get_template_directory_uri() . '/assets/images/prdxn_black.png) !important; background-position: center !important; } </style>';
}

add_action('login_head',  'prdxn_custom_login_logo');


 /**
 * Add CUSTOM ADMIN LOGIN LOGO LINK
 *
 * @since prdxn 1.0
 *
 * @return login url of site
 ****************************************************************************/

function change_wp_login_url()
{
    $login_url = home_url();
    return $login_url;
}
add_filter('login_headerurl', 'change_wp_login_url');


/**
 * Add CUSTOM ADMIN LOGIN LOGO & ALT TEXT
 *
 * @since prdxn 1.0
 *
 * @return title of site
 *************************************************************************/
function change_wp_login_title()
{
    $title = get_bloginfo('name');
    return $title;
}
add_filter('login_headertitle', 'change_wp_login_title');


/**
 * Replace admin footer text
 *
 * @since prdxn 1.0
 *
 * @return Null
 *****************************************************************************/
function uptown_crazy_admin_footer() {
  echo '<p>Developed by <a href="'.home_url().'">PRDXN</a>.</p>';
}

add_filter('admin_footer_text', 'uptown_crazy_admin_footer');


/**
 * Replace wordpress dashboard logo with prdxn logo
 *
 * @since prdxn 1.0
 *
 * @return Null
 *******************************************************************/
function prdxn_custom_logo() {
echo '
<style type="text/css">
#wpadminbar #wp-admin-bar-wp-logo > .ab-item .ab-icon:before {
  background: #fff url(' . get_template_directory_uri() . '/assets/images/favicon.png) no-repeat !important;
  background-size: 100% 100% !important;
  color: rgba(0,0,0,0);
}
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item .ab-icon { cursor: default; }
#wp-toolbar .menupop.hover .ab-sub-wrapper { display: none; }
#wpadminbar #wp-admin-bar-wp-logo.hover > .ab-item { pointer-events: none; }
</style>
';
}

//hook into the administrative header output
add_action('wp_before_admin_bar_render', 'prdxn_custom_logo');


/**
 * REMOVE META BOXES FROM WORDPRESS DASHBOARD FOR ALL USERS
 *
 * @since prdxn 1.0
 *
 * @return Null
 ****************************************************************************/
function prdxn_remove_dashboard_widgets()
{
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;

    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
}

add_action('wp_dashboard_setup', 'prdxn_remove_dashboard_widgets' );

/**
 * Create Team Taxonomy for work and casestudy custom post type
 *
 * @since prdxn 1.0
 *
 * @return Null
 ****************************************************************************/
add_action( 'init', 'create_team_works_call' );

function create_team_works($slug, $post_type, $label) {
  register_taxonomy(
    $slug,
    $post_type,
    array(
      'label' => __( $label ),
      'rewrite' => array( 'slug' => $slug ),
      'hierarchical' => true,
    )
  );
}

function create_team_works_call() {
  create_team_works( 'work_team', array('work', 'case_study'), 'Applicable Team');
}

/**
 * Remove Default Post type
 *
 * @since prdxn 1.0
 *
 * @return Null
 ****************************************************************************/
add_action('admin_menu','remove_default_post_type');

function remove_default_post_type() {
  remove_menu_page('edit.php');
}

/**
 * Simple Job board plugin update
 *
 * @since prdxn 1.0
 *
 * @return Null
 ****************************************************************************/

add_image_size( 'medium', 500, 500, true );

add_image_size( 'single-post-thumbnail', 1500, 575, true );

add_image_size('featuredImageDetail', 825, 510, true);
the_post_thumbnail('featuredImageDetail');

// Remove menu items from WP dashboard
function remove_dashboard_menus(){
  remove_menu_page( 'edit-comments.php' );          //Comments
}
add_action( 'admin_menu', 'remove_dashboard_menus' );

//Redirect Single page to 404

add_action( 'template_redirect', 'wpse_128636_redirect_post' );
function wpse_128636_redirect_post() {
    $queried_post_type = get_query_var('post_type');
    if (( is_single() || is_archive()) && ( 'service' ==  $queried_post_type || 'technologies' == $queried_post_type || 'testimonials' == $queried_post_type ||  (is_archive() && 'jobpost' ==  $queried_post_type))) {
        wp_redirect( 404 );
        exit;
    }
}

add_theme_support( 'automatic-feed-links' );


/**
* Job Board Attachments
*
* */

// Filter to Attach HR Resume
add_filter('sjb_hr_notification_attachment', 'custom_code_for_hr_resume_attachment', 20, 2);
add_filter('sjb_admin_notification_attachment', 'custom_code_for_hr_resume_attachment', 20, 2);

function custom_code_for_hr_resume_attachment( $resume_path, $post_id ){
    $resume_path = get_post_meta( $post_id, 'resume_path', TRUE );
    return $resume_path;
}

function isa_add_cron_recurrence_interval( $schedules ) {
	
	$schedules['daily'] = array(
		'interval'  => 86400,
		'display'   => __( 'Every Day', 'textdomain' )
		);
	
	return $schedules;
}
add_filter( 'cron_schedules', 'isa_add_cron_recurrence_interval' );



add_action('wp','activateMe');

function activateMe(){
	if(!wp_next_scheduled('daily')){
		wp_schedule_event(current_time('timestamp'),'daily','daily');
	}
}

add_action('daily','removeCareers');

function removeCareers()
{
	
	global $wpdb;

	date_default_timezone_set('Asia/Kolkata');

	$date=strtotime(date('Y-m-d H:i:s',strtotime('-3 month')));

		/*==================================================
		=            Delete Resume from folders            =
		==================================================*/
		
		$results = $wpdb->get_results('
			SELECT p.*,q.*
			FROM '.$wpdb->prefix.'postmeta p INNER JOIN '. $wpdb->prefix.'posts q ON q.ID= p.post_id WHERE (UNIX_TIMESTAMP(q.post_date) < "'.$date.'" and q.post_type="jobpost_applicants")');


		foreach ($results as $key => $value) {
			if($value->meta_key='resume_path')
			{			
				unlink($value->meta_value);
			}
		}	
		
		/*=====  End of Delete Resume from folders  ======*/

		
		/*==================================================
		=            Delete records from tables            =
		==================================================*/
		
		$query = "DELETE p.*,q.* FROM prdxn_postmeta p INNER JOIN prdxn_posts q ON q.ID= p.post_id WHERE (UNIX_TIMESTAMP(q.post_date) < '$date' and q.post_type='jobpost_applicants')";
		$deleteCareerPost = $wpdb->query($query);
		
		/*=====  End of Delete records from tables  ======*/
	
}

add_action( 'template_redirect', 'prdxn_attachment_redirect' );
function prdxn_attachment_redirect(){
if ( is_attachment() &&  is_single()) :
   wp_redirect( '/page-not-found' );
       exit;
   endif;
   wp_reset_query();
}

function prdxn_wrong_login()
{ 
   return ' Enter valid username and password'; 
} 
add_filter('login_errors','prdxn_wrong_login');

add_action('sjb_uploaded_resume_validation', 'prdxn_jobapplicationValidation');
function prdxn_jobapplicationValidation() {
    if (isset($_POST['action']) && isset($_POST['wp_nonce'])) {
        $gotErrors = false;
        $errorArray = array();
        $detailedErrorInfo = array(); 
        $name = trim($_POST['jobapp_name']);
        $residance = trim($_POST['jobapp_residence']);
        $qualification = trim($_POST['jobapp_qualification']);
        $qPassingDate = trim($_POST['jobapp_qualification_passing_date']);
        $useremail = trim($_POST['jobapp_email']);
        $usermobnumber = trim($_POST['jobapp_phone_number']);
        $resumeLink = trim($_POST['jobapp_resume_link']);
        $portfolioLink = trim($_POST['jobapp_portfolio_link']);
        $certificationInfo = trim($_POST['jobapp_certification']);
        $linkValidationPattern = '/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[A-Za-z0-9_-]+\.+[A-Za-z0-9.\/%&=\?_:;-]+$/';
        $secretStaging='6LdrZjEUAAAAAGFOWDLTPDfC88eObAkpm-pKZcRR';
        $secretLive = '6LeXflwUAAAAAMOtQsRmJ6Swv34hewrI-2qKeUXv';
	$response=$_POST["g-recaptcha-response"];
	$verify=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretLive}&response={$response}");

	$captcha_success=json_decode($verify);
	// if ($captcha_success->success==false) {
 //            $gotErrors = true;
 //            array_push($errorArray, 'Please check a captcha. <script>jQuery(\'#sjb-form-padding-button > span\').remove();</script>');
	// }
	// else if ($captcha_success->success==true) {
	//   //This user is verified by recaptcha
 //           die('User.');
	// }
       
        if ($name != '') {
            //Mandatory single name, optional additional names, WITH spaces, WITH special characters:
            if (!preg_match('/^[A-za-z\'\. -]{2,70}$/', $name)) {
                $gotErrors = true;
                array_push($errorArray, 'Please enter a valid name');
                $detailedErrorInfo['jobapp_name'] = 'Please enter a valid name';
            }
        }
        if ($residance != '') {
            if (!preg_match('/^[A-Za-z]+((\s)?([A-Za-z])+)*$/', $residance) || strlen($residance) > 50) {
                $gotErrors = true;
                array_push($errorArray, 'Not a valid residence');
                $detailedErrorInfo['jobapp_residence'] = 'Not a valid residence';
            }
        }
        if ($qualification != '') {
            //!preg_match('/^[a-zA-Z]+[\/\(\)].+/', $qualification);
            if (strlen($qualification) > 70) {
                $gotErrors = true;
                array_push($errorArray, 'Not a valid qualification details');
                $detailedErrorInfo['jobapp_qualification'] = 'Not a valid qualification details';
            }
        }
        if ($qPassingDate != '') {
            $dateFrmt1Arr = explode("-", $qPassingDate);
            $dateFrmt2Arr = $dateFrmt1Arr[1] ? $dateFrmt1Arr : (explode("/", $qPassingDate));
            if (!is_numeric($dateFrmt2Arr[0]) || !is_numeric($dateFrmt2Arr[1]) || !is_numeric($dateFrmt2Arr[2]) || strlen($qPassingDate) > 10 || isset($dateFrmt2Arr[3])) {
                $gotErrors = true;
                array_push($errorArray, 'Not a valid date');
                $detailedErrorInfo['jobapp_qualification_passing_date'] = 'Not a valid date';
            }
        }
        if ($useremail != '') {
            if (!preg_match('/^([a-z0-9]+([_\.\-]{1}[a-z0-9]+)*){1}([@]){1}([a-z0-9]+([_\-]{1}[a-z0-9]+)*)+(([\.]{1}[a-z]{2,6}){0,3}){1}$/i', $useremail)) {
                $gotErrors = false;
                array_push($errorArray, 'Please enter a valid email address');
                $detailedErrorInfo['jobapp_email'] = 'Please enter a valid email address';
            }
        } else {
            $gotErrors = false;
            array_push($errorArray, 'Please enter your email address');
            $detailedErrorInfo['jobapp_email'] = 'Please enter your email address';
        }
        if ($usermobnumber != '') {
            $phonePattern = '/^[{0-9} +()-]{6,15}$/';
            if (!preg_match($phonePattern, $usermobnumber)) {
                $gotErrors = true;
                array_push($errorArray, 'Please enter a valid phone number');
                $detailedErrorInfo['jobapp_phone_number'] = 'Please enter a valid phone number';
            }
        }
        if ($resumeLink != '') {
            if (!preg_match($linkValidationPattern, $resumeLink)) {
                $gotErrors = true;
                array_push($errorArray, 'Please enter a valid resume link');
                $detailedErrorInfo['jobapp_resume_link'] = 'Please enter a valid resume link';
            }
        }
        if ($portfolioLink != '') {
            if (!preg_match($linkValidationPattern, $portfolioLink)) {
                $gotErrors = true;
                array_push($errorArray, 'Please enter a valid portfolio link');
                $detailedErrorInfo['jobapp_portfolio_link'] = 'Please enter a valid portfolio link';
            }
        }
        if ($certificationInfo != '') {
            $certificatePat = '/^[0-9A-Za-z#\-, \.]{2,100}$/';
            if (!preg_match($certificatePat, $certificationInfo) || strlen($certificationInfo) > 100) {
                $gotErrors = true;
                array_push($errorArray, 'Please enter a valid certification');
                $detailedErrorInfo['jobapp_certification'] = 'Please enter a valid certification';
            }
        }
        if($gotErrors) {
            $errors = '<div class="clearfix"></div><div class="alert alert-danger" role="alert">';
            $detailedResp = json_encode($detailedErrorInfo);
            foreach ($errorArray as $avalue) {
                $errors .= '<p>' . $avalue . '</p>';
            }
            $errors .= '</div>';
            $response = json_encode(array('success' => FALSE, 'error' => $errors, 'details'=>$detailedResp));
            header( "Content-Type: application/json" );
            echo $response;
            exit();     
        }
    }
}

// Remove WP Version From Styles	
add_filter( 'style_loader_src', 'sdt_remove_ver_css_js', 9999 );
// Remove WP Version From Scripts
add_filter( 'script_loader_src', 'sdt_remove_ver_css_js', 9999 );

// Function to remove version numbers
function sdt_remove_ver_css_js( $src ) {
	if ( strpos( $src, 'ver=' ) )
		$src = remove_query_arg( 'ver', $src );
	return $src;
}

//Function for display medium post

function posts_display_extend($atts){
	ob_start();
	 $a = shortcode_atts(array('handle'=>'-1', 'default_image'=>'//i.imgur.com/p4juyuT.png', 'display' => 3, 'offset' => 0, 'total' => 10, 'list' => false, 'publication' => false), $atts);
	// No ID value
	if(strcmp($a['handle'], '-1') == 0){
			return "";
	}
	$handle=$a['handle'];
	$default_image = $a['default_image'];
	$display = $a['display'];
	$offset = $a['offset'];
	$total = $a['total'];
	$list = $a['list'] =='false' ? false: $a['list'];
	$publication = $a['publication'] =='false' ? false: $a['publication'];

	$data = file_get_contents("https://medium.com/".$handle."/latest?format=json");

	$data = str_replace("])}while(1);</x>", "", $data);
	if($publication) {
		
		//If handle provided is specified as a publication
		$json = json_decode($data);
		$items = array();
		$count = 0;
		$name = '';
		if(isset($json->payload->posts))
		{
			$posts = $json->payload->posts;
	
			foreach($posts as $post)
			{
				$name = $post->creatorId;
				if($count <= 2) {

					if(strlen($post->title) >= 40) {
						$items[$count]['title'] = substr($post->title,0,40).'...';	
					}else {
						$items[$count]['title'] = $post->title;	
					}
					if ($post->previewContent->bodyModel->paragraphs[2]->text == NUll) {
					$items[$count]['paragraphs'] = substr($post->previewContent->bodyModel->paragraphs[1]->text,0,90).'...';	
					}else{
						$items[$count]['paragraphs'] = substr($post->previewContent->bodyModel->paragraphs[2]->text,0,90).'...';
					}
					$items[$count]['name'] = json_decode(json_encode($json->payload->references->User->$name->name), True);
					$items[$count]['autherImg'] = json_decode(json_encode($json->payload->references->User->$name->imageId), True);
					$items[$count]['url'] = 'https://medium.com/'.$handle.'/'.$post->uniqueSlug;
					$items[$count]['subtitle'] = isset($post->content->subtitle) ? $post->content->subtitle : "";
					if(!empty($items[$count]['autherImg']))
					{
						$image = '//cdn-images-1.medium.com/fit/c/60/60/'.$json->payload->references->User->$name->imageId;
					}
					else {
						$image = $default_image;
					}

					$items[$count]['image'] = $image;
					$items[$count]['duration'] = round($post->virtuals->readingTime);
					$items[$count]['date'] = isset($post->firstPublishedAt) ? date('d M Y', $post->firstPublishedAt/1000): "";
				}
				$count++;
			}
			if($offset)
			{
				$items = array_slice($items, $offset);  
			}

			if(count($items) > $total)
			{
				$items = array_slice($items, 0, $total); 
			}
		}
	}
	else {

		$json = json_decode($data);
		$items = array();
		$count = 0;
		
		if(isset($json->payload->references->Post))
		{
			$posts = $json->payload->references->Post;

			
			foreach($posts as $post)
			{			
				if($count <= 2 ) {
					$items[$count]['title'] = $post->title;
					$items[$count]['paragraphs'] = $post->previewContent->bodyModel->paragraphs[2]->text;
					$items[$count]['name'] = $json->payload->user->name;
					$items[$count]['autherImg'] = json_decode(json_encode($json->payload->references->User->$name->imageId), True);
					$items[$count]['url'] = 'https://medium.com/'.$handle.'/'.$post->uniqueSlug;
					$items[$count]['subtitle'] = isset($post->content->subtitle) ? $post->content->subtitle : "";
					if(!empty($items[$count]['autherImg']))
					{
						$image = '//cdn-images-1.medium.com/fit/c/60/60/'.$json->payload->references->User->$name->imageId;
					}
					else {
						$image = $default_image;
					}
					$items[$count]['image'] = $image;
					$items[$count]['duration'] = round($post->virtuals->readingTime);
					$items[$count]['date'] = isset($post->firstPublishedAt) ? date('d M Y', $post->firstPublishedAt/1000): "";
				}

				$count++;
			}
			if($offset)
			{
				$items = array_slice($items, $offset);  
			}

			if(count($items) > $total)
			{
				$items = array_slice($items, 0, $total); 
			}
		}
	}
	?>
	<ul id="display-medium-owl-demo" class="display-medium-owl-carousel">
		<?php foreach($items as $item) { ?>
		  <li class="display-medium-item">
			  <a href="<?php echo $item['url']; ?>" class='display-medium-link' target="_blank" title="<?php echo $item['title']; ?>">
			  	<div class="display-medium-date-read">
		  			<?php echo '<img src="'.$item['image'].'" class="img" alt="AuthorImg">';  ?>
				</div>
			  	<div class="display-medium-content">
				  <div class="date_name">
				  	<p><?php echo $item['name']; ?></p>
			  	 	<?php echo "<time  class='display-medium-date'>".$item['date']."</time>"; ?>
				  </div>
				  <p class="display-medium-title"><?php echo $item['title']; ?></p>
				  <p class="display-medium-title description"><?php echo $item['paragraphs']; ?><span class="read_more">Read more</span></p>
				</div>
			  </a>
		  </li>
		<?php } ?>
	</ul>
	<?php
		  if(empty($items)) echo "<div class='display-medium-no-post'>No posts found!</div>";
	  ?>
	<?php
	return ob_get_clean();
}
add_shortcode('display_medium_posts_extend', 'posts_display_extend');



 //Enqueue Validation Script

function prdxn_application_validation(){
	wp_enqueue_script( 'appl-validation', get_template_directory_uri() . '/js/validation.js', array('jquery'), '1.0' );
}

add_action('wp_enqueue_scripts','prdxn_application_validation');