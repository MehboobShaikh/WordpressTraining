<?php
/**
 * The template for displaying pages
 *
 * Template Name: Home
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

# All page variable listed here
$casestudy_cta = get_field("casestudy_post_cta", get_page_by_path( 'works' ));
$work_cta = get_field("work_cta", get_page_by_path( 'works' ));
$hero_video = get_field("hero_video");
$hero_title = get_field('hero_title');
$hero_subtitle = get_field('hero_subtitle');
$home_carousel = get_field('home_carousel');
$hero_video_mp4 = get_field("hero_video_mp4");
$hero_video_ogg = get_field("hero_video_ogg");
$hero_video_webm = get_field("hero_video_webm");
$home_medium_feedblock = get_field("home_medium_feedblock");
$contact_us_url = get_field("contact_us");

if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
  $banner_image = get_the_post_thumbnail_url();
} else {
  $banner_image = get_template_directory_uri() . '/assets/images/Agile.jpg';
}
?>
<!-- main started -->
<main>
    <!-- Loader image for work before displays whole content -->
  <div class="loader">
    <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
  </div>
  <!-- Hero section started -->
  <div class="home_hero-section" style="background: url('<?php echo $banner_image; ?>')center center; background-size: cover;">

    <div class="bgvideo">

      <input type="hidden" class="hero_video_mp4" value="<?php echo $hero_video_mp4 ?>"/>
      <input type="hidden" class="hero_video_ogg" value="<?php echo $hero_video_ogg ?>"/>
      <input type="hidden" class="hero_video_webm" value="<?php echo $hero_video_webm ?>"/>
      <?php //echo $hero_video; ?>
    </div>
    <div class="home_hero-overlay">
      <div class="home_hero-content">
        <h2><?php echo $hero_title; ?></h2>
        <h3><?php echo $hero_subtitle; ?></h3>
      </div>
      <a href="<?php echo $contact_us_url;?>" class="cta" target="_blank">how can we help you?</a>
      <div class="home_hero-seebelow"></div>
    </div>
  </div>
  <!-- Hero section end -->
  <!-- Home content started -->
  <div class="home_content">
    <div class="wrapper">
      <!-- Work case_study blocks structure started here -->
      <div class="home_content-work-casestudy">
        <?php
        $args = array(
          'post_type' => array( 'work', 'case_study' ),
          // 'meta_key'      => 'post_order',
          'orderby'     => 'meta_value_num',
          'posts_per_page' => -1,
          'order' => 'ASC',
          );
        $work_case_sposts = get_posts( $args );
        $count = 0;
        $featured_post_arr = [];
        foreach ( $work_case_sposts as $post ) : setup_postdata( $post );
                # Variables of the posts
        $featured_post = get_field('feature_post_on_home', get_the_ID());
        $post_type = get_post_type();
        $permalink = get_the_permalink();
        $post_thumbnail = get_the_post_thumbnail($post->ID,'featuredImageCropped');
        $title = get_the_title();
        
        if(is_array($featured_post) && $featured_post[0] == 'yes') :
          array_push($featured_post_arr, $post);
        ++$count;
        if ( ( $post_type == 'work' ) && ( $count == 3 ) ) { ?>
        <div class="work-block">
          <a href="<?php echo $permalink; ?>">
            <?php echo $post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Work</span>
                <p><?php echo $title; ?></p>
                <span class="cta"><?php echo $work_cta; ?></span>
              </div>
            </div>
          </a>
        </div>
        <?php } elseif ( $post_type == 'case_study' && $count <= 2 ) { ?>
        <div class="casestudy-block">
          <a href="<?php echo $permalink; ?>">
            <?php echo $post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Case Study</span>
                <p><?php echo $title; ?></p>
                <span class="cta"><?php echo $casestudy_cta; ?></span>
              </div>
            </div>
          </a>
        </div>
        <?php  }
        endif;
        endforeach;

        wp_reset_postdata();
        ?>
        
      </div>
      <!-- Work case_study blocks structure started here -->
      <!-- Testimonials slider started here -->
      <div class="home_testimonial-slider">
        <?php if( $home_carousel ): ?>
          <ul class="slides">

            <?php
            $args = array(
              'orderby' => array( 'post_date' => 'DESC')
              );
            $query = new WP_Query( $args );
            foreach ( $home_carousel as $post ):
              setup_postdata($post);

                      # Posts variables listed here
            $id = get_the_ID();
            $post_thumbnail = get_the_post_thumbnail($id,'thumbnail');
            $post_content = get_the_content($id);
            $testimonials_author = get_field('testimonials_author', $id) 
            ?>
             

            <li>
              <div class="testimonials__image">
                <?php
                 echo $post_thumbnail; 
                 ?>
              </div>
              <div class="home_slider--content">
                <div class="testimonial__description">
                  <?php echo $post_content; ?>
                </div>
                <span></span>
                <p><?php echo $testimonials_author; ?></p>
              </div>
            </li>

            <?php
            endforeach;
            wp_reset_postdata(); ?>
          </ul>
        <?php endif; ?>
      </div>
      <!-- Testimonials Slider End -->
      <!-- Last two work or casestudy blocks structure started here -->
      <div class="home_content-work-casestudy">
        <?php
            # Featured posts variable listed here
        $featured_post_ID = $featured_post_arr[6]->ID;
        $featured_post_type = get_post_type($featured_post_ID);
        $featured_post_thumbnail = get_the_post_thumbnail($featured_post_ID);
        $featured_post_title = get_the_title($featured_post_ID);

            # Work - case study blocks post type check
        if ( $featured_post_type == 'work' ) { ?>
        <div class="work-block">
          <a href="<?php the_permalink($featured_post_ID); ?>">
            <?php echo $featured_post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Work</span>
                <p><?php echo $featured_post_title; ?></p>
                <span class="cta"><?php echo $work_cta; ?></span>
              </div>
            </div>
          </a>
        </div>

        <?php } elseif ( $featured_post_type == 'case_study' ) { ?>

        <div class="casestudy-block">
          <a href="<?php the_permalink($featured_post_ID); ?>">
            <?php echo $featured_post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Case Study</span>
                <p><?php echo $featured_post_title; ?></p>
                <span class="cta"><?php echo $casestudy_cta; ?></span>
              </div>
            </div>
          </a>
        </div>
        <?php  }
        ?>
        <!-- Facebook feed block started here -->
        <!-- <div class="home_facebook-feedblock"></div> -->
        <!-- Facebook feed block end here -->

        <?php
            # Featured posts variable listed here
        $featured_post_ID = $featured_post_arr[5]->ID;
        $featured_post_type = get_post_type($featured_post_ID);
        $featured_post_thumbnail = get_the_post_thumbnail($featured_post_ID);
        $featured_post_title = get_the_title($featured_post_ID);

            # Work - case study blocks post type check
        if ( $featured_post_type == 'work' ) { ?>
        <div class="work-block">
          <a href="<?php the_permalink($featured_post_ID); ?>">
            <?php echo $featured_post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Work</span>
                <p><?php echo $featured_post_title; ?></p>
                <span class="cta"><?php echo $work_cta; ?></span>
              </div>
            </div>
          </a>
        </div>

        <?php } elseif ( $featured_post_type == 'case_study' ) { ?>

        <div class="casestudy-block">
          <a href="<?php the_permalink($featured_post_ID); ?>">
            <?php echo $featured_post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Case Study</span>
                <p><?php echo $featured_post_title; ?></p>
                <span class="cta"><?php echo $casestudy_cta; ?></span>
              </div>
            </div>
          </a>
        </div>
        <?php  }
        ?>

        <?php
            # Last Featured post variable listed here
        $featured_post_ID = $featured_post_arr[7]->ID;
        $featured_post_type = get_post_type($featured_post_ID);
        $featured_post_thumbnail = get_the_post_thumbnail($featured_post_ID);
        $featured_post_title = get_the_title($featured_post_ID);

        if ( $featured_post_type == 'work' ) { ?>
        <!-- Work block structure started here -->
        <div class="work-block">
          <a href="<?php the_permalink($featured_post_ID); ?>">
            <?php echo $featured_post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Work</span>
                <p><?php echo $featured_post_title; ?></p>
                <span class="cta"><?php echo $work_cta; ?></span>
              </div>
            </div>
          </a>
        </div>

        <?php } elseif ( $featured_post_type == 'case_study' ) { ?>

        <!-- Case Study block structure started here -->
        <div class="casestudy-block">
          <a href="<?php the_permalink($featured_post_ID); ?>">
            <?php echo $featured_post_thumbnail; ?>
            <div class="work-case-overlay">
              <div>
                <span class="work_case_overlay-title">Case Study</span>
                <p><?php echo $featured_post_title; ?></p>
                <span class="cta"><?php echo $casestudy_cta; ?></span>
              </div>
            </div>
          </a>
        </div>
        <?php  }
        ?>
      </div>
    </div><!-- Wrapper end here -->

      <!-- Our client logo -->
     <div class="our_client_logo">
      <div class="wrapper cf">
        <h3 class="client-title">Our Clients</h3>
        <div class="logo">
        <?php
      $args_client = array(
          'post_type' => 'slick-sllider',
          'order' => 'ASC'
      );

      $client_query = new WP_Query($args_client);
      while ($client_query->have_posts()): $client_query->the_post();
      echo '<div class="img-section">'; the_post_thumbnail(); echo '</div>';
      endwhile;
      wp_reset_postdata();
      ?>

      </div>
    </div>
    </div><!-- End Our client logo section -->

    
    <div class="home_recent-medium-post">
      <div class="wrapper">
          <h3><?php echo get_field('block_heading'); ?></h3>
          <?php echo do_shortcode(get_field('add_shortcode')); ?>
      </div>
    </div>
  </div><!-- home content end here -->
</main><!-- .content-area -->

<?php get_footer(); ?>