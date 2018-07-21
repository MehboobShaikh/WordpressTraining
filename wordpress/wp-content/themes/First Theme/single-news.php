<?php 
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // echo "<script>alert('".$_REQUEST['passindex']."');</script>";
    // echo $_REQUEST['passindex'];

    // Fetching the data from DB goes here

  	// custom query for post type news
		// $wp_myblog_query = new WP_Query(array('post_type'=>'news', 'post_status'=>'publish', 'posts_per_page'=>-1));

  	// if($_REQUEST['passindex']){
	  	if(get_field('news_media_image')[$_REQUEST['passindex']]['media_image']['type'] == 'image'){
	  		// echo var_dump(get_field('news_media_image')[$_REQUEST['passindex']]['media_image']['type']);	
	  		$counter = 0;
		  	while(have_rows('news_media_image')){
		  		// echo "<script>console.log('". $_REQUEST['passindex'] . get_sub_field('image_description') ."')</script>";

		  		if($_REQUEST['passindex'] == 0){
		  			echo get_field('news_media_image')[0]['image_description'];
		  			exit();
		  		}

		  		if(get_sub_field('image_description') && $counter == $_REQUEST['passindex']){
		  			the_row();
		  			echo get_sub_field('image_description');
		  		}else{
		  			the_row();
		  		}
		  		$counter += 1;
		  	}
		}else {
			echo "no-image";
		}
  	// }

}else{
?>
<?php
	
	get_header();

	?>
<?php
	
	if(have_posts()) : ?>


		<div id="main" class="main-content clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
		
			<?php
				$news_title = get_the_title();
				$news_timeline = get_field('news_timeline');
				$news_detail = get_field('news_detail');
				$news_source = get_field('news_source');
				$news_channel = get_field('news_channel');
				$news_consequences = get_field('news_consequences');
				$news_writer = get_field('news_writer');
				$news_editor = get_field('news_editor');
				// echo var_dump(get_field('news_consequences'));
			?>
				
				<div class="news-section clearfix">
					<h1 class="news-title"><?php echo $news_timeline;?></h1> <!-- News Title -->

					<?php //echo get_field('news_media_option')[0]; ?>
					<!-- Slider Goes Here -->

					<?php
						if(get_field('news_media_option')[0] == 'Image' || get_field('news_media_option')[0] == 'Video'){
							// Slider File is Called i.e header-slider
							get_header('slider');?>
							<h5 class="clearfix" style="float: right;"><?php echo 'Published by '.$news_channel; ?></h5>
						<?php }
					?>

					<div class="newsinfo">
						<div class="news-detail">
							<h2>Story</h2>
							<p class="news-story" style="text-indent: 2em;"><?php echo $news_detail; ?></p>
						</div>

						<!-- If consequences display it -->
						<?php
						 // Get impact fields
							if( get_field('news_consequences') == 'Yes' ){?>
								<div class="news-consequences-impact">
									<p class="post-info">
									<h4>News Consequences Impact</h4>
									<p style="margin-left: 1.5em;"><q><?php echo get_field('news_consequences_impact'); ?></q></p>
							</p>
						</div>
						<?php }?>

							<p><strong>Writer </strong>- <?php echo $news_writer; ?></p>
							<p><strong>Editor </strong>- <?php echo $news_editor; ?></p>
							<?php
								if(!get_field('news_media_option')[0] == 'Image' && !get_field('news_media_option')[0] == 'Video'){?>
									<p><strong>Published by </strong>- <?php echo $news_channel; ?></p>
							<?php } ?>
					</div>

			<?php endwhile; ?>
			
			<!-- News Navigation gose Here -->
			<div class="news-navigation" style="text-align:center;">
				<span style="float: left;"><?php previous_post_link('<strong>&laquo;</strong> %link','Previous News'); ?></span>
				<span style="float: right;"><?php next_post_link('%link <strong>&raquo</strong>','Next News'); ?></span>
			</div>

		</div>

	<?php else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();
}
?>