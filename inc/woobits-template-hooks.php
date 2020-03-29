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
add_action( 'woobits_purchase_modal', 'woobits_purchase_box_widget', 10 );
add_filter( 'wp_nav_menu_main-menu_items', 'woobits_add_main_menu_items', 10, 2 );

 /**
  * Navigation
  */
add_filter( 'woocommerce_add_to_cart_fragments', 'woobits_cart_counter', 10 );
add_filter( 'woocommerce_add_to_cart_fragments', 'woobits_cart_content_preview', 10 );
add_action( 'woobits_before_content', 'woobits_mobile_menu', 10 );

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
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 ); 
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Variation form changed to look better with radio buttons.
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_product_data_tabs', 10 );
remove_action( 'woocommerce_single_variation', 'woocommerce_single_variation', 10 );
add_filter( 'woocommerce_reset_variations_link', '__return_empty_string' );
add_filter( 'woocommerce_is_sold_individually', 'woobits_remove_all_quantity_fields', 10, 2 );

add_action( 'woocommerce_single_product_summary', 'the_content', 5 );
add_action( 'woocommerce_single_product_summary', 'woobits_purchase_box_widget', 9 );
add_action( 'woocommerce_after_single_product_summary', 'woobits_display_product_reviews', 15 );
add_action( 'woobits_after_product_header_title', 'woocommerce_template_single_rating', 20);

// Purchase Box Sidebar Widget
add_action( 'woobits_product_sidebar', 'woobits_purchase_box_widget', 10 );
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_price', 10 );
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_excerpt', 20 );
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_add_to_cart', 30 );

add_action( 'woobits_product_sidebar', 'woobits_product_feature_widget', 20 ); 


/**
 * Product Archives
 */
add_filter( 'woocommerce_show_page_title', '__return_false' );
add_action( 'woocommerce_after_shop_loop_item', 'woobits_remove_add_to_cart_buttons', 1 );