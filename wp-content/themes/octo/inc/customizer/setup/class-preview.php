<?php
/**
 * Preview class.
 *
 * This class handles the customizer preview.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\setup;

use octo\core\Options;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class handles the customizer preview.
 *
 * @since 1.0.0
 */
class Preview {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0n
	 */
	public function init() {
		add_action( 'customize_preview_init', array( $this, 'preview_init' ) );
	}

	/**
	 * Refresh the theme options on customizer preview init.
	 *
	 * @since 1.0.0
	 */
	public function preview_init() {
		Options::refresh();
	}

}
