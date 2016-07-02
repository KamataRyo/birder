<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package biwako
 */
?>
</div><!--#content.container-->

<div id="secondary">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside id="sidebar" class="widget-area container" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #sidebar -->
	<?php endif; ?>
