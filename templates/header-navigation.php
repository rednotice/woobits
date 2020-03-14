<?php
/**
 * Template used to display the main navigation.
 *
 * @package woobits
 */
?>

<nav class="woobits-navbar" <?php if( is_admin_bar_showing() ) : echo 'style="top:32px;"'; endif; ?>>
    <div class="logo">
        <?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
            the_custom_logo();
        } else {
            echo '<a href="' . get_home_url() . '" class="brand">';
            echo get_bloginfo( 'name' );
            echo '</a>';
        } ?>
    </div>

    <div class="wrapper">
        <?php
            wp_nav_menu( 
                [ 
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_id' => 'woobitsMainMenu',
                    'menu_class' => 'd-none d-lg-flex woobits-main-menu',
                ] 
            );
        ?>

        <ul class="items">
            <?php echo do_shortcode('[woobits_search]'); ?>
            <?php echo do_shortcode('[woobits_cart]'); ?>
            <?php echo do_shortcode('[woobits_account]'); ?>
            <li id="woobitsMenuToggler" class="d-lg-none dashicons dashicons-menu-alt toggler"></li>
        </ul>
    </div>
</nav>