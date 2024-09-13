<?php
/**
 * Register theme WC functions
 *
 * @package Brandy\Functions
 */

use Brandy\Core\Services\LayoutService;
use Brandy\Core\Services\ProductCatalogService;

if ( ! function_exists( 'brandy_get_wc_add_to_cart_class' ) ) {
	function brandy_get_wc_add_to_cart_class( $external_class = '' ) {
		if ( ! is_wc_installed() ) {
			return '';
		}
		return 'ajax_add_to_cart add_to_cart_button' . ( ! empty( $external_class ) ? " $external_class" : '' );
	}
}

if ( ! function_exists( 'brandy_get_wc_add_to_cart_button' ) ) {
	function brandy_get_wc_add_to_cart_button( $product, $args = array() ) {

		if ( ! is_wc_installed() ) {
			return;
		}

		if ( empty( $product ) ) {
			return;
		}

		$tag = isset( $args['tag'] ) ? $args['tag'] : 'button';

		if ( ! is_product() && in_array( $product->get_type(), array( 'variable', 'grouped' ), true ) ) {
			$tag = 'a';
		}

		$is_ajax = isset( $args['is_ajax'] ) ? $args['is_ajax'] : false;

		$default_classes = isset( $args['class'] ) ? explode( ' ', $args['class'] ) : array();

		$target_classes = array(
			esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ?? '' ),
			'add_to_cart_button',
			'product_type_' . $product->get_type(),
			$is_ajax && $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
		);

		$final_class = implode( ' ', array_unique( array_merge( $default_classes, $target_classes ) ) );

		$default_attributes = array_merge(
			array(
				'data-product_id'  => $product->get_id(),
				'data-product_sku' => $product->get_sku(),
				'aria-label'       => $product->add_to_cart_description(),
				'aria-describedby' => $product->add_to_cart_aria_describedby(),
				'rel'              => 'nofollow',
			),
			'a' === $tag ? array(
				'href' => $product->add_to_cart_url(),
			) : array(),
			( 'button' === $tag && ! $is_ajax ) ? array(
				'type' => 'submit',
			) : array()
		);

		$button_settings = array(
			'quantity'   => isset( $args['quantity'] ) ? $args['quantity'] : 1,
			'class'      => $final_class,
			'attributes' => isset( $args['attributes'] ) ? array_merge( $default_attributes, $args['attributes'] ) : $default_attributes,
		);

		return sprintf(
			'<%1$s data-quantity="%2$s" class="%3$s" %4$s>%6$s<span class="add_to_cart_button__text">%5$s</span></%1s>',
			esc_attr( $tag ),
			esc_attr( $button_settings['quantity'] ),
			esc_attr( $button_settings['class'] ),
			\wc_implode_html_attributes( $button_settings['attributes'] ),
			! empty( $args['text'] ) ? esc_html( $args['text'] ) : esc_html( $product->add_to_cart_text() ),
			isset( $args['icon'] ) ? $args['icon'] : ''
		);
	}
}

if ( ! function_exists( 'brandy_wc_loop_product_item' ) ) {
	function brandy_wc_loop_product_item() {
		$product_layout = ProductCatalogService::get_product_layout();
		$layout         = LayoutService::get_layout( 'loop-product-item' );
		if ( ! isset( $layout ) ) {
			return;
		}
		$path = $layout[ $product_layout ];
		if ( ! isset( $path ) || ! file_exists( $path ) ) {
			return;
		}

		require $path;

	}
}

if ( ! function_exists( 'brandy_loop_product_item' ) ) {
	function brandy_loop_product_item( $product, $display_settings = array() ) {
		$product_layout = ProductCatalogService::get_product_layout();
		$layout         = LayoutService::get_layout( 'block-loop-product-item' );
		if ( ! isset( $layout ) ) {
			return;
		}
		$path = $layout[ $product_layout ];
		if ( ! isset( $path ) || ! file_exists( $path ) ) {
			return;
		}

		require $path;

	}
}

if ( ! function_exists( 'brandy_wc_loop_product_item_attributes' ) ) {
	function brandy_wc_loop_product_item_attributes( $product = null ) {
		if ( ! is_wc_installed() ) {
			return;
		}
		$attributes = array(
			'class'       => implode( ' ', \wc_get_product_class( brandy_wc_get_loop_product_item_class_prefix(), $product ) ),
			'data-layout' => esc_attr( ProductCatalogService::get_product_layout() ),
		);

		brandy_print_dom_attributes( $attributes );
	}
}

if ( ! function_exists( 'brandy_wc_get_loop_product_item_class_prefix' ) ) {
	function brandy_wc_get_loop_product_item_class_prefix() {
		return 'brandy-loop-product';
	}
}



