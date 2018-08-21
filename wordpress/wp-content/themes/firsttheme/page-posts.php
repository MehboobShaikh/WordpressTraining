<?php

/*
Template Name: Post Template
Author: Mehboob Shaikh
version: 1.0
*/
	
	get_header();

	?>

	<?php 
	// the query
		$wp_myblog_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1/*,'order'=>'desc'*/)); ?>
	 
	<?php if ( $wp_myblog_query->have_posts() ) : ?>
	 
	 
	    <!-- the loop -->
	    <?php while ($wp_myblog_query->have_posts()) : $wp_myblog_query->the_post(); ?>

	        <?php //echo get_post_format(); ?>
	        <?php get_template_part('content',get_post_format()); ?>

	    <?php endwhile; ?>
	 
	<?php else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif;
	wp_reset_postdata();


	get_footer();

?>