<?php
/**
 * Shop breadcrumb
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/breadcrumb.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! empty( $breadcrumb ) ) {

	echo $wrap_before; //PHPCS: XSS ok.

	echo '<div class="brandy-breadcrumb-container">';

	foreach ( $breadcrumb as $key => $crumb ) {

		echo $before; //PHPCS: XSS ok.

		if ( ! empty( $crumb[1] ) && count( $breadcrumb ) !== $key + 1 ) {
			echo '<span class="brandy-breadcrumb-item brandy-breadcrumb-item-link"><a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a></span>';
		} else {
			echo '<span class="brandy-breadcrumb-item brandy-breadcrumb-item-active">' . esc_html( $crumb[0] ) . '</span>';
		}

		echo $after; //PHPCS: XSS ok.

		if ( count( $breadcrumb ) !== $key + 1 ) {
			echo '<span class="brandy-breadcrumb-separator">' . $delimiter . '</span>'; //PHPCS: XSS ok.
		}
	}

	echo '</div>';

	echo $wrap_after; //PHPCS: XSS ok.

}
