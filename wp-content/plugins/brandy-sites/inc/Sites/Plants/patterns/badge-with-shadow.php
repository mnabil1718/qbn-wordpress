<?php
/**
 * Title: Brandy text badge with shadow
 * Slug: brandy/badge-with-shadow
 * Categories: brandy
 * Viewport width: 200
 */
?>

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group">
	<!-- wp:paragraph {"align":"center","className":"brandy-plants-badge-shadow","style":{"typography":{"fontSize":"12px","fontStyle":"normal","fontWeight":"500"},"spacing":{"padding":{"top":"7px","bottom":"7px","left":"10px","right":"10px"}}},"backgroundColor":"white"} -->
	<p class="has-text-align-center brandy-plants-badge-shadow has-white-background-color has-background"
					style="padding-top:7px;padding-right:10px;padding-bottom:7px;padding-left:10px;font-size:12px;font-style:normal;font-weight:500"><?php echo esc_html__( 'STARTING AT $49.99 WITH FREE SHIPPING', 'brandy-sites' ); ?></p>
	<!-- /wp:paragraph -->
</div>
<!-- /wp:group -->