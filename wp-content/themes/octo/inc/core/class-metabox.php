<?php
/**
 * Metabox class
 *
 * @package octo
 * @since  1.0.0
 */

namespace octo\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * Adds a metabox with page or post specific settings.
 * You can enable or disable certain options and overwrite the global customizer settings.
 *
 * @since  1.0.0
 */
class Metabox {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since  1.0.0
	 */
	public function init() {

		if ( current_user_can( 'edit_pages' ) ) {
			add_action( 'add_meta_boxes', array( $this, 'register' ) );
			add_action( 'save_post', array( $this, 'save' ) );
		}

	}

	/**
	 * Register metaboxes.
	 *
	 * @since  1.0.0
	 */
	public function register() {

		// Get all public post types.
		$post_types = get_post_types( array( 'public' => true ) );

		// Metabox not needed for 3rd party plugins. Hence removing the respective post-types.
		unset( $post_types['elementor_library'] );

		// Add metabox options.
		add_meta_box(
			'octo-settings-metabox', // Metabox ID.
			__( 'Octo Settings', 'octo' ), // Title.
			array( $this, 'metabox_callback' ), // Callback function.
			$post_types, // Post type or post types in array.
			'side', // Position (normal, side, advanced).
			'default' // Priority (default, low, high, core).
		);

	}

	/**
	 * Metabox callback.
	 *
	 * @param  Object $post Current post.
	 * @since  1.0.0
	 */
	public function metabox_callback( $post ) {

		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'octo_settings_metabox', 'octo_settings_metabox_nonce' );

		$post_meta = get_post_meta( $post->ID );

		$content_layout         = ( isset( $post_meta['octo_content_layout'][0] ) ? $post_meta['octo_content_layout'][0] : 'default' );
		$sidebar_layout         = ( isset( $post_meta['octo_sidebar_layout'][0] ) ? $post_meta['octo_sidebar_layout'][0] : 'default' );
		$disable_title          = ( isset( $post_meta['octo_disable_title'][0] ) ? $post_meta['octo_disable_title'][0] : '' );
		$disable_breadcrumbs    = ( isset( $post_meta['octo_disable_breadcrumbs'][0] ) ? $post_meta['octo_disable_breadcrumbs'][0] : '' );
		$disable_featured_image = ( isset( $post_meta['octo_disable_featured_image'][0] ) ? $post_meta['octo_disable_featured_image'][0] : '' );
		$disable_header         = ( isset( $post_meta['octo_disable_header'][0] ) ? $post_meta['octo_disable_header'][0] : '' );
		$disable_footer         = ( isset( $post_meta['octo_disable_footer'][0] ) ? $post_meta['octo_disable_footer'][0] : '' );

