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

            <div class="content">
                <?php the_content(); ?>
            </div>

            <div class="navigation">
                <span class="link"><?php previous_post_link(); ?></span>
                <span class="link"><?php next_post_link(); ?> </span>
            </div>

            <?php $categories = get_categories();
                if( $categories ): ?>

                <div class="categories">
                    <span class="heading"><?php _e('Categories', 'woobits'); ?></span>
                    <?php
                        foreach( $categories as $category ) {
                            echo '<a href="' . get_category_link( $category->term_id ) . '"><span class="category">' . $category->name . '</span></a>';
                        }
                    ?> 
                </div>
            <?php endif; ?>

            <?php $tags = get_the_tags();
                if( $tags ): ?>

                <div class="tags">
                    <span class="heading"><?php _e('Tags', 'woobits'); ?></span>
                    <?php
                        foreach( $tags as $tag ) {
                            echo '<a href="' . get_tag_link( $tag ) . '"><span class="tag">' . $tag->name . '</span></a>';
                        }
                    ?> 
                </div>
            <?php endif; ?>

        <div class="nav-previous alignleft"><?php previous_posts_link( 'Older posts' ); ?></div>
        <div class="nav-next alignright"><?php next_posts_link( 'Newer posts' ); ?></div>

        <?php if ( comments_open() ): comments_template(); endif;?>

        <?php endwhile; ?>

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