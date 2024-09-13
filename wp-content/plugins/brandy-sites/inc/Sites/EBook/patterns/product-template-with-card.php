<?php
/**
 * Title: Brandy Product Template With Card
 * Slug: brandy/product-template-with-card
 * Categories: woocommerce, brandy, ebook
 * Viewport width: 1400
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

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