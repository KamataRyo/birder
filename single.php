<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package biwako
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">

		<div id="articles" class="articles-container">
		<?php
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/content', get_post_format() );

				biwako_the_post_navigation();

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			}
		?>
		</div><!-- #articles -->


	</main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
