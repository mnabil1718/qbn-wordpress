<?php
/**
 * Title: Brandy replated product template
 * Slug: brandy/replated-product-template
 * Categories: brandy
 * Viewport width: 1000
 */
?>

<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"className":"products-block-post-template brandy-site-product-template","layout":{"type":"grid","columnCount":4},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->

<?php
$query_product_layout = apply_filters( 'brandy_sites_query_product_layout', BRANDY_TEMPLATE_DIR . '/template-parts/query-product-layout.php' );
if ( file_exists( $query_product_layout ) ) {
	require $query_product_layout;
}
?>

<!-- /wp:post-template -->
