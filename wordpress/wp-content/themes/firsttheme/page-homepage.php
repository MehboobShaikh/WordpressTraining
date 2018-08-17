<?php
	
	get_header();

	?>

<div class="first-custom-post">
	<?php
	
	$args = array(
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'movies-category',
				'field' => 'slug',
				'terms' => array('action','sci-fi')
			)
		)
	);
	$cus_query = new WP_Query($args);
	if($cus_query->have_posts()) : 
		while($cus_query->have_posts()) : $cus_query->the_post(); ?>

			<article class="page">

				<div class="page-post-title">
					<?php //the_permalink(); ?>
					<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>

				<div class="page-post-content post-content">
					<?php the_content(); ?>
				</div>

			</article>

	<?php endwhile; wp_reset_postdata();

	else :
		echo '<p>There is no Post Found</p>';

	endif; ?>
</div>
<div class="second-custom-post">
	<?php
	
	$args = array(
		'posts_per_page' => -1,
		'tax_query' => array(
			array(
				'taxonomy' => 'news-category',
				'field' => 'slug',
				'terms' => array('sports','normal')
			)
		)
	);
	$cus_query = new WP_Query($args);
	if($cus_query->have_posts()) : 
		while($cus_query->have_posts()) : $cus_query->the_post(); ?>

			<article class="page">

				<div class="page-post-title">
					<?php //the_permalink(); ?>
					<h2><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
				</div>

				<div class="page-post-content post-content">
					<?php the_content(); ?>
				</div>

			</article>

	<?php endwhile; wp_reset_postdata();

	else :
		echo '<p>There is no Post Found</p>';

	endif; ?>

	<?php $terms = get_terms( array(
	    'taxonomy' => array('news-category','movies-category'),
	    'orderby' => 'taxonomy'
	) );

// var_dump($terms);
	?> <div class="clearfix"> <?php
	for($i = 0; $i < count($terms); $i++){ ?>
		<div class="footer-col1" style="float:left; width:35%;"><h4 class="menu-category"><a href="<?php echo get_term_link($terms[$i]->term_id); ?>"><?php echo $terms[$i]->name; ?></a></h4>
			<div class="menu-list">
				<?php
					$post_list = new WP_Query(array(
						'posts_per_page' => -1,
						'tax_query' => array(
							array(
								'taxonomy' => $terms[$i]->taxonomy,
								'field' => 'slug',
								'terms' => array($terms[$i]->slug)
							)
						)
					));
					if($post_list->have_posts()){
						while($post_list->have_posts()){
							$post_list->the_post(); ?>
							<div class="menu-list-item"><a style="color: #006ec3" href="<?php echo get_permalink(); ?>">
								<?php echo get_the_title(); ?>
							</a></div>
						<?php } wp_reset_postdata();
					}else{ ?>
							<div class="menu-list-item"><?php echo "No Postssss"; ?></div>
					<?php }
				?>
			</div>
		</div>	
	<?php } ?></div>

</div>

	<?php get_footer();

?>