<?php
/**
* @snippet       Merge Two "My Account" Tabs @ WooCommerce Account
* @how-to        Get CustomizeWoo.com FREE
* @source        https://businessbloomer.com/?p=73601
* @author        Rodolfo Melogli
* @compatible    Woo 3.5.3
* @donate $9     https://businessbloomer.com/bloomer-armada/
*/

// -------------------------------
// 1. First, hide the tab that needs to be merged/moved (edit-address in this case)

add_filter( 'woocommerce_account_menu_items', 'bbloomer_remove_address_my_account', 999 );

function bbloomer_remove_address_my_account( $items ) {
unset($items['edit-address']);
return $items;
}

// -------------------------------
// 2. Second, print the ex tab content into an existing tab (edit-account in this case)

add_action( 'woocommerce_account_edit-account_endpoint', 'woocommerce_account_edit_address' );

add_action( 'profile_update', 'sync_woocommerce_email', 10, 2 );

function sync_woocommerce_email( $user_id, $old_user_data ) {
	$current_user = wp_get_current_user();

	if ( $current_user->user_email != $old_user_data->user_email ) {
		wp_update_user( [
			'ID'            => $current_user->ID,
			'billing_email' => $current_user->user_email
		] );
	}

	if ( $current_user->user_firstname != $old_user_data->user_firstname ) {
		wp_update_user( [
			'ID'                 => $current_user->ID,
			'billing_first_name' => $current_user->user_firstname
		] );
	}
}

//add first_name field as full name to registration form
function revivalpoint_extra_register_fields() { ?>
    <div class="col-lg-12">
        <div class="form-group">
            <label for="reg_billing_first_name"><?php _e( 'Full Name', 'woocommerce' ); ?> <span
                        class="required">*</span></label>
            <input type="text" class="form-control" name="billing_first_name" id="reg_billing_first_name"
                   value="<?php if ( ! empty( $_POST['billing_first_name'] ) ) {
				       esc_attr_e( $_POST['billing_first_name'] );
			       } ?>" required/>
        </div>
    </div>
    <div class="clear"></div>
	<?php
}

add_action( 'woocommerce_register_form_start', 'revivalpoint_extra_register_fields' );

//save additional registration form fields
function revivalpoint_save_extra_register_fields( $customer_id ) {
	if ( isset( $_POST['billing_first_name'] ) ) {
		//First name field which is by default
		update_user_meta( $customer_id, 'first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
		// First name field which is used in WooCommerce
		update_user_meta( $customer_id, 'billing_first_name', sanitize_text_field( $_POST['billing_first_name'] ) );
	}
}

add_action( 'woocommerce_created_customer', 'revivalpoint_save_extra_register_fields' );

//save edit-account form additional fields
add_action( 'woocommerce_save_account_details', 'revivalpoint_save_account_details' );
function revivalpoint_save_account_details( $user_id ) {

	if ( isset( $_POST['billing_phone'] ) ) {
		update_user_meta( $user_id, 'billing_phone', sanitize_text_field( $_POST['billing_phone'] ) );
	}
	if ( isset( $_POST['billing_address_1'] ) ) {
		update_user_meta( $user_id, 'billing_address_1', sanitize_text_field( $_POST['billing_address_1'] ) );
	}
	if ( isset( $_POST['billing_country'] ) ) {
		update_user_meta( $user_id, 'billing_country', sanitize_text_field( $_POST['billing_country'] ) );
	}
//	if ( isset( $_POST['billing_company'] ) ) {
//		update_user_meta( $user_id, 'billing_company', sanitize_text_field( $_POST['billing_company'] ) );
//	}

//	if ( isset( $_POST['billing_company_email'] ) ) {
//		update_user_meta( $user_id, 'billing_company_email', sanitize_text_field( $_POST['billing_company_email'] ) );
//	}

}


