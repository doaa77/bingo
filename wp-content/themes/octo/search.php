<?php
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Components;

get_header();
?>
<div id="content" class="site-content">
	<div class="site-container">
		<?php do_action( 'octo_before_content' ); ?>
		<div class="site-container-inner">                    
			<main id="primary" class="site-main">                
				<div class="site-main-inner">
					<?php do_action( 'octo_before_content_inner' ); ?>
					<?php Components::breadcrumb_trail(); ?>
					<?php
					if ( have_posts() ) :
						?>

						<header class="page-header">
							<h1 class="page-title">
								<?php
								/* translators: %s: search query. */
								printf( esc_html__( 'Search Results for: %s', 'octo' ), '<span>' . get_search_query() . '</span>' );
								?>
							</h1>
						</header><!-- .page-header -->

						<?php
						/* Start the Loop */
						while ( have_posts() ) :
							the_post();

							/**
							 * Run the loop for the search to output the results.
							 * If you want to overload this in a child theme then include a file
							 * called content-search.php and that will be used instead.
							 */
							Components::load_template_part_content( 'search' );

						endwhile;

						Components::posts_pagination();

					else :
						Components::load_template_part_content( 'none' );

					endif;
					?>
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
