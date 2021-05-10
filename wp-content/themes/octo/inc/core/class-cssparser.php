<?php
/**
 * CSSParser class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class parses added selectors and attributes into custom stylesheet code.
 *
 * @since 1.0.0
 */
class CSSParser {

	/**
	 * Variable for the css output.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    String $css_output
	 */
	private $css_output;

	/**
	 * Variable to hold a media query temporarily.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    String $media_query
	 */
	private $media_query = null;

	/**
	 * Variable to hold css code for a media query.
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    String $media_query_css
	 */
	private $media_query_css = null;

	/**
	 * Add css rule to the output variable
	 *
	 * @param String $selector   CSS selector.
	 * @param Array  $attributes CSS attributes.
	 * @since 1.0.0
	 */
	public function add_rule( $selector, $attributes ) {

		if ( ! empty( $this->media_query ) ) {
			$this->media_query_css .= $this->parse_rule( $selector, $attributes );
		} else {
			$this->css_output .= $this->parse_rule( $selector, $attributes );
		}

	}

	/**
	 * Parses the variables into css code.
	 *
	 * @param String $selector   CSS selector.
	 * @param Array  $attributes CSS attributes.
	 * @since 1.0.0
	 */
	private function parse_rule( $selector, $attributes ) {

		// Build CSS attributes.
		$css_attributes = '';

		if ( is_array( $attributes ) ) {
			foreach ( $attributes as $key => $value ) {
				if ( '' !== $value && ! is_null( $value ) ) {
					$css_attributes .= sprintf( '%1$s:%2$s;', $key, $value );
				} else {
					continue;
				}
			}
		}

		// Create output.
		if ( ! empty( $css_attributes ) ) {

			$css_rule = sprintf( $selector . '{%s}', $css_attributes );

			return $css_rule;

		}

	}

	/**
	 * Open new Media Query.
	 *
	 * @param string $attribute Media Query attribute.
	 * @param array  $value     Media Query attribute value.
	 * @since 1.0.0
	 */
	public function open_media_query( $attribute, $value ) {

		if ( $attribute && $value && empty( $this->media_query ) ) {
			$this->media_query     = '@media (' . $attribute . ':' . $value . '){%s}';
			$this->media_query_css = null;
		}

	}

	/**
	 * Close open Media Query.
	 *
	 * @since 1.0.0
	 */
	public function close_media_query() {

		if ( ! empty( $this->media_query ) && ! empty( $this->media_query_css ) ) {
			$this->css_output .= sprintf( $this->media_query, $this->media_query_css );
		}

		$this->media_query     = null;
		$this->media_query_css = null;

	}

	/**
	 * Get parsed CSS output.
	 *
	 * @since  1.0.0
	 * @return String Custom stylesheet
	 */
	public function get_parsed_css() {

		return wp_strip_all_tags( $this->css_output );

	}

}
