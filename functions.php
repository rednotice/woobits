<?php
/**
 * This file is a plugin file. 
 * It can be used to run code using Wordpress' action and filter hooks.
 * 
 * @package woobits
 * 
 */

 // Template functions and hooks
 require_once get_template_directory() . '/inc/woobits-template-functions.php';
 require_once get_template_directory() . '/inc/woobits-template-hooks.php';

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



function woobits_remove_all_quantity_fields( $return, $product ) {
    return true;
}
add_filter( 'woocommerce_is_sold_individually', 'woobits_remove_all_quantity_fields', 10, 2 );


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