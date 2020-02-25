<?php
/**
 * Template for the header title which shows under the main menu.
 *
 * @package woobits
 */

?>

<div class="woobits-post-header woobits-header">
    <div class="container">
        <div class="wrapper">

            <?php if ( has_post_thumbnail() ): ?>
                <div class="thumbnail">
                    <?php the_post_thumbnail( 'post_thumbnail' ); ?>
                </div>
            <?php endif; ?>

            <div class="info">
                <span class="breadcrumbs"><?php the_breadcrumb(); ?></span>
                <h1 class="title"><?php wp_title( false ); ?></h1>
                <span class="meta">
                    <span><?php _e('by ', 'woobits') . the_author(); ?></span>

                    <?php $categories = get_the_category();
                        if ( ! empty( $categories ) ) {
                            echo '<span>' . __('in ', 'woobits') . '<a href ="' . get_category_link( $categories[0]->term_id ) . '">' . esc_html( $categories[0]->name ) . '</a></span>';   
                        
                    } ?>

                    <span><?php _e('on ', 'woobits') . the_date(); ?></span>
                </span>
            </div>
        </div>
    </div>
</div>