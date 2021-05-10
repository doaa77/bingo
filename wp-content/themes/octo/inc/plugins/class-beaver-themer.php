<?php
/**
 * Beaver_Themer class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\plugins;

use FLThemeBuilderLayoutData;
use octo\core\Components;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class ensures compatibility with Beaver Themer plugin.
 *
 * @since 1.0.0
 */
class Beaver_Themer {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {

		if ( class_exists( 'FLThemeBuilderLoader' ) && class_exists( 'FLThemeBuilderLayoutData' ) ) {
			add_action( 'after_setup_theme', array( $this, 'themer_support' ) );
			add_action( 'wp', array( $this, 'header_render' ) );
			add_action( 'wp', array( $this, 'footer_render' ) );
		}

	}

	/**
	 * Add theme support for Beaver Themer locations.
	 *
	 * @since 1.0.0
	 */
	public function themer_support() {

		add_theme_support( 'fl-theme-builder-headers' );
		add_theme_support( 'fl-theme-builder-footers' );

	}

	/**
	 * Removes theme header and renders the Beaver Themer header.
	 *
	 * @since 1.0.0
	 */
	public function header_render() {

		// Get the header ID.
		$header_ids = FLThemeBuilderLayoutData::get_current_page_header_ids();

		// If we have a header, remove the theme header and hook in Beaver Themer.
		if ( ! empty( $header_ids ) ) {
			remove_action( 'octo_header', array( 'octo\core\Components', 'load_template_part_header' ) );
			add_action( 'octo_header', 'FLThemeBuilderLayoutRenderer::render_header' );
		}

	}

	/**
	 * Removes theme footer and renders the Beaver Themer footer.
	 *
	 * @since 1.0.0
	 */
	public function footer_render() {

		// Get the footer ID.
		$footer_ids = FLThemeBuilderLayoutData::get_current_page_footer_ids();

		// If we have a footer, remove the theme footer and hook in Beaver Themer.
		if ( ! empty( $footer_ids ) ) {
			remove_action( 'octo_footer', array( 'octo\core\Components', 'load_template_part_footer' ) );
			add_action( 'octo_footer', 'FLThemeBuilderLayoutRenderer::render_footer' );
		}

	}

}
