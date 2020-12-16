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
<section id="b-top_recent" class="mb-80">
    <div class="b-section_title pt-5">
        <h4 class="text-center text-uppercase mb-0">
            <b><?= get_sub_field( 'heading' ) ?></b>
            <span class="text-center">
                        <span class="d-inline-block bck-default title-saperator"></span>
                    </span>
        </h4>
        <p class="text-center"><?= get_sub_field( 'sub_heading' ) ?></p>
    </div>
    <div class="container">
        <div class="row clearfix">
            <div class="b-cat_blocks owl-carousel owl-theme px-3">
                <?php
                foreach ( $featured_products as $product_id ):
                    ?>
                    <div class="owl-item pt-4">
                        <?php get_single_product_html( $product_id ) ?>
                    </div>
                <?php
                endforeach;
                ?>
            </div>

        </div>
    </div>
</section>