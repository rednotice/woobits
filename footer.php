<?php
/**
 * The footer for our theme.
 *
 * @package woobits
 */
 ?>

        </div> <!-- .woobits-container -->
    </div> <!-- .woobits-wrapper -->

    <?php do_action( 'woobits_after_content' ); ?>

    <footer class="woobits-site-footer">

        <?php
        /**
		 * Functions hooked into woobits_footer action
		 *
		 * @hooked woobits_footer_widgets - 10
         * @hooked woobits_copyright - 20
		 */
        do_action( 'woobits_footer' ); 
        ?>

    </footer>

    <?php do_action( 'woobits_after_footer' ); ?>

    <?php wp_footer(); ?>

</body>
</html>