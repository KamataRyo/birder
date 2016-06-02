<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package birder
 */

 if ( ! function_exists( 'birder_posted_on' ) ) :
function birder_get_current_posts_num_text() {
	global $wp_query;
	return '<span class="">' . sprintf(
		_n( '(%d post)', '(%d posts)', 2, 'birder' ),
		$wp_query->found_posts
	) . '</span>';
}
endif;


if ( ! function_exists( 'birder_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function birder_posted_on() {
	$time_string_format = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string_format = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="entry-date updated" datetime="%3$s">%4$s</time>';
	}

	// display posted-on on post
	echo '<span class="posted-on">' .
		'<span class="screen-reader-text">' . __( 'posting date', 'birder' ) . '</span>' .
        sprintf( $time_string_format,
    		esc_attr( get_the_date( 'c' ) ),
    		esc_html( get_the_date() ),
    		esc_attr( get_the_modified_date( 'c' ) ),
    		esc_html( get_the_modified_date() )
    	) .
	'</span>';

	// display author name on post
	if ( get_theme_mod( 'display_author_on_posts' ) ) {
		echo '<span class="posted-by">' .
			'<span class="screen-reader-text">' . __( 'post author', 'birder' ) . '</span>' .
				'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' .
					esc_html( get_the_author() ) .
				'</a>' .
		'</span>';
	}

	edit_post_link(
		sprintf(
			esc_html_x( 'Edit %s', 'post-edit-link', 'birder' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		),
		'<span class="edit-link">',
		'</span>'
	);
}
endif;


if ( ! function_exists( 'birder_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags,
 * other taxonomies by filter and comments.
 */
function birder_entry_footer() {
	if ( 'post' === get_post_type() ) {

		$tax_names = apply_filters(
			'birder_get_post_taxonomies',
			array( 'category', 'post_tag' )
		);

		// generate ul for each taxonomy
		foreach ( $tax_names as $tax_index => $tax_name ) {

			$taxonomy = get_taxonomy( $tax_name );
			$tax_label = $taxonomy->labels;
			$terms = get_the_terms( get_the_ID(), $tax_name );
			if ( ! $terms ) {
				continue;
			}
			$class_attr = implode( ' ', array(
				'taxonomy-list',
				"$tax_name-list",
				"$tax_name-list-position-" . ( $tax_index + 1 ),
				'list-inline'
			) );
			$output = '<ul class="' . esc_attr( $class_attr ) . '">';

			// generate li for each terms
			foreach ( $terms as $term_index => $term ) {

				$term_id = $term->term_id;
				$class_attr = implode( ' ', array(
					$tax_name . '-item-' . $term_id,
					$tax_name . '-item-position-' . ( $term_index + 1 ),
				) );
				$url_attr = get_term_link( $term_id, $tax_name );
				$output .= sprintf(
					'<li class="%1$s"><a href="%2$s">%3$s</a></li>',
					esc_attr( $class_attr ),
					esc_url( $url_attr ),
					$term->name
				);
			}
			$output .= '</ul>';

			if ( 0 < count( $terms ) ) {
				printf(
					'<dt class="%1$s-links">' .
						'<dl>%2$s</dl>' .
						'<dd>%3$s<dd>' .
					'</dt>',
					$tax_name,
					count( $terms ) > 1 ?
						$tax_label->name :
						$tax_label->singular_name,
					$output
				); // WPCS: XSS OK.
			}
		}
	}

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link">';
		/* translators: %s: post title */
		comments_popup_link( sprintf( wp_kses( __( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'birder' ), array( 'span' => array( 'class' => array() ) ) ), get_the_title() ) );
		echo '</span>';
	}
}
endif;


if ( ! function_exists( 'birder_the_posts_navigation' ) ) :
/**
 * Wrapper for the_post_navigation
 */
function birder_the_posts_navigation() {
	the_posts_navigation( array(
		'prev_text' => __( 'Older posts', 'birder' ),
		'next_text' => __( 'Newer posts', 'birder' )
	) );
}
endif;


if ( ! function_exists( 'birder_the_post_navigation' ) ) :
/**
 * Wrapper for the_post_navigation
 */
function birder_the_post_navigation() {
	the_post_navigation( array(
		'prev_text' => '%title',
		'next_text' => '%title'
	) );
}
endif;



if ( ! function_exists( 'birder_representative_profile' ) ) :
/**
 * Print representative's profile
 */
function birder_representative_profile( $id ) {
	?>
	<aside>
	    <h2 class="text-center"><?php echo __('Profile', 'birder'); ?></h2>
	    <p class="text-center"><?php echo get_avatar( $id ); ?><p>
	    <p class="text-center">
	        <a href="<?php echo get_author_posts_url( $id ); ?>">
	            <?php the_author_meta( 'display_name', $id ); ?>
	        </a>
	    </p>

		<?php if ( has_nav_menu( 'SNS_on_profile' ) ) : ?>
		    <nav id="representative-linklist" class="SNS-linklist">
		        <?php
		            wp_nav_menu( array(
		                'theme_location' => 'SNS_on_profile',
		                'menu_id'         => 'SNS-list',
		                'menu_class'      => 'SNS-list icon-links list-inline text-center',
		                'depth'           => 1,
		                'link_before'     => '<span class="screen-reader-text">',
						'link_after'      => '</span>',
		            ) );
		        ?>
		    </nav>
		<?php endif; ?>

	    <p><?php the_author_meta( 'description', $id ); ?><p>
	</aside>
	<?php
}
endif;

/**
 * Flush out the transients used in birder_categorized_blog.
 */
function birder_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'birder_categories' );
}
add_action( 'edit_category', 'birder_category_transient_flusher' );
add_action( 'save_post',     'birder_category_transient_flusher' );
