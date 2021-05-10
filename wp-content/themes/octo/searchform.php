<?php
/**
 * The template for displaying search forms.
 *
 * @package octo
 * @since  1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php echo apply_filters( 'octo_search_label', _x( 'Search for:', 'label', 'octo' ) ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
		<input type="search" class="search-field" placeholder="<?php echo esc_attr( apply_filters( 'octo_search_placeholder', _x( 'Search &hellip;', 'placeholder', 'octo' ) ) ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php echo esc_attr( apply_filters( 'octo_search_label', _x( 'Search for:', 'label', 'octo' ) ) ); ?>">
	</label>
	<?php

	$search_button_icon = esc_attr( apply_filters( 'octo_search_button_icon', false ) );

	if ( ! $search_button_icon ) {
		$search_button_icon = '<span class="dashicons dashicons-search"></span>';
	}

	printf(
		'<button class="search-submit" aria-label="%1$s">%2$s</button>',
		esc_attr( apply_filters( 'octo_search_button_label', _x( 'Search', 'submit button', 'octo' ) ) ),
		$search_button_icon // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	);
	?>
</form>
