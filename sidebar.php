<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package birder
 */
?>
<div id="secondary" class="sidebar-area">
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
		<aside id="sidebar" class="widget-area" role="complementary">
			<?php dynamic_sidebar( 'sidebar-1' ); ?>
		</aside><!-- #sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
