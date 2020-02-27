<?php
/**
 * Displays all blog posts.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<div class="row">
    <div class="woobits-posts col-12 <?php if( is_active_sidebar( 'blog' ) ) : echo 'col-lg-8'; endif; ?> ">
        <?php if( have_posts() ): while( have_posts() ): the_post();?>

            <?php get_template_part( 'templates/post', 'preview' ) ?>
            
        <?php endwhile; ?>

            <div class="pagination">
                <div class="previous">
                    <?php previous_posts_link(); ?>
                </div>
                <div class="next">
                    <?php next_posts_link(); ?>
                </div>
            </div>
        
        <?php else: endif; ?>

    </div>

    <?php if( is_active_sidebar( 'blog' ) ): ?>
        <div class="woobits-blog-sidebar col-12 col-lg-4">
            <?php dynamic_sidebar( 'blog' ); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>