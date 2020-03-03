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

/**
 * WooCommerce General
 */
remove_action( 'woocommerce_before_main_content','woocommerce_breadcrumb', 20 );

/**
 * Product
 */
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );

add_action( 'woocommerce_single_product_summary', 'the_content', 5 );
add_action( 'woocommerce_after_single_product_summary', 'woobits_display_product_reviews', 15 );
add_action( 'woobits_product_sidebar', 'woobits_purchase_box_widget', 10 );
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_add_to_cart', 10 );

/**
 * Product Archives
 */
add_filter( 'woocommerce_show_page_title', 'woobits_hide_shop_page_title' );
add_action( 'woocommerce_after_shop_loop_item', 'woobits_remove_add_to_cart_buttons', 1 );

