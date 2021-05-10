<?php
/**
 * General_Settings class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\settings;

use octo\core\Options;
use octo\customizer\controls\range\Range_Control;
use octo\customizer\controls\separator\Separator_Control;
use WP_Customize_Color_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class sets up the general settings and controls.
 *
 * @since 1.0.0
 */
class General_Settings {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'register_settings_general_container' ) );
		add_action( 'customize_register', array( $this, 'register_settings_general_buttons' ) );
		add_action( 'customize_register', array( $this, 'register_settings_general_breadcrumbs' ) );
		add_action( 'customize_register', array( $this, 'register_settings_general_sidebar' ) );
		add_action( 'customize_register', array( $this, 'register_settings_general_responsive' ) );
	}

	/**
	 * Register container settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_general_container( $wp_customize ) {

		$section = 'octo_section_general_container';

		/*
		 * Container layout.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[container_layout]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'container_layout' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[container_layout]',
			array(
				'type'    => 'select',
				'label'   => __( 'Layout', 'octo' ),
				'setting' => THEME_SETTINGS . '[container_layout]',
				'section' => $section,
				'choices' => array(
					'full'      => __( 'Full Width', 'octo' ),
					'boxed'     => __( 'Boxed', 'octo' ),
					'separated' => __( 'Separated', 'octo' ),
				),
			)
		);

		/*
		 * Container width.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[container_width]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'container_width' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[container_width]',
				array(
					'label'       => __( 'Width', 'octo' ),
					'setting'     => THEME_SETTINGS . '[container_width]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '2560',
						'step' => '1',
					),
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_container_width',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_container_width',
				array(
					'setting' => 'separator_container_width',
					'section' => $section,
				)
			)
		);

		/*
		 * Body background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[body_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'body_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[body_background_color]',
				array(
					'label'   => __( 'Body Background Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[body_background_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Container background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[content_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'content_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[content_background_color]',
				array(
					'label'           => __( 'Container Background Color', 'octo' ),
					'setting'         => THEME_SETTINGS . '[content_background_color]',
					'section'         => $section,
					'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_container_layout_boxed_or_separated' ),
				)
			)
		);

	}

	/**
	 * Register buttons settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_general_buttons( $wp_customize ) {

		$section = 'octo_section_general_buttons';

		/*
		 * Button font-color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[button_font_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'button_font_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[button_font_color]',
				array(
					'label'   => __( 'Font-Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[button_font_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Button background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[button_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'button_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[button_background_color]',
				array(
					'label'   => __( 'Background Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[button_background_color]',
					'section' => $section,
				)
			)
		);

		/*
		 * Button background color hover.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[button_background_color_hover]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'button_background_color_hover' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[button_background_color_hover]',
				array(
					'label'   => __( 'Background Color Hover', 'octo' ),
					'setting' => THEME_SETTINGS . '[button_background_color_hover]',
					'section' => $section,
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_button_background_color_hover',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_button_background_color_hover',
				array(
					'setting' => 'separator_button_background_color_hover',
					'section' => $section,
				)
			)
		);

		/*
		 * Border radius.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[button_border_radius]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'button_border_radius' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[button_border_radius]',
				array(
					'label'       => __( 'Border Radius', 'octo' ),
					'setting'     => THEME_SETTINGS . '[button_border_radius]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '20',
						'step' => '1',
					),
				)
			)
		);

	}

	/**
	 * Register breadcrumbs settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_general_breadcrumbs( $wp_customize ) {

		$section = 'octo_section_general_breadcrumbs';

		/*
		 * Enable Breadcrumbs.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[enable_breadcrumbs]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'enable_breadcrumbs' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[enable_breadcrumbs]',
			array(
				'type'    => 'select',
				'label'   => __( 'Enable Breadcrumbs', 'octo' ),
				'setting' => THEME_SETTINGS . '[enable_breadcrumbs]',
				'section' => $section,
				'choices' => array(
					'disabled' => __( 'Disabled', 'octo' ),
					'enabled'  => __( 'Enabled', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_enable_breadcrumbs',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_enable_breadcrumbs',
				array(
					'setting'         => 'separator_enable_breadcrumbs',
					'section'         => $section,
					'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
				)
			)
		);

		/*
		 * Disable breadcrumbs front-page.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[disable_breadcrumbs_front_page]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'disable_breadcrumbs_front_page' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[disable_breadcrumbs_front_page]',
			array(
				'type'            => 'checkbox',
				'label'           => __( 'Disable Breadcrumbs on Frontpage', 'octo' ),
				'setting'         => THEME_SETTINGS . '[disable_breadcrumbs_front_page]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

		/*
		 * Disable breadcrumbs page.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[disable_breadcrumbs_page]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'disable_breadcrumbs_page' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[disable_breadcrumbs_page]',
			array(
				'type'            => 'checkbox',
				'label'           => __( 'Disable Breadcrumbs on Page', 'octo' ),
				'setting'         => THEME_SETTINGS . '[disable_breadcrumbs_page]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

		/*
		 * Disable breadcrumbs blog.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[disable_breadcrumbs_blog]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'disable_breadcrumbs_blog' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[disable_breadcrumbs_blog]',
			array(
				'type'            => 'checkbox',
				'label'           => __( 'Disable Breadcrumbs on Blog Page', 'octo' ),
				'setting'         => THEME_SETTINGS . '[disable_breadcrumbs_blog]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

		/*
		 * Disable breadcrumbs single.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[disable_breadcrumbs_single]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'disable_breadcrumbs_single' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[disable_breadcrumbs_single]',
			array(
				'type'            => 'checkbox',
				'label'           => __( 'Disable Breadcrumbs on Single Post', 'octo' ),
				'setting'         => THEME_SETTINGS . '[disable_breadcrumbs_single]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

		/*
		 * Disable breadcrumbs archive.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[disable_breadcrumbs_archive]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'disable_breadcrumbs_archive' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[disable_breadcrumbs_archive]',
			array(
				'type'            => 'checkbox',
				'label'           => __( 'Disable Breadcrumbs on Archive Page', 'octo' ),
				'settings'        => THEME_SETTINGS . '[disable_breadcrumbs_archive]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

		/*
		 * Disable breadcrumbs search.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[disable_breadcrumbs_search]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'disable_breadcrumbs_search' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[disable_breadcrumbs_search]',
			array(
				'type'            => 'checkbox',
				'label'           => __( 'Disable Breadcrumbs on Search result', 'octo' ),
				'setting'         => THEME_SETTINGS . '[disable_breadcrumbs_search]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

		/*
		 * Disable breadcrumbs 404.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[disable_breadcrumbs_404]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'disable_breadcrumbs_404' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'checkbox' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[disable_breadcrumbs_404]',
			array(
				'type'            => 'checkbox',
				'label'           => __( 'Disable Breadcrumbs on 404 Page', 'octo' ),
				'settings'        => THEME_SETTINGS . '[disable_breadcrumbs_404]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_disable_breadcrumbs_404',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_disable_breadcrumbs_404',
				array(
					'setting'         => 'separator_disable_breadcrumbs_404',
					'section'         => $section,
					'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
				)
			)
		);

		/*
		 * Breadcrumbs separator.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[breadcrumbs_separator]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'breadcrumbs_separator' ),
				'sanitize_callback' => 'sanitize_text_field',
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[breadcrumbs_separator]',
			array(
				'type'            => 'text',
				'label'           => __( 'Breadcrumbs Separator', 'octo' ),
				'setting'         => THEME_SETTINGS . '[breadcrumbs_separator]',
				'section'         => $section,
				'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_breadcrumbs_enabled' ),
			)
		);

	}

	/**
	 * Register sidebar settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_general_sidebar( $wp_customize ) {

		$section = 'octo_section_general_sidebar';

		/*
		 * Sidebar layout.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[sidebar_layout]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'sidebar_layout' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[sidebar_layout]',
			array(
				'type'    => 'select',
				'label'   => __( 'Sidebar Layout', 'octo' ),
				'setting' => THEME_SETTINGS . '[sidebar_layout]',
				'section' => $section,
				'choices' => array(
					'disabled' => __( 'Disabled', 'octo' ),
					'left'     => __( 'Sidebar Left', 'octo' ),
					'right'    => __( 'Sidebar Right', 'octo' ),
				),
			)
		);

		/*
		 * Sidebar layout for pages.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[sidebar_layout_page]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'sidebar_layout_page' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[sidebar_layout_page]',
			array(
				'type'    => 'select',
				'label'   => __( 'Sidebar Layout Pages', 'octo' ),
				'setting' => THEME_SETTINGS . '[sidebar_layout_page]',
				'section' => $section,
				'choices' => array(
					'default'  => __( 'Default', 'octo' ),
					'disabled' => __( 'Disabled', 'octo' ),
					'left'     => __( 'Sidebar Left', 'octo' ),
					'right'    => __( 'Sidebar Right', 'octo' ),
				),
			)
		);

		/*
		 * Sidebar layout for bloch/archive.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[sidebar_layout_archive]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'sidebar_layout_archive' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[sidebar_layout_archive]',
			array(
				'type'    => 'select',
				'label'   => __( 'Sidebar Layout Blog/Archive', 'octo' ),
				'setting' => THEME_SETTINGS . '[sidebar_layout_archive]',
				'section' => $section,
				'choices' => array(
					'default'  => __( 'Default', 'octo' ),
					'disabled' => __( 'Disabled', 'octo' ),
					'left'     => __( 'Sidebar Left', 'octo' ),
					'right'    => __( 'Sidebar Right', 'octo' ),
				),
			)
		);

		/*
		 * Sidebar layout for single posts.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[sidebar_layout_post]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'sidebar_layout_post' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[sidebar_layout_post]',
			array(
				'type'    => 'select',
				'label'   => __( 'Sidebar Layout Single Posts', 'octo' ),
				'setting' => THEME_SETTINGS . '[sidebar_layout_post]',
				'section' => $section,
				'choices' => array(
					'default'  => __( 'Default', 'octo' ),
					'disabled' => __( 'Disabled', 'octo' ),
					'left'     => __( 'Sidebar Left', 'octo' ),
					'right'    => __( 'Sidebar Right', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_sidebar_layout_post',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_sidebar_layout_post',
				array(
					'setting' => 'separator_sidebar_layout_post',
					'section' => $section,
				)
			)
		);

		/*
		 * Mobile menu breakpoint.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[sidebar_breakpoint]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'sidebar_breakpoint' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[sidebar_breakpoint]',
			array(
				'type'    => 'select',
				'label'   => __( 'Sidebar Breakpoint', 'octo' ),
				'setting' => THEME_SETTINGS . '[sidebar_breakpoint]',
				'section' => $section,
				'choices' => array(
					'small'  => __( 'Small Device', 'octo' ),
					'medium' => __( 'Medium Device', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_sidebar_breakpoint',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_sidebar_breakpoint',
				array(
					'setting' => 'separator_sidebar_breakpoint',
					'section' => $section,
				)
			)
		);

		/*
		 * Sidebar width.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[sidebar_width]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'sidebar_width' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[sidebar_width]',
				array(
					'label'       => __( 'Sidebar Width', 'octo' ),
					'setting'     => THEME_SETTINGS . '[sidebar_width]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '0',
						'max'  => '100',
						'step' => '1',
					),
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_sidebar_width',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_sidebar_width',
				array(
					'setting' => 'separator_sidebar_width',
					'section' => $section,
				)
			)
		);

		/*
		 * Sidebar background color.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[sidebar_background_color]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'sidebar_background_color' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'color' ),
			)
		);

		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				THEME_SETTINGS . '[sidebar_background_color]',
				array(
					'label'   => __( 'Sidebar Background Color', 'octo' ),
					'setting' => THEME_SETTINGS . '[sidebar_background_color]',
					'section' => $section,
				)
			)
		);

	}

	/**
	 * Register breakpoint settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function register_settings_general_responsive( $wp_customize ) {

		$section = 'octo_section_general_responsive';

		/*
		 * Breakpoint tablet.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[breakpoint_medium_devices]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'breakpoint_medium_devices' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[breakpoint_medium_devices]',
				array(
					'label'       => __( 'Medium Device Breakpoint', 'octo' ),
					'setting'     => THEME_SETTINGS . '[breakpoint_medium_devices]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '1',
						'max'  => '2000',
						'step' => '1',
					),
				)
			)
		);

		/*
		 * Breakpoint mobile.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[breakpoint_small_devices]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'breakpoint_small_devices' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'int_string' ),
			)
		);

		$wp_customize->add_control(
			new Range_Control(
				$wp_customize,
				THEME_SETTINGS . '[breakpoint_small_devices]',
				array(
					'label'       => __( 'Small Device Breakpoint', 'octo' ),
					'setting'     => THEME_SETTINGS . '[breakpoint_small_devices]',
					'section'     => $section,
					'input_attrs' => array(
						'min'  => '1',
						'max'  => '1500',
						'step' => '1',
					),
				)
			)
		);

	}

}
