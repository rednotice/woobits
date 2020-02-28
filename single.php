<?php
/**
 * Single blog post.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<?php if( is_product() ) : get_template_part( 'templates/content', 'product' );
    
    else: get_template_part( 'templates/content', 'single' ); 

    endif
?>

<?php get_footer(); ?>