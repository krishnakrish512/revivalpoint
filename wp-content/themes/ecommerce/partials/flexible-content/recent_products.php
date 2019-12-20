<?php
$args = [
	'fields'         => 'ids',
	'post_type'      => 'product',
	'status'         => 'publish',
	'posts_per_page' => get_sub_field( 'number' ),
	'orderby'        => 'date',
	'order'          => 'DESC'
];

$featured_products = get_posts( $args );
?>
<section id="b-top_recent">
    <div class="b-section_title pt-5">
        <h4 class="text-center text-uppercase mb-0">
            <b><?= get_sub_field( 'heading' ) ?></b>
            <span class="text-center">
                        <span class="d-inline-block bck-default title-saperator"></span>
                    </span>
        </h4>
        <p class="text-center"><?= get_sub_field( 'sub_heading' ) ?></p>
    </div>
    <div class="container pt-2 pb-5">
        <div class="row clearfix b-cat_blocks owl-carousel owl-theme">
			<?php
			foreach ( $featured_products as $product_id ):
				?>
                <div class="owl-item">
					<?php get_single_product_html( $product_id ) ?>
                </div>
			<?php
			endforeach;
			?>
        </div>
    </div>
</section>