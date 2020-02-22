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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head(); ?>

</head>
<body>
    
    <header id="masthead" class="woobits-site-header">

        <?php get_template_part( 'templates/header', 'nav' ) ?>
        
        <?php if( ! is_front_page() ): get_template_part( 'templates/header', 'banner' ); endif; ?>

    </header>

    <section class="woobits-site-content">