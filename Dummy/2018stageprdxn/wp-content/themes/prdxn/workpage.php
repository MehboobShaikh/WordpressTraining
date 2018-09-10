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

# Include workpage-loadmore page
get_template_part('workpage-loadmore');
?>
<!-- main content started -->
<main id="main" class="site_main" role="main">
  <!-- Work page content starts here -->
	
	<?php
	    # Arguments for WP_Query
	    $ptype = array( 'work', 'case_study', 'testimonials');
	    foreach ($ptype as $key) {
	      $count_posts = wp_count_posts($key);
	      $published_posts += $count_posts->publish;
	    }
	  ?>
	  <div class="hidden totalcount"><?php echo $published_posts; ?></div>

	<div class="workpage_content workpage_ajax-posts">

    <!-- Load more function Call -->
		<?php workpage_loadmore(); ?>

	</div>
  <!-- Load more button for posts -->
	<span class="Workpage_loadmore-cta" title="Load More">Load More</span>
</main>
<!-- main content end -->
<?php get_footer(); ?>