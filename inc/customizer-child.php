<?php
/**
 * Builds our Customizer Extra Child Theme Controls.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
add_action( 'customize_register', 'child_generate_set_customizer_helpers', 1 );
/**
 * Set up helpers early so they're always available.
 * Other modules might need access to them at some point.
 *
 * @since 2.0
 */
function child_generate_set_customizer_helpers() {
	require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';
}

if ( ! function_exists( 'child_generate_customize_register' ) ) {
	add_action( 'customize_register', 'child_generate_customize_register' );
	/**
	 * Add our base options to the Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 */
	function child_generate_customize_register( $wp_customize ) {
		$defaults = generate_get_defaults();
		require_once trailingslashit( get_template_directory() ) . 'inc/customizer/customizer-helpers.php';

		$wp_customize->add_section(
			'common_section',
			array(
				'title' => $wp_customize->get_panel( 'generate_colors_panel' ) ? __( 'Common', 'generatepress' ) : __( 'Colors', 'generatepress' ),
				'capability' => 'edit_theme_options',
				'priority' => 30,
				'panel' => $wp_customize->get_panel( 'generate_colors_panel' ) ? 'generate_colors_panel' : false,
			)
		);


		$wp_customize->add_setting(
			'generate_settings[common_primary_color]',
			array(
				'default' => $defaults['common_primary_color'],
				'type' => 'option',
				'sanitize_callback' => 'generate_sanitize_hex_color',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'generate_settings[common_primary_color]',
				array(
					'label' => __( 'Primary Color', 'generatepress' ),
					'section' => 'common_section',
					'settings' => 'generate_settings[common_primary_color]',
				)
			)
		);


		$wp_customize->add_setting(
			'generate_settings[common_secondary_color]',
			array(
				'default' => $defaults['common_secondary_color'],
				'type' => 'option',
				'sanitize_callback' => 'generate_sanitize_hex_color',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'generate_settings[common_secondary_color]',
				array(
					'label' => __( 'Secondary Color', 'generatepress' ),
					'section' => 'common_section',
					'settings' => 'generate_settings[common_secondary_color]',
				)
			)
		);


		$wp_customize->add_setting(
			'generate_settings[common_text_color]',
			array(
				'default' => $defaults['common_text_color'],
				'type' => 'option',
				'sanitize_callback' => 'generate_sanitize_hex_color',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'generate_settings[common_text_color]',
				array(
					'label' => __( 'Text Color', 'generatepress' ),
					'section' => 'common_section',
					'settings' => 'generate_settings[common_text_color]',
				)
			)
		);




		$wp_customize->add_setting(
			'generate_settings[common_button_color]',
			array(
				'default' => $defaults['common_button_color'],
				'type' => 'option',
				'sanitize_callback' => 'generate_sanitize_hex_color',
				'transport' => 'refresh',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				'generate_settings[common_button_color]',
				array(
					'label' => __( 'Button Color', 'generatepress' ),
					'section' => 'common_section',
					'settings' => 'generate_settings[common_button_color]',
				)
			)
		);

	}
}