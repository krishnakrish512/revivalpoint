<?php
$args = [
	'post_type'      => 'testimonial',
	'post_status'    => 'publish',
	'posts_per_page' => get_sub_field( 'testimonial_column' )['number']
];

$testimonials_query = new WP_Query( $args );
?>
<div class="container">
    <div class="row clearfix mb-2">
        <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-6 col-xs-12">
            <section id="b-testimonial">
                <div class="b-section_title">
                    <h4 class="text-center text-uppercase">
                        WHAT THEY SAY ABOUT US
                        <span class="b-title_separator"><span></span></span>
                    </h4>
                </div>
                <div class="b-testimonial b-testimonial_small mb-5">
                    <div class="b-testimonial_listing owl-carousel owl-theme" id="b-testimonial_list">
						<?php
						while ( $testimonials_query->have_posts() ):
							$testimonials_query->the_post();
							?>
                            <div class="b-testimonial_single">
                                <div class="b-testimonial_inner">
                                    <div class="b-testimonial_avatar">
                                        <img class="img-fluid rounded-circle m-auto d-block"
                                             src="<?= get_the_post_thumbnail_url() ?>" alt="" title="" width="100"
                                             height="100">
                                    </div>
                                    <div class="b-testimonial_content text-center">
                                        <p><?= get_the_content() ?></p>
                                        <footer>
											<?= get_the_title() ?> <span>Happy Customer</span>
                                        </footer>
                                    </div>
                                </div>
                            </div>
						<?php
						endwhile;
						?>
                    </div>
                </div>
            </section>
        </div>
        <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-6 col-xs-12">
            <div class="b-instagram_feeds mb-5">
                <ul class="b-instagram_pics list-inline">
					<?php
					$image_ids = get_sub_field( 'instagram_column' )['images'];
					foreach ( $image_ids as $image_id ):
						?>
                        <li>
                            <a href="<?= get_field( 'social_media', 'option' )['instagram'] ?>" target="_self"></a>
                            <div class="wrapp-pics">
                                <img src="<?= wp_get_attachment_image_url( $image_id, 'full' ) ?>" alt=""
                                     class="img-fluid d-block">
                                <div class="hover-mask"></div>
                            </div>
                        </li>
					<?php
					endforeach;
					?>
                </ul>
            </div>
        </div>
    </div>
</div>