<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Options;use octo\core\Content;
use octo\core\Common;

// Get theme option.
$blog_layout = Options::get_theme_option( 'blog_layout' );
$blog_post_excerpt = Options::get_theme_option( 'blog_post_excerpt' );
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner">
		<?php 
        if ( 'thumbnail_left' === $blog_layout ) :
			Content::post_thumbnail();
        endif;
        ?>
        <div class="post-content">
        	<?php
        	Content::post_heading();
        
        	if ( 'excerpt' === $blog_post_excerpt ) :
        		?>
        		<div class="entry-summary">
        			<?php the_excerpt(); ?>
        		</div><!-- .entry-summary -->
        	<?php else : ?>
        		<div class="entry-content">
        			<?php
        			the_content(
        				sprintf(
        					wp_kses(
        						/* translators: %s: Name of current post. Only visible to screen readers */
        						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'octo' ),
        						array(
        							'span' => array(
        								'class' => array(),
        							),
        						)
        					),
        					wp_kses_post( get_the_title() )
        				)
        			);
        			?>
        		</div><!-- .entry-content -->
        </div><!-- .post-content -->
        <?php endif; ?>
	</div><!-- .post-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
