<?php
/**
 * Template used to display post content.
 *
 * @package woobits
 */

?>

<div class="woobits-post-preview">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="thumbnail">
            <div class="wrapper">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail( 'post-thumbnail', ['class' => 'img' ] ); ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="content <?php if ( has_post_thumbnail() ) : echo 'with-thumbnail'; endif; ?>">
        <h3 class="title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="meta">
            <small><?php _e('By ', 'woobits') . the_author(); ?></small>

            <small>| <?php the_date(); ?></small>

            <?php if( comments_open() && get_comments_number() > 0 ): ?> 
                <small>
                    <a href="<?php comments_link(); ?>">
                        | <?php comments_number(); ?>
                    </a>
                </small>    
            <?php endif; ?>
        </div>
        <div class="excerpt">
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </div>
    </div>
</div>