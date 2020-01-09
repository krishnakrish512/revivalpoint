<?php

function get_product_quick_view_html( $product_id, $variation = [] ) {
	$product        = wc_get_product( $product_id );
	$parent_product = '';
	if ( $product->get_parent_id() ) {
		$parent_product = wc_get_product( $product->get_parent_id() );
	}
	?>
    <div class="row">
        <div class="col-md-6 product_img">
            <div class="owl-carousel owl-theme" id="b-product_pop_slider">
				<?php

				$image_ids = $product->get_gallery_image_ids();

				if ( empty( $image_ids ) ) {
					$image_ids = [ $product->get_image_id() ];

				} else {
					array_unshift( $image_ids, $product->get_image_id() );
				}


				if ( $image_ids ):
					foreach ( $image_ids as $image_id ):
						?>
                        <div>
							<?php
							$image = wp_get_attachment_image_url( $image_id, 'full' );
							$image = getResizedImage( $image, [ 475, 600 ] );
							echo \NextGenImage\getWebPHTML( $image['webp'], $image['orig'], [
								'class' => 'img-fluid d-block m-auto'
							] );
							?>
                        </div>
					<?php
					endforeach;
				endif;
				?>
            </div>
        </div>
        <div class="col-md-6 product_content pr-5 pt-4">
            <div class="b-product_single_summary">
                <h1><?= $product->get_name() ?></h1>
                <p class="b-price">
                    <span class="b-amount"><?= $product->get_price_html() ?></span>
                </p>
                <div class="b-produt_description">
					<?= $product->get_short_description() ?>
                </div>
                <div class="b-product_attr">
					<?php
					$attributes = array_filter( ( $parent_product ) ? $parent_product->get_attributes() : $product->get_attributes(), 'wc_attributes_array_filter_visible' );


					foreach ( $attributes as $attribute ) {
						$values = array();

						if ( $attribute->is_taxonomy() ) {
							$attribute_taxonomy = $attribute->get_taxonomy_object();
							$attribute_values   = wc_get_product_terms( ( $parent_product ) ? $parent_product->get_id() : $product->get_id(), $attribute->get_name(), array( 'fields' => 'all' ) );

							foreach ( $attribute_values as $attribute_value ) {
								$value_slug = esc_attr( $attribute_value->slug );
								$value_id   = esc_attr( $attribute_value->term_id );
								$value_name = esc_html( $attribute_value->name );

								if ( $attribute_taxonomy->attribute_public ) {
									$values[] = '<a href="' . esc_url( get_term_link( $attribute_value->term_id, $attribute->get_name() ) ) . '" rel="tag">' . $value_name . '</a>';
								} else {
									$values[] = [ $value_slug, $value_name, $value_id ];
								}
							}
						} else {
							$values = $attribute->get_options();

							foreach ( $values as &$value ) {
								$value = make_clickable( esc_html( $value ) );
							}
						}


						$product_attributes[ 'attribute_' . sanitize_title_with_dashes( $attribute->get_name() ) ] = array(
							'label' => [
								'attribute_' . $attribute->get_name(),
								wc_attribute_label( $attribute->get_name() )
							],
							'value' => apply_filters( 'woocommerce_attribute', $values, $attribute, $values ),
						);
					}

					foreach ( $product_attributes as $product_attribute_key => $product_attribute ):
						?>
                        <div class="b-product_attr_single">
                            <label for="<?= $product_attribute_key ?>"><?= $product_attribute['label'][1] ?>
                                :</label>
                            <select name="<?= $product_attribute_key ?>"
                                    id="<?= $product_attribute_key ?>"
                                    class="variation-select">
								<?php
								if ( count( $product_attribute['value'] ) > 1 ):
									?>
                                    <option value="">Choose an option</option>
								<?php
								endif;
								foreach ( $product_attribute['value'] as $option ):

									if ( is_array( $option ) ):
										?>
                                        <option
                                                value="<?= $option[0] ?>"
												<?= ( $variation[ $product_attribute_key ] == $option[0] ) ? 'selected' : '' ?>><?= $option[1] ?></option>
									<?php
									else:
										?>
                                        <option
                                                value="<?= $option ?>"
												<?= ( $variation[ $product_attribute_key ] == $option ) ? 'selected' : '' ?>><?= $option ?></option>
									<?php
									endif;
								endforeach;
								?>
                            </select>
                        </div>
					<?php
					endforeach;
					?>
                </div>
                <div class="b-product_single_action clearfix <?= ( ! $product->is_in_stock() ) ? "d-none" : "" ?>">
                    <p><?= $product->get_stock_quantity() ?> in stock</p>
                    <div class="b-quantity pull-left">
                        <input type="button" value="-" class="b-minus">
                        <input type="text" step="1" min="<?= $product->get_min_purchase_quantity() ?>"
                               max="<?= ( $product->get_max_purchase_quantity() != - 1 ) ? $product->get_max_purchase_quantity() : '' ?>"
                               name="b-quantity" value="1" title="Qty"
                               class="input-text qty text" size="4" pattern="[0-9]*" inputmode="numeric">
                        <input type="button" value="+" class="b-plus">
                    </div>
                    <button
                            class="text-uppercase pull-left btn quick-add-to-cart"
                            data-product_id="<?= ( $parent_product ) ? $parent_product->get_id() : $product->get_id() ?>"
                            data-product-type="<?= $product->get_type() ?>">Add to cart
                    </button>
                </div>
				<?php
				if ( ! $product->is_in_stock() ):
					?>
                    <div>
                        <p>Out of Stock</p>
                    </div>
				<?php
				endif;
				?>
                <div class="b-product_single_option">
                    <ul class="pl-0 list-unstyled">
                        <li><b class="text-uppercase">Sku</b>: <?= $product->get_sku() ?></li>
                        <li><b>Category</b>:
							<?php
							$categories = wp_get_post_terms( ( $parent_product ) ? $parent_product->get_id() : $product->get_id(), 'product_cat' );

							foreach ( $categories as $category ):
								?>
                                <a href="<?= get_category_link( $category->term_id ) ?>"><?= $category->name ?></a>
							<?php
							endforeach;
							?>
                        </li>
                        <li><?php ecommerce_product_sharing( $product->get_id() ); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
	<?php
}

