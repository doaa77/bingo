<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package octo
 * @since   1.0.0
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}

use octo\core\Comments;

$comment_count = get_comments_number();
?>

<div id="comments" class="comments-area">
	<?php if ( have_comments() ) : ?>
		<h2 class="comments-title">
			<?php
			if ( '1' === $comment_count ) {
				printf(
					/* translators: 1: title. */
					esc_html__( 'One comment on &ldquo;%1$s&rdquo;', 'octo' ),
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count number, 2: title. */
					esc_html( _nx( '%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comment_count, 'comments title', 'octo' ) ),
					number_format_i18n( $comment_count ), // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					'<span>' . wp_kses_post( get_the_title() ) . '</span>'
				);
			}
			?>
		</h2><!-- .comments-title -->
		<ul class="comment-list">
			<?php
			wp_list_comments(
				array(
					'short_ping' => true,
					'callback'   => array( 'octo\core\Comments', 'template' ),
				)
			);
			?>
		</ul><!-- .comment-list -->
		<?php
		the_comments_navigation(
			array(
				'prev_text' => '<span class="dashicons dashicons-arrow-left-alt"></span>' . esc_html__( 'Older Comments', 'octo' ),
				'next_text' => esc_html__( 'Newer Comments', 'octo' ) . '</span><span class="dashicons dashicons-arrow-right-alt"></span>',
			)
		);

		// If comments are closed and there are comments, let's leave a little note.
		if ( ! comments_open() ) :
			?>
			<p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'octo' ); ?></p>
			<?php
		endif;
	endif; // Check for have_comments().
	comment_form();
	?>
</div><!-- #comments -->
