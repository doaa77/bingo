<?php
/**
 * Section class.
 *
 * @package octo
 * @since 1.0.0
 */

namespace octo\customizer\settings;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class registers all necessary sections for the theme.
 *
 * @since 1.0.0
 */
class Section {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'register_sections' ) );
	}

	/**
	 * Register sections for customizer settings.
	 *
	 * @param Object $wp_customize WP_Customize object.
	 * @since 1.0.0
	 */
	public static function register_sections( $wp_customize ) {

		$sections = array(
			'octo_section_general_container'    => array(
				'title' => __( 'Container', 'octo' ),
				'panel' => 'octo_panel_general',
			),
			'octo_section_general_sidebar'      => array(
				'title' => __( 'Sidebar', 'octo' ),
				'panel' => 'octo_panel_general',
			),
			'octo_section_general_buttons'      => array(
				'title' => __( 'Buttons', 'octo' ),
				'panel' => 'octo_panel_general',
			),
			'octo_section_general_breadcrumbs'  => array(
				'title' => __( 'Breadcrumbs', 'octo' ),
				'panel' => 'octo_panel_general',
			),
			'octo_section_general_responsive'   => array(
				'title' => __( 'Responsive', 'octo' ),
				'panel' => 'octo_panel_general',
			),
			'octo_section_header_site_identity' => array(
				'title' => __( 'Site Identity', 'octo' ),
				'panel' => 'octo_panel_header',
			),
			'octo_section_header_layout'        => array(
				'title' => __( 'Layout', 'octo' ),
				'panel' => 'octo_panel_header',
			),
			'octo_section_header_navigation'    => array(
				'title' => __( 'Navigation', 'octo' ),
				'panel' => 'octo_panel_header',
			),
			'octo_section_footer_widget_areas'  => array(
				'title' => __( 'Widget Areas', 'octo' ),
				'panel' => 'octo_panel_footer',
			),
			'octo_section_content_archive'      => array(
				'title' => __( 'Blog/Archive', 'octo' ),
				'panel' => 'octo_panel_content',
			),
			'octo_section_content_single'       => array(
				'title' => __( 'Single Post', 'octo' ),
				'panel' => 'octo_panel_content',
			),
			'octo_section_typography_text'      => array(
				'title' => __( 'Text', 'octo' ),
				'panel' => 'octo_panel_typography',
			),
			'octo_section_typography_headings'  => array(
				'title' => __( 'Headings', 'octo' ),
				'panel' => 'octo_panel_typography',
			),
		);

		foreach ( $sections as $section => $args ) {

			$wp_customize->add_section(
				$section,
				array(
					'title' => $args['title'],
					'panel' => $args['panel'],
				)
			);

		}

	}

}
