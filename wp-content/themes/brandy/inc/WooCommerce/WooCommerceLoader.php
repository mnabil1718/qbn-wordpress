<?php

if ( ! is_wc_installed() ) {
	return;
}

if ( ! function_exists( 'brandy_get_wc_template' ) ) {
	function brandy_get_wc_template( $file_path ) {
		get_template_part( 'inc/WooCommerce/templates/' . $file_path );
	}
}


require_once BRANDY_TEMPLATE_DIR . '/inc/WooCommerce/ProductLoop.php';
require_once BRANDY_TEMPLATE_DIR . '/inc/WooCommerce/SingleProduct.php';
require_once BRANDY_TEMPLATE_DIR . '/inc/WooCommerce/Cart.php';
require_once BRANDY_TEMPLATE_DIR . '/inc/WooCommerce/Checkout.php';

add_action(
	'admin_print_styles',
	function() {
		remove_action( 'admin_notices', array( 'WC_Admin_Notices', 'template_file_check_notice' ) );
	},
	1000
);

/**
 * Trick to remove some WooCommerce styling
 */
add_filter(
	'woocommerce_enqueue_styles',
	function( $styles ) {
		unset( $styles['woocommerce-layout'] );
		unset( $styles['woocommerce-blocktheme'] );
		unset( $styles['woocommerce-smallscreen'] );
		unset( $styles['woocommerce-general'] );
		return $styles;
	}
);

/**
 * Temp trick for make global product button styles to sync with frontend
 */
add_filter(
	'woocommerce_loop_add_to_cart_args',
	function( $args ) {
		$args['class'] .= ' wp-block-woocommerce-product-button';
		return $args;
	}
);

/** Trick override woocommerce block styling */
add_action(
	'wp_enqueue_scripts',
	function() {
		wp_enqueue_script( 'wc-add-to-cart' );

		$override_styles = array( 'all-products', 'cart', 'product-button' );
		foreach ( $override_styles as $handle ) {
			wp_dequeue_style( 'wc-blocks-style-' . $handle );
			if ( is_rtl() ) {
				wp_dequeue_style( 'wc-blocks-style-' . $handle, '-rtl' );
			}
		}
	},
	PHP_INT_MAX
);

add_action(
	'enqueue_block_assets',
	function() {
		$override_styles = array( 'all-products', 'cart', 'product-button' );
		foreach ( $override_styles as $handle ) {
			wp_dequeue_style( 'wc-blocks-style-' . $handle );
			if ( is_rtl() ) {
				wp_dequeue_style( 'wc-blocks-style-' . $handle, '-rtl' );
			}
		}
	},
	PHP_INT_MAX
);

add_action(
	'after_setup_theme',
	function() {
		$override_styles = array( 'all-products', 'cart', 'product-button' );
		foreach ( $override_styles as $handle ) {
			\wp_enqueue_block_style(
				'woocommerce/' . $handle,
				array(
					'handle' => 'wc-blocks-style-' . $handle . '-new',
					'src'    => BRANDY_TEMPLATE_URL . '/assets/override-css/' . $handle . '.css',
					'ver'    => time(),
				)
			);
			if ( is_rtl() ) {
				$handle .= '-rtl';
				\wp_enqueue_block_style(
					'woocommerce/' . $handle,
					array(
						'handle' => 'wc-blocks-style-' . $handle . '-new',
						'src'    => BRANDY_TEMPLATE_URL . '/assets/override-css/' . $handle . '.css',
						'ver'    => time(),
					)
				);
			}
		}
	},
	PHP_INT_MAX
);
