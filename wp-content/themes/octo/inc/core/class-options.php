<?php
/**
 * Options class.
 *
 * This class provides custom theme options.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

use octo\core\Defaults;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class provides custom theme options.
 *
 * @since 1.0.0
 */
class Options {

	/**
	 * Theme option defaults.
	 *
	 * @var $defaults
	 */
	private static $defaults;

	/**
	 * A static option variable
	 *
	 * @since  1.0.0
	 * @access private
	 * @var    Array $options
	 */
	private static $options = array();

	/**
	 * Init
	 *
	 * @since 1.0.0
	 */
	public static function init() {

		// Set the static variables, if not yet set.
		if ( ! self::$defaults || self::$options ) {
			self::$defaults = Defaults::get_defaults();
			self::refresh();
		}
	}

	/**
	 * Refresh theme options.
	 *
	 * @since 1.0.0
	 */
	public static function refresh() {

		$options_no_default = get_option( THEME_SETTINGS );

		self::$options = wp_parse_args( $options_no_default, self::$defaults );

	}

	/**
	 * Get a specific theme option
	 *
	 * @param  String $theme_option Theme option name.
	 * @param  String $default      Default value.
	 * @return mixed                Return option for a specific setting
	 * @since  1.0.0
	 */
	public static function get_theme_option( $theme_option, $default = '' ) {

		if ( array_key_exists( $theme_option, self::$options ) ) {
			return self::$options[ $theme_option ];
		} else {
			if ( $default ) {
				return $default;
			}
		}

	}

	/**
	 * Returns specific array values as string.
	 *
	 * @param  String $theme_option Theme option name.
	 * @param  String $key          Key of value to be fetched.
	 * @param  String $separator    Seperator char for implode.
	 * @return String
	 * @since  1.0.0
	 */
	public static function get_theme_option_array_to_string( $theme_option, $key, $separator = '' ) {

		$option = self::$options[ $theme_option ];
		$output = '';

		if ( is_array( $option ) ) {
			if ( array_key_exists( 'value', $option ) && array_key_exists( 'unit', $option ) ) {

				switch ( $key ) {
					case 'value':
						$output = $option['value'];
						break;
					case 'unit':
						$output = $option['unit'];
						break;
					case 'value+unit':
						if ( 0 <= $option['value'] ) {
							$output = $option['value'] . $option['unit'];
						}
						break;
					case 'implode':
						$output = implode( $separator, $option );
						break;
				}
				return $output;
			}
		}

	}

	/**
	 * Get all theme options
	 *
	 * @return Array    Return all options as array
	 * @since  1.0.0
	 */
	public static function get_theme_options() {

		return self::$options;

	}

}
