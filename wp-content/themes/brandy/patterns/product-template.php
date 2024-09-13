<?php
/**
 * Title: Brandy product template
 * Slug: brandy/product-template
 * Categories: brandy
 * Viewport width: 1000
 */
?>

<!-- wp:woocommerce/product-template {"className":"products-block-post-template brandy-site-product-template","layout":{"type":"default"}} -->

<?php
$query_product_layout = apply_filters( 'brandy_sites_query_product_layout', BRANDY_TEMPLATE_DIR . '/template-parts/query-product-layout.php' );
if ( file_exists( $query_product_layout ) ) {
	require $query_product_layout;
}
?>

<!-- /wp:woocommerce/product-template -->
