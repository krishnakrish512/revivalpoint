<?php

// Remove meta hook Woocommerce
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );

// Remove product sharing hook Woocommerce
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );

remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

remove_action( 'woocommerce_checkout_order_review', 'woocommerce_checkout_payment', 20 );

/**
 * Change number of related products output
 */
add_filter( 'woocommerce_output_related_products_args', 'ecommerce_related_products_args', 20 );
function ecommerce_related_products_args( $args ) {

	$args['posts_per_page'] = 6; // 4 related products
	$args['columns']        = 6; // arranged in 2 columns

	return $args;
}


/**
 * integrate product sharing in product single page
 */
add_action( 'woocommerce_share', 'ecommerce_single_product_sharing' );
function ecommerce_single_product_sharing() {
	global $product;

	$facebook_url = "https://www.facebook.com/sharer.php?u=" . $product->get_permalink();
	$twitter_url  = add_query_arg(
		[
			'text'     => urlencode( $product->get_title() ),
			'url'      => $product->get_permalink(),
			'hashtags' => 'revivalpoint'
		],
		"https://www.twitter.com/intent/tweet?"
	);

	$mail_body = $product->get_short_description() . " For details, link here : " . $product->get_permalink();

	$gmail_url = add_query_arg(
		[
			'view' => 'cm',
			'fs'   => 1,
			'to'   => '',
			'su'   => urlencode( $product->get_title() ),
			'body' => urlencode( $mail_body ),
			'bcc'  => ''
		],
		"https://mail.google.com/mail/"
	);
	?>
    <b>Share</b>:
    <span class="b-share_product">
                            <a href="<?= $facebook_url ?>" target="_blank" rel="noreferrer noopener"
                               class="fa fa-facebook"></a>
                            <a href="<?= $twitter_url ?>" target="_blank" rel="noreferrer noopener"
                               class="fa fa-twitter"></a>
                            <a href="<?= $gmail_url ?>" target="_blank" rel="noreferrer noopener"
                               class="fa fa-envelope"></a>
                          </span>
	<?php
}

/**
 * adding additional delivery info tab to the product single page tabsg
 */
add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tabs' );
function woo_custom_product_tabs( $tabs ) {
	if ( get_field( 'delivery_info', 'option' )['detail'] ) {
		$tabs['additional_tab'] = [
			'title'    => get_field( 'delivery_info', 'option' )['title'],
			'priority' => 100,
			'callback' => 'woo_attrib_additional_tab_content'
		];
	}

	return $tabs;
}

function woo_attrib_additional_tab_content() {
	echo get_field( 'delivery_info', 'option' )['detail'];
}

/**
 * customize woocommerce checkout fields
 *
 * @param $fields
 *
 * @return mixed
 */
function ecommerce_custom_checkout_fields( $fields ) {
	unset( $fields['order']['order_comments'] );

	$fields['billing']['delivery_date'] = [
		'label'    => 'Preferred Delivery Date',
		'required' => false,
		'type'     => 'date',
		'class'    => [ 'form-row-first' ],
		'priority' => 120
	];

	return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'ecommerce_custom_checkout_fields' );

/**
 * update default woocommerce address fields
 *
 * @param $fields
 *
 * @return mixed
 */
function ecommerce_default_address_fields( $fields ) {

	unset( $fields['last_name'] );
	unset( $fields['address_2'] );
	unset( $fields['company'] );
	unset( $fields['country'] );
	unset( $fields['address_2'] );
	unset( $fields['city'] );
	unset( $fields['state'] );
	unset( $fields['postcode'] );

	$fields['first_name']['label'] = 'Full Name';
	$fields['first_name']['class'] = [ 'form-row-wide' ];

	$fields['address_1']['label']       = 'Address';
	$fields['address_1']['placeholder'] = 'Address';
	$fields['address_1']['type']        = 'textarea';
	$fields['address_1']['required']    = false;

	return $fields;
}

add_filter( 'woocommerce_default_address_fields', 'ecommerce_default_address_fields', 20, 1 );

//remove additional information field from checkout page
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

//Remove "(optional)" from our non required fields
add_filter( 'woocommerce_form_field', 'remove_checkout_optional_fields_label', 10, 4 );
function remove_checkout_optional_fields_label( $field, $key, $args, $value ) {
	// Only on checkout page
	if ( is_checkout() && ! is_wc_endpoint_url() ) {
		$optional = '&nbsp;<span class="optional">(' . 'optional' . ')</span>';
		$field    = str_replace( $optional, '', $field );
	}

	return $field;
}
