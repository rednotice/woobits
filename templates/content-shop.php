<?php
/**
 * Default template used to display the content for shop and product category pages.
 *
 * @package woobits
 */

?>

<div class="row">
<div class="woobits-shop order-lg-1 col-12 <?php if( is_active_sidebar( 'shop' ) ) : ?> col-lg-9 <?php endif; ?>">
        <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

            <div class="content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

        <?php else : ?>
            <p><?php _e('Sorry, no products matched your criteria.', 'woobits' ); ?></p>
        <?php endif; ?>

    </div>

    <?php if( is_active_sidebar( 'shop' ) ) : ?>
        <div class="woobits-shop-sidebar order-lg-0 col-12 col-lg-3">
            <?php dynamic_sidebar( 'shop' ); ?>
        </div>
    <?php endif; ?>
</div>