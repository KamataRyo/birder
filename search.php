<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package birder
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php if ( have_posts() ) : ?>
			<?php
				$post_num = $wp_query->found_posts;
				$post_num_text = sprintf(
					_n( '%d post', '%d posts', $post_num, 'birder' ),
					$wp_query->found_posts
				);
			?>

			<header class="page-header">
				<h1 class="page-title"><?php printf( esc_html__( 'Search Results for: %s', 'birder' ), '<span>' . get_search_query() . '</span><span class="archived-posts-num">' . $post_num_text . '</span>' ); ?></h1>
			</header><!-- .page-header -->

			<div id="articles" class="articles-container">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post();

				/**
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'template-parts/content', 'search' );

			endwhile;
			?>
			</div><!-- #articles -->
			<?php

			the_posts_navigation( array(
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
