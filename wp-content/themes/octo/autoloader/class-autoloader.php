<?php
/**
 * Class Autoloader.
 *
 * @package octo
 * @since   1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * Automatically locates and loads files based on their namespaces and their
 * file names whenever they are instantiated.
 *
 * @since 1.0.0
 */
class Autoloader {

	/**
	 * Namespace prefix.
	 *
	 * @var String
	 */
	private $prefix;

	/**
	 * Base directory for namespace prefix.
	 *
	 * @var String
	 */
	private $base_dir;

	/**
	 * Constructor
	 *
	 * @param String $prefix   Class prefix.
	 * @param String $base_dir Base directory.
	 */
	public function __construct( $prefix, $base_dir ) {
		$this->prefix = $prefix;

		$this->base_dir = $base_dir;
	}

	/**
	 * Register loader with SPL autoloader stack.
	 *
	 * @return void
	 */
	public function register() {
		spl_autoload_register( array( $this, 'load_class' ) );
	}

	/**
	 * Loads the class file for a given class name.
	 *
	 * @param String $class Full class namen inculding namespace.
	 */
	public function load_class( $class ) {

		// Project-specific namespace prefix.
		$prefix = $this->prefix;

		/**
		 * Split up the incoming file.
		 * First element is the namespace prefix.
		 * Last element is the file name.
		 */
		$class_path = explode( '\\', $class );

		// Does the class use the namespace prefix?
		if ( $prefix !== reset( $class_path ) ) { // phpcs:ignore WordPress.PHP.YodaConditions
			// no, move to the next registered autoloader.
			return;
		}

		// Base directory for the namespace prefix.
		$base_dir = $this->base_dir;

		// Get the file name.
		$file_name = strtolower( end( $class_path ) );

		// Replace underscore in class name.
		$file_name = str_replace( '_', '-', $file_name );

		/**
		 * Build the file path.
		 * If there are subnamespaces, iterate through them and add them as subfolders to the file path.
		 * Ignore the first and last index, as these are the prefix and class name.
		 */
		$file_path = $base_dir;
		$count     = count( $class_path );
		for ( $i = 1; $i < $count - 1; $i++ ) {
			$file_path .= '/' . strtolower( $class_path[ $i ] );
		};

		// Build the complete file including the file path, the file name and the file ending.
		$file = $file_path . '/class-' . $file_name . '.php';

		// Ff the file exists, require it.
		if ( file_exists( $file ) ) {
			require $file;
		}

	}

}
