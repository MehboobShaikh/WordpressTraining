<?php
	
	get_header();

	?>
	
	<nav class="site-nav">
		<?php wp_nav_menu(); ?>
	</nav>

<?php
	
	if(have_posts()) : 
		while(have_posts()) : the_post(); ?>
		
		<article class="post page">

			<div class="post-title">
				<h2><a class="post-link" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			</div>

			<div class="post-content">
				<?php the_content(); ?>
			</div>

		</article>

	<?php endwhile;

	else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();

?>