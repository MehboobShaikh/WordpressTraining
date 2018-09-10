<?php
/**
 * The template for displaying pages
 *
 * Template Name: Career page listing
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 */

# Header Call
get_header(); ?>
  <!-- Loader image for work before displays whole content -->
  <div class="loader">
	  <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
  </div>
  
  <!-- content area started -->
	<main id="main" class="careers-section cf" role="main">
    <?php
      # Job post plugin short
      echo do_shortcode('[jobpost]');
    ?>
  </main><!-- .content-area -->

<?php
# Footer call
get_footer(); ?>

<script>
    $(".apply_here").click(function(event) {
     console.log("hii");
        var cb = generate_callback($(this));
        event.preventDefault();
        mixpanel.track("Clicked Link", { "Domain": "nytimes.com" }, cb);
        setTimeout(cb, 500);
    });
</script>
