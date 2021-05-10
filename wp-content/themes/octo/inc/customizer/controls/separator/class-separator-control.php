<?php
/**
 * Separator_Control class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\controls\separator;

use WP_Customize_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class creates a separator control.
 * This control just displays a <hr> html tag.
 *
 * @since 1.0.0
 */
class Separator_Control extends WP_Customize_Control {

	/**
	 * Type.
	 *
	 * @var string
	 */
	public $type = 'octo-separator';

	/**
	 * Enqueue scripts/styles for the range slider.
	 *
	 * @since 1.0.0
	 */
	public function enqueue() {
		wp_enqueue_style( 'octo-separator-control', get_template_directory_uri() . '/inc/customizer/controls/separator/separator-control.css', array(), THEME_VERSION, 'all' );
	}

	/**
	 * Render a JS template for the content of the color picker control.
	 *
	 * @since 1.0.0
	 */
	public function content_template() {
		?>
		<hr>              
		<?php
	}

}
