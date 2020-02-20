<?php

/**
 * customize woocommerce checkout fields
 *
 * @param $fields
 *
 * @return mixed
 */
function ecommerce_custom_checkout_fields( $fields ) {
	unset( $fields['order']['order_comments'] );

	$fields['ecommerce_extra_fields'] = array(
		'preferred_delivery_date' => [
			'type'     => 'date',
			'required' => true,
			'label'    => __( 'Preferred Delivery Date' )
		]
	);

	return $fields;
}

add_filter( 'woocommerce_checkout_fields', 'ecommerce_custom_checkout_fields' );

function ecommerce_extra_checkout_fields() {
	$checkout = WC()->checkout(); ?>
    <div class="extra-fields">
        <h3><?php _e( 'Additional Fields' ); ?></h3>
		<?php
		foreach ( $checkout->checkout_fields['ecommerce_extra_fields'] as $key => $field ) : ?>
			<?php woocommerce_form_field( $key, $field, $checkout->get_value( $key ) ); ?>
		<?php endforeach; ?>
    </div>
<?php }

add_action( 'woocommerce_checkout_after_customer_details', 'ecommerce_extra_checkout_fields' );

function ecommerce_save_extra_checkout_fields( $order_id, $posted ) {
	// don't forget appropriate sanitization if you are using a different field type
	if ( isset( $posted['preferred_delivery_date'] ) ) {
		update_post_meta( $order_id, '_preferred_delivery_date', sanitize_text_field( $posted['preferred_delivery_date'] ) );
	}
}

add_action( 'woocommerce_checkout_update_order_meta', 'ecommerce_save_extra_checkout_fields', 10, 2 );

function ecommerce_display_order_data( $order_id ) { ?>
    <h2><?php _e( 'Extra Information' ); ?></h2>
    <table class="shop_table shop_table_responsive additional_info">
        <tbody>
        <tr>
            <th><?php _e( 'Preferred Delivery Date:' ); ?></th>
            <td><?php echo get_post_meta( $order_id, '_preferred_delivery_date', true ); ?></td>
        </tr>
        </tbody>
    </table>
<?php }

add_action( 'woocommerce_thankyou', 'ecommerce_display_order_data', 20 );
add_action( 'woocommerce_view_order', 'ecommerce_display_order_data', 20 );

function ecommerce_display_order_data_in_admin( $order ) { ?>
    <div class="order_data_column">
        <h4><?php _e( 'Additional Information', 'woocommerce' ); ?><a href="#"
                                                                      class="edit_address"><?php _e( 'Edit', 'woocommerce' ); ?></a>
        </h4>
        <div class="address">
			<?php
			echo '<p><strong>' . __( 'Preferred Delivery Date' ) . ':</strong>' . get_post_meta( $order->get_id(), '_preferred_delivery_date', true ) . '</p>'; ?>
        </div>
        <div class="edit_address">
			<?php woocommerce_wp_text_input( array(
				'id'            => '_preferred_delivery_date',
				'label'         => __( 'Some field' ),
				'wrapper_class' => '_billing_company_field'
			) ); ?>
        </div>
    </div>
<?php }

add_action( 'woocommerce_admin_order_data_after_order_details', 'ecommerce_display_order_data_in_admin' );

function ecommerce_save_extra_details( $post_id, $post ) {
	update_post_meta( $post_id, '_preferred_delivery_date', wc_clean( $_POST['_preferred_delivery_date'] ) );
}

add_action( 'woocommerce_process_shop_order_meta', 'ecommerce_save_extra_details', 45, 2 );

function ecommerce_email_order_meta_fields( $fields, $sent_to_admin, $order ) {
	$fields['delivery_date'] = array(
		'label' => __( 'Preferred Delivery Date' ),
		'value' => get_post_meta( $order->id, '_preferred_delivery_date', true ),
	);

	return $fields;
}

add_filter( 'woocommerce_email_order_meta_fields', 'ecommerce_email_order_meta_fields', 10, 3 );


/**
 * update default woocommerce address fields
 *
 * @param $fields
 *
 * @return mixed
 */
function ecommerce_default_address_fields( $fields ) {

	unset( $fields['last_name'] );
	unset( $fields['address_2'] );
	unset( $fields['company'] );
	unset( $fields['country'] );
	unset( $fields['address_2'] );
	unset( $fields['city'] );
	unset( $fields['state'] );
	unset( $fields['postcode'] );

	$fields['first_name']['label'] = 'Full Name';
	$fields['first_name']['class'] = [ 'form-row-wide' ];

	$fields['address_1']['label']       = 'Address';
	$fields['address_1']['placeholder'] = 'Address';
	$fields['address_1']['type']        = 'textarea';
	$fields['address_1']['required']    = false;

	return $fields;
}

add_filter( 'woocommerce_default_address_fields', 'ecommerce_default_address_fields', 20, 1 );

//remove additional information field from checkout page
add_filter( 'woocommerce_enable_order_notes_field', '__return_false', 9999 );

//Remove "(optional)" from our non required fields
add_filter( 'woocommerce_form_field', 'remove_checkout_optional_fields_label', 10, 4 );
function remove_checkout_optional_fields_label( $field, $key, $args, $value ) {
	// Only on checkout page
	if ( is_checkout() && ! is_wc_endpoint_url() ) {
		$optional = '&nbsp;<span class="optional">(' . 'optional' . ')</span>';
		$field    = str_replace( $optional, '', $field );
	}

	return $field;
}