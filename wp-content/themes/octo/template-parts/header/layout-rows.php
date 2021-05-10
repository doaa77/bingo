<?php
/**
 * Template part for displaying header row layout.
 *
 * @package octo
 * @since   1.0.0
 */

?>

<div class="site-container">
	<div class="site-container-inner">
		<?php get_template_part( 'template-parts/header/site-branding' ); ?>
		<?php get_template_part( 'template-parts/header/widget-area' ); ?>        
	</div><!-- .site-container-inner -->
</div><!-- .site-container -->
<?php get_template_part( 'template-parts/header/primary-menu' ); ?>
