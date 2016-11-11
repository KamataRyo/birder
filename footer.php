<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package biwako
 */

?>
				<footer id="colophon" class="site-footer" role="contentinfo">
					<div class="container">

						<?php $representative_id = (int)get_theme_mod( 'display_profile_at_footer' ); ?>
						<?php if ( -1 !== $representative_id ): ?>
							<div id="author-profile" class="author-profile-container">
								<?php biwako_representative_profile( $representative_id ); ?>
							</div><!--author-profile-->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'footer' ) ) : ?>
							<nav id="footer-navigation" class="sub-navigation">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'footer',
										'menu_id'        => 'footer-menu',
										'menu_class'     => 'footer-nav list-inline list-valign-xs text-center',
										'depth'          => 1,
									) );
								?>
							</nav><!--#footer-navigation-->
						<?php endif; ?>

						<?php if ( has_nav_menu( 'SNS_on_footer' ) ) : ?>
							<nav id="SNS-linklist-footer" class="SNS-linklist text-center">
								<?php
									wp_nav_menu( array(
										'theme_location'  => 'SNS_on_footer',
										'menu_id'         => 'SNS-list',
										'menu_class'      => 'SNS-list icon-links list-inline text-center',
										'depth'           => 1,
										'link_before'     => '<span class="screen-reader-text">',
										'link_after'      => '</span>',
									) );
								?>
							</nav><!--#SNS-linklist-footer-->
						<?php endif; ?>

						<div class="site-info">
							<p class="text-center">
								<?php
									printf(
										'<a href="https://wordpress.org/">' . esc_html__( 'Proudly powered by %s.', 'biwako' ) . '</a>',
										'WordPress'
									);
								?>
							<span class="sep">|</span>
								<?php
									printf(
										esc_html__( 'Theme: %1$s by %2$s.', 'biwako' ),
										'<a href="https://github.com/kamataryo/biwako">biwako</a>',
										'kamataryo'
									);
								?>
							</p>
						</div><!-- .site-info -->
					</div><!-- .container -->
				</footer><!-- #colophon -->
			</div><!-- #secondary -->


		</div><!-- #page -->
		<?php wp_footer(); ?>
	</body>
</html>
