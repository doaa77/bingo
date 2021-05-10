<?php
/**
 * Gutenberg block editor class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

use octo\core\CSSParser;
use octo\core\Options;
use octo\core\Common;
use octo\core\Metabox;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class is responsible for the appearance of the Gutenberg block editor.
 * It creates a custom stylesheet for the block editor, reflecting all the customizer settings in the block editor.
 *
 * @since 1.0.0
 */
class Block_Editor {

	/**
	 * Create custom stylesheet for Gutenberg block editor.
	 *
	 * @since  1.0.0
	 * @return String Custom styleseheet.
	 */
	private static function create_stylesheet() {

		// Get new CSSParser object.
		$parser = new CSSParser();

		/**
		 * Site layout
		 */
		$container_layout = Options::get_theme_option( 'container_layout' );
		$body_bg_color    = Options::get_theme_option( 'body_background_color' );
		$content_bg_color = Options::get_theme_option( 'content_background_color' );
		$content_layout   = Metabox::get_meta_option( 'octo_content_layout' );
		$sidebar_layout   = self::get_sidebar_layout();
		$content_width    = self::get_content_width();

		$parser->add_rule(
			'.wp-block, .wp-block-cover__inner-container',
			array(
				'max-width' => $content_width,
				'margin'    => '0 auto',
			),
		);

		$parser->add_rule(
			'.block-editor .editor-styles-wrapper blockquote',
			array(
				'max-width' => 'calc(' . $content_width . ' - 3rem)',
				'margin'    => '0 auto',
			),
		);

		$parser->add_rule(
			'.block-editor .wp-block[data-align=wide]',
			array(
				'max-width' => 'calc(' . $content_width . ' + 200px)',
			),
		);

		if ( 'full_width' === $content_layout ) {
			$parser->add_rule(
				'.block-editor .editor-styles-wrapper',
				array(
					'padding-left'  => '0',
					'padding-right' => '0',
				),
			);

			$parser->add_rule(
				'.block-editor .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > .wp-block[data-align="full"]',
				array(
					'margin-left'  => '0',
					'margin-right' => '0',
				),
			);

		}

		if ( 'boxed' === $container_layout || 'separated' === $container_layout ) {
			$bg_color = $content_bg_color;
		} else {
			$bg_color = $body_bg_color;
		}

		$parser->add_rule(
			'.edit-post-visual-editor',
			array(
				'background' => $bg_color,
			),
		);

		/**
		 * Typography
		 */
		$body_font_family       = Common::get_font_family( Options::get_theme_option( 'body_font_family' ) );
		$body_font_weight       = Common::get_font_weight( Options::get_theme_option( 'body_font_variant' ) );
		$body_font_style        = Common::get_font_style( Options::get_theme_option( 'body_font_variant' ) );
		$body_font_size_desktop = Options::get_theme_option_array_to_string( 'body_font_size_desktop', 'value+unit' );
		$body_font_size_tablet  = Options::get_theme_option_array_to_string( 'body_font_size_tablet', 'value+unit' );
		$body_font_size_mobile  = Options::get_theme_option_array_to_string( 'body_font_size_mobile', 'value+unit' );
		$body_line_height       = Options::get_theme_option( 'body_line_height' );
		$body_text_transform    = Options::get_theme_option( 'body_text_transform' );
		$body_font_color        = Options::get_theme_option( 'body_font_color' );
		$body_link_color        = Options::get_theme_option( 'body_link_color' );
		$body_link_color_hover  = Options::get_theme_option( 'body_link_color_hover' );

		$headings_font_family    = Common::get_font_family( Options::get_theme_option( 'headings_font_family' ) );
		$headings_font_weight    = Common::get_font_weight( Options::get_theme_option( 'headings_font_variant' ) );
		$headings_font_style     = Common::get_font_style( Options::get_theme_option( 'headings_font_variant' ) );
		$headings_line_height    = Options::get_theme_option( 'headings_line_height' );
		$headings_text_transform = Options::get_theme_option( 'headings_text_transform' );
		$headings_font_color     = Options::get_theme_option( 'headings_font_color' );

		$parser->add_rule(
			'html, .wp-block',
			array(
				'font-family'    => $body_font_family,
				'font-weight'    => $body_font_weight,
				'font-style'     => $body_font_style,
				'font-size'      => $body_font_size_desktop,
				'text-transform' => $body_text_transform,
				'color'          => $body_font_color,
				'line-height'    => $body_line_height,
			),
		);

		$parser->add_rule(
			'.wp-block a',
			array(
				'color'           => $body_link_color,
				'text-decoration' => 'none',
				'cursor'          => 'pointer',
			),
		);

		$parser->add_rule(
			'.wp-block a:hover',
			array(
				'color' => $body_link_color_hover,
			),
		);

		$parser->add_rule(
			'.block-editor .editor-styles-wrapper h1, .block-editor .editor-styles-wrapper h2, .block-editor .editor-styles-wrapper h3, .block-editor .editor-styles-wrapper h4, .block-editor .editor-styles-wrapper h5, .block-editor .editor-styles-wrapper h6, .editor-post-title .editor-post-title__input',
			array(
				'font-family'    => $headings_font_family,
				'font-weight'    => $headings_font_weight,
				'font-style'     => $headings_font_style,
				'line-height'    => $headings_line_height,
				'text-transform' => $headings_text_transform,
				'color'          => $headings_font_color,
			),
		);

		$parser->open_media_query( 'max-width', Common::get_media_query_width( 'medium', 'max-width' ) );

			$parser->add_rule(
				'html, body, button, input, select, optgroup, textarea',
				array(
					'font-size' => $body_font_size_tablet,
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'max-width', Common::get_media_query_width( 'small', 'max-width' ) );

			$parser->add_rule(
				'html, body, button, input, select, optgroup, textarea',
				array(
					'font-size' => $body_font_size_mobile,
				)
			);

		$parser->close_media_query();

		/**
		 * Button
		 */
		$button_font_color             = Options::get_theme_option( 'button_font_color' );
		$button_background_color       = Options::get_theme_option( 'button_background_color' );
		$button_background_color_hover = Options::get_theme_option( 'button_background_color_hover' );
		$button_border_radius          = Options::get_theme_option_array_to_string( 'button_border_radius', 'value+unit' );

		$parser->add_rule(
			'.block-editor .wp-block-button__link',
			array(
				'color'         => $button_font_color,
				'background'    => $button_background_color,
				'border-radius' => $button_border_radius,
			),
		);

		$parser->add_rule(
			'.block-editor .wp-block-button__link:hover, .block-editor .wp-block-button__link:focus',
			array(
				'background' => $button_background_color_hover,
			),
		);

		return $parser->get_parsed_css();

	}

	/**
	 * Returns the sidebar layout for the block editor.
	 *
	 * @since 1.0.0
	 * Return String custom stylesheet
	 */
	private static function get_sidebar_layout() {

		// Get selected sidebar layout from metabox settings.
		$meta_sidebar_layout = Metabox::get_meta_option( 'octo_sidebar_layout' );

		// If metabox settings are set, then overwrite the sidebar settings from the customizer settings.
		if ( 'default' !== $meta_sidebar_layout && $meta_sidebar_layout ) {
			$sidebar_layout = $meta_sidebar_layout;
		} else {

			// Get customizer settings for the sidebar layout.
			$sidebar_layout_default = Options::get_theme_option( 'sidebar_layout' );
			$sidebar_layout         = $sidebar_layout_default;

			$post_type = Common::get_current_post_type();

			if ( 'page' === $post_type || 'post' === $post_type ) {
				// Get sidebar layout for pages or posts.
				$sidebar_layout_singular = Options::get_theme_option( 'sidebar_layout_' . $post_type );

				// Overwrite the global customizer settings, if sidebar layout for page or post is set.
				if ( 'default' !== $sidebar_layout_singular ) {
					$sidebar_layout = $sidebar_layout_singular;
				}
			}
		}

		return $sidebar_layout;

	}

	/**
	 * Calculates the conten width depending on different theme settings.
	 *
	 * @since 1.0.0
	 * Return String custom stylesheet
	 */
	private static function get_content_width() {

		$container_width          = Options::get_theme_option_array_to_string( 'container_width', 'value' );
		$content_layout           = Metabox::get_meta_option( 'octo_content_layout' );
		$sidebar_layout           = self::get_sidebar_layout();
		$sidebar_width            = Options::get_theme_option_array_to_string( 'sidebar_width', 'value' );
		$content_padding_vertical = '20';
		$sidebar_margin           = '20';

		if ( 'full_width' === $content_layout ) {
			$content_width = '100%';
		} else {
			if ( 'disabled' === $sidebar_layout || ! $sidebar_layout ) {
				$content_width = $container_width - ( $content_padding_vertical * 2 ) . 'px';
			} else {
				$content_width = ( ( $container_width - ( $content_padding_vertical * 2 + $sidebar_margin * 2 ) ) / 100 * ( 100 - $sidebar_width ) ) . 'px';
			}
		}

		return esc_attr( $content_width );

	}

	/**
	 * Returns custom stylesheet.
	 *
	 * @since 1.0.0
	 * Return String Custom stylesheet
	 */
	public static function get_style() {

		return esc_attr( self::create_stylesheet() );

	}

}
