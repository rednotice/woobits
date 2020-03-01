<?php
/**
 * These functions contain the templates for the theme. They are hooked into the pages.
 * 
 * @package woobits
 *
 */

 /**
  * Header
  */
function woobits_primary_navigation() {
    get_template_part( 'templates/nav' );
}

function woobits_site_header() {
    if( function_exists( 'is_product' ) && is_product() ) : get_template_part( 'templates/header', 'product' );
    elseif( is_single() ) : get_template_part( 'templates/header', 'single' );
    elseif( ! is_front_page() && ! is_404() )  :  get_template_part( 'templates/header' );
    endif;
}

/**
 * Footer
 */
function woobits_footer_widgets() {
    ?>
    <div class="woobits-footer-widgets">
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-1'); } ?>
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-2'); } ?>
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-3'); } ?>
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-4'); } ?>
    </div>
    <?php
}

function woobits_copyright() {
    ?>
    <div class="woobits-copyright">
        <span>Copyright 2020 wpBits. All rights reserved.</span>
    </div>
    <?php
}

/**
 * Content
 */
function woobits_content_container_start() {
    if( function_exists( 'is_product' ) && is_product() ) :
        ?>
        <div class="row">
        <div class="woobits-product col-12<?php if( is_active_sidebar( 'product' ) ) : echo ' col-lg-8'; endif; ?>">
    <?php

    elseif( is_single() ) :
        ?>
        <div class="row">
        <div class="woobits-single-post col-12<?php if( is_active_sidebar( 'blog' ) ) : echo ' col-lg-8'; endif; ?>">
    <?php

    elseif( function_exists( 'is_shop' ) && is_shop() ) :
        ?>
        <div class="row">
        <div class="woobits-shop col-12<?php if( is_active_sidebar( 'shop' ) ) : echo ' col-lg-9 order-lg-1'; endif; ?>">
    <?php

    elseif( 
        function_exists( 'is_cart' ) && ! is_cart() 
        && function_exists( 'is_checkout' ) && ! is_checkout() 
        && function_exists( 'is_account_page' ) && ! is_account_page()
    ):
        ?>
        <div class="row">
        <div class="woobits-page col-12<?php if( is_active_sidebar( 'blog' ) ) : echo ' col-lg-8'; endif; ?>">
    <?php
    endif;
}

function woobits_page_container_start() {
    if( function_exists( 'is_shop' ) && is_shop() ) :
        $is_active_sidebar = is_active_sidebar( 'shop' );


    endif;
    ?>

    <div class="row">
        <div class="woobits-content col-12<?php if( isset( $is_active_sidebar ) && $is_active_sidebar ) : echo ' col-lg-9 order-lg-1'; endif; ?>">
    
    <?php
}

function woobits_content_container_end() {
    ?>
        </div>
    <?php
}

function woobits_content() {
    the_content();
}

function woobits_categories() {
    $categories = get_categories();
        if( $categories ): ?>
        <div class="categories">
            <span class="heading"><?php _e('Categories', 'woobits'); ?></span>
            <?php
                foreach( $categories as $category ) {
                    echo '<a href="' . get_category_link( $category->term_id ) . '"><span class="category">' . $category->name . '</span></a>';
                }
            ?> 
        </div>
    <?php endif;
}

function woobits_tags() {
    $tags = get_the_tags();
        if( $tags ): ?>
        <div class="tags">
            <span class="heading"><?php _e('Tags', 'woobits'); ?></span>
            <?php
                foreach( $tags as $tag ) {
                    echo '<a href="' . get_tag_link( $tag ) . '"><span class="tag">' . $tag->name . '</span></a>';
                }
            ?> 
        </div>
    <?php endif;
}

function woobits_post_navigation() {
    ?>
    <div class="navigation">
        <span class="link"><?php previous_post_link(); ?></span>
        <span class="link"><?php next_post_link(); ?> </span>
    </div>
    <?php
}

function woobits_posts_navigation() {
    ?>
    <div class="navigation">
        <div class="previous">
            <?php previous_posts_link(); ?>
        </div>
        <div class="next">
            <?php next_posts_link(); ?>
        </div>
    </div>
    <?php
}

function woobits_sidebar() {
    if( function_exists( 'is_product' ) && is_product() && is_active_sidebar( 'product' ) ) : ?>
        <div class="woobits-sidebar col-12 col-lg-4">
            <?php 
                do_action( 'woobits_before_product_sidebar' );
                dynamic_sidebar( 'product' ); 
            ?>
        </div>

    <?php elseif( function_exists( 'is_shop' ) && is_shop() && is_active_sidebar( 'shop' ) ) : ?>
        <div class="woobits-sidebar col-12 col-lg-3 order-lg-0">
            <?php dynamic_sidebar( 'shop' ); ?>
        </div>

    <?php elseif( is_single() || is_home() && is_active_sidebar( 'blog' ) ) : ?>
        <div class="woobits-sidebar col-12 col-lg-4">
            <?php dynamic_sidebar( 'blog' ); ?>
        </div>
    <?php endif;
}

function woobits_purchase_box_widget() {
    ?> 
        <aside class="woobits-sidebar-widget widget widget_search clearfix">
            <h6 class="title"><?php _e( 'Download Details', 'woobits' ); ?> </h6>
            <div>
                <?php do_action('woobits_purchase_box_widget'); ?>
            </div>
        </aside>
    <?php
}

/**
 * Comments
 */
function woobits_comments() {
    if ( comments_open() ): comments_template(); endif;
}