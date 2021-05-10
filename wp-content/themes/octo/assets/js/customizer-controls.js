/**
 * File customizer-controls.js.
 *
 * Enhances customizer controls.
 *
 * @package octo
 * @since   1.0.0
 */

( function( $ ) {

	wp.customize.bind( 'ready', function () {

		/**
		 * Responsive preview buttons.
		 * Change preview for different devices. Depending on the selected preview device, different controls are active in the customizer.
		 */
		$( 'ul.octo-responsive-buttons button' ).click( function() {

			var body       = $( '.wp-full-overlay' ),
				device     = $( this ).data( 'device' ),
				controls   = $( '.customize-control .octo-controls-wrapper' ),
				buttons    = $( '.octo-responsive-buttons li' ),
				wp_devices = $( '.wp-full-overlay-footer .devices' );

			// Change preview for different devices.
			body.removeClass( 'preview-desktop preview-tablet preview-mobile' ).addClass( 'preview-' + device );

			// Display active control for respective device.
			controls.removeClass( 'active' );
			$( '.octo-controls-wrapper.' + device ).addClass( 'active' );

			// Change active state of responsive buttons.
			buttons.removeClass( 'active' );
			$( '.octo-responsive-buttons .' + device ).addClass( 'active' );

			// Change state of WP buttons in the footer.
			wp_devices.find( 'button' ).removeClass( 'active' ).attr( 'aria-pressed', false );
			wp_devices.find( 'button.preview-' + device ).addClass( 'active' ).attr( 'aria-pressed', true );

		} );

		$( '.wp-full-overlay-footer .devices button' ).click( function() {

			var device   = $( this ).data( 'device' ),
				controls = $( '.customize-control .octo-controls-wrapper' ),
				buttons  = $( '.octo-responsive-buttons li' );

			// Reset active state of responsive buttons.
			buttons.removeClass( 'active' );

			// Add active state to current button.
			$( '.octo-responsive-buttons .' + device ).addClass( 'active' );

			// Display active control for respective device.
			controls.removeClass( 'active' );
			$( '.octo-controls-wrapper.' + device ).addClass( 'active' );

		} );

	} );

} )( jQuery );
