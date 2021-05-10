<?php
/**
 * Save class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\customizer\setup;

use octo\core\Options;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class handles actions and task after a customizer safe.
 *
 * @since 1.0.0
 */
class Save {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'customize_save_after', array( $this, 'create_custom_logo_image_file' ) );
		add_action( 'customize_save_after', array( $this, 'refrehs_options' ) );
	}

	/**
	 * Create a new image file depending on the choosen logo width in the customizer settings.
	 *
	 * @since 1.0.0
	 */
	public function create_custom_logo_image_file() {

		if ( has_custom_logo() ) {

			Options::refresh();

			// Resize custom logo image.
			$logo_id = get_theme_mod( 'custom_logo' );
			self::create_logo( $logo_id );

			// Resize mobile logo image.
			$logo_mobile_src = Options::get_theme_option( 'mobile_logo' );
			$logo_mobile_id  = attachment_url_to_postid( $logo_mobile_src );

			self::create_logo( $logo_mobile_id );

		}

	}

	/**
	 * Refresh the theme options after a customizer save.
	 *
	 * @since 1.0.0
	 */
	public function refrehs_options() {

		Options::refresh();

	}

	/**
	 * Adds logo images size in filter.
	 *
	 * @param Array $sizes      Associative array of image sizes to be created.
	 * @param Array $image_meta The image meta data: width, height, file, sizes, etc.
	 * @since 1.0.0
	 */
	public function logo_image_size( $sizes, $image_meta ) {

		// Add image size for custom logo.
		$logo_width = Options::get_theme_option_array_to_string( 'logo_width_desktop', 'value' );

		if ( is_array( $sizes ) && ! empty( $logo_width ) ) {

			$sizes['octo-logo-size'] = array(
				'width'  => $logo_width,
				'height' => 0,
				'crop'   => false,
			);

		}

		// Add image size for mobile logo.
		$mobile_logo_width = Options::get_theme_option_array_to_string( 'mobile_logo_width', 'value' );

		if ( is_array( $sizes ) && ! empty( $mobile_logo_width ) ) {

			$sizes['octo-mobile-logo-size'] = array(
				'width'  => $mobile_logo_width,
				'height' => 0,
				'crop'   => false,
			);

		}

		return $sizes;

	}

	/**
	 * Creates sub-image for custom logo depending on its width.
	 *
	 * @param Int $logo_id Logo id.
	 * @since 1.0.0
	 */
	public function create_logo( $logo_id ) {

		if ( $logo_id ) {

			$fullsizepath = get_attached_file( $logo_id );

			if ( isset( $fullsizepath ) && file_exists( $fullsizepath ) ) {

				if ( ! function_exists( 'wp_generate_attachment_metadata' ) ) {
					require_once ABSPATH . 'wp-admin/includes/image.php';// phpcs:ignore WPThemeReview.CoreFunctionality.FileInclude.FileIncludeFound
				}

				add_filter( 'intermediate_image_sizes_advanced', array( $this, 'logo_image_size' ), 10, 2 );

				$meta = wp_generate_attachment_metadata( $logo_id, $fullsizepath );

				if ( ! is_wp_error( $metadata ) && ! empty( $metadata ) ) {
					wp_update_attachment_metadata( $logo_id, $meta );
				}

				remove_filter( 'intermediate_image_sizes_advanced', array( $this, 'logo_image_size' ), 10 );

			}
		}

	}

}
