<?php
function ecommerce_add_cart_ajax_callback() {
	$quantity = ( $_POST['quantity'] ) ? $_POST['quantity'] : 1;
	if ( is_array( $quantity ) ) {
		foreach ( $quantity as $item ) {
			WC()->cart->add_to_cart( $item['id'], $item['quantity'] );
		}

		woocommerce_mini_cart();

		die();
	}

	$product_id   = $_POST['product_id'];
	$variation    = ( $_POST['variation'] ) ? json_decode( stripslashes( $_POST['variation'] ), true ) : [];
	$variation_id = ( $_POST['variation_id'] ) ? $_POST['variation_id'] : null;


	if ( ! isset( $_POST['variation_id'] ) && isset( $_POST['variation'] ) ) {
		$product_data_store = new WC_Product_Data_Store_CPT();
		$product            = new WC_Product( $product_id );
		$variation_id       = $product_data_store->find_matching_product_variation( $product, $variation );
	}

	WC()->cart->add_to_cart( $product_id, $quantity, $variation_id, $variation );

	woocommerce_mini_cart();

	die();
}

add_action( 'wp_ajax_nopriv_ecommerce_add_cart_ajax', 'ecommerce_add_cart_ajax_callback' );
add_action( 'wp_ajax_ecommerce_add_cart_ajax', 'ecommerce_add_cart_ajax_callback' );

function ecommerce_cart_meta_ajax_callback() {
	?>
    <i class="icon-basket icons"></i>
    <span class="b-cart_totals hidden-sm-down hidden-md-down">
        <span class="b-cart_number"><?= WC()->cart->get_cart_contents_count() ?></span>
        <span class="b-subtotal_divider">/</span>
        <span class="b-cart_subtotal">
            <span class="b-cart_amount amount"><?= WC()->cart->get_cart_subtotal() ?></span>
        </span>
    </span>
	<?php

	die();
}

add_action( 'wp_ajax_nopriv_ecommerce_cart_meta_ajax', 'ecommerce_cart_meta_ajax_callback' );
add_action( 'wp_ajax_ecommerce_cart_meta_ajax', 'ecommerce_cart_meta_ajax_callback' );

function ecommerce_quick_view_ajax_callback() {
	$product_id = $_POST['product_id'];

	get_product_quick_view_html( $product_id );

	die();
}

add_action( 'wp_ajax_nopriv_ecommerce_quick_view_ajax', 'ecommerce_quick_view_ajax_callback' );
add_action( 'wp_ajax_ecommerce_quick_view_ajax', 'ecommerce_quick_view_ajax_callback' );

function ecommerce_get_available_variations_ajax_callback() {
	$product_id = $_POST['product_id'];

	$variable_product     = new WC_Product_Variable( $product_id );
	$available_variations = $variable_product->get_available_variations();

	$variations = [];

	foreach ( $available_variations as $available_variation ):
		$variations[] = $available_variation['attributes'];
	endforeach;

	wp_send_json( $variations );

	die();
}

add_action( 'wp_ajax_nopriv_ecommerce_get_available_variations_ajax', 'ecommerce_get_available_variations_ajax_callback' );
add_action( 'wp_ajax_ecommerce_get_available_variations_ajax', 'ecommerce_get_available_variations_ajax_callback' );

function ecommerce_get_variation_html_ajax_callback() {
	$product_id = $_POST['product_id'];

	$variation          = ( $_POST['variation'] ) ? json_decode( stripslashes( $_POST['variation'] ), true ) : [];
	$product_data_store = new WC_Product_Data_Store_CPT();
	$product            = new WC_Product( $product_id );
	$variation_id       = $product_data_store->find_matching_product_variation( $product, $variation );

	get_product_quick_view_html( $variation_id, $variation );

	die();
}

add_action( 'wp_ajax_nopriv_ecommerce_get_variation_html_ajax', 'ecommerce_get_variation_html_ajax_callback' );
add_action( 'wp_ajax_ecommerce_get_variation_html_ajax', 'ecommerce_get_variation_html_ajax_callback' );

function ecommerce_get_variation_image_ajax_callback() {
	$variation_id = $_POST['variation_id'];

	$product = wc_get_product( $variation_id );

	$variation_meta = [
		'image_id'     => $product->get_image_id(),
		'sku'          => $product->get_sku(),
		'min_purchase' => $product->get_min_purchase_quantity(),
		'max_purchase' => ( $product->get_max_purchase_quantity() != - 1 ) ? $product->get_max_purchase_quantity() : ''
	];

	wp_send_json( $variation_meta );

	die();
}

add_action( 'wp_ajax_nopriv_ecommerce_get_variation_image_ajax', 'ecommerce_get_variation_image_ajax_callback' );
add_action( 'wp_ajax_ecommerce_get_variation_image_ajax', 'ecommerce_get_variation_image_ajax_callback' );

