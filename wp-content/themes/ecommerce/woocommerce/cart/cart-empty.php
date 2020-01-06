<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.5.0
 */

defined( 'ABSPATH' ) || exit;

?>
<section id="b-cart_default">
    <div class="b-cart b-cart_empty">
        <div class="text-center">
            <i class="icon-basket icons"></i>
            <h2><b>YOUR CART IS CURRENTLY EMPTY.</b></h2>
            <p>
                Before proceed to checkout you must add some products to your shopping cart.
                <br>You will find a lot of interesting products on our "Shop" page.
            </p>
			<?php
			if ( wc_get_page_id( 'shop' ) > 0 ) : ?>
                <p class="return-to-shop">
                    <a class="btn"
                       href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
						<?php esc_html_e( 'Return to shop', 'woocommerce' ); ?>
                    </a>
                </p>
			<?php endif; ?>
        </div>
    </div>
</section>