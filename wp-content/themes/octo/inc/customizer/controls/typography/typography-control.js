/**
 * File typography-control.js
 *
 * Handles typography control
 *
 * @package octo
 * @since 1.0.0
 */

( function( $ ) {

	wp.customize.controlConstructor['octo-typography'] = wp.customize.Control.extend({

		ready: function() {

			'use strict';

			var control        = this,
				currentVariant = control.params[ 'variant' ].value;

			// Load variants and select the last saved variant.
			control.loadVariants();
			$( this.container ).find( '.octo-typography-font-variant option[value="' + currentVariant + '"]' ).attr( 'selected', 'selected' );

			this.container.on( 'change', '.octo-typography-font-family', function() {

				control.loadVariants();

			} );

			// Save changes.
			this.container.on( 'change', 'select', function() {

				let container     = $( this ).closest( '.octo-controls-wrapper' ),
					selectFamily  = container.find( '.octo-typography-font-family' ),
					selectVariant = container.find( '.octo-typography-font-variant' ),
					familyValue   = selectFamily.find( 'option:selected' ).val(),
					variantValue  = selectVariant.find( 'option:selected' ).val();

				if ( 'undefined' === typeof variantValue ) {
					variantValue = '';
				}

				control.settings[ 'family' ].set( familyValue );
				control.settings[ 'variant' ].set( variantValue );

			});

		},

		/**
		 * Load font-variants for a selected font-family
		 *
		 * @since 1.0.0
		 */
		loadVariants: function() {

			'use strict';

			var control = this;

			let containerFamily   = $( this.container ).find( '.octo-controls-wrapper .font-family' ),
				containerVariants = $( this.container ).find( '.octo-controls-wrapper .variants' ),
				selectedFamily    = containerFamily.find( '.octo-typography-font-family option:selected' ),
				familyValue       = selectedFamily.val(),
				selectVariant     = containerVariants.find( '.octo-typography-font-variant' ),
				optGroup          = selectedFamily.parent(),
				fontType,
				variants;

			// Hide select for variants.
			containerVariants.hide();

			// Remove every options from the select.
			selectVariant.find( 'option' ).remove();

			// Early exit if font-family is undefined or inherit.
			if ( 'undefined' === typeof familyValue || 'inherit' === familyValue ) {
				return;
			}

			// Determine, if selected font is a custom font, system font or google font.
			switch ( optGroup.attr( 'label' ) ) {
				case 'Custom Fonts':
					fontType = 'customFonts';
				break;
				case 'System Fonts':
					fontType = 'systemFonts';
				break;
				case 'Google Fonts':
					fontType = 'googleFonts';
				break;
			}

			// Select variant for seletec font.
			variants = octoTypography[ fontType ][ familyValue ].variants;

			// Iterate through all variants and add them as option to the select.

			if ( 1 < variants.length ) {
				$.each( variants, function( key, variant ) {
					selectVariant.append( $( '<option></option>' ).attr( 'value', variant ).text( variant ) );

					if ( 'regular' == variant || '400' == variant ) {
						containerVariants.find( '.octo-typography-font-variant option[value="' + variant + '"]' ).attr( 'selected', 'selected' );
					}
				} );

				// Show select for variants.
				containerVariants.show();
			}

		},

	});
} )( jQuery );

jQuery( document ).ready( function( $ ) {

	$( '.octo-typography-font-family' ).select2( { width: '100%' } );

} );
