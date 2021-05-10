<?php
/**
 * Typography_Settings class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\settings;

use octo\core\Options;
use octo\customizer\controls\typography\Typography_Control;
use octo\customizer\controls\range\Range_Control;
use octo\customizer\controls\separator\Separator_Control;
use WP_Customize_Color_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class sets up the settings and controls for typography.
 *
 * @since 1.0.0
 */
class Typography_Settings {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'octo_section_typography_text' ) );
		add_action( 'customize_register', array( $this, 'octo_section_typography_headings' ) );
	}

	/**
	 * Register text settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function octo_section_typography_text( $wp_customize ) {

		$section = 'octo_section_typography_text';

		/*
		 * Text typography.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_font_family]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_font_family' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'font' ),
			)
		);

		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_font_variant]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_font_variant' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'font' ),
			)
		);

		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				THEME_SETTINGS . '[body_typograhpy]',
				array(
					'label'             => __( 'Body', 'octo' ),
					'family_subtitle'   => __( 'Font-Family', 'octo' ),
					'variants_subtitle' => __( 'Variants', 'octo' ),
					'settings'          => array(
						'family'  => THEME_SETTINGS . '[body_font_family]',
						'variant' => THEME_SETTINGS . '[body_font_variant]',
					),
					'section'           => $section,
				)
			)
		);

		/*
		 * Body font size.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_font_size_desktop]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_font_size_desktop' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_font_size_tablet]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_font_size_tablet' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_font_size_mobile]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_font_size_mobile' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS .
				'[body_font_size]',
				array(
					'description' => __( 'Font Size', 'octo' ),
					'settings'    => array(
						'desktop' => THEME_SETTINGS . '[body_font_size_desktop]',
						'tablet'  => THEME_SETTINGS . '[body_font_size_tablet]',
						'mobile'  => THEME_SETTINGS . '[body_font_size_mobile]',
					),
					'section'     => $section,
					'input_attrs' => array(
						'px'  => array(
							'min'  => '0',
							'max'  => '32',
							'step' => '1',
						),
						'%'   => array(
							'min'  => '0',
							'max'  => '200',
							'step' => '1',
						),
						'em'  => array(
							'min'  => '0',
							'max'  => '2',
							'step' => '0.05',
						),
						'rem' => array(
							'min'  => '0',
							'max'  => '2',
							'step' => '0.05',
						),
					),
					'units'       => array(
						'px',
						'%',
						'em',
						'rem',
					),
					'responsive'  => true,
				)
			)
		);

		/*
		 * Body line height.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_line_height]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_line_height' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'float' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[body_line_height]',
				array(
					'description' => __( 'Line Height', 'octo' ),
					'setting'     => THEME_SETTINGS . '[body_line_height]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '5',
						'step' => '0.05',
					),
				)
			)
		);

		/*
		 * Body text transform.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_text_transform]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_text_transform' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[body_text_transform]',
			array(
				'type'        => 'select',
				'description' => __( 'Text Transform', 'octo' ),
				'setting'     => THEME_SETTINGS . '[body_text_transform]',
				'section'     => $section,
				'choices'     => array(
					''           => __( 'Default', 'octo' ),
					'none'       => __( 'None', 'octo' ),
					'capitalize' => __( 'Capitalize', 'octo' ),
					'lowercase'  => __( 'Lowercase', 'octo' ),
					'uppercase'  => __( 'Uppercase', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_body_text_transform',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_body_text_transform',
				array(
					'setting' => 'separator_body_text_transform',
					'section' => $section,
				)
			)
		);

		/*
		 * Body font-color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_font_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_font_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[body_font_color]',
				array(
					'label'   => __( 'Font Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[body_font_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Body link color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_link_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_link_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[body_link_color]',
				array(
					'label'   => __( 'Link Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[body_link_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Body link color hover.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_link_color_hover]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_link_color_hover' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[body_link_color_hover]',
				array(
					'label'   => __( 'Link Color Hover', 'octo' ),
					'setting' => THEME_SETTINGS . '[body_link_color_hover]',
					'section' => $section,
				)
			)
		);

	}

	/**
	 * Register heading settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function octo_section_typography_headings( $wp_customize ) {

		$section = 'octo_section_typography_headings';

		/*
		 * Heading typography.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[headings_font_family]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'headings_font_family' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'font' ),
			)
		);

		$wp_customize->add_setting(
			THEME_SETTINGS . '[headings_font_variant]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'headings_font_variant' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'font' ),
			)
		);

		$wp_customize->add_control(
			new Typography_Control(
				$wp_customize,
				THEME_SETTINGS . '[headings_typograhpy]',
				array(
					'label'             => __( 'Headings', 'octo' ),
					'family_subtitle'   => __( 'Font-Family', 'octo' ),
					'variants_subtitle' => __( 'Variants', 'octo' ),
					'settings'          => array(
						'family'  => THEME_SETTINGS . '[headings_font_family]',
						'variant' => THEME_SETTINGS . '[headings_font_variant]',
					),
					'section'           => $section,
				)
			)
		);

		/*
		 * Heading line height.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[headings_line_height]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'headings_line_height' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'float' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[headings_line_height]',
				array(
					'description' => __( 'Line Height', 'octo' ),
					'setting'     => THEME_SETTINGS . '[headings_line_height]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '5',
						'step' => '0.05',
					),
				)
			)
		);

		/*
		 * Heading text transform.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[headings_text_transform]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'headings_text_transform' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[headings_text_transform]',
			array(
				'type'        => 'select',
				'description' => __( 'Text Transform', 'octo' ),
				'setting'     => THEME_SETTINGS . '[headings_text_transform]',
				'section'     => $section,
				'choices'     => array(
					''           => __( 'Default', 'octo' ),
					'none'       => __( 'None', 'octo' ),
					'capitalize' => __( 'Capitalize', 'octo' ),
					'lowercase'  => __( 'Lowercase', 'octo' ),
					'uppercase'  => __( 'Uppercase', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_headings_text_transform',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_headings_text_transform',
				array(
					'setting' => 'separator_headings_text_transform',
					'section' => $section,
				)
			)
		);

		/*
		 * Heading font-color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[headings_font_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'headings_font_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[headings_font_color]',
				array(
					'label'   => __( 'Font Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[headings_font_color]',
					'section' => $section,
				)
			)
		);

	}

}
