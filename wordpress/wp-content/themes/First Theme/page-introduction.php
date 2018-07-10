<?php
	
	get_header();

	?>
	
	<nav class="site-nav">
		<?php wp_nav_menu(); ?>
	</nav>

<?php
	
	if(have_posts()) : 
		while(have_posts()) : the_post(); ?>

			<article class="page page-template">

				<!-- Cloumn Container -->
				<div class="column-container clearfix">

					<!-- Title Column -->
					<div class="title-column">
						<h2><?php the_title(); ?></a></h2>
					</div>

					<!-- Content Column -->
					<div class="content-column">
						<?php the_content(); ?>
					</div>
				</div>

			</article>

	<?php endwhile;

	else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();

?>