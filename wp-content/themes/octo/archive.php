<?php
/**
 * The template for displaying archive pages.
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
					<?php if ( have_posts() ) : ?>

						<header class="page-header">
							<?php
							the_archive_title( '<h1 class="page-title">', '</h1>' );
							the_archive_description( '<div class="archive-description">', '</div>' );
							?>
						</header><!-- .page-header -->
						<div class="site-posts">

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/*
							 * Include the Post-Type-specific template for the content.
							 * If you want to override this in a child theme, then include a file
							 * called content-___.php (where ___ is the Post Type name) and that will be used instead.
							 */
							Components::load_template_part_content( 'archive' );
							
						endwhile;

						Components::posts_pagination();

					else :

						get_template_part( 'template-parts/content', 'none' );

					endif;
					?>
					</div><!-- .site-posts -->
					<?php do_action( 'octo_after_content_inner' ); ?>
				</div>
			</main><!-- #main -->
			<?php get_sidebar(); ?>
		</div><!-- .site-container-inner -->
	</div><!-- .site-container -->
	<?php do_action( 'octo_after_content' ); ?>
</div><!-- #content -->
<?php
get_footer();
