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
		<a class="skip-link sr-only" href="#main"><?php esc_html_e( 'Skip to content', 'birder' ); ?></a>

		<header id="masthead" class="site-header" role="banner">
			<div class="container-fluid">

				<?php if ( has_nav_menu( 'header' ) ) : ?>
					<div class="row">

						<nav id="site-navigation" class="main-navigation navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#header-menu-navbar">
										<span class="sr-only"><?php _e( 'Toggle menu', 'birder' ); ?></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>
								</div>
								<div id="header-menu-navbar" class="collapse navbar-collapse">
									<ul class="header-serch-links-list nav navbar-nav navbar-right">
										<li>
											<a href="" class="header-serch-link navbar-text"  data-toggle="modal" data-target="#header-search">
												<span class="glyphicon glyphicon-search"></span>
												<span class="hidden-sm hidden-md hidden-lg">
													<?php _e( 'Serach', 'birder' ); ?>
												</span>
											</a>
										</li>
									</ul>
									<?php
										wp_nav_menu( array(
											'theme_location'  => 'header',
											// 'container'      => 'div',
											// 'container_id'   => 'header-menu-navbar',
											// 'container_class' => 'collapse navbar-collapse',
											'menu_id'         => 'header-menu',
											'menu_class'      => 'nav navbar-nav navbar-right',
											'depth'           => 1,
										) );
									?>
								</div><!-- #grader-menu-navbar -->
							</div><!--.container-fluid-->
						</nav>
					</div><!--.row-->
				<?php endif; ?>

				<div class="site-branding row">
					<?php if ( is_front_page() && is_home() ) : ?>
						<h1 class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php else : ?>
						<p class="site-title text-center"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
					<?php endif;

					$description = get_bloginfo( 'description', 'display' );
					if ( $description || is_customize_preview() ) : ?>
						<p class="site-description text-center"><?php echo $description; /* WPCS: xss ok. */ ?></p>
					<?php endif; ?>
				</div><!-- .site-branding.row -->
			</div><!--.container-fluid-->

		</header><!-- #masthead -->

	<div class="container">
	<div id="content" class="site-content row">
