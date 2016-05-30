<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package birder
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					$post_num = $wp_query->found_posts;
					$post_num_text = sprintf(
						_n( '%d post', '%d posts', $post_num, 'birder' ),
						$wp_query->found_posts
					);
					the_archive_title( '<h1 class="page-title text-center">', '<span class="archived-posts-num">' . $post_num_text . '</small></h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			endwhile;

			the_post_navigation( array(
				'prev_text' => '<span class="glyphicon glyphicon-chevron-left"></span>' . __( 'Older posts', 'birder' ),
				'next_text' => __( 'Newer posts', 'birder' ) . '<span class="glyphicon glyphicon-chevron-right"></span>'
			) );

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
