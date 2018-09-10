<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 */

$workpage = get_page_by_path('work');
$workpageurl = get_permalink($workpage);
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="expires" content="1" />
  <link rel="dns-prefetch" href="//www.google.com/recaptcha/api.js">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <?php wp_head(); ?>


</head>
<body <?php body_class(); ?>>
<!-- Page-hiding snippet (recommended)  -->
  <style>.async-hide { opacity: 0 !important} </style>
  <!-- header structure started -->
  <header>
    <div class="logo_container">
      <h1>
        <?php
        echo '<a href="' . get_site_url() . '" title="PRDXN"><img src="'. get_option('headerlogo') . '" alt="PRDXN logo">PRDXN</a>';
        ?>
      </h1>
      <div class="header_navigation-container cf">
        <!-- condition to check whether it is not home page, 404 page and single page -->
        <?php if (!is_front_page() && !is_single($post) && !is_page('404-page') && !is_page('404')): ?>
          <div class="header_navigation-currentmenu">
            <?php if($post->post_type == 'work'): ?>
              <span><?php echo 'Work'; ?></span>
            <?php else: ?>
              <span><?php echo get_the_title($post->ID); ?></span>
            <?php endif; ?>
          </div>
          <?php
      // to get single(detail) pages
          elseif (is_single($post)):
            $work_page_url = get_permalink('work');
          if (get_post_type($post) == 'work' || get_post_type($post) == 'case_study'): // Detect type of post whether its our single Work and case studies ?>
          <div class="singlework--backbutton">
            <a href="<?php echo $workpageurl ?>">
              <span class="singlework_backbutton-first-dot"></span>
              <span class="singlework_backbutton-second-dot"></span>
              <span class="singlework_backbutton-third-dot"></span>
              <span class="singlework_backbutton-fourth-dot"></span>
            </a>
          </div>
        <?php endif;
        elseif (is_page('404-page')): ?>
        <div class="header_navigation-currentmenu">
          <span>Home</span>
        </div>
        <?php
        endif; ?>
        <!-- Header hamburger -->
        <div id="header_navigation-toggle">
          <span class="header_hamburger">
            <span class="header_hamburger-icon1"></span>
            <span class="header_hamburger-icon2"></span>
            <span class="header_hamburger-icon3"></span>
          </span>
        </div>
      </div>
    </div>
    <!-- header primary navigation structure started  -->
    <nav class="header_navigation-primary">
      <?php wp_nav_menu(array(
        'theme_location' => 'primary',
        'menu_class' => 'header_navigation-nav-menu cf')); ?>
      </nav>
      <!-- header primary navigation container structure started  -->
      
    </header>
