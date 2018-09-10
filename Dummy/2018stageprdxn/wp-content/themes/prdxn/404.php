<?php
/**
 * The template for displaying pages
 * Templates for displaying 404 pages
 * Template Name: 404 Page
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 */

get_header();
$workpage = get_page_by_path('work');
$contents = get_page_by_path('404-page');
$cta_text = get_field('404_cta_text',$contents->ID);
$workpageurl = get_permalink($workpage);
?>

<!-- main started -->
<main>

<!-- Loader image for work before displays whole content -->
<div class="loader">
   <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
</div>

<?php    $content = wpautop($contents->post_content); ?>

    <!-- Wrapper start -->
    <div class="wrapper">
      <div class="error_content">

        <?php echo $content; ?>
        <a href="<?php echo $workpageurl; ?>" class="workdetail--launch-cta"><?php echo $cta_text ; ?></a>
      </div>
    </div> <!-- Wrapper end -->

</main> <!-- main end -->

<?php
  # footer call here
  get_footer(); ?>