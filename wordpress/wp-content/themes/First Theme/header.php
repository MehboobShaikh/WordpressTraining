<!DOCTYPE html>
<html>
	<head>
		<!-- <link rel="stylesheet" type="text/css" href="/WP/wordpress/wp-content/themes/First%20Theme/style.css"> -->
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
		<h1><a class="site-name" href="<?php echo home_url(); ?>"> <?php bloginfo('name'); ?></a></h1>
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
	

	