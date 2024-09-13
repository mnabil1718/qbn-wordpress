<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:cover {"customOverlayColor":"#f1f6fa","isUserOverlayColor":true,"isDark":false,"className":"brandy-hero-banner","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"0px","bottom":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-cover is-light brandy-hero-banner has-brandy-primary-text-color has-text-color has-link-color"
	style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0px;padding-right:var(--wp--preset--spacing--30);padding-bottom:0px;padding-left:var(--wp--preset--spacing--30)">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-100 has-background-dim"
		style="background-color:#f1f6fa"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="padding-right:0;padding-left:0">
			<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"brandy-hero-banner__content","layout":{"type":"default"}} -->
			<div class="wp-block-column is-vertically-aligned-center brandy-hero-banner__content"
				style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
				<!-- wp:paragraph {"style":{"typography":{"letterSpacing":"5.4px","textTransform":"uppercase"},"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"fontSize":"large_to_small"} -->
				<p class="has-large-to-small-font-size"
					style="margin-bottom:var(--wp--preset--spacing--10);letter-spacing:5.4px;text-transform:uppercase"><?php echo esc_html__( 'New Arrivals', 'brandy' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"left","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.15"},"spacing":{"margin":{"bottom":"var:preset|spacing|10","top":"0"}}},"fontSize":"responsive_big_heading"} -->
				<h1 class="wp-block-heading has-text-align-left has-responsive-big-heading-font-size"
					style="margin-top:0;margin-bottom:var(--wp--preset--spacing--10);font-style:normal;font-weight:700;line-height:1.15"><?php echo esc_html__( 'Perfect Fashions', 'brandy' ); ?><br><?php echo esc_html__( 'For Summer', 'brandy' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"fontSize":"large_to_small"} -->
				<p class="has-large-to-small-font-size"
					style="margin-top:0px;margin-bottom:0px;font-style:normal;font-weight:400"><?php echo esc_html__( 'There\'s nothing like a trend, let\'s select items to make your life with a new fashion style!', 'brandy' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.75"},"spacing":{"padding":{"left":"2rem","right":"2rem","top":"0.8rem","bottom":"0.8rem"}}},"className":"","fontSize":"large"} -->
					<div class="wp-block-button has-custom-font-size has-large-font-size"
						style="font-style:normal;font-weight:600;line-height:1.75"><a
							class="wp-block-button__link wp-element-button" href="<?php echo esc_url( brandy_get_shop_page_url() ); ?>"
							style="padding-top:0.8rem;padding-right:2rem;padding-bottom:0.8rem;padding-left:2rem"><?php echo esc_html__( 'Explore now', 'brandy' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","className":"brandy-hero-banner__image"} -->
			<div class="wp-block-column is-vertically-aligned-center brandy-hero-banner__image">
				<!-- wp:image {"sizeSlug":"large","align":"center"} -->
				<figure class="wp-block-image aligncenter size-large"><img
						src="http://img.wpbrandy.com/uploads/wc-banner.png" alt="" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
</div>
<!-- /wp:cover -->
