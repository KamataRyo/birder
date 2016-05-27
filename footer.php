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

?>
		</div><!-- .row -->
		<div class="row">

			<?php
				wp_nav_menu( array(
					'theme_location' => 'footer',
					'menu_id' => 'footer-menu',
					'menu_class' => 'nav navbar-nav footer-nav_birder',
					'depth' => 1,
				) );
			?>
		</div><!-- .row -->

		<div class="row">
			<footer id="colophon" class="site-footer" role="contentinfo">
				<div class="site-info">
					<p class="text-center">
						<?php
							printf(
								esc_html__( 'Proudly powered by %s.', 'birder' ),
								'<a href="https://wordpress.org/">WordPress</a>'
							);
						?>
					<br class="sep">
						<?php
							printf(
								esc_html__( 'Theme: %1$s by %2$s.', 'birder' ),
								'<a href="https://github.com/KamataRyo/birder">birder</a>',
								'<a href="https://biwako.io/" rel="designer">KamataRyo</a>'
							); ?>
					</p>
				</div><!-- .site-info -->
			</footer><!-- #colophon -->
		</div><!-- .row -->
	</div><!-- .container -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
