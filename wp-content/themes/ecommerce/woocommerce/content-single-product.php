<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.

	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="b-product_single pb-5">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					do_action( 'woocommerce_before_single_product_summary' );
					?>
                </div>
                <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-xs-12">
                    <div class="b-product_single_summary summary entry-summary">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
						?>
						<div class="b-product_single_order-by">
                           <?php $whatsapp_number = get_field( 'whatsapp_number', 'option' );
                            $viber_number    = get_field( 'viber_number', 'option' );?>
							<h6 class="font-weight-bold mb-0 mr-3 text-uppercase">Order By :</h6>
							<ul class="list-unstyled mb-0">
								<li>
									<a href="" class="phone" title="order by phone">
										<i class="ico-phone"></i>
									</a>
								</li>
								<li>
									<a href="https://wa.me/<?= $whatsapp_number ?>" class="WhatsApp" target="_blank" title="order by phone">
										<i class="ico-whatsapp"></i>
									</a>
								</li>
								<li>
									<a href="viber://chat?number=%2B<?= $viber_number ?>" class="viber" target="_blank" title="order by phone">
										<i class="ico-viber"></i>
									</a>
								</li>
							</ul>
						</div>
                        <div class="b-product_single_option">
                            <ul class="pl-0 list-unstyled">
                                <li><?php echo do_shortcode( "[ti_wishlists_addtowishlist]" ); ?></li>
								<?php woocommerce_template_single_meta(); ?>
                                <li><?php woocommerce_template_single_sharing() ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
<?php do_action( 'woocommerce_after_single_product' ); ?>

