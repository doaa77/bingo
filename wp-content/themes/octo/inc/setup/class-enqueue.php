<?php
/**
 * Enqueue class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\setup;

use octo\core\Theme_Style;
use octo\core\Block_Editor;
use octo\core\Metabox;
use octo\core\Options;
use octo\core\Common;
use octo\core\Google_Fonts;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * Enqueue scripts and styles.
 *
 * @since   1.0.0
 */
class Enqueue {

	/**
	 * Register WordPress action hooks.
	 */
	public function init() {
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_styles' ) );
		add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_editor_assets' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );
	}

	/**
	 * Enqueue scripts.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_scripts() {

		$suffix = Common::get_minified_suffix();

		wp_enqueue_script( 'octo-navigation', get_template_directory_uri() . '/assets/js/navigation' . $suffix . '.js', array(), THEME_VERSION, true );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}

	/**
	 * Enqueue styles.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_styles() {

		$suffix = Common::get_minified_suffix();

		wp_enqueue_style( 'octo-styles', get_template_directory_uri() . '/assets/css/theme-style' . $suffix . '.css', array(), THEME_VERSION, 'all' );
		wp_style_add_data( 'octo-styles', 'rtl', 'replace' );

		// Add support for dashicons.
		wp_enqueue_style( 'dashicons' );

		// Custom stylesheets for this theme.
		$stylesheet = Theme_Style::get_style();

		wp_add_inline_style( 'octo-styles', $stylesheet );

		// Enqueue Google Fonts.
		$fonts = Google_Fonts::get_instance();
		$fonts->add( Options::get_theme_option( 'body_font_family' ), Options::get_theme_option( 'body_font_variant' ) );
		$fonts->add( Options::get_theme_option( 'headings_font_family' ), Options::get_theme_option( 'headings_font_variant' ) );
		$google_fonts_api_url = $fonts->get_api_url();

		wp_enqueue_style( 'google-fonts-api', $google_fonts_api_url, array(), THEME_VERSION, 'all' );
	}

	/**
	 * Enqueue styles and scripts for Gutenberg block editor.
	 *
	 * @since 1.0.0
	 */
	public function enqueue_editor_assets() {

		wp_enqueue_style( 'octo-editor-styles', get_template_directory_uri() . '/assets/css/block-editor.css', false, THEME_VERSION, 'all' );

		// Custom stylesheets for Gutenberg block editor.
		$stylesheet = Block_Editor::get_style();

		wp_add_inline_style( 'octo-editor-styles', $stylesheet );

		// Enqueue Google Fonts.
		$fonts = Google_Fonts::get_instance();
		$fonts->add( Options::get_theme_option( 'body_font_family' ), Options::get_theme_option( 'body_font_variant' ) );
		$google_fonts_api_url = $fonts->get_api_url();

		wp_enqueue_style( 'google-fonts-api', $google_fonts_api_url, array(), THEME_VERSION, 'all' );

	}

	/**
	 * Enqueue scripts for admin sections.
	 *
	 * @param String $hook WordPress hook.
	 * @since 1.0.0
	 */
	public function enqueue_admin_scripts( $hook ) {

		if ( 'post.php' === $hook || 'post-new.php' === $hook ) {
			wp_enqueue_style( 'octo-metabox-styles', get_template_directory_uri() . '/assets/css/metabox.css', array(), THEME_VERSION, 'all' );
			wp_enqueue_script( 'octo-block-editor-scripts', get_template_directory_uri() . '/assets/js/block-editor.js', array( 'jquery' ), THEME_VERSION, true );

			$post_type = Common::get_current_post_type();

			wp_localize_script(
				'octo-block-editor-scripts',
				'octoBlockEditor',
				array(
					'siteWidth'                => Options::get_theme_option_array_to_string( 'container_width', 'value' ),
					'defaultSidebarLayout'     => Options::get_theme_option( 'sidebar_layout' ),
					'singularSidebarLayout'    => Options::get_theme_option( 'sidebar_layout_' . $post_type ),
					'sidebarWidth'             => Options::get_theme_option_array_to_string( 'sidebar_width', 'value' ),
					'containerPaddingVertical' => '20',
					'sidebarMargin'            => '20',
				)
			);
		}

	}

}
