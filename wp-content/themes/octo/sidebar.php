<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Common;
?>

<?php if ( Common::show_sidebar() ) : ?>
<aside id="secondary" class="sidebar-widget-area">
	<div class="sidebar-widget-area-inner">
		<?php do_action( 'octo_before_sidebar' ); ?>
		<?php dynamic_sidebar( 'octo-sidebar' ); ?>
		<?php do_action( 'octo_after_sidebar' ); ?>
	</div><!-- .sidebar-widget-area-inner -->
</aside><!-- #secondary -->
<?php endif; ?>
