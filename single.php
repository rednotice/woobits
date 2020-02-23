<?php
/**
 * Single blog post.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<div class="row">
    <div class="woobits-single-post col-12 <?php if( is_active_sidebar( 'blog-sidebar' ) ) : echo 'col-lg-8'; endif; ?> ">

        <?php if( have_posts() ): while( have_posts() ): the_post(); ?>

            <?php the_content(); ?>

            <?php
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            ?>
            
        <?php endwhile; ?>

        <!-- Pagination below doesn't work... -->

        <?php wp_link_pages( array(
            'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'woobits' ) . '</span>',
            'after'       => '</div>',
            'link_before' => '<span>',
            'link_after'  => '</span>',
            ) );
        ?>

        <div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>

        <?php else : ?>
            <p><?php _e('Sorry, no posts matched your criteria.', 'woobits' ); ?></p>
        <?php endif; ?>

    </div>

    <?php if( is_active_sidebar( 'blog-sidebar' ) ): ?>
        <div class="woobits-blog-sidebar col-12 col-lg-4">
            <?php dynamic_sidebar( 'blog-sidebar' ); ?>
        </div>
    <?php endif; ?>
</div>

<?php get_footer(); ?>