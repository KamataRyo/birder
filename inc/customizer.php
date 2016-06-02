<?php
/**
 * biwako Theme Customizer.
 *
 * @package biwako
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function biwako_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}
add_action( 'customize_register', 'biwako_customize_register' );

/**
 * Add other customizing terms.
 */
function biwako_customize_register_general( $wp_customize ) {

	$wp_customize->add_section(
		'privacy_settings',
		array(
			'title'    => __( 'Privacy Settings', 'biwako' ),
			'priority' => 0,
		)
	);

	$users = get_users( array( 'fields' => array( 'ID', 'display_name' ) ) );
	$default = $users[0]->ID;
	$choices = array( -1 => __('- No Display -', 'biwako' ) );
	foreach ( $users as $user ) {
		$choices[$user->ID] = $user->display_name;
	}
	$wp_customize->add_setting( 'display_profile_at_footer', array( 'default' => $default ) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'display_profile_at_footer',
			array(
				'label'       => __( 'Representative at footer', 'biwako' ),
				'description' => __( 'This term determines whose profile to display on footer as representative. You may also need to update menus and to alter the SNS links for new one.', 'biwako' ),
				'section'     => 'privacy_settings',
				'settings'    => 'display_profile_at_footer',
				'type'        => 'select',
				'choices'     => $choices,
			)
		)
	);

	$wp_customize->add_setting( 'display_author_on_posts', array( 'default' => '1' ) );
	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'display_author_on_posts',
			array(
				'label'       => __( "Display post's author", 'biwako' ),
				'description' => __( 'This term determines whether display authors name on post header or not.', 'biwako' ),
				'section'     => 'privacy_settings',
				'settings'    => 'display_author_on_posts',
				'type'        => 'radio',
				'choices'     => array(
					'1' => _x( 'Yes', 'whether display author name on post or not', 'biwako' ),
					'0' => _x( 'No', 'whether display author name on post or not', 'biwako' ),
				),
			)
		)
	);

	// Text Color
	$wp_customize->add_setting(
		'text_color',
		array(
			'default' => '#333',
			'transport'   => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'text_color',
			array(
				'label'    => __( "Text Color", 'biwako' ),
				'section'  => 'colors',
				'settings' => 'text_color',
			)
		)
	);

	// Link Color
	$wp_customize->add_setting(
		'link_color',
		array(
			'default' => '#21759b',
			'transport'   => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'link_color',
			array(
				'label'    => __( "Link Color", 'biwako' ),
				'section'  => 'colors',
				'settings' => 'link_color',
			)
		)
	);

	// Footer Background Color
	$wp_customize->add_setting(
		'footer_background_color',
		array(
			'default' => '#d4ecee',
			'transport'   => 'postMessage',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Color_Control(
			$wp_customize,
			'footer_background_color',
			array(
				'label'    => __( "Footer Background Color", 'biwako' ),
				'section'  => 'colors',
				'settings' => 'footer_background_color',
			)
		)
	);


}
add_action( 'customize_register', 'biwako_customize_register_general' );

function biwako_customize_css() {
	?>
		<style type="text/css">
			body,
			button,
			input,
			select,
			textarea,
			a.toggle-menu {
				color:<?php echo get_theme_mod( 'text_color', '#333' ); ?>
			}
			a {
				color:<?php echo get_theme_mod( 'link_color', '##21759b' ); ?>;
			}
			#secondary {
				background-color: <?php echo get_theme_mod( 'footer_background_color', '#d4ecee;' ); ?>;
			}
		</style>
	<?php
}
add_action( 'wp_head', 'biwako_customize_css');

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function biwako_customize_preview_js() {
	wp_enqueue_script( 'biwako_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'biwako_customize_preview_js' );
