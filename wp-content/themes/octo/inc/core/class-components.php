<?php
/**
 * Components class.
 *
 * @package octo
 * @since 1.0.0
 */

namespace octo\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class creates html code for different components.
 * It is also responsible for setting the class html attribute for the header, navigation and footer.
 *
 * @since 1.0.0
 */
class Components {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'octo_header', array( 'octo\core\Components', 'load_template_part_header' ) );
		add_action( 'octo_footer', array( 'octo\core\Components', 'load_template_part_footer' ) );
	}

	/**
	 * Prints html code for custom logo.
	 *
	 * @param Int    $id Custom Logo ID.
	 * @param String $class CSS class.
	 * @param Array  $args Custom Logo attributes.
	 * @since 1.0.0
	 */
	public static function custom_logo( $id, $class, $args = array() ) {

		$defaults = array(
			'class' => '',
			'alt'   => esc_attr( get_bloginfo( 'name' ) ),
			'size'  => 'full',
		);

		$args = wp_parse_args( $args, $defaults );

		if ( has_custom_logo() && $id ) {

			$attr = array(
				'class' => $args['class'],
				'alt'   => $args['alt'],
			);

			// Change logo size for frontend html.
			if ( is_customize_preview() ) {
				$args['size'] = 'full';
			}

			$image = wp_get_attachment_image( $id, $args['size'], '', $attr );

			$html = sprintf(
				'<a href="%1$s" class="custom-logo-link %2$s" rel="home">
					%3$s
				</a>',
				esc_url( home_url( '/' ) ),
				esc_attr( $class ),
				$image
			);

			echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		}

	}

	/**
	 * Creates html class attribute for the header.
	 *
	 * @since 1.0.0
	 */
	private static function header_class() {

		$header_layout    = Options::get_theme_option( 'header_layout' );
		$header_alignment = Options::get_theme_option( 'header_alignment' );
		$header_width     = Options::get_theme_option( 'header_width' );
		$nav_alignment    = Options::get_theme_option( 'nav_alignment' );
		$mobile_logo      = Options::get_theme_option( 'mobile_logo' );

		// Adds a class for the selected site layout.
		$classes = array( 'site-header' );

		switch ( $header_layout ) {
			case 'nav_inline':
				$classes[] = 'nav-inline';
				break;
			case 'nav_top':
				$classes[] = 'nav-top';
				break;
			case 'nav_bottom':
				$classes[] = 'nav-bottom';
				break;
		}

		if ( 'nav_top' === $header_layout || 'nav_bottom' === $header_layout ) {
			switch ( $header_alignment ) {
				case 'left':
					$classes[] = 'align-left';
					break;
				case 'center':
					$classes[] = 'align-center';
					break;
				case 'right':
					$classes[] = 'align-right';
					break;
			}

			switch ( $nav_alignment ) {
				case 'left':
					$classes[] = 'nav-align-left';
					break;
				case 'center':
					$classes[] = 'nav-align-center';
					break;
				case 'right':
					$classes[] = 'nav-align-right';
					break;
			}
		}

		if ( Common::show_widget_area( 'header' ) ) {
			$classes[] = 'has-widget-area';
		}

		switch ( $header_width ) {
			case 'full':
				$classes[] = 'full-width';
				break;
			case 'content':
				$classes[] = 'content-width';
				break;
		}

		if ( ! empty( $mobile_logo ) ) {
			$classes[] = 'has-mobile-logo';
		}

		$classes = array_unique( $classes );
		$classes = array_map( 'sanitize_html_class', $classes );

		return $classes;

	}

	/**
	 * Creates html class attribute for the footer.
	 *
	 * @since 1.0.0
	 */
	private static function footer_class() {

		// Get theme settings.
		$header_layout = Options::get_theme_option( 'header_layout' );
		$footer_width  = Options::get_theme_option( 'footer_width' );

		$classes = array( 'site-footer' );

		switch ( $footer_width ) {
			case 'full':
				$classes[] = 'full-width';
				break;
			case 'content':
				$classes[] = 'content-width';
				break;
		}

		$classes = array_unique( $classes );
		$classes = array_map( 'sanitize_html_class', $classes );

		return $classes;

	}

	/**
	 * Creates html class attribute for the navigation.
	 *
	 * @since 1.0.0
	 */
	private static function nav_class() {

		// Get theme settings.
		$nav_alignment = Options::get_theme_option( 'nav_alignment' );

		$classes = array( 'main-navigation' );

		switch ( $nav_alignment ) {
			case 'left':
				$classes[] = 'align-left';
				break;
			case 'center':
				$classes[] = 'align-center';
				break;
			case 'right':
				$classes[] = 'align-right';
				break;
		}

		$classes = array_unique( $classes );
		$classes = array_map( 'sanitize_html_class', $classes );

		return $classes;

	}

	/**
	 * Prints class html code for a specific section.
	 *
	 * @param String $section HTML section.
	 * @since 1.0.0
	 */
	public static function class( $section ) {

		switch ( $section ) {
			case 'header':
				$class = join( ' ', self::header_class() );
				break;
			case 'footer':
				$class = join( ' ', self::footer_class() );
				break;
			case 'nav':
				$class = join( ' ', self::nav_class() );
				break;
		}

		echo 'class="' . esc_attr( $class ) . '"';

	}

	/**
	 * Creates a breadcrump trail.
	 *
	 * @since 1.0.0
	 */
	public static function breadcrumb_trail() {

		// Get settings for breadcrumbs.
		$enable_breadcrumbs             = Options::get_theme_option( 'enable_breadcrumbs' );
		$disable_breadcrumbs_front_page = Options::get_theme_option( 'disable_breadcrumbs_front_page' );
		$disable_breadcrumbs_page       = Options::get_theme_option( 'disable_breadcrumbs_page' );
		$disable_breadcrumbs_blog       = Options::get_theme_option( 'disable_breadcrumbs_blog' );
		$disable_breadcrumbs_single     = Options::get_theme_option( 'disable_breadcrumbs_single' );
		$disable_breadcrumbs_archive    = Options::get_theme_option( 'disable_breadcrumbs_archive' );
		$disable_breadcrumbs_search     = Options::get_theme_option( 'disable_breadcrumbs_search' );
		$disable_breadcrumbs_404        = Options::get_theme_option( 'disable_breadcrumbs_404' );
		$breadcrumbs_separator          = Options::get_theme_option( 'breadcrumbs_separator' );

		// Get metabox settings.
		$disable_breadcrumbs_meta = Metabox::get_meta_option( 'octo_disable_breadcrumbs' );

		// Create new breadcrumb object.
		$args = array(
			'show_browse' => false,
			'list_tag'    => 'div',
			'item_tag'    => 'span',
			'seperator'   => esc_html( $breadcrumbs_separator ),
		);

		$breadcrumb = apply_filters( 'octo_breadcrumb_trail_object', null, $args );

		if ( ! is_object( $breadcrumb ) ) {
			$breadcrumb = new Breadcrumb_Trail( $args );
		}

		// Only show breadcrumbs, if not disabled for a specific element.
		if ( ! $disable_breadcrumbs_meta && 'disabled' !== $enable_breadcrumbs && (
				( is_front_page() && ! $disable_breadcrumbs_front_page ) ||
				( ! is_front_page() && is_page() && ! $disable_breadcrumbs_page ) ||
				( ! is_front_page() && is_home() && ! $disable_breadcrumbs_blog ) ||
				( ! is_front_page() && is_single() && ! $disable_breadcrumbs_single ) ||
				( ! is_front_page() && is_archive() && ! $disable_breadcrumbs_archive ) ||
				( ! is_front_page() && is_search() && ! $disable_breadcrumbs_search ) ||
				( ! is_front_page() && is_404() && ! $disable_breadcrumbs_404 )
			)
		) {
			$breadcrumb_trail = $breadcrumb->trail();
		}

	}

	/**
	 * Prints the theme credits.
	 *
	 * @since 1.0.0
	 */
	public static function credits() {

		$display = apply_filters( 'octo_display_credits', true );

		if ( $display ) {
			$credits = '&copy; ' . gmdate( 'Y' ) . ' ' . get_bloginfo( 'name' ) . ' - ' . esc_html__( 'Proudly powered by theme ', 'octo' ) . '<a href="">Octo</a>';

			$html = sprintf(
				'<div class="site-credits">
					%s
				</div><!-- .site-credits -->',
				$credits
			);

			echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		}

	}

	/**
	 * Prints the posts pagination.
	 *
	 * @since 1.0.0
	 */
	public static function posts_pagination() {

		$args = array(
			'prev_text' => '<span class="dashicons dashicons-arrow-left-alt"></span>' . esc_HTML__( 'Older posts', 'octo' ),
			'next_text' => esc_HTML__( 'Newer posts', 'octo' ) . '<span class="dashicons dashicons-arrow-right-alt"></span>',
		);

		$html = apply_filters( 'octo_posts_pagination', get_the_posts_pagination( $args ) );

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

	/**
	 * Prints the navigation for a single post.
	 *
	 * @since 1.0.0
	 */
	public static function post_navigation() {

		$args = array(
			'prev_text' => '<span class="dashicons dashicons-arrow-left-alt"></span>' . esc_html__( 'Previous Post', 'octo' ),
			'next_text' => esc_html__( 'Next Post', 'octo' ) . '</span><span class="dashicons dashicons-arrow-right-alt"></span>',
		);

		$html = apply_filters( 'octo_post_navigation', get_the_post_navigation( $args ) );

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

	/**
	 * Print template partials for the header.
	 *
	 * @since 1.0.0
	 */
	public static function load_template_part_header() {

		get_template_part( 'template-parts/header/site-header' );

	}

	/**
	 * Print template partials for the footer.
	 *
	 * @since 1.0.0
	 */
	public static function load_template_part_footer() {

		get_template_part( 'template-parts/footer/site-footer' );

	}
	
	/**
	 * Print template partials for the content.
	 *
	 * @since 1.0.1
	 */
	public static function load_template_part_content( $template ) {

		if ( 'index' === $template || 'archive' === $template ) {
			$post_format = get_post_format();
			if ( $post_format ) {
				$template = $post_format;
			} else {
				$template = get_post_type();	
			}
		}

		get_template_part( 'template-parts/content', $template );

	}

}
