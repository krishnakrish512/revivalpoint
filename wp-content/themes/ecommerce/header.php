<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>

    <!-- META-DATA -->
    <meta http-equiv="content-type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- FAVICON -->
    <link rel="shortcut icon" href="assets/images/favicon.png">

    <!-- CSS:: FONTS -->
    <link href="https://fonts.googleapis.com/css?family=Karla:400,400i,700,700i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i" rel="stylesheet">

    <?php wp_head(); ?>

</head>
<body>
<div class="b-mini_cart">
    <div class="b-mini_cart_header">
        SHOPPING CART
        <span class="b-close_search" id="b-close_cart"></span>
    </div>
    <div class="widget_shopping_cart_content">
        <?php woocommerce_mini_cart(); ?>
    </div>
</div>
<div class="b-main_menu-wrapper hidden-lg-up">
    <ul class="b-user-block">
        <li class="b-user-block__content">
            <h6 class="callout-text m-0 font-weight-bold">Hi, <?= ecommerce_get_user_display_name() ?></h6>
            <div class="callout-action">
                <?php ecommerce_user_account_link(); ?>
            </div>

        </li>
    </ul>
    <?php
    wp_nav_menu([
        'theme_location' => 'primary',
        'menu_class' => 'categories',
        'container' => '',
        'walker' => new Ecommerce_Responsive_Nav_Walker()
    ]);
    ?>
</div>
<div class="b-wrapper">
    <header id="b-header">
        <div class="b-header b-header_main">
            <div class="container d-flex justify-content-between align-items-center">
                <div class="b-logo">
                    <a href="<?= get_home_url() ?>" class="d-inline-block"><img
                                src="<?= wp_get_attachment_image_url(get_theme_mod('custom_logo'), 'full') ?>"
                                class="img-fluid d-block"
                                alt=""></a>
                </div>
                <div class="b-header_nav b-header_nav_center ml-auto border-right__dashed pr-xl-3 mr-xl-3 pr-lg-2 mr-lg-2 hidden-sm-down hidden-md-down">
                    <div class="b-menu_top_bar_container">
                        <?php
                        wp_nav_menu([
                            'theme_location' => 'primary',
                            'menu_class' => 'pl-0 mb-0 list-unstyled',
                            'container_class' => 'b-main_menu pt-0',
                            'walker' => new Ecommerce_Nav_Walker()
                        ]);
                        ?>
                    </div>
                </div>
                <div class="b-header_right">
                    <div class="b-has_sub b-dropdown_wrapper from-bottom b-user-block border-right__dashed pr-xl-5 pr-lg-3 hidden-sm-down hidden-md-down">
                        <div class="b-user-block__image float-left mr-1">
                            <img src="<?= get_template_directory_uri() ?>/assets/images/lady.svg" alt="">
                        </div>
                        <div class="b-user-block__content float-right">
                            <h5 class="callout-text m-0 font-weight-bold">
                                Hi, <?= ecommerce_get_user_display_name() ?></h5>
                            <div class="callout-action">
                                <?php ecommerce_user_account_link() ?>
                            </div>
                        </div>
                    </div>
                    <div class="b-search_icon hidden-sm-down hidden-md-down">
                        <a href="javascript:;" id="b-search_toggle" class="d-inline-block">
                            <i class="icon-magnifier icons"></i>
                        </a>
                    </div>
                    <div class="b-wishlist_icon hidden-sm-down hidden-md-down">
                        <?php echo do_shortcode("[ti_wishlist_products_counter]"); ?>
                    </div>
                    <div class="b-cart_basket pr-0">
                        <a href="javascript:void(0);" id="b-mini_cart" class="d-inline-block">
                            <i class="icon-basket icons"></i>
                            <span class="b-cart_totals hidden-sm-down hidden-md-down">
                              <span class="b-cart_number"><?= WC()->cart->get_cart_contents_count() ?></span>
                              <span class="b-subtotal_divider d-none">/</span>
                              <span class="b-cart_subtotal d-none">
                                <span class="b-cart_amount amount">
                                  <?= WC()->cart->get_cart_subtotal() ?>
                                </span>
                              </span>
                            </span>
                        </a>
                    </div>
                    <div class="hidden-lg-up">
                        <i class="fa fa-bars  b-nav_icon" id="b-nav_icon"></i>
                    </div>
                </div>
            </div>
        </div>
    </header>
