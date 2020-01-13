<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

do_action( 'woocommerce_before_customer_login_form' ); ?>

<section id="b-my_account">
    <div class="container b-my_account">
		<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>

        <div class="u-columns col2-set row" id="customer_login">

            <div class="u-column1 col-1 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
				<?php endif; ?>
                <div class="b-auth_section b-auth_login">

                    <h2><i class="icon-login icons"></i> <?php esc_html_e( 'Login', 'woocommerce' ); ?></h2>

                    <form class="woocommerce-form woocommerce-form-login login" method="post">

						<?php do_action( 'woocommerce_login_form_start' ); ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="username"><?php esc_html_e( 'Username or email address', 'woocommerce' ); ?>
                                &nbsp;<span class="required">*</span></label>
                            <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                   name="username"
                                   id="username" autocomplete="username"
                                   value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                        </p>
                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
                                        class="required">*</span></label>
                            <input class="woocommerce-Input woocommerce-Input--text input-text" type="password"
                                   name="password" id="password" autocomplete="current-password"/>
                        </p>

						<?php do_action( 'woocommerce_login_form' ); ?>

                        <p class="form-row">
                            <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                       name="rememberme"
                                       type="checkbox" id="rememberme" value="forever"/>
                                <span><?php esc_html_e( 'Remember me', 'woocommerce' ); ?></span>
                            </label>
							<?php wp_nonce_field( 'woocommerce-login', 'woocommerce-login-nonce' ); ?>
                            <button type="submit" class="woocommerce-button button woocommerce-form-login__submit"
                                    name="login"
                                    value="<?php esc_attr_e( 'Log in', 'woocommerce' ); ?>"><?php esc_html_e( 'Log in', 'woocommerce' ); ?></button>
                        </p>
                        <p class="woocommerce-LostPassword lost_password">
                            <a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php esc_html_e( 'Lost your password?', 'woocommerce' ); ?></a>
                        </p>

						<?php do_action( 'woocommerce_login_form_end' ); ?>

                    </form>
                </div>
				<?php if ( 'yes' === get_option( 'woocommerce_enable_myaccount_registration' ) ) : ?>


                <div class="b-auth_section b-auth_register" style="display: none;">
                    <h2><i class="icon-user icons"></i> <?php esc_html_e( 'Register', 'woocommerce' ); ?></h2>

                    <form method="post"
                          class="woocommerce-form woocommerce-form-register register" <?php do_action( 'woocommerce_register_form_tag' ); ?> >

						<?php do_action( 'woocommerce_register_form_start' ); ?>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_username"><?php esc_html_e( 'Username', 'woocommerce' ); ?>&nbsp;<span
                                            class="required">*</span></label>
                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text"
                                       name="username" id="reg_username" autocomplete="username"
                                       value="<?php echo ( ! empty( $_POST['username'] ) ) ? esc_attr( wp_unslash( $_POST['username'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                            </p>

						<?php endif; ?>

                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                            <label for="reg_email"><?php esc_html_e( 'Email address', 'woocommerce' ); ?>&nbsp;<span
                                        class="required">*</span></label>
                            <input type="email" class="woocommerce-Input woocommerce-Input--text input-text"
                                   name="email"
                                   id="reg_email" autocomplete="email"
                                   value="<?php echo ( ! empty( $_POST['email'] ) ) ? esc_attr( wp_unslash( $_POST['email'] ) ) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                        </p>

						<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                <label for="reg_password"><?php esc_html_e( 'Password', 'woocommerce' ); ?>&nbsp;<span
                                            class="required">*</span></label>
                                <input type="password" class="woocommerce-Input woocommerce-Input--text input-text"
                                       name="password" id="reg_password" autocomplete="new-password"/>
                            </p>

						<?php else : ?>

                            <p><?php esc_html_e( 'A password will be sent to your email address.', 'woocommerce' ); ?></p>

						<?php endif; ?>

						<?php do_action( 'woocommerce_register_form' ); ?>

                        <p class="woocommerce-FormRow form-row">
							<?php wp_nonce_field( 'woocommerce-register', 'woocommerce-register-nonce' ); ?>
                            <button type="submit"
                                    class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                                    name="register"
                                    value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>"><?php esc_html_e( 'Register', 'woocommerce' ); ?></button>
                        </p>

						<?php do_action( 'woocommerce_register_form_end' ); ?>

                    </form>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="b-auth_text text-center b-auth_text_register">
                    <h3>Register</h3>
                    <p>Registering for this site allows you to access your order status and history. Just fill in the
                        fields
                        below, and we’ll get a new account set up for you in no time. We will only ask you for
                        information
                        necessary to make the purchase process faster and easier.</p>
                    <a href="javascript:;" class="btn" id="b-register_but">Register</a>
                </div>
                <div class="b-auth_text text-center b-auth_text_login" style="display: none;">
                    <h3>Login</h3>
                    <p>Registering for this site allows you to access your order status and history. Just fill in the
                        fields
                        below, and we’ll get a new account set up for you in no time. We will only ask you for
                        information
                        necessary to make the purchase process faster and easier.
                    </p>
                    <p>If you are already registered, click below to login.</p>
                    <a href="javascript:;" class="btn" id="b-login_but">Login</a>
                </div>
            </div>
        </div>

    </div>
</section>

<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
