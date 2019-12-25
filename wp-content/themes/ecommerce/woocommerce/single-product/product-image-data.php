<?php
/**
 * Single Product Image
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/product-image.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.1
 */

defined( 'ABSPATH' ) || exit;

// Note: `wc_get_gallery_image_html` was added in WC 3.3.2 and did not exist prior. This check protects against theme overrides being used on older versions of WC.
if ( ! function_exists( 'wc_get_gallery_image_html' ) ) {
	return;
}

global $product;

$columns           = apply_filters( 'woocommerce_product_thumbnails_columns', 4 );
$post_thumbnail_id = $product->get_image_id();
$wrapper_classes   = apply_filters( 'woocommerce_single_product_image_gallery_classes', array(
	'woocommerce-product-gallery',
	'woocommerce-product-gallery--' . ( $product->get_image_id() ? 'with-images' : 'without-images' ),
	'woocommerce-product-gallery--columns-' . absint( $columns ),
	'images',
) );

$image_ids = $product->get_gallery_image_ids();

if ( empty( $image_ids ) ) {
	$image_ids = [ $product->get_image_id() ];

} else {
	array_unshift( $image_ids, $product->get_image_id() );
}
?>
<div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 b-display-single">
    <div class="b-product-carousel owl-carousel" id="bSingleProductCarousel" data-slider-id="bSingleProductCarousel">
		<?php
		foreach ( $image_ids as $image_id ):
			$image = wp_get_attachment_image_url( $image_id, 'full' );
			$image = getResizedImage( $image, [ 475, 600 ] );
			?>
            <div class="b-produt-item">
                <img src="<?= $image['orig'] ?>" alt="" class="img-fluid"
                     data-zoomed="<?= $image['orig'] ?>">
            </div>
		<?php
		endforeach;
		?>
    </div>
    <div class="b-show-product-gallery-wrap">
        <a href="javaScript:void(0)" data-toggle="modal" data-target="#b-qucik_view"
           data-product-id="<?= $product->get_id() ?>" class="quick-view">
            <i class="icon-magnifier-add icons"></i>
        </a>
    </div> <!-- /b-show-product-gallery-wrap-->
</div>
<div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
    <div class="b-display-list-wrapper">
        <div class="owl-thumbs b-display-item-list" id="bSingleProduct" data-slider-id="bSingleProductCarousel">
			<?php
			foreach ( $image_ids as $image_id ):
				$image = wp_get_attachment_image_url( $image_id, 'full' );
				$image = getResizedImage( $image, [ 475, 600 ] );
				?>
                <div class="owl-thumb-item b-display-item">
                    <img src="<?= $image['orig'] ?>" alt="" class="img-fluid">
                </div>
			<?php
			endforeach;
			?>
        </div><!-- /b-display-item-list -->
        <div class="b-slider-action">
            <button class="slick-prev"><i class="fa fa-angle-up"></i></button>
            <button class="slick-next"><i class="fa fa-angle-down"></i></button>
        </div> <!-- /b-slider-action-->
    </div><!-- /b-display-item-list-wrapper -->
</div>
