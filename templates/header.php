<?php
/**
 * Template for the header title which shows under the main menu.
 *
 * @package woobits
 */

?>

<div class="woobits-header">
    <div class="container">
        <div class="wrapper">
            <div class="info">
                <h1 class="title"><?php wp_title( false ); ?></h1>
                <p class="breadcrumbs"><?php the_breadcrumb(); ?></p>
            </div>
        </div>
    </div>
</div>