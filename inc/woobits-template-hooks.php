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

add_action( 'woobits_page_before_loop', 'woobits_content_container_start', 10 );
add_action( 'woobits_page', 'woobits_content', 10 );
add_action( 'woobits_page_after_main_loop', 'woobits_comments', 10 );
add_action( 'woobits_page_after_loop', 'woobits_content_container_end', 10 );
add_action( 'woobits_page', 'woobits_content', 10 );

 /**
  * Single
  */
add_action( 'woobits_single_before_loop', 'woobits_content_container_start', 10 );
add_action( 'woobits_single_after_loop', 'woobits_content_container_end', 10 );
add_action( 'woobits_sidebar', 'woobits_sidebar', 10 );
add_action( 'woobits_sidebar', 'woobits_content_container_end', 20 );

add_action( 'woobits_single', 'woobits_content', 10 );
add_action( 'woobits_single', 'woobits_categories', 20 );
add_action( 'woobits_single', 'woobits_tags', 30 );
add_action( 'woobits_single', 'woobits_post_navigation', 40 );
add_action( 'woobits_single', 'woobits_comments', 50 );

/**
 * Index
 */
add_action( 'woobits_posts_before_loop', 'woobits_content_container_start', 10 );
add_action( 'woobits_posts_after_main_loop', 'woobits_posts_navigation', 10 );
add_action( 'woobits_posts_after_loop', 'woobits_content_container_end', 20 );


/**
 * Product
 */
add_action( 'woobits_product', 'woobits_content', 10 );

add_action( 'woobits_before_product_sidebar', 'woobits_purchase_box_widget', 10 );
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_price', 20 );
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_add_to_cart', 20 );

/**
 * Sidebar
 */
add_action( 'woobits_sidebar', 'woobits_sidebar', 10 );
add_action( 'woobits_sidebar', 'woobits_content_container_end', 20 );