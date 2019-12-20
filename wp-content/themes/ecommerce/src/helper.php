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