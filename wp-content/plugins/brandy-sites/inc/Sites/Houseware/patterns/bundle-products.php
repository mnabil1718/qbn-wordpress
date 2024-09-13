<?php
/**
 * Title: Brandy Bundle Products
 * Slug: brandy/bundle-products
 * Categories: brandy, woocommerce, products
 * Viewport width: 1400
 */

if ( ! \is_wc_installed() ) {
	\brandy_get_template_part( 'template-parts/install-wc-notice' );
	return;
}

?>

<?php
	$products = \wc_get_products(
		[
			'limit' => 3,
			'type' => ['simple']
		]
	);
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"},"blockGap":"0"}},"layout":{"type":"constrained"}} -->
	<div class="wp-block-group" style="margin-bottom:var(--wp--preset--spacing--40)">
		<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text"} -->
		<h2 class="wp-block-heading has-text-align-center has-brandy-primary-text-color has-text-color has-link-color">
			Bundle &amp; Save</h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} -->
		<p class="has-text-align-center has-brandy-secondary-text-color has-text-color has-link-color">You will get
			great prices when you buy our economic combos.</p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:columns {"align":"wide"} -->
	<div class="wp-block-columns alignwide">
		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|40"}},"layout":{"type":"grid","columnCount":1,"minimumColumnWidth":null}} -->
			<div class="wp-block-group">
				<?php foreach ($products as $product) : ?>
				<!-- wp:woocommerce/single-product {"productId":<?php echo $product->get_id(); ?>} -->
				<div class="wp-block-woocommerce-single-product">
					<!-- wp:columns {"verticalAlignment":null} -->
					<div class="wp-block-columns"><!-- wp:column {"width":"150px"} -->
						<div class="wp-block-column" style="flex-basis:150px">
							<!-- wp:group {"style":{"border":{"radius":"18px"}},"backgroundColor":"brandy-theme-secondary-background","layout":{"type":"constrained","wideSize":""}} -->
							<div class="wp-block-group has-brandy-theme-secondary-background-background-color has-background"
								style="border-radius:18px">
								<!-- wp:woocommerce/product-image {"showSaleBadge":false,"isDescendentOfSingleProductBlock":true,"width":"150px","height":"200px","style":{"border":{"radius":"18px"}}} /-->
							</div>
							<!-- /wp:group -->
						</div>
						<!-- /wp:column -->

						<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}},"layout":{"type":"default"}} -->
						<div class="wp-block-column is-vertically-aligned-center">
							<!-- wp:post-title {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"6px"}}},"fontSize":"base","__woocommerceNamespace":"woocommerce/product-query/product-title"} /-->

							<!-- wp:woocommerce/product-price {"isDescendentOfSingleProductBlock":true,"style":{"typography":{"fontSize":"1.25rem","fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"bottom":"1.5rem"}}}} /-->

							<!-- wp:woocommerce/add-to-cart-form {"isDescendentOfSingleProductBlock":true} /-->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->
				</div>
				<!-- /wp:woocommerce/single-product -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"border":{"radius":"18px"}},"backgroundColor":"brandy-theme-secondary-background","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-brandy-theme-secondary-background-background-color has-background"
				style="border-radius:18px"><!-- wp:image {"width":"auto","height":"700px","sizeSlug":"large"} -->
				<figure class="wp-block-image size-large is-resized"><img
						src="http://img.wpbrandy.com/uploads/bundle-image.png" alt="" style="width:auto;height:700px" />
				</figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->