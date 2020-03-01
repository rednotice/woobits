<?php
/**
 * The list of blog posts.
 *
 * @package woobits
 */

get_header();

/**
 * Functions hooked in to woobits_posts_before_loop action
 *
 * @hooked woobits_content_container_start - 10
 */
do_action( 'woobits_posts_before_loop' );

if( have_posts() ) :
    
    do_action( 'woobits_posts_before_main_loop' );
    
    while ( have_posts() ) : the_post();

        get_template_part( 'templates/post', 'preview' );

    endwhile;

    /**
     * Functions hooked in to woobits_posts_after_main_loop action
     *
     * @hooked woobits_posts_navigation - 10
     */
    do_action( 'woobits_posts_after_main_loop' );

endif;

/**
 * Functions hooked in to woobits_posts_after_loop action
 *
 * @hooked woobits_content_container_end - 10
 */
do_action( 'woobits_posts_after_loop' );

/**
 * Functions hooked in to woobits_sidebar action
 *
 * @hooked woobits_sidebar - 10
 * @hooked woobits_content_container_end - 20
 */
do_action( 'woobits_sidebar' );

get_footer();