<?php
/**
 * Template used to display post content.
 *
 * @package woobits
 */

?>

<?php if( have_posts() ): while( have_posts() ): the_post(); ?>

    <?php the_content(); ?>

<?php endwhile; else: endif; ?>