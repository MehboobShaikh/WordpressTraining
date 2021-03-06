<?php if($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['submit_filter'])){
	$arrKeys = array_keys($_GET);
	// var_dump($arrKeys);
	$i = 0;
	$filter = array();
	while($i < (count($arrKeys)-1)){
		array_push($filter, $_GET[$arrKeys[$i]]);
		$i++;
	}
}?>
<?php get_header(); ?>

<div class="index-columns clearfix">

	<div id="filtered_content" class="main-column"><?php
		if(have_posts()) : 
			while(have_posts()) : the_post(); ?>
			
			<article class="post page">

				<div class="post-title">
					<h2><a class="post-link " href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<p class="post-info"><?php the_time('jS F, Y'); ?> at <?php the_time('g:i a'); ?> | By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a>  
						<?php

							$tags = get_the_tags($post);
							$seprate_by = ", ";
							$output = ' | Posted in ';

							if($tags){
								foreach($tags as $tag){
									$output .= '<a class="post-tags" href="' . get_tag_link($tag->term_id) . '"> #' .$tag->name. '</a> ';
								}

								echo trim($output,$seprate_by);
							}
							
						?>
					</p>
				</div>

				<div class="post-content">
					<?php the_content(); ?>
				</div>

			</article>

		<?php endwhile;

		else :
			echo '<p>There is no Post Found</p>';

		endif; ?>
	</div>

	<?php get_sidebar(); ?>
	
</div>

<?php get_footer(); ?>
