<?php
	
	get_header();

	?>

<?php
	
	if(have_posts()) : 
		while(have_posts()) : the_post(); ?>

			<nav class="template-site-nav">
				
				<div>
					<span class="parent-link clearfix"><a href="<?php the_permalink(get_top_ancestor_id()); ?>"><?php echo get_the_title(get_top_ancestor_id()); ?></a></span>
				</div>

				<ul class="children-links clearfix">
					<?php
						$args = array(
							'child_of' => get_top_ancestor_id(),
							'title_li' => ''
						);
					
						wp_list_pages($args);
					?>
				</ul>

			</nav>
			<article class="page">

				<div class="page-post-title">
					<?php //the_permalink(); ?>
					<h2><?php the_title(); ?></h2>
				</div>

				<div class="page-post-content post-content">
					<?php the_content(); ?>
				</div>

			</article>

	<?php endwhile;

	else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();

?>