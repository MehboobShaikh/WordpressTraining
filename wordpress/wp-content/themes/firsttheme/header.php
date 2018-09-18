<!DOCTYPE html>
<html>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

	<div class="container">

	<!-- Site Header -->
	<header class="site-header">
		<div class="site-search">
			<?php get_search_form(); ?>
		</div>
		<?php if(get_theme_mod('firsttheme_site_header_logo_setting')): ?>
			<h1><a class="site-name" href="<?php echo home_url(); ?>"><figure class="site-logo"><img src="<?php echo get_theme_mod('firsttheme_site_header_logo_setting'); ?>" alt="Site Logo"></figure></a></h1>
			<?php else: ?>
			<h1><a class="site-name" href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?></a></h1>
		<?php endif; ?>
		<h5 class="site-description"><?php bloginfo('description') ?></h5>
	</header>	<!-- Site Header -->

	<nav class="site-nav">
		<?php
			$args = array(
				'menu' => 'main-menu'
			);
		?>
		<?php wp_nav_menu($args); ?>
	</nav>
	

	