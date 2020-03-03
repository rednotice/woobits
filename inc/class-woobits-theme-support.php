<?php
/**
 * Adds theme support.
 * @package woobits
 *
 */

if ( ! class_exists( 'Woobits_Theme_Support' ) ) {
    class Woobits_Theme_Support
    {
        public function __construct()
        {
            $this->add_base_support();
            add_action( 'after_setup_theme', array( $this, 'add_woocommerce_support' ) );
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
            add_theme_support( 'woocommerce' );
            add_theme_support( 'wc-product-gallery-zoom' );
            add_theme_support( 'wc-product-gallery-lightbox' );
            add_theme_support( 'wc-product-gallery-slider' );
        }

    }
}