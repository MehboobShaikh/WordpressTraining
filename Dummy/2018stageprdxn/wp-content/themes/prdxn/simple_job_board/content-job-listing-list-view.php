<?php
/**
 * The template for displaying job content in list view within loops.
 *
 * Override this template by copying it to yourtheme/simple_job_board/content-job-listing-list-view.php
 *
 * @author      PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     1.1.0
 * @since       2.2.0
 * @since       2.2.3   Added @hook sjb_job_listing_heading_after.
 * @since       2.3.0   Added "sjb_list_view_template" filter.
 */
ob_start();
global $post;

$currently_hiring_for = get_field('hiring_for');
$your_role = get_field('your_role');
$career_path = get_field('career_path');
$apply_here = get_field('apply_here');

/**
 * Fires before job listing on job listing page.
 *
 * @since   2.2.0
 */
do_action('sjb_job_listing_list_view_before');
?>

<!-- Start Jobs List View
================================================== -->
<li class="careers_list-view">
  <div class="wrapper">
    <h2>
      <?php
          /**
           * Template -> Title:
           *
           * - Job Title
           */
          get_simple_job_board_template('listing/list-view/title.php'); ?>
    </h2>
    <div>
      <?php
      /**
       * Template -> Short Description:
       *
       * - Job Description
       */
      echo $currently_hiring_for;
      echo $your_role;
      echo $career_path;
      ?>
      <a class="apply_here" href="<?php the_permalink(); ?>"><?php echo $apply_here; ?></a>
    </div>
  </div>
</li>
<!-- ==================================================
End Jobs List View -->

<?php


$html_list_view = ob_get_clean();

/**
 * Modify the Job Listing List View Template.
 *
 * @since   2.3.0
 *
 * @param   html    $html_list_view   Job Listing List View HTML.
 */
echo apply_filters( 'sjb_list_view_template', $html_list_view ); ?>
