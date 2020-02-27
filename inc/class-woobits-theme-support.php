<?php
/**
 * Registers the theme's menus.
 * @package woobits
 *
 */

if ( ! class_exists( 'Woobits_Theme_Support' ) ) {
    class Woobits_Theme_Support
    {
        public function __construct()
        {
            $this->add_base_support();
            // add_action( 'after_setup_theme', array( $this, 'add_woocommerce_support' ) );
        }

        public function add_base_support()
        {
            add_theme_support( 'menus' );
            add_theme_support( 'title-tag' );
            add_theme_support( 'custom-logo', array(
                'height'      => 45,
                'width'       => 140,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' )
            ) );
        }

        public function add_woocommerce_support()
        {
            $args = [
                'thumbnail_image_width' => 150,
                'single_image_width'    => 300,
        
                'product_grid'          => array(
                    'default_rows'    	=> 3,
                    'min_rows'       	=> 2,
                    'max_rows'        	=> 8,
                    'default_columns' 	=> 4,
                    'min_columns'    	=> 2,
                    'max_columns'    	=> 5,
                )
            ];
            add_theme_support( 'woocommerce', $args );
        }

    }
}