<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/cosmetic-hero-banner-background.png","id":100,"source":"file","title":"cosmetic-hero-banner-background"},"backgroundPosition":"50% 0"},"spacing":{"padding":{"top":"13rem","bottom":"13rem","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained","justifyContent":"center"}} -->
<div class="wp-block-group"
	style="padding-top:13rem;padding-right:var(--wp--preset--spacing--30);padding-bottom:13rem;padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained","justifyContent":"left","contentSize":"700px"}} -->
	<div class="wp-block-group alignwide" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"400","textTransform":"uppercase"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"spacing":{"margin":{"top":"0","bottom":"0"}}},"textColor":"brandy-primary-text","fontSize":"large"} -->
		<p class="has-brandy-primary-text-color has-text-color has-link-color has-large-font-size"
			style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:400;text-transform:uppercase"><?php echo esc_html__('In this season, find the best', 'brandy'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:heading {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"responsive_big_heading"} -->
		<h2 class="wp-block-heading has-responsive-big-heading-font-size" style="margin-top:0;margin-bottom:0"><?php echo wp_kses_post(__('Fresh Glow Vibes<br>This Summer', 'brandy')); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}},"fontSize":"2xl"} -->
		<p class="has-2-xl-font-size" style="margin-top:0;margin-bottom:0"><?php echo esc_html__('You\'ll be consulted more about suitable skin products for you.', 'brandy'); ?></p>
		<!-- /wp:paragraph -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"fontSize":"large"} -->
		<div class="wp-block-buttons has-custom-font-size has-large-font-size"
			style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button {"className":"is-style-outline"} -->
			<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"><?php echo esc_html__('Explore now', 'brandy'); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->