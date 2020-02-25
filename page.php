<?php
/**
 * @package woobits
 */
?>

<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<?php get_template_part( 'templates/content' ); ?>

<?php if ( comments_open() ): comments_template(); endif;?>

<?php get_footer(); ?>