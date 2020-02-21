<?php
/**
 * Default static front page.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<section class="page-wrap">
    <div class="container">

        <h1><?php the_title(); ?></h1>

        <?php get_template_part( 'templates/content' ); ?>

    </div>
</section>

<?php get_footer(); ?>