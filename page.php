<?php
/**
 * @package woobits
 */
?>

<?php get_header(); ?>

<?php if( is_shop() || is_product_category()  ) : get_template_part( 'templates/content', 'shop' );
    
    else : get_template_part( 'templates/content' );

    endif;
?>

<?php if ( comments_open() ): comments_template(); endif;?>

<?php get_footer(); ?>