<?php
/**
 * Title: Brandy Products Spotlight
 * Slug: brandy/products-spotlight
 * Categories: products, brandy
 * Viewport width: 1400
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"},"blockGap":{"top":"var:preset|spacing|20","left":"var:preset|spacing|20"}}}} -->
<div class="wp-block-columns alignwide" style="padding-right:0;padding-left:0">
	<!-- wp:column {"verticalAlignment":"stretch","width":"338px","layout":{"type":"default"}} -->
	<div class="wp-block-column is-vertically-aligned-stretch" style="flex-basis:338px">
		<!-- wp:cover {"url":"http://img.wpbrandy.com/uploads/shoes-categories-men-shoes.png","id":74,"dimRatio":0,"isUserOverlayColor":true,"focalPoint":{"x":0.52,"y":0.49},"minHeight":100,"minHeightUnit":"%","contentPosition":"bottom center","isDark":false,"align":"left","style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"},"blockGap":"0"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","layout":{"type":"default"}} -->
		<div class="wp-block-cover alignleft is-light has-custom-content-position is-position-bottom-center has-brandy-primary-text-color has-text-color has-link-color"
			style="padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px;min-height:100%"><span
				aria-hidden="true"
				class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img
				class="wp-block-cover__image-background wp-image-74" alt=""
				src="http://img.wpbrandy.com/uploads/shoes-categories-men-shoes.png"
				style="object-position:52% 49%" data-object-fit="cover" data-object-position="52% 49%" />
			<div class="wp-block-cover__inner-container">
				<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"constrained","contentSize":"170px","justifyContent":"left"}} -->
				<div class="wp-block-group">
					<!-- wp:heading {"level":4,"style":{"typography":{"fontStyle":"normal","fontWeight":"800"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"}}}},"textColor":"brandy-accent"} -->
					<h4 class="wp-block-heading has-brandy-accent-color has-text-color has-link-color"
						style="font-style:normal;font-weight:800"><?php echo esc_html__( 'SNEAKER', 'brandy-sites' ); ?></h4>
					<!-- /wp:heading -->

					<!-- wp:heading {"level":3,"style":{"typography":{"fontStyle":"normal","fontWeight":"800"}}} -->
					<h3 class="wp-block-heading" style="font-style:normal;font-weight:800"><?php echo esc_html__( 'MEN\'S SHOES', 'brandy-sites' ); ?></h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"spacing":{"margin":{"top":"10px"}}},"textColor":"brandy-secondary-text"} -->
					<p class="has-brandy-secondary-text-color has-text-color has-link-color" style="margin-top:10px"><?php echo esc_html__( 'Enjoy special offers just', 'brandy-sites' ); ?><br><?php echo esc_html__( 'for you!', 'brandy-sites' ); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"0"},"margin":{"top":"15px","bottom":"0"}}}} -->
					<div class="wp-block-columns" style="margin-top:15px;margin-bottom:0">
						<!-- wp:column {"verticalAlignment":"center","width":"70px","style":{"typography":{"fontSize":"10px","fontStyle":"normal","fontWeight":"600"},"spacing":{"padding":{"top":"5px","bottom":"5px","left":"5px","right":"5px"}},"border":{"width":"1px","style":"solid"},"shadow":"var:preset|shadow|brandy-shoes-shadow-small","color":{"background":"#ffffff"}},"borderColor":"brandy-primary-text","layout":{"type":"default"}} -->
						<div class="wp-block-column is-vertically-aligned-center has-border-color has-brandy-primary-text-border-color has-background"
							style="border-style:solid;border-width:1px;background-color:#ffffff;padding-top:5px;padding-right:5px;padding-bottom:5px;padding-left:5px;font-size:10px;font-style:normal;font-weight:600;box-shadow:var(--wp--preset--shadow--brandy-shoes-shadow-small);flex-basis:70px">
							<!-- wp:paragraph {"align":"center"} -->
							<p class="has-text-align-center"><?php echo esc_html__( '20% OFF', 'brandy-sites' ); ?></p>
							<!-- /wp:paragraph -->
						</div>
						<!-- /wp:column -->
					</div>
					<!-- /wp:columns -->

					<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"50px"}},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","className":"brandy-link-underline-to-child"} -->
					<p class="brandy-link-underline-to-child has-brandy-primary-text-color has-text-color has-link-color"
						style="margin-top:50px;font-style:normal;font-weight:500"><a href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"><?php echo esc_html__( 'Shop Now', 'brandy-sites' ); ?> →</a></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
		</div>
		<!-- /wp:cover -->
	</div>
	<!-- /wp:column -->

	<!-- wp:column {"width":""} -->
	<div class="wp-block-column">
		<!-- wp:woocommerce/product-collection {"queryId":0,"query":{"perPage":3,"pages":0,"offset":0,"postType":"product","order":"desc","orderBy":"date","search":"","exclude":[],"inherit":false,"taxQuery":[],"isProductCollectionBlock":true,"featured":false,"woocommerceOnSale":false,"woocommerceStockStatus":["instock","outofstock","onbackorder"],"woocommerceAttributes":[],"woocommerceHandPickedProducts":[]},"tagName":"div","displayLayout":{"type":"flex","columns":3,"shrinkColumns":true},"queryContextIncludes":["collection"],"align":"wide","layout":{"type":"default"}} -->
		<div class="wp-block-woocommerce-product-collection alignwide">
			<!-- wp:woocommerce/product-template {"className":"products-block-post-template brandy-site-product-template","layout":{"type":"default"}} -->
			<?php
				require BRANDYSITES_PLUGIN_PATH . '/inc/Sites/Shoes/views/query-product-layout.php';
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
	</div>
	<!-- /wp:column -->
</div>
<!-- /wp:columns -->