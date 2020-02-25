<?php
/**
 * The comments section
 *
 * @package woobits
 */
?>

<section id="woobits-comments" class="woobits-comments">
    <div class="wrapper">
        <?php if ( have_comments() ) : ?>
            <h2 class="heading">
                <?php
                    $commentsNumber = get_comments_number();
                    if ( $commentsNumber === '1' ) {
                        printf(
                            /* translators: 1: title. */
                            esc_html__( 'One Comment', 'woobits' )
                        );
                    } else {
                        printf(
                            /* translators: 1: comment count number, 2: title. */
                            esc_html( _nx( '%1$s Comments', '%1$s Comments', $commentsNumber, 'comments title', 'woobits' ) ),
                            number_format_i18n( $commentsNumber )
                        );
                    }
                ?>
            </h2>

            <?php the_comments_navigation(); ?>

            <div class="list">
                <?php
                wp_list_comments( array(
                    'style'         => 'div',
                    'short_ping'    => true,
                    'avatar_size'   => 60,
                    'walker'        => new Woobits_Walker_Comment()
                ) );
                ?>
            </div>
            
            <?php the_comments_navigation(); ?>

            <?php if ( ! comments_open() ) : ?>
                <p class="no-comments"><?php esc_html_e( 'Comments are closed.', 'woobits' ); ?></p>
            <?php endif; ?>

        <?php endif; ?>

        <?php 
        comment_form( array(
            'title_reply' => __( 'Leave a Comment', 'woobits' ),
            'comment_field' => '<div class="comment-form-comment">
                    <textarea id="comment" name="comment" rows="8" aria-required="true" required="required"></textarea>
                </div>'
        )); 
        ?>
    </div>
</section>