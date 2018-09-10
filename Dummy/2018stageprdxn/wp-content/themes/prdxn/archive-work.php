<?php
/**
 * The template for displaying pages
 *
 * Template Name: Three Column Post Grid With Load More
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 */

# Hedaer call
get_header();

$args = array(
  'post_type' => array( 'work', 'case_study', 'testimonials' ),
  'posts_per_page' => -1,
);
$the_query_count = new WP_Query($args);
$total_post_count = count($the_query_count->posts);

$actual_link = (isset($_SERVER['HTTP']) ? "http" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
?>
<!-- main content started -->
<main id="main" class="site_main" role="main">
<!-- Loader image for work before displays whole content -->
<div class="loader">
  <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
</div>
<div class="siteurl" data-url="<?php echo $actual_link;?>"></div>
<input type="hidden" class="newcount" value="3">
<div class="totalcount"><?php echo $total_post_count; ?></div>

  <!-- Work page content starts here -->
	<div class="workpage_content workpage_ajax-posts">

    <!-- Include workpage-loadmore page -->
		<?php 
      get_template_part('workpage','loadmore');
    ?>

	</div>
</main>
<!-- main content end -->
<?php get_footer(); ?>