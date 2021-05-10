<?php
/**
 * Default class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class provides the theme defaults.
 *
 * @since 1.0.0
 */
class Defaults {

	/**
	 * Get default theme option values
	 *
	 * @since  1.0.0
	 * @return $default values of the theme.
	 */
	public static function get_defaults() {

		// Defaults list of options.
		$defaults = apply_filters(
			'octo_option_defaults',
			array(
				/**
				 * Breakpoints
				 */
				'breakpoint_medium_devices'      => array(
					'value' => '1024',
					'unit'  => 'px',
				),
				'breakpoint_small_devices'       => array(
					'value' => '768',
					'unit'  => 'px',
				),
				/**
				 * Site layout
				 */
				'container_layout'               => 'separated',
				'container_width'                => array(
					'value' => '1200',
					'unit'  => 'px',
				),
				'body_background_color'          => '#ffffff',
				'content_background_color'       => '#f9f9f9',
				/**
				 * Sidebar
				 */
				'sidebar_layout'                 => 'right',
				'sidebar_layout_post'            => 'default',
				'sidebar_layout_page'            => 'default',
				'sidebar_layout_archive'         => 'default',
				'sidebar_breakpoint'             => 'small',
				'sidebar_width'                  => array(
					'value' => '30',
					'unit'  => '%',
				),
				'sidebar_background_color'       => '#f9f9f9',
				/**
				 * Header
				 */
				'header_layout'                  => 'nav_inline',
				'header_width'                   => 'content',
				'header_alignment'               => 'center',
				'header_background_color'        => '#f9f9f9',
				'header_separator_height'        => array(
					'value' => '0',
					'unit'  => 'px',
				),
				'header_separator_color'         => '',
				'header_enable_widgets'          => 'disabled',
				'logo_width_desktop'             => array(
					'value' => '200',
					'unit'  => 'px',
				),
				'logo_width_tablet'              => array(
					'value' => '',
					'unit'  => 'px',
				),
				'logo_width_mobile'              => array(
					'value' => '',
					'unit'  => 'px',
				),
				'mobile_logo'                    => '',
				'mobile_logo_width'              => array(
					'value' => '200',
					'unit'  => 'px',
				),
				'display_description'            => true,
				/**
				 * Navigation
				 */
				'nav_alignment'                  => 'center',
				'menu_background_color'          => '',
				'submenu_background_color'       => '#f9f9f9',
				'menu_item_line_height'          => array(
					'value' => '60',
					'unit'  => 'px',
				),
				'menu_item_padding'              => array(
					'value' => '15',
					'unit'  => 'px',
				),
				'menu_item_dropdown'             => 'hover',
				'mobile_menu_breakpoint'         => 'small',
				'toggle_button_text'             => 'Menu',
				'menu_enable_widgets'            => 'disabled',
				/**
				 * Footer
				 */
				'footer_widget_areas'            => '3',
				'footer_width'                   => 'content',
				'footer_background_color'        => '#f9f9f9',
				/**
				 * Typography
				 */
				'body_font_family'               => 'inherit',
				'body_font_variant'              => '',
				'body_font_size_desktop'         => array(
					'value' => '16',
					'unit'  => 'px',
				),
				'body_font_size_tablet'          => array(
					'value' => '',
					'unit'  => 'px',
				),
				'body_font_size_mobile'          => array(
					'value' => '',
					'unit'  => 'px',
				),
				'body_line_height'               => '1.5',
				'body_text_transform'            => '',
				'body_font_color'                => '#3d3d3d',
				'body_link_color'                => '#3399cc',
				'body_link_color_hover'          => '#006699',
				'headings_font_family'           => '',
				'headings_font_variant'          => '',
				'headings_line_height'           => '1.5',
				'headings_text_transform'        => '',
				'headings_font_color'            => '#3d3d3d',
				/**
				 * Breadcrumbs
				 */
				'enable_breadcrumbs'             => 'disabled',
				'disable_breadcrumbs_front_page' => false,
				'disable_breadcrumbs_page'       => false,
				'disable_breadcrumbs_blog'       => false,
				'disable_breadcrumbs_single'     => false,
				'disable_breadcrumbs_archive'    => false,
				'disable_breadcrumbs_search'     => false,
				'disable_breadcrumbs_404'        => false,
				'breadcrumbs_separator'          => '\\',
				/**
				 * Blog/Archive
				 */
				'blog_layout'                    => 'featured_image',
				'blog_post_meta_icons'           => 'enabled',
				'blog_post_meta_items'           => array(
					'posted_on',
					'posted_by',
					'comments',
					'categories',
					'tags',
				),
				'blog_post_excerpt'              => 'excerpt',
				'blog_post_heading'              => array(
					'post_thumbnail',
					'post_title',
					'post_meta',
				),
				'blog_post_heading_thumbnail'    => array(
					'post_title',
					'post_meta',
				),
				'single_post_heading'      => array(
					'post_thumbnail',
					'post_title',
					'post_meta',
				),
				/**
				 * Buttons
				 */
				'button_font_color'              => '#ffffff',
				'button_background_color'        => '#3399cc',
				'button_background_color_hover'  => '#006699',
				'button_border_radius'           => array(
					'value' => '0',
					'unit'  => 'px',
				),

			)
		);

		return $defaults;

	}

}
