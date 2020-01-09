<?php

// Remove meta hook Woocommerce
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
// Remove product sharing hook Woocommerce
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50 );
//remove_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_images', 20 );
//remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );

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