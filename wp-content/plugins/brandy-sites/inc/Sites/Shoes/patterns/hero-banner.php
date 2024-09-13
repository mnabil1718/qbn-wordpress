<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:cover {"url":"http://img.wpbrandy.com/uploads/shoes-hero-banner-background.png","id":68,"dimRatio":0,"isUserOverlayColor":true,"minHeight":563,"minHeightUnit":"px","isDark":false,"className":"brandy-hero-banner","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"7rem","bottom":"7rem"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-cover is-light brandy-hero-banner has-brandy-primary-text-color has-text-color has-link-color"
	style="margin-bottom:var(--wp--preset--spacing--30);padding-top:7rem;padding-right:var(--wp--preset--spacing--30);padding-bottom:7rem;padding-left:var(--wp--preset--spacing--30);min-height:563px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img
		class="wp-block-cover__image-background wp-image-68" alt=""
		src="http://img.wpbrandy.com/uploads/shoes-hero-banner-background.png"
		data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="padding-right:0;padding-left:0">
			<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"className":"brandy-hero-banner__content","layout":{"type":"default"}} -->
			<div class="wp-block-column is-vertically-aligned-center brandy-hero-banner__content"
				style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
				<!-- wp:paragraph {"style":{"spacing":{"margin":{"bottom":"0"}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"responsive_big_heading"} -->
				<p class="has-responsive-big-heading-font-size"
					style="margin-bottom:0;font-style:normal;font-weight:500"><?php echo esc_html__( 'Running', 'brandy-sites' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"left","level":1,"style":{"typography":{"fontStyle":"normal","fontWeight":"700","lineHeight":"1.15","fontSize":"6.25rem"},"spacing":{"margin":{"bottom":"var:preset|spacing|10","top":"0"}}}} -->
				<h1 class="wp-block-heading has-text-align-left"
					style="margin-top:0;margin-bottom:var(--wp--preset--spacing--10);font-size:6.25rem;font-style:normal;font-weight:700;line-height:1.15"><?php echo esc_html__( 'WINNER\'S SHOES', 'brandy-sites' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","fontSize":"1.87rem"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}}} -->
				<p style="margin-top:0px;margin-bottom:0px;font-size:1.87rem;font-style:normal;font-weight:400"><?php echo esc_html__( 'Sneaker shoes only from', 'brandy-sites' ); ?> <mark style="background-color:rgba(0, 0, 0, 0)"
						class="has-inline-color has-brandy-accent-color">$235.00</mark></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
					<!-- wp:button {"style":{"typography":{"fontStyle":"normal","fontWeight":"600","lineHeight":"1.75"},"spacing":{"padding":{"left":"2rem","right":"2rem","top":"0.8rem","bottom":"0.8rem"}}},"className":"","fontSize":"large"} -->
					<div class="wp-block-button has-custom-font-size has-large-font-size"
						style="font-style:normal;font-weight:600;line-height:1.75"><a
							class="wp-block-button__link wp-element-button" href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"
							style="padding-top:0.8rem;padding-right:2rem;padding-bottom:0.8rem;padding-left:2rem"><?php echo esc_html__( 'Shop now', 'brandy-sites' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","className":"brandy-hero-banner__image"} -->
			<div class="wp-block-column is-vertically-aligned-center brandy-hero-banner__image">
				<!-- wp:cover {"url":"http://img.wpbrandy.com/uploads/shoes-just-do-it.png","id":69,"dimRatio":0,"isUserOverlayColor":true,"isDark":false,"style":{"dimensions":{"aspectRatio":"1"}},"layout":{"type":"constrained"}} -->
				<div class="wp-block-cover is-light"><span aria-hidden="true"
						class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img
						class="wp-block-cover__image-background wp-image-69" alt=""
						src="http://img.wpbrandy.com/uploads/shoes-just-do-it.png"
						data-object-fit="cover" />
					<div class="wp-block-cover__inner-container"><!-- wp:image {"sizeSlug":"large","align":"center"} -->
						<figure class="wp-block-image aligncenter size-large"><img
								src="http://img.wpbrandy.com/uploads/shoes-home-hero-banner-img.png" alt="" /></figure>
						<!-- /wp:image -->
					</div>
				</div>
				<!-- /wp:cover -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
</div>
<!-- /wp:cover -->