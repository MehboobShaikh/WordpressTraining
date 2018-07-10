<?php

/*
Template Name: have_posts
*/
	
	get_header();

	?>
	
	<nav class="site-nav">
		<?php wp_nav_menu(); ?>
	</nav>

	<?php 
	// the query
		$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
	 
	<?php if ( $wpb_all_query->have_posts() ) : ?>
	 
	 
	    <!-- the loop -->
	    <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>

	        <article class="post post-template">

				<div class="post-template-post-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>

				<div class="post-template-post-content">
					<?php the_content(); ?>
				</div>

			</article>

	    <?php endwhile; ?>
	 
	    <?php wp_reset_postdata(); ?>
	 
	<?php else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif;


	get_footer();

?>