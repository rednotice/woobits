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
                    <?php if( get_the_author() ) : ?>
                        <span><?php _e('by ', 'woobits') . the_author(); ?></span>
                    <?php endif; ?>

                    <?php if( get_the_category() ) : $categories = get_the_category(); ?>
                        <span>
                            <?php _e('in ', 'woobits'); ?> 
                            <a href ="<?php echo esc_url( get_category_link( $categories[0]->term_id ) ); ?>"><?php echo esc_html( $categories[0]->name ); ?></a>
                        </span>
                    <?php endif; ?>

                    <?php if( get_the_date() ) : ?>
                        <span><?php _e('on ', 'woobits') . the_date(); ?></span>
                    <?php endif; ?>
                </span>
            </div>
        </div>
    </div>
</div>