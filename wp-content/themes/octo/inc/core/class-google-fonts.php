<?php
/**
 * Google_Fonts class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

use octo\core\Font_Families;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class renders and creates the url for the Google fonts api.
 *
 * @since 1.0.0
 */
class Google_Fonts {

	/**
	 * Variable to store all used fonts.
	 *
	 * @since 1.0.0
	 * @var Array
	 */
	private $fonts = array();

	/**
	 * Variable to store Google Font API url.
	 *
	 * @since 1.0.0
	 * @var String
	 */
	private $api_url = array();

	/**
	 * Variable to store system fonts.
	 *
	 * @var $system_fonts
	 */
	private static $system_fonts = array();

	/**
	 * Variable to store custom fonts.
	 *
	 * @var $custom_fonts
	 */
	private static $custom_fonts = array();

	/**
	 * Instance.
	 *
	 * @var $instance
	 */
	private static $instance;

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 */
	private function __construct() {

		// Get system fonts and Google Fonts.
		if ( ! self::$system_fonts ) {
			self::$system_fonts = Font_Families::get_system_fonts();
		}

		if ( ! self::$system_fonts ) {
			self::$custom_fonts = Font_Families::get_custom_fonts();
		}

	}

	/**
	 * Initiator.
	 *
	 * @since 1.0.0
	 * @return  Object
	 */
	public static function get_instance() {

		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;

	}

	/**
	 * Add a font.
	 *
	 * @param String $font    Font name.
	 * @param String $variant Variant name.
	 * @since 1.0.0
	 */
	public function add( $font, $variant ) {

		// Early exit, if font is empty or inherit.
		if ( ! $font || 'inherit' === $font ) {
			return;
		}

		// Exclude non Google Fonts from list.
		if ( array_key_exists( $font, self::$system_fonts ) || array_key_exists( $font, self::$custom_fonts ) ) {
			return;
		}

		// When font is not in the array, add it.
		// If font is already in the array, just add the variant.
		if ( array_key_exists( $font, $this->fonts ) ) {
			if ( in_array( $variant, $this->fonts[ $font ], true ) ) {
				array_push( $this->fonts[ $font ], $variant );
			}
		} else {
			$this->fonts[ $font ] = array( $variant );
		}

	}

	/**
	 * Creates the link for Google Fonts API.
	 *
	 * @since 1.0.0
	 *
	 * @return    String   All Google Fonts API url
	 */
	private function render_api_url() {

		$base_url  = 'https://fonts.googleapis.com/css';
		$font_args = array();
		$family    = array();

		$disable_google_fonts = apply_filters( 'octo_disable_google_fonts', false );

		// Exit early if there is no Google Font or Google Fonts are disabled.
		if ( ! count( $this->fonts ) || $disable_google_fonts ) {
			return;
		}

		// Format font family including variants.
		foreach ( $this->fonts as $font_family => $font_variants ) {

			$font_family = str_replace( ' ', '+', $font_family );

			$font_variants_all = implode( ',', $font_variants );

			if ( ! $font_variants_all ) {
				$family[] = $font_family;
			} else {
				$family[] = $font_family . ':' . $font_variants_all;
			}
		}

		$family              = implode( '|', $family );
		$font_args['family'] = $family;

		// Create filter for font subset and add it to the array, in case subset is set.
		$subset = apply_filters( 'octo_fonts_subset', '' );

		if ( ! empty( $subset ) ) {
			$font_args['subset'] = rawurlencode( $subset );
		}

		// Create filter for font display and add it to the array, in case display is set.
		$display = apply_filters( 'octo_google_font_display', 'fallback' );

		if ( $display ) {
			$font_args['display'] = rawurlencode( $display );
		}

		// Create url for Google Font API.
		$api_url = add_query_arg( $font_args, $base_url );

		$this->api_url = $api_url;

	}

	/**
	 * Returns the link for Google Fonts API.
	 *
	 * @since 1.0.0
	 *
	 * @return    String   All Google Fonts API url
	 */
	public function get_api_url() {

		if ( ! $this->api_url ) {
			$this->render_api_url();
		}

		return $this->api_url;

	}

}

