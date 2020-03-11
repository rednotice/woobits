<?php
/**
 * Template used to display the main navigation.
 *
 * @package woobits
 */
?>

<nav class="woobits-navbar" <?php if( is_admin_bar_showing() ) : echo 'style="top:32px;"'; endif; ?>>
    <?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo '<a href="' . get_home_url() . '" class="brand">';
        echo get_bloginfo( 'name' );
        echo '</a>';
    } ?>

    <button class="toggler" type="button" data-toggle="collapse" data-target="#woobitsMenu" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon"></span>
    </button>

    <?php
        wp_nav_menu( 
            [ 
                'theme_location' => 'main-menu',
                'container_class' => 'container',
                'container_id' => 'woobitsMenu',
                'menu_class' => 'menu',
                'menu_id' => 'woobits-main-menu'
            ] 
        );
    ?>
</nav>