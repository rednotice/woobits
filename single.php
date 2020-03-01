<?php
/**
 * The template for displaying all single posts.
 *
 * @package woobits
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			do_action( 'woobits_single_post_before' );

			get_template_part( 'templates/content', 'single' );

			do_action( 'woobits_single_post_after' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
