<?php

$args = [
	'fields'         => 'ids',
	'post_type'      => 'product',
	'posts_per_page' => - 1,
	'meta_key'       => 'total_sales',
	'orderby'        => 'meta_value_num',
	'order'          => 'DESC',
];

$best_selling_ids = get_posts( $args );

$top_selling_category_ids = [];

$limit = get_sub_field( 'number' );

foreach ( $best_selling_ids as $product_id ) {
	$product    = wc_get_product( $product_id );
	$categories = $product->get_category_ids();
	foreach ( $categories as $category ) {
		if ( ! in_array( $category, $top_selling_category_ids ) ) {
			$top_selling_category_ids[] = $category;
		}
	}
	if ( sizeof( $top_selling_category_ids ) == $limit ) {
		break;
	}
}
?>
<section id="b-products_cat">
    <div class="b-section_title text-center">
        <span><?= get_sub_field( 'pre_header' ) ?></span>
        <h4 class="text-uppercase">
			<?= get_sub_field( 'header' ) ?>
            <span class="text-center">
                        <span class="d-inline-block bck-default title-saperator"></span>
                    </span>
        </h4>
        <p class="b-section_text"><?= get_sub_field( 'sub_header' ) ?></p>
    </div>
    <div class="b-featured_cat">
        <div class="container">
            <div class="row">
				<?php
				$count = 1;
				foreach ( $top_selling_category_ids

				as $category_id ):
				$category = get_term_by( 'id', $category_id, 'product_cat', 'ARRAY_A' );

				$thumbnail_id = get_term_meta( $category_id, 'thumbnail_id', true );
				if ( $count == 1 ):
				?>
                <div class="col-xl-6 col-lg-6 col-mb-6 col-sm-6 col-xs-12">
					<?php
                    elseif ( $count == 2 || $count == 4 ):
					?>
                    <div class="col-xl-3 col-lg-3 col-mb-3 col-sm-3 col-xs-12">
						<?php
						endif;
						?>
                        <div class="b-featured_cat_in <?= ( $count == 2 ) ? 'mb-4' : '' ?>">
                            <a href="<?= get_category_link( $category_id ) ?>">
								<?php
								if ( $count == 4 ) {
									$size = [ 263, 555 ];
								} else if ( $count == 1 ) {
									$size = [ 540, 540 ];
								} else {
									$size = [ 273, 273 ];
								}
								$image = wp_get_attachment_image_url( $thumbnail_id, 'full' );
								$image = getResizedImage( $image, $size );
								echo \NextGenImage\getWebPHTML( $image['webp'], $image['orig'], [
									'class' => 'img-fluid d-block',
									'alt'   => $category['name']
								] );
								?>
                            </a>
                            <div class="b-cat_mask">
                                <a href="<?= get_category_link( $category_id ) ?>"
                                   class="category-link-overlay"><?= $category['name'] ?></a>
                            </div>
                        </div>
						<?php
						if ( $count != 2 ):
						?>
                    </div>
				<?php
				endif;
				$count ++;
				endforeach;
				?>
                </div>
            </div>
        </div>
</section>