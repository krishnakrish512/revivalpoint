<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */
//do_action( 'woocommerce_before_main_content' );
?>
    <div class="container">
        <div class="row clearfix">
            <div class="col-xl-3 col-lg-3 col-mb-4 col-sm-12 col-xs-12">
                <div class="b-sidebar mob-sidebar mt-4">
                    <span class="sidebar-close"><i class="icon icon-close"></i></span>
                    <div class="b-filters_inner_area p-0">
						<?php
						/**
						 * Hook: woocommerce_sidebar.
						 *
						 * @hooked woocommerce_get_sidebar - 10
						 */
						do_action( 'woocommerce_sidebar' );
						?>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-9 col-mb-8 col-sm-12 col-xs-12">
				<?php woocommerce_output_all_notices() ?>
                <div class="row clearfix b-shop_head mt-4">
                    <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-6 col-xs-12">
                        <nav class="b-shop_breadcrumb">
							<?php woocommerce_breadcrumb( [
								'delimiter'   => '',
								'wrap_before' => '<nav class="b-shop_breadcrumb">',
								'wrap_after'  => '</nav>'
							] ); ?>
                        </nav>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-6 col-xs-12 text-right">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="filter-btn"><i class="icon icon-menu"></i>Filter</div>
                            <div class="b-filter_button d-inline-block ml-auto">
								<?php woocommerce_catalog_ordering() ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="b-products b-product_grid b-product_grid_four mb-4">

					<?php
					if ( woocommerce_product_loop() ) {

					/**
					 * Hook: woocommerce_before_shop_loop.
					 *
					 * @hooked woocommerce_output_all_notices - 10
					 * @hooked woocommerce_result_count - 20
					 * @hooked woocommerce_catalog_ordering - 30
					 */
					//					do_action( 'woocommerce_before_shop_loop' );

					woocommerce_product_loop_start();

					if ( wc_get_loop_prop( 'total' ) ) {
						while ( have_posts() ) {
							the_post();

							/**
							 * Hook: woocommerce_shop_loop.
							 */
							do_action( 'woocommerce_shop_loop' );

							wc_get_template_part( 'content', 'product' );
						}
					}

					woocommerce_product_loop_end();

					/**
					 * Hook: woocommerce_after_shop_loop.
					 *
					 * @hooked woocommerce_pagination - 10
					 */
					do_action( 'woocommerce_after_shop_loop' );
					?>
                </div>
            </div>
			<?php
			} else {
				/**
				 * Hook: woocommerce_no_products_found.
				 *
				 * @hooked wc_no_products_found - 10
				 */
				do_action( 'woocommerce_no_products_found' );
			}
			?>
        </div>
    </div>
<?php


/**
 * Hook: woocommerce_after_main_content.
 *
 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
 */
//do_action( 'woocommerce_after_main_content' );


get_footer( 'shop' );
