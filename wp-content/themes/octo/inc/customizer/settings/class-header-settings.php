<?php
/**
 * Header_Settings class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\settings;

use octo\core\Options;
use octo\customizer\controls\range\Range_Control;
use octo\customizer\controls\separator\Separator_Control;
use WP_Customize_Color_Control;
use WP_Customize_Image_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class sets up the settings and controls for the header.
 *
 * @since 1.0.0
 */
class Header_Settings {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'register_settings_header_site_identity' ) );
		add_action( 'customize_register', array( $this, 'register_settings_header_layout' ) );
		add_action( 'customize_register', array( $this, 'register_settings_header_navigation' ) );
	}

	/**
	 * Register layout settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_header_layout( $wp_customize ) {

		$section = 'octo_section_header_layout';

		/*
		 * Header layout.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[header_layout]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'header_layout' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[header_layout]',
			array(
				'type'    => 'select',
				'label'   => __( 'Layout', 'octo' ),
				'setting' => THEME_SETTINGS . '[header_layout]',
				'section' => $section,
				'choices' => array(
					'nav_inline' => __( 'Navigation Inline', 'octo' ),
					'nav_top'    => __( 'Navigation Top', 'octo' ),
					'nav_bottom' => __( 'Navigation Bottom', 'octo' ),
				),
			)
		);

		/*
		 * Header width.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[header_width]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'header_width' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[header_width]',
			array(
				'type'    => 'radio',
				'label'   => __( 'Width', 'octo' ),
				'setting' => THEME_SETTINGS . '[header_width]',
				'section' => $section,
				'choices' => array(
					'full'    => __( 'Full Width', 'octo' ),
					'content' => __( 'Content Width', 'octo' ),
				),
			)
		);

		/*
		 * Header alignment.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[header_alignment]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'header_alignment' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[header_alignment]',
			array(
				'type'            => 'radio',
				'label'           => __( 'Alignment', 'octo' ),
				'setting'         => THEME_SETTINGS . '[header_alignment]',
				'section'         => $section,
				'choices'         => array(
					'left'   => __( 'Left', 'octo' ),
					'center' => __( 'Center', 'octo' ),
					'right'  => __( 'Right', 'octo' ),
				),
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_header_layout_nav_top_or_nav_bottom' ),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_header_alignment',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_header_alignment',
				array(
					'setting' => 'separator_header_alignment',
					'section' => $section,
				)
			)
		);

		/*
		 * Header background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[header_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'header_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[header_background_color]',
				array(
					'label'   => __( 'Background Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[header_background_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_header_background_color',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_header_background_color',
				array(
					'setting' => 'separator_header_background_color',
					'section' => $section,
				)
			)
		);

		/*
		 * Header seperator height.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[header_separator_height]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'header_separator_height' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[header_separator_height]',
				array(
					'label'       => __( 'Border Bottom Height', 'octo' ),
					'setting'     => THEME_SETTINGS . '[header_separator_height]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '50',
						'step' => '1',
					),
				)
			)
		);

		/*
		 * Header seperator color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[header_separator_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'header_separator_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[header_separator_color]',
				array(
					'label'   => __( 'Border Bottom Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[header_separator_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_header_separator_color',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_header_separator_color',
				array(
					'setting' => 'separator_header_separator_color',
					'section' => $section,
				)
			)
		);

		/*
		 * Header enable widget area.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[header_enable_widgets]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'header_enable_widgets' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[header_enable_widgets]',
			array(
				'type'    => 'select',
				'label'   => __( 'Enable Widget Area', 'octo' ),
				'setting' => THEME_SETTINGS . '[header_enable_widgets]',
				'section' => $section,
				'choices' => array(
					'disabled' => __( 'Disabled', 'octo' ),
					'all'      => __( 'Show an all Devices', 'octo' ),
					'small'    => __( 'Show on Big and Medium Devices', 'octo' ),
					'medium'   => __( 'Show on Big Devices only', 'octo' ),
				),
			)
		);

	}

	/**
	 * Register navigation settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_header_navigation( $wp_customize ) {

		$section = 'octo_section_header_navigation';

		/*
		 * Menu item padding.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[menu_item_padding]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'menu_item_padding' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[menu_item_padding]',
				array(
					'label'       => __( 'Menu Item Padding', 'octo' ),
					'setting'     => THEME_SETTINGS . '[menu_item_padding]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '50',
						'step' => '1',
					),
				)
			)
		);

		/*
		 * Menu item line height.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[menu_item_line_height]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'menu_item_line_height' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[menu_item_line_height]',
				array(
					'label'       => __( 'Menu Item Line Height', 'octo' ),
					'setting'     => THEME_SETTINGS . '[menu_item_line_height]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '200',
						'step' => '1',
					),
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_menu_item_line_height',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_menu_item_line_height',
				array(
					'setting' => 'separator_menu_item_line_height',
					'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_header_layout_nav_top_or_nav_bottom' ),
					'section' => $section,
				)
			)
		);

		/*
		 * Navigation alignment.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[nav_alignment]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'nav_alignment' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[nav_alignment]',
			array(
				'type'            => 'radio',
				'label'           => __( 'Alignment', 'octo' ),
				'setting'         => THEME_SETTINGS . '[nav_alignment]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_header_layout_nav_top_or_nav_bottom' ),
				'choices'         => array(
					'left'   => __( 'Left', 'octo' ),
					'center' => __( 'Center', 'octo' ),
					'right'  => __( 'Right', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_nav_alignment',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_nav_alignment',
				array(
					'setting' => 'separator_nav_alignment',
					'section' => $section,
				)
			)
		);

		/*
		 * Menu background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[menu_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'menu_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[menu_background_color]',
				array(
					'label'   => __( 'Menu Background Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[menu_background_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Submenu background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[submenu_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'submenu_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[submenu_background_color]',
				array(
					'label'   => __( 'Submenu Background Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[submenu_background_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_submenu_background_color',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_submenu_background_color',
				array(
					'setting' => 'separator_submenu_background_color',
					'section' => $section,
				)
			)
		);

		/*
		 * Navigation dropdown click.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[menu_item_dropdown]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'menu_item_dropdown' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[menu_item_dropdown]',
			array(
				'type'    => 'select',
				'label'   => __( 'Menu Item Dropdown', 'octo' ),
				'setting' => THEME_SETTINGS . '[menu_item_dropdown]',
				'section' => $section,
				'choices' => array(
					'hover'      => __( 'Hover', 'octo' ),
					'click_icon' => __( 'Click Icon', 'octo' ),
					'click_item' => __( 'Click Menu Item', 'octo' ),
				),
			)
		);

		/*
		 * Menu enable widget area.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[menu_enable_widgets]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'menu_enable_widgets' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[menu_enable_widgets]',
			array(
				'type'    => 'select',
				'label'   => __( 'Enable Widget Area', 'octo' ),
				'setting' => THEME_SETTINGS . '[menu_enable_widgets]',
				'section' => $section,
				'choices' => array(
					'disabled' => __( 'Disabled', 'octo' ),
					'all'      => __( 'Show an all Devices', 'octo' ),
					'small'    => __( 'Show on Big and Medium Devices', 'octo' ),
					'medium'   => __( 'Show on Big Devices only', 'octo' ),
				),
			)
		);

		/*
		 * Mobile menu breakpoint.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[mobile_menu_breakpoint]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'mobile_menu_breakpoint' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[mobile_menu_breakpoint]',
			array(
				'type'    => 'select',
				'label'   => __( 'Mobile Menu Breakpoint', 'octo' ),
				'setting' => THEME_SETTINGS . '[mobile_menu_breakpoint]',
				'section' => $section,
				'choices' => array(
					'small'  => __( 'Small Device', 'octo' ),
					'medium' => __( 'Medium Device', 'octo' ),
				),
			)
		);

		/*
		 * Mobile menu text.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[toggle_button_text]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'toggle_button_text' ),
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[toggle_button_text]',
			array(
				'type'    => 'text',
				'label'   => __( 'Mobile Menu Text', 'octo' ),
				'setting' => THEME_SETTINGS . '[toggle_button_text]',
				'section' => $section,
			)
		);

	}

	/**
	 * Register layout settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_header_site_identity( $wp_customize ) {

		$section = 'octo_section_header_site_identity';

		/*
		 * Custom logo.
		 */
		$wp_customize->get_setting( 'custom_logo' )->transport = 'refresh';
		$custom_logo          = $wp_customize->get_control( 'custom_logo' );
		$custom_logo->section = $section;

		/*
		 * Custom logo width.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[logo_width_desktop]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'logo_width_desktop' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_setting(
			THEME_SETTINGS . '[logo_width_tablet]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'logo_width_tablet' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_setting(
			THEME_SETTINGS . '[logo_width_mobile]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'logo_width_mobile' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[logo_width]',
				array(
					'label'           => __( 'Logo Max Width', 'octo' ),
					'settings'        => array(
						'desktop' => THEME_SETTINGS . '[logo_width_desktop]',
						'tablet'  => THEME_SETTINGS . '[logo_width_tablet]',
						'mobile'  => THEME_SETTINGS . '[logo_width_mobile]',
					),
					'section'         => $section,
					'input_attrs'     => array(
						'min'  => '0',
						'max'  => '500',
						'step' => '1',
					),
					'responsive'      => true,
					'active_callback' => 'has_custom_logo',
				)
			)
		);

		/*
		 * Custom mobile logo width.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[mobile_logo]',
			array(
				'type'              => 'option',
				'default'           => '',
				'sanitize_callback' => 'esc_url_raw',
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				THEME_SETTINGS . '[mobile_logo]',
				array(
					'label'           => 'Mobile Logo',
					'section'         => $section,
					'settings'        => THEME_SETTINGS . '[mobile_logo]',
					'button_labels'   => array(
						'remove' => __( 'Remove', 'octo' ),
						'change' => __( 'Change logo', 'octo' ),
					),
					'active_callback' => 'has_custom_logo',
				)
			)
		);

		$wp_customize->add_setting(
			THEME_SETTINGS . '[mobile_logo_width]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'mobile_logo_width' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[mobile_logo_width]',
				array(
					'label'           => __( 'Mobile Logo Max Width', 'octo' ),
					'setting'         => THEME_SETTINGS . '[mobile_logo_width]',
					'section'         => $section,
					'input_attrs'     => array(
						'min'  => '0',
						'max'  => '500',
						'step' => '1',
					),
					'active_callback' => 'has_custom_logo',
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_mobile_logo_width',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_mobile_logo_width',
				array(
					'setting' => 'separator_mobile_logo_width',
					'section' => $section,
				)
			)
		);

		/*
		 * Site title.
		 */
		$title           = $wp_customize->get_control( 'blogname' );
		$title->section  = $section;
		$title->priority = 20;

		/*
		 * Site tagline.
		 */
		$tagline           = $wp_customize->get_control( 'blogdescription' );
		$tagline->section  = $section;
		$tagline->priority = 20;

		$wp_customize->remove_control( 'display_header_text' );

		/*
		 * Display description.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[display_description]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'display_description' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[display_description]',
			array(
				'type'     => 'checkbox',
				'label'    => __( 'Display tagline', 'octo' ),
				'setting'  => THEME_SETTINGS . '[display_description]',
				'section'  => $section,
				'priority' => 20,
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_display_description',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_display_description',
				array(
					'setting'  => 'separator_display_description',
					'section'  => $section,
					'priority' => 20,
				)
			)
		);

		/*
		 * Site icon.
		 */
		$site_icon          = $wp_customize->get_control( 'site_icon' );
		$site_icon->section = $section;

	}

}
