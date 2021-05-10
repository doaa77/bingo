<?php
/**
 * Menu class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\setup;

use octo\core\Options;
use octo\core\Common;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * Setup the theme menu.
 *
 * @since 1.0.0
 */
class Menu {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'after_setup_theme', array( $this, 'register' ) );
		add_filter( 'nav_menu_item_title', array( $this, 'dropdown_icon' ), 10, 4 );
		add_filter( 'wp_nav_menu_items', array( $this, 'widget_area' ), 10, 2 );
	}

	/**
	 * Register navigation menu.
	 *
	 * @since 1.0.0
	 */
	public function register() {

		register_nav_menus(
			array(
				'primary' => __( 'Primary Menu', 'octo' ),
			)
		);

	}

	/**
	 * Add icon for drop down menu item, in chase the menu item has children.
	 *
	 * @param String  $title The menu item's title.
	 * @param WP_POST $item  The current menu item.
	 * @param Object  $args  An object of wp_nav_menu() arguments.
	 * @param Int     $depth Depth of menu item. Used for padding.
	 * @since 1.0.0
	 */
	public function dropdown_icon( $title, $item, $args, $depth ) {

		if ( 'primary-menu' === $args->menu_id ) {

			// Get theme options.
			$menu_item_dropdown = Options::get_theme_option( 'menu_item_dropdown' );

			$tabindex = '';
			if ( 'click_icon' === $menu_item_dropdown && '#' !== $item->url ) {
				$tabindex = 'tabindex=0';
			}

			foreach ( $item->classes as $class ) {
				if ( 'menu-item-has-children' === $class ) {
					$title .= '<span class="submenu-toggle-icon" ' . esc_attr( $tabindex ) . '></span>';
				}
			}
		}

		return $title;

	}

	/**
	 * Adds a widget area at the end of the menu.
	 *
	 * @param String $items The HTML list content for the menu items.
	 * @param Object $args  An object containing wp_nav_menu() arguments.
	 * @since 1.0.0
	 */
	public function widget_area( $items, $args ) {

		if ( 'primary-menu' === $args->menu_id && Common::show_widget_area( 'menu' ) ) {

			ob_start();
			dynamic_sidebar( 'octo-menu' );
			$html = ob_get_contents();
			ob_end_clean();

			$items .= '<li class="custom-menu-item">' . $html . '</li>';

		}

		return $items;

	}

}
