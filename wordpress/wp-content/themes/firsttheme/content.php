<article class="post post-template">

	<div class="post-template-post-title">
		<h2><a class="post-title" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

		<p class="post-info"><?php the_time('jS F, Y'); ?> at <?php the_time('g:i a'); ?> | By <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a> | Posted in
		<?php

			$tags = get_the_tags($post);
			$seprate_by = ", ";
			$output = '';

			if($tags){
				foreach($tags as $tag){
					$output .= '<a class="post-tags" href="' . get_tag_link($tag->term_id) . '"> #' .$tag->name. '</a> ';
				}
				// var_dump($output);
				echo trim($output,$seprate_by);
			}		

		?>
		</p>
	</div>

	<div class="post-template-post-content post-content">
		<?php the_content(); ?>
	</div>

</article>