<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package birder
 */
?>
			</div><!-- #content-grid -->
			<div id="sidebar-grid" class="col-xs-12">
				<?php
				if ( is_active_sidebar( 'footer_area-1' ) ) {
					?>
					<aside id="secondary" class="widget-area" role="complementary">
						<?php dynamic_sidebar( 'footer_area-1' ); ?>
					</aside><!-- #secondary -->
					<?php
				}
				?>
			</div>
