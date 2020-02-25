<?php
/**
 * This file is a plugin file. 
 * It can be used to run code using Wordpress' action and filter hooks.
 * 
 * @package woobits
 */

// class Woobits_Walker_Nav_Menu extends Walker_Nav_Menu 
// {
// 	function start_lvl(&$output, $depth, $args ) {
// 		$indent = str_repeat("\t", $depth);
// 		$output .= "\n$indent<ul class=\"sub-menu sub-menu-" . $depth . "\">\n";
// 	}
// }

// Theme Scripts
function load_css() {
        wp_dequeue_style( 'wp-block-library' ); // Remove default guttenberg block editor stylesheet

        wp_enqueue_style( 'site_main_css', get_template_directory_uri() . '/dist/main.min.css' );
 }
 add_action( 'wp_enqueue_scripts', 'load_css' );

function load_js() {
    wp_register_script( 
        'bundle_js', 
        get_template_directory_uri() . '/dist/bundle.js', 
        'jquery',
        false,
        true 
    );
    wp_enqueue_script( 'bundle_js' );
}
add_action( 'wp_enqueue_scripts', 'load_js' );

// Theme Options
add_theme_support( 'menus' );
add_theme_support( 'custom-logo', array(
    'height'      => 45,
    'width'       => 140,
    'flex-height' => true,
    'flex-width'  => true,
    'header-text' => array( 'site-title', 'site-description' )
) );
add_theme_support( 'title-tag' );

// Menus
register_nav_menus(
    [
        'main-menu' => __('Main Menu', 'woobits')
    ]
);

function add_nav_classes( $classes, $item ) {
    $classes[] = 'nav-item';
    if ( in_array( 'current-menu-item', $classes ) ) {
        $classes[] = 'active';
	}

    return $classes;
}
add_filter( 'nav_menu_css_class' , 'add_nav_classes', 10, 2 );

function add_nav_link_attributes( $atts, $item, $args ) {
	$atts[ 'class' ] = 'nav-link';
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_nav_link_attributes', 10, 3 );

function add_nav_menu_submenu_css_class( $classes, $args, $depth ) {
	$classes[] = 'sub-menu-' . $depth;
	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'add_nav_menu_submenu_css_class', 10, 3 );

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

// Footer
function register_footer_widgets() {

	// Register Footer Column 1 widget area.
	register_sidebar( array(
		'name' => __( 'Footer Column 1', 'woobits' ),
		'id' => 'footer-1',
		'description' => __( 'Appears on the first footer column.', 'woobits' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	) );

	// Register Footer Column 2 widget area.
	register_sidebar( array(
		'name' => __( 'Footer Column 2', 'woobits' ),
		'id' => 'footer-2',
		'description' => __( 'Appears on the second footer column.', 'woobits' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	) );

	// Register Footer Column 3 widget area.
	register_sidebar( array(
		'name' => __( 'Footer Column 3', 'woobits' ),
		'id' => 'footer-3',
		'description' => __( 'Appears on the third footer column.', 'woobits' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	) );

	// Register Footer Column 4 widget area.
	register_sidebar( array(
		'name' => __( 'Footer Column 4', 'woobits' ),
		'id' => 'footer-4',
		'description' => __( 'Appears on the fourth footer column.', 'woobits' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h4 class="title">',
		'after_title' => '</h4>',
	) );

}
add_action( 'widgets_init', 'register_footer_widgets', 20 );

// Blog Sidebar
function register_blog_sidebar() {
	register_sidebar( array(
		'name' => __( 'Blog Sidebar', 'woobits' ),
		'id' => 'blog-sidebar',
		'description' => __( 'Appears on the right side of all blog pages.', 'woobits' ),
		'before_widget' => '<aside id="%1$s" class="woobits-sidebar-widget widget %2$s clearfix">',
		'after_widget' => '</aside>',
		'before_title' => '<h6 class="title">',
		'after_title' => '</h6>',
    ) );
}
add_action( 'widgets_init', 'register_blog_sidebar', 10 );
