<?php
/**
 * Default template used to display the content for product pages.
 *
 * @package woobits
 */

?>

<div class="row">
    <div class="woobits-single-product col-12 col-lg-8">

        <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

            <div class="content">
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

        <?php else : ?>
            <p><?php _e('Sorry, no products matched your criteria.', 'woobits' ); ?></p>
        <?php endif; ?>

    </div>

    <div class="woobits-product-sidebar col-12 col-lg-4">

        <?php 
            /**
            * Hook: woobits_product_sidebar.
            *
            * @hooked woobits_purchase_box_widget - 10
            */
            do_action('woobits_product_sidebar'); 
        ?>

        <p>Add custom field product information here.</p>

        <?php if( is_active_sidebar( 'product' ) ) : dynamic_sidebar( 'product' ); endif; ?>
    </div>
</div>