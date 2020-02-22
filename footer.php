<?php
/**
 * The footer for our theme.
 *
 * @package woobits
 */
 ?>

</section> <!-- Section site-content -->

    <footer class="woobits-site-footer">
        <div class="sidebars">
            <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-1'); } ?>
            <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-2'); } ?>
            <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-3'); } ?>
            <?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-4'); } ?>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>