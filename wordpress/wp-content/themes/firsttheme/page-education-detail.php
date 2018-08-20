<?php
	
	get_header();

	?>

<?php
	
	if(have_rows('high_school')) :
		while(have_rows('high_school')) : the_row(); ?>
		<?php
			// check current row layout
        if( get_row_layout() == 'school' ):

		// var_dump(get_sub_field('school_name'));
		?><h2><?php echo get_sub_field('school_name'); ?></h2>
		<?php
		// var_dump(get_sub_field('display_images'));

        	// check if the nested repeater field has rows of data
        	if( get_sub_field('display_images') ): ?>

        		<div class="school-slider">
				  <div class="slider slider-for-school">

			 	<?php // echo '<ul>';
			 	// var_dump( get_sub_field('school_images') );

			 	// loop through the rows of data
			    while ( have_rows('school_images') ) : the_row(); ?>

					<?php // var_dump(get_sub_field('image_description')); ?>
					<!-- SLIDER DIV -->

					<div class="school-images"> 
						<img src="<?php echo get_sub_field('image')['url']; ?>">
						<span class="school-images-description"><?php echo get_sub_field('image_description'); ?></span>
					</div>


				<?php endwhile; ?>

				</div></div>

				<?php // echo '</ul>';

			endif;
			// var_dump();

        endif; 
        ?>

	<?php endwhile;

	else :
		echo '<p>There is no School Data Found</p>';

	endif;

	get_footer();

?>
