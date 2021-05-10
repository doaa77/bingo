<?php
/**
 * Common class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

use octo\core\Options;
use octo\core\Metabox;
use octo\core\Font_Families;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class provides as set of repeatedly used helper functions.
 *
 * @since 1.0.0
 */
class Common {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_filter( 'body_class', array( $this, 'body_classes' ) );
		add_action( 'wp_head', array( $this, 'pingback_header' ) );
	}

	/**
	 * Adds custom classes to the array of body classes.
	 *
	 * @param  Array $classes Classes for the body element.
	 * @return Array
	 * @since  1.0.0
	 */
	public function body_classes( $classes ) {

		// Add a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Add a class for the selected site layout.
		$container_layout = Options::get_theme_option( 'container_layout' );

		switch ( $container_layout ) {
			case 'full':
				$classes[] = 'site-layout-full';
				break;
			case 'boxed':
				$classes[] = 'site-layout-boxed';
				break;
			case 'separated':
				$classes[] = 'site-layout-separated';
				break;
		}

		// Add a class for the sidebar.
		$sidebar_layout = self::get_sidebar_layout();

		if ( ! is_active_sidebar( 'octo-sidebar' ) || 'disabled' === $sidebar_layout ) {

			$classes[] = 'no-sidebar';

		} else {

			$classes[] = 'sidebar';

			switch ( $sidebar_layout ) {
				case 'right':
					$classes[] = 'sidebar-right';
					break;
				case 'left':
					$classes[] = 'sidebar-left';
					break;
			}
		}

		// Add a class for menu item dropdown type.
		$menu_item_dropdown = Options::get_theme_option( 'menu_item_dropdown' );

		switch ( $menu_item_dropdown ) {
			case 'hover':
				$classes[] = 'dropdown-hover';
				break;
			case 'click_item':
				$classes[] = 'dropdown-click dropdown-click-item';
				break;
			case 'click_icon':
				$classes[] = 'dropdown-click dropdown-click-icon';
				break;
		}

		// Add a class for the metabox settings content layout.
		$meta_content_layout = Metabox::get_meta_option( 'octo_content_layout' );

		if ( 'full_width' === $meta_content_layout ) {
			$classes[] = 'content-full-width';
		}
		
		// Add a class for the selected blog layout.
		if ( ! is_singular() ) {
			$blog_layout = Options::get_theme_option( 'blog_layout' );

			switch ( $blog_layout ) {
				case 'featured_image':
					$classes[] = 'blog-layout-featured-image';
					break;
				case 'thumbnail_left':
					$classes[] = 'blog-layout-thumbnail-left';
					break;
			}
		}

		return $classes;

	}

	/**
	 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
	 *
	 * @since 1.0.0
	 */
	public function pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}

	/**
	 * Get layout for the sidebar depending on the post type and metabox settings.
	 *
	 * @return String Return sidebar layout
	 * @since  1.0.0
	 */
	public static function get_sidebar_layout() {

		// Get global sidebar layout from the customizer.
		$sidebar_layout_default = Options::get_theme_option( 'sidebar_layout' );
		$sidebar_layout         = $sidebar_layout_default;

		// Get metabox settings.
		$sidebar_layout_metabox = Metabox::get_meta_option( 'octo_sidebar_layout' );

		// If sidebar layout is set in the metabox settings, overwrite the global customizer settings.
		if ( ! empty( $sidebar_layout_metabox ) && 'default' !== $sidebar_layout_metabox ) {
			$sidebar_layout = $sidebar_layout_metabox;
		} else {
			if ( is_singular() ) {
				$post_type = get_post_type();

				if ( 'page' === $post_type || 'post' === $post_type ) {
					$sidebar_layout_singular = Options::get_theme_option( 'sidebar_layout_' . $post_type );

					// Only overwrite the global settings, if a sidebar layout is set for pages or posts.
					if ( 'default' !== $sidebar_layout_singular ) {
						$sidebar_layout = $sidebar_layout_singular;
					}
				}
			} else {
				$sidebar_layout_archive = Options::get_theme_option( 'sidebar_layout_archive' );

				// Only overwrite the global settings, if a sidebar layout is set for archive pages.
				if ( 'default' !== $sidebar_layout_archive ) {
					$sidebar_layout = $sidebar_layout_archive;
				}
			}
		}

		return $sidebar_layout;

	}

	/**
	 * Creates the css code for the font family attribute.
	 *
	 * @param  String $font_family Font Family.
	 * @return String font_family
	 * @since  1.0.0
	 */
	public static function get_font_family( $font_family ) {

		$font_family  = esc_attr( $font_family );
		$system_fonts = Font_Families::get_system_fonts();
		$custom_fonts = Font_Families::get_custom_fonts();
		$google_fonts = Font_Families::get_google_fonts();

		if ( 'inherit' !== $font_family ) {
			if ( array_key_exists( $font_family, $system_fonts ) && $system_fonts[ $font_family ]['fallback'] ) {
				$font_family = $font_family . ', ' . $system_fonts[ $font_family ]['fallback'];
			} elseif ( array_key_exists( $font_family, $custom_fonts ) && $custom_fonts[ $font_family ]['fallback'] ) {
				$font_family = '\'' . $font_family . '\', ' . $custom_fonts[ $font_family ]['fallback'];
			} elseif ( array_key_exists( $font_family, $google_fonts ) && $google_fonts[ $font_family ]['category'] ) {
				$font_family = '\'' . $font_family . '\', ' . $google_fonts[ $font_family ]['category'];
			}
		} else {
			$font_family = '';
		}

		return $font_family;

	}

	/**
	 * Splits up the Google Font variant and returns the font weight.
	 *
	 * @param  String $font_variant Font Variant.
	 * @return String font_weight
	 * @since  1.0.0
	 */
	public static function get_font_weight( $font_variant ) {

		if ( $font_variant ) {

			if ( 'regular' === $font_variant || 'italic' === $font_variant ) {
				$font_weight = '400';
			} else {
				$font_weight = str_replace( 'italic', '', $font_variant );
			}

			return $font_weight;

		}

	}

	/**
	 * Splits up the Google Font variant and returns the font style.
	 *
	 * @param  String $font_variant Font Variant.
	 * @return String $font_weight
	 * @since  1.0.0
	 */
	public static function get_font_style( $font_variant ) {

		if ( $font_variant ) {

			if ( 'italic' !== $font_variant ) {

				$font_style = substr_replace( $font_variant, '', 0, 3 );

				if ( 'italic' !== $font_style ) {
					$font_style = 'normal';
				}
			} else {

				$font_style = $font_variant;

			}

			return $font_style;

		}

	}

	/**
	 * Determines, if title is disabled.
	 *
	 * @return Boolean
	 * @since  1.0.0
	 */
	public static function show_title() {

		return self::show_component( 'title' );

	}

	/**
	 * Determines, if sidebar is shown.
	 *
	 * @return Boolean
	 * @since  1.0.0
	 */
	public static function show_sidebar() {

		// Get sidebar layout.
		$sidebar_layout = self::get_sidebar_layout();

		if ( ! is_active_sidebar( 'octo-sidebar' ) || ! $sidebar_layout || 'disabled' === $sidebar_layout ) {
			return false;
		} else {
			return true;
		}

	}

	/**
	 * Determines, if widget-area has active widgets and is enabled.
	 *
	 * @param  String $section Section, widget-area is shown.
	 * @return Boolean
	 * @since  1.0.0
	 */
	public static function show_widget_area( $section ) {

		$enable_widgets = 'disabled';
		$show           = false;

		switch ( $section ) {
			case 'header':
				$enable_widgets = Options::get_theme_option( 'header_enable_widgets' );
				if ( is_active_sidebar( 'octo-header' ) && 'disabled' !== $enable_widgets ) {
					$show = true;
				}
				break;
			case 'menu':
				$enable_widgets = Options::get_theme_option( 'menu_enable_widgets' );
				if ( is_active_sidebar( 'octo-menu' ) && 'disabled' !== $enable_widgets ) {
					$show = true;
				}
				break;
			case 'footer':
				$footer_widget_areas = Options::get_theme_option( 'footer_widget_areas' );
				for ( $i = 1; $i <= $footer_widget_areas; $i++ ) {
					if ( is_active_sidebar( 'octo-footer-' . $i ) && 0 < $footer_widget_areas ) {
						$show = true;
					}
				}
				break;
		}

		return $show;

	}

	/**
	 * Determines, if header is shown.
	 *
	 * @return Boolean
	 * @since  1.0.0
	 */
	public static function show_header() {

		return self::show_component( 'header' );

	}

	/**
	 * Determines, if footer is shown.
	 *
	 * @return Boolean
	 * @since  1.0.0
	 */
	public static function show_footer() {

		return self::show_component( 'footer' );

	}

	/**
	 * Determines, if featured image is shown.
	 *
	 * @return Boolean
	 * @since  1.0.0
	 */
	public static function show_featured_image() {

		return self::show_component( 'featured_image' );

	}

	/**
	 * Determines, if a certain element is shown or not, depending on the metabox settings.
	 *
	 * @param  String $element Metabox Setting Element.
	 * @return Boolean
	 * @since  1.0.0
	 */
	public static function show_component( $element ) {

		// Get metabox settings.
		$disable = Metabox::get_meta_option( 'octo_disable_' . $element );

		if ( $disable ) {
			return false;
		} else {
			return true;
		}

	}

	/**
	 * Returns the current post-type.
	 *
	 * @return String
	 * @since 1.0.0
	 */
	public static function get_current_post_type() {

		$screen    = get_current_screen();
		$post_type = $screen->post_type;

		return $post_type;

	}

	/**
	 * Returns the name of the template file, depending on the layout customizer settings.
	 *
	 * @param  String $layout Container layout.
	 * @return String
	 * @since  1.0.0
	 */
	public static function get_template_file( $layout ) {

		if ( 'nav_inline' === $layout ) {
			$filename = 'layout-columns';
		} elseif ( 'nav_bottom' === $layout || 'nav_top' === $layout ) {
			$filename = 'layout-rows';
		}

		return $filename;

	}

	/**
	 * Returns the media query attribute.
	 *
	 * @param  String $device Breakpoint Device.
	 * @param  String $width  Media Query Width.
	 * @return Array
	 * @since  1.0.0
	 */
	public static function get_media_query_width( $device, $width ) {

		$media_query_width = '';

		if ( 'medium' === $device ) {
			$media_query_width = Options::get_theme_option_array_to_string( 'breakpoint_medium_devices', 'value' );
		} elseif ( 'small' === $device ) {
			$media_query_width = Options::get_theme_option_array_to_string( 'breakpoint_small_devices', 'value' );
		}

		if ( 0 < $media_query_width ) {
			if ( 'min-width' === $width ) {
				$media_query_width = ++$media_query_width;
			}

			return $media_query_width . 'px';

		}

	}

	/**
	 * Returns .min suffix, if SCRIPT_DEBUG is defined.
	 *
	 * @return String
	 * @since  1.0.0
	 */
	public static function get_minified_suffix() {

		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		return $suffix;

	}

}



