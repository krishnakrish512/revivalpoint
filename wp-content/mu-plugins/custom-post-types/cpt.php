<?php

/**
 * @param $name
 * @param array $args
 * https://developer.wordpress.org/resource/dashicons/#schedule
 */
function add_post_type( $name, $args = array() ) {
	add_action( 'init', function () use ( $name, $args ) {
		$upper = ucwords( $name );
		$name  = strtolower( str_replace( ' ', '_', $name ) );

		$args = array_merge(
			[
				'public'      => true,
				'label'       => $upper . "s",
				'labels'      => array( 'add_new_item' => "Add new $upper" ),
				'supports'    => array( 'title', 'editor', 'comments', 'thumbnail' ),
				'has_archive' => true
			],
			$args );

		register_post_type( $name, $args );
	} );
}

function add_taxonomy( $name, $post_type, $args = array() ) {
	$name = strtolower( $name );
	add_action( 'init', function () use ( $name, $post_type, $args ) {
		$args = array_merge(
			[
				'label' => ucwords( $name )
			],
			$args );

		register_taxonomy( $name, $post_type, $args );
	} );
}

add_post_type( 'testimonial', [
	'public'      => true,
	'menu_icon'   => 'dashicons-calendar',
	'labels'      => [ 'add_new_item' => "Add new testimonial" ],
	'supports'    => [ 'title', 'editor', 'thumbnail' ],
	'has_archive' => true
] );