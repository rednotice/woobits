<?php
/**
 * Customizes WooCommerce.
 * 
 * @package woobits
 *
 */

if ( ! class_exists( 'Woobits_Woocommerce' ) ) {
  class Woobits_Woocommerce
  {
    public function __construct()
    {
        add_action( 'widgets_init', array( $this, 'register_sidebars' ), 11 );
        add_filter('woocommerce_dropdown_variation_attribute_options_html', array( $this, 'variation_radio_buttons' ), 20, 2);
    }

    public function register_sidebars()
    {
        register_sidebar( array(
            'name' => __( 'Product Page Sidebar', 'woobits' ),
            'id' => 'product',
            'description' => __( 'Appears on the right side of the product page.', 'woobits' ),
            'before_widget' => '<aside id="%1$s" class="woobits-sidebar-widget widget %2$s clearfix">',
            'after_widget' => '</aside>',
            'before_title' => '<h6 class="title">',
            'after_title' => '</h6>',
        ) );

        register_sidebar( array(
            'name' => __( 'Shop Page Sidebar', 'woobits' ),
            'id' => 'shop',
            'description' => __( 'Appears on the left side of the shop page and product archive pages.', 'woobits' ),
            'before_widget' => '<aside id="%1$s" class="woobits-sidebar-widget widget %2$s clearfix">',
            'after_widget' => '</aside>',
            'before_title' => '<h6 class="title">',
            'after_title' => '</h6>',
        ) );
    }

    public function variation_radio_buttons( $html, $args ) 
    {
      $args = wp_parse_args( apply_filters( 'woocommerce_dropdown_variation_attribute_options_args', $args ), array(
        'options'          => false,
        'attribute'        => false,
        'product'          => false,
        'selected'         => false,
        'name'             => '',
        'id'               => '',
        'class'            => '',
        'show_option_none' => __('Choose an option', 'woocommerce'),
      ));
      
      if( false === $args['selected'] && $args['attribute'] && $args['product'] instanceof WC_Product ) {
        $selected_key     = 'attribute_'.sanitize_title($args['attribute']);
        $args['selected'] = isset( $_REQUEST[$selected_key] ) ? wc_clean( wp_unslash( $_REQUEST[$selected_key] ) ) : $args['product']->get_variation_default_attribute( $args['attribute'] );
      }
      
      $options               = $args['options'];
      $product               = $args['product'];
      $attribute             = $args['attribute'];
      $name                  = $args['name'] ? $args['name'] : 'attribute_'.sanitize_title( $attribute );
      $id                    = $args['id'] ? $args['id'] : sanitize_title( $attribute );
      $class                 = $args['class'];
      $show_option_none      = (bool)$args['show_option_none'];
      $show_option_none_text = $args['show_option_none'] ? $args['show_option_none'] : __('Choose an option', 'woocommerce');
    
      if( empty( $options ) && ! empty( $product ) && ! empty( $attribute ) ) {
        $attributes = $product->get_variation_attributes();
        $options    = $attributes[$attribute];
      }
      
      $radios = '<div class="variation-radios">';
      
      if( ! empty( $options ) ) {
        if( $product && taxonomy_exists( $attribute ) ) {
          $terms = wc_get_product_terms( $product->get_id(), $attribute, array(
            'fields' => 'all',
          ));

          foreach( $terms as $term ) {
            if( in_array( $term->slug, $options, true ) ) {
              $radios .= '<div class="form-check form-'.sanitize_title( $option ).'">
              <input class="form-check-input" type="radio" name="'.esc_attr( $name ).'" value="'.esc_attr( $term->slug ) .'" '.checked(sanitize_title( $args['selected'] ), $term->slug, false).'>
              <label class="form-check-label" for="'.esc_attr( $term->slug ) .'">'.esc_html( apply_filters( 'woocommerce_variation_option_name', $term->name ) ).'</label>
              </div>';
            }
          }
        } else {
          foreach( $options as $option ) {
              $checked    = sanitize_title( $args['selected']) === $args['selected'] ? checked( $args['selected'], sanitize_title( $option ), false ) : checked( $args['selected'], $option, false );
              $radios    .= '<div class="form-check form-'.sanitize_title( $option ).'">
              <input class="form-check-input" type="radio" name="'.esc_attr( $name ).'" value="'.esc_attr( $option ).'" id="'.sanitize_title( $option ).'" '.$checked.'>
              <label class="form-check-label" for="'.sanitize_title( $option ).'">'.esc_html( $this->display_price_in_variation_option_name( $option ) ) . '</label>
              </div>';
          }
        }
      }

      $radios .= '</div>';
      return $html.$radios;
    }

    public function display_price_in_variation_option_name( $term )
    {
      global $wpdb, $product;

      if ( empty( $term ) ) return $term;
      if ( empty( $product->get_id() ) ) return $term;

      $id = $product->get_id();

      $result = $wpdb->get_col( "SELECT slug FROM {$wpdb->prefix}terms WHERE name = '$term'" );

      $term_slug = ( !empty( $result ) ) ? $result[0] : $term;

      $query = "SELECT postmeta.post_id AS product_id
                  FROM {$wpdb->prefix}postmeta AS postmeta
                      LEFT JOIN {$wpdb->prefix}posts AS products ON ( products.ID = postmeta.post_id )
                  WHERE postmeta.meta_key LIKE 'attribute_%'
                      AND postmeta.meta_value = '$term_slug'
                      AND products.post_parent = $id";

      $variation_id = $wpdb->get_col( $query );

      $parent = wp_get_post_parent_id( $variation_id[0] );

      if ( $parent > 0 ) {
          $_product = new WC_Product_Variation( $variation_id[0] );
          return $term . ' - ' . wp_kses( wc_price ( $_product->get_price() ), array() );
      }
      return $term;
    }

  }
}