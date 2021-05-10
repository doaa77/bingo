/**
 * File navigation.js.
 *
 * Handles toggling the navigation menu for small screens and enables TAB key
 * navigation support for dropdown menus.
 *
 * @package octo
 * @since   1.0.0
 */

( function() {

	const body           = document.body;
	const siteNavigation = document.getElementById( 'site-navigation' );

	// Return early if the navigation doesn't exist.
	if ( ! siteNavigation ) {
		return;
	}

	const button          = document.getElementsByClassName( 'menu-toggle-button' )[0];
	const buttonContainer = document.getElementsByClassName( 'menu-toggle' )[0];

	// Return early if the button doesn't exist.
	if ( 'undefined' === typeof button ) {
		return;
	}

	const menu = siteNavigation.getElementsByTagName( 'ul' )[ 0 ];

	// Hide menu toggle button, if menu is empty and return early.
	if ( 'undefined' === typeof menu ) {
		buttonContainer.style.display = 'none';
		return;
	}

	// Toggle the .toggled class and the aria-expanded value each time the button is clicked.
	button.addEventListener( 'click', toggleMenu, true );

	// Remove the .toggled and .submenu-open class and set aria-expanded to false when the user clicks outside the navigation.
	document.addEventListener( 'click', function( event ) {

		const isClickButton = button.contains( event.target );
		const isClickInside = menu.contains( event.target );

		if ( ! isClickButton && ! isClickInside ) {
			closeMenu();
			closeSubmenu();
		}

	} );

	// Depending on the customizer settings, hovering the menu tiem, a click on the arrow icon or the menu item will open the sub-menu.
	// Hence we want to select all arrow icons or menu-item, that have child-elements as click target.
	let dropdownLinks;
	if ( body.classList.contains( 'dropdown-click-item' ) ) {
		dropdownLinks = menu.querySelectorAll( '.menu-item-has-children > a' );
	} else if ( body.classList.contains( 'dropdown-click-icon' ) || body.classList.contains( 'dropdown-hover' ) ) {
		dropdownLinks = menu.querySelectorAll( '.menu-item-has-children > a .submenu-toggle-icon' );
	}

	// Add event listener to all target elements.
	for ( const link of dropdownLinks ) {

		// Change target for elements, that are set to #.
		if ( body.classList.contains( 'dropdown-click-icon' ) || body.classList.contains( 'dropdown-hover' ) ) {
			var newLink = link.closest( 'a' );
			var href    = newLink.getAttribute( 'href' );
		}

		if ( 'null' != href && '#' == href ) {
			newLink.addEventListener( 'click' ,toggleSubmenu, true );
			newLink.addEventListener( 'keydown', toggleSubmenu, true );
		} else {
			link.addEventListener( 'click' ,toggleSubmenu, true );
			link.addEventListener( 'keydown', toggleSubmenu, true );
		}

	}

	// Get all the link elements within the menu.
	const menuLinks = menu.getElementsByTagName( 'a' );

	// Toggle focus each time a menu link is focused.
	for ( const link of menuLinks ) {
		link.addEventListener( 'focus', focusSubmenu, true );
		link.addEventListener( 'blur', focusSubmenu, true );
	}

	// Close menu and submenus, when menu changes from mobile to desktop navigation.
	let buttonContainerDisplay = window.getComputedStyle( buttonContainer ).display;
	window.addEventListener( 'resize', function() {

		if ( buttonContainerDisplay !== window.getComputedStyle( buttonContainer ).display ) {
			closeMenu();
			closeSubmenu();
			buttonContainerDisplay = window.getComputedStyle( buttonContainer ).display;
		}

	}, false );

	/**
	 * Toggles the navigation menu by adding or removing .toggled class.
	 */
	function toggleMenu() {

		siteNavigation.classList.toggle( 'toggled' );
		button.classList.toggle( 'toggled' );

		if ( button.getAttribute( 'aria-expanded' ) === 'true' ) {
			button.setAttribute( 'aria-expanded', 'false' );
		} else {
			button.setAttribute( 'aria-expanded', 'true' );
		}

		if ( siteNavigation.classList.contains( 'toggled' ) ) {

			menu.setAttribute( 'aria-hidden', 'false' );

			// If menu dropdown is set to hover, add tabindex to the dropdown icon
			// to ensure keyboard navigation for the mobile menu.
			if ( body.classList.contains( 'dropdown-hover' ) ) {
				for ( const target of dropdownLinks ) {
					target.setAttribute( 'tabindex', '0' );
				}
			}

			closeSubmenu();

		} else {

			menu.setAttribute( 'aria-hidden', 'true' );

			if ( body.classList.contains( 'dropdown-hover' ) ) {
				for ( const target of dropdownLinks ) {
					target.removeAttribute( 'tabindex', '0' );
				}
			}

		}

	}

	/**
	 * Closes navigation menu by removing .toggled class.
	 */
	function closeMenu() {

		siteNavigation.classList.remove( 'toggled' );
		menu.setAttribute( 'aria-hidden', 'true' );
		button.classList.remove( 'toggled' );
		button.setAttribute( 'aria-expanded', 'false' );

		if ( body.classList.contains( 'dropdown-hover' ) ) {
			for ( const target of dropdownLinks ) {
				target.removeAttribute( 'tabindex', '0' );
			}
		}

	}

	/**
	 * Toggles the submenu by adding or removing .submenu-open class.
	 */
	function toggleSubmenu() {

		if ( event.type === 'keydown' ) {
			var key = event.which || event.keyCode;
		}

		if ( ( event.type === 'click' || key === 13 ) && ( body.classList.contains( 'dropdown-click' ) || siteNavigation.classList.contains( 'toggled' ) ) ) {

			let self = this.closest( 'li' );

			//Prevent link from being executed.
			event.preventDefault();
			event.stopPropagation();

			// Get elements of all open child submenus by class name .submenu-open.
			var closestUl            = self.closest( 'ul' );
			var allOpenChildSubmenus = closestUl.querySelectorAll( '.submenu-open' );

			// Close all open child submenus by removing .submenu-open class.
			if ( ! self.classList.contains( 'submenu-open' ) && 0 < allOpenChildSubmenus.length ) {
				for ( var i = 0; i < allOpenChildSubmenus.length; i++ ) {
					var openChildSubmenu = allOpenChildSubmenus[i];
					openChildSubmenu.classList.remove( 'submenu-open' );
				}
			}

			self.classList.toggle( 'submenu-open' );

		}
	}

	/**
	 * Closes all open submenus by removing .submenu-open classes from all elements.
	 */
	function closeSubmenu() {

		var openSubmenus = document.querySelectorAll( '.submenu-open' );

		if ( 0 < openSubmenus.length ) {
			for ( var i = 0; i < openSubmenus.length; i++ ) {
				var openSubmenu = openSubmenus[i];
				openSubmenu.classList.remove( 'submenu-open' );
			}
		}

	}

	/**
	 * Closes the sub menu, when a menu item without a sub menu is focused.
	 */
	function focusSubmenu() {

		if ( body.classList.contains( 'dropdown-click' ) ) {

			let self = this.closest( 'li' );

			if ( ! self.classList.contains( 'menu-item-has-children' ) ) {
				let parent = self.parentNode;

				if ( ! parent.classList.contains( 'sub-menu' ) ) {
					closeSubmenu();
				}
			}

		} else {

			if ( event.type === 'focus' || event.type === 'blur' ) {

				let self = this;

				// Move up through the ancestors of the current link until we hit .nav-menu.
				while ( ! self.classList.contains( 'nav-menu' ) ) {
					// On li elements toggle the class .focus.
					if ( 'li' === self.tagName.toLowerCase() ) {
						self.classList.toggle( 'focus' );
					}
					self = self.parentNode;
				}

			}

		}

	}

}() );
