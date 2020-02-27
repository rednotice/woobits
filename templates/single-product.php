<?php
/**
 * Default template used to display the content for single post pages.
 *
 * @package woobits
 */

?>

<div class="row">
    <div class="woobits-single-product col-12 <?php if( is_active_sidebar( 'product' ) ) : echo 'col-lg-8'; endif; ?> ">

        <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

            <div class="content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

        <?php else : ?>
            <p><?php _e('Sorry, no products matched your criteria.', 'woobits' ); ?></p>
        <?php endif; ?>
    </div>

    <?php if( is_active_sidebar( 'product' ) ) : ?>
        <div class="woobits-blog-sidebar col-12 col-lg-4">
            <?php dynamic_sidebar( 'product' ); ?>
        </div>
    <?php endif; ?>
</div>