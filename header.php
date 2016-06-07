<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package biwako
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#main"><?php _e( 'Skip to content', 'biwako' ); ?></a>

			<header id="masthead" role="banner container">
				
				<div id="site-branding">
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div>

				<?php if ( has_nav_menu( 'header' ) ) : ?>
					<nav id="primary-navigation" class="navgigation" role="navigation">
						<div class="container--toggle-menu text-right">
							<a class="toggle-menu" data-target="#header-menu"><span class="screen-reader-text"><?php _e( 'Skip to content', 'biwako' ); ?></span></a>
						</div>
						<?php
							wp_nav_menu( array(
								'theme_location'  => 'header',
								'menu_id'         => 'header-menu',
								'menu_class'      => 'header-menu collapsible list-inline list-valign-xs text-right collapsed',
								'depth'           => 1,
							) );
						?>
					</nav><!-- primary-navigation -->
				<?php endif; ?>

				<div id="header-belt"></div><!-- #header-belt -->

			</header><!-- #masthead -->

			<div id="content" class="site-content container">
