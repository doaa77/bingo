<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package octo
 * @since   1.0.0
 */

/**
 * Define theme constants
 */
if ( ! defined( 'THEME_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'THEME_VERSION', '1.0.0' );
}

if ( ! defined( 'THEME_SETTINGS' ) ) {
	// Replace the version number of the theme on each release.
	define( 'THEME_SETTINGS', 'octo_settings' );
}

/**
 * Class autoloader
 */
require get_template_directory() . '/autoloader/class-autoloader.php';

$loader = new Autoloader( 'octo', __DIR__ . '/inc' );
$loader->register();

/**
 * Init theme
 */
$theme = new octo\Theme();
$theme->init();

