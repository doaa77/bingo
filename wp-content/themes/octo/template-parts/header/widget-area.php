<?php
/**
 * Template part for displaying the header widget area.
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Common as Common;

if ( Common::show_widget_area( 'header' ) ) {
	dynamic_sidebar( 'octo-header' );
}
