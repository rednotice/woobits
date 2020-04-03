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

		if( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
			new Woobits_Woocommerce();
		}
	}
}
new Woobits();


// Check for updates
require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/rednotice/woobits',
	__FILE__,
	'woobits'
);

// Optional: If you're using a private repository, specify the access token like this:
$myUpdateChecker->setAuthentication('403ac03febdfd126a493108f163cc4db98e6fc69');

// Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');


// Reply link for comments
function load_script_for_fake_threading() {
    if( is_singular() ) wp_enqueue_script( 'comment-reply' );
}
add_action( 'wp_enqueue_scripts', 'load_script_for_fake_threading' );


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