<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.

	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>
    <div class="b-product_single pb-5">
        <div class="container">
            <div class="row clearfix">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
					<?php
					/**
					 * Hook: woocommerce_before_single_product_summary.
					 *
					 * @hooked woocommerce_show_product_sale_flash - 10
					 * @hooked woocommerce_show_product_images - 20
					 */
					//				do_action( 'woocommerce_before_single_product_summary' );
					woocommerce_show_product_images();
					?>
                </div>
                <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-xs-12">
                    <div class="b-product_single_summary summary entry-summary">
						<?php
						/**
						 * Hook: woocommerce_single_product_summary.
						 *
						 * @hooked woocommerce_template_single_title - 5
						 * @hooked woocommerce_template_single_rating - 10
						 * @hooked woocommerce_template_single_price - 10
						 * @hooked woocommerce_template_single_excerpt - 20
						 * @hooked woocommerce_template_single_add_to_cart - 30
						 * @hooked woocommerce_template_single_meta - 40
						 * @hooked woocommerce_template_single_sharing - 50
						 * @hooked WC_Structured_Data::generate_product_data() - 60
						 */
						do_action( 'woocommerce_single_product_summary' );
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>
<div class="b-product_single pb-5">
    <div class="container">
        <div class="row clearfix">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="row clearfix b-product-display">
                    <div class="col-xl-9 col-lg-9 col-md-9 col-sm-12 b-display-single">
                        <div class="b-product-carousel owl-carousel" id="bSingleProductCarousel"
                             data-slider-id="bSingleProductCarousel">
                            <div class="b-produt-item">
                                <img src="assets/images/products/product-single/product-single.jpg" alt=""
                                     class="img-fluid"
                                     data-zoomed="assets/images/products/product-single/product-single.jpg">
                            </div>
                            <div class="b-produt-item">
                                <img src="assets/images/products/product-single/man-24.jpg" alt="" class="img-fluid"
                                     data-zoomed="assets/images/products/product-single/man-24.jpg">
                            </div>
                            <div class="b-produt-item">
                                <img src="assets/images/products/product-single/man-23.jpg" alt="" class="img-fluid"
                                     data-zoomed="assets/images/products/product-single/man-23.jpg">
                            </div>
                            <div class="b-produt-item">
                                <img src="assets/images/products/product-single/man-1.jpg" alt="" class="img-fluid"
                                     data-zoomed="assets/images/products/product-single/man-1.jpg">
                            </div>
                            <div class="b-produt-item">
                                <img src="assets/images/products/product-single/man-9.jpg" alt="" class="img-fluid"
                                     data-zoomed="assets/images/products/product-single/man-9.jpg">
                            </div>
                        </div>

                        <div class="b-show-product-gallery-wrap">
                            <a href="javaScript:void(0)">
                                <i class="icon-magnifier-add icons"></i>
                            </a>
                        </div> <!-- /b-show-product-gallery-wrap-->
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12">
                        <div class="b-display-list-wrapper">
                            <div class="owl-thumbs b-display-item-list" id="bSingleProduct"
                                 data-slider-id="bSingleProductCarousel">
                                <div class="owl-thumb-item b-display-item">
                                    <img src="assets/images/products/product-single/product-single.jpg" alt=""
                                         class="img-fluid">
                                </div>
                                <div class="owl-thumb-item b-display-item">
                                    <img src="assets/images/products/product-single/man-24.jpg" alt=""
                                         class="img-fluid">
                                </div>
                                <div class="owl-thumb-item b-display-item">
                                    <img src="assets/images/products/product-single/man-23.jpg" alt=""
                                         class="img-fluid">
                                </div>
                                <div class="owl-thumb-item b-display-item">
                                    <img src="assets/images/products/product-single/man-1.jpg" alt=""
                                         class="img-fluid">
                                </div>
                                <div class="owl-thumb-item b-display-item">
                                    <img src="assets/images/products/product-single/man-9.jpg" alt=""
                                         class="img-fluid">
                                </div>
                            </div><!-- /b-display-item-list -->

                            <div class="b-slider-action">
                                <button class="slick-prev"><i class="fa fa-angle-up"></i></button>
                                <button class="slick-next"><i class="fa fa-angle-down"></i></button>
                            </div> <!-- /b-slider-action-->
                        </div><!-- /b-display-item-list-wrapper -->
                    </div>
                </div>

                <div class="b-additional-video-wrap">
                    <a href="https://www.youtube.com/embed/XEfi9EH2K-c" class="b-additional-video-btn"
                       data-rel="lightcase">
                        <span class="b-icon"><i class="icon-control-play icons"></i></span>
                        <span>Watch Video</span>
                    </a>
                </div><!-- /b-additional-video-wrap -->
            </div>
            <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-xs-12">
                <div class="b-product_single_summary">
                    <h1>Jhecked flannel shirt</h1>
                    <p class="b-price">
                      <span class="b-amount">
                      <span class="b-symbol">£</span>79.00</span>
                    </p>
                    <div class="b-produt_description">
                        <p>Adipiscing vehicula amet in natoque lobortis mus velit dis vestibulum ullamcorper
                            senectus conubia suspendisse vestibulum nam condimentum aliquet ipsum justo eu
                            vestibulum sagittis.A vel vehicula a mi varius porta.</p>
                    </div>
                    <div class="b-product_attr">
                        <div class="b-product_attr_single">
                            <ul class="pl-0 list-unstyled clearfix">
                                <li><span class="b-product_attr_title pt-1">Color:</span></li>
                                <li><a href="#"><span data-toggle="tooltip" title="" data-original-title="Black"
                                                      class="b-color_attr b-black"></span></a></li>
                                <li><a href="#"><span data-toggle="tooltip" title="" data-original-title="Red"
                                                      class="b-color_attr b-red"></span></a></li>
                                <li><a href="#"><span data-toggle="tooltip" title="" data-original-title="Yellow"
                                                      class="b-color_attr b-yellow"></span></a></li>
                            </ul>
                        </div>
                        <div class="b-product_attr_single">
                            <ul class="pl-0 list-unstyled clearfix">
                                <li><span class="b-product_attr_title">Size:</span></li>
                                <li><a href="#"><span class="b-size_attr">L</span></a></li>
                                <li><a href="#"><span class="b-size_attr">XL</span></a></li>
                                <li><a href="#"><span class="b-size_attr">XXL</span></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="b-product_single_action clearfix">
                        <div class="b-quantity pull-left">
                            <input type="button" value="-" class="b-minus">
                            <input type="text" step="1" min="1" max="" name="b-quantity" value="1" title="Qty"
                                   class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                            <input type="button" value="+" class="b-plus">
                        </div>
                        <button class="text-uppercase pull-left btn">add to cart</button>
                    </div>
                    <div class="b-product_single_option">
                        <ul class="pl-0 list-unstyled">
                            <li><a href="#"><i class="icon-heart icons"></i> Add to wishlist</a></li>
                            <li><a href="#"><i class="icon-refresh icons"></i> Compare</a></li>
                            <li><b class="text-uppercase">Sku</b>: N/A</li>
                            <li><b>Category</b>: <a href="#">Man</a></li>
                            <li>
                                <b>Share</b>:
                                <span class="b-share_product">
                            <a href="#" class="fa fa-facebook"></a>
                            <a href="#" class="fa fa-twitter"></a>
                            <a href="#" class="fa fa-instagram"></a>
                            <a href="#" class="fa fa-envelope"></a>
                            <a href="#" class="fa fa-google-plus"></a>
                            <a href="#" class="fa fa-pint"></a>
                          </span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="b-gray_bg b-product_tabs">
    <div class="container">
        <div class="row">
            <ul class="nav nav-tabs clearfix" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#tab-01" role="tab" data-toggle="tab">Description</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-02" role="tab" data-toggle="tab">Additional information</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-03" role="tab" data-toggle="tab">Reviews (0)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#tab-04" role="tab" data-toggle="tab">Shipping & Delivery</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active show" id="tab-01">
                    <div class="row clearfix">
                        <div class="col-xl-12 col-lg-12 col-mb-12 col-sm-12 col-xs-12 text-center">
                            <p class="mb-30">Aenean enim nisl volutpat fusce commodo dui hac in a vestibulum diam
                                convallis dis parturient condimentum massa ac sagittis sed dapibus ullamcorper
                                blandit parturient arcu urna cursus suscipit diam rhoncus. Mus pretium etiam a magna
                                malesuada pharetra tempus nam sapien a adipiscing blandit lorem urna maecenas donec
                                porttitor faucibus malesuada ac consequat. Aliquet sit fusce sociosqu suscipit per a
                                nisl sit conubia pulvinar vitae pretium a convallis id a magnis a amet varius ac
                                mauris quam dictumst a. A dolor aliquet ultricies parturient ac a parturient
                                suspendisse sociosqu sodales in.</p>
                            <h5 class="mb-30"><i>A adipiscing sociis ultrices sociosqu curabitur neque tristique
                                    duis cum vitae ut habitant ornare aptent a diam cursus potenti nibh nec
                                    scelerisque. Lectus ridiculus ac quam platea venenatis eleifend ullamcorper
                                    ullamcorper id euismod mus fusce volutpat montes.</i></h5>
                            <p>Vitae vestibulum congue nunc parturient venenatis dictumst hac varius ullamcorper nec
                                nascetur ridiculus aptent scelerisque cum at fringilla dis ut phasellus a cum litora
                                est quis a ornare orci.Dis vivamus tincidunt amet porttitor dis hac consectetur elit
                                ut non a dui facilisis elementum dignissim est porta condimentum ullamcorper donec
                                mauris ridiculus a nam purus dictumst suscipit. Nisl nascetur suspendisse a aliquet
                                fusce quisque litora venenatis.</p>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-02">
                    <table class="b-shop_attributes">
                        <tbody>
                        <tr>
                            <th>Color</th>
                            <td><p>Black, Brown, Blue</p></td>
                        </tr>
                        <tr>
                            <th>Size</th>
                            <td><p>L, M, XS</p></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-03">
                    <div class="row clearfix">
                        <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-xs-12">
                            <div class="b-review_listing_wrapper">
                                <h5 class="pb-2"><b>Reviews</b></h5>
                                <div class="b-review_listing">
                                    <div class="b-review_single">
                                        <img src="assets/images/products/product-single/user.png" class="img-fluid"
                                             alt="">
                                        <div class="b-review_header clearfix">
                                            <p class="float-left">
                                                <em>Your review is awaiting approval</em>
                                            </p>
                                            <p class="float-right">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="icon-star icons"></i>
                                                <i class="icon-star icons"></i>
                                                <i class="icon-star icons"></i>
                                            </p>
                                        </div>
                                        <div class="b-review_content">
                                            <p>Dis vestibulum ullamcorper senectus conubia suspendisse vestibulum
                                                nam condimentum aliquet ipsum justo. </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-12 col-xs-12">
                            <div class="b-review_form_wrapper">
                                <h5 class="pb-2"><b>Add a review</b></h5>
                                <p class="b-comment_notes pb-2">
                                    <span id="b-email_notes">Your email address will not be published.</span>
                                    Required fields are marked
                                    <span class="b-required">*</span>
                                </p>
                                <p class="b-rating_area">
                                    <span class="d-inline-block pr-3">Your Rating:</span>
                                    <a href="#" class="d-inline-block mr-3">
                                        <i class="icon-star icons"></i>
                                    </a>
                                    <a href="#" class="d-inline-block b-active mr-3">
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                    </a>
                                    <a href="#" class="d-inline-block mr-3">
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                    </a>
                                    <a href="#" class="d-inline-block mr-3">
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                    </a>
                                    <a href="#" class="d-inline-block mr-3">
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                        <i class="icon-star icons"></i>
                                    </a>
                                </p>
                                <p class="b-comment_form_comment">
                                    <label for="comment">Your review <span class="b-required">*</span></label>
                                    <textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"
                                              required=""></textarea>
                                </p>
                                <p class="b-comment_form_author">
                                    <label for="author">Name <span class="b-required">*</span></label>
                                    <input id="author" name="author" type="text" value="" size="30"
                                           aria-required="true" required="">
                                </p>
                                <p class="b-comment_form_email clearfix">
                                    <label for="email">Email <span class="b-required">*</span></label>
                                    <input id="email" name="email" type="email" value="" size="30"
                                           aria-required="true" required="">
                                </p>
                                <p>
                                    <button class="btn" type="submit">submit</button>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab-04">
                    <div>
                        <img src="assets/images/products/product-single/shipping.jpg" class="alignleft">
                        <p>Vestibulum curae torquent diam diam commodo parturient penatibus nunc dui adipiscing
                            convallis bulum parturient suspendisse parturient a.Parturient in parturient scelerisque
                            nibh lectus quam a natoque adipiscing a vestibulum hendrerit et pharetra fames.Consequat
                            net</p>

                        <p>Vestibulum parturient suspendisse parturient a.Parturient in parturient scelerisque nibh
                            lectus quam a natoque adipiscing a vestibulum hendrerit et pharetra fames.Consequat
                            netus.</p>

                        <p>Scelerisque adipiscing bibendum sem vestibulum et in a a a purus lectus faucibus lobortis
                            tincidunt purus lectus nisl class eros.Condimentum a et ullamcorper dictumst mus et
                            tristique elementum nam inceptos hac vestibulum amet elit</p>

                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="b-products">
    <div class="b-section_title">
        <h4 class="text-center text-uppercase">
            RELATED PRODUCTS
            <span class="b-title_separator"><span></span></span>
        </h4>
    </div>
    <div class="b-products b-product_grid b-product_grid_four mb-4">
        <div class="container">
            <div class="clearfix owl-carousel owl-theme" id="b-related_products">
                <div>
                    <div class="b-product_grid_single">
                        <div class="b-product_grid_header">
                            <a href="#">
                                <img src="assets/images/products/home-lingerie/product-01.jpg"
                                     class="img-fluid  d-block m-auto" alt="" style="">
                            </a>
                            <div class="b-product_grid_action">
                                <a href="javascript:void(0)" data-whishurl="whishlist.html" data-toggle="tooltip"
                                   data-placement="left" title="" data-original-title="Add to Whishlist">
                                    <i class="icon-heart icons b-add_to_whish">
                                        <img src="assets/images/products/product_loading.gif" class="g-loading_gif"
                                             alt="">
                                    </i>
                                </a>
                                <i data-toggle="tooltip" data-placement="left" title="" class="icon-refresh icons"
                                   data-original-title="Compare"></i>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view">
                                    <i data-toggle="tooltip" data-placement="left" title=""
                                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                                </a>
                            </div>
                        </div>
                        <div class="b-product_grid_info">
                            <h3 class="product-title">
                                <a href="#">Houble strap backpack</a>
                            </h3>
                            <div class="clearfix">
                                <div class="b-product_grid_toggle float-left">
                                    <span class="b-price">$120</span>
                                    <span class="b-add_cart">
                                              <i class="icon-basket icons"></i>
                                              <a href="#">Select Options</a>
                                          </span>
                                </div>
                                <div class="b-product_options float-right">
                                    <ul class="pl-0 mb-0 list-unstyled">
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-black"
                                                      data-original-title="Black"></span>
                                        </li>
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-blue"
                                                      data-original-title="Blue"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="b-product_grid_single">
                        <div class="b-product_grid_header">
                            <a href="#">
                                <img src="assets/images/products/home-lingerie/product-02.jpg"
                                     class="img-fluid  d-block m-auto" alt="" style="">
                            </a>
                            <div class="b-product_grid_action">
                                <a href="javascript:void(0)" data-whishurl="whishlist.html" data-toggle="tooltip"
                                   data-placement="left" title="" data-original-title="Add to Whishlist">
                                    <i class="icon-heart icons b-add_to_whish">
                                        <img src="assets/images/products/product_loading.gif" class="g-loading_gif"
                                             alt="">
                                    </i>
                                </a>
                                <i data-toggle="tooltip" data-placement="left" title="" class="icon-refresh icons"
                                   data-original-title="Compare"></i>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view">
                                    <i data-toggle="tooltip" data-placement="left" title=""
                                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                                </a>
                            </div>
                            <div class="b-product_labels b-labels_rounded b-new">
                                <span class="b-product_label">New</span>
                            </div>
                        </div>
                        <div class="b-product_grid_info">
                            <h3 class="product-title">
                                <a href="#">Basic contrast sneakers</a>
                            </h3>
                            <div class="clearfix">
                                <div class="b-product_grid_toggle float-left">
                                    <span class="b-price">$20</span>
                                    <span class="b-add_cart">
                                              <i class="icon-basket icons"></i>
                                              <a href="#">Select Options</a>
                                          </span>
                                </div>
                                <div class="b-product_options float-right">
                                    <ul class="pl-0 mb-0 list-unstyled">
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-black"
                                                      data-original-title="Black"></span>
                                        </li>
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-brown"
                                                      data-original-title="Brown"></span>
                                        </li>
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-red"
                                                      data-original-title="Red"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="b-product_grid_single">
                        <div class="b-product_grid_header">
                            <a href="#">
                                <img src="assets/images/products/home-lingerie/product-03.jpg"
                                     class="img-fluid  d-block m-auto" alt="" style="">
                            </a>
                            <div class="b-product_grid_action">
                                <a href="javascript:void(0)" data-whishurl="whishlist.html" data-toggle="tooltip"
                                   data-placement="left" title="" data-original-title="Add to Whishlist">
                                    <i class="icon-heart icons b-add_to_whish">
                                        <img src="assets/images/products/product_loading.gif" class="g-loading_gif"
                                             alt="">
                                    </i>
                                </a>
                                <i data-toggle="tooltip" data-placement="left" title="" class="icon-refresh icons"
                                   data-original-title="Compare"></i>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view">
                                    <i data-toggle="tooltip" data-placement="left" title=""
                                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                                </a>
                            </div>
                        </div>
                        <div class="b-product_grid_info">
                            <h3 class="product-title">
                                <a href="#">Basic Korean-style coat</a>
                            </h3>
                            <div class="clearfix">
                                <div class="b-product_grid_toggle float-left">
                                    <span class="b-price">$214</span>
                                    <span class="b-add_cart">
                                              <i class="icon-basket icons"></i>
                                              <a href="#">Add to cart</a>
                                          </span>
                                </div>
                                <div class="b-product_options float-right">
                                    <ul class="pl-0 mb-0 list-unstyled">
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-brown"
                                                      data-original-title="Brown"></span>
                                        </li>
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-blue"
                                                      data-original-title="Blue"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="b-product_grid_single">
                        <div class="b-product_grid_header">
                            <a href="#">
                                <img src="assets/images/products/home-lingerie/product-04.jpg"
                                     class="img-fluid  d-block m-auto" alt="" style="">
                            </a>
                            <div class="b-product_grid_action">
                                <a href="javascript:void(0)" data-whishurl="whishlist.html" data-toggle="tooltip"
                                   data-placement="left" title="" data-original-title="Add to Whishlist">
                                    <i class="icon-heart icons b-add_to_whish">
                                        <img src="assets/images/products/product_loading.gif" class="g-loading_gif"
                                             alt="">
                                    </i>
                                </a>
                                <i data-toggle="tooltip" data-placement="left" title="" class="icon-refresh icons"
                                   data-original-title="Compare"></i>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view">
                                    <i data-toggle="tooltip" data-placement="left" title=""
                                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                                </a>
                            </div>
                        </div>
                        <div class="b-product_grid_info">
                            <h3 class="product-title">
                                <a href="#">Before decaf phone case</a>
                            </h3>
                            <div class="clearfix">
                                <div class="b-product_grid_toggle float-left">
                                    <span class="b-price">$49</span>
                                    <span class="b-add_cart">
                                              <i class="icon-basket icons"></i>
                                              <a href="#">Add to cart</a>
                                          </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="b-product_grid_single">
                        <div class="b-product_grid_header">
                            <a href="#">
                                <img src="assets/images/products/home-lingerie/product-05.jpg"
                                     class="img-fluid  d-block m-auto" alt="" style="">
                            </a>
                            <div class="b-product_grid_action">
                                <a href="javascript:void(0)" data-whishurl="whishlist.html" data-toggle="tooltip"
                                   data-placement="left" title="" data-original-title="Add to Whishlist">
                                    <i class="icon-heart icons b-add_to_whish">
                                        <img src="assets/images/products/product_loading.gif" class="g-loading_gif"
                                             alt="">
                                    </i>
                                </a>
                                <i data-toggle="tooltip" data-placement="left" title="" class="icon-refresh icons"
                                   data-original-title="Compare"></i>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view">
                                    <i data-toggle="tooltip" data-placement="left" title=""
                                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                                </a>
                            </div>
                            <div class="b-product_labels b-labels_rounded b-new">
                                <span class="b-product_label">New</span>
                            </div>
                        </div>
                        <div class="b-product_grid_info">
                            <h3 class="product-title">
                                <a href="#">Basic contrast sneakers</a>
                            </h3>
                            <div class="clearfix">
                                <div class="b-product_grid_toggle float-left">
                                    <span class="b-price">$20</span>
                                    <span class="b-add_cart">
                                              <i class="icon-basket icons"></i>
                                              <a href="#">Select Options</a>
                                          </span>
                                </div>
                                <div class="b-product_options float-right">
                                    <ul class="pl-0 mb-0 list-unstyled">
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-black"
                                                      data-original-title="Black"></span>
                                        </li>
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-brown"
                                                      data-original-title="Brown"></span>
                                        </li>
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-red"
                                                      data-original-title="Red"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="b-product_grid_single">
                        <div class="b-product_grid_header">
                            <a href="#">
                                <img src="assets/images/products/home-lingerie/product-06.jpg"
                                     class="img-fluid  d-block m-auto" alt="" style="">
                            </a>
                            <div class="b-product_grid_action">
                                <a href="javascript:void(0)" data-whishurl="whishlist.html" data-toggle="tooltip"
                                   data-placement="left" title="" data-original-title="Add to Whishlist">
                                    <i class="icon-heart icons b-add_to_whish">
                                        <img src="assets/images/products/product_loading.gif" class="g-loading_gif"
                                             alt="">
                                    </i>
                                </a>
                                <i data-toggle="tooltip" data-placement="left" title="" class="icon-refresh icons"
                                   data-original-title="Compare"></i>
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view">
                                    <i data-toggle="tooltip" data-placement="left" title=""
                                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                                </a>
                            </div>
                        </div>
                        <div class="b-product_grid_info">
                            <h3 class="product-title">
                                <a href="#">Basic Korean-style coat</a>
                            </h3>
                            <div class="clearfix">
                                <div class="b-product_grid_toggle float-left">
                                    <span class="b-price">$214</span>
                                    <span class="b-add_cart">
                                              <i class="icon-basket icons"></i>
                                              <a href="#">Add to cart</a>
                                          </span>
                                </div>
                                <div class="b-product_options float-right">
                                    <ul class="pl-0 mb-0 list-unstyled">
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-brown"
                                                      data-original-title="Brown"></span>
                                        </li>
                                        <li>
                                                <span data-toggle="tooltip" title="" class="b-blue"
                                                      data-original-title="Blue"></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php do_action( 'woocommerce_after_single_product' ); ?>