function get_single_product_html( $product_id ) {
	$product = wc_get_product( $product_id );
	?>
    <div class="b-product_grid_single">
        <div class="b-product_grid_header">
            <a href="<?= $product->get_permalink() ?>">
				<?php
				$image = wp_get_attachment_image_url( $product->get_image_id(), 'full' );
				$image = getResizedImage( $image, [ 263, 336 ] );
				echo \NextGenImage\getWebPHTML( $image['webp'], $image['orig'], [
					'class' => 'img-fluid img-switch d-block',
					'alt'   => $product->get_name()
				] );
				?>

            </a>
            <div class="b-product_grid_action">
				<?php echo do_shortcode( "[ti_wishlists_addtowishlist product_id='" . $product->get_id() . "']" ); ?>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#b-qucik_view"
                   data-product-id="<?= $product->get_id() ?>"
                   class="quick-view">
                    <i data-toggle="tooltip" data-placement="left" title=""
                       class="icon-magnifier-add icons" data-original-title="Quick View"></i>
                </a>
            </div>
        </div>
        <div class="b-product_grid_info">
            <h3 class="product-title">
                <a href="<?= $product->get_permalink() ?>"><?= $product->get_name() ?></a>
            </h3>
            <div class="clearfix">
                <div class="b-product_grid_toggle float-left">
                    <span class="b-price"><?= $product->get_price_html() ?></span>
                    <span class="b-add_cart">
                                            <i class="icon-basket icons"></i>
                                            <a href="<?= $product->add_to_cart_url() ?>"
                                               class="add-to-cart"
                                               data-product_id="<?= $product->get_id() ?>"
                                               data-product-type="<?= $product->get_type() ?>"><?= $product->add_to_cart_text() ?></a>
                                        </span>
                </div>
            </div>
        </div>
    </div>
	<?php
}