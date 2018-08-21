<?php
	
	get_header();

	
	if(have_posts()) : 
		while(have_posts()) : the_post(); 
			setPostViews(get_the_ID());
			?>
		
		<article class="post single">
			<div class="single-post-title">
				<h2><?php the_title(); ?></h2>
			</div>

			<div class="single-post-content">
				<?php the_content();

				$post_object = get_field('post_object_demo');
				if($post_object){

					// var_dump($post_object);

					foreach($post_object as $post){
						setup_postdata($post);
						// var_dump($post);

						the_title();
						// echo get_field('news_timeline');
						the_content();
					}
					wp_reset_postdata();
				}
				//Gives the post views
				// echo getPostViews(get_the_ID());
				 ?>
			</div>

		</article>

	<?php endwhile;

	else :
		echo '<p>There is no Post Found</p>';

	endif;

	// get_template_part('form');

	get_footer();

?>