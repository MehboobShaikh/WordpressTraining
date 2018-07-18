<?php

/*
Template Name: Movie Template
Author: Mehboob Shaikh
version: 1.0
*/
	
	get_header();

	?>

	<?php 
	// the query
		$wp_myblog_query = new WP_Query(array('post_type'=>'movie', 'post_status'=>'publish','meta_key'=>'movie_release_date','orderby'=>'meta_value','order'=>'ASC', 'posts_per_page'=>-1)); ?>
	 
	<?php if ( $wp_myblog_query->have_posts() ) : ?>
	 
	 
	    <!-- the loop -->
	    <?php while ($wp_myblog_query->have_posts()) : $wp_myblog_query->the_post(); ?>

	        <article class="post post-template">

				<div class="post-template-post-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<p class="post-info"><?php echo get_field('movie_release_date'); ?> | Directed By  <a href="#"><?php echo get_field('movie_director');?></a> | Produced Under 
					<?php echo get_field('movie_producer'); ?>
					</p>
					<p class="post-info"><strong>Cast - </strong><?php
						 // Get cast fields
							if( have_rows('cast_info') ){
								while( have_rows('cast_info') ): the_row(); 
								// Subfields
									if( get_sub_field('cast_info_real_name') ){
 										$cast_info_real_name = get_sub_field('cast_info_real_name');
									}
								echo " ".$cast_info_real_name ."<strong style='font-size:110%;'> | </strong>";

								endwhile;
							}?>
					</p>
				</div>

				<div class="post-template-post-content">
					<h3>Story Line</h3><p><?php the_field('movie_plot'); ?></p>
				</div>

			</article>

	    <?php endwhile; ?>
	 
	    <?php wp_reset_postdata(); ?>
	 
	<?php else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif;
	wp_reset_postdata();


	get_footer();

?>