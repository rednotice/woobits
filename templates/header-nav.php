<?php
/**
 * Template used to display post content.
 *
 * @package woobits
 */

?>

<nav class="woobits-navbar">
    <?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo '<a href="' . get_home_url() . '" class="brand">';
        echo get_bloginfo( 'name' );
        echo '</a>';
    } ?>

    <button class="toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="icon"></span>
    </button>

    <?php
        wp_nav_menu( 
            [ 
                'theme_location' => 'main-menu',
                'container_class' => 'container',
                'container_id' => 'navbarSupportedContent',
                'menu_class' => 'menu',
            ] 
        );
    ?>
</nav>