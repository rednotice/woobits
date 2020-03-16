<?php
/**
 * Template for the header title which shows under the main menu.
 *
 * @package woobits
 */

?>

<div class="woobits-product-header woobits-header">
    <div class="container">
        <div class="wrapper">

            <?php while ( have_posts() ) : the_post(); ?>

                <?php if ( has_post_thumbnail() ): ?>
                    <div class="thumbnail">
                        <?php 
                            $attachment_ids[0] = get_post_thumbnail_id();
                            $attachment = wp_get_attachment_image_src($attachment_ids[0], 'full' );
                        ?>
                        <img src="<?php echo $attachment[0] ; ?>" />
                    </div>
                <?php endif; ?>

                <div class="info">
                    <h1 class="title"><?php wp_title( false ); ?></h1>

                    <?php 
                    /**
                    * Functions hooked into woobits_after_product_header_title action
                    *
                    * @hooked woocommerce_template_single_rating - 10
                    */
                    do_action( 'woobits_after_product_header_title' ); 
                    ?>

                    <div class="action-buttons">
                        <button class="purchase-button" data-toggle="modal" data-target="#purchaseModal"><?php _e( 'Purchase', 'woobits' ); ?></button>

                        <?php if( get_post_meta( get_the_ID(), "_woobits_preview_link", true ) ) : ?>
                            <a 
                                href='<?php echo esc_url( get_post_meta( get_the_ID(), "_woobits_preview_link", true ) ); ?>' 
                                class="preview-button"
                                target="_blank"
                            >
                                <?php _e( 'Live Preview', 'woobits' ); ?>
                            </a>
                        <?php endif; ?>
                    </div>
                </div>

            <?php endwhile; ?> <!-- End of loop -->

        </div>
    </div>
</div>

<?php get_template_part( 'templates/modal', 'purchase' ) ?>