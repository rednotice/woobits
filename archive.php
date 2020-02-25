<?php
/**
 * Displays all blog posts.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<div class="row">
    <div class="woobits-blog-posts col-12 <?php if( is_active_sidebar( 'blog-sidebar' ) ) : echo 'col-lg-8'; endif; ?> ">

        <?php if( have_posts() ): while( have_posts() ): the_post();?>

            <?php get_template_part( 'templates/post', 'preview' ) ?>
            
        <?php endwhile; else: endif; ?>

    </div>

    <?php if( is_active_sidebar( 'blog-sidebar' ) ): ?>
        <div class="woobits-blog-sidebar col-12 col-lg-4">
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        </div>
    <?php endif; ?>
</div>

Add Pagination

<?php get_footer(); ?>