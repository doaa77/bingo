<?php
/**
 * Template part for displaying posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package octo
 * @since   1.0.0
 */

use octo\core\Content;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-inner">
		<?php Content::post_heading(); ?>
		<div class="entry-content">
			<?php the_content(); ?>
		</div><!-- .entry-content -->
	</div><!-- .post-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
