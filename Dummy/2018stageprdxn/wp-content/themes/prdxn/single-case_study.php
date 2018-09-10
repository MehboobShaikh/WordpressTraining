<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 */

get_header();
$number = 1;
$workpage = get_page_by_path('work');
$workpageurl = get_permalink($workpage);
?>
	<!-- Main starts here -->
	<main id="main" class="site_main" role="main">

		<!-- Loader image for work before displays whole content -->
	  	<div class="loader">
		  <img src="<?php echo get_template_directory_uri() . '/assets/images/logo_prdxn.png' ?>" alt="<?php echo get_bloginfo('name')?>">
	  	</div>

		<?php while(have_posts()) : the_post();

			# Post variables listed here
			$thumbnail = get_the_post_thumbnail($post->ID, 'full');
			$title = get_the_title();
			$hero_foreground = get_field('hero_foreground');
			$client_info_title = get_field('client_info_title');
			$client_info_description = get_field('client_info_description');
			$client_requirements_title = get_field('client_requirements_title');
			$client_requirements_description = get_field('client_requirements_description');
			$solution_title = get_field('solution_title');
			$solution_description = get_field('solution_description');
			$testimonial_left_image = get_field('testimonial_left_image');
			$testimonial_right_image = get_field('testimonial_right_image');
			$case_study_testimonial_content = get_field('case_study_testimonial_content');
			$case_study_testimonial_author = get_field('case_study_testimonial_author');
			$result_title = get_field('result_title');
			$result_description = get_field('result_description');
			$launch_project_cta_link = get_field('launch_project_cta_link');
			$launch_project_cta_text = get_field('launch_project_cta_text');
			?>
			<div class="hero--section">
				<div class="banner">
					<?php if( $thumbnail ) {
						echo $thumbnail;
					} ?>
					<div class="wrapper">
						<div class="hero_work--title">
							<span>case study</span>
							<h2><?php echo $title; ?></h2>
						</div>
						<?php if($hero_foreground['url']){ ?>
						<div class="hero_forground--img">
							<img src="<?php echo $hero_foreground['url']; ?>" alt="<?php echo $hero_foreground['alt']; ?>">
						</div>
						<?php }
						?>
					</div>
				</div>
			</div>
			<div class="work_detail--content">
				<div class="work_detail--project-technteam">
					<div class="wrapper">
					 <!-- Work detail navigation starts here -->
					 <div class="work_detail--navslider hidework">
						 <ul class="slides">
							<!-- Services navigation -->
							<li class="work_detail_navslider--services-list">
								<h2>services</h2>
								<?php
								     $applicable_service = get_field('applicable_service');
								     if($applicable_service) :
								  ?>
									<ul>
										<?php
								      foreach ( $applicable_service as $post ) :
								          setup_postdata( $post );

								        # Posts variables listed here
								        $permalink = get_the_permalink();
								        $post_title = get_the_title();
								        $formatless_title = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($post_title)));
								?>


													<li><a href="<?php echo get_site_url().'/services/#'.$formatless_title; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></li>

										<?php endforeach;
										  wp_reset_postdata(); ?>
									</ul>
									<?php endif; ?>
								</li>
								<!-- Technologies navigation -->
								<li class="work_detail_navslider--services-list">
									<h2>technology</h2>
									<?php
								     $applicable_technologies = get_field('applicable_technologies');
								     if( $applicable_technologies ) :
								  ?>
									<ul>
										<?php
								      foreach ( $applicable_technologies as $post ) :
								          setup_postdata( $post );

								        # Posts variables listed here
								        $permalink = get_the_permalink();
									      $post_title = get_the_title();
									      $formatless_title = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($post_title)));
											?>
											<li><a href="<?php echo get_site_url().'/services/'.'#tools-technology'; ?><?php  ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></li>

										<?php endforeach; 
                                                                                wp_reset_postdata(); 										 ?>
									</ul>
									<?php endif; ?>
								</li>
								<!-- Team navigation -->
								<li class="work_detail_navslider--services-list">
									<h2>team</h2>
									<ul>
										<?php
											$taxonomies = wp_get_post_terms(get_the_ID(), 'work_team');
											foreach ( $taxonomies as $taxonomy ):
							        	# Posts variables listed here
									      $taxonomy_title = $taxonomy->name;
						        	?>

											<li><a href="<?php echo get_site_url().'/people'?>" title="<?php echo $taxonomy_title; ?>"><?php echo $taxonomy_title; ?></a></li>

										<?php endforeach; 
                                                                                wp_reset_postdata(); ?>
									</ul>
								</li>
							</ul>
						</div>
					<div class="work_detail--navslider showwork">
						 <ul>
							<!-- Services navigation -->
							<li class="work_detail_navslider--services-list">
								<h2>services</h2>
								<?php
								     $applicable_service = get_field('applicable_service');
								     if($applicable_service) :
								  ?>
									<ul>
										<?php
								      foreach ( $applicable_service as $post ) :
								          setup_postdata( $post );

								        # Posts variables listed here
								        $permalink = get_the_permalink();
								        $post_title = get_the_title();
								        $formatless_title = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($post_title)));
								?>


													<li><a href="<?php echo get_site_url().'/services/#'.$formatless_title; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></li>

										<?php endforeach;
                                                                                wp_reset_postdata(); ?>
									</ul>
									<?php endif; ?>
								</li>
								<!-- Technologies navigation -->
								<li class="work_detail_navslider--services-list">
									<h2>technology</h2>
									<?php
								     $applicable_technologies = get_field('applicable_technologies');
								     if( $applicable_technologies ) :
								  ?>
									<ul>
										<?php
								      foreach ( $applicable_technologies as $post ) :
								          setup_postdata( $post );

								        # Posts variables listed here
								        $permalink = get_the_permalink();
									      $post_title = get_the_title();
									      $formatless_title = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($post_title)));
											?>
											<li><a href="<?php echo get_site_url().'/services/'.'#tools-technology'; ?><?php  ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></li>

										<?php endforeach; 
                                                                                wp_reset_postdata(); ?>
									</ul>
									<?php endif; ?>
								</li>
								<!-- Team navigation -->
								<li class="work_detail_navslider--services-list">
									<h2>team</h2>
									<ul>
										<?php
											$taxonomies = wp_get_post_terms(get_the_ID(), 'work_team');
											foreach ( $taxonomies as $taxonomy ):
							        	# Posts variables listed here
									      $taxonomy_title = $taxonomy->name;
						        	?>

											<li><a href="<?php echo get_site_url().'/people'?>" title="<?php echo $taxonomy_title; ?>"><?php echo $taxonomy_title; ?></a></li>

										<?php endforeach; ?>
									</ul>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- Client info section started -->
				<div class="casestudydetail_client-info-section">
					<div class="wrapper">
						<div class="casestudydetail_client-info">
							<h2><?php echo $client_info_title; ?></h2>
							<div><?php echo $client_info_description; ?></div>
						</div>
						<div class="casestudydetail_client_requirements">
							<h2><?php echo $client_requirements_title; ?></h2>
							<div><?php echo $client_requirements_description; ?></div>
						</div>
					</div>
				</div><!-- Client info section end -->
				<!-- Case study detail Slider start -->
				<div class="flexslider workdetail--main-slider">
					<?php if( have_rows('project_image_slider') ): ?>
						<ul class="slides">
							<?php while( have_rows('project_image_slider') ): the_row();

							$image = get_sub_field('images_slider');
							?>
						<li>
							<?php if( $image ): ?>
								<img src="<?php echo $image['url'] ?>" align="<?php echo $image['alt'] ?>">
							<?php endif; ?>
						</li>
				<?php	endwhile; ?>
					</ul>
					<?php	endif;
					?>
				</div><!-- Case study detail Slider end -->
				<!-- Solution section started -->
				<div class="casestudydetail_solution">
					<div class="wrapper">
						<h2><?php echo $solution_title; ?></h2>
						<div><?php echo $solution_description; ?></div>
					</div>
				</div> <!-- Solution section end -->
				<!-- Testimonial section started -->
				<div class="casestudydetail_solution-below-section">
					<?php if ($testimonial_left_image): ?>
						<img class="casestudydetail_testimonial-leftimg" src="<?php echo $testimonial_left_image['url']; ?>" alt="<?php echo $testimonial_left_image['alt']; ?>">
					<?php endif ?>
					<div class="casestudydetail_testimonial">
						<div>
							<p><?php echo $case_study_testimonial_content; ?></p>
							<p><?php echo $case_study_testimonial_author; ?></p>
						</div>
					</div>
					<?php if ($testimonial_right_image): ?>
						<img class="casestudydetail_testimonial-rightimg" src="<?php echo $testimonial_right_image['url']; ?>" alt="<?php echo $testimonial_right_image['alt']; ?>">
					<?php endif ?>
				</div><!-- Testimonial section end -->
				<!-- Result section started -->
				<div class="casestudydetail_result">
					<div class="wrapper">
						<h2><?php echo $result_title; ?></h2>
						<div><?php echo $result_description; ?></div>
					</div>
				</div> <!-- Result section end -->
				<!-- Work detail launch cta -->
				<?php if(!empty($launch_project_cta_text)){ ?>
				<div class="workdetail--launch-cta">
					<a href="<?php echo $launch_project_cta_link; ?>" target="_blank" title="<?php echo $launch_project_cta_text; ?>"><?php echo $launch_project_cta_text; ?></a>
				</div>
				<?php } ?>
				<!-- Previous Next navigation of detail page with view all section -->
				<div class="workdetail--posts-nav-section">
				  <?php  $current_id = get_the_id();

            //Prev post block
						 $args = array(
					      'post_type' => array( 'work', 'case_study' ),
					      'posts_per_page' => -1,
					      'meta_key'      => 'post_order',
					      'orderby'     => 'meta_value_num',
					      'order' => 'ASC',
					    );

            $worksposts = get_posts( $args );

           foreach ( $worksposts as $key => $post ) :
           		setup_postdata( $post );
           			$currentloopid = get_the_id();

              if ($current_id == $currentloopid) : ?>
              <!-- Previous navigation section start -->
							<div class="posts-nav--previous">
								<?php
									$prev_id = $worksposts[$key-1]->ID;
									 if($prev_id) {
						 					$prev_post_id = $prev_id;
									 } else {
									 	$prev_post_id = end($worksposts)->ID;
									}
									$prevthumbnail = get_the_post_thumbnail($prev_post_id,'featuredImageDetail');
									$prev_post_id_permalink = get_the_permalink($prev_post_id);
									$prev_post_id_title = get_the_title($prev_post_id);
								?>
								<a href="<?php echo $prev_post_id_permalink; ?>" title="<?php echo $prev_post_id_title; ?>">
	                <?php echo $prevthumbnail; ?>
	                <p><span class="work-text-previous"><?php echo $prev_post_id_title; ?></span></p>
								</a>
							</div>
						<!-- View all section start -->
						<div class="posts-nav--viewlist">
							<a href="<?php echo $workpageurl; ?>" title="View All">
								<p>View All</p>
								<div class="singlework--backbutton">
									<span class="singlework_backbutton-first-dot"></span>
		              <span class="singlework_backbutton-second-dot"></span>
		              <span class="singlework_backbutton-third-dot"></span>
		              <span class="singlework_backbutton-fourth-dot"></span>
								</div>
							</a>
						</div>
						<!-- Next navigation section start -->
						<div class="posts-nav--next">
						<?php $next_id = $worksposts[$key+1]->ID;
						 if($next_id) {
						 			$next_post_id = $next_id;
									 } else {
									 $next_post_id = $worksposts[0]->ID;
							}
							$nextthumbnail = get_the_post_thumbnail($next_post_id,'featuredImageDetail');
							$next_post_id_permalink = get_the_permalink($next_post_id);
							$next_post_id_title = get_the_title($next_post_id);
							?>
							<a href="<?php echo $next_post_id_permalink; ?>" title="<?php echo $next_post_id_title; ?>">
                <?php echo $nextthumbnail; ?>
                <p><span class="work-text-next"><?php echo $next_post_id_title; ?></span></p>
							</a>
						</div>
							<?php endif;
							endforeach;
    				wp_reset_postdata();
						?>
				</div>
			</div>
		<?php endwhile; ?>
	</main><!-- .site-main -->

<?php get_footer(); ?>