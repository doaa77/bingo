<?php
/**
 * Footer_Settings class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\settings;

use octo\core\Options;
use octo\customizer\controls\separator\Separator_Control;
use WP_Customize_Color_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class sets up the settings and controls for the footer.
 *
 * @since 1.0.0
 */
class Footer_Settings {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'octo_section_footer_widget_areas' ) );
	}

	/**
	 * Register widget area settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function octo_section_footer_widget_areas( $wp_customize ) {

		$section = 'octo_section_footer_widget_areas';

		/*
		 * Footer widget areas.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[footer_widget_areas]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'footer_widget_areas' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[footer_widget_areas]',
			array(
				'type'    => 'select',
				'label'   => __( 'Widget Areas', 'octo' ),
				'setting' => THEME_SETTINGS . '[footer_widget_areas]',
				'section' => $section,
				'choices' => array(
					'0' => __( 'Disabled', 'octo' ),
					'1' => __( '1', 'octo' ),
					'2' => __( '2', 'octo' ),
					'3' => __( '3', 'octo' ),
					'4' => __( '4', 'octo' ),
					'5' => __( '5', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_footer_widget_areas',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_footer_widget_areas',
				array(
					'setting' => 'separator_footer_widget_areas',
					'section' => $section,
				)
			)
		);

		/*
		 * Footer width.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[footer_width]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'footer_width' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[footer_width]',
			array(
				'type'    => 'radio',
				'label'   => __( 'Width', 'octo' ),
				'setting' => THEME_SETTINGS . '[footer_width]',
				'section' => $section,
				'choices' => array(
					'full'    => __( 'Full Width', 'octo' ),
					'content' => __( 'Content Width', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_footer_width',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_footer_width',
				array(
					'setting' => 'separator_footer_width',
					'section' => $section,
				)
			)
		);

		/*
		 * Footer background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[footer_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'footer_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[footer_background_color]',
				array(
					'label'   => __( 'Background Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[footer_background_color]',
					'section' => $section,
				)
			)
		);

	}
}
