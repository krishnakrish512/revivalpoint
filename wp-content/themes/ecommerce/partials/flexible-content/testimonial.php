<?php
$args = [
	'post_type'      => 'testimonial',
	'post_status'    => 'publish',
	'posts_per_page' => get_sub_field( 'number' )
];

$testimonials_query = new WP_Query( $args );
?>
<section id="b-testimonial">
    <div class="container">
        <div class="b-section_title">
            <h4 class="text-center text-uppercase">
                WHAT THEY SAY ABOUT US
                <span class="text-center">
                        <span class="d-inline-block bck-default title-saperator"></span>
                    </span>

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
                                     src="<?= get_the_post_thumbnail_url() ?>" alt="" title="" width="100" height="100">
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
    </div>
</section>
