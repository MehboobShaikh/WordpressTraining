<?php
/**
 * The template for displaying pages
 *
 * Template Name: People With Instagram Fetch
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

# Page varible listed here
$our_people_title = get_field('our_people_title');
$our_people_description = get_field('our_people_description');
$testimonials_quote = get_field('testimonials_quote');
$testimonials_author = get_field('testimonials_author');
$instagram_user_id = get_field('instagram_user_id');
$instagram_access_token = get_field('instagram_access_token');
$our_core_title = get_field('our_core_title');
$our_core_desc = get_field('our_core_desc');
?>

<!-- Main content started -->
<main class="people_page">
  <!-- Loader image for work before displays whole content -->
  <div class="loader">
    <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
  </div>

  <!-- Our people section -->
  <div class="our_peoples-section">
    <!-- Leaders info with images -->
    <ul class="our_people-team cf">
      <?php
        # Our people Repeater variable
      $rows = get_field('our_people');
      if($rows) :
        foreach($rows as $row) :

          # People Repeater field variables
          $people_image = $row['people_image'];
        $people_name = $row['people_name'];
        $people_designation = $row['people_designation'];
        ?>

        <li class="team" onclick="">
          <img src="<?php echo $people_image['sizes']['featuredImageCropped']; ?>" alt="<?php echo $people_image['alt']; ?>">
          <!-- People team overlay structure started -->
          <div class="people_team-overlay">
            <div class="people_team-text">
              <span class="name"><?php echo $people_name; ?></span>
              <span class="designation"><?php echo $people_designation; ?></span>
               <!-- People team socials start -->
            <ul class="people_team-socials">
              <?php
                # People social repeater variable
              $people_socials = $row['people_socials'];
              if($people_socials) :
                foreach($people_socials as $people_social) :

                    # People social link and icon variable
                  $social_link = $people_social['social_link'];
                $social_icon = $people_social['social_icon'];
                $social_icon_hover = $people_social['social_icon_hover'];

                $getString = '';
                $arr = [];
                $pieces = parse_url($social_link);
                $domain = isset($pieces['host']) ? $pieces['host'] : '';
                if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
                 $getString = $regs['domain'];
               }

               $arr = explode('.', $getString);
               ?>

               <li>
                <a class="<?php echo $arr[0]; ?>" title="<?php echo ucwords($arr[0]); ?>" target="_blank" href="<?php echo $social_link; ?>">

                  <i class="fa fa-<?php echo $arr[0]; ?>" aria-hidden="true"></i>
                </a>
              </li>

              <?php
              endforeach;
              endif;
              ?>
            </ul><!-- People team socials end -->
            </div>
          </div>
        </li>
      <?php  endforeach;
      endif; ?>
    </ul>
    <!-- Leaders info with images end -->
    <div class="people-detail">
      <div class="people_info">
        <h2><?php echo $our_people_title; ?></h2>
        <div><?php echo $our_people_description; ?></div>
      </div>
    </div>
  </div>
  <!-- Our people section end -->
  <!-- Our core value section start -->
  <div class="core-value">
    <h2><?php echo $our_core_title; ?></h2>
    <div><?php echo $our_core_desc; ?></div>
  </div>
  <!-- Instafeeds and testimonial section start -->
  <div class="people_instafeed-section">
    <input type="hidden" id="insta_client_id" value="<?php echo $instagram_user_id; ?>" />
    <input type="hidden" id="insta_access_token" value="<?php echo $instagram_access_token; ?>" />
    <div class="wrapper">
      <div id="instafeed">
        <div class="people_testimonial">
          <?php
          $testimonials_quote=str_replace('</p>', '', $testimonials_quote);
          echo $testimonials_quote; ?>
          <span><?php echo $testimonials_author; ?></span></p>
        </div>
      </div>
    </div>
  </div><!-- Instafeeds and testimonial section end -->
</main><!-- Main content end -->

<?php get_footer(); ?>

<script type="text/javascript">
    mixpanel.track("people", {
        "Event Name ": "sumeet uniyal",
        "Video length": 1024,
        "id": "hY7gQr0"
    });
</script>
