<?php

/**
 * Title: Brandy product categories collection
 * Slug: brandy/product-categories-collection
 * Categories: products, categories, brandy
 * Viewport width: 1400
 */

 if ( ! \is_wc_installed() ) {
	\brandy_get_template_part( 'template-parts/install-wc-notice' );
	return;
}
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"center","fontSize":"responsive_h2"} -->
	<h2 class="wp-block-heading has-text-align-center has-responsive-h-2-font-size">Our new collection</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} -->
	<p class="has-text-align-center has-brandy-secondary-text-color has-text-color has-link-color">We take pride in
		delivering top-notch kitchen house products</p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"3rem"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:3rem"><!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"}},"border":{"radius":"18px"}},"backgroundColor":"brandy-theme-secondary-background","layout":{"type":"constrained"}} -->
			<div class="wp-block-group has-brandy-theme-secondary-background-background-color has-background"
				style="border-radius:18px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
				<!-- wp:image {"sizeSlug":"large"} -->
				<figure class="wp-block-image size-large"><img
						src="http://img.wpbrandy.com/uploads/houseware-post-4-img.png" alt="" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"25px","bottom":"25px"},"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"center"}} -->
				<div class="wp-block-group"
					style="padding-top:25px;padding-right:20px;padding-bottom:25px;padding-left:20px">
					<!-- wp:heading {"textAlign":"center","level":3} -->
					<h3 class="wp-block-heading has-text-align-center">Tool kitchen collection</h3>
					<!-- /wp:heading -->

					<!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} -->
					<p class="has-text-align-left has-brandy-secondary-text-color has-text-color has-link-color">Cutting
						Tools is the best thing that ever happened to your cooking. Plus, it's easy to use.</p>
					<!-- /wp:paragraph -->

					<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"10px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
					<div class="wp-block-buttons" style="margin-top:10px">
						<!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"1px"},"shadow":"none"},"borderColor":"brandy-accent"} -->
						<div class="wp-block-button is-style-outline"><a
								class="wp-block-button__link has-border-color has-brandy-accent-border-color wp-element-button"
								style="border-width:1px;box-shadow:none">View Collection</a></div>
						<!-- /wp:button -->
					</div>
					<!-- /wp:buttons -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:columns {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"}},"border":{"radius":"18px"}},"backgroundColor":"brandy-theme-secondary-background","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-columns has-brandy-theme-secondary-background-background-color has-background"
				style="border-radius:18px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
				<!-- wp:column {"verticalAlignment":"stretch","layout":{"type":"default"}} -->
				<div class="wp-block-column is-vertically-aligned-stretch">
					<!-- wp:group {"style":{"position":{"type":""},"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"10px","margin":{"top":"0","bottom":"0"},"padding":{"right":"15px","left":"15px","top":"15px","bottom":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"center","flexWrap":"nowrap"}} -->
					<div class="wp-block-group"
						style="min-height:100%;margin-top:0;margin-bottom:0;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
						<!-- wp:heading {"textAlign":"center","level":3} -->
						<h3 class="wp-block-heading has-text-align-center">Bowls kitchen collection</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} -->
						<p class="has-text-align-left has-brandy-secondary-text-color has-text-color has-link-color">
							Stylish bowls for mixing, serving, and enhancing your culinary essentials</p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"5px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
						<div class="wp-block-buttons" style="margin-top:5px">
							<!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"1px"}}} -->
							<div class="wp-block-button is-style-outline"><a
									class="wp-block-button__link wp-element-button" style="border-width:1px">View
									Collection</a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"stretch"} -->
				<div class="wp-block-column is-vertically-aligned-stretch"><!-- wp:image {"sizeSlug":"large"} -->
					<figure class="wp-block-image size-large"><img
							src="http://img.wpbrandy.com/uploads/houseware-post-5-img.png" alt="" /></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->

			<!-- wp:columns {"style":{"spacing":{"padding":{"right":"20px","left":"20px","top":"20px","bottom":"20px"}},"border":{"radius":"18px"}},"backgroundColor":"brandy-theme-secondary-background","layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-columns has-brandy-theme-secondary-background-background-color has-background"
				style="border-radius:18px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px">
				<!-- wp:column {"verticalAlignment":"bottom"} -->
				<div class="wp-block-column is-vertically-aligned-bottom"><!-- wp:image {"sizeSlug":"large"} -->
					<figure class="wp-block-image size-large"><img
							src="http://img.wpbrandy.com/uploads/houseware-post-6-img.png" alt="" /></figure>
					<!-- /wp:image -->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"stretch","layout":{"type":"default"}} -->
				<div class="wp-block-column is-vertically-aligned-stretch">
					<!-- wp:group {"style":{"position":{"type":""},"dimensions":{"minHeight":"100%"},"spacing":{"padding":{"right":"15px","left":"15px","top":"15px","bottom":"15px"},"blockGap":"10px"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"right","verticalAlignment":"center","flexWrap":"nowrap"}} -->
					<div class="wp-block-group"
						style="min-height:100%;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
						<!-- wp:heading {"textAlign":"center","level":3} -->
						<h3 class="wp-block-heading has-text-align-center">Collection of kitchen vases</h3>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"align":"right","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} -->
						<p class="has-text-align-right has-brandy-secondary-text-color has-text-color has-link-color">
							Elevate Your Culinary Experience with Premium Saucepan Innovations</p>
						<!-- /wp:paragraph -->

						<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"5px"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
						<div class="wp-block-buttons" style="margin-top:5px">
							<!-- wp:button {"className":"is-style-outline","style":{"border":{"width":"1px"}}} -->
							<div class="wp-block-button is-style-outline"><a
									class="wp-block-button__link wp-element-button" style="border-width:1px">View
									Collection</a></div>
							<!-- /wp:button -->
						</div>
						<!-- /wp:buttons -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->