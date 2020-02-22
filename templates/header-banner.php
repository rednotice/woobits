<?php
/**
 * Template for the header title which shows under the main menu.
 *
 * @package woobits
 */

?>

<div class="banner">
    <div class="container text-center">
        <h1 class="title"><?php wp_title( false ); ?></h1>
        <p class="breadcrumbs"><?php the_breadcrumb(); ?></p>
    </div>
</div>