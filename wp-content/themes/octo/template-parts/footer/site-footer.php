<?php
/**
 * Displays the site footer.
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Options as Options;
use octo\core\Common as Common;
use octo\core\Components as Components;

// Early exit, if there are no active footer widgets or footer is disabled.
if ( ! Common::show_widget_area( 'footer' ) || ! Common::show_footer() ) {
	return;
}
?>
<footer id="colophon" <?php Components::class( 'footer' ); ?>>
	<div class="site-container">
		<div class="site-container-inner">

		<?php
		$footer_widget_areas = Options::get_theme_option( 'footer_widget_areas' );
		for ( $i = 1; $i <= $footer_widget_areas; $i++ ) {
			dynamic_sidebar( 'octo-footer-' . $i );
		}
		?>

		</div><!-- .site-container-inner -->
	</div><!-- .site-container -->
</footer><!-- #colophon -->
