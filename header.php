<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package woobits
 */
 ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>
    
    <header id="masthead" class="woobits-site-header">

        <?php
        /**
		 * Functions hooked into woobits_header action
		 *
		 * @hooked woobits_primary_navigation - 10
         * @hooked woobits_site_header - 20
		 */
        do_action( 'woobits_header' ); 
        ?>

    </header>

    <?php do_action( 'woobits_before_content' ); ?>

    <nav class="woobits-mobile-menu-container">
        <div class="account">
            <?php echo do_shortcode( '[woobits_account]' ); ?>
        </div>

        <?php
            wp_nav_menu( 
                [ 
                    'theme_location' => 'main-menu',
                    'container' => false,
                    'menu_id' => 'woobitsMainMenu',
                    'menu_class' => 'woobits-main-menu',
                ] 
            );
        ?>

        <div class="search">
            <?php get_search_form(); ?>
        </div>
    </nav>

    <div class="woobits-wrapper">
        <div class="woobits-container">
            