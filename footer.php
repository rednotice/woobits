<?php
/**
 * The footer for our theme.
 *
 * @package woobits
 */
 ?>

    </div> <!-- Class site-content -->

    <footer class="woobits-site-footer">
        <div class="woobits-footer-jumbotron jumbotron-fluid jumbotron">
            <div class="container d-flex flex-column flex-md-row">
                <div class="woobits-footer-sidebar col-12 col-md-3 mb-4" id="woobits-footer-sidebar-1"><?php if(is_active_sidebar('footer-1')) { dynamic_sidebar('footer-1'); } ?></div>
                <div class="woobits-footer-sidebar col-12 col-md-3" id="woobits-footer-sidebar-2"><?php if(is_active_sidebar('footer-2')) { dynamic_sidebar('footer-2'); } ?></div>
                <div class="woobits-footer-sidebar col-12 col-md-3" id="woobits-footer-sidebar-3"><?php if(is_active_sidebar('footer-3')) { dynamic_sidebar('footer-3'); } ?></div>
                <div class="woobits-footer-sidebar col-12 col-md-3" id="woobits-footer-sidebar-4"><?php if(is_active_sidebar('footer-4')) { dynamic_sidebar('footer-4'); } ?></div>
            </div>
        </div>
    </footer>

    <?php wp_footer(); ?>

</body>
</html>