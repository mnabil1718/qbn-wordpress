<?php
/**
 * Title: Brandy Campaign Banners
 * Slug: brandy/campaign-banners
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"className":"brandy-campaign-banners","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group brandy-campaign-banners"
	style="margin-bottom:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"bottom":"0"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"},"padding":{"right":"0","left":"0"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-bottom:0;padding-right:0;padding-left:0">
		<!-- wp:column {"width":"460px","layout":{"type":"default"}} -->
		<div class="wp-block-column" style="flex-basis:460px">
			<!-- wp:group {"className":"brandy-campaign-banners__card","style":{"border":{"radius":"10px"},"color":{"background":"#ebf1f7"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group brandy-campaign-banners__card has-background"
				style="border-radius:10px;background-color:#ebf1f7">
				<!-- wp:columns {"isStackedOnMobile":false,"style":{"color":{"background":"#fff5f1"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"10px"}}} -->
				<div class="wp-block-columns is-not-stacked-on-mobile has-background"
					style="border-radius:10px;background-color:#fff5f1;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:column {"verticalAlignment":"center","width":"","className":"brandy-campaign-banners__card__content","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|10"}}} -->
					<div class="wp-block-column is-vertically-aligned-center brandy-campaign-banners__card__content"
						style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1.1px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"extra_small"} -->
						<p class="has-extra-small-font-size"
							style="font-style:normal;font-weight:500;letter-spacing:1.1px"><?php echo esc_html__( 'HAPPY READING', 'brandy-sites' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"0.5rem"}}}} -->
						<h2 class="wp-block-heading" style="margin-bottom:0.5rem"><?php echo esc_html__( 'Free shipping for order $99.00', 'brandy-sites' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"className":"brandy-link-underline-to-child","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"brandy-primary-text"} -->
						<p class="brandy-link-underline-to-child has-brandy-primary-text-color has-text-color has-link-color"
							style="font-style:normal;font-weight:500"><a href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"><?php echo esc_html__( 'Shop Now', 'brandy-sites' ); ?> →</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"bottom","width":"","className":"brandy-campaign-banners__card__image"} -->
					<div class="wp-block-column is-vertically-aligned-bottom brandy-campaign-banners__card__image">
						<!-- wp:image {"scale":"cover","sizeSlug":"large","align":"right"} -->
						<figure class="wp-block-image alignright size-large"><img
								src="http://img.wpbrandy.com/uploads/book-campaign-banner-4.png" alt=""
								style="object-fit:cover" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"layout":{"type":"default"}} -->
		<div class="wp-block-column">
			<!-- wp:group {"className":"brandy-campaign-banners__card","style":{"border":{"radius":"10px"},"color":{"background":"#ebf1f7"}},"layout":{"type":"default"}} -->
			<div class="wp-block-group brandy-campaign-banners__card has-background"
				style="border-radius:10px;background-color:#ebf1f7">
				<!-- wp:columns {"isStackedOnMobile":false,"style":{"color":{"background":"#f3ffe9"},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}},"border":{"radius":"10px"}}} -->
				<div class="wp-block-columns is-not-stacked-on-mobile has-background"
					style="border-radius:10px;background-color:#f3ffe9;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
					<!-- wp:column {"verticalAlignment":"center","width":"","className":"brandy-campaign-banners__card__content","style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained","contentSize":"","justifyContent":"left"}} -->
					<div class="wp-block-column is-vertically-aligned-center brandy-campaign-banners__card__content"
						style="padding-top:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)">
						<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"1.1px","fontStyle":"normal","fontWeight":"500"}},"fontSize":"extra_small"} -->
						<p class="has-extra-small-font-size"
							style="font-style:normal;font-weight:500;letter-spacing:1.1px"><?php echo esc_html__( 'BEST OFFER', 'brandy-sites' ); ?></p>
						<!-- /wp:paragraph -->

						<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"0.5rem"}}}} -->
						<h2 class="wp-block-heading" style="margin-bottom:0.5rem"><?php echo esc_html__( 'Get cashback 25% on all items in our store', 'brandy-sites' ); ?></h2>
						<!-- /wp:heading -->

						<!-- wp:paragraph {"className":"brandy-link-underline-to-child","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"brandy-primary-text"} -->
						<p class="brandy-link-underline-to-child has-brandy-primary-text-color has-text-color has-link-color"
							style="font-style:normal;font-weight:500"><a href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"><?php echo esc_html__( 'Shop Now', 'brandy-sites' ); ?> →</a></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:column -->

					<!-- wp:column {"verticalAlignment":"bottom","width":"","className":"brandy-campaign-banners__card__image"} -->
					<div class="wp-block-column is-vertically-aligned-bottom brandy-campaign-banners__card__image">
						<!-- wp:image {"width":"450px","height":"240px","scale":"cover","sizeSlug":"large","align":"right"} -->
						<figure class="wp-block-image alignright size-large is-resized"><img
								src="http://img.wpbrandy.com/uploads/book-campaign-banner-5.png" alt=""
								style="object-fit:cover;width:450px;height:240px" /></figure>
						<!-- /wp:image -->
					</div>
					<!-- /wp:column -->
				</div>
				<!-- /wp:columns -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->