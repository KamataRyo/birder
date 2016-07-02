<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package biwako
 */
get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title(
						'<h1 class="page-title text-center">',
						biwako_get_current_posts_num_text() . '</h1>'
					);
					the_archive_description(
						'<div class="taxonomy-description">',
						'</div>'
					);
				?>
			</header><!-- .page-header -->

			<div id="articles" class="articles-container">
				<?php
					while ( have_posts() ) : the_post();
						/*
						 * Include the Post-Format-specific template for the content.
						 * If you want to override this in a child theme, then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */
						get_template_part( 'template-parts/content', get_post_format() );
					endwhile;
				?>
			</div><!-- #articles -->
			<?php biwako_the_posts_navigation(); ?>

		<?php else :  ?>
			<?php get_template_part( 'template-parts/content', 'none' );  ?>
		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
	get_sidebar();
	get_footer();
