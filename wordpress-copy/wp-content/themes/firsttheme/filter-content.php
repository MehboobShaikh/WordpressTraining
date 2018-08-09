<?php
		if(isset($_POST['parameters'])){
			$cat_list = explode(',',$_POST['parameters']);

			if($cat_list[0] == ''){
				$count = 0;
			}else{
				$count = count($cat_list);
			}
			// Custom Query

			if($count > 0){
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => -1,
					'tax_query' => array(
						array(
							'taxonomy' => 'category',
							'field' => 'slug',
							'terms' => $cat_list,
						),
					),
				);

				$wp_filter_query = new WP_Query($args);?>

				
				<?php
					if($wp_filter_query->have_posts()) : 
						while($wp_filter_query->have_posts()) : $wp_filter_query->the_post(); ?>
						
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
					wp_reset_postdata();

					else :
						echo '<p>There is no Post Found</p>';

					endif;
			}else {
				get_template_part('unfiltered-content');
			}

		}

		wp_die();