<?php
/**
 * Enqueue class.

 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\setup;

use octo\core\Options;
use octo\core\Font_Families;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * Enqueue scripts and styles for the customizer.
 *
 * @since 1.0.0
 */
class Enqueue {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_customizer_scripts' ), 100 );
	}

	/**
	 * Enque scripts for customizer controls.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_customizer_scripts() {

		wp_enqueue_script( 'octo-customizer-controls', get_template_directory_uri() . '/assets/js/customizer-controls.js', array( 'jquery', 'customize-base' ), THEME_VERSION, true );
		wp_enqueue_style( 'octo-style-customizer', get_template_directory_uri() . '/assets/css/customizer.css', array(), THEME_VERSION, 'all' );

		wp_localize_script(
			'octo-typography-control',
			'octoTypography',
			array(
				'systemFonts' => Font_Families::get_system_fonts(),
				'googleFonts' => Font_Families::get_google_fonts(),
				'customFonts' => Font_Families::get_custom_fonts(),
			)
		);

	}

}
