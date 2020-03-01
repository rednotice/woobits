<?php
/**
 * Template used to display post content on single pages.
 *
 * @package woobits
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'woobits_single_post_top' );

	/**
	 * Functions hooked into woobits_single_post add_action
	 *
	 * @hooked the_content - 10
	 */
	do_action( 'woobits_single_post' );

	/**
	 * Functions hooked in to woobits_single_post_bottom action
	 *
	 * @hooked woobits_categories - 10
	 * @hooked woobits_tags - 20
	 * @hooked woobits_post_navigation - 30
	 * @hooked woobits_display_comments - 40
	 */
	do_action( 'woobits_single_post_bottom' );
	?>

</article><!-- #post-## -->
