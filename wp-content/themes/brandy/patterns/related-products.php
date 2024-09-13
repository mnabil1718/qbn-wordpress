<?php
/**
 * Title: Brandy related products
 * Slug: brandy/related-products
 * Categories: brandy
 * Viewport width: 1400
 */
?>

<!-- wp:woocommerce/related-products {"align":"wide"} -->
<div class="wp-block-woocommerce-related-products alignwide">
	<!-- wp:query {"queryId":8,"query":{"perPage":4,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"woocommerce/related-products","lock":{"remove":true,"move":true}} -->
	<div class="wp-block-query">
		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"1rem"}}}} -->
		<h2 class="wp-block-heading has-text-align-center"
			style="margin-top:var(--wp--preset--spacing--60);margin-bottom:1rem"><?php echo esc_html__( 'Related products', 'brandy' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"className":"products-block-post-template brandy-site-product-template","layout":{"type":"grid","columnCount":4},"__woocommerceNamespace":"woocommerce/product-query/product-template"} -->
		<?php
		$query_product_layout = apply_filters( 'brandy_sites_query_product_layout', BRANDY_TEMPLATE_DIR . '/template-parts/query-product-layout.php' );
		if ( file_exists( $query_product_layout ) ) {
			require $query_product_layout;
		}
		?>
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:woocommerce/related-products -->
