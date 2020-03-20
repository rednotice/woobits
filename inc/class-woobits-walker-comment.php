<?php
/**
 *  Custom comment walker
 *
 * @package woobits
 *
 */

// Check if Class Exists.
if ( ! class_exists( 'Woobits_Walker_Comment' ) ) {
	/**
	 * Woobits_Walker_Comment class.
	 *
	 * @extends Walker_Comment
	 */
	class Woobits_Walker_Comment extends Walker_Comment
	{
		/**
		 * Outputs a single comment.
		 *
		 * @since 3.6.0
		 *
		 * @see wp_list_comments()
		 *
		 * @param WP_Comment $comment Comment to display.
		 * @param int        $depth   Depth of the current comment.
		 * @param array      $args    An array of arguments.
		 */
		protected function comment( $comment, $depth, $args ) {
			if ( 'div' == $args['style'] ) {
				$tag       = 'div';
				$add_below = 'comment';
			} else {
				$tag       = 'li';
				$add_below = 'div-comment';
			}
		
			$commenter = wp_get_current_commenter();
			if ( $commenter['comment_author_email'] ) {
				$moderation_note = __( 'Your comment is awaiting moderation.' );
			} else {
				$moderation_note = __( 'Your comment is awaiting moderation. This is a preview, your comment will be visible after it has been approved.' );
			}
		
			?>
			<<?php echo $tag; ?> <?php comment_class( $this->has_children ? 'parent' : '', $comment ); ?> id="comment-<?php comment_ID(); ?>">
			<?php if ( 'div' != $args['style'] ) : ?>
			<div id="div-comment-<?php comment_ID(); ?> vcard" class="comment-body">
			<?php endif; ?>

			<div class="comment-avatar">
				<?php
					if ( 0 != $args['avatar_size'] ) {
						echo get_avatar( $comment, $args['avatar_size'] );
					}
				?>
			</div>

			<div class="comment-box">

				<?php if( $comment->comment_parent ) : $parent = get_comment( $comment->comment_parent ); ?>
					<div class="response-to">
						<a href="<?php echo esc_url( get_comment_link( $parent ) ); ?>">@ <?php echo get_comment_author( $parent ); ?></a>
					</div>
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a class="comment-author" href="<?php echo esc_url( get_comment_link( $comment, $args ) ); ?>">
						<?php
							printf(
								/* translators: %s: Comment author link. */
								__( '%s' ),
								sprintf( '<cite class="fn">%s</cite>', get_comment_author_link( $comment ) )
							);
						?>
					</a>
					<span class="clear"></span>
					<span class="comment-date">
						<?php
							/* translators: 1: Comment date, 2: Comment time. */
							printf( __( '%1$s at %2$s' ), get_comment_date( '', $comment ), get_comment_time() );
						?>
						<?php
						edit_comment_link( __( '(Edit)' ), '&nbsp;&nbsp;', '' );
						?>
					</span>
				</div>

				<?php if ( '0' == $comment->comment_approved ) : ?>
				<em class="comment-awaiting-moderation"><?php echo $moderation_note; ?></em>
				<br />
				<?php endif; ?>
			
				<?php
				comment_text(
					$comment,
					array_merge(
						$args,
						array(
							'add_below' => $add_below,
							'depth'     => $depth,
							'max_depth' => $args['max_depth'],
						)
					)
				);
				?>

				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'reply_text' => __( 'Reply', 'woobits' ), 
							'depth' => 1, 
							'max_depth' => 2,
							'add_below' => $add_below,
							// 'depth'     => $depth,
							// 'max_depth' => $args['max_depth'],
							'before'    => '<div class="reply">',
							'after'     => '</div>',
						)
					)
				);
				?>

			</div>
		
			<?php if ( 'div' != $args['style'] ) : ?>
			</div>
			<?php endif; ?>
			<?php
		}
	}
}