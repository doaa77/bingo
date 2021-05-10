<?php
/**
 * Active class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\callbacks;

use octo\core\Options;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class provides active callbacks for theme customizer controls.
 *
 * @since 1.0.0
 */
class Active {

	/**
	 * Is container layout equal "boxed" or "separated".
	 *
	 * @since 1.0.0
	 */
	public static function is_container_layout_boxed_or_separated() {

		$container_layout = Options::get_theme_option( 'container_layout' );

		if ( 'boxed' === $container_layout || 'separated' === $container_layout ) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Is breadcrumbs enabled.
	 *
	 * @since 1.0.0
	 */
	public static function is_breadcrumbs_enabled() {

		$enable_breadcrumbs = Options::get_theme_option( 'enable_breadcrumbs' );

		if ( 'enabled' === $enable_breadcrumbs ) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Is header layout nav_top or nav_bottom.
	 *
	 * @since 1.0.0
	 */
	public static function is_header_layout_nav_top_or_nav_bottom() {

		$header_layout = Options::get_theme_option( 'header_layout' );

		if ( 'nav_top' === $header_layout || 'nav_bottom' === $header_layout ) {
			return true;
		} else {
			return false;
		}

	}

	/**
	 * Is blog layout featured_image.
	 *
	 * @since 1.0.1
	 */
	public static function is_blog_layout_featured_image() {

		$blog_layout = Options::get_theme_option( 'blog_layout' );

		if ( 'featured_image' === $blog_layout ) {
			return true;
		} else {
			return false;
		}

	}
	
	/**
	 * Is blog layout featured_image.
	 *
	 * @since 1.0.1
	 */
	public static function is_blog_layout_thumbnail_left() {

		$blog_layout = Options::get_theme_option( 'blog_layout' );

		if ( 'thumbnail_left' === $blog_layout ) {
			return true;
		} else {
			return false;
		}

	}

}
