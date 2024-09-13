<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:cover {"overlayColor":"brandy-theme-secondary-background","isUserOverlayColor":true,"isDark":false,"className":"brandy-hero-banner","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"0px","bottom":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-cover is-light brandy-hero-banner has-brandy-primary-text-color has-text-color has-link-color"
	style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0px;padding-right:var(--wp--preset--spacing--30);padding-bottom:0px;padding-left:var(--wp--preset--spacing--30)">
	<span aria-hidden="true"
		class="wp-block-cover__background has-brandy-theme-secondary-background-background-color has-background-dim-100 has-background-dim"></span>
	<div class="wp-block-cover__inner-container">
		<!-- wp:columns {"align":"wide","style":{"spacing":{"padding":{"right":"0","left":"0"}}}} -->
		<div class="wp-block-columns alignwide" style="padding-right:0;padding-left:0">
			<!-- wp:column {"verticalAlignment":"center","width":"","style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50"}}},"layout":{"type":"default"}} -->
			<div class="wp-block-column is-vertically-aligned-center"
				style="padding-top:var(--wp--preset--spacing--50);padding-bottom:var(--wp--preset--spacing--50)">
				<!-- wp:paragraph {"className":"sm-text-center","style":{"typography":{"textTransform":"uppercase","letterSpacing":"-3%","textDecoration":"underline","fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"bottom":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"extra_large"} -->
				<p class="sm-text-center has-brandy-secondary-text-color has-text-color has-link-color has-extra-large-font-size"
					style="margin-bottom:var(--wp--preset--spacing--20);font-style:normal;font-weight:300;letter-spacing:-3%;text-decoration:underline;text-transform:uppercase">
					<a href="<?php echo esc_url( get_home_url() . '/new-arrivals' ); ?>"><?php echo esc_html__('New Arrivals','brandy'); ?></a></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"textAlign":"left","level":1,"className":"sm-text-center","style":{"typography":{"fontStyle":"normal","fontWeight":"400","lineHeight":"1.15","letterSpacing":"px"},"spacing":{"margin":{"bottom":"var:preset|spacing|20","top":"0"}}},"fontSize":"responsive_big_heading"} -->
				<h1 class="wp-block-heading has-text-align-left sm-text-center has-responsive-big-heading-font-size"
					style="margin-top:0;margin-bottom:var(--wp--preset--spacing--20);font-style:normal;font-weight:400;letter-spacing:px;line-height:1.15">
					<?php printf( __('Discover The<br/>Latest %1$sCollection%2$s', 'brandy'), '<mark style="background-color:rgba(0, 0, 0, 0)" class="has-inline-color has-brandy-accent-color">', '</mark>' ); ?></h1>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"sm-justify-center","style":{"spacing":{"blockGap":"5px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
				<div class="wp-block-group sm-justify-center"><!-- wp:paragraph {"fontSize":"extra_large"} -->
					<p class="has-extra-large-font-size"><?php echo esc_html__('Free shipping', 'brandy'); ?></p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"200"},"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"fontSize":"extra_large"} -->
					<p class="has-extra-large-font-size"
						style="margin-top:0px;margin-bottom:0px;font-style:normal;font-weight:200"><?php echo esc_html__('on orders $129+', 'brandy'); ?></p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->

				<!-- wp:buttons {"className":"sm-justify-center","style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}}} -->
				<div class="wp-block-buttons sm-justify-center" style="margin-top:var(--wp--preset--spacing--50)">
					<!-- wp:button {"className":"","style":{"typography":{"fontStyle":"normal","fontWeight":"500","lineHeight":"1.75"},"spacing":{"padding":{"left":"2rem","right":"2rem","top":"1rem","bottom":"1rem"}}},"fontSize":"base"} -->
					<div class="wp-block-button has-custom-font-size has-base-font-size"
						style="font-style:normal;font-weight:500;line-height:1.75"><a
							class="wp-block-button__link wp-element-button" href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"
							style="padding-top:1rem;padding-right:2rem;padding-bottom:1rem;padding-left:2rem"><?php echo esc_html__('Shop Now','brandy'); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:column -->

			<!-- wp:column {"verticalAlignment":"center","className":"brandy-hero-banner__image"} -->
			<div class="wp-block-column is-vertically-aligned-center brandy-hero-banner__image">
				<!-- wp:image {"scale":"cover","sizeSlug":"large","align":"center"} -->
				<figure class="wp-block-image aligncenter size-large"><img
						src="http://img.wpbrandy.com/uploads/houseware-hero-banner-img.png" alt=""
						style="object-fit:cover" /></figure>
				<!-- /wp:image -->
			</div>
			<!-- /wp:column -->
		</div>
		<!-- /wp:columns -->
	</div>
</div>
<!-- /wp:cover -->