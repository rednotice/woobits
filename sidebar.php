<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package woobits
 */

if( function_exists( 'is_shop') && is_shop() && is_active_sidebar( 'shop' ) ) :
	?>
	<div id="secondary" class="widget-area shop" role="complementary">
		<?php dynamic_sidebar( 'shop' ); ?>
	</div><!-- #secondary -->
	<?php

elseif( function_exists( 'is_product') && is_product() && is_active_sidebar( 'product' ) ) :
	?>
	<div id="secondary" class="widget-area product" role="complementary">
		<?php dynamic_sidebar( 'product' ); ?>
	</div><!-- #secondary -->
	<?php

else : return;
endif;
