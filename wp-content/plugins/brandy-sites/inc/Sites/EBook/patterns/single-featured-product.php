<?php
/**
 * Title: Brandy Single Featured Product
 * Slug: brandy/single-featured-product
 * Categories: woocommerce, brandy, ebook
 * Viewport width: 1400
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

$products = \wc_get_products([
	'limit' => 1
]);
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"0","margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<?php 
	if ( empty( $products ) ) {
		echo __( 'There is no product', 'brandy' );
	} else  {
	?>
	<!-- wp:woocommerce/single-product {"productId":<?php echo $products[0]->get_id(); ?>,"align":"wide"} -->
	<div class="wp-block-woocommerce-single-product alignwide">
		<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"}}}} -->
		<div class="wp-block-columns">
			<!-- wp:column {"style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
			<div class="wp-block-column" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfSingleProductBlock":true,"style":{"border":{"radius":"16px"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center">
				<!-- wp:group {"style":{"border":{"radius":{"topRight":"26px","bottomRight":"26px"}},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|50","right":"var:preset|spacing|50"},"margin":{"top":"0","bottom":"0"},"blockGap":"0"},"color":{"background":"#f6f4ed"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-background"
					style="border-top-right-radius:26px;border-bottom-right-radius:26px;background-color:#f6f4ed;margin-top:0;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--50)">
					<!-- wp:group {"style":{"spacing":{"blockGap":"4px"}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group">
						<!-- wp:post-terms {"term":"product_cat","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"typography":{"textTransform":"uppercase","letterSpacing":"1px"},"spacing":{"margin":{"left":"0","right":"0"},"padding":{"right":"0","left":"0"}}},"textColor":"brandy-secondary-text","fontSize":"extra_small"} /-->

						<!-- wp:post-title {"isLink":true,"style":{"spacing":{"margin":{"left":"0","right":"0"}}},"fontSize":"4xl","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

						<!-- wp:woocommerce/product-rating {"isDescendentOfSingleProductBlock":true,"fontSize":"small","style":{"spacing":{"margin":{"left":"0","right":"0"}}}} /-->

						<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductBlock":true,"fontFamily":"alice","style":{"spacing":{"margin":{"top":"10px"}},"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"24px"}}} /-->
					</div>
					<!-- /wp:group -->

					<!-- wp:post-excerpt {"excerptLength":100,"style":{"spacing":{"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}},"__woocommerceNamespace":"woocommerce/product-query/product-summary"} /-->

					<!-- wp:woocommerce/add-to-cart-form {"isDescendentOfSingleProductBlock":true} /-->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
	<!-- /wp:woocommerce/single-product -->
	<?php } ?>
</div>
<!-- /wp:group -->