<?php
/**
 * Single blog post.
 * 
 * @package woobits
 */

get_header();

/**
 * Functions hooked in to woobits_single_before_loop action
 *
 * @hooked woobits_content_container_start - 10
 */
do_action( 'woobits_single_before_loop' );

if( have_posts() ) :
    
    do_action( 'woobits_single_before_main_loop' );
    
    while ( have_posts() ) : the_post();

        if( function_exists( 'is_product' ) && is_product() ) :

            /**
             * Functions hooked in to woobits_single action
             *
             * @hooked woobits_content - 10
             * @hooked purchase_box - 20
             * @hooked reviews - 10
             * Short description?
             */
            do_action( 'woobits_product' );

        else :

            /**
             * Functions hooked in to woobits_single action
             *
             * @hooked woobits_content - 10
             * @hooked woobits_categories - 20
             * @hooked woobits_tags - 30
             * @hooked woobits_post_navigation - 40
             * @hooked woobits_comments - 50
             */
            do_action( 'woobits_single' );

        endif;

    endwhile;

    do_action( 'woobits_single_after_main_loop' );

endif; // End of the loop.

/**
 * Functions hooked in to woobits_after_single action
 *
 * @hooked woobits_content_container_end - 10
 */
do_action( 'woobits_single_after_loop' );

/**
 * Functions hooked in to woobits_sidebar action
 *
 * @hooked woobits_sidebar - 10
 * @hooked woobits_content_container_end - 20
 */
do_action( 'woobits_sidebar' );

get_footer();