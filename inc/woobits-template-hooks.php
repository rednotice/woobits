<?php
/**
 * Template hooks.
 * 
 * @package woobits
 *
 */

 /**
  * Header
  */
add_action( 'woobits_header', 'woobits_primary_navigation', 10 );
add_action( 'woobits_header', 'woobits_site_header', 20 );

 /**
  * Footer
  */
  add_action( 'woobits_footer', 'woobits_footer_widgets', 10 );
  add_action( 'woobits_footer', 'woobits_copyright', 20 );

 /**
  * Page
  */
add_action( 'woobits_page', 'the_content', 10 );
add_action( 'woobits_page_after', 'woobits_display_comments', 10 );

 /**
  * Single
  */
add_action( 'woobits_single_post', 'the_content', 10 );
add_action( 'woobits_single_post_bottom', 'woobits_categories', 10 );
add_action( 'woobits_single_post_bottom', 'woobits_tags', 20 );
add_action( 'woobits_single_post_bottom', 'woobits_post_navigation', 30 );
add_action( 'woobits_single_post_bottom', 'woobits_display_comments', 40 );

 /**
  * Index
  */
add_action( 'woobits_after_main_loop', 'woobits_posts_navigation', 10 );