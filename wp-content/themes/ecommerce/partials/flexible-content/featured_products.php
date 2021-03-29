<?php

$args = [
	'fields'         => 'ids',
	'post_type'      => 'product',
	'status'         => 'publish',
	'posts_per_page' => get_sub_field( 'number' ),
	'post__in'       => wc_get_featured_product_ids()
];

$featured_products = get_posts( $args );
?>
<section id="b-products" class="spacing-mb-n40">
    <div class="b-section_title">
        <h4 class="text-center text-uppercase mb-0">
            <b><?= get_sub_field( 'heading' ) ?></b>
            <span class="text-center">
                        <span class="d-inline-block bck-default title-saperator"></span>
                    </span>
        </h4>
        <p class="text-center"><?= get_sub_field( 'sub_heading' ) ?></p>
    </div>
    <div class="b-products b-product_grid b-product_grid_five mb-5">
        <div class="container">
            <div class="row clearfix">
				<?php
				foreach ( $featured_products as $product_id ):
					?>
                    <div class="col-xl-3 col-lg-4 col-mb-4 col-sm-6 col-xs-12">
						<?php get_single_product_html( $product_id ); ?>
                    </div>
				<?php
				endforeach;
				?>
            </div>
        </div>
    </div>
</section>