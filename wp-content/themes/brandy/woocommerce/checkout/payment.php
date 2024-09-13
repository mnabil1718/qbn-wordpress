<?php
/**
 * Checkout Payment Section
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/checkout/payment.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.1.0
 */

defined( 'ABSPATH' ) || exit;

if ( ! wp_doing_ajax() ) {
	/**
	 * WooCommerce hook: woocommerce_review_order_before_payment.
	 */
	do_action( 'woocommerce_review_order_before_payment' );
}

$has_shipping = true;

if ( ! WC()->cart->needs_shipping() || ! WC()->cart->show_shipping() ) {
	$has_shipping = false;
}

if ( ! $has_shipping ) {
	$packages = WC()->shipping()->get_packages();

	if ( empty( $packages ) ) {
		$has_shipping = false;
	}
}

?>
<div id="payment" class="woocommerce-checkout-payment">
	<?php if ( WC()->cart->needs_payment() ) : ?>
		<ul class="wc_payment_methods payment_methods methods">
			<?php
			if ( ! empty( $available_gateways ) ) {
				foreach ( $available_gateways as $gateway ) {
					wc_get_template( 'checkout/payment-method.php', array( 'gateway' => $gateway ) );
				}
			} else {
				echo '<li>';
				wc_print_notice( apply_filters( 'woocommerce_no_available_payment_methods_message', WC()->customer->get_billing_country() ? esc_html__( 'Sorry, it seems that there are no available payment methods. Please contact us if you require assistance or wish to make alternate arrangements.', 'brandy' ) : esc_html__( 'Please fill in your details above to see available payment methods.', 'brandy' ) ), 'notice' ); // phpcs:ignore WooCommerce.Commenting.CommentHooks.MissingHookComment
				echo '</li>';
			}
			?>
		</ul>
	<?php endif; ?>
	<div class="brandy-checkout-submit-section">
		<?php
		/**
		 * WooCommerce hook: woocommerce_checkout_additional_fields.
		 */
		do_action( 'woocommerce_checkout_additional_fields' );
		?>

		<noscript>
			<?php
			/* translators: $1 and $2 opening and closing emphasis tags respectively */
			printf( esc_html__( 'Since your browser does not support JavaScript, or it is disabled, please ensure you click the %1$sUpdate Totals%2$s button before placing your order. You may be charged more than the amount stated above if you fail to do so.', 'brandy' ), '<em>', '</em>' );
			?>
			<br/><button type="submit" title="Update totals" class="button alt<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="woocommerce_checkout_update_totals" value="<?php esc_attr_e( 'Update totals', 'brandy' ); ?>"><?php esc_html_e( 'Update totals', 'brandy' ); ?></button>
		</noscript>

		<?php wc_get_template( 'checkout/terms.php' ); ?>

		<?php
			/**
			 * WooCommerce hook: woocommerce_review_order_before_submit.
			 */
			do_action( 'woocommerce_review_order_before_submit' );
		?>

		<?php echo apply_filters( 'woocommerce_order_button_html', '<button title="Order submit" type="submit" class="brandy-btn button brandy-checkout-submit-btn' . esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ) . '" name="woocommerce_checkout_place_order" id="place_order" value="' . esc_attr( $order_button_text ) . '" data-value="' . esc_attr( $order_button_text ) . '" title="' . esc_attr( $order_button_text ) . '" >' . esc_html( $order_button_text ) . '</button>' ); // @codingStandardsIgnoreLine ?>

		<?php
		/**
		 * WooCommerce hook: woocommerce_review_order_after_submit.
		 */
		do_action( 'woocommerce_review_order_after_submit' );
		?>

		<?php wp_nonce_field( 'woocommerce-process_checkout', 'woocommerce-process-checkout-nonce' ); ?>
	</div>
</div>

<?php
if ( ! wp_doing_ajax() ) {
	/**
	 * WooCommerce hook: woocommerce_review_order_after_payment.
	 */
	do_action( 'woocommerce_review_order_after_payment' );
}
