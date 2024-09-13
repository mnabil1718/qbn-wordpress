<?php
/**
 * Title: Brandy Single Featured Product
 * Slug: brandy/single-featured-product
 * Categories: woocommerce, brandy
 * Viewport width: 700
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

 $products = \wc_get_products(
	array(
	'post_type' => 'product',
	'posts_per_page' => 1,
	'orderby' => 'rand',
	)
);

if ( count( $products ) < 1 ) {
	return;
}

$product = $products[0];
$product_id = $product->get_id();

?>

<!-- wp:woocommerce/single-product {"productId":<?php echo esc_html( $product_id ); ?>,"align":"wide"} -->
<div class="wp-block-woocommerce-single-product alignwide">
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"var:preset|spacing|50","left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns"><!-- wp:column {"width":"57%"} -->
		<div class="wp-block-column" style="flex-basis:57%">
			<!-- wp:woocommerce/product-image {"isDescendentOfSingleProductBlock":true,"height":"600px","style":{"border":{"radius":"7px"}}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:post-terms {"term":"product_cat","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","fontSize":"small","fontFamily":"prata"} /-->

			<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"top":"3px"}}},"fontSize":"2xl","fontFamily":"outfit","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

			<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductBlock":true,"textColor":"brandy-accent","style":{"spacing":{"margin":{"top":"3px"}},"typography":{"fontSize":"24px","fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"}}}}} /-->

			<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductBlock":true} /-->

			<!-- wp:woocommerce/add-to-cart-form {"isDescendentOfSingleProductBlock":true} /-->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:woocommerce/single-product -->