<?php
/**
 * Template used to display post content.
 *
 * @package woobits
 */

?>

<div class="woobits-post-preview mb-4 row">
    <?php if ( has_post_thumbnail() ) : ?>
        <div class="col-12 col-sm-5 mb-3 mb-sm-0 d-flex justify-content-center align-items-center">
            <div class="woobits-thumbnail-container">
                <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                <?php the_post_thumbnail( 'post-thumbnail', ['class' => 'img-fluid' ] ); ?>
                </a>
            </div>
        </div>
    <?php endif; ?>
    <div class="col-12 col-sm-7 d-flex flex-column justify-content-center">
        <h3 class="woobits-post-preview-title font-weight-bold mb-0">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h3>
        <div class="woobits-post-preview-meta mb-3">
            <small><?php _e('By ', 'woobits') . the_author(); ?></small>

            <small>| <?php the_date(); ?></small>

            <?php if( comments_open() && have_comments() ): ?> 
                <small>
                    <a href="<?php comments_link(); ?>">
                        | <?php comments_number(); ?>
                    </a>
                </small>    
            <?php endif; ?>

            <!-- Delete this  -->
            <small><a href="<?php comments_link(); ?>">| <?php comments_number(); ?></a></small>
        
        </div>
        <div class="woobits-post-preview-exerpt">
            <a href="<?php the_permalink(); ?>"><?php the_excerpt(); ?></a>
        </div>
    </div>
</div>