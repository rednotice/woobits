<?php
/**
 * Template used to display post content.
 *
 * @package woobits
 */

?>

<nav class="woobits-navbar navbar navbar-expand-lg p-lg-4">
    <?php if( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
        the_custom_logo();
    } else {
        echo '<a href="' . get_home_url() . '" class="navbar-brand">';
        echo get_bloginfo( 'name' );
        echo '</a>';
    } ?>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <?php
        wp_nav_menu( 
            [ 
                'theme_location' => 'main-menu',
                'container_class' => 'woobits-menu-container collapse navbar-collapse',
                'container_id' => 'navbarSupportedContent',
                'menu_class' => 'woobits-main-menu navbar-nav mr-auto',
            ] 
        );
    ?>
</nav>