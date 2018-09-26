<?php
	
	get_header();

	?>

	<?php 
	// the query
		// $wp_myblog_query = new WP_Query(array('post_type'=>'news', 'post_status'=>'publish', 'posts_per_page'=>-1)); ?>
	 
	<?php if ( have_posts() ) : ?>
	 
	 
	    <!-- the loop -->
	    <?php while (have_posts()) : the_post(); ?>

	        <article class="post post-template">

				<div class="post-template-post-title">
					<?php var_dump($post->post_name) ?>
					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>


					<p class="post-info"><?php echo the_time('jS F, Y  g:i a'); ?> | <strong>Writer</strong>  <a href="#"><?php echo get_field('news_writer');?></a> | <strong>Editor</strong> <a href="#">
					<?php echo get_field('news_editor'); ?></a> | Author <a href="<?php echo get_author_posts_url(get_the_author_meta('ID')); ?>"><?php the_author();?></a>
					</p>
					
					<p class="post-info"><strong>News Source - </strong><a href="#"><?php echo get_field('news_sources'); ?></a> | <strong>News Channel - </strong><a href="#"><?php echo get_field('news_channel'); ?></a></p>
					
					<!-- News TimeLine -->
					<blockquote style="
							    font-family: Georgia, serif;
							    font-size: 18px;
							    font-style: italic;
							    /*width: 500px;*/
							    margin: 0.25em 0;
							    padding: 0.35em 40px;
							    line-height: 1.45;
							    position: relative;
							    color: #383838;
					">
						<p class="news-timeline"><q style="">
							<?php
								echo get_field('news_timeline');
							?>
						</q></p>
					</blockquote>
					

				</div>

				<div class="post-template-post-content">
					<h3>Summary </h3><p><?php echo get_the_excerpt(); ?></p>
				</div>

				<!-- If consequences display it -->
				<div class="page-news-consequences-impact">
					<p class="post-info"><?php
						 // Get cast fields
							if( get_field('news_consequences') == 'Yes' ){?>
								<h3>News Consequences Impact</h3>
								<p><?php echo get_field('news_consequences_impact'); ?></p>
							<?php }?>
					</p>
				</div>

			</article>

	    <?php endwhile; ?>
	 
	    <?php wp_reset_postdata(); ?>
	 
	<?php else : ?>
	    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
	<?php endif;
	// wp_reset_postdata();


	get_footer();

?>