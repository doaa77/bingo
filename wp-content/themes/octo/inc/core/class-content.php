<?php
/**
 * Content class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

use octo\core\Common;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class creates html code for the content.
 * It is also responsible for custom template tags for this theme.
 *
 * @since 1.0.0
 */
class Content {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_filter( 'excerpt_more', array( $this, 'excerpt_read_more' ) );
	}

	/**
	 * Prints HTML with meta information for the current post-date/time.
	 *
	 * @since 1.0.0
	 */
	public static function get_posted_on() {

		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf(
			$time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);

		// Get meta icon.
		$meta_icon = self::get_meta_icon( 'posted_on' );

		$posted_on = $meta_icon . '<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>';

		return '<span class="posted-on">' . $posted_on . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

	/**
	 * Prints HTML with meta information for the current author.
	 *
	 * @since 1.0.0
	 */
	public static function get_posted_by() {

		// Get meta icon.
		$meta_icon = self::get_meta_icon( 'posted_by' );

		$author = $meta_icon . '<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';

		return '<span class="author"> ' . $author . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	}

	/**
	 * Prints HTML with meta information for the categories.
	 *
	 * @since 1.0.0
	 */
	public static function get_post_categories() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Variable to store html code.
			$html = '';

			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'octo' ) );
			if ( $categories_list ) {
				// Get meta icon.
				$meta_icon = self::get_meta_icon( 'post_categories' );

				/* translators: 1: list of categories. */
				$html .= '<span class="cat-links">' . $meta_icon . $categories_list . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
			}

			return $html;

		}

	}

	/**
	 * Prints HTML with meta information for the tags.
	 *
	 * @since 1.0.0
	 */
	public static function get_post_tags() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {

			// Variable to store html code.
			$html = '';

			/* translators: used between list items, there is a space after the comma */
			$tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'octo' ) );
			if ( $tags_list ) {
				// Get meta icon.
				$meta_icon = self::get_meta_icon( 'post_tags' );

				/* translators: 1: list of tags. */
				$html .= '<span class="tags-links">' . $meta_icon . wp_kses_post( $tags_list ) . '</span>';
			}

			return $html;

		}

	}

	/**
	 * Prints HTML with meta information for the comments.
	 *
	 * @since 1.0.0
	 */
	public static function get_post_comments() {
		if ( ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

			// Variable to store html code.
			$html = '';

			// Get meta icon.
			$meta_icon = self::get_meta_icon( 'post_comments' );

			$html .= '<span class="comments-link">' . $meta_icon;

			ob_start();
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'octo' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					wp_kses_post( get_the_title() )
				)
			);
			$html .= ob_get_contents();
			ob_end_clean();

			$html .= '</span>';

			return $html;

		}

	}

	/**
	 * Prints HTML with all meta informations in a given order.
	 *
	 * @since 1.0.0
	 */
	public static function get_post_meta() {

		// Get theme options.
		$blog_post_meta_items = Options::get_theme_option( 'blog_post_meta_items' );
		$blog_post_meta_icons       = Options::get_theme_option( 'blog_post_meta_icons' );

		if ( is_array( $blog_post_meta_items ) && ! empty( $blog_post_meta_items ) && 'post' === get_post_type() ) {

			// Variable to store html code for meta icons.
			$meta_items_ordered = '';

			// Hook for changing meta separator icon.
			$separator = apply_filters( 'octo_meta_icons_separator', '-' );

			$count_items = count( $blog_post_meta_items );
			for ( $i = 0; $i < $count_items; $i++ ) {

				$meta_item = '';

				switch ( $blog_post_meta_items[ $i ] ) {
					case 'posted_on':
						$meta_item = self::get_posted_on();
						break;
					case 'posted_by':
						$meta_item = self::get_posted_by();
						break;
					case 'categories':
						$meta_item = self::get_post_categories();
						break;
					case 'tags':
						$meta_item = self::get_post_tags();
						break;
					case 'comments':
						$meta_item = self::get_post_comments();
						break;
				}

				if ( $meta_item ) {

					// Add a separator, if meta icons are disabled.
					if ( 'disabled' === $blog_post_meta_icons && $i < $count_items && 0 !== $i ) {
						$meta_items_ordered .= '<span class="meta-icon-separator">' . esc_html( $separator ) . '</span>';
					}

					$meta_items_ordered .= $meta_item;
				}
			}

			$html = sprintf(
				'<div class="entry-meta">
					%s    
				</div><!-- .entry-meta -->',
				$meta_items_ordered
			);

			return $html;

		}

	}

	/**
	 * Prints HTML with title, thumbnail and meta icons in a given order.
	 *
	 * @since 1.0.0
	 */
	public static function post_heading() {

		// Determin, if if is a blog post or single post.
		if ( is_single() ) {
			$heading_order = Options::get_theme_option( 'single_post_heading' );
		} else {
			$blog_layout = Options::get_theme_option( 'blog_layout' );
			if ( 'featured_image' === $blog_layout ) {
				$heading_order = Options::get_theme_option( 'blog_post_heading' );	
			} else {
				$heading_order = Options::get_theme_option( 'blog_post_heading_thumbnail' );
			}
			
		}

		if ( is_array( $heading_order ) && ! empty( $heading_order ) ) {

			// Variable to store html code.
			$heading = '';

			foreach ( $heading_order as $element ) {

				switch ( $element ) {
					case 'post_title':
						$heading .= self::get_post_title();
						break;
					case 'post_thumbnail':
						$heading .= self::get_post_thumbnail();
						break;
					case 'post_meta':
						$heading .= self::get_post_meta();
						break;
				}
			}

			printf( '<header class="entry-header">%s</header><!-- .entry-header -->', $heading ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

		}

	}

	/**
	 * Returns html code for a meta icon.
	 *
	 * @param String $meta_item Meta Item.
	 * @since 1.0.0
	 */
	private static function get_meta_icon( $meta_item ) {

		// Get theme option.
		$blog_post_meta_icons = Options::get_theme_option( 'blog_post_meta_icons' );

		if ( 'disabled' !== $blog_post_meta_icons ) {
			switch ( $meta_item ) {
				case 'posted_on':
					$icon = '<span class="dashicons dashicons-calendar-alt"></span>';
					break;
				case 'posted_by':
					$icon = '<span class="dashicons dashicons-admin-users"></span>';
					break;
				case 'post_categories':
					$icon = '<span class="dashicons dashicons-list-view"></span>';
					break;
				case 'post_tags':
					$icon = '<span class="dashicons dashicons-flag"></span>';
					break;
				case 'post_comments':
					$icon = '<span class="dashicons dashicons-testimonial"></span>';
					break;
			}

			return $icon;
		}
	}

	/**
	 * Returns HTML code for an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 *
	 * @since 1.0.0
	 */
	private static function get_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) {

			// Get metabox settings.
			$disable_featured_image = Common::show_featured_image();

			if ( $disable_featured_image ) {
				$html = sprintf(
					'<div class="post-thumbnail">%s</div><!-- .post-thumbnail -->',
					get_the_post_thumbnail( null, 'post-thumbnail', null )
				);
			} else {
				$html = '';
			}
		} else {

			$attr = array(
				'alt' => the_title_attribute(
					array(
						'echo' => false,
					)
				),
			);

			$thumbnail = get_the_post_thumbnail( null, 'post-thumbnail', $attr );

			$html = sprintf(
				'<a class="post-thumbnail" href="%1$s" aria-hidden="true" tabindex="-1">%2$s</a>',
				esc_url( get_permalink() ),
				$thumbnail
			);

		}

		return $html;

	}

	/**
	 * Prints an optional post thumbnail.
	 *
	 * @since 1.0.0
	 */
	public static function post_thumbnail() {
		echo self::get_post_thumbnail(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}

	/**
	 * Returns HTML code with post title.
	 *
	 * @since 1.0.0
	 */
	public static function get_post_title() {

		if ( is_singular() ) {
			$disable_title = Common::show_title();
			if ( $disable_title ) {
				$html = the_title( '<h1 class="entry-title">', '</h1>', false );
			} else {
				$html = '';
			}
		} else {
			$html = the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>', false );
		}

		return $html;

	}

	/**
	 * Prints continue reading link after the excerpt.
	 *
	 * @since 1.0.0
	 */
	public function excerpt_read_more() {

		$read_more_text = __( 'Continue reading', 'octo' );

		$link = sprintf(
			esc_html( '%s' ),
			'<a class="more-link" href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . $read_more_text . '</a>'
		);

		$html = ' &hellip;<p>' . $link . '</p>';

		return $html;

	}

}
