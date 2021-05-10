<?php
/**
 * Setup class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\setup;

use octo\core\Options;
use octo\core\Common;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * @since 1.0.0
 */
class Setup {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'after_setup_theme', array( $this, 'add_theme_support' ) );
		add_action( 'after_setup_theme', array( $this, 'load_textdomain' ) );
		add_action( 'after_setup_theme', array( $this, 'set_content_width' ), 0 );
		add_action( 'after_setup_theme', array( $this, 'add_editor_style' ) );
	}

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function add_theme_support() {

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		/*
		 * Add align wide and full support for Gutenberg editor.
		 */
		add_theme_support( 'align-wide' );
		
		/*
		 * Add support for post-formats.
		 */
		add_theme_support(
			'post-formats',
			array(
				'gallery',
				'image',
				'link',
				'quote',
				'video',
				'audio',
				'status',
				'aside',
			)
		);

	}

	/**
	 * Load theme text domain for WordPress.
	 *
	 * @since 1.0.0
	 */
	public function load_textdomain() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 */
		load_theme_textdomain( 'octo', get_template_directory() . '/languages' );

	}

	/**
	 * Set the content width in pixels, based on the theme's design and stylesheet.
	 *
	 * @global int $content_width
	 *
	 * @since 1.0.0
	 */
	public function set_content_width() {

		// Get site width from theme options.
		$container_width = Options::get_theme_option_array_to_string( 'container_width', 'value' );

		if ( $container_width ) {

			$sidebar_layout           = Common::get_sidebar_layout();
			$sidebar_width            = Options::get_theme_option_array_to_string( 'sidebar_width', 'value' );
			$content_padding_vertical = '20';
			$sidebar_margin           = '20';

			if ( 'disabled' === $sidebar_layout || ! $sidebar_layout ) {
				$GLOBALS['content_width'] = $container_width - ( $content_padding_vertical * 2 );
			} else {
				$GLOBALS['content_width'] = ( ( $container_width - ( $content_padding_vertical * 2 + $sidebar_margin * 2 ) ) / 100 * ( 100 - $sidebar_width ) );
			}
		} else {
			$GLOBALS['content_width'] = apply_filters( 'octo_content_width', 1200 );
		}

	}

	/**
	 * Add stylesheet for block editor.
	 *
	 * @since 1.0.0
	 */
	public function add_editor_style() {

		add_editor_style( 'assets/css/editor-style.css' );

	}

}
