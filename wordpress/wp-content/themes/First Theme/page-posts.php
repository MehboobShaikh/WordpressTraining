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
		$wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1/*,'order'=>'desc'*/)); ?>
	 
	<?php if ( $wpb_all_query->have_posts() ) : ?>
	 
	 
	    <!-- the loop -->
	    <?php while ($wpb_all_query->have_posts()) : $wpb_all_query->the_post(); ?>

	        <article class="post post-template">

				<div class="post-template-post-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<p class="post-info"><?php the_time('jS F, Y'); ?> at <?php the_time('g:i a'); ?> | By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a> | Posted in
					<?php

						$tags = get_the_tags($post);
						$seprate_by = ", ";
						$output = '';

						if($tags){
							foreach($tags as $tag){
								$output .= '<a class="post-tags" href="' . get_tag_link($tag->term_id) . '"> #' .$tag->name. '</a> ';
							}

							echo trim($output,$seprate_by);
						}
						

					?>
					</p>
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
	wp_reset_postdata();


	get_footer();

?>