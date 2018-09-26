<h1>First Theme Setting</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php">
	<?php settings_fields('firsttheme-settings-group'); ?>
	<?php do_settings_sections('firsttheme-menu-settings'); ?>
	<?php submit_button(); ?>
</form>



<?php settings_errors();?>
<h1>Settings Page Editor</h1>
<p>Customize Footer</p>
<form method="post" action="options.php">
    <?php settings_fields( 'custom-setting-handler-group' ); ?>
    <?php do_settings_sections( 'menu-settings' );?>
    <?php submit_button(); ?>
</form> 