<?php get_header(); ?>

	<?php if(current_user_can('administrator') || current_user_can('editor')) { ?>
		<?php $user = wp_get_current_user(); ?>
		<div class="restapi-fields">
			<h3>Quick Add Post</h3>
			<input type="text" name="title" placeholder="Enter Title" value="<?php echo $user->data->user_login; ?>" readonly>
			<textarea name="content" rows="5" placeholder="Enter Post Content"></textarea>
			<button id="quick-add-button">Create Post</button>
		</div>
		
	<?php } ?>

<?php get_footer(); ?>