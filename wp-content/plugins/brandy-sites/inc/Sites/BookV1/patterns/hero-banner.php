<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"margin":{"top":"0","bottom":"0"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
	<!-- wp:columns {"align":"full","style":{"spacing":{"padding":{"top":"90px","bottom":"0px","left":"0","right":"0"},"blockGap":{"top":"var:preset|spacing|60","left":"var:preset|spacing|60"}},"color":{"background":"#fef7f1"}}} -->
	<div class="wp-block-columns alignfull has-background"
		style="background-color:#fef7f1;padding-top:90px;padding-right:0;padding-bottom:0px;padding-left:0">
		<!-- wp:column {"verticalAlignment":"top","width":"40%","style":{"spacing":{"padding":{"left":"0"}}}} -->
		<div class="wp-block-column is-vertically-aligned-top" style="padding-left:0;flex-basis:40%">
			<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":"613px","justifyContent":"right"}} -->
			<div class="wp-block-group"
				style="padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--30)">
				<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"400"},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"responsive_big_heading"} -->
				<h2 class="wp-block-heading has-responsive-big-heading-font-size"
					style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0;font-style:normal;font-weight:400"><?php echo esc_html( 'Unlock new worlds through reading...', 'brandy' ); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"300"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
				<p style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:300"><?php echo esc_html( 'Books are a place to store knowledge, a diverse source of learning, share experiences and enriching your soul.', 'brandy' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
				<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
					<!-- wp:button {"style":{"spacing":{"padding":{"left":"30px","right":"30px","top":"16px","bottom":"16px"}}}} -->
					<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"
							style="padding-top:16px;padding-right:30px;padding-bottom:16px;padding-left:30px" href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"><?php echo esc_html( 'Explore all books', 'brandy' ); ?></a></div>
					<!-- /wp:button -->
				</div>
				<!-- /wp:buttons -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:image {"scale":"cover","sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="http://img.wpbrandy.com/uploads/book-banner-img.png"
					alt="" style="object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->