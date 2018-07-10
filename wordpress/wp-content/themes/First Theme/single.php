<?php
	
	get_header();

	?>
	
	<nav class="site-nav">
		<?php wp_nav_menu(); ?>
	</nav>

<?php
	
	if(have_posts()) : 
		while(have_posts()) : the_post(); ?>
		
		<article class="post single">
			<div class="single-post-title">
				<h2><?php the_title(); ?></h2>
			</div>

			<div class="single-post-content">
				<?php the_content(); ?>
			</div>

		</article>

	<?php endwhile;

	else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();

?>