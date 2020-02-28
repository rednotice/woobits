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
<body>
    
    <header id="masthead" class="woobits-site-header">

        <?php 
            get_template_part( 'templates/nav' );

            if( function_exists( 'is_product' ) && is_product() ) : get_template_part( 'templates/header', 'product' );

            elseif( is_single() ) : get_template_part( 'templates/header', 'single' );

            elseif( ! is_front_page() && ! is_404() )  :  get_template_part( 'templates/header' );

            endif;
        ?>

    </header>

    <section class="woobits-site-content">
        <div class="container-fluid">