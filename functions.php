<?php
/**
 * This file is a plugin file. 
 * It can be used to run code using Wordpress' action and filter hooks.
 * 
 * @package woobits
 */

// Classes
require_once get_template_directory() . '/inc/class-woobits-theme-support.php';
require_once get_template_directory() . '/inc/class-woobits-menus.php';
require_once get_template_directory() . '/inc/class-woobits-sidebars.php';
require_once get_template_directory() . '/inc/class-woobits-walker-comment.php';
require_once get_template_directory() . '/inc/class-woobits-woocommerce.php';
require_once get_template_directory() . '/inc/class-woobits-scripts.php';

class Woobits {
	public function __construct()
	{
		new Woobits_Theme_Support();
		new Woobits_Menus();
		new Woobits_Sidebars();
		new Woobits_Walker_Comment();
		new Woobits_Scripts();

		if( class_exists( 'woocommerce' ) ) {
			new Woobits_Woocommerce();
		}
	}
}
new Woobits();


function woobits_purchase_box_widget() {
    ?> 
        <aside class="woobits-sidebar-widget widget widget_search clearfix">
            <h6 class="title">Purchase</h6>
            <div>
                <?php @do_action('woobits_purchase_box_widget'); ?>
            </div>
        </aside>
    <?php
}
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_price', 20 );
add_action( 'woobits_purchase_box_widget', 'woocommerce_template_single_add_to_cart', 20 );
add_action( 'woobits_product_sidebar', 'woobits_purchase_box_widget', 20 );

function woobits_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'woobits_remove_all_quantity_fields', 10, 2 );

function remove_add_to_cart_buttons() {
    if( is_product_category() || is_shop()) { 
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
    }
}
add_action( 'woocommerce_after_shop_loop_item', 'remove_add_to_cart_buttons', 1 );

function my_the_content_filter( $content ) {
    global $post;
    if( 'product' == $post->post_type )
        $content .= ' <em>' . $post->post_title . '</em>';
    return $content;
}
add_filter( 'the_content', 'my_the_content_filter' );

// Breadcrumbs
function the_breadcrumb() {
    echo '<a href="'.home_url().'" rel="nofollow">Home</a>';
    if (is_category() || is_single()) {
        echo "&nbsp;&nbsp;&gt;&nbsp;&nbsp;";
        the_category(' &bull; ');
            if (is_single()) {
                echo " &nbsp;&nbsp;&gt;&nbsp;&nbsp; ";
                the_title();
            }
    } elseif (is_page()) {
        echo "&nbsp;&nbsp;&gt;&nbsp;&nbsp;";
        echo the_title();
    } elseif (is_search()) {
        echo "&nbsp;&nbsp;&gt;&nbsp;&nbsp;Search Results for... ";
        echo '"<em>';
        echo the_search_query();
        echo '</em>"';
    }
}