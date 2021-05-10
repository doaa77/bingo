<?php
/**
 * Widget class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\setup;

use octo\core\Options;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * Register theme widget areas.
 *
 * @since 1.0.0
 */
class Widget {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_action( 'widgets_init', array( $this, 'register' ) );
	}

	/**
	 * Register widget area.
	 *
	 * @since 1.0.0
	 */
	public function register() {

		// Create array with all widget areas.
		$widget_areas = array();

		$widget_areas['octo-sidebar'] = array(
			'name'           => esc_html__( 'Sidebar', 'octo' ),
			'before_sidebar' => '',
			'after_sidebar'  => '',
		);

		$widget_areas['octo-header'] = array(
			'name'           => esc_html__( 'Header', 'octo' ),
			'before_sidebar' => '<div class="header-widget-area">',
			'after_sidebar'  => '</div>',
		);

		$widget_areas['octo-menu'] = array(
			'name'           => esc_html__( 'Menu', 'octo' ),
			'before_sidebar' => '<div class="menu-widget-area">',
			'after_sidebar'  => '</div>',
		);

		$footer_widget_areas = apply_filters( 'octo_footer_widget_areas', 5 );

		for ( $i = 1; $i <= $footer_widget_areas; $i++ ) {
			$widget_areas[ 'octo-footer-' . $i ] = array(
				'name'           => esc_html__( 'Footer', 'octo' ) . ' ' . $i,
				'before_sidebar' => '<div class="footer-widget-area-' . $i . ' footer-widget-area">',
				'after_sidebar'  => '</div>',
			);
		}

		// Register widget areas from array.
		foreach ( $widget_areas as $widget_id => $args ) {

			register_sidebar(
				array(
					'name'           => $args['name'],
					'id'             => $widget_id,
					'description'    => esc_html__( 'Add widgets here.', 'octo' ),
					'before_widget'  => '<section id="%1$s" class="widget %2$s">',
					'after_widget'   => '</section>',
					'before_title'   => '<h2 class="widget-title">',
					'after_title'    => '</h2>',
					'before_sidebar' => $args['before_sidebar'],
					'after_sidebar'  => $args['after_sidebar'],
				)
			);

		}

	}

}
