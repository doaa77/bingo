<?php
/**
 * Font_Families class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class provides all system fonts, custom fonts as well as Google fonts as an array.
 *
 * @since 1.0.0
 */
class Font_Families {

	/**
	 * System fonts
	 *
	 * @since 1.0.0
	 * @var array
	 */
	private static $system_fonts = array();

	/**
	 * Google fonts
	 *
	 * @since 1.0.0
	 * @var array
	 */
	private static $google_fonts = array();

	/**
	 * Custom fonts
	 *
	 * @since 1.0.0
	 * @var array
	 */
	private static $custom_fonts = array();

	/**
	 * Return system fonts as array.
	 *
	 * @since 1.0.0
	 *
	 * @return Array All system fonts.
	 */
	public static function get_system_fonts() {

		if ( empty( self::$system_fonts ) ) {
			self::$system_fonts = array(
				'Arial'     => array(
					'fallback' => 'Helvetica, sans-serif',
					'variants' => array(
						'regular',
						'italic',
						'700',
						'700italic',
						'800',
					),
				),
				'Helvetica' => array(
					'fallback' => 'Verdana, sans-serif',
					'variants' => array(
						'regular',
						'italic',
						'700',
						'700italic',
						'800',
					),
				),
				'Verdana'   => array(
					'fallback' => 'Helvetica, sans-serif',
					'variants' => array(
						'regular',
						'italic',
						'700',
						'700italic',
						'800',
					),
				),
				'Georgia'   => array(
					'fallback' => 'Times, serif',
					'variants' => array(
						'regular',
						'italic',
						'700',
						'700italic',
						'800',
					),
				),
				'Times'     => array(
					'fallback' => 'Georgia, serif',
					'variants' => array(
						'regular',
						'italic',
						'700',
						'700italic',
						'800',
					),
				),
				'Courier'   => array(
					'fallback' => 'monospace',
					'variants' => array(
						'regular',
						'italic',
						'700',
						'700italic',
						'800',
					),
				),
			);
		}

		return self::$system_fonts;
	}

