<?php

// Remove meta hook Woocommerce
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// Remove product sharing hook Woocommerce
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_images', 20 );
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

/**
 * Change number of related products output
 */
add_filter( 'woocommerce_output_related_products_args', 'ecommerce_related_products_args', 20 );
function ecommerce_related_products_args( $args ) {

	$args['posts_per_page'] = 6; // 4 related products
	$args['columns']        = 6; // arranged in 2 columns

	return $args;
}