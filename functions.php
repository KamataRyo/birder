<?php
/**
 * birder functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package birder
 */

/**
 * custom waler to apply nav_menu to Bootstrap
 */
require_once get_template_directory() . '/vender/twittem/wp_bootstrap_navwalker/wp_bootstrap_navwalker.php';

if ( ! function_exists( 'birder_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function birder_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on birder, use a find and replace
	 * to change 'birder' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'birder', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	 */
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'header' => __( 'Main menu on header', 'birder' ),
		'footer' => __( 'Sub menu on footer', 'birder' ),
		'SNS_on_profile' => __( 'SNS list on profile section', 'birder' ),
		'SNS_on_footer'  => __( 'SNS list on footer section', 'birder' ),
	) );

	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
		'gallery',
		'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See https://developer.wordpress.org/themes/functionality/post-formats/
	 */
	add_theme_support( 'post-formats', array(
		'aside',
		'image',
		'video',
		'quote',
		'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'birder_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'birder_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function birder_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'birder_content_width', 640 );
}
add_action( 'after_setup_theme', 'birder_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function birder_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Widget Area', 'birder' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'birder' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'birder_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function birder_scripts() {
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/js/lib/Honoka/dist/css/bootstrap.min.css' );

	wp_enqueue_script( 'bootstrap.js', get_template_directory_uri() . '/js/lib/bootstrap/dist/js/bootstrap.min.js', array(), '', true );

	wp_enqueue_script( 'bootstrap.modal', get_template_directory_uri() . '/js/lib/bootstrap/js/modal.js', array( 'bootstrap.js' ), '', true );

	wp_enqueue_style( 'genericons', get_template_directory_uri() . '/js/lib/genericons/genericons.css', array(), '3.4.1' );

	wp_enqueue_style( 'birder-style', get_stylesheet_uri(), array( 'bootstrap' ) );

	wp_enqueue_script( 'birder-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'birder_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';
