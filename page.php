<?php
/**
 * This is the template for displaying all pages.
 * 
 * @package woobits
 */


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				do_action( 'woobits_page_before' );

				get_template_part( 'templates/content', 'page' );

				/**
				 * Functions hooked in to woobits_page_after action
				 *
				 * @hooked woobits_display_comments - 10
				 */
				do_action( 'woobits_page_after' );

			endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
