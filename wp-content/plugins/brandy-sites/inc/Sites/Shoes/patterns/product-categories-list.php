<?php
/**
 * Title: Brandy Product Categories List
 * Slug: brandy/product-categories-list
 * Categories: woocommerce, brandy
 * Viewport width: 1000
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:woocommerce/product-categories {"align":"wide","hasImage":true,"isHierarchical":false,"className":"brandy-product-categories-list"} /-->