	/**
	 * Return all Google Fonts as array.
	 *
	 * @since 1.0.0
	 *
	 * @return Array All google fonts.
	 */
	public static function get_google_fonts() {

		if ( empty( self::$google_fonts ) ) {
			self::$google_fonts = array(
				'ABeeZee' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'sans-serif',
				),
				'Abel' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Abhaya Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'serif',
				),
				'Abril Fatface' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Aclonica' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Acme' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Actor' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Adamina' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Advent Pro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Aguafina Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Akronim' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Aladin' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Alata' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Alatsi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Aldrich' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Alef' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Alegreya' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Alegreya SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Alegreya Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Alegreya Sans SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Aleo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Alex Brush' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Alfa Slab One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Alice' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Alike' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Alike Angular' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Allan' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Allerta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Allerta Stencil' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Allura' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Almarai' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Almendra' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Almendra Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Almendra SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Amarante' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Amaranth' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Amatic SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Amethysta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Amiko' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Amiri' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Amita' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Anaheim' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Andada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Andika' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Andika New Basic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Angkor' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Annie Use Your Telescope' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Anonymous Pro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'monospace',
				),
				'Antic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Antic Didone' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Antic Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Anton' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Arapey' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Arbutus' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Arbutus Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Architects Daughter' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Archivo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Archivo Black' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Archivo Narrow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Aref Ruqaa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Arima Madurai' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '700', '800', '900' ),
					'category' => 'display',
				),
				'Arimo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'sans-serif',
				),
				'Arizonia' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Armata' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Arsenal' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Artifika' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Arvo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Arya' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Asap' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Asap Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Asar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Asset' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Assistant' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Astloch' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Asul' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Athiti' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Atma' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'display',
				),
				'Atomic Age' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Aubrey' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Audiowide' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Autour One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Average' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Average Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Averia Gruesa Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Averia Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'Averia Sans Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'Averia Serif Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'B612' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'B612 Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'monospace',
				),
				'Bad Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Bahiana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bahianita' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bai Jamjuree' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Baloo 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Bhai 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Bhaina 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Chettan 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Da 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Paaji 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Tamma 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Tammudu 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Baloo Thambi 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Balsamiq Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'Balthazar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Bangers' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Barlow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Barlow Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Barlow Semi Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Barriecito' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Barrio' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Basic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Baskervville' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Battambang' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Baumans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bayon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Be Vietnam' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic' ),
					'category' => 'sans-serif',
				),
				'Bebas Neue' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Belgrano' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Bellefair' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Belleza' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Bellota' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'Bellota Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'BenchNine' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Bentham' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Berkshire Swash' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Beth Ellen' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Bevan' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Big Shoulders Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Big Shoulders Inline Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Big Shoulders Inline Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Big Shoulders Stencil Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Big Shoulders Stencil Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Big Shoulders Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Bigelow Rules' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bigshot One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bilbo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Bilbo Swash Caps' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'BioRhyme' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '700', '800' ),
					'category' => 'serif',
				),
				'BioRhyme Expanded' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '700', '800' ),
					'category' => 'serif',
				),
				'Biryani' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Bitter' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Black And White Picture' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Black Han Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Black Ops One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Blinker' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Bodoni Moda' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Bokor' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bonbon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Boogaloo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bowlby One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bowlby One SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Brawler' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Bree Serif' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Bubblegum Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bubbler One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Buda' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300' ),
					'category' => 'display',
				),
				'Buenard' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Bungee' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bungee Hairline' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bungee Inline' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bungee Outline' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Bungee Shade' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Butcherman' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Butterfly Kids' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Cabin' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'sans-serif',
				),
				'Cabin Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Cabin Sketch' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Caesar Dressing' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Cagliostro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Cairo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '600', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Caladea' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Calistoga' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Calligraffitti' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Cambay' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Cambo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Candal' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Cantarell' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Cantata One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Cantora One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Capriola' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Cardo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'serif',
				),
				'Carme' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Carrois Gothic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Carrois Gothic SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Carter One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Castoro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Catamaran' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Caudex' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Caveat' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'handwriting',
				),
				'Caveat Brush' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Cedarville Cursive' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Ceviche One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Chakra Petch' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Changa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Changa One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'display',
				),
				'Chango' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Charm' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Charmonman' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Chathura' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Chau Philomene One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'sans-serif',
				),
				'Chela One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Chelsea Market' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Chenla' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Cherry Cream Soda' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Cherry Swash' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Chewy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Chicle' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Chilanka' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Chivo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Chonburi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Cinzel' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'serif',
				),
				'Cinzel Decorative' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700', '900' ),
					'category' => 'display',
				),
				'Clicker Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Coda' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '800' ),
					'category' => 'display',
				),
				'Coda Caption' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '800' ),
					'category' => 'sans-serif',
				),
				'Codystar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular' ),
					'category' => 'display',
				),
				'Coiny' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Combo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Comfortaa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'display',
				),
				'Comic Neue' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'handwriting',
				),
				'Coming Soon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Commissioner' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Concert One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Condiment' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Content' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Contrail One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Convergence' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Cookie' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Copse' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Corben' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Cormorant' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Cormorant Garamond' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Cormorant Infant' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Cormorant SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Cormorant Unicase' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Cormorant Upright' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Courgette' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Courier Prime' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'monospace',
				),
				'Cousine' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'monospace',
				),
				'Coustard' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '900' ),
					'category' => 'serif',
				),
				'Covered By Your Grace' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Crafty Girls' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Creepster' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Crete Round' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Crimson Pro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Crimson Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '600', '600italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Croissant One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Crushed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Cuprum' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'sans-serif',
				),
				'Cute Font' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Cutive' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Cutive Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'DM Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '500', '500italic' ),
					'category' => 'monospace',
				),
				'DM Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'DM Serif Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'DM Serif Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Damion' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Dancing Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'handwriting',
				),
				'Dangrek' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Darker Grotesque' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'David Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '700' ),
					'category' => 'serif',
				),
				'Dawning of a New Day' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Days One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Dekko' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Delius' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Delius Swash Caps' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Delius Unicase' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Della Respira' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Denk One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Devonshire' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Dhurjati' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Didact Gothic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Diplomata' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Diplomata SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Do Hyeon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Dokdo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Domine' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Donegal One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Doppio One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Dorsa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Dosis' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Dr Sugiyama' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Duru Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Dynalight' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'EB Garamond' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', 'italic', '500italic', '600italic', '700italic', '800italic' ),
					'category' => 'serif',
				),
				'Eagle Lake' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'East Sea Dokdo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Eater' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Economica' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Eczar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'serif',
				),
				'El Messiri' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Electrolize' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Elsie' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '900' ),
					'category' => 'display',
				),
				'Elsie Swash Caps' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '900' ),
					'category' => 'display',
				),
				'Emblema One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Emilys Candy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Encode Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Encode Sans Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Encode Sans Expanded' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Encode Sans Semi Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Encode Sans Semi Expanded' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Engagement' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Englebert' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Enriqueta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Epilogue' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Erica One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Esteban' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Euphoria Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Ewert' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Exo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Exo 2' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Expletus Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'display',
				),
				'Fahkwang' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Fanwood Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Farro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '700' ),
					'category' => 'sans-serif',
				),
				'Farsan' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fascinate' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fascinate Inline' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Faster One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fasthand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Fauna One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Faustina' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'serif',
				),
				'Federant' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Federo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Felipa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Fenix' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Finger Paint' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fira Code' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'monospace',
				),
				'Fira Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '700' ),
					'category' => 'monospace',
				),
				'Fira Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Fira Sans Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Fira Sans Extra Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Fjalla One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Fjord One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Flamenco' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular' ),
					'category' => 'display',
				),
				'Flavors' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fondamento' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'handwriting',
				),
				'Fontdiner Swanky' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Forum' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Francois One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Frank Ruhl Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '700', '900' ),
					'category' => 'serif',
				),
				'Fraunces' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Freckle Face' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fredericka the Great' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fredoka One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Freehand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fresca' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Frijole' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fruktur' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Fugaz One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'GFS Didot' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'GFS Neohellenic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Gabriela' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Gaegu' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Gafata' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Galada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Galdeano' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Galindo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Gamja Flower' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Gayathri' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Gelasio' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Gentium Basic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Gentium Book Basic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Geo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'sans-serif',
				),
				'Geostar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Geostar Fill' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Germania One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Gidugu' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Gilda Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Girassol' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Give You Glory' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Glass Antiqua' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Glegoo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Gloria Hallelujah' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Goblin One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Gochi Hand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Goldman' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Gorditas' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Gothic A1' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Gotu' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Goudy Bookletter 1911' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Graduate' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Grand Hotel' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Grandstander' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'display',
				),
				'Gravitas One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Great Vibes' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Grenze' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Grenze Gotisch' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Griffy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Gruppo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Gudea' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'sans-serif',
				),
				'Gugi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Gupter' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '700' ),
					'category' => 'serif',
				),
				'Gurajada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Habibi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Hachi Maru Pop' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Halant' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Hammersmith One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Hanalei' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Hanalei Fill' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Handlee' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Hanuman' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Happy Monkey' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Harmattan' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Headland One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Heebo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Henny Penny' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Hepta Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'serif',
				),
				'Herr Von Muellerhoff' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Hi Melody' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Hind' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Hind Guntur' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Hind Madurai' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Hind Siliguri' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Hind Vadodara' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Holtwood One SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Homemade Apple' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Homenaje' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'IBM Plex Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'monospace',
				),
				'IBM Plex Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'IBM Plex Sans Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'IBM Plex Serif' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'IM Fell DW Pica' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'IM Fell DW Pica SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'IM Fell Double Pica' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'IM Fell Double Pica SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'IM Fell English' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'IM Fell English SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'IM Fell French Canon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'IM Fell French Canon SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'IM Fell Great Primer' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'IM Fell Great Primer SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Ibarra Real Nova' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'serif',
				),
				'Iceberg' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Iceland' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Imbue' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'serif',
				),
				'Imprima' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Inconsolata' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'monospace',
				),
				'Inder' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Indie Flower' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Inika' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Inknut Antiqua' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'serif',
				),
				'Inria Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Inria Serif' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Inter' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Irish Grover' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Istok Web' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Italiana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Italianno' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Itim' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Jacques Francois' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Jacques Francois Shadow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Jaldi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'JetBrains Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic' ),
					'category' => 'monospace',
				),
				'Jim Nightshade' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Jockey One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Jolly Lodger' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Jomhuria' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Jomolhari' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Josefin Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'sans-serif',
				),
				'Josefin Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'serif',
				),
				'Jost' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Joti One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Jua' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Judson' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'serif',
				),
				'Julee' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Julius Sans One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Junge' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Jura' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Just Another Hand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Just Me Again Down Here' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'K2D' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic' ),
					'category' => 'sans-serif',
				),
				'Kadwa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Kalam' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Kameron' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Kanit' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Kantumruy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Karla' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic' ),
					'category' => 'sans-serif',
				),
				'Karma' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Katibeh' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kaushan Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Kavivanar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Kavoon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kdam Thmor' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Keania One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kelly Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kenia' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Khand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Khmer' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Khula' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Kirang Haerang' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kite One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Knewave' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'KoHo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Kodchasan' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Kosugi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Kosugi Maru' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Kotta One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Koulen' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kranky' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kreon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Kristi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Krona One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Krub' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Kufam' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'display',
				),
				'Kulim Park' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Kumar One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kumar One Outline' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Kumbh Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Kurale' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'La Belle Aurore' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Lacquer' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Laila' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Lakki Reddy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Lalezar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Lancelot' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Langar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Lateef' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Lato' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '300', '300italic', 'regular', 'italic', '700', '700italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'League Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Leckerli One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Ledger' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Lekton' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'sans-serif',
				),
				'Lemon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Lemonada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'display',
				),
				'Lexend Deca' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Lexend Exa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Lexend Giga' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Lexend Mega' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Lexend Peta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Lexend Tera' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Lexend Zetta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Libre Barcode 128' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Libre Barcode 128 Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Libre Barcode 39' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Libre Barcode 39 Extended' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Libre Barcode 39 Extended Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Libre Barcode 39 Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Libre Barcode EAN13 Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Libre Baskerville' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'serif',
				),
				'Libre Caslon Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Libre Caslon Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'serif',
				),
				'Libre Franklin' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Life Savers' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700', '800' ),
					'category' => 'display',
				),
				'Lilita One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Lily Script One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Limelight' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Linden Hill' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Literata' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Liu Jian Mao Cao' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Livvic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Lobster' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Lobster Two' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'Londrina Outline' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Londrina Shadow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Londrina Sketch' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Londrina Solid' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '900' ),
					'category' => 'display',
				),
				'Long Cang' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Lora' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'serif',
				),
				'Love Ya Like A Sister' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Loved by the King' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Lovers Quarrel' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Luckiest Guy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Lusitana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Lustria' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'M PLUS 1p' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'M PLUS Rounded 1c' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Ma Shan Zheng' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Macondo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Macondo Swash Caps' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Mada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Magra' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Maiden Orange' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Maitree' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Major Mono Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'Mako' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Mali' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'handwriting',
				),
				'Mallanna' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Mandali' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Manjari' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Manrope' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Mansalva' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Manuale' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'serif',
				),
				'Marcellus' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Marcellus SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Marck Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Margarine' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Markazi Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Marko One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Marmelad' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Martel' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '600', '700', '800', '900' ),
					'category' => 'serif',
				),
				'Martel Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Marvel' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Mate' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Mate SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Maven Pro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'McLaren' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Meddon' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'MedievalSharp' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Medula One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Meera Inimai' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Megrim' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Meie Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Merienda' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Merienda One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Merriweather' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Merriweather Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700', '800', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic' ),
					'category' => 'sans-serif',
				),
				'Metal' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Metal Mania' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Metamorphous' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Metrophobic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Michroma' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Milonga' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Miltonian' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Miltonian Tattoo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Mina' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Miniver' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Miriam Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Mirza' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'display',
				),
				'Miss Fajardose' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Mitr' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Modak' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Modern Antiqua' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Mogra' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Molengo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Molle' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'italic' ),
					'category' => 'handwriting',
				),
				'Monda' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Monofett' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Monoton' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Monsieur La Doulaise' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Montaga' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Montez' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Montserrat' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Montserrat Alternates' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Montserrat Subrayada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Moul' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Moulpali' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Mountains of Christmas' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Mouse Memoirs' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Mr Bedfort' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Mr Dafoe' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Mr De Haviland' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Mrs Saint Delafield' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Mrs Sheppards' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Mukta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Mukta Mahee' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Mukta Malar' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Mukta Vaani' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Mulish' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800', '900', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'MuseoModerno' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Mystery Quest' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'NTR' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Nanum Brush Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Nanum Gothic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Nanum Gothic Coding' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'monospace',
				),
				'Nanum Myeongjo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700', '800' ),
					'category' => 'serif',
				),
				'Nanum Pen Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Nerko One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Neucha' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Neuton' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', 'italic', '700', '800' ),
					'category' => 'serif',
				),
				'New Rocker' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'News Cycle' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Niconne' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Niramit' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Nixie One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Nobile' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Nokora' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Norican' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Nosifer' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Notable' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Nothing You Could Do' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Noticia Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Noto Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Noto Sans HK' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Noto Sans JP' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Noto Sans KR' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Noto Sans SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Noto Sans TC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Noto Serif' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Noto Serif JP' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '900' ),
					'category' => 'serif',
				),
				'Noto Serif KR' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '900' ),
					'category' => 'serif',
				),
				'Noto Serif SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '900' ),
					'category' => 'serif',
				),
				'Noto Serif TC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '900' ),
					'category' => 'serif',
				),
				'Nova Cut' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Nova Flat' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Nova Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'Nova Oval' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Nova Round' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Nova Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Nova Slim' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Nova Square' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Numans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Nunito' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Nunito Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Odibee Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Odor Mean Chey' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Offside' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Old Standard TT' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'serif',
				),
				'Oldenburg' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Oleo Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Oleo Script Swash Caps' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Open Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic' ),
					'category' => 'sans-serif',
				),
				'Open Sans Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', '700' ),
					'category' => 'sans-serif',
				),
				'Oranienbaum' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Orbitron' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Oregano' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'display',
				),
				'Orienta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Original Surfer' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Oswald' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Over the Rainbow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Overlock' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic', '900', '900italic' ),
					'category' => 'display',
				),
				'Overlock SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Overpass' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Overpass Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '600', '700' ),
					'category' => 'monospace',
				),
				'Ovo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Oxanium' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'display',
				),
				'Oxygen' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Oxygen Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'PT Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'PT Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'PT Sans Caption' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'PT Sans Narrow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'PT Serif' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'PT Serif Caption' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Pacifico' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Padauk' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Palanquin' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Palanquin Dark' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Pangolin' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Paprika' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Parisienne' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Passero One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Passion One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700', '900' ),
					'category' => 'display',
				),
				'Pathway Gothic One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Patrick Hand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Patrick Hand SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Pattaya' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Patua One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Pavanam' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Paytone One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Peddana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Peralta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Permanent Marker' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Petit Formal Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Petrona' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Philosopher' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Piazzolla' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Piedra' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Pinyon Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Pirata One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Plaster' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Play' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Playball' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Playfair Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Playfair Display SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Podkova' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'serif',
				),
				'Poiret One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Poller One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Poly' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Pompiere' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Pontano Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Poor Story' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Poppins' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Port Lligat Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Port Lligat Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Potta One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Pragati Narrow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Prata' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Preahvihear' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Press Start 2P' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Pridi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Princess Sofia' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Prociono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Prompt' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Prosto One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Proza Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic' ),
					'category' => 'sans-serif',
				),
				'Public Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Puritan' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Purple Purse' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Quando' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Quantico' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Quattrocento' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Quattrocento Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Questrial' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Quicksand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Quintessential' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Qwigley' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Racing Sans One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Radley' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Rajdhani' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Rakkas' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Raleway' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Raleway Dots' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Ramabhadra' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Ramaraja' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Rambla' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Rammetto One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Ranchers' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Rancho' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Ranga' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Rasa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Rationale' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Ravi Prakash' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Recursive' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Red Hat Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '700', '700italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Red Hat Text' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '500', '500italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Red Rose' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'display',
				),
				'Redressed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Reem Kufi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Reenie Beanie' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Revalia' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Rhodium Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Ribeye' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Ribeye Marrow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Righteous' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Risque' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Roboto' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Roboto Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Roboto Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'monospace',
				),
				'Roboto Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'serif',
				),
				'Rochester' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Rock Salt' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Rokkitt' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'serif',
				),
				'Romanesco' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Ropa Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'sans-serif',
				),
				'Rosario' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700', '300italic', 'italic', '500italic', '600italic', '700italic' ),
					'category' => 'sans-serif',
				),
				'Rosarivo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Rouge Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Rowdies' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'display',
				),
				'Rozha One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Rubik' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700', '800', '900', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Rubik Mono One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Ruda' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Rufina' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Ruge Boogie' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Ruluko' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Rum Raisin' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Ruslan Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Russo One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Ruthie' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Rye' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sacramento' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Sahitya' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Sail' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Saira' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Saira Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Saira Extra Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Saira Semi Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Saira Stencil One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Salsa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sanchez' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Sancreek' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sansita' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Sansita Swashed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'display',
				),
				'Sarabun' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic' ),
					'category' => 'sans-serif',
				),
				'Sarala' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Sarina' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sarpanch' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Satisfy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Sawarabi Gothic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Sawarabi Mincho' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Scada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Scheherazade' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Schoolbell' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Scope One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Seaweed Script' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Secular One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Sedgwick Ave' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Sedgwick Ave Display' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Sen' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Sevillana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Seymour One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Shadows Into Light' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Shadows Into Light Two' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Shanti' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Share' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'display',
				),
				'Share Tech' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Share Tech Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'Shojumaru' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Short Stack' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Shrikhand' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Siemreap' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sigmar One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Signika' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Signika Negative' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Simonetta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '900', '900italic' ),
					'category' => 'display',
				),
				'Single Day' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sintony' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Sirin Stencil' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Six Caps' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Skranji' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Slabo 13px' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Slabo 27px' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Slackey' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Smokum' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Smythe' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sniglet' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '800' ),
					'category' => 'display',
				),
				'Snippet' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Snowburst One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sofadi One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sofia' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Solway' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '700', '800' ),
					'category' => 'serif',
				),
				'Song Myung' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Sonsie One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sora' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Sorts Mill Goudy' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'serif',
				),
				'Source Code Pro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '900', '900italic' ),
					'category' => 'monospace',
				),
				'Source Sans Pro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Source Serif Pro' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Space Grotesk' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Space Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'monospace',
				),
				'Spartan' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Special Elite' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Spectral' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic' ),
					'category' => 'serif',
				),
				'Spectral SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic' ),
					'category' => 'serif',
				),
				'Spicy Rice' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Spinnaker' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Spirax' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Squada One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sree Krushnadevaraya' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Sriracha' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Srisakdi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Staatliches' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Stalemate' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Stalinist One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Stardos Stencil' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Stint Ultra Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Stint Ultra Expanded' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Stoke' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular' ),
					'category' => 'serif',
				),
				'Strait' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Stylish' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Sue Ellen Francisco' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Suez One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Sulphur Point' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Sumana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Sunflower' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '500', '700' ),
					'category' => 'sans-serif',
				),
				'Sunshiney' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Supermercado One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Sura' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'serif',
				),
				'Suranna' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Suravaram' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Suwannaphum' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Swanky and Moo Moo' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Syncopate' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'sans-serif',
				),
				'Syne' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Syne Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'Syne Tactile' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Tajawal' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '700', '800', '900' ),
					'category' => 'sans-serif',
				),
				'Tangerine' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'handwriting',
				),
				'Taprom' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Tauri' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Taviraj' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Teko' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Telex' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Tenali Ramakrishna' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Tenor Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Text Me One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Texturina' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Thasadith' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'The Girl Next Door' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Tienne' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700', '900' ),
					'category' => 'serif',
				),
				'Tillana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800' ),
					'category' => 'handwriting',
				),
				'Timmana' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Tinos' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Titan One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Titillium Web' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '200italic', '300', '300italic', 'regular', 'italic', '600', '600italic', '700', '700italic', '900' ),
					'category' => 'sans-serif',
				),
				'Tomorrow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'sans-serif',
				),
				'Trade Winds' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Trirong' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '100italic', '200', '200italic', '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic', '800', '800italic', '900', '900italic' ),
					'category' => 'serif',
				),
				'Trispace' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800' ),
					'category' => 'sans-serif',
				),
				'Trocchi' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Trochut' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700' ),
					'category' => 'display',
				),
				'Trykker' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Tulpen One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Turret Road' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '700', '800' ),
					'category' => 'display',
				),
				'Ubuntu' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '500', '500italic', '700', '700italic' ),
					'category' => 'sans-serif',
				),
				'Ubuntu Condensed' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Ubuntu Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'monospace',
				),
				'Ultra' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Uncial Antiqua' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Underdog' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Unica One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'UnifrakturCook' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '700' ),
					'category' => 'display',
				),
				'UnifrakturMaguntia' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Unkempt' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
				'Unlock' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Unna' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'VT323' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'monospace',
				),
				'Vampiro One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Varela' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Varela Round' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Varta' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Vast Shadow' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Vesper Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '700', '900' ),
					'category' => 'serif',
				),
				'Viaoda Libre' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Vibes' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Vibur' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Vidaloka' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Viga' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Voces' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Volkhov' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Vollkorn' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '500', '600', '700', '800', '900', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'serif',
				),
				'Vollkorn SC' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '600', '700', '900' ),
					'category' => 'serif',
				),
				'Voltaire' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Waiting for the Sunrise' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Wallpoet' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Walter Turncoat' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Warnes' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Wellfleet' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Wendy One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Wire One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'Work Sans' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '200', '300', 'regular', '500', '600', '700', '800', '900', '100italic', '200italic', '300italic', 'italic', '500italic', '600italic', '700italic', '800italic', '900italic' ),
					'category' => 'sans-serif',
				),
				'Xanh Mono' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', 'italic' ),
					'category' => 'monospace',
				),
				'Yanone Kaffeesatz' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '200', '300', 'regular', '500', '600', '700' ),
					'category' => 'sans-serif',
				),
				'Yantramanav' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '100', '300', 'regular', '500', '700', '900' ),
					'category' => 'sans-serif',
				),
				'Yatra One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Yellowtail' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Yeon Sung' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Yeseva One' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'Yesteryear' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Yrsa' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', 'regular', '500', '600', '700' ),
					'category' => 'serif',
				),
				'Yusei Magic' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'sans-serif',
				),
				'ZCOOL KuaiLe' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'ZCOOL QingKe HuangYou' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'display',
				),
				'ZCOOL XiaoWei' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'serif',
				),
				'Zeyada' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Zhi Mang Xing' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular' ),
					'category' => 'handwriting',
				),
				'Zilla Slab' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( '300', '300italic', 'regular', 'italic', '500', '500italic', '600', '600italic', '700', '700italic' ),
					'category' => 'serif',
				),
				'Zilla Slab Highlight' => array( // phpcs:ignore WordPress.Arrays.MultipleStatementAlignment
					'variants' => array( 'regular', '700' ),
					'category' => 'display',
				),
			);
		}

		$disable_google_fonts = apply_filters( 'octo_disable_google_fonts', false );

		// Return Google Fonts, if not disabled.
		if ( ! $disable_google_fonts ) {
			return self::$google_fonts;
		}

	}

	/**
	 * Return custom fonts as array.
	 * Use the filter hook octo_enqueue_custom_fonts to enqueue custom fonts.
	 *
	 * @since 1.0.0
	 *
	 * @return Array All custom fonts.
	 */
	public static function get_custom_fonts() {

		$custom_fonts = apply_filters( 'octo_enqueue_custom_fonts', null );

		if ( empty( self::$custom_fonts ) && ! empty( $custom_fonts ) ) {

			$defaults = array(
				'fallback' => '',
				'variants' => array(),
			);

			foreach ( $custom_fonts as $key => $args ) {

				$custom_fonts[ $key ] = wp_parse_args( $args, $defaults );
			}

			self::$custom_fonts = $custom_fonts;

		}

		return self::$custom_fonts;

	}

}
