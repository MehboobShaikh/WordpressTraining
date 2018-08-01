<?php

	get_header();

	if(have_posts()){

		while(have_posts()){ the_post(); ?>

			<h2><?php the_title(); ?></h2>

			<article>
				<?php
					the_content();
				?>
			</article>

		<?php }
	}
	else{
		echo '<p>There is No Posts</p>';
	}


	get_footer();

?>