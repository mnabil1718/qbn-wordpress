<?php
/**
 * Title: Brandy Trending Books
 * Slug: brandy/trending-books
 * Categories: woocommerce, brandy, ebook
 * Viewport width: 1400
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group">
	<!-- wp:columns {"align":"full","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignfull"><!-- wp:column {"width":"0px"} -->
		<div class="wp-block-column" style="flex-basis:0px"></div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"100%"} -->
		<div class="wp-block-column" style="flex-basis:100%">
			<!-- wp:group {"style":{"border":{"radius":{"topLeft":"24px","bottomLeft":"24px"}},"color":{"background":"#f6f4ed"},"spacing":{"padding":{"right":"var:preset|spacing|50","left":"var:preset|spacing|50","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-group has-background"
				style="border-top-left-radius:24px;border-bottom-left-radius:24px;background-color:#f6f4ed;padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--50)">
				<!-- wp:heading {"textAlign":"center","fontSize":"responsive_h2"} -->
				<h2 class="wp-block-heading has-text-align-center has-responsive-h-2-font-size"><?php echo esc_html__( 'What\'s Trending', 'brandy-sites' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"textColor":"brandy-secondary-text","fontSize":"small"} -->
				<p class="has-text-align-center has-brandy-secondary-text-color has-text-color has-link-color has-small-font-size"
					style="margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'BookClub has provided us with an unexpected yet powerful tool for our team.', 'brandy-sites' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":5,"pages":1,"offset":0,"postType":"product","order":"desc","orderBy":"popularity","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[]},"tagName":"div","displayLayout":{"type":"flex","columns":5,"shrinkColumns":true},"collection":"woocommerce/product-collection/best-sellers","hideControls":["inherit","order"],"queryContextIncludes":["collection"],"align":"wide"} -->
				<div class="wp-block-woocommerce-product-collection alignwide">
					<!-- wp:woocommerce/product-template {"className":"products-block-post-template brandy-site-product-template","layout":{"type":"default"}} -->
					<!-- wp:group {"style":{"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}},"color":{"background":"#ffffff"},"border":{"radius":"20px"}},"layout":{"type":"default"}} -->
					<div class="wp-block-group has-background"
						style="border-radius:20px;background-color:#ffffff;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
						<!-- wp:group {"className":"brandy-product-thumbnail-group","style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}},"color":{"background":"#f8fafc"},"border":{"radius":"12px"}},"layout":{"type":"default"}} -->
						<div class="wp-block-group brandy-product-thumbnail-group has-background"
							style="border-radius:12px;background-color:#f8fafc;margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
							<!-- wp:woocommerce/product-image {"saleBadgeAlign":"left","imageSizing":"thumbnail","isDescendentOfQueryLoop":true,"style":{"border":{"radius":"0px"},"spacing":{"margin":{"top":"0","right":"0","bottom":"0","left":"0"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} /-->

							<!-- wp:woocommerce/product-button {"width":100,"isDescendentOfQueryLoop":true,"backgroundColor":"brandy-theme-background","textColor":"brandy-primary-text","fontSize":"small","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"border":{"radius":"7px"},"spacing":{"margin":{"right":"0","left":"0","top":"0","bottom":"0"}}}} /-->
						</div>
						<!-- /wp:group -->

						<!-- wp:post-terms {"term":"product_cat","style":{"spacing":{"margin":{"bottom":"2px"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"typography":{"fontSize":"10px","textTransform":"uppercase","letterSpacing":"1.1px"}},"textColor":"brandy-secondary-text"} /-->

						<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"className":"brandy-link-underline-to-child","style":{"spacing":{"margin":{"bottom":"5px","top":"0"}},"elements":{"link":{":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}},"color":{"text":"var:preset|color|brandy-primary-text"}}},"typography":{"fontStyle":"normal","fontWeight":"400"}},"textColor":"brandy-primary-text","fontSize":"base","__woocommerceNamespace":"woocommerce/product-collection/product-title"} /-->

						<!-- wp:woocommerce/product-rating {"isDescendentOfQueryLoop":true,"fontSize":"small","style":{"spacing":{"margin":{"top":"0","bottom":"7px"}}}} /-->

						<!-- wp:woocommerce/product-price {"isDescendentOfQueryLoop":true,"textAlign":"left","fontFamily":"alice","fontSize":"large","style":{"spacing":{"margin":{"top":"0","bottom":"5px"}}}} /-->
					</div>
					<!-- /wp:group -->
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

			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->