<?php
/**
 * Single blog post.
 * 
 * @package woobits
 */
?>

<?php get_header(); ?>

<?php if( is_product() ) : get_template_part( 'templates/single', 'product' );
    
    else: get_template_part( 'templates/single' ); 

    endif
?>

<?php get_footer(); ?>