<?php
/**
 * Theme_Style class
 *
 * This class is responsible for creating the custom stylesheet for the theme.
 *
 * @package octo
 * @since 1.0.0
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
 * Creates stylesheet for inline css.
 *
 * @since 1.0.0
 */
class Theme_Style {

	/**
	 * Build custom stylesheet for the theme.
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
		$container_width  = Options::get_theme_option_array_to_string( 'container_width', 'value+unit' );
		$site_bg_color    = Options::get_theme_option( 'body_background_color' );
		$content_bg_color = Options::get_theme_option( 'content_background_color' );

		$parser->add_rule(
			'.site-content .site-container, .site-layout-boxed .site, .wp-block-group__inner-container, .wp-block-cover__inner-container',
			array(
				'max-width' => $container_width,
				'margin'    => '0 auto',
			)
		);

		$parser->add_rule(
			'body',
			array(
				'background' => $site_bg_color,
			)
		);

		$parser->add_rule(
			'.site-layout-boxed .site, .site-layout-separated #primary article .post-inner, .site-layout-separated .comments-area article',
			array(
				'background' => $content_bg_color,
			)
		);

		/**
		 * Sidebar
		 */
		$sidebar_width            = Options::get_theme_option( 'sidebar_width' );
		$sidebar_background_color = Options::get_theme_option( 'sidebar_background_color' );
		$sidebar_menu_breakpoint  = Options::get_theme_option( 'sidebar_breakpoint' );

		$parser->add_rule(
			'.sidebar-widget-area-inner',
			array(
				'background' => $sidebar_background_color,
			)
		);

		$parser->open_media_query( 'min-width', Common::get_media_query_width( $sidebar_menu_breakpoint, 'min-width' ) );

			$parser->add_rule(
				'.sidebar .site-content .site-container-inner',
				array(
					'display'     => 'flex',
					'align-items' => 'flex-start',
				)
			);

			$parser->add_rule(
				'.sidebar .site-content .site-container-inner #primary',
				array(
					'width' => ( 100 - $sidebar_width['value'] ) . $sidebar_width['unit'],
				)
			);

			$parser->add_rule(
				'.sidebar .site-content .site-container-inner #secondary',
				array(
					'width' => $sidebar_width['value'] . $sidebar_width['unit'],
				)
			);

			$parser->add_rule(
				'.sidebar-left #primary, .sidebar-right #secondary',
				array(
					'margin-left' => '20px',
				)
			);

			$parser->add_rule(
				'.sidebar-right #primary, .sidebar-left #secondary',
				array(
					'margin-right' => '20px',
				)
			);

