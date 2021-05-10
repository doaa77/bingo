<?php
/**
 * Comments class.
 *
 * @package octo
 * @since   1.0.0
 */

namespace octo\core;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Prevent direct access.
}

/**
 * This class enhances the standard WordPress comments.
 *
 * @since 1.0.0
 */
class Comments {

	/**
	 * Register WordPress action hooks.
	 *
	 * @since 1.0.0
	 */
	public function init() {
		add_filter( 'comment_form_default_fields', array( $this, 'comment_form_fields' ) );
		add_filter( 'comment_form_defaults', array( $this, 'comment_form_defaults' ) );
	}

	/**
	 * Prints template for comments and pingbacks.
	 *
	 * @param object $comment Comment object.
	 * @param array  $args    Comment argumtents.
	 * @param int    $depth   Comment depth.
	 * @since 1.0.0
	 */
	public static function template( $comment, $args, $depth ) {

		// Set avatar size.
		$args['avatar_size'] = apply_filters( 'octo_comment_avatar_size', 50 );

		// Display pingbacks and trackbacks differently.
		if ( 'pingback' === $comment->comment_type || 'trackback' === $comment->comment_type ) : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<div class="comment-body pingback">
				<div class="comment-content">
					<?php esc_html_e( 'Pingback:', 'octo' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( 'Edit', 'octo' ), '<span class="edit-link">', '</span>' ); ?>
				</div>
			</div><!-- .comment-body -->

		<?php else : ?>

		<li id="comment-<?php comment_ID(); ?>" <?php comment_class(); ?>>
			<article id="div-comment-<?php comment_ID(); ?>" class="comment-body">
				<footer class="comment-meta">
					<?php if ( 0 !== $args['avatar_size'] ) : ?>
						<div class="comment-author-avatar">
							<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
						</div><!-- .comment-author-avatar -->
					<?php endif; ?>
					<div class="comment-author-info">						                            
						<?php
						printf( '<div class="comment-author"><cite itemprop="name" class="fn">%s</cite></div><!-- .comment-author -->', get_comment_author_link() );

						printf(
							'<div class="comment-published-date">
								<a href="%1$s">
									<time datetime="%2$s" itemprop="datePublished">
										%3$s
									</time>
								</a>
							</div><!-- .comment-published-date -->',
							esc_url( get_comment_link( $comment->comment_ID ) ),
							esc_attr( get_comment_time( 'c' ) ),
							/* translators: 1: date, 2: time */
							esc_html( sprintf( __( '%1$s at %2$s', 'octo' ), get_comment_date(), get_comment_time() ) )
						);
						?>
					</div><!-- .comment-author-info -->						
				</footer><!-- .comment-meta -->

				<div class="comment-content" itemprop="text">
					<?php comment_text(); ?>
					<div class="comment-edit">
						<?php
						comment_reply_link(
							array_merge(
								$args,
								array(
									'reply_text' => __( 'Reply', 'octo' ),
									'add_below'  => 'comment',
									'depth'      => $depth,
									'max_depth'  => $args['max_depth'],
									'before'     => '<span class="reply">',
									'after'      => '</span>',
								)
							)
						);
						?>
						<?php edit_comment_link( __( 'Edit', 'octo' ), '<span class="edit-link">', '</span>' ); ?>
						<?php
						if ( '0' === $comment->comment_approved ) {
							printf(
								'<span class="comment-awaiting-moderation">%s</span>',
								esc_html__( 'Your comment is awaiting moderation.', 'octo' )
							);
						}
						?>
					</div><!-- .reply -->
				</div><!-- .comment-content -->
			</article><!-- .comment-body -->
			<?php
		endif;
	}

	/**
	 * Customize comment form fields.
	 *
	 * @param array $fields Array of the default comment fields.
	 * @since 1.0.0
	 */
	public static function comment_form_fields( $fields ) {

		$commenter = wp_get_current_commenter();
		$required  = get_option( 'require_name_email' );

		$fields['author'] = sprintf(
			'<p class="comment-form-author"><label for="author" class="screen-reader-text">%1$s</label><input placeholder="%1$s%2$s" id="author" name="author" type="text" value="%3$s" size="30" maxlength="245"%4$s></p>',
			esc_html__( 'Name', 'octo' ),
			$required ? ' *' : '',
			esc_attr( $commenter['comment_author'] ),
			$required ? ' required="required"' : ''
		);

		$fields['email'] = sprintf(
			'<p class="comment-form-email"><label for="email" class="screen-reader-text">%1$s</label><input placeholder="%1$s%2$s" id="email" name="email" type="email" value="%3$s" size="30" maxlength="100" aria-describedby="email-notes"%4$s></p>',
			esc_html__( 'Email', 'octo' ),
			$required ? ' *' : '',
			esc_attr( $commenter['comment_author_email'] ),
			$required ? ' required="required"' : ''
		);

		$fields['url'] = sprintf(
			'<p class="comment-form-url"><label for="url" class="screen-reader-text">%1$s</label><input placeholder="%1$s%2$s" id="url" name="url" type="url" value="%2$s" size="30" maxlength="200"></p>',
			esc_html__( 'Website', 'octo' ),
			esc_attr( $commenter['comment_author_url'] )
		);

		return $fields;
	}

	/**
	 * Set defaults for the comment form.
	 *
	 * @param array $defaults The default comment form arguments.
	 * @since 1.0.0
	 */
	public static function comment_form_defaults( $defaults ) {

		$defaults['comment_field'] = '<p class="comment-form-comment"><label for="comment" class="screen-reader-text">' . esc_html__( 'Comment', 'octo' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" maxlength="65525" required="required"></textarea></p>';

		return $defaults;

	}

}
