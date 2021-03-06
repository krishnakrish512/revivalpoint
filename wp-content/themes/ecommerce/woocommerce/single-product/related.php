<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     3.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( $related_products ) : ?>

    <section class="related products" id="b-products">
        <div class="b-section_title">
            <h4 class="text-center text-uppercase">
                RELATED PRODUCTS
                <span class="b-title_separator"><span></span></span>
            </h4>
        </div>

        <div class="b-products b-product_grid b-product_grid_four mb-4">
            <div class="container">
                <div class="clearfix owl-carousel owl-theme" id="b-related_products">
					<?php foreach ( $related_products as $related_product ) : ?>
                        <div>

							<?php
							$post_object = get_post( $related_product->get_id() );

							setup_postdata( $GLOBALS['post'] =& $post_object );

							wc_get_template_part( 'content', 'product' ); ?>
                        </div>

					<?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

<?php endif;

wp_reset_postdata();
