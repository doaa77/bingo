<?php
/**
 * Template part for displaying the navigation menu.
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Options as Options;

// Get them options.
$header_layout      = Options::get_theme_option( 'header_layout' );
$toggle_button_text = Options::get_theme_option( 'toggle_button_text' );

?>
<div class="menu-toggle">
	<div class="menu-toggle-inner">
		<button class="menu-toggle-button" aria-controls="primary-menu" aria-expanded="false">
			<span class="menu-toggle-icon"></span>
			<?php if ( $toggle_button_text ) : ?>
			<span class="menu-toggle-text"><?php echo esc_html( $toggle_button_text ); ?></span>
			<?php endif; ?>
		</button>
	</div>
</div>
<nav id="site-navigation" class="main-navigation">
	<div class="nav-container">
		<div class="nav-container-inner">
			<?php
			$nav_menu = wp_nav_menu(
				array(
					'theme_location' => 'primary',
					'menu_id'        => 'primary-menu',
					'container'      => '',
					'menu_class'     => 'menu nav-menu',
				)
			);
			?>
		</div><!-- .nav-container-inner -->
	</div><!-- .nav-container -->
</nav><!-- #site-navigation -->
