<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Academy Lite
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php if(is_singular() && pings_open()) { ?>
<link rel="pingback" href="<?php echo esc_url( get_bloginfo( 'pingback_url' )); ?>">
<?php } ?>
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php
	//wp_body_open hook from WordPress 5.2
	if ( function_exists( 'wp_body_open' ) ) {
	    wp_body_open();
	} else {
		do_action( 'wp_body_open' );
	}
?>
<a class="skip-link screen-reader-text" href="#sitemain">
	<?php _e( 'Skip to content', 'academy-lite' ); ?>
</a>
<?php
	$hidetphead = get_theme_mod('hide_tophead','1');
	if( $hidetphead == '' ){ 

	$tpphn = get_theme_mod('call-txt');
	$tpmail = get_theme_mod('email-txt');

	$fb = get_theme_mod('facebook');
	$tw = get_theme_mod('twitter');
	$yt = get_theme_mod('youtube');
	$in = get_theme_mod('linkedin');
	$pi = get_theme_mod('pinterest');
?>
	<div class="top-header">
		<div class="container">
			<div class="flex-element">
				<?php if( !empty ( $tpphn || $tpmail || $fb || $tw || $yt || $in || $pi ) ) { ?>
					<div class="top-header-left">
						<?php if( !empty ( $tpphn ) ){ ?>
							<div class="top-header-col icon-phn">
								<a href="mailto:<?php echo $tpphn; ?>"><i class="fa fa-phone"></i><?php echo $tpphn; ?></a>
							</div><!-- header col -->
						<?php } if( !empty ( $tpmail ) ){ ?>
							<div class="top-header-col icon-mail">
								<a href="mailto:<?php echo $tpmail; ?>"><i class="fa fa-envelope-o"></i><?php echo $tpmail; ?></a>
							</div><!-- header col -->
						<?php } if( !empty ( $fb || $tw || $yt || $in || $pi ) ){ ?>
							<div class="top-header-col">
								<div class="social-icons">
									<?php if( !empty ( $tw ) ) { ?>
										<a href="<?php echo $tw; ?>" target="_blank" title="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
									<?php } if( !empty ( $fb ) ) { ?>
										<a href="<?php echo $fb; ?>" target="_blank" title="facebook-f"><i class="fa fa-facebook-f" aria-hidden="true"></i></a>
									<?php } if( !empty ( $yt ) ) { ?>
										<a href="<?php echo $yt; ?>" target="_blank" title="youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
									<?php } if( !empty ( $in ) ) { ?>
										<a href="<?php echo $in; ?>" target="_blank" title="linkedin-in"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
									<?php } if( !empty ( $pi ) ) { ?>
										<a href="<?php echo $pi; ?>" target="_blank" title="pinterest-p"><i class="fa fa-pinterest-p" aria-hidden="true"></i></a>
									<?php } ?>
								</div>
							</div><!-- header col -->
						<?php } ?>
					</div><!-- top header left -->
				<?php } ?>
			</div><!-- flex -->
		</div><!-- container -->
	</div><!-- top header -->
<?php
	}
?>

<div id="header">
	<div class="header-inner container">
		  <div class="logo">
			<?php academy_lite_the_custom_logo(); ?>
				<h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php esc_html(bloginfo( 'name' )); ?></a></h1>

				<?php $description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
				<p><?php echo esc_html($description); ?></p>
			<?php endif; ?>
		 </div><!-- .logo -->                 
		<div id="navigation">
			<div class="toggle">
				<a class="toggleMenu" href="#"><?php esc_html_e('Menu','academy-lite'); ?></a>
			</div><!-- toggle --> 	
			<nav id="main-navigation" class="site-navigation primary-navigation sitenav" role="navigation">		
				<?php wp_nav_menu( array('theme_location' => 'primary') ); ?>
			</nav>
		</div><!-- navigation -->
	</div><!-- .header-inner--><div class="clear"></div>  
</div><!-- #header -->