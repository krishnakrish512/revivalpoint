<div id="b-gallery_logo_outer" class="mb-5 mt-5">
    <div class="b-gallery_logo">
        <div class="container">
            <div class="row clearfix">
                <!-- <div class="col-xl-3 col-lg-3 col-mb-3 col-sm-4 col-xs-12">
                    <h2><?= get_sub_field( 'title' ) ?></h2>
                </div> -->
                <div class="col-xl-12 col-lg-12 col-mb-12 col-sm-12 col-xs-12">
                    <div class="b-gallery_logo_list">
                        <ul class="p-0 m-0 owl-carousel owl-theme b-count_04" id="b-gallery_logo">
							<?php
							while ( have_rows( 'logos' ) ):
								the_row();
								?>
                                <li><a href="<?= get_sub_field( 'url' ) ?>" target="_blank"
                                       rel="noreferrer noopener"><img
                                                src="<?= wp_get_attachment_image_url( get_sub_field( 'logo' ), 'full' ) ?>"
                                                class="img-fluid d-block"
                                                alt=""></a></li>
							<?php
							endwhile;
							?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>