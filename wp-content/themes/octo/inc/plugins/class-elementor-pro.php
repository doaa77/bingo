<?php
/**
 * Elemntor_Pro class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\plugins;

use ElementorPro\Modules\ThemeBuilder\Module;
use octo\core\Components;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class ensures compatibility with Elementor Pro plugin.
 *
 * @since 1.0.0
 */
class Elementor_PRO {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		if ( class_exists( '\Elementor\Plugin' ) && class_exists( 'ElementorPro\Modules\ThemeBuilder\Module' ) ) {
			add_action( 'elementor/theme/register_locations', array( $this, 'register_locations' ) );
			add_action( 'octo_header', array( $this, 'do_header' ), 0 );
			add_action( 'octo_footer', array( $this, 'do_footer' ), 0 );
		}
	}

	/**
	 * Register Elementor locations.
	 *
	 * @param ElementorPro\Modules\ThemeBuilder\Module $elementor_theme_manager Elementor ThemeBuilder Module.
	 * @since 1.0.0
	 */
	public function register_locations( $elementor_theme_manager ) {

		// Register core locations.
		$elementor_theme_manager->register_core_location( 'header' );
		$elementor_theme_manager->register_core_location( 'footer' );

	}

	/**
	 * Ensure Elementor header support.
	 * Remove theme header from hook, if Elementor header template is used.
	 *
	 * @since 1.0.0
	 */
	public function do_header() {
		$did_location = Module::instance()->get_locations_manager()->do_location( 'header' );
		if ( $did_location ) {
			remove_action( 'octo_header', array( 'octo\core\Components', 'load_template_part_header' ) );
		}
	}

	/**
	 * Ensure Elementor footer support.
	 * Remove theme footer from hook, if Elementor footer template is used.
	 *
	 * @since 1.0.0
	 */
	public function do_footer() {
		$did_location = Module::instance()->get_locations_manager()->do_location( 'footer' );
		if ( $did_location ) {
			remove_action( 'octo_footer', array( 'octo\core\Components', 'load_template_part_footer' ) );
		}
	}

}
