
<?php get_header(); ?>

<div class="index-columns clearfix">

	<div class="main-column"><?php
		if(have_posts()) : ?>
			<h2>Search Result for : <?php the_search_query();?></h2>
			<?php while(have_posts()) : the_post(); ?>
			
			<?php
				if(get_post_format()) {
					// echo get_post_format();
					get_template_part('content', get_post_format());
				}else if(get_post_type()) {
					// echo get_post_type();
					get_template_part('content',get_post_type());
				}
			?>

		<?php endwhile;

		else :
			echo '<p>There is no Post Found</p>';

		endif; ?>
	</div>

	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>