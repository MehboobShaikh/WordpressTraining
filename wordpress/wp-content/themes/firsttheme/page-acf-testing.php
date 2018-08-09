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
					<h2><?php the_field('title'); ?></h2>
				</div>

				<div class="page-post-content">
					<?php the_field('description'); ?>
					<?php 
						// using image ID
						/*$image = get_field('image');
						$size = 'thumbnail';

						if($image){
							echo wp_get_attachment_image($image,$size);
						}*/

						// Using Image URL

						if($a = get_field('image')){
							echo var_dump(get_field_object('image'));
							?>
							<img src="<?php echo $a['url'] ?>" width="200px" style="margin-top: 30px; border: none;">
						<?php }else{
							echo "<h1>Sorry no image is set</h1>";
						}

						if( have_rows('social_url') ):

						    while ( have_rows('social_url') ) : the_row();?>

						    	<p><a target="_blank" href="<?php the_sub_field('link_url'); ?>"><?php the_sub_field('link_name'); ?></a></p>

						    <?php endwhile;

						else :

						    // no rows found

						endif;
					?>
				</div>

			</article>

	<?php endwhile;

	else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();

?>
