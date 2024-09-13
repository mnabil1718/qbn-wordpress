<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"blockGap":"var:preset|spacing|60"},"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/ebook-banner-bg.png","id":63,"source":"file","title":"ebook-banner-bg"},"backgroundPosition":"50% 0"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"left":"var:preset|spacing|50"}}}} -->
	<div class="wp-block-columns alignwide"><!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"#aeb2bb"}}},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"responsive_big_heading"} -->
			<h2 class="wp-block-heading has-link-color has-responsive-big-heading-font-size"
				style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><?php echo esc_html__( 'Discover the best', 'brandy-sites' ); ?><br><a
					href="<?php echo home_url( '?product_cat=ebooks' ); ?>"><?php echo esc_html__( 'eBooks', 'brandy-sites' ); ?></a>, <a href="<?php echo home_url( '?product_cat=audio' ); ?>"><?php echo esc_html__( 'audio', 'brandy-sites' ); ?></a>, and</h2>
			<!-- /wp:heading -->

			<!-- wp:heading {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"}}},"spacing":{"margin":{"top":"0","bottom":"0","left":"0","right":"0"}}},"fontSize":"responsive_big_heading"} -->
			<h2 class="wp-block-heading has-link-color has-responsive-big-heading-font-size"
				style="margin-top:0;margin-right:0;margin-bottom:0;margin-left:0"><a href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>">collections</a>.</h2>
			<!-- /wp:heading -->

			<!-- wp:pattern {"slug":"brandy/popular-search"} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img src="http://img.wpbrandy.com/uploads/ebook-banner-img.png"
					alt="" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->