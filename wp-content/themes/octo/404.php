<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
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
					<section class="error-404 not-found">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'octo' ); ?></h1>
						</header><!-- .page-header -->
						<div class="page-content">
							<p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'octo' ); ?></p>
							<?php get_search_form(); ?>
						</div><!-- .page-content -->
					</section><!-- .error-404 -->
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
