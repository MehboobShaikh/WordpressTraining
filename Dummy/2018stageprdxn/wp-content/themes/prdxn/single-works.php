<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage prdxn
 * @since prdxn 1.0
 */

get_header();

# Get listing page permalink
$workpage = get_page_by_path('work');
$workpageurl = get_permalink($workpage);
?>
<!-- Main starts here -->
<main id="main" class="site_main" role="main">
	<?php while(have_posts()) : the_post();

			# Posts variables listed here
	$alt_text = get_post_meta($post->ID, '_wp_attachment_image_alt', true);
	$thumbnail = get_the_post_thumbnail($post->ID, 'full');
	$title = get_the_title();
	$hero_foreground = get_field('hero_foreground');
	$launch_project_cta_link = get_field('launch_project_cta_link');
	$launch_project_cta_text = get_field('launch_project_cta_text');
	?>
	<!-- Hero section starts here -->
	<div class="hero--section">
		<div class="banner">
			<?php if( $thumbnail ) {
				echo $thumbnail;
			} ?>
			<div class="wrapper">
				<div class="hero_work--title">
					<span>work</span>
					<h2><?php echo $title; ?></h2>
				</div>
				<div class="hero_forground--img">
					<img src="<?php echo $hero_foreground['url']; ?>" alt="<?php echo $hero_foreground['alt']; ?>">
				</div>
			</div>
		</div>
	</div> <!-- Hero section end -->
	<!-- Work detail content starts here -->
	<div class="work_detail--content">
		<div class="work_detail--project-technteam">
			<div class="wrapper">
				<!-- Work detail navigation starts here -->
				<div class="work_detail--navslider">
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
								foreach ($applicable_service as $post):
									setup_postdata( $post );

								        # Posts variables listed here
								$permalink = get_the_permalink();
								$post_title = get_the_title();
								$formatless_title = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($post_title)));
								?>

								<!-- <li><a href="<?php echo $permalink; ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></li> -->

								<li><a href="<?php echo get_site_url().'/services/#'.$formatless_title; ?><?php //echo get_the_slug($post->ID); ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></li>

								<?php
								endforeach;
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
							foreach ($applicable_technologies as $post):
								setup_postdata( $post );

								        # Posts variables listed here
							$permalink = get_the_permalink();
							$post_title = get_the_title();
							$formatless_title = strtolower(preg_replace('/[^A-Za-z0-9\-]/','', strip_tags($post_title)));
								?>
							<li><a href="<?php echo get_site_url().'/services/#'.$formatless_title; ?><?php //echo get_the_slug($post->ID); ?>" title="<?php echo $post_title; ?>"><?php echo $post_title; ?></a></li>

							<?php
							endforeach;
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
	</div> <!-- Work detail navigation end -->
</div> <!-- Wrapper end -->
</div>
<!-- Work detail slider starts here -->
<div class="flexslider workdetail--main-slider">
	<?php if( have_rows('project_image_slider') ): ?>
		<ul class="slides">
			<?php while( have_rows('project_image_slider') ): the_row();

							// vars
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
</div> <!-- Work detail slider end -->
<!-- Work detail launch cta -->
<?php if(!empty($launch_project_cta_text)) { ?>
<div class="workdetail--launch-cta">
	<a href="<?php echo $launch_project_cta_link; ?>" target="_blank" title="<?php echo $launch_project_cta_text; ?>"><?php echo $launch_project_cta_text; ?></a>
</div>
<?php } ?>
<!-- Previous Next navigation of detail page with view all section -->
<div class="workdetail--posts-nav-section">
	<?php  $current_id = get_the_id();

            //Prev post block
	$args = array(
		'post_type' => array( 'works', 'case_study' ),
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
		$prevthumbnail = get_the_post_thumbnail($prev_post_id,'thumbnail');
		$prev_post_id_permalink = get_the_permalink($prev_post_id);
		$prev_post_id_title = get_the_title($prev_post_id);
		?>
		<a href="<?php echo $prev_post_id_permalink; ?>" title="<?php echo $prev_post_id_title; ?>">
			<?php echo $prevthumbnail; ?>
			<p><?php echo $prev_post_id_title; ?></p>
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
		$nextthumbnail = get_the_post_thumbnail($next_post_id,'single-post-thumbnail');
		$next_post_id_permalink = get_the_permalink($next_post_id);
		$next_post_id_title = get_the_title($next_post_id);
		?>
		<a href="<?php echo $next_post_id_permalink; ?>" title="<?php echo $next_post_id_title; ?>">
			<?php echo $nextthumbnail; ?>
			<p><?php echo $next_post_id_title; ?></p>
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