<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package birder
 */

$representative_id = (int)get_theme_mod( 'display_profile_at_footer' );
?>
			</div><!--#content.row-->

			<div class="row">

				<footer id="colophon" class="site-footer" role="contentinfo">

					<?php if ( -1 !== $representative_id ): ?>
						<div id="author-profile" class="author-profile-container">
							<?php birder_representative_profile( $representative_id ); ?>
						</div>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'footer' ) ) : ?>
						<nav id="footer-navigation" class="sub-navigation">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'footer',
									'menu_id'        => 'footer-menu',
									'menu_class'     => 'footer-nav footer-nav_birder list-inline',
									'depth'          => 1,
								) );
							?>
						</nav>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'SNS_on_footer' ) ) : ?>
						<nav id="SNS-linklist-footer" class="SNS-linklist SNS-linklist_footer text-center">
							<?php
								wp_nav_menu( array(
									'theme_location'  => 'SNS_on_footer',
									'menu_id'         => 'SNS-list',
									'container_class' => 'menu-sns-container text-center',
									'menu_class'      => 'SNS-list SNS-list_birder list-inline',
									'depth'           => 1,
									'link_before'     => '<span class="sr-only">',
									'link_after'      => '</span>',
								) );
							?>
						</nav>
					<?php endif; ?>

					<div class="site-info">
						<p class="text-center">
							<?php
								printf(
									'<a href="https://wordpress.org/">' . esc_html__( 'Proudly powered by %s.', 'birder' ) . '</a>',
									'WordPress'
								);
							?>
						<span class="sep">|</span>
							<?php
								printf(
									esc_html__( 'Theme: %1$s by %2$s.', 'birder' ),
									'<a href="https://github.com/KamataRyo/birder">birder</a>',
									'KamataRyo'
								);
							?>
						</p>
					</div><!-- .site-info -->
				</footer><!-- #colophon -->
			</div><!-- .row -->

		</div><!-- .container -->

	</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
