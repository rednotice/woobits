<?php
/**
 * This file is loaded when some requests a page that doesn't exist.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<div class="woobits-404">
    <div class="wrapper">
        <div class="img-container">
            <img src="<?php echo get_template_directory_uri(); ?>/src/img/404.png" alt="Page not found">
        </div>
        <p class="text"><?php esc_html_e( 'The page you&rsquo;re looking for doesn&rsquo;t exist.', 'woobitd' ); ?></p>
        <a href="<?php echo home_url(); ?>" class="btn btn-outline-light">Back to Home</a>
    </div>
</div>

<?php get_footer(); ?>

<style>
    body {
        background: linear-gradient(-135deg, #19003b 0%, #280082 100%);
    }

    .woobits-navbar {
        position: relative;
    }
</style>