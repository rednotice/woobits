<?php
/**
 * Registers the theme's sidebars. *
 * @package woobits
 *
 */

if ( ! class_exists( 'Woobits_Sidebars' ) ) {
    class Woobits_Sidebars
    {
        public function __construct()
        {
            add_action( 'widgets_init', array( $this, 'register_sidebars' ), 10 );
            add_action( 'widgets_init', array( $this, 'register_footer_widgets' ), 20 );
        }

        public function register_sidebars()
        {
            register_sidebar( array(
                'name' => __( 'Blog Sidebar', 'woobits' ),
                'id' => 'blog',
                'description' => __( 'Appears on the right side of all blog pages.', 'woobits' ),
                'before_widget' => '<aside id="%1$s" class="woobits-sidebar-widget widget %2$s clearfix">',
                'after_widget' => '</aside>',
                'before_title' => '<h6 class="title">',
                'after_title' => '</h6>',
            ) );
        }

        public function register_footer_widgets()
        {
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
    }
}