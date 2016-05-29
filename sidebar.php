<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package birder
 */
?>
		<a id="sidebar-toggle" role="button" data-toggle="collapse" href="#sidebar" aria-expanded="false" aria-controls="sidebar">toggle sidebar area</a>
			<div id="sidebar" class="collapse">
			<?php
			if ( is_active_sidebar( 'sidebar-1' ) ) {
				?>
				<aside id="secondary" class="widget-area" role="complementary">
					<?php dynamic_sidebar( 'sidebar-1' ); ?>
				</aside><!-- #secondary -->
				<?php
			}
			?>
		</div><!--#sidebar.row-->
