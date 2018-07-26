<article class="post post-template">

				<div class="post-template-post-title">
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<p class="post-info"><?php echo get_field('movie_release_date'); ?> | Directed By  <a href="#"><?php echo get_field('movie_director');?></a> | Produced Under 
					<?php echo get_field('movie_producer'); ?>
					</p>
				</div>

				<div class="post-template-post-content">
					<h3>Story Line</h3><p><?php the_field('movie_plot'); ?></p>
				</div>

</article>