<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package biwako
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<h1 class="page-title">
					<?php
						printf(
							esc_html__( 'Search Results for: %s', 'biwako' ),
							'<span>' . get_search_query() . '</span>' . biwako_get_current_posts_num_text()
						);
					?>
				</h1>
			</header><!-- .page-header -->

			<div id="articles" class="articles-container">
				<?php while ( have_posts() ) : the_post(); ?>
					<?php
					/**
					 * Run the loop for the search to output the results.
					 * If you want to overload this in a child theme then include a file
					 * called content-search.php and that will be used instead.
					 */
					get_template_part( 'template-parts/content', 'search' ); ?>
				<?php endwhile; ?>
			</div><!-- #articles -->

			<?php biwako_the_posts_navigation(); ?>

		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>

	</main><!-- #main -->
</div><!-- #primary -->

<?php
	get_sidebar();
	get_footer();
