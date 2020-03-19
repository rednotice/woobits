<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package woobits
 */

if( is_active_sidebar( 'product' ) && function_exists( 'is_product') && is_product() ) :
	?>
	<div id="secondary" class="widget-area product" role="complementary">
		<?php 
			/**
			 * Functions hooked in to woobits_purchase_box add_action
			 * 
			 * @hooked woobits_purchase_box_widget - 10
			 * @hooked woobits_product_information_widget - 20
			 */
			do_action( 'woobits_product_sidebar');

			dynamic_sidebar( 'product' ); 
		?>
	</div><!-- #secondary -->
	<?php

elseif( is_active_sidebar( 'shop' ) && function_exists( 'is_shop') && ( is_shop() || is_product_category() || is_product_tag() ) ) :
	?>
	<div id="secondary" class="widget-area shop" role="complementary">
		<?php dynamic_sidebar( 'shop' ); ?>
	</div><!-- #secondary -->
	<?php

elseif( is_active_sidebar( 'blog' ) && ( is_single() || is_home() || is_archive() ) ) :
	?>
	<div id="secondary" class="widget-area blog" role="complementary">
		<?php dynamic_sidebar( 'blog' ); ?>
	</div><!-- #secondary -->
	<?php

else : return;
endif;