			$parser->add_rule(
				'.site-layout-separated .sidebar-widget-area-inner',
				array(
					'padding' => '3rem',
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'max-width', Common::get_media_query_width( 'small', 'max-width' ) );

			$parser->add_rule(
				'.sidebar #secondary',
				array(
					'margin' => '3em 0 0 0',
				)
			);

		$parser->close_media_query();

		/**
		 * Header
		 */
		$header_background_color = Options::get_theme_option( 'header_background_color' );

		$header_widget_width     = Options::get_theme_option( 'header_widget_width' ) . '%';
		$header_enable_widgets   = Options::get_theme_option( 'header_enable_widgets' );
		$header_separator_height = Options::get_theme_option_array_to_string( 'header_separator_height', 'value+unit' );
		$header_separator_color  = Options::get_theme_option( 'header_separator_color' );

		$logo_width_desktop = Options::get_theme_option_array_to_string( 'logo_width_desktop', 'value+unit' );
		$logo_width_tablet  = Options::get_theme_option_array_to_string( 'logo_width_tablet', 'value+unit' );
		$logo_width_mobile  = Options::get_theme_option_array_to_string( 'logo_width_mobile', 'value+unit' );
		$mobile_logo_width  = Options::get_theme_option_array_to_string( 'mobile_logo_width', 'value+unit' );

		$parser->add_rule(
			'.site-header.content-width .site-container, .site-header.content-width .main-navigation .nav-container',
			array(
				'max-width' => $container_width,
				'margin'    => '0 auto',
			),
		);

		$parser->add_rule(
			'.site-header',
			array(
				'border-bottom-width' => $header_separator_height,
			),
		);

		$parser->add_rule(
			'.custom-logo',
			array(
				'max-width' => $logo_width_desktop,
			),
		);

		$parser->add_rule(
			'.custom-logo-mobile',
			array(
				'max-width' => $mobile_logo_width,
			),
		);

		$parser->add_rule(
			'.site-header',
			array(
				'background'          => $header_background_color,
				'border-bottom-color' => $header_separator_color,
			),
		);

		$parser->open_media_query( 'min-width', Common::get_media_query_width( $header_enable_widgets, 'min-width' ) );

			$parser->add_rule(
				'.site-header .header-widget-area',
				array(
					'display'     => 'flex',
					'align-items' => 'center',
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'min-width', Common::get_media_query_width( 'small', 'min-width' ) );

			$parser->add_rule(
				'.has-mobile-logo .custom-logo-link',
				array(
					'display' => 'block',
				)
			);

			$parser->add_rule(
				'.has-mobile-logo .custom-logo-link.mobile',
				array(
					'display' => 'none',
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'max-width', Common::get_media_query_width( 'small', 'max-width' ) );

			$parser->add_rule(
				'.custom-logo',
				array(
					'max-width' => $logo_width_mobile,
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'max-width', Common::get_media_query_width( 'medium', 'max-width' ) );

			$parser->add_rule(
				'.custom-logo',
				array(
					'max-width' => $logo_width_tablet,
				)
			);

		$parser->close_media_query();

		/**
		 * Navigation
		 */
		$menu_background_color    = Options::get_theme_option( 'menu_background_color' );
		$submenu_background_color = Options::get_theme_option( 'submenu_background_color' );
		$menu_item_line_height    = Options::get_theme_option_array_to_string( 'menu_item_line_height', 'value+unit' );
		$menu_item_padding        = Options::get_theme_option_array_to_string( 'menu_item_padding', 'value+unit' );
		$mobile_menu_breakpoint   = Options::get_theme_option( 'mobile_menu_breakpoint' );
		$menu_enable_widgets      = Options::get_theme_option( 'menu_enable_widgets' );

		$parser->add_rule(
			'.main-navigation, .menu-toggle',
			array(
				'background' => $menu_background_color,
			)
		);

		$parser->add_rule(
			'.menu-toggle-button',
			array(
				'line-height' => $menu_item_line_height,
			),
		);

		$parser->open_media_query( 'min-width', Common::get_media_query_width( $mobile_menu_breakpoint, 'min-width' ) );

			$parser->add_rule(
				'.main-navigation ul li.menu-item-has-children > a .submenu-toggle-icon',
				array(
					'padding-right' => $menu_item_padding,
				),
			);

			$parser->add_rule(
				'.site-header.nav-inline .main-navigation',
				array(
					'margin-top'    => '10px',
					'margin-bottom' => '10px',
				)
			);

			$parser->add_rule(
				'.main-navigation .sub-menu',
				array(
					'background' => $submenu_background_color,
					'display'    => 'block',
					'visibility' => 'hidden',
					'opacity'    => 0,
					'transition' => 'opacity 0.3s, visibility 0.3s',
				)
			);

			$parser->add_rule(
				'.menu-widget-area .widget:not(:last-child)',
				array(
					'margin-right' => '20px',
				)
			);

			$parser->add_rule(
				'.main-navigation',
				array(
					'display' => 'block',
				)
			);

			$parser->add_rule(
				'.main-navigation ul',
				array(
					'display'     => 'flex',
					'align-items' => 'center',
				)
			);

			$parser->add_rule(
				'.main-navigation ul ul',
				array(
					'position'   => 'absolute',
					'top'        => '100%',
					'left' => '-9999px',
					'z-index'    => '99999',
					'box-shadow' => '0 4px 10px -2px rgb(0 0 0 / 10%)',
				)
			);

			$parser->add_rule(
				'.main-navigation ul ul ul',
				array(
					'top' => '0',
				)
			);

			$parser->add_rule(
				'.main-navigation ul li.submenu-open > ul, .dropdown-hover .main-navigation ul li:hover > ul, .dropdown-hover .main-navigation ul li.focus > ul',
				array(
					'left'       => '0',
					'visibility' => 'visible',
					'opacity'    => 1,
				)
			);

			$parser->add_rule(
				'.main-navigation ul ul li.submenu-open > ul, .dropdown-hover .main-navigation ul ul li:hover > ul, .dropdown-hover .main-navigation ul ul li.focus > ul',
				array(
					'left' => '100%',

				)
			);

			$parser->add_rule(
				'.menu-toggle',
				array(
					'display' => 'none',
				)
			);

			$parser->add_rule(
				'.sub-menu .submenu-toggle-icon::before',
				array(
					'content' => '"\f345"',
				)
			);

			$parser->add_rule(
				'.sub-menu .submenu-open > a > .submenu-toggle-icon::before',
				array(
					'content' => '"\f341"',
				)
			);

			$parser->add_rule(
				'.main-navigation ul li a',
				array(
					'line-height' => $menu_item_line_height,
				)
			);

			$parser->add_rule(
				'.main-navigation ul li a, .custom-menu-item .menu-widget-area',
				array(
					'padding-left'  => $menu_item_padding,
					'padding-right' => $menu_item_padding,
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'min-width', Common::get_media_query_width( $menu_enable_widgets, 'min-width' ) );

			$parser->add_rule(
				'.main-navigation .custom-menu-item',
				array(
					'display'     => 'flex',
					'align-items' => 'center',
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'max-width', Common::get_media_query_width( $mobile_menu_breakpoint, 'max-width' ) );

			$parser->add_rule(
				'.site-header.nav-inline .main-navigation',
				array(
					'margin' => '10px -20px -20px -20px',
					'width'  => 'calc( 100% + 40px )',
				)
			);

			$parser->add_rule(
				'#primary-menu',
				array(
					'flex-basis' => '100%',
				)
			);

			$parser->add_rule(
				'.menu-widget-area, .menu-widget-area .widget',
				array(
					'flex-basis' => '100%',
				)
			);

			$parser->add_rule(
				'.main-navigation',
				array(
					'background' => '#eee',
				)
			);

			$parser->add_rule(
				'.main-navigation .nav-menu',
				array(
					'padding' => '10px 0',
				)
			);

			$parser->add_rule(
				'.main-navigation ul li a, .custom-menu-item .menu-widget-area',
				array(
					'padding'     => '0 20px',
					'line-height' => '60px',
				)
			);

		$parser->close_media_query();

		/**
		 * Footer
		 */
		$footer_background_color = Options::get_theme_option( 'footer_background_color' );

		$parser->add_rule(
			'.site-footer.content-width .site-container',
			array(
				'max-width' => $container_width,
				'margin'    => '0 auto',
			),
		);

		$parser->add_rule(
			'.site-footer',
			array(
				'background' => $footer_background_color,
			),
		);

		$parser->open_media_query( 'min-width', Common::get_media_query_width( 'small', 'min-width' ) );

			$parser->add_rule(
				'.site-footer .site-container-inner',
				array(
					'display'   => 'flex',
					'flex-wrap' => 'wrap',
				)
			);

			$parser->add_rule(
				'.site-footer .site-container-inner > div:not(:last-child)',
				array(
					'padding-right' => '40px',
				)
			);

			$parser->add_rule(
				'.site-footer .footer-widget-area',
				array(
					'flex' => '1 1 0',
				)
			);

		$parser->close_media_query();

		$parser->open_media_query( 'max-width', Common::get_media_query_width( 'small', 'max-width' ) );

			$parser->add_rule(
				'.site-footer .site-container-inner > div:not(:last-child)',
				array(
					'margin-bottom' => '2.5rem',
				)
			);

		$parser->close_media_query();

		/**
		 * Typography
		 */
		$body_font_family = Common::get_font_family( Options::get_theme_option( 'body_font_family' ) );
		$body_font_weight = Common::get_font_weight( Options::get_theme_option( 'body_font_variant' ) );
		$body_font_style  = Common::get_font_style( Options::get_theme_option( 'body_font_variant' ) );

		$body_font_size_desktop = Options::get_theme_option_array_to_string( 'body_font_size_desktop', 'value+unit' );
		$body_font_size_tablet  = Options::get_theme_option_array_to_string( 'body_font_size_tablet', 'value+unit' );
		$body_font_size_mobile  = Options::get_theme_option_array_to_string( 'body_font_size_mobile', 'value+unit' );

		$body_line_height    = Options::get_theme_option( 'body_line_height' );
		$body_text_transform = Options::get_theme_option( 'body_text_transform' );

		$body_font_color       = Options::get_theme_option( 'body_font_color' );
		$body_link_color       = Options::get_theme_option( 'body_link_color' );
		$body_link_color_hover = Options::get_theme_option( 'body_link_color_hover' );

		$headings_font_family = Common::get_font_family( Options::get_theme_option( 'headings_font_family' ) );
		$headings_font_weight = Common::get_font_weight( Options::get_theme_option( 'headings_font_variant' ) );
		$headings_font_style  = Common::get_font_style( Options::get_theme_option( 'headings_font_variant' ) );

		$headings_line_height    = Options::get_theme_option( 'headings_line_height' );
		$headings_text_transform = Options::get_theme_option( 'headings_text_transform' );

		$headings_font_color = Options::get_theme_option( 'headings_font_color' );

		$parser->add_rule(
			'html, body, button, input, select, optgroup, textarea',
			array(
				'font-family'    => $body_font_family,
				'font-weight'    => $body_font_weight,
				'font-style'     => $body_font_style,
				'font-size'      => $body_font_size_desktop,
				'text-transform' => $body_text_transform,
			),
		);

		$parser->add_rule(
			'body',
			array(
				'line-height' => $body_line_height,
				'color'       => $body_font_color,
			),
		);

		$parser->add_rule(
			'a',
			array(
				'color' => $body_link_color,
			),
		);

		$parser->add_rule(
			'a:focus',
			array(
				'outline-color' => $body_link_color,
			),
		);

		$parser->add_rule(
			'a:hover, a:focus, a:active, .current-menu-item > a, .current-menu-ancestor > a',
			array(
				'color' => $body_link_color_hover,
			),
		);

		$parser->add_rule(
			':is(h1, h2, h3, h4, h5, h6), :is(h1, h2, h3, h4, h5, h6) a, :is(h1, h2, h3, h4, h5, h6) a:hover, :is(h1, h2, h3, h4, h5, h6) a:focus',
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
			'.wp-block-button__link, button, input[type="button"], input[type="reset"], input[type="submit"], a.more-link, .pagination .nav-links > *',
			array(
				'color'         => $button_font_color,
				'background'    => $button_background_color,
				'border-radius' => $button_border_radius,
			),
		);

		$parser->add_rule(
			'.wp-block-button__link:hover, button:hover, input[type="button"]:hover, input[type="reset"]:hover, input[type="submit"]:hover,
			.wp-block-button__link:focus, button:focus, input[type="button"]:focus, input[type="reset"]:focus, input[type="submit"]:focus,
			a.more-link:hover, a.more-link:focus, .pagination .nav-links > *:hover, .pagination .nav-links > *:focus, .pagination .nav-links .current',
			array(
				'background' => $button_background_color_hover,
			),
		);

		$parser->add_rule(
			'.menu-toggle-button, button.menu-toggle-button:hover, button.menu-toggle-button:focus',
			array(
				'color' => $body_link_color,
			),
		);

		/**
		 * Alignment
		 */
		$parser->open_media_query( 'min-width', Common::get_media_query_width( 'medium', 'min-width' ) );

			$parser->add_rule(
				'.no-sidebar.site-layout-full .entry-content .alignwide',
				array(
					'margin-left'  => '-100px',
					'margin-right' => '-100px',
					'max-width'    => 'unset',
					'width'        => 'unset',
				)
			);
		
		/**
		 * Blog/Archive
		 */
		$parser->open_media_query( 'min-width', Common::get_media_query_width( 'small', 'min-width' ) );

			$parser->add_rule(
				'.site-layout-separated .site-posts > article > .post-inner, .site-layout-separated .site-main-inner > article > .post-inner',
				array(
					'padding' => '3rem',
				)
			);

			$parser->add_rule(
				'.site-layout-separated .comment-body',
				array(
					'padding' => '3rem',
				)
			);

			$parser->add_rule(
				'.blog-layout-thumbnail-left .post > .post-inner',
				array(
					'display'     => 'flex',
					'align-items' => 'flex-start',
					'flex-wrap'   => 'wrap',
				)
			);

			$parser->add_rule(
				'.blog-layout-thumbnail-left .post a.post-thumbnail + div.post-content',
				array(
					'padding-left' => '1.5rem',
					'flex-basis'   => '60%',
				)
			);

			$parser->add_rule(
				'.blog-layout-thumbnail-left .post a.post-thumbnail',
				array(
					'flex-basis' => '40%',
				)
			);

		$parser->close_media_query();

		return $parser->get_parsed_css();

	}

	/**
	 * Returns custom stylesheet.
	 *
	 * @since  1.0.0
	 * @return String Custom stylesheet
	 */
	public static function get_style() {

		return self::create_stylesheet();

	}

}

