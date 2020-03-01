<?php
/**
 * The main template file.
 * 
 * @package woobits
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'templates/post', 'preview' );

			endwhile;

			/**
			 * Functions hooked in to woobits_after_main_loop action
			 *
			 * @hooked woobits_posts_navigation - 10
			 */
			do_action( 'woobits_after_main_loop' );

		else :

			_e( 'No posts found.', 'woobits' );

		endif;
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar();
get_footer();
