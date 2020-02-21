<?php
/**
 * Template for the header title which shows under the main menu.
 *
 * @package woobits
 */

?>

<div class="woobits-header-jumbotron jumbotron-fluid jumbotron">
    <div class="container text-center">
        <h1 class="woobits-header-title"><?php wp_title( false ); ?></h1>
        <p class="woobits-breadcrumb"><?php the_breadcrumb(); ?></p>
    </div>
</div>