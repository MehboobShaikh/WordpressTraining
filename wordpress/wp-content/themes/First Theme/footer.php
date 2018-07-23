
<footer class="site-footer">

	<?php
	$args = array(
		'theme_location' => 'new-menu'
	);
	?>
	<?php wp_nav_menu($args); ?>
	
	<a class="clearfix copyright" style="margin-right: 10%;float: right;" href="<?php echo home_url(); ?>"><?php echo get_theme_mod('copyright'); ?></a>

</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>