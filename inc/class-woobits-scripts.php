<?php
/**
 *  Enqueues theme scripts.
 *
 * @package woobits
 *
 */

if ( ! class_exists( 'Woobits_Scripts' ) ) {
    class Woobits_Scripts
	{
        public function __construct()
        {
            add_action( 'wp_enqueue_scripts', array( $this, 'load_css' ) );
            add_action( 'wp_enqueue_scripts', array( $this, 'load_js' ) );
        }

        public function load_css() {
            wp_dequeue_style( 'wp-block-library' ); // Remove default guttenberg block editor stylesheet
            wp_enqueue_style( 'site_main_css', get_template_directory_uri() . '/dist/main.min.css' );
        }

        public function load_js() 
        {
            wp_register_script( 
                'bundle_js', 
                get_template_directory_uri() . '/dist/bundle.js', 
                'jquery',
                false,
                true 
            );
            wp_enqueue_script( 'bundle_js' );
        }
    }
}