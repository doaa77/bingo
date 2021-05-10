<?php
/**
 * Content_Settings class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\settings;

use octo\core\Options;
use octo\customizer\controls\sortable\Sortable_Control;
use octo\customizer\controls\separator\Separator_Control;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class sets up the settings and controls for the content.
 *
 * @since 1.0.0
 */
class Content_Settings {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_register', array( $this, 'octo_section_content_archive' ) );
		add_action( 'customize_register', array( $this, 'octo_section_content_single' ) );
	}

	/**
	 * Register blog/archive settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function octo_section_content_archive( $wp_customize ) {

		$section = 'octo_section_content_archive';
		
		/*
		 * Blog layout.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[blog_layout]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'blog_layout' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[blog_layout]',
			array(
				'type'    => 'select',
				'label'   => __( 'Layout', 'octo' ),
				'setting' => THEME_SETTINGS . '[blog_layout]',
				'section' => $section,
				'choices' => array(
					'featured_image' => __( 'Featured Image', 'octo' ),
					'thumbnail_left' => __( 'Thumbnail Left', 'octo' ),
				),
			)
		);
		
		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_blog_layout',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_blog_layout',
				array(
					'setting' => 'separator_blog_layout',
					'section' => $section,
				)
			)
		);

		/**
		 * Blog post heading.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[blog_post_heading]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'blog_post_heading' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'sortable' ),
			)
		);

		$wp_customize->add_control(
			new Sortable_Control(
				$wp_customize,
				THEME_SETTINGS . '[blog_post_heading]',
				array(
					'label'   => esc_html__( 'Post Structure', 'octo' ),
					'section' => $section,
					'setting' => THEME_SETTINGS . '[blog_post_heading]',
					'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_blog_layout_featured_image' ),
					'choices' => array(
						'post_thumbnail' => esc_html__( 'Featured Image', 'octo' ),
						'post_title'     => esc_html__( 'Title', 'octo' ),
						'post_meta'      => esc_html__( 'Meta Items', 'octo' ),
					),
				)
			)
		);
		
		/**
		 * Blog post heading thumbnail.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[blog_post_heading_thumbnail]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'blog_post_heading_thumbnail' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'sortable' ),
			)
		);

		$wp_customize->add_control(
			new Sortable_Control(
				$wp_customize,
				THEME_SETTINGS . '[blog_post_heading_thumbnail]',
				array(
					'label'   => esc_html__( 'Post Structure', 'octo' ),
					'section' => $section,
					'setting' => THEME_SETTINGS . '[blog_post_heading_thumbnail]',
					'active_callback' => array( 'octo\customizer\callbacks\Active', 'is_blog_layout_thumbnail_left' ),
					'choices' => array(
						'post_title'     => esc_html__( 'Title', 'octo' ),
						'post_meta'      => esc_html__( 'Meta Items', 'octo' ),
					),
				)
			)
		);
		
		/**
		 * Meta items order.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[blog_post_meta_items]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'blog_post_meta_items' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'sortable' ),
			)
		);

		$wp_customize->add_control(
			new Sortable_Control(
				$wp_customize,
				THEME_SETTINGS . '[blog_post_meta_items]',
				array(
					'label'   => esc_html__( 'Meta Items', 'octo' ),
					'section' => $section,
					'setting' => THEME_SETTINGS . '[blog_post_meta_items]',
					'choices' => array(
						'posted_on'  => esc_html__( 'Posted On', 'octo' ),
						'posted_by'  => esc_html__( 'Posted By', 'octo' ),
						'comments'   => esc_html__( 'Comments', 'octo' ),
						'categories' => esc_html__( 'Categories', 'octo' ),
						'tags'       => esc_html__( 'Tags', 'octo' ),
					),
				)
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_blog_post_heading',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_blog_post_heading',
				array(
					'setting' => 'separator_blog_post_heading',
					'section' => $section,
				)
			)
		);
		
		/*
		 * Meta items icons.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[blog_post_meta_icons]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'blog_post_meta_icons' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[blog_post_meta_icons]',
			array(
				'type'    => 'select',
				'label'   => __( 'Meta Item Icons', 'octo' ),
				'setting' => THEME_SETTINGS . '[blog_post_meta_icons]',
				'section' => $section,
				'choices' => array(
					'disabled'  => __( 'Disabled', 'octo' ),
					'enabled'   => __( 'Enabled', 'octo' ),
				),
			)
		);

		/*
		 * Separator.
		 */
		$wp_customize->add_setting(
			'separator_blog_post_meta_icons',
			array(
				'sanitize_callback' => 'wp_filter_post_kses',
			)
		);

		$wp_customize->add_control(
			new Separator_Control(
				$wp_customize,
				'separator_blog_post_meta_icons',
				array(
					'setting' => 'separator_blog_post_meta_icons',
					'section' => $section,
				)
			)
		);

		/*
		 * Blog post content excerpt.
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[blog_post_excerpt]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'blog_post_excerpt' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'choices' ),
			)
		);

		$wp_customize->add_control(
			THEME_SETTINGS . '[blog_post_excerpt]',
			array(
				'type'    => 'select',
				'label'   => __( 'Post Content', 'octo' ),
				'setting' => THEME_SETTINGS . '[blog_post_excerpt]',
				'section' => $section,
				'choices' => array(
					'full'    => __( 'Full Content', 'octo' ),
					'excerpt' => __( 'Excerpt', 'octo' ),
				),
			)
		);

	}

	/**
	 * Register single post settings and controls.
	 *
	 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
	 * @since 1.0.0
	 */
	public static function octo_section_content_single( $wp_customize ) {

		$section = 'octo_section_content_single';

		/**
		 * Single post heading
		 */
		$wp_customize->add_setting(
			THEME_SETTINGS . '[single_post_heading]',
			array(
				'type'              => 'option',
				'default'           => Options::get_theme_option( 'single_post_heading' ),
				'sanitize_callback' => array( 'octo\customizer\callbacks\Sanitize', 'sortable' ),
			)
		);

		$wp_customize->add_control(
			new Sortable_Control(
				$wp_customize,
				THEME_SETTINGS . '[single_post_heading]',
				array(
					'label'   => esc_html__( 'Single Post Structure', 'octo' ),
					'section' => $section,
					'setting' => THEME_SETTINGS . '[single_post_heading]',
					'choices' => array(
						'post_thumbnail' => esc_html__( 'Featured Image', 'octo' ),
						'post_title'     => esc_html__( 'Title', 'octo' ),
						'post_meta'      => esc_html__( 'Meta Items', 'octo' ),
					),
				)
			)
		);

	}
}
