<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>


<?php
/**
 * woocommerce_before_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 */
//		do_action( 'woocommerce_before_main_content' );
?>
    <div class="b-product_single_breadcrumbs pt-3 pb-3">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xl-8 col-lg-8 col-mb-8 col-sm-12 col-xs-12">
                    <div class="b-breadcrumbs">
						<?php woocommerce_breadcrumb(); ?>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-mb-4 col-sm-12 col-xs-12">
                    <ul class="list-unstyled pl-0 float-right mb-0">
                        <li class="d-inline-block mr-2"><i class="fa fa-long-arrow-left"></i></li>
                        <li class="d-inline-block"><i class="fa fa-long-arrow-right"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php while ( have_posts() ) : the_post(); ?>

	<?php wc_get_template_part( 'content', 'single-product' ); ?>

<?php endwhile; // end of the loop. ?>

<?php
/**
 * woocommerce_after_main_content hook.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
do_action( 'woocommerce_after_main_content' );
?>

<?php
/**
 * woocommerce_sidebar hook.
 *
 * @hooked woocommerce_get_sidebar - 10
 */
//do_action( 'woocommerce_sidebar' );
?>

<?php get_footer( 'shop' );

/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
