<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-xl-4 col-lg-4 col-mb-4 col-sm-6 col-xs-12 <?php wc_product_class( '', $product ); ?>">
    <div class="b-product_grid_single">
		<?php
		/**
		 * Hook: woocommerce_before_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_open - 10
		 */
		//		do_action( 'woocommerce_before_shop_loop_item' );
		?>
        <div class="b-product_grid_header">
            <a href="<?= $product->get_permalink() ?>">
				<?php
				/**
				 * Hook: woocommerce_before_shop_loop_item_title.
				 *
				 * @hooked woocommerce_show_product_loop_sale_flash - 10
				 * @hooked woocommerce_template_loop_product_thumbnail - 10
				 */
				//				do_action( 'woocommerce_before_shop_loop_item_title' );
				woocommerce_template_loop_product_thumbnail();
				?>
            </a>
            <div class="b-product_grid_action">
                <a href="javascript:void(0)" data-whishurl="whishlist.html" data-toggle="tooltip" data-placement="left"
                   title="" data-original-title="Add to Whishlist">
                    <i class="icon-heart icons b-add_to_whish">
                        <img src="assets/images/products/product_loading.gif" class="g-loading_gif" alt="">
                    </i>
                </a>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view"
                   data-product-id="<?= $product->get_id() ?>"
                   class="quick-view">
                    <i data-toggle="tooltip" data-placement="left" title=""
                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                </a>
            </div>
            <span class="b-product_label"><?php woocommerce_show_product_loop_sale_flash() ?>
        </div>
        <div class="b-product_grid_info">
			<?php
			/**
			 * Hook: woocommerce_shop_loop_item_title.
			 *
			 * @hooked woocommerce_template_loop_product_title - 10
			 */
			do_action( 'woocommerce_shop_loop_item_title' );
			?>
            <div class="clearfix">
                <div class="b-product_grid_toggle float-left">
					<?php
					/**
					 * Hook: woocommerce_after_shop_loop_item_title.
					 *
					 * @hooked woocommerce_template_loop_rating - 5
					 * @hooked woocommerce_template_loop_price - 10
					 */
					do_action( 'woocommerce_after_shop_loop_item_title' );

					woocommerce_template_loop_add_to_cart();
					?>
                </div>
            </div>
			<?php

			?>
        </div>
		<?php
		/**
		 * Hook: woocommerce_after_shop_loop_item.
		 *
		 * @hooked woocommerce_template_loop_product_link_close - 5
		 * @hooked woocommerce_template_loop_add_to_cart - 10
		 */
		//		do_action( 'woocommerce_after_shop_loop_item' );
		?>
    </div>
</div>
