<!-- Secondary Column on Index Page goes here -->
	<div class="secondary-column">

		<div class="sidebar-profile">

			<div class="profile">
			<img class="profile-img" src="<?php echo esc_attr(get_option('profile_img')); ?>">
				<h3><span id="firstname"><?php echo esc_attr(get_option('first_name')); ?></span> <span id="lastname"><?php echo esc_attr(get_option('last_name')); ?></span></h3>
				<h6 class="profile-description"><?php echo esc_attr(get_option('profile_description')); ?></h6>

				<div class="profile-social-urls">
					<a class="twitter" href="<?php echo esc_attr(get_option('twitter_url')); ?>"><span class="dashicons dashicons-twitter"></span></a>
					<a class="google" href="<?php echo esc_attr(get_option('google_plus_url')); ?>"><span class="dashicons dashicons-googleplus"></span></a>
					<a class="facebook" href="<?php echo esc_attr(get_option('facebook_url')); ?>"><span class="dashicons dashicons-facebook-alt"></span></a>
				</div>
			</div>

			<?php dynamic_sidebar('sidebar1'); ?>
		</div>

		<div class="widget-item post-filter"><h2 class="widgettitle">Filter Post Here</h2>
			<?php get_template_part('filterform'); ?>
		</div>


	</div>