<article class="post post-template">

	<div class="post-template-post-title">
		<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


		<p class="post-info"><?php echo the_time('jS F, Y  g:i a'); ?> | <strong>Writer</strong>  <a href="#"><?php echo get_field('news_writer');?></a> | <strong>Editor</strong> <a href="#">
		<?php echo get_field('news_editor'); ?></a>
		</p>
		
		<p class="post-info"><strong>News Source - </strong><a href="#"><?php echo get_field('news_sources'); ?></a> | <strong>News Channel - </strong><a href="#"><?php echo get_field('news_channel'); ?></a></p>
		

	</div>

	<div class="post-template-post-content">
		<h3>Summary </h3><p><?php echo get_the_excerpt(); ?></p>
	</div>

</article>