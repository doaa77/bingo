<?php
/**
 * Template part for displaying the custom logo and the site title.
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Options as Options;
use octo\core\Components as Components;

$site_title          = get_bloginfo( 'name' );
$description         = get_bloginfo( 'description', 'display' );
$display_description = Options::get_theme_option( 'display_description' );
$custom_logo_id      = get_theme_mod( 'custom_logo' );
$mobile_logo_src     = Options::get_theme_option( 'mobile_logo' );
$mobile_logo_id      = attachment_url_to_postid( $mobile_logo_src );
?>

<div class="site-branding">    
	<?php
	// Load custom logo.
	Components::custom_logo(
		$custom_logo_id,
		'',
		array(
			'class' => 'custom-logo',
			'size'  => 'octo-logo-size',
		)
	);

	// Load mobile logo.
	Components::custom_logo(
		$mobile_logo_id,
		'mobile',
		array(
			'class' => 'custom-logo-mobile',
			'size'  => 'octo-mobile-logo-size',
		)
	);

	if ( ! has_custom_logo() ) :
		if ( is_front_page() && is_home() ) :
			?>
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $site_title ); ?></a></h1>
			<?php
		else :
			?>
			<div class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html( $site_title ); ?></a></div>
			<?php
		endif;
		if ( $description && $display_description ) :
			?>
			<p class="site-description"><?php echo esc_html( $description ); ?></p>        
			<?php
		endif;
	endif;
	?>
</div><!-- .site-branding -->
