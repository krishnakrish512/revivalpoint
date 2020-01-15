<?php

use function NextGenImage\getImageInWebp;
use function NextGenImage\resizeImage;

/**
 * Function to get resized image in webp and original format
 *
 * @param $url string
 * @param array $size =[with x height]
 *
 * @return array
 */
function getResizedImage( $url, $size = array() ) {
	$webpImage = getImageInWebp( ABSPATH . str_replace( site_url(), "", $url ), $size );
	$fileType  = wp_check_filetype( $url );
	$image     = resizeImage( ABSPATH . str_replace( site_url(), "", $url ), $fileType['ext'], $size );

	return array(
		'webp' => $webpImage,
		'orig' => $image
	);
}

/**
 * function to add meta tags to event single page.
 * these meta tags are required for proper functioning of facebook share feature
 */
function ecommerce_share_meta() {
	global $post;

	if ( $post ) {
		if ( $post->post_type == "product" && is_single() ) {
			$product = wc_get_product( $post->ID );
			?>
            <meta property="og:url" content="<?= $product->get_permalink() ?>"/>
            <meta property="og:type" content="website"/>
            <meta property="og:title" content="<?php bloginfo( 'title' ); ?>"/>
            <meta property="og:description" content="<?= $product->get_title() ?>"/>
            <meta property="og:image" content="<?= wp_get_attachment_image_url( $product->get_image_id(), 'full' ) ?>"/>
			<?php
		}
	}
}

add_action( 'wp_head', 'ecommerce_share_meta' );


/**
 * function to get url of wishlist page
 *
 * @return false|string
 */
function ecommerce_get_wishlist_page_url() {
	$wishlist_page = get_page_by_title( 'Wishlist' );

	return get_the_permalink( $wishlist_page->ID );

}

/**
 * function to get display name of logged in user
 *
 * @return string
 */
function ecommerce_get_user_display_name() {
	$username = "Beautiful";
	if ( is_user_logged_in() ) {
		$user     = wp_get_current_user();
		$username = $user->display_name;
	}

	return $username;
}
