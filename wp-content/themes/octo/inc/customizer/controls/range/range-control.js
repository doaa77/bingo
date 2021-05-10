/**
 * File range-control.js
 *
 * Handles range control
 *
 * @package octo
 * @since   1.0.0
 */

( function( $ ) {

	wp.customize.controlConstructor['octo-range'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control = this;

			// Sync values for input range and number.
			this.container.on( 'input', 'input', function() {

				let value = $( this ).val(),
					input = $( this ).closest( '.octo-controls-wrapper' ).children( 'input:not(.octo-range-unit)' );

				input.val( value );
				input.change();

			} );

			// If value is bigger than max or smaller than min or not numeric, than reset value to default.
			this.container.on( 'input', 'input.octo-range-number', function() {

				let inputNumber = $( this ),
					inputRange  = $( this ).closest( '.octo-controls-wrapper' ).children( 'input.octo-range-slider' ),
					value       = parseInt( inputNumber.val() ),
					maxValue    = parseInt( inputNumber.attr( 'max' ) ),
					minValue    = parseInt( inputNumber.attr( 'min' ) );

				if ( value > maxValue ) {
					inputNumber.val( maxValue );
					inputNumber.trigger( 'input' );
				}

				if ( value < minValue || isNaN( value ) ) {
					inputNumber.val( minValue );
					inputNumber.trigger( 'input' );
				}

			} );

			// Change input attributes depending on the chosen unit.
			this.container.on( 'change', 'select.octo-range-unit', function() {

				let container      = jQuery( this ).closest( '.octo-controls-wrapper' ),
					inputRange     = container.find( 'input.octo-range-slider' ),
					inputNumber    = container.find( 'input.octo-range-number' ),
					inputUnit      = container.find( 'input.octo-range-unit' ),
					selectedOption = jQuery( this ).find( 'option:selected' ).val();


				let defaults = control.params[ 'inputAttrsDefaults' ][ selectedOption ];

				$.each( defaults, function( key, value ) {
					container.find( 'input' ).attr( key, value );
				} );

				inputNumber.trigger( 'input' );

			} );

			// Reset to default value
			this.container.on( 'click', 'button.octo-reset-button', function() {

				let selector     = ( control.params[ 'responsive' ] ) ? '.octo-controls-wrapper.active' : '.octo-controls-wrapper',
					container    = $( this ).parents( '.customize-control-octo-range' ).find( selector ),
					inputNumber  = container.find( 'input[type=number]' ),
					selectUnit   = container.find( 'select.octo-range-unit' ),
					defaultUnit  = selectUnit.data( 'default' ),
					defaultValue = container.find( 'input.octo-range-slider' ).data( 'default' ),
					optionsUnit  = container.find( 'select.octo-range-unit option' );

				optionsUnit.removeAttr( 'selected' );
				selectUnit.val( defaultUnit );
				inputNumber.val( defaultValue );
				selectUnit.trigger( 'change' );
				inputNumber.trigger( 'input' );

			} );

			// Save changes.
			this.container.on( 'input', 'input, select.octo-range-unit', function() {

				let setting,
					container   = jQuery( this ).closest( '.octo-controls-wrapper' ),
					inputNumber = container.find( 'input.octo-range-number' ),
					inputUnit   = container.find( 'input.octo-range-unit' ),
					selectUnit  = container.find( 'select.octo-range-unit option:selected' ),
					device      = inputNumber.data( 'device' );

				if ( control.params[ 'responsive' ] ) {
					setting = control.settings[device];
				} else {
					setting = control.setting;
				}

				// Determine, if value of the setting is a single string or an object.
				if ( 'string' == typeof setting.get() ) {
					var value;
					value = inputNumber.val();
				} else {
					var value      = {};
					value['value'] = inputNumber.val();

					if ( 0 < selectUnit.length ) {
						value['unit'] = selectUnit.val();
					} else {
						value['unit'] = inputUnit.val();
					}
				}

				setting.set( value );

			} );
		}
	} );
} )( jQuery );
