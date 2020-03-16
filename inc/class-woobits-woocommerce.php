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
      add_action( 'add_meta_boxes', array( $this, 'add_meta_boxes' ), 1 );
      add_action( 'save_post_product', array( $this, 'save_preview_link' ), 10 );
      add_action( 'save_post_product', array( $this, 'save_product_features' ), 10 );

      add_action( 'widgets_init', array( $this, 'register_sidebars' ), 11 );
      add_filter('woocommerce_dropdown_variation_attribute_options_html', array( $this, 'variation_radio_buttons' ), 20, 2);
    }

    public function add_meta_boxes() 
    {
      add_meta_box(
        'woobits_preview_link',
        __('Live Preview URL', 'woobits'),
        array( $this, 'render_preview_link_meta_box' ),
        'product',
        'normal',
        'high'
      );

      add_meta_box(
        'woobits_product_features',
        __('Product Features', 'woobits'),
        array( $this, 'render_product_features_meta_box' ),
        'product'
      );
    }

    public function render_preview_link_meta_box() 
    {
      // Add an nonce field so we can check for it later.
      wp_nonce_field( 'woobits_preview_link', 'woobits_preview_link_nonce' );

      // Use get_post_meta to retrieve an existing value from the database.
      global $post_id;
      $value = get_post_meta( $post_id, '_woobits_preview_link', true ) ?? '';

      // Display the form, using the current value.
      ?>
      <input 
        type="text" 
        id="woobits_preview_link" 
        name="woobits_preview_link"
        class="woobits-preview-link"
        style="width: 100%;"
        value="<?php echo esc_attr( $value ); ?>"
        aria-label="<?php _e( 'Live Preview URL', 'woobits' ); ?>"
      />
      <?php
    }

    public function save_preview_link( int $post_id ) 
    {
      //Verify nonce
      if ( ! isset( $_POST['woobits_preview_link_nonce'] ) ) {
          return $post_id;
      }

      $nonce = $_POST['woobits_preview_link_nonce'];

      if ( ! wp_verify_nonce( $nonce, 'woobits_preview_link' ) ) {
          return $post_id;
      }

      // Do nothing, if there is an autosave.
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
      }

      // Check the user's permissions.
      if ( 'page' == $_POST['post_type'] ) {
          if ( ! current_user_can( 'edit_page', $post_id ) ) {
              return $post_id;
          }
      } else {
          if ( ! current_user_can( 'edit_post', $post_id ) ) {
              return $post_id;
          }
      }
    }

    public function render_product_features_meta_box() 
    {
      wp_nonce_field( 'woobits_product_features', 'woobits_product_features_nonce' );

      ?>
        <script>
          jQuery(document).ready(function($){
            $('#woobits-add-row').on('click', function() {
              let row = $('.empty-row.screen-reader-text').clone(true);
              row.removeClass('empty-row screen-reader-text');
              row.insertAfter('#repeatable-fieldset-one tbody>tr:last');
              return false;
            });
            
            $('.woobits-remove-row').on('click', function() {
              $(this).parents('tr').remove();
              return false;
            });
          });
        </script>

        <table id="repeatable-fieldset-one" width="100%">
          <thead>
            <tr>
              <th width="40%"><?php _e( 'Name', 'woobits'); ?></th>
              <th width="40%"><?php _e( 'Description', 'woobits'); ?></th>
              <th width="8%"></th>
            </tr>
          </thead>
          <tbody>
            <tr class="empty-row screen-reader-text">
              <td><input type="text" class="widefat" name="woobits_product_feature_name[]"></td>
              <td><input type="text" class="widefat" name="woobits_product_feature_description[]"></td>
              <td><a class="button woobits-remove-row" href="#"><?php _e( 'Remove', 'woobits'); ?></a></td>
            </tr>
            <?php
              $product_features = get_post_meta( get_the_ID(), '_woobits_product_features', true );
              if( $product_features ) {
                foreach( $product_features as $name => $description ) {
                  ?>
                    <tr>
                      <td><input type="text" class="widefat" name="woobits_product_feature_name[]" value="<?php echo $name; ?>"></td>
                      <td><input type="text" class="widefat" name="woobits_product_feature_description[]" value="<?php echo $description; ?>"></td>
                      <td><a class="button woobits-remove-row" href="#"><?php _e( 'Remove', 'woobits' ); ?></a></td>
                    </tr>
                  <?php
                }
              }
            ?>
          </tbody>
        </table>
        <p><a id="woobits-add-row" class="button"><?php _e( 'Add Another', 'woobits'); ?></a></p>
      <?php
    }

    public function save_product_features( int $post_id ) 
    {
      //Verify nonce
      if ( ! isset( $_POST['woobits_product_features_nonce'] ) ) {
          return $post_id;
      }

      $nonce = $_POST['woobits_product_features_nonce'];

      if ( ! wp_verify_nonce( $nonce, 'woobits_product_features' ) ) {
          return $post_id;
      }

      // Do nothing, if there is an autosave.
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
          return $post_id;
      }

      // Check the user's permissions.
      if ( 'page' == $_POST['post_type'] ) {
          if ( ! current_user_can( 'edit_page', $post_id ) ) {
              return $post_id;
          }
      } else {
          if ( ! current_user_can( 'edit_post', $post_id ) ) {
              return $post_id;
          }
      }

      // Sanitize the user input.
      $name = $_POST['woobits_product_feature_name'];
      $description = $_POST['woobits_product_feature_description'];

      // Combine arrays
      $data = array_combine( $name, $description );

      // Remove empty keys
      $data = array_filter( $data, function( $key ) {
        return !empty( $key );
      }, ARRAY_FILTER_USE_KEY );

      // Update the meta field.
      update_post_meta( $post_id, '_woobits_product_features', $data );
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