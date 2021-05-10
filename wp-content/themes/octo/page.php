<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Components;
get_header();
?>
<div id="content" class="site-content">
	<?php do_action( 'octo_before_content' ); ?>
	<div class="site-container">
		<div class="site-container-inner">			
			<main id="primary" class="site-main">                
				<div class="site-main-inner">
					<?php do_action( 'octo_before_content_inner' ); ?>
					<?php Components::breadcrumb_trail(); ?>
					<?php
					while ( have_posts() ) :
						the_post();
						Components::load_template_part_content( 'page' );
						
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;

					endwhile; // End of the loop.
					?>
					<?php do_action( 'octo_after_content_inner' ); ?>
				</div><!-- .site-main-inner -->
			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div><!-- .site-container-inner -->
	</div><!-- .site-container -->
	<?php do_action( 'octo_after_content' ); ?>
</div><!-- #content -->
<?php
get_footer();
