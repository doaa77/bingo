<?php
/**
 * Template part for displaying results in search pages.
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
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div><!-- .entry-summary -->
	</div><!-- .post-inner -->
</article><!-- #post-<?php the_ID(); ?> -->
