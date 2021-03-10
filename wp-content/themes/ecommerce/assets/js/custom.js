var App = (function (window) {
    "use strict";
    var _this = null;
    var cacheCollection = {};
    return {
        init: function () {
            _this = this;

            /* Mobile Nav Toggle */
            this.MobileNavToggle();

            /* Toggle Acount Form */
            this.ToggleAccountForm();

            /* LOGO CAROUSEL */
            this.LogoCarouselCountFour();

            /* TESTIMONIAL CAROUSEL */
            this.TestimonialCarousel();

            /* FASION CATEGORY CAROUSEL */
            this.FashionTopCat();

            /* SCROLL TO TOP */
            this.ScrollToTOp();

            /* HEADER FIX ON SCROLL */
            this.HeaderFixOnScroll();

            /* SEARCH TOGGLE */
            this.SearchToggle();

            /* RELATED PRODUCTS */
            this.RelatedProducts();

            /* PRODUCT CAROUSEL */
            // this.ProductCarousel();

            /* PRODUCT SLIDER */
            // this.ProductSlider();

            /* MINI CART TOGGLE */
            this.MiniCartToggle();

            /* SINGLE PRODUCT LIST SLIDE */
            this.singleProductSlide();

            /* SINGLE PRODUCT SLIDE */
            this.SingleProductCarousel();

            /* SINGLE PRODUCT ZOOM */
            //this.ProductZoom();
        },

        getObject: function (selector) {
            if (typeof cacheCollection[selector] == "undefined") {
                cacheCollection[selector] = $(selector);
            }
            return cacheCollection[selector];
        },

        MobileNavToggle: function () {
            $("#b-nav_icon").on('click', function (event) {
                $("body").toggleClass('mobile-menu-open');
                return false;
            });
            $("#b-mini_cart").on('click', function (event) {
                $("body").toggleClass('b-mini_cart_toggle');
                return false;
            });
            $(document).on('click', function (e) {
                if (!$(e.target).is('.b-mini_cart, .b-main_menu-wrapper, .b-main_menu-wrapper *')) {
                    $("body").removeClass('mobile-menu-open');
                    $("body").removeClass('b-mini_cart_toggle');
                }
            });
            $(document).on('click', function (e) {
                if (!$(e.target).is('.b-mini_cart')) {
                    $("body").removeClass('b-mini_cart_toggle');
                }
            });
            $(document).on('click', ".b-main_menu-wrapper ul li.dropdown_wrapper > a i", function (event) {
                //$(this).parent().find(".dropdown-inner").slideToggle("slow");
                $(this).parent().next().slideToggle(350);
                return false;
            });
        },

        ToggleAccountForm: function () {
            $(document).find("#b-register_but").on("click", function () {
                $(".b-auth_text_register").fadeOut('');
                $(".b-auth_login").fadeOut('');
                $(".b-auth_register").fadeOut();
                $(".b-auth_text_login").fadeOut();
                $(".b-auth_register").fadeIn('slow');
                $(".b-auth_text_login").fadeIn('slow');
            });
            $(document).find("#b-login_but").on("click", function () {
                $(".b-auth_register").fadeOut('');
                $(".b-auth_text_login").fadeOut('');
                $(".b-auth_text_register").fadeOut();
                $(".b-auth_login").fadeOut();
                $(".b-auth_text_register").fadeIn('slow');
                $(".b-auth_login").fadeIn('slow');
            });
        },

        LogoCarouselCountFour: function () {
            if ($("#b-gallery_logo.b-count_04").length > 0) {
                $('#b-gallery_logo.b-count_04.owl-carousel').owlCarousel({
                    loop: true,
                    autoplay:true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 3
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 6
                        }
                    }
                })
            }
            if ($("#b-gallery_logo.b-count_05").length > 0) {
                $('#b-gallery_logo.b-count_05.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 4
                        },
                        1000: {
                            items: 5
                        }
                    }
                })
            }
        },

        TestimonialCarousel: function () {
            if ($("#b-testimonial_list").length > 0) {
                $('#b-testimonial_list').owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: false,
                    dots: true,
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
        },


        FashionTopCat: function () {
            if ($("#b-top_recent").length > 0) {
                $('#b-top_recent .owl-carousel').owlCarousel({
                    loop: true,
                    autoplay: true,
                    autoplaySpeed: 1000,
                    responsive: {
                        0: {
                            items: 2,
                            dots: true,
                            margin: 16,
                            nav: false,
                        },
                        600: {
                            items: 2,
                            dots: true,
                            margin: 16,
                            nav: false,
                        },
                        800: {
                            items: 3,
                            dots: true,
                            margin: 16,
                            nav: false,
                        },
                        1000: {
                            items: 4,
                            dots: false,
                            margin: 16,
                            nav: true,
                        },
                        1200: {
                            items: 5,
                            dots: false,
                            margin: 16,
                            nav: true,
                        }
                    }
                })
            }
        },

        ScrollToTOp: function () {
            $(window).scroll(function () {
                scroll = $(window).scrollTop();
                if (scroll >= 800) {
                    $("#b-scrollToTop").addClass('b-show_scrollBut')
                } else {
                    $("#b-scrollToTop").removeClass('b-show_scrollBut')
                }
            });
            $("#b-scrollToTop").on("click", function () {
                $('body,html').animate({
                    scrollTop: 0
                }, 1000);
            });
        },

        HeaderFixOnScroll: function () {
            $(window).scroll(function () {
                var sticky = $('body'),
                    scroll = $(window).scrollTop();

                if (scroll >= 250) sticky.addClass('b-header_fixed');
                else sticky.removeClass('b-header_fixed');
            });
        },

        SearchToggle: function () {
            $("#b-search_toggle,#b-search_toggle-mob").on("click", function () {
                var head_height = $("header").height();
                var window_height = $(window).height();
                var popup_height = window_height - head_height;
                $(this).find('i').toggleClass('icon-magnifier');
                $(this).find('i').toggleClass('icon-magnifier-remove');
                if ($('body').hasClass('b-search_open')) {
                    $(".b-search_popup").css('top', '');
                    $(".b-search_popup").css('height', '');
                } else {
                    $(".b-search_popup").css('top', head_height);
                    $(".b-search_popup").css('height', popup_height);
                }
                $('body').toggleClass('b-search_open');
            });
            $("#b-close_search").on("click", function () {
                $("#b-search_toggle i").addClass('icon-magnifier');
                $("#b-search_toggle i").removeClass('icon-magnifier-remove');
                $(".b-search_popup").css('top', '');
                $(".b-search_popup").css('height', '');
                $('body').removeClass('b-search_open');
            });
        },

        RelatedProducts: function () {
            if ($("#b-related_products").length > 0) {
                var owl = $('#b-related_products').owlCarousel({
                    loop: true,
                    margin: 15,
                    nav: false,
                    dots: true,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 5
                        }
                    }
                })
                $('.customNextBtn').click(function () {
                    owl.trigger('next.owl.carousel');
                })
                // Go to the previous item
                $('.customPrevBtn').click(function () {
                    // With optional speed parameter
                    // Parameters has to be in square bracket '[]'
                    owl.trigger('prev.owl.carousel', [300]);
                })
            }
        },

        /*ProductCarousel: function () {
            if ($("#b-product_carousel").length > 0) {
                var owl = $('#b-product_carousel').owlCarousel({
                    loop: true,
                    margin: 0,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 2
                        },
                        1000: {
                            items: 4
                        }
                    }
                })
                $('.customNextBtn').click(function () {
                    owl.trigger('next.owl.carousel');
                })
                // Go to the previous item
                $('.customPrevBtn').click(function () {
                    // With optional speed parameter
                    // Parameters has to be in square bracket '[]'
                    owl.trigger('prev.owl.carousel', [300]);
                })
            }
        },*/

        /*ProductSlider: function () {
            if ($("#b-lightSlider").length > 0) {
                $('#b-lightSlider').lightSlider({
                    gallery: true,
                    item: 1,
                    loop: true,
                    slideMargin: 0,
                    thumbItem: 4
                });
            }
        },*/

        MiniCartToggle: function () {
            $("#b-mini_cart").on("click", function () {
                $("body").addClass("b-mini_cart_toggle");
            })
            $("#b-close_cart").on("click", function () {
                $("body").removeClass("b-mini_cart_toggle");
            })
        },

        singleProductSlide: function () {
            if ($("#bSingleProduct").length > 0) {
                $('#bSingleProduct').slick({
                    dots: false,
                    arrows: false,
                    speed: 800,
                    infinite: false,
                    autoplay: false,
                    slidesToShow: 4,
                    slidesToScroll: 4,
                    vertical: false,
                    draggable: false,
                    center: true,
                    margin: 10,
                });

                $(document).on('click', '.b-display-list-wrapper .b-slider-action .slick-prev', function () {
                    $('#bSingleProduct').slick('slickPrev');
                });

                $(document).on('click', '.b-display-list-wrapper .b-slider-action .slick-next', function () {
                    $('#bSingleProduct').slick('slickNext');
                });

                $('.b-display-list-wrapper .owl-thumb-item:first-of-type').addClass('thumb-active');

                $(document).on('click', '.b-display-list-wrapper .owl-thumb-item', function () {
                    $('.b-display-list-wrapper .owl-thumb-item').removeClass('thumb-active');
                    $(this).addClass('thumb-active');
                });
            }
        },

        SingleProductCarousel: function () {
            if ($("#bSingleProductCarousel").length > 0) {
                $('#bSingleProductCarousel').owlCarousel({
                    loop: false,
                    margin: 0,
                    nav: false,
                    dots: false,
                    items: 1,
                    mouseDrag: false,
                    thumbs: true,
                    thumbsPrerendered: true
                });
            }
        },

        // ProductZoom: function () {
        //     $('.b-produt-item').each(function () {
        //         $(this).find('img').zoomIt();
        //     });
        // }
    }
})(window);


