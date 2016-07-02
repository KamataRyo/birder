<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package biwako
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php if ( has_post_thumbnail() ): ?>
			<div class="text-center">
				<?php echo get_the_post_thumbnail(get_the_ID() ); ?>
			</div>
		<?php endif; ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta text-center">
			<?php biwako_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>

		<?php
			$title = get_the_title();
			if ( is_single() && '' !== $title  ) {
				the_title( '<h1 class="entry-title text-center">', '</h1>' );
			}
			if ( ! is_single() ) {
				// show sticky only in index
				$sticky = is_sticky() && ! is_archive() ?
					'<span class="genericon genericon-pinned genericon-reset"></span>' :
					'';

				$title = ( '' === $title ) ? __( '(No Title)', 'biwako' ) : $title;
				echo '<h2 class="entry-title text-center"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $title . '</a></h2>';
			}
		?>

	</header><!-- .entry-header -->

	<?php if ( is_single() ): ?>

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'biwako' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="sr-only">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links text-center">' . esc_html__( 'Pages:', 'biwako' ),
					'after'  => '</div>'
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php biwako_entry_footer(); ?>
		</footer><!-- .entry-footer -->

	<?php endif; ?>


</article><!-- #post-## -->
