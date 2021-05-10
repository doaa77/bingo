<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Content;
use octo\core\Common;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner">
		<?php Content::post_thumbnail(); ?>
		<?php if ( Common::show_title() ) : ?>
		<header class="entry-header">
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<?php endif; ?>
		<div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'octo' ),
					'after'  => '</div>',
				)
			);
			?>
		</div><!-- .entry-content -->
	</div><!-- .post-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
