<?php
/**
 * Registers the theme's menus.
 * @package woobits
 *
 */

if ( ! class_exists( 'Woobits_Menus' ) ) {
    class Woobits_Menus
    {
        public function __construct()
        {
            $this->register_nav_menus();

            add_filter( 'nav_menu_css_class', array( $this, 'add_nav_classes' ), 10, 2 );
            add_filter( 'nav_menu_link_attributes', array( $this, 'add_nav_link_attributes' ), 10, 3 );
            add_filter( 'nav_menu_submenu_css_class', array( $this, 'add_nav_menu_submenu_css_class' ), 10, 3 );
        }

        public function register_nav_menus()
        {
            register_nav_menus(
                [
                    'main-menu' => __('Main Menu', 'woobits')
                ]
            );
        }

        public function add_nav_classes( $classes, $item ) 
        {
            $classes[] = 'nav-item';
            if ( in_array( 'current-menu-item', $classes ) ) {
                $classes[] = 'active';
            }
            return $classes;
        }

        public function add_nav_link_attributes( $atts, $item, $args ) 
        {
            $atts[ 'class' ] = 'nav-link';
            return $atts;
        }

        public function add_nav_menu_submenu_css_class( $classes, $args, $depth ) 
        {
            $classes[] = 'sub-menu-' . $depth;
            return $classes;
        }
    }
}