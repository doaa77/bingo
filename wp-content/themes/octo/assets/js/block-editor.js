/**
 * File block-editor.js.
 *
 * Enhances the block editor for a better user experience.
 *
 * @package octo
 * @since   1.0.0
 */

jQuery( document ).ready( function( $ ) {

	/**
	 * Calculate the content width depending on the selected content layout and sidebar layout in the metabox settings.
	 */
	var metabox = $( '#octo-settings-metabox' );

	metabox.on( 'change', 'select', function() {

		var contentLayout            = $( '#octo-content-layout option:selected' ).val(),
			sidebarLayoutMeta        = $( '#octo-sidebar-layout option:selected' ).val(),
			siteWidth                = parseInt( octoBlockEditor.siteWidth ),
			defaultSidebarLayout     = octoBlockEditor.defaultSidebarLayout,
			singularSidebarLayout    = octoBlockEditor.singularSidebarLayout,
			sidebarWidth             = parseInt( octoBlockEditor.sidebarWidth ),
			containerPaddingVertical = parseInt( octoBlockEditor.containerPaddingVertical ),
			sidebarMargin            = parseInt( octoBlockEditor.sidebarMargin ),
			sidebarLayout,
			contentWidth;

		// Calculate the content width.
		if ( 'full_width' == contentLayout ) {

			contentWidth = '100%';

			// Set CSS values.
			$( '.block-editor .editor-styles-wrapper' ).css( { 'padding-left': '0', 'padding-right': '0' } );
			$( '.block-editor .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > .wp-block[data-align="full"]' ).css( { 'margin-left': '0', 'margin-right': '0' } );

		} else {

			// Determine the sidebar layout. Metabox settings need to overwrite the customizer settings, in case they are set. If not, we will just use the customizer settings.
			if ( 'default' == sidebarLayoutMeta || 'undefined' == typeof sidebarLayoutMeta ) {

				sidebarLayout = defaultSidebarLayout;

				if ( 'default' != singularSidebarLayout && 'undefined' != typeof singularSidebarLayout ) {

					sidebarLayout = singularSidebarLayout;
				}

			} else {
				sidebarLayout = sidebarLayoutMeta;
			}

			// Calculate content width depending on if there is a sidebar or not.
			if ( 'disabled' == sidebarLayout || 'undefined' == typeof sidebarLayout ) {
				contentWidth = siteWidth - ( containerPaddingVertical * 2 ) + 'px';
			} else {
				contentWidth = ( siteWidth - ( containerPaddingVertical * 2 + sidebarMargin * 2 ) ) / 100 * ( 100 - sidebarWidth ) + 'px';
			}

			// Set CSS values.
			$( '.block-editor .editor-styles-wrapper' ).css( { 'padding-left': containerPaddingVertical, 'padding-right': containerPaddingVertical } );
			$( '.block-editor .editor-styles-wrapper .block-editor-block-list__layout.is-root-container > .wp-block[data-align="full"]' ).css( { 'margin-left': '-' + sidebarMargin + 'px', 'margin-right': '-' + sidebarMargin + 'px' } );

		}

		// Set CSS values.
		$( '.wp-block:not([data-align=full]), .wp-block-cover__inner-container' ).css( 'max-width', contentWidth );
		$( '.block-editor .editor-styles-wrapper blockquote' ).css( 'max-width', 'calc(' + contentWidth + ' - 3rem)' );
		$( '.block-editor .wp-block[data-align=wide]' ).css( 'max-width', 'calc(' + contentWidth + ' + 200px)' );

	} );

} );
