<?php

function ecommerce_setup() {
	add_theme_support( 'custom-logo' );
	add_theme_support( 'menus' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'woocommerce' );

	register_nav_menu( 'primary', 'Primary' );


//	add_theme_support( 'wc-product-gallery-zoom' );
//	add_theme_support( 'wc-product-gallery-lightbox' );
//	add_theme_support( 'wc-product-gallery-slider' );
}

add_action( 'after_setup_theme', 'ecommerce_setup' );

function ecommerce_scripts() {
	wp_enqueue_style( 'owl-carousel-style', get_template_directory_uri() . '/assets/css/plugins/owl/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-carousel-theme-style', get_template_directory_uri() . '/assets/css/plugins/owl/owl.theme.default.min.css' );
	wp_enqueue_style( 'nice-select-style', get_template_directory_uri() . '/assets/css/plugins/nice-select/nice-select.css' );


	wp_deregister_script( 'jquery' );
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/assets/js/jquery.min.js', [], '1.0', false );
	wp_enqueue_script( 'modernizr-script', get_template_directory_uri() . '/assets/js/modernizr-custom.js', [], '1.0', true );
	wp_enqueue_script( 'tether-script', get_template_directory_uri() . '/assets/js/tether.min.js', [], '1.0', true );
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/assets/js/bootstrap.min.js', [], '1.0', true );
	wp_enqueue_script( 'owl-carousel-script', get_template_directory_uri() . '/assets/js/plugins/owl/owl.carousel.min.js', [], '1.0', true );


	if ( is_product() ) {
		wp_enqueue_style( 'zoomit-style', get_template_directory_uri() . '/assets/css/plugins/zoomit/zoomit.css' );

		wp_enqueue_script( 'owl-carousel-thumbs-script', get_template_directory_uri() . '/assets/js/plugins/owl/owl.carousel2.thumbs.js', [], '1.0', true );
		wp_enqueue_script( 'jquery-zoomit-script', get_template_directory_uri() . '/assets/js/plugins/zoomit/jquery.zoomit.min.js', [], '1.0', true );
	}

	if ( is_front_page() || is_woocommerce() ) {
		wp_enqueue_style( 'slick-style', get_template_directory_uri() . '/assets/css/plugins/slick/slick.css' );

		wp_enqueue_script( 'slick-script', get_template_directory_uri() . '/assets/js/plugins/slick/slick.js', [], '1.0', true );
		wp_enqueue_script( 'nice-select-script', get_template_directory_uri() . '/assets/js/plugins/nice-select/jquery.nice-select.min.js', [], '1.0', true );
		wp_enqueue_script( 'woocommerce-custom-script', get_template_directory_uri() . '/assets/js/woocommerce-custom.js', [], '1.0', true );
	}

	//enqueue contact form 7 js and css
	if ( is_page( 'Contact Us' ) ) {
		if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
			wpcf7_enqueue_scripts();
		}

		if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
			wpcf7_enqueue_styles();
		}
	}

	wp_enqueue_style( 'ecommerce-style', get_template_directory_uri() . '/assets/css/main.css' );
	wp_enqueue_script( 'ecommerce-script', get_template_directory_uri() . '/assets/js/custom.js', [], '1.0', true );

	wp_localize_script( 'woocommerce-custom-script', 'es',
		[
			'ajax_url' => admin_url( 'admin-ajax.php' )
		] );
}

add_action( 'wp_enqueue_scripts', 'ecommerce_scripts' );

function ecommerce_widgets_init() {
	register_sidebar( [
		'name'          => 'shop',
		'id'            => 'shop',
		'description'   => 'Widgets in this area will be shown on shop.',
		'before_widget' => '<div id="%1$s" class="widget %2$s b-sidebar_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="b-filter_title">',
		'after_title'   => '</h5>'
	] );

}

add_action( 'widgets_init', 'ecommerce_widgets_init' );

/**
 * Create Logo Setting and Upload Control
 */
function ecommmerce_new_customizer_settings( $wp_customize ) {
// add a setting for the site logo
	$wp_customize->add_setting( 'footer_logo' );
// Add a control to upload the logo
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'footer_logo',
		[
			'label'    => 'Footer Logo',
			'section'  => 'title_tagline',
			'settings' => 'footer_logo',
		] ) );
}

add_action( 'customize_register', 'ecommmerce_new_customizer_settings' );
