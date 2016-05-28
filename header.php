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

    <div class="container">
		<div class="row">

	    	<header id="masthead" class="site-header" role="banner">

	            <nav id="site-navigation" class="main-navigation">
	    			<button class="menu-toggle" aria-controls="header-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'birder' ); ?></button>
	                <?php
	                    wp_nav_menu( array(
	                        'theme_location' => 'header',
	                        'menu_id' => 'header-menu',
	                        'menu_class' => 'nav navbar-nav navbar-right',
							'depth' => 2,
	                    ) );
	                ?>
	    		</nav><!-- #site-navigation -->

	    		<div class="site-branding">
	    			<?php
	    			if ( is_front_page() && is_home() ) : ?>
	    				<h1 class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	    			<?php else : ?>
	    				<p class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
	    			<?php
	    			endif;

	    			$description = get_bloginfo( 'description', 'display' );
	    			if ( $description || is_customize_preview() ) : ?>
	    				<p class="site-description text-center"><?php echo $description; /* WPCS: xss ok. */ ?></p>
	    			<?php
	    			endif; ?>
	    		</div><!-- .site-branding -->

	    	</header><!-- #masthead -->
		</div><!-- .row -->

		<div id="content" class="site-content row">