		?>
		<div id="octo-metabox-container">
			<div class="octo-metabox-section">
				<label for="octo_content_layout" class="octo-metabox-section-title"><?php esc_html_e( 'Content Layout:', 'octo' ); ?></label>              
				<select name="octo_content_layout" id="octo-content-layout">
					<option value="default" <?php echo ( 'default' === $content_layout ) ? 'selected' : ''; ?>><?php esc_html_e( 'Standard', 'octo' ); ?></option>
					<option value="full_width" <?php echo ( 'full_width' === $content_layout ) ? 'selected' : ''; ?>><?php esc_html_e( 'Full Width', 'octo' ); ?></option>
				</select>
			</div>
			<div class="octo-metabox-section">
				<label for="octo_sidebar_layout" class="octo-metabox-section-title"><?php esc_html_e( 'Sidebar-Layout:', 'octo' ); ?></label>              
				<select name="octo_sidebar_layout" id="octo-sidebar-layout">
					<option value="default" <?php echo ( 'default' === $sidebar_layout ) ? 'selected' : ''; ?>><?php esc_html_e( 'Customizer settings', 'octo' ); ?></option>
					<option value="disabled" <?php echo ( 'disabled' === $sidebar_layout ) ? 'selected' : ''; ?>><?php esc_html_e( 'Disabled', 'octo' ); ?></option>
					<option value="left"<?php echo ( 'left' === $sidebar_layout ) ? 'selected' : ''; ?>><?php esc_html_e( 'Sidebar Left', 'octo' ); ?></option>
					<option value="right"<?php echo ( 'right' === $sidebar_layout ) ? 'selected' : ''; ?>><?php esc_html_e( 'Sidebar Right', 'octo' ); ?></option>
				</select>
			</div >
			<div class="octo-metabox-section">
				<label class="octo-metabox-section-title"><?php esc_html_e( 'Disable Elements:', 'octo' ); ?></label>
				<div class="octo-metabox-section-wrapper">
					<input type="checkbox" name="octo_disable_title" value="true" <?php echo ( 'true' === $disable_title ) ? 'checked' : ''; ?>>
					<label for="octo_disable_title"><?php esc_html_e( 'Content Title', 'octo' ); ?></label>
				</div>
				<div class="octo-metabox-section-wrapper">
					<input type="checkbox" name="octo_disable_breadcrumbs" value="true" <?php echo ( 'true' === $disable_breadcrumbs ) ? 'checked' : ''; ?>>
					<label for="octo_disable_breadcrumbs"><?php esc_html_e( 'Breadcrumbs', 'octo' ); ?></label>
				</div>
				<div class="octo-metabox-section-wrapper">
					<input type="checkbox" name="octo_disable_featured_image" value="true" <?php echo ( 'true' === $disable_featured_image ) ? 'checked' : ''; ?>>
					<label for="octo_disable_featured_image"><?php esc_html_e( 'Featured Image', 'octo' ); ?></label>
				</div>
				<div class="octo-metabox-section-wrapper">
					<input type="checkbox" name="octo_disable_header" value="true" <?php echo ( 'true' === $disable_header ) ? 'checked' : ''; ?>>
					<label for="octo_disable_header"><?php esc_html_e( 'Header', 'octo' ); ?></label>
				</div>
				<div class="octo-metabox-section-wrapper">
					<input type="checkbox" name="octo_disable_footer" value="true" <?php echo ( 'true' === $disable_footer ) ? 'checked' : ''; ?>>
					<label for="octo_disable_footer"><?php esc_html_e( 'Footer', 'octo' ); ?></label>
				</div>                
			</div>        
		</div>
		<?php

	}

	/**
	 * Save metabox settings.
	 *
	 * @param  Int $post_id Current post id.
	 * @since  1.0.0
	 */
	public static function save( $post_id ) {
		/*
		 * We need to verify this came from the our screen and with proper authorization,
		 * because save_post can be triggered at other times.
		 */

		// Check if our nonce is set.
		if ( ! isset( $_POST['octo_settings_metabox_nonce'] ) ) {
			return $post_id;
		}

		$nonce = sanitize_key( $_POST['octo_settings_metabox_nonce'] );

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $nonce, 'octo_settings_metabox' ) ) {
			return $post_id;
		}

		/*
		 * If this is an autosave, our form has not been submitted,
		 * so we don't want to do anything.
		 */
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return $post_id;
		}

		// Check the user's permissions.
		if ( ! current_user_can( 'edit_page', $post_id ) ) {
			return $post_id;
		}

		// Loop trough all metaboxes and save the values.
		$metaboxes = self::get_metaboxes();

		foreach ( $metaboxes as $metabox ) {

			// Sanitize input.
			$value = filter_input( INPUT_POST, $metabox, FILTER_SANITIZE_STRING );

			if ( $value ) {
				update_post_meta( $post_id, $metabox, $value );
			} else {
				delete_post_meta( $post_id, $metabox );
			}
		}

	}

	/**
	 * Returns an array containing all metabox settings.
	 *
	 * @return Array
	 * @since  1.0.0
	 */
	private static function get_metaboxes() {

		return array(
			'octo_content_layout',
			'octo_sidebar_layout',
			'octo_disable_title',
			'octo_disable_breadcrumbs',
			'octo_disable_featured_image',
			'octo_disable_header',
			'octo_disable_footer',
		);

	}

	/**
	 * Returns value for a specific metabox theme option.
	 *
	 * @param String $meta_option Option name of metabox setting.
	 * @return Array
	 * @since  1.0.0
	 */
	public static function get_meta_option( $meta_option ) {

		if ( is_singular() ) {
			$post_id = get_queried_object_id();
			$post_id = get_the_ID();
			$value   = get_post_meta( $post_id, $meta_option, true );

			if ( $value ) {
				return $value;
			}
		}

	}

}
