<?php
/**
 * @package woobits
 */

get_header();

/**
 * Functions hooked in to woobits_page_before_loop action
 *
 * @hooked woobits_content_container_start - 10
 */
do_action( 'woobits_page_before_loop' );

if( have_posts() ) : 

    do_action( 'woobits_page_before_main_loop' );
    
    while( have_posts() ) : the_post(); 

        /**
         * Functions hooked in to woobits_page add_action
         *
         * @hooked woobits_content - 10
         */
        do_action( 'woobits_page' );

    endwhile; 

    /**
     * Functions hooked in to woobits_page_after action
     *
     * @hooked woobits_comments - 10
     */
    do_action( 'woobits_page_after_main_loop' );

endif; // End of the loop.

/**
 * Functions hooked in to woobits_after_single action
 *
 * @hooked woobits_content_container_end - 10
 */
do_action( 'woobits_page_after_loop' );

/**
 * Functions hooked in to woobits_sidebar action
 *
 * @hooked woobits_sidebar - 10
 * @hooked woobits_content_container_end - 20
 */
do_action( 'woobits_sidebar' );

get_footer();