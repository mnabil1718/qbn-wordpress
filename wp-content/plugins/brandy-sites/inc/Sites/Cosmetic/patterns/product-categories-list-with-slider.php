<?php
/**
 * Title: Brandy Product Categories List with Slider
 * Slug: brandy/product-categories-list-with-slider
 * Categories: woocommerce, brandy
 * Viewport width: 1000
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:woocommerce/product-categories {"align":"wide","hasCount":false,"hasImage":true,"isHierarchical":false,"className":"has-slider"} /-->
