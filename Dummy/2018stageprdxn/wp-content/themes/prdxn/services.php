<?php
/**
 * The template for displaying pages
 *
 * Template Name: Career Listing With Bullets Points Hierarchy
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
$services_banner_image = get_field('services_banner_image');
?>

<!-- main started -->
<main>
  
  <!-- Loader image for work before displays whole content -->
  <div class="loader">
    <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
  </div>

  <!-- Hero image structure start -->
  <div class="services-hero">
   <?php 
    echo '<img src="' . $services_banner_image['url'] . '" alt="' . (($services_banner_image['alt'] !== '') ? $services_banner_image['alt'] : 'services') . '" />';
  ?>
  </div>
  <!-- Service navigation start -->
  <div class="services-list">
    <ul>
    <?php
      $args = array(
        'post_type' => 'service',
        'orderby' => 'post_date',
        'order' => 'DESC',
        'posts_per_page' => -1,
      );
      $servicesposts = get_posts($args);
        foreach ($servicesposts as $post):
            setup_postdata($post);

          # Titles of service page
          $title = get_the_title();
          $formatless_title = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($title))); ?>

            <li>
              <a class="servicemenu <?php echo $formatless_title ?>" href="#<?php echo $formatless_title ?>" data-target="<?php echo $formatless_title ?>"><?php echo $title ?></a>
            </li>

        <?php endforeach;
        wp_reset_postdata();

      $techargs = array(
              'post_type' => 'technologies',
              'orderby' => 'post_date',
              'order' => 'DESC',
              'posts_per_page' => -1,
            );
            $technologiesposts = get_posts($techargs);

            if($technologiesposts): ?>
          <li>
              <a class="servicemenu toolstechnology" href="#tools-technology" data-target="tools-technology">Tools &amp; Technologies</a>
            </li>
          <?php endif; ?>


    </ul>
  </div><!-- Service navigation end -->
  <!-- Service post fetch start -->
  <div class="servicehead">
    <?php
    $args = array(
      'post_type' => 'service',
      'orderby' => 'post_date',
      'order' => 'DESC',
      'posts_per_page' => -1,
    );
    $serviceposts = get_posts($args);
      foreach ($serviceposts as $post):
        setup_postdata($post);

          # Post variables listed here
          $title = get_the_title();
          $subtitle = get_field('subtitle');
          $content = wpautop(get_the_content());
          $sidebar_content = get_field('sidebar_content');
          $formatless_id = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($title)));

          # Service posts section structure start here ?>
          <div class="servicearea" id="<?php echo $formatless_id ?>">
            <div class="service-wrapper cf">
              <div class="service-content">
                <h2><?php echo $title ?></h2>
                <span><?php echo $subtitle ?></span>
                <div><?php echo $content ?></div>
              </div>
            </div>
          </div>

     <?php endforeach;
    wp_reset_postdata();
    ?>
  </div>
   <!-- Service post fetch end -->
  <!-- Tools and Technologies start -->
  <?php if(have_posts($technologiesposts)): ?>
    <div class="tools-wrapper servicearea" id="tools-technology">
      <div class="service-wrapper cf">
        <h2>Tools &amp; Technologies</h2>
          <div class="tools_technology-container">
          <?php
            foreach ($technologiesposts as $post):
              setup_postdata($post);

              # Technologies post variables
              $technologies_link = get_field('technologies_link');
              $technologies_image = get_field('technologies_image');
              $show_tech = get_field('show_on_service');
              # Technologies image structure start here
               ?>

               <?php if($show_tech =="Yes"): ?>
                <div class="technologies">
                  <a href="<?php echo $technologies_link ?>" target="_blank" title="<?php echo get_the_title(); ?>" id="<?php echo strtolower(get_the_title()); ?>">
                    <img src="<?php echo $technologies_image['url'] ?>" class="aligncenter size-full" alt="<?php echo $technologies_image['alt'] ?>">
                  </a>
                </div>
                <?php endif; ?>

            <?php endforeach;
          wp_reset_postdata(); ?>
      </div>
    </div>

  </div><!-- Tools and Technologies end -->
<?php endif; ?>
</main> <!-- main end -->

<?php
  # footer call here
  get_footer(); ?>