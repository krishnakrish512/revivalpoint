<?php

//remove contact form 7 js and css
add_filter( 'wpcf7_load_js', '__return_false' );
add_filter( 'wpcf7_load_css', '__return_false' );

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
		'unit'     => 'px',
        'orderby'  => 'count',
        'order'    => 'DESC',
        'number'   => 10
	);
	$args    = wp_parse_args( $args, $my_args );
	return $args;
}

add_filter( 'widget_tag_cloud_args', 'ecommerce_widget_tag_cloud_args' );


//function set_widget_tag_cloud_args($args) {
//    $my_args = array(
//        'orderby'  => 'count',
//        'order'    => 'DESC',
//        'number'   => 10
//    );
//    $args = wp_parse_args( $args, $my_args );
//    return $args;
//}
//add_filter('woocommerce_product_tag_cloud_widget_args','set_widget_tag_cloud_args');