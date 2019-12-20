<footer class="b-footer_container color-scheme-light">
    <div class="container b-main_footer">
        <!-- footer-main -->
        <aside class="row clearfix">
            <div class="b-footer_column col-md-12 col-sm-12">
                <div class="b-footer_block">
                    <div class="b-footer_block_in">
                        <p class="text-center mb-0"><img
                                    src="<?= wp_get_attachment_image_url( get_theme_mod( 'custom_logo' ), 'full' ) ?>"
                                    class="d-block m-auto img-fluid" alt="" title="<?= get_bloginfo( 'name' ) ?>"></p>

                        <br>
                    </div>
                </div>
            </div>
            <div class="b-footer_column col-md-4 col-sm-12 offset-md-4 text-center">
                <div class="b-footer_block">
                    <div class="b-footer_block_in">
                        <p>STORE - worldwide fashion store since 1978. We sell over 1000+ branded products on our
                            web-site.</p>
                        <div class="b-contact_info mb-3">
							<?php
							$contact = get_field( 'contact', 'option' );
							?>
                            <i class="fa fa-location-arrow d-inline-block"></i> <?= $contact['address'] ?>
                            <br>
                            <i class="fa fa-mobile d-inline-block"></i> Phone: <?= $contact['phone_number'] ?>
                            <br>
                        </div>
                        <ul class="b-social-icons text-center">
							<?php
							$social_media = get_field( 'social_media', 'option' );
							?>
                            <li class="b-social_facebook"><a href="<?= $social_media['facebook'] ?>" target="_blank"
                                                             rel="noopener noreferrer"><i
                                            class="fa fa-facebook"></i>Facebook</a>
                            </li>
                            <li class="b-social_twitter"><a href="<?= $social_media['twitter'] ?>" target="_blank"
                                                            rel="noopener noreferrer"><i class="fa fa-twitter"></i>Twitter</a>
                            </li>
                            <li class="b-social_instagram"><a href="<?= $social_media['instagram'] ?>" target="_blank"
                                                              rel="noopener noreferrer"><i
                                            class="fa fa-instagram"></i>Instagram</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <!-- footer-main -->
    </div>
    <!-- footer-bar -->
    <div class="b-copyrights_wrapper">
        <div class="container">
            <div class="d-footer_bar">
                <div class="text-center">
                    <i class="fa fa-copyright"></i> <?= date( 'Y' ) ?> Created by
                    <a href="http://digitalflow.com.np/" target="_blank"
                       rel="noopener noreferrer">Digital Flow.</a>
                </div>
            </div>
        </div>
    </div>
    <!-- footer-bar -->
</footer>
<a href="javascript:;" id="b-scrollToTop" class="b-scrollToTop">
    <span class="basel-tooltip-label">Scroll To Top</span>Scroll To Top
</a>
<div class="b-search_popup">
    <form role="search" method="get" id="searchform" class="searchform  basel-ajax-search"
          action="<?= get_home_url() ?>" data-thumbnail="1"
          data-price="1" data-count="3">
        <div>
            <label class="screen-reader-text" for="s"></label>
            <input type="text" placeholder="Search for products" value="" name="s" id="s" autocomplete="off">
            <input type="hidden" name="post_type" id="post_type" value="product">
            <button type="submit" class="b-searchsubmit" id="b-searchsubmit">Search</button>
        </div>
    </form>
    <span class="b-close_search" id="b-close_search">close</span>
</div>
</div>
<!-- Modal -->
<div class="modal fade product_view" id="b-qucik_view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <button type="button" class="btn btn-close btn-secondary" data-dismiss="modal">
                <i class="icon-close icons"></i>
            </button>
            <div class="modal-body p-0">

            </div>
        </div>
    </div>
</div>
<div class="base-toolbar">
    <div class="base-toolbar-item">
        <a href="index.html" class="base-toolbar__icon">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-home icons"></i>
                  </span>
            <span class="base-toolbar__icon-label">home</span>
        </a>
    </div>
    <div class="base-toolbar-item">
        <a href="#" class="base-toolbar__icon" id="b-search_toggle-mob">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-magnifier icons"></i>
                  </span>
            <span class="base-toolbar__icon-label">search</span>
        </a>
    </div>
    <div class="base-toolbar-item">
        <a href="wishlist.html" class="base-toolbar__icon">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-heart icons"></i>
                      <span class="base-toolbar__icon-count">3</span>
                  </span>
            <span class="base-toolbar__icon-label">wishlist</span>
        </a>
    </div>
    <div class="base-toolbar-item">
        <a href="my-account.html" class="base-toolbar__icon">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-user icons"></i>
                  </span>
            <span class="base-toolbar__icon-label">profile</span>
        </a>
    </div>
</div>
<div class="base-toolbar">
    <div class="base-toolbar-item">
        <a href="<?= get_home_url() ?>" class="base-toolbar__icon">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-home icons"></i>
                  </span>
            <span class="base-toolbar__icon-label">home</span>
        </a>
    </div>
    <div class="base-toolbar-item">
        <a href="#" class="base-toolbar__icon" id="b-search_toggle-mob">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-magnifier icons"></i>
                  </span>
            <span class="base-toolbar__icon-label">search</span>
        </a>
    </div>
    <div class="base-toolbar-item">
        <a href="wishlist.html" class="base-toolbar__icon">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-heart icons"></i>
                      <span class="base-toolbar__icon-count">3</span>
                  </span>
            <span class="base-toolbar__icon-label">wishlist</span>
        </a>
    </div>
    <div class="base-toolbar-item">
        <a href="<?= get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ?>" class="base-toolbar__icon">
                  <span class="base-toolbar__icon-wrap">
                      <i class="icon-user icons"></i>
                  </span>
            <span class="base-toolbar__icon-label">profile</span>
        </a>
    </div>
</div>

<?php wp_footer(); ?>

</body>
</html>