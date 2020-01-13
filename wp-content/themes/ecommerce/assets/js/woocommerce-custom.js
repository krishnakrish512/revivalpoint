$(document).ready(function ($) {
//ajax add to cart from product listing
    $(document).on('click', '.add-to-cart', function (e) {
        if ($(this).data('product-type') === "simple") {
            e.preventDefault();
            let productId = $(this).data('product_id');

            $.ajax({
                url: es.ajax_url,
                type: 'POST',
                data: {
                    action: 'ecommerce_add_cart_ajax',
                    product_id: productId
                },
                success: function (results) {
                    //update the cart html
                    $('.widget_shopping_cart_content').empty();
                    $('.widget_shopping_cart_content').append(results);
                    $("body").addClass("b-mini_cart_toggle");
                    // setTimeout(function () {
                    //     jQuery('.cart-dropdown').removeClass('show-dropdown');
                    // }, 3000);
                }
            });
        }
    });

    //ajax add to cart from product quick view modal
    $(document).on('click', '.quick-add-to-cart', function (e) {
        e.preventDefault();
        let productId = $(this).data('product_id');
        let quantity = $('input[name="b-quantity"]').val();
        let variation = {};
        let selects = document.getElementsByClassName('variation-select');
        //get variation attributes from select fields
        if (selects.length) {
            for (let key in selects) {
                if (selects.hasOwnProperty(key)) {
                    variation[selects[key].name] = selects[key].value;
                }
            }
        }

        variation = JSON.stringify(variation);

        $.ajax({
            url: es.ajax_url,
            type: 'POST',
            data: {
                action: 'ecommerce_add_cart_ajax',
                product_id: productId,
                quantity: quantity,
                variation: variation
            },
            success: function (results) {
                //update the cart html
                $('.widget_shopping_cart_content').empty();
                $('.widget_shopping_cart_content').append(results);
                $("body").addClass("b-mini_cart_toggle");
            }
        });
    });

    //on cart html change update the cart meta html i.e. product count and subtotal
    $("body").on('DOMSubtreeModified', ".widget_shopping_cart_content", function () {
        $.ajax({
            url: es.ajax_url,
            type: 'POST',
            data: {
                action: 'ecommerce_cart_meta_ajax'
            },
            success: function (results) {
                $('#b-mini_cart').empty();
                $('#b-mini_cart').append(results);
            }
        });
    });

    var availableVariations;

    //ajax get quick view modal html
    $(document).on('click', '.quick-view', function (e) {
        let productId = $(this).data('product-id');
        $.ajax({
            url: es.ajax_url,
            type: 'POST',
            data: {
                action: 'ecommerce_quick_view_ajax',
                product_id: productId
            },
            success: function (results) {
                $('#b-qucik_view .modal-body').empty();
                $('#b-qucik_view .modal-body').append(results);

                //on sucess get all available variations for variable product
                $.ajax({
                    url: es.ajax_url,
                    type: 'POST',
                    data: {
                        action: 'ecommerce_get_available_variations_ajax',
                        product_id: productId
                    },
                    success: function (response) {
                        availableVariations = response;
                    }
                });
                //initalize the product image slider
                ProductPopupSlider();

                $('select').niceSelect();

                //disable add to cart button if all select fields are not selected
                if (document.getElementsByClassName('variation-select').length) {
                    let selects = document.getElementsByClassName('variation-select');
                    let optionSelected = true;
                    for (let key in selects) {
                        if (selects.hasOwnProperty(key)) {
                            if (!selects[key].value) {
                                optionSelected = false;
                            }
                        }
                    }
                    if (!optionSelected) {
                        $('.quick-add-to-cart').attr('disabled', 'disabled');
                    }
                }
                // $("body").addClass("b-mini_cart_toggle");
                // setTimeout(function () {
                //     jQuery('.cart-dropdown').removeClass('show-dropdown');
                // }, 3000);
            }
        });
    });

    //event triggered on quick view variation change
    $(document).on('change', '.variation-select', function (e) {
        let selects = $('select.variation-select');
        let optionSelected = true;
        selects.each(function (key, element) {
            if (!element.value) {
                optionSelected = false;
            }
        });

        if (optionSelected) {
            let productId = $('.quick-add-to-cart').data('product_id');

            let variation = {};
            selects.each(function (key, element) {
                variation[element.name] = element.value;
            });

            variation = JSON.stringify(variation);

            let variationString = JSON.stringify(availableVariations);
            if (!variationString.includes(variation)) {
                $('.quick-add-to-cart').attr('disabled', 'disabled');
                $('.b-product_single_action p').addClass('out-of-stock').removeClass('in-stock');
                $('.b-product_single_action p').html('Variation not available. Please select other options');
                return;
            } else {
                $('.quick-add-to-cart').removeAttr('disabled');
            }

            //update the quick view modal html upon selection of a variation
            $.ajax({
                url: es.ajax_url,
                type: 'POST',
                data: {
                    action: 'ecommerce_get_variation_html_ajax',
                    product_id: productId,
                    variation: variation
                },
                success: function (response) {
                    $('#b-qucik_view .modal-body').empty();
                    $('#b-qucik_view .modal-body').append(response);
                    ProductPopupSlider();
                    if ($('select.variation-select').length) {
                        let selects = $('select.variation-select');
                        let optionSelected = true;
                        selects.each(function (key, element) {
                            if (!element.value) {
                                optionSelected = false;
                            }
                        });
                        if (!optionSelected) {
                            $('.quick-add-to-cart').attr('disabled', 'disabled');
                        }
                    }
                }
            });
        }
    });

    $(document).on('click', 'input.b-minus', function (e) {
        let val = parseInt($(this).next('input').attr('value'));
        if (parseInt(val) > 1) {
            val = parseInt(val) - 1;
            $(this).next('input').attr('value', val);
        }
    });

    $(document).on('click', 'input.b-plus', function (e) {
        let val = parseInt($(this).prev('input').attr('value'));
        let max = parseInt($(this).prev('input').attr('max'));

        if (max > val || $(this).prev('input').attr('max') === "" || $(this).prev('input').attr('max') === "-1") {
            val = parseInt(val) + 1;
            $(this).prev('input').attr('value', val);
        }
    });

    function ProductPopupSlider() {
        if ($("#b-product_pop_slider").length > 0) {
            $('#b-product_pop_slider').owlCarousel({
                loop: true,
                margin: 0,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 1
                    },
                    1000: {
                        items: 1
                    }
                }
            })
        }
    }

    //single product page

    //ajax add to cart
    $(document).on('click', '.single_add_to_cart_button', function (e) {
        e.preventDefault();
        let productId = null;
        let variationId = null;
        let variation = {};

        if ($('.woocommerce-grouped-product-list').length) {
            let products = document.getElementsByClassName('prod-quantity');

            let quantityArray = [];
            $(".prod-quantity").each(function (index) {
                let quantity = this.value;
                let name = this.name;
                name = name.split(']')[0];
                let id = name.split('[')[1];

                quantityArray[index] = {
                    'id': id,
                    'quantity': quantity
                }
            });
            quantity = quantityArray;
        }

        if (!$('.woocommerce-grouped-product-list').length) {
            productId = $(this).attr('value');
            variationId = $('input[name=variation_id]').attr('value');
            quantity = $('input[name="b-quantity"]').val();
            let selects = document.getElementsByClassName('single-variation-select');
            //get variation attributes from select fields
            if (selects.length) {
                for (let key in selects) {
                    if (selects.hasOwnProperty(key)) {
                        variation[selects[key].name] = selects[key].value;
                    }
                }
            }
        }

        variation = JSON.stringify(variation);

        $.ajax({
            url: es.ajax_url,
            type: 'POST',
            data: {
                action: 'ecommerce_add_cart_ajax',
                product_id: productId,
                quantity: quantity,
                variation: variation,
                variation_id: variationId
            },
            success: function (results) {
                //update the cart html
                $('.widget_shopping_cart_content').empty();
                $('.widget_shopping_cart_content').append(results);
                $("body").addClass("b-mini_cart_toggle");
            }
        });
    });


    //get variation data in single page on variation select
    $(document).on('change', '.single-variation-select', function (e) {
        let selects = $('select.single-variation-select');
        let optionSelected = true;
        selects.each(function (key, element) {
            if (!element.value) {
                optionSelected = false;
            }
        });

        if (optionSelected) {
            let productId = $('input[name=product_id]').attr('value');
            let variationId = $('input[name=variation_id]').attr('value');

            //update the quick view modal html and variation image upon selection of a variation
            $.ajax({
                url: es.ajax_url,
                type: 'POST',
                data: {
                    action: 'ecommerce_get_variation_image_ajax',
                    product_id: productId,
                    variation_id: variationId
                },
                success: function (response) {
                    let imageId = response['image_id'];
                    $('.owl-stage').removeClass('active');
                    $('.owl-thumb-item').removeClass('thumb-active');
                    $(`img[data-thumb-image-id=${imageId}]`).closest('.owl-thumb-item').addClass('thumb-active').trigger('click');
                    $('input[name="b-quantity"]').prop('min', response['min_purchase']);
                    $('input[name="b-quantity"]').prop('max', response['max_purchase']);
                    $('.sku').empty();
                    $('.sku').append(response['sku']);
                }
            });
        }
    });
});