<?php
/**
 * Title: Brandy Product Flash Sale
 * Slug: brandy/product-flash-sale
 * Categories: woocommerce, brandy, products
 * Viewport width: 1400
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

$products = wc_get_products([
	'limit' => 2
]);

?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--50);margin-bottom:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"verticalAlignment":null,"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|20"}}}} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:group {"layout":{"type":"constrained","contentSize":"300px"}} -->
			<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
				<h2 class="wp-block-heading has-text-align-center"><?php echo esc_html__('Sale Upto 20% OFF Of This Week', 'brandy'); ?></h2>
				<!-- /wp:heading -->
			</div>
			<!-- /wp:group -->

			<?php if ( empty( $products ) ) : ?>
				<!-- wp:paragraph -->
				<p><?php echo esc_html__('There is no sale product at the moment', 'brandy'); ?></p>
				<!-- /wp:paragraph -->
			<?php else: ?>
			<!-- wp:columns {"style":{"spacing":{"blockGap":{"left":"var:preset|spacing|10"}}}} -->
			<div class="wp-block-columns">
				<?php foreach ($products as $item) : ?>
					<!-- wp:column -->
					<div class="wp-block-column">
						<!-- wp:group {"style":{"color":{"background":"#f9fbfd"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}}},"layout":{"type":"constrained"}} -->
						<div class="wp-block-group has-background"
							style="border-radius:20px;background-color:#f9fbfd;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)">
							<!-- wp:woocommerce/single-product {"productId":<?php echo esc_attr( $item->get_id() ); ?>} -->
							<div class="wp-block-woocommerce-single-product">
								<!-- wp:woocommerce/product-image {"height":"350px"} /-->

								<!-- wp:woocommerce/product-rating {"textAlign":"center","isDescendentOfSingleProductBlock":true,"fontSize":"small","style":{"spacing":{"margin":{"top":"7px","bottom":"7px"}}}} /-->

								<!-- wp:post-title {"textAlign":"center","isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"7px","bottom":"7px","left":"0","right":"0"}}},"fontSize":"base","fontFamily":"outfit","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

								<!-- wp:woocommerce/product-price {"textAlign":"center","fontSize":"large","style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"7px","bottom":"7px","left":"0","right":"0"}}}} /-->
							</div>
							<!-- /wp:woocommerce/single-product -->
						</div>
						<!-- /wp:group -->
					</div>
					<!-- /wp:column -->
				<?php endforeach; ?>
			</div>
			<!-- /wp:columns -->
			<?php endif; ?>
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"width":"600px","sizeSlug":"large"} -->
			<figure class="wp-block-image size-large is-resized"><img src="http://img.wpbrandy.com/uploads/cosmetic-img-2.png"
					alt="" style="width:600px" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->