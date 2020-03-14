<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package woobits
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to storefront_page add_action
	 *
	 * @hooked the_content - 10
	 */
	do_action( 'woobits_page' );
	?>
</article><!-- #post-## -->
