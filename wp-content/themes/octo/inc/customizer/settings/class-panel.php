<?php
/**
 * Panels class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class registers all necessary panels for the theme.
 *
 * @since   1.0.0
 */
class Panel {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'register_panels' ) );
	}

	/**
	 * Register panels for customizer settings.
	 *
	 * @param Object $wp_customize WP_Customize object.
	 * @since 1.0.0
	 */
	public static function register_panels( $wp_customize ) {

		$panels = array(
			'octo_panel_general'    => array(
				'title'    => __( 'General', 'octo' ),
				'priority' => 100,
			),
			'octo_panel_header'     => array(
				'title'    => __( 'Header', 'octo' ),
				'priority' => 100,
			),
			'octo_panel_content'    => array(
				'title'    => __( 'Content', 'octo' ),
				'priority' => 100,
			),
			'octo_panel_footer'     => array(
				'title'    => __( 'Footer', 'octo' ),
				'priority' => 100,
			),
			'octo_panel_typography' => array(
				'title'    => __( 'Typography', 'octo' ),
				'priority' => 100,
			),
		);

		foreach ( $panels as $panel => $args ) {

			$wp_customize->add_panel(
				$panel,
				array(
					'title'    => $args['title'],
					'priority' => $args['priority'],
				)
			);

		}

	}

}
