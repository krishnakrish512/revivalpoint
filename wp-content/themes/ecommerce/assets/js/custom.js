var App = (function (window) {
    "use strict";
    var _this = null;
    var cacheCollection = {};
    return {
        init: function () {
            _this = this;

            /* Flip Product Image */
            //this.FlipProductImage();

            /* Add To Wish List */
            this.AddToWishList();

            /* IsoTop Call */
            this.IsoTopCall();

            /* Filter Portfolio */
            this.FilterPortfolio();

            /* Mobile Nav Toggle */
            this.MobileNavToggle();

            /* Toggle Acount Form */
            this.ToggleAccountForm();

            /* FILTER TOGGLE */
            this.FilterToggle();

            /* LOGO CAROUSEL */
            this.LogoCarouselCountFour();

            /* HOME SLIDER ONE */
            this.HomeSliderOne();
            this.HomeSliderBoxed();
            this.HomeSliderBoxedFull();
            this.HomeSliderFashion();

            /* TESTIMONIAL CAROUSEL */
            this.TestimonialCarousel();

            /* FASION CATEGORY CAROUSEL */
            this.FashionTopCat();

            /* SCROLL TO TOP */
            this.ScrollToTOp();

            /* HEADER FIX ON SCROLL */
            this.HeaderFixOnScroll();

            /* COUNTER NUMBER */
            this.CounterNumber();

            /* FAQ TOGGLE */
            this.FaqToggle();

            /* SEARCH TOGGLE */
            this.SearchToggle();

            /* RELATED PRODUCTS */
            this.RelatedProducts();

            /* BLOG CAROUSEL */
            this.BlogCarousel();

            /* PRODUCT CAROUSEL */
            this.ProductCarousel();

            /* FEAURE CAT CAROUSEL DARK */
            this.FeatureCatCarouselDark();

            /* PRODUCT SLIDER */
            this.ProductSlider();

            /* PRODUCT POP SLIDER */
            //this.ProductPopSlider();

            /* MINI CART TOGGLE */
            this.MiniCartToggle();

            /* SINGLE PRODUCT LIST SLIDE */
            this.singleProductSlide();

            /* SINGLE PRODUCT SLIDE */
            this.SingleProductCarousel();

            /* SINGLE PRODUCT BOTTOM SLIDE  */
            this.SingleProductBottomCarousel();

            /* SINGLE PRODUCT ZOOM */
            this.ProductZoom();

            /* LIGHTCASE */
            this.LightCaseInit();

            /* CUSTOM SCROLLBAR */
            this.customScollBar();

            /* STICKY PRODUCT DETAIL */
            this.stickyProductDetail();

            /* WOW INIT */
            this.wowInit();

            /* Product quantity count */
            this.ProductQuantityCount();

        },

        getObject: function (selector) {
            if (typeof cacheCollection[selector] == "undefined") {
                cacheCollection[selector] = $(selector);
            }
            return cacheCollection[selector];
        },

        FlipProductImage: function () {
            if ($(".img-switch").length > 0) {
                $(".b-product_grid  .b-product_grid_single .b-product_grid_header > a").each(function () {
                    var img_html = $(this).html();
                    var data_src = $(this).find('img').attr("data-src");
                    var data_src = data_src.split(",");
                    var data_thumb = data_src[1];
                    var url = $(this).attr('href');
                    $("<div class='b-hover_img'><a href='" + url + "'><img src='" + data_thumb + "' class='img-fluid img-switch d-block' alt='' ></a></div>").insertAfter($(this));

                });
            }
            if ($(".img-switch-list").length > 0) {
                $(".b-product_list_listing  .b-product_list_single .b-product_list_img > a").each(function () {
                    var img_html = $(this).html();
                    var data_src = $(this).find('img').attr("data-src");
                    var data_src = data_src.split(",");
                    var data_thumb = data_src[1];
                    var url = $(this).attr('href');
                    $("<div class='b-hover_img'><a href='" + url + "'><img src='" + data_thumb + "' class='img-fluid img-switch d-block' alt='' ></a></div>").insertAfter($(this));

                });
            }
        },

        AddToWishList: function () {
            $(".b-add_to_whish").on("click", function () {
                if (!$(this).hasClass('b-wish_added')) {
                    $(this).addClass("b-show_loader").delay(2500).queue(function () {
                        $(this).removeClass("b-show_loader").dequeue();
                        $(this).addClass("b-wish_added");
                        $(this).parent("a").attr('data-original-title', 'Browse Wishlist')
                        var url = $(this).parent("a").attr('data-whishurl');
                        $(this).parent("a").attr('href', url);
                    });
                }
            });
        },

        IsoTopCall: function () {
            if ($("#b-portfolio_isotop").length > 0) {
                $('#b-portfolio_isotop').isotope({
                    itemSelector: '.col-xs-12',
                    percentPosition: true
                });
            }
        },

        FilterPortfolio: function () {
            $('.b-masonry_filter').on('click', 'a', function () {
                $(".b-masonry_filter li a").removeClass("b-filter_active");
                $(this).addClass("b-filter_active");
                var filterValue = $(this).attr('data-filter');
                $('#b-portfolio_isotop').isotope({filter: filterValue});
            });
        },

        MobileNavToggle: function () {
            $("#b-nav_icon").on('click', function (event) {
                $("body").toggleClass('mobile-menu-open');
                return false;
            });
            $(document).on('click', function (e) {
                if (!$(e.target).is('.b-main_menu-wrapper, .b-main_menu-wrapper *')) {
                    $("body").removeClass('mobile-menu-open');
                }
            });
            $(document).on('click', ".b-main_menu-wrapper ul li.has-sub > a", function (event) {
                $(this).parent().find(".dropdown-inner").slideToggle("slow");
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

        FilterToggle: function () {
            $(".b-open_filters").on("click", function () {
                $(this).toggleClass('b-btn_open');
                $(".b-filters_area").slideToggle('');
            });
        },

        LogoCarouselCountFour: function () {
            if ($("#b-gallery_logo.b-count_04").length > 0) {
                $('#b-gallery_logo.b-count_04.owl-carousel').owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 2
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 4
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

        HomeSliderOne: function () {
            var tpj = jQuery;
            var revapi1078;
            if (tpj("#b-home_01_slider").revolution == undefined) {
                //revslider_showDoubleJqueryError("#b-home_01_slider");
            } else {
                revapi1078 = tpj("#b-home_01_slider").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    sliderLayout: "fullwidth",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style: "zeus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 0
                            }
                        }
                        ,
                        bullets: {
                            enable: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            style: "metis",
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 30,
                            space: 5,
                            tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [600, 600, 500, 400],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 47, 48, 49, 50, 51, 55],
                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        },

        HomeSliderBoxed: function () {
            var tpj = jQuery;
            var revapi1078;
            if (tpj("#b-home_02_slider").revolution == undefined) {
                //revslider_showDoubleJqueryError("#b-home_01_slider");
            } else {
                revapi1078 = tpj("#b-home_02_slider").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style: "zeus",
                            enable: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: false,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                            left: {
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: -50,
                                v_offset: 0
                            },
                            right: {
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 50,
                                v_offset: 0
                            }
                        }
                        ,
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            hide_under: 600,
                            style: "hermes",
                            hide_onleave: false,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            direction: "vertival",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 30,
                            space: 5
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [600, 600, 500, 400],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 47, 48, 49, 50, 51, 55],

                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        },

        HomeSliderBoxedFull: function () {
            var tpj = jQuery;
            var revapi1078;
            if (tpj("#b-home_03_slider").revolution == undefined) {
                //revslider_showDoubleJqueryError("#b-home_01_slider");
            } else {
                revapi1078 = tpj("#b-home_03_slider").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style: "zeus",
                            enable: true,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                            left: {
                                h_align: "left",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 0
                            },
                            right: {
                                h_align: "right",
                                v_align: "center",
                                h_offset: 30,
                                v_offset: 0
                            }
                        }
                        ,
                        bullets: {
                            enable: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            style: "metis",
                            hide_onleave: true,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            direction: "horizontal",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 30,
                            space: 5,
                            tmp: '<span class="tp-bullet-img-wrap">  <span class="tp-bullet-image"></span></span><span class="tp-bullet-title">{{title}}</span>'
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [600, 600, 500, 400],
                    lazyType: "none",
                    parallax: {
                        type: "mouse",
                        origo: "slidercenter",
                        speed: 2000,
                        levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50, 47, 48, 49, 50, 51, 55],

                    },
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
            }
        },

        HomeSliderFashion: function () {
            var tpj = jQuery;
            var revapi1078;
            if (tpj("#b-home_04_slider").revolution == undefined) {
                //revslider_showDoubleJqueryError("#b-home_01_slider");
            } else {
                revapi1078 = tpj("#b-home_04_slider").show().revolution({
                    sliderType: "standard",
                    jsFileLocation: "revolution/js/",
                    dottedOverlay: "none",
                    delay: 9000,
                    navigation: {
                        keyboardNavigation: "off",
                        keyboard_direction: "horizontal",
                        mouseScrollNavigation: "off",
                        mouseScrollReverse: "default",
                        onHoverStop: "off",
                        touch: {
                            touchenabled: "on",
                            swipe_threshold: 75,
                            swipe_min_touches: 1,
                            swipe_direction: "horizontal",
                            drag_block_vertical: false
                        }
                        ,
                        arrows: {
                            style: "zeus",
                            enable: false,
                            hide_onmobile: true,
                            hide_under: 600,
                            hide_onleave: false,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            tmp: '<div class="tp-title-wrap">    <div class="tp-arr-imgholder"></div> </div>',
                            left: {
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: -50,
                                v_offset: 0
                            },
                            right: {
                                h_align: "center",
                                v_align: "bottom",
                                h_offset: 50,
                                v_offset: 0
                            }
                        }
                        ,
                        bullets: {
                            enable: true,
                            hide_onmobile: false,
                            hide_under: 600,
                            style: "hermes",
                            hide_onleave: false,
                            hide_delay: 200,
                            hide_delay_mobile: 1200,
                            direction: "vertival",
                            h_align: "center",
                            v_align: "bottom",
                            h_offset: 0,
                            v_offset: 30,
                            space: 5
                        }
                    },
                    viewPort: {
                        enable: true,
                        outof: "pause",
                        visible_area: "80%",
                        presize: false
                    },
                    responsiveLevels: [1240, 1024, 778, 480],
                    visibilityLevels: [1240, 1024, 778, 480],
                    gridwidth: [1240, 1024, 778, 480],
                    gridheight: [695, 600, 500, 400],
                    lazyType: "none",
                    shadow: 0,
                    spinner: "off",
                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,
                    shuffle: "off",
                    autoHeight: "off",
                    hideThumbsOnMobile: "off",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    debugMode: false,
                    fallbacks: {
                        simplifyAll: "off",
                        nextSlideOnWindowFocus: "off",
                        disableFocusListener: false,
                    }
                });
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
                    margin: 15,
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
            }
        },

        ProductPopSlider: function () {
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

        CounterNumber: function () {
            if ($(".b-count_down").length > 0) {
                $('.b-count_down .b-count_down_val span').each(function () {
                    $(this).prop('Counter', 0).animate({
                        Counter: $(this).text()
                    }, {
                        duration: 4000,
                        easing: 'swing',
                        step: function (now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            }
        },

        FaqToggle: function () {
            $(".b-faq_option li span").on("click", function () {
                var data_val = $(this).data('val');
                $(".b-faq_option li span").removeClass('b-active_faq');
                $(this).addClass('b-active_faq');
                $(".b-tab_blocks > .b-tab_block_single").removeClass('b-tab_open');
                $(".b-tab_blocks > .b-tab_block_single").each(function () {
                    var data_rel = $(this).data('rel');
                    if (data_rel == data_val) {
                        $(this).addClass('b-tab_open');
                    }
                });
            });
            $(".b-faq_list > li h5").on("click", function () {
                $(this).find("i").toggleClass('fa-angle-up');
                $(this).find("i").toggleClass('fa-angle-down');
                $(this).parent().toggleClass('b-active_faq');
                $(this).parent().find("div").slideToggle();
            });
        },

        SearchToggle: function () {
            $("#b-search_toggle").on("click", function () {
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
                    nav: true,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
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
        },

        BlogCarousel: function () {
            if ($("#b-blog_carousel").length > 0) {
                var owl = $('#b-blog_carousel').owlCarousel({
                    loop: true,
                    margin: 15,
                    nav: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 3
                        },
                        1000: {
                            items: 3
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

        ProductCarousel: function () {
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
        },

        FeatureCatCarouselDark: function () {
            if ($("#b-feature_cat_carousel_dark").length > 0) {
                var owl = $('#b-feature_cat_carousel_dark').owlCarousel({
                    loop: true,
                    margin: 15,
                    nav: true,
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        600: {
                            items: 1
                        },
                        1000: {
                            items: 2
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

        ProductSlider: function () {
            if ($("#b-lightSlider").length > 0) {
                $('#b-lightSlider').lightSlider({
                    gallery: true,
                    item: 1,
                    loop: true,
                    slideMargin: 0,
                    thumbItem: 4
                });
            }
        },

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
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    vertical: true,
                    draggable: false,
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

        SingleProductBottomCarousel: function () {
            if ($("#bSingleProductBottom").length > 0) {
                $('#bSingleProductBottom').slick({
                    dots: false,
                    arrows: false,
                    speed: 800,
                    infinite: false,
                    autoplay: false,
                    slidesToShow: 4,
                    slidesToScroll: 1,
                    draggable: false,
                });

                $(document).on('click', '.b-display-list-wrapper .b-slider-action .slick-prev', function () {
                    $('#bSingleProductBottom').slick('slickPrev');
                });

                $(document).on('click', '.b-display-list-wrapper .b-slider-action .slick-next', function () {
                    $('#bSingleProductBottom').slick('slickNext');
                });

                $('.b-display-list-wrapper .owl-thumb-item:first-of-type').addClass('thumb-active');

                $(document).on('click', '.b-display-list-wrapper .owl-thumb-item', function () {
                    $('.b-display-list-wrapper .owl-thumb-item').removeClass('thumb-active');
                    $(this).addClass('thumb-active');
                });

            }
        },

        ProductZoom: function () {
            $('.b-produt-item').each(function () {
                $(this).find('img').zoomIt();
            });
        },
        ProductQuantityCount: function () {
            $('.count').prop('disabled', true);
            $(document).on('click', '.plus', function () {
                $('.count').val(parseInt($('.count').val()) + 1);
            });
            $(document).on('click', '.minus', function () {
                $('.count').val(parseInt($('.count').val()) - 1);
                if ($('.count').val() == 0) {
                    $('.count').val(1);
                }
            });
        },
        LightCaseInit: function () {
            if ($('a[data-rel^=lightcase]').length > 0) {
                $('a[data-rel^=lightcase]').lightcase();
            }
        },

        customScollBar: function () {
            if ($('.b-custom-scroll').length > 0) {
                $('.b-compact-summary').mCustomScrollbar({
                    theme: "minimal-dark"
                });
            }
        },

        stickyProductDetail: function () {
            if ($('.b-sticky-product').length > 0) {
                $('.b-sticky-product').stickyMojo({
                    footerID: '#endSticky',
                    contentID: '.b-product-display'
                });
            }
        },

        wowInit: function () {
            if ($('.wow').length > 0) {
                console.log("Test");
                new WOW().init();
            }
        }

    }
})(window);


$(document).ready(function ($) {
    App.init();

    $('select').niceSelect();


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


    $(document).on('change', '.variation-select', function (e) {
        let selects = document.getElementsByClassName('variation-select');
        let optionSelected = true;
        for (let key in selects) {
            if (selects.hasOwnProperty(key)) {
                if (!selects[key].value) {
                    optionSelected = false;
                }
            }
        }

        if (optionSelected) {
            let productId = $('.quick-add-to-cart').data('product_id');

            let variation = {};
            for (let key in selects) {
                if (selects.hasOwnProperty(key)) {
                    variation[selects[key].name] = selects[key].value;
                }
            }

            variation = JSON.stringify(variation);

            let variationString = JSON.stringify(availableVariations);
            if (!variationString.includes(variation)) {
                $('.quick-add-to-cart').attr('disabled', 'disabled');
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


$(window).on("load", function () {

    $(window).scroll(function () {
        var aTop = 400;
        if ($("#b-promo_popup").length > 0) {
            if ($(this).scrollTop() >= aTop) {
                $('#b-promo_popup').modal('show');
            }
        }

        if ($('.b-sticky-product').length > 0) {
            var winScroll = $(window).scrollTop();
            var scrollTaget = $('.b-product-design-sticky');
            var scrollTagetOffset = scrollTaget.offset().top;

            if (winScroll >= scrollTagetOffset) {
                scrollTaget.addClass('b-scroll-active');
            } else {
                scrollTaget.removeClass('b-scroll-active');
            }
            // console.log(scrollTagetOffset);
            if (parseInt($('.b-sticky-product').css('top'), 0) < 0) {
                $('.b-sticky-product').addClass('b-hide');
            } else {
                $('.b-sticky-product').removeClass('b-hide');
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

