<?php
/**
 * Displays the site header.
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Options as Options;
use octo\core\Components as Components;
use octo\core\Common as Common;

// Get settings for header layout.
$header_layout = Options::get_theme_option( 'header_layout' );
$template_file = Common::get_template_file( $header_layout );

// Early exit, if header is disabled.
if ( ! Common::show_header() ) {
	return;
}
?>

<?php do_action( 'octo_before_header' ); ?>
<header id="masthead" <?php Components::class( 'header' ); ?>>
	<?php get_template_part( 'template-parts/header/' . $template_file ); ?>
</header><!-- #masthead -->
<?php do_action( 'octo_after_header' ); ?>
