
<?php if ( is_home() ) : ?>
<!-- FOOTER WIDGETS -->
	<div class="widgets footer-widgets clearfix">

		<?php if(is_active_sidebar('footer1')): ?>
			<div class="footer-widget-area">
				<?php dynamic_sidebar('footer1'); ?>
			</div>
		<?php endif; ?>

		<?php if(is_active_sidebar('footer2')): ?>
			<div class="footer-widget-area">
				<?php dynamic_sidebar('footer2'); ?>
			</div>
		<?php endif; ?>

		<?php if(is_active_sidebar('footer3')): ?>
			<div class="footer-widget-area">
				<?php dynamic_sidebar('footer3'); ?>
			</div>
		<?php endif; ?>

		<?php if(is_active_sidebar('footer4')): ?>
			<div class="footer-widget-area">
				<?php dynamic_sidebar('footer4'); ?>
			</div>
		<?php endif; ?>

	</div><!-- FOOTER WIDGETS END -->
<?php endif; ?>

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