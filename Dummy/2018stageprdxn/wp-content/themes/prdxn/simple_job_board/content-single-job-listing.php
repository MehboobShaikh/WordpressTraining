<?php
/**
 * Single view Job Fetures
 * 
 * The template for displaying job content in the single-jobpost.php template
 * 
 * Override this template by copying it to yourtheme/simple_job_board/content-single-job-listing.php
 * 
 * @author 	PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/Templates
 * @version     1.0.0
 * @since       2.1.0
 * @since       2.2.3   Added the_content function.
 * @since       2.3.0   Added "sjb_single_job_listing_template" filter.
 */
ob_start();
$currently_hiring_for = get_field('hiring_for');
$your_role = get_field('your_role');
$career_path = get_field('career_path');
$apply_here = get_field('apply_here');
?>
<!-- Loader image for work before displays whole content -->
<div class="loader">
  <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
</div>

<!-- Start Job Details
================================================== -->
<div class="wrapper">

    <?php
    /**
     * single_job_listing_start hook
     *
     * @hooked job_listing_meta_display - 20 ( Job Listing Company Meta )
     *
     * @since   2.1.0
     */
    //do_action('sjb_single_job_listing_start');
    ?>

    <div class="sjb-row sjb-job-details" id="sjb_job-detail-heading">
      <?php
      /**
       * Display the post content.
       *
       * The "the_content" is used to filter the content of the job post. Also make other plugins shortcode compatible with job post editor.
       */
      ?>
      <div class="careers_list-view">
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
        </div>
      </div>

        <?php
        /**
         * single-job-listing-end hook
         *
         * @hooked job_listing_features - 20 ( Job Features )
         * @hooked job_listing_application_form - 30 ( Job Application Form )
         *
         * @since   2.1.0
         */
        do_action('sjb_single_job_listing_end');
        ?>
    </div>
</div>
<!-- ==================================================
End Job Details -->

<?php
$html = ob_get_clean();

/**
 * Modify the Single Job Listing Template.
 *
 * @since   2.3.0
 *
 * @param   html    $html   Single Job Listing HTML.
 */
echo apply_filters( 'sjb_single_job_listing_template', $html );