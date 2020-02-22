<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package woobits
 */
?>

<?php get_header(); ?>

<div class="row">
    <div class="woobits-blog-posts col-12 <?php if( is_active_sidebar( 'blog-sidebar' ) ) : echo 'col-lg-9'; endif; ?> ">

        <?php if( have_posts() ): while( have_posts() ): the_post();?>

            <?php get_template_part( 'templates/post', 'preview' ) ?>
            
        <?php endwhile; else: endif; ?>

    </div>

    <?php if( is_active_sidebar( 'blog-sidebar' ) ): ?>
        <div class="woobits-blog-sidebar col-12 col-lg-3">
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>