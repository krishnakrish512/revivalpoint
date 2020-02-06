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
 * for product sharing in product quick view
 */
function ecommerce_product_sharing( $product_id ) {
	$product = wc_get_product( $product_id );

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
 * update wordpress tag cloud args
 *
 * @param $args
 *
 * @return array
 */
function ecommerce_widget_tag_cloud_args( $args ) {

	$my_args = array(
		'smallest' => '14',
		'unit'     => 'px'
	);
	$args    = wp_parse_args( $args, $my_args );

	return $args;
}

add_filter( 'widget_tag_cloud_args', 'ecommerce_widget_tag_cloud_args' );


/**
 * adding additional delivery info tab to the product single page tabsg
 */
add_filter( 'woocommerce_product_tabs', 'woo_custom_product_tabs' );
function woo_custom_product_tabs( $tabs ) {
	$tabs['additional_tab'] = [
		'title'    => get_field( 'delivery_info', 'option' )['title'],
		'priority' => 100,
		'callback' => 'woo_attrib_additional_tab_content'
	];

	return $tabs;

}

function woo_attrib_additional_tab_content() {
	echo get_field( 'delivery_info', 'option' )['detail'];
}