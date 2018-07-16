
<footer class="site-footer">

	<?php
	$args = array(
		'theme_location' => 'new-menu'
	);
	?>
	<?php wp_nav_menu($args); ?>
	
	<p><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a> - &copy; <?php echo date('Y'); ?></p>

</footer>
</div>

<?php wp_footer(); ?>
</body>
</html>