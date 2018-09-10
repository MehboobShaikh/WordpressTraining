<?php
/**
 * Displayed when no jobs are found matching the current query
 *
 * Override this template by copying it to yourtheme/simple_job_board/listing/content-no-jobs-found.php
 *
 * @author 	PressTigers
 * @package     Simple_Job_Board
 * @subpackage  Simple_Job_Board/templates/listing
 * @version     1.0.0
 * @since       2.1.0
 */
if ( ! defined( 'ABSPATH' ) ) { exit; } // Exit if accessed directly


echo '<div class="careerpage_no-job-listing"><p>' .__( 'Hmm…There doesn’t look like any available openings here? If you want to double check, please email <a href="mailto:workwithus@prdxn.com" title="Mail Us">workwithus@prdxn.com</a> to confirm.' ).'</p></div>';