<?php
/**
 * Title: Brandy product collection no pagination
 * Slug: brandy/product-collection-no-pagination
 * Categories: brandy
 * Viewport width: 1400
 */
?>


<!-- wp:woocommerce/product-collection {"queryId":8,"query":{"perPage":12,"pages":0,"offset":0,"postType":"product","order":"asc","orderBy":"title","search":"","exclude":[],"inherit":false,"taxQuery":{},"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[]},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"queryContextIncludes":["collection"],"align":"wide"} -->
<div class="wp-block-woocommerce-product-collection alignwide">
	<!-- wp:woocommerce/product-template {"className":"products-block-post-template brandy-site-product-template","layout":{"type":"default"}} -->
	<?php
	$query_product_layout = apply_filters( 'brandy_sites_query_product_layout', BRANDY_TEMPLATE_DIR . '/template-parts/query-product-layout.php' );
	if ( file_exists( $query_product_layout ) ) {
		require $query_product_layout;
	}
	?>
	<!-- /wp:woocommerce/product-template -->

	<!-- wp:woocommerce/product-collection-no-results -->
	<!-- wp:group {"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","flexWrap":"wrap"}} -->
	<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"medium"} -->
		<p class="has-medium-font-size"><strong><?php echo esc_html__( 'No results found', 'brandy' ); ?></strong></p>
		<!-- /wp:paragraph -->

		<!-- wp:paragraph -->
		<p>
		<?php
		printf(
			esc_html__( 'You can try %1$sclearing any filters%2$s or head to our %3$sstore\'s home%4$s', 'brandy' ),
			'<a class="wc-link-clear-any-filters" href="#">',
			'</a>',
			'<a class="wc-link-stores-home" href="#">',
			'</a>'
		);
		?>
		</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
	<!-- /wp:woocommerce/product-collection-no-results -->
</div>
<!-- /wp:woocommerce/product-collection -->
