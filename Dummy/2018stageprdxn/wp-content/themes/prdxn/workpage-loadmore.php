<?php
/****************************************************************************************
*
* This function content load more post functionality for Work page only
* Inside the this we call folowing posts
*
* @post work
* @post case_study
* @post testimonials
*
*
******************************************************************************************/
function workpage_loadmore() {
  require_once( "./././wp-load.php" );
  # For load more post functionality
  //define('WP_USE_THEMES', false);
  # All page variables declared here
  $number = 1;
  $work_cta = get_field("work_cta",9);
  $casestudy_cta = get_field("casestudy_post_cta",9);
  $numPosts = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 18;
  $page = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : 1;
  ?>

  <?php
    $args = array(
      'post_type' => array( 'work', 'case_study', 'testimonials' ),
      'posts_per_page' => $numPosts,
      // 'meta_key' => 'post_order',
      'orderby' => 'menu_order',
      'order' => 'ASC',
      'paged' => $page,
    );
    $the_query = new WP_Query($args);

    # While loop starts and Display posts according to arguments given in WP_Query
      while ( $the_query->have_posts() ) : $the_query->the_post();
      # All post variables
      $post_type = get_post_type();
      $thumbnail = get_the_post_thumbnail($the_query->ID,'featuredImageCropped');
      $title = get_the_title();
      $content = get_the_content();
      $testimonials_author = get_field('testimonials_author');

    # Check whether it is Work post and work post structure
     if ( $post_type == 'work' ) { 
      ?>
      <!-- Work block -->
      <div class="work-block flex">
        <a href="<?php echo get_the_permalink(); ?>">
          <?php echo $thumbnail; ?>
          <div class="work-case-overlay">
            <div>
              <span class="work-case_title">Work</span>
              <p><?php echo $title; ?></p>
              <span class="cta-title">
                <?php echo $work_cta; ?>
              </span>
            </div>
          </div>
        </a>
      </div>
    <?php }
    # Check whether it is case_study post and case_study post structure
    elseif ( $post_type == 'case_study') { ?>
      <!-- Casestudy block -->
      <div class="casestudy-block flex">
        <a href="<?php the_permalink(); ?>">
          <?php echo $thumbnail; ?>
          <div class="work-case-overlay">
            <div>
              <span class="work-case_title">Case Study</span>
              <p><?php echo $title; ?></p>
              <span class="cta-title">
                <?php echo $casestudy_cta; ?>
              </span>
            </div>
          </div>
        </a>
      </div>
      <?php  }
      # Check whether it is testimonials post and testimonials post structure
      elseif ( $post_type == 'testimonials' ) { ?>
        <!-- Testimonials block -->
        <div class="testimonial-block-content flex">
          <div class="testimonial-block-content__wrapper">
          <?php echo get_the_post_thumbnail($the_query->ID,'thumbnail'); ?>
          <div class="testimonial-content">
            <blockquote><?php echo $content; ?></blockquote>
            <span></span>
            <p><?php echo $testimonials_author; ?></p>
          </div>
        </div>
        </div>
      <?php }
    $number++;
  endwhile; # End while loop
# Reset Post Data
wp_reset_postdata();
}
?>