$(document).ready(function ($) {
    App.init();

    $('.filter-btn').on('click', function () {
        $('.mob-sidebar').addClass('is-open');
    })
    $('.sidebar-close').on('click', function () {
        $('.mob-sidebar').removeClass('is-open');
    })

    if ($('select').length) {
        $('select').niceSelect();
    }

    //add class to woocommerce div in my-account pages
    var loc = window.location.href; // returns the full URL
    if (/my-account/.test(loc)) {
        $('.woocommerce').addClass('dashboard');
    }

    /* ToolTip */
    $('[data-toggle="tooltip"]').tooltip();

    if ($(".gallery").length > 0) {
        var $gallery = $('.gallery a').simpleLightbox();
    }
    if ($(".myInfiniteScroll").length > 0) {
        $(".myInfiniteScroll").infiniteScroll({
            preloaderColor: "#007bff",
            files: [
                "./assets/content/content1.html",
                "./assets/content/content2.html",
                "./assets/content/content3.html"
            ],
            beforeLoadNewContent: function () {
            },
            onEnd: function () {
            }
        });
    }

    //contact form validation
    $('.wpcf7-submit').click(function (e) {
        let valid = true;
        if (!$("#userName").val()) {
            $("#userName-info").html("(required)");
            $("#userName").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!$("#userEmail").val()) {
            $("#userEmail-info").html("(required)");
            $("#userEmail").css('background-color', '#FFFFDF');
            valid = false;
        }
        if (!valid) {
            e.preventDefault();
            return;
        }
    });


    let date = new Date().getTime();
    date = date + 3 * 24 * 60 * 60 * 1000;
    let minDate = new Date(date).toISOString().split('T')[0];
    $('#preferred_delivery_date').attr('min', minDate);


});


$(window).on("load", function () {


    $('.slider').on('init', function () {
        $('.slider').css({display: 'block'});
    });
    if ($(".slider").length > 0) {
        $('.slider').slick({
            infinite: true,
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000,
        });
    }

    $(window).scroll(function () {
        var aTop = 400;
        if ($("#b-promo_popup").length > 0) {
            if ($(this).scrollTop() >= aTop) {
                $('#b-promo_popup').modal('show');
            }
        }
    });

    $(".b-promo_popup button.btn-close").on("click", function () {
        $('#b-promo_popup').remove();
        $('.modal-backdrop').remove();
        $('body').removeClass('modal-open');
        $('body').removeAttr('style');
    })
});

$(window).scroll(function () {
    /*    var $fwindow = $(window);

        $('[data-type="background"]').each(function(){
            var $backgroundObj = $(this);

            $fwindow.on('scroll resize', function() {
                var yPos = - ($fwindow.scrollTop() / $backgroundObj.data('speed'));
                var coords = '50% '+ yPos + 'px';

                // Move the background
                $backgroundObj.css({ backgroundPosition: coords });
            });
        });*/
})
