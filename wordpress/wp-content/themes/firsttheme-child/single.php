<?php
	
	get_header();

	
	if(have_posts()) : 
		while(have_posts()) : the_post(); 
			setPostViews(get_the_ID());
			?>
		
		<article class="post single child-theme-single">
			<div class="ct-single-post-title">
				<h2><?php the_title(); ?></h2>
			</div>

			<div class="ct-single-post-content">
				<?php the_content();
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