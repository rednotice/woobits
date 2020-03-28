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

    <?php
        wp_nav_menu( 
            [ 
                'theme_location' => 'main-menu',
                'container' => false,
                'menu_id' => 'woobitsMainMenu',
                'menu_class' => 'woobits-main-menu menu',
                'fallback_cb' => false
            ] 
        );
    ?>
</nav>