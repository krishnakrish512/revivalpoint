<?php

$include_files = [
	"src/setup.php",
	"src/filter.php",
	"src/helper.php",
	"src/ajax_product.php",
	"src/acf_hooks.php",
	"src/product.php",
    "src/woocommerce_filter.php",
	"src/woocommerce_hooks.php",
	"src/woocommerce_custom_checkout.php",
	"src/classes/Ecommerce_Nav_Walker.php",
	"src/classes/Ecommerce_Responsive_Nav_Walker.php"
];

array_walk( $include_files, function ( $file ) {
	if ( ! locate_template( $file, true, true ) ) {
		trigger_error( sprintf( 'Could not find %s', $file ), E_USER_ERROR );
	}
} );

unset( $include_files );