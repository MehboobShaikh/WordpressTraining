<?php
	
	get_header();

	?>
<?php
	
	if(have_posts()) : ?>

		<div id="main" class="main-content clearfix">
			<?php while ( have_posts() ) : the_post(); ?>
		
			<?php
				$movie_plot = get_field('movie_plot');
				$movie_duration = get_field('movie_duration');
				$movie_release_date = get_field('movie_release_date');
				$movie_image = get_field('movie_image');
				$movie_genre = get_field('movie_genre');
				$movie_country = get_field('movie_country');
				$movie_language = get_field('main_language');
				$movie_budget = get_field('movie_budget');
				$movie_storyline = get_field('movie_plot');
				// echo var_dump(get_field('movie_budget'));
			?>
				
				<div class="body-section clearfix">
					<div class="container">
						<div class="col column1 clearfix">
							<div class="movie-image">
								<img src="<?php echo $movie_image['url']; ?>">
							</div>
							<h1 class="movie-title"><?php echo get_the_title();?></h1>
							<h2>Movie Info</h2>
							<div class="movieinfo">
								<p><strong>Release Date:</strong> <?php echo $movie_release_date; ?> (<?php echo $country; ?>)</p>
								<p class="genre"><strong>Genres:</strong><ul> 
									<?php
										foreach( $movie_genre as $genre ){
											echo '<li><p> ' . $genre['value'] . ' </p></li>';
										}
									?></ul>
								</p>
								<p><strong>Country:</strong> <?php echo $movie_country; ?></p>
								<p><strong>Language:</strong> <?php echo $movie_language; ?></p>
								<p><strong>Budget:</strong> <?php echo $movie_budget; ?> (estimated)</p>
							</div>
						</div>
						<div class="col column2 clearfix">
							<div class="storyline">
								<h2>Movie Storyline</h2>
								<p><?php echo $movie_storyline; ?></p>
							</div>
							<div class="trailer">
								<h2>Trailer</h2>
								<div class="video-frames">
									<?php // Get Trailer fields
										if( have_rows('movie_trailer') ){
											while( have_rows('movie_trailer') ): the_row(); 
											// Subfields
												if( get_sub_field('trailer_link') ){
			 										$trailer_link = get_sub_field('trailer_link');?>
			 										<iframe width="420" height="315" src="<?php echo $trailer_link; ?>" frameborder="0" allowfullscreen></iframe><?php
												}
											endwhile;
										} 
									?>
								</div>
							</div>
							<div class="cast">
								<h2>Cast</h2>
								<div class="cast-list clearfix">
									<?php // Get cast fields
										if( have_rows('cast_info') ){
											while( have_rows('cast_info') ): the_row(); 
											// Subfields
												if( get_sub_field('cast_info_image') ){
			 										$cast_info_image = get_sub_field('cast_info_image');
												}
												if( get_sub_field('cast_info_real_name') ){
			 										$cast_info_real_name = get_sub_field('cast_info_real_name');
												}
												if( get_sub_field('cast_info_movie_name') ){
			 										$cast_info_movie_name = get_sub_field('cast_info_movie_name');
												}
											echo '<div class="casts" style="float:left; padding-left:20px;">';
											echo '<img src="' . $cast_info_image['url'] . '" alt="">';
											echo '<h3 class="cast-real-name">' . $cast_info_real_name . '</h3>';
											echo '<p class="cast-char-name"> as <strong>' . $cast_info_movie_name . '</strong></p>';									
											echo '</div>';
		 
											endwhile;
										} 
									?>
								</div>
							</div>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>







	<?php else :
		echo '<p>There is no Post Found</p>';

	endif;

	get_footer();

?>