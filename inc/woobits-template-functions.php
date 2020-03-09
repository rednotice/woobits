<?php
/**
 * These functions contain the templates for the theme. They are hooked into the pages.
 * 
 * @package woobits
 *
 */

 /**
  * Header
  */
function woobits_primary_navigation() {
    get_template_part( 'templates/header', 'navigation' );
}

function woobits_site_header() {
    if( function_exists( 'is_product' ) && is_product() ) : get_template_part( 'templates/header', 'product' );
    elseif( is_single() ) : get_template_part( 'templates/header', 'single' );
    elseif( ! is_front_page() && ! is_404() )  :  get_template_part( 'templates/header' );
    endif;
}

function ww_load_dashicons(){
    wp_enqueue_style('dashicons');
}
add_action('wp_enqueue_scripts', 'ww_load_dashicons', 1);


// Creates Cart Icon Shortcode
add_shortcode ('woobits_cart', 'woobits_cart' );
function woobits_cart() {
	ob_start();
 
        $cart_count = WC()->cart->cart_contents_count;
        $cart_url = wc_get_cart_url();
  
        ?>
        <li class="menu-item nav-item">
            <a class="woobits-cart-icon nav-link" href="<?php echo $cart_url; ?>" title="My Basket">
            <?php
            if ( $cart_count > 0 ) {
                ?>
                <span class="woobits-cart-count"><?php echo $cart_count; ?></span>
                <?php
            }
            ?>
            </a>
            <ul class="woobits-cart-content" style="display: none;">
                <span class="empty"><?php _e( 'Your cart is empty.', 'woobits'); ?></span>
            </ul>
        </li>
        <?php
	        
    return ob_get_clean();
}

// Updates counter using AJAX when cart content changes
function woobits_cart_counter( $fragments ) {
    ob_start();
    
    $cart_count = WC()->cart->cart_contents_count;
    $cart_url = wc_get_cart_url();
    $cart_total = WC()->cart->get_cart_total();
    
    ?>
    <a class="woobits-cart-icon nav-link" href="<?php echo $cart_url; ?>" title="<?php _e( 'View your shopping cart', 'woobits' ); ?>">
	<?php
    if ( $cart_count > 0 ) {
        ?>
        <span class="woobits-cart-count"><?php echo $cart_count; ?></span>
        <?php            
    }
        ?>
    </a>
    <!-- <ul class="woobits-cart-content" style="display: none;">
        <span class="empty"><?php echo $cart_total; ?></span>
        LOL
    </ul> -->
    <?php
 
    $fragments['a.woobits-cart-icon'] = ob_get_clean();
     
    return $fragments;
}

// Creates Cart Icon Shortcode
add_shortcode ('woobits_search', 'woobits_search' );
function woobits_search() {
	ob_start();
        ?>
        <li class="menu-item nav-item">
            <a class="woobits-search-icon nav-link" title="Search">
            </a>
            <ul style="display: none;" class="woobits-searchform">
                <?php get_search_form(); ?>
            </ul>
        </li>
        <?php
	        
    return ob_get_clean();
}

// Add Cart Menu Item Shortcode to particular menu
function woobits_add_icons_to_menu ( $items, $args ) {
        $items .=  do_shortcode('[woobits_search]');
        $items .=  do_shortcode('[woobits_cart]');
        return $items;
}

/**
 * Footer
 */
function woobits_footer_widgets() {
    ?>
    <div class="woobits-footer-widgets">
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-1'); } ?>
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-2'); } ?>
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-3'); } ?>
        <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-4'); } ?>
    </div>
    <?php
}

function woobits_copyright() {
    ?>
    <div class="woobits-copyright">
        <span>Copyright 2020 wpBits. All rights reserved.</span>
    </div>
    <?php
}

/**
 * Content
 */
function woobits_categories() {
    $categories = get_categories();
        if( $categories ): ?>
        <div class="categories">
            <span class="heading"><?php _e('Categories', 'woobits'); ?></span>
            <?php
                foreach( $categories as $category ) {
                    echo '<a href="' . get_category_link( $category->term_id ) . '"><span class="category">' . $category->name . '</span></a>';
                }
            ?> 
        </div>
    <?php endif;
}

function woobits_tags() {
    $tags = get_the_tags();
        if( $tags ): ?>
        <div class="tags">
            <span class="heading"><?php _e('Tags', 'woobits'); ?></span>
            <?php
                foreach( $tags as $tag ) {
                    echo '<a href="' . get_tag_link( $tag ) . '"><span class="tag">' . $tag->name . '</span></a>';
                }
            ?> 
        </div>
    <?php endif;
}

function woobits_post_navigation() {
    ?>
    <div class="navigation">
        <span class="link"><?php previous_post_link(); ?></span>
        <span class="link"><?php next_post_link(); ?> </span>
    </div>
    <?php
}

function woobits_posts_navigation() {
    ?>
    <div class="navigation">
        <div class="previous">
            <?php previous_posts_link(); ?>
        </div>
        <div class="next">
            <?php next_posts_link(); ?>
        </div>
    </div>
    <?php
}

/**
 * Displays the comments template.
 */
function woobits_display_comments() {
    if ( comments_open() ): comments_template(); endif;
}

/**
 * Widgets
 */
function woobits_purchase_box_widget() {
    ?> 
    <aside class="woobits-sidebar-widget widget widget_search clearfix">
        <h6 class="title"><?php _e( 'Download Details', 'woobits' ); ?> </h6>
        <div>
            <?php 
                /**
                 * Functions hooked in to woobits_purchase_box_widget add_action
                 * 
                 * @hooked woocommerce_template_single_add_to_cart - 10
                 */
                do_action('woobits_purchase_box_widget'); 
            ?>
        </div>
    </aside>
    <?php
}

/**
 * WooCommerce
 */

/**
 * Displays the product review template.
 */
function woobits_display_product_reviews() {
    global $product;
 
    if ( ! comments_open() )
        return;
?>
    <div class="product-reviews">
        <h2 class="review-title" itemprop="headline">
            <?php printf( __( 'Reviews (%d)', 'woocommerce' ), $product->get_review_count() ); ?>
        </h2>
        <?php comments_template();; ?>
    </div>
    <div class="clearfix clear"></div>
<?php
}

/**
 * Hides the title on the shop page.
 */
function woobits_hide_shop_page_title( $title ) {
    if ( is_shop() ) $title = false;
    return $title;
}

/**
 * Removes the add to cart buttons on product archive pages.
 */
function woobits_remove_add_to_cart_buttons() {
    if( is_shop() || is_product_category() || is_product_tag() ) { 
        remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart' );
    }
}

/**
 * Removes the quantity fields.
 */
function woobits_remove_all_quantity_fields( $return, $product ) {
    return true;
}
