<?php
/**
 * Register class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\setup;

use WP_Customize_Image_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class registers different customizer settings and options.
 *
 * @since 1.0.0
 */
class Register {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'partial_refresh' ) );
		add_action( 'customize_register', array( $this, 'register_custom_controls' ) );
	}

	/**
	 * Add postMessage support for site title and description for the Theme Customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public function partial_refresh( $wp_customize ) {
		$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

		if ( isset( $wp_customize->selective_refresh ) ) {
			$wp_customize->selective_refresh->add_partial(
				'blogname',
				array(
					'selector'        => '.site-title a',
					'render_callback' => array( $this, 'customize_partial_blogname' ),
				)
			);
			$wp_customize->selective_refresh->add_partial(
				'blogdescription',
				array(
					'selector'        => '.site-description',
					'render_callback' => array( $this, 'customize_partial_blogdescription' ),
				)
			);
		}

	}

	/**
	 * Register custom controls for the theme customizer.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_custom_controls( $wp_customize ) {

		// Register JS control types.
		$wp_customize->register_control_type( 'octo\customizer\controls\range\Range_Control' );
		$wp_customize->register_control_type( 'octo\customizer\controls\sortable\Sortable_Control' );
		$wp_customize->register_control_type( 'octo\customizer\controls\typography\Typography_Control' );
		$wp_customize->register_control_type( 'octo\customizer\controls\separator\Separator_Control' );

	}

	/**
	 * Render the site title for the selective refresh partial.
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function customize_partial_blogname() {
		bloginfo( 'name' );
	}

	/**
	 * Render the site tagline for the selective refresh partial.
	 *
	 * @return void
	 *
	 * @since 1.0.0
	 */
	public function customize_partial_blogdescription() {
		bloginfo( 'description' );
	}

}

