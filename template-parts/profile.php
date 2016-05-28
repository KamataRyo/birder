<?php
/**
 * Template part for displaying profile.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package birder
 */

$id = get_the_author_meta( 'ID' );
?>
<aside>
    <h2 class="text-center"><?php echo __('Profile', 'birder'); ?></h2>
    <p class="text-center"><?php echo get_avatar( $id ); ?><p>
    <p class="text-center">
        <a href="<?php echo get_author_posts_url( $id ); ?>">
            <?php the_author_meta( 'user_nicename', $id ); ?>
        </a>
    </p>
    <p class="text-center">
        <?php
            wp_nav_menu( array(
                'theme_location' => 'SNS',
                'menu_id'         => 'SNS-list',
                'container_class' => 'menu-sns-container text-center',
                'menu_class'      => 'SNS-list SNS-list_birder list-inline',
                'depth'           => 1,
                'link_before'     => '<span class="sr-only">',
				'link_after'      => '</span>',
            ) );
        ?>
    </p>
    <p><?php the_author_meta( 'description', $id ); ?><p>
</aside>
