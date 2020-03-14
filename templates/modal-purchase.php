<?php
/**
 * Purchase modal.
 *
 * @package woobits
 */
?>

<div class="modal fade woobits-purchase-modal" id="purchaseModal" tabindex="-1" role="dialog" aria-label="Purchase box" aria-hidden="true">
    <div class="modal-dialog modal-content" role="document">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <?php 
            /**
             * Functions hooked in to woobits_purchase_modal add_action
             * 
             * @hooked woobits_purchase_box_widget - 10
             */
            do_action('woobits_purchase_modal'); 
        ?>
    </div>
</div>