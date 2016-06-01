<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package birder
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
			<a class="skip-link screen-reader-text" href="#main"><?php esc_html_e( 'Skip to content', 'birder' ); ?></a>
			<header id="masthead" role="banner">

				<?php if ( has_nav_menu( 'header' ) ) : ?>
					<nav id="primary-navigation" class="" role="navigation">
						<span class="genericon genericon-menu"></span>
						<?php
							wp_nav_menu( array(
								'theme_location'  => 'header',
								'container'      => 'div',
								'container_id'   => '',
								'container_class' => '',
								'menu_id'         => 'header-menu',
								'menu_class'      => '',
								'depth'           => 1,
							) );
						?>
					</nav><!-- primary-navigation -->
				<?php endif; ?>

				<div class="site-branding">
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description text-center"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding -->

			</header><!-- #masthead -->

			<div id="content" class="site-content">
