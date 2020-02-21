<?php
/**
 * Displays all blog posts.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<h1><?php the_title(); ?></h1>

<?php get_template_part( 'templates/content' ); ?>

<?php get_footer(); ?>