<?php
/**
 * Title: Brandy Book Offer
 * Slug: brandy/book-offer
 * Categories: banner, brandy, ebook
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"color":{"background":"#fdf5f0"},"border":{"radius":"20px"},"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}}} -->
	<div class="wp-block-columns alignwide has-background"
		style="border-radius:20px;background-color:#fdf5f0;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
		<!-- wp:column {"verticalAlignment":"center","width":"66.66%","style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center"
			style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0;flex-basis:66.66%">
			<!-- wp:group {"style":{"spacing":{"blockGap":"0","padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained","contentSize":"520px","justifyContent":"left"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"10px"}}},"layout":{"type":"constrained","contentSize":"133px","justifyContent":"left"}} -->
				<div class="wp-block-group" style="margin-bottom:10px">
					<!-- wp:group {"style":{"border":{"top":{"width":"0px","style":"none"},"right":{"width":"0px","style":"none"},"bottom":{"color":"#ff7f0933","width":"5px"},"left":{"width":"0px","style":"none"}},"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
					<div class="wp-block-group"
						style="border-top-style:none;border-top-width:0px;border-right-style:none;border-right-width:0px;border-bottom-color:#ff7f0933;border-bottom-width:5px;border-left-style:none;border-left-width:0px;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
						<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"-9px"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"brandy-accent","fontSize":"small"} -->
						<p class="has-brandy-accent-color has-text-color has-link-color has-small-font-size"
							style="margin-top:0;margin-bottom:-9px;font-style:normal;font-weight:600"><?php echo esc_html__( 'EXCLUSIVE OFFER', 'brandy-sites' ) ?></p>
						<!-- /wp:paragraph -->
					</div>
					<!-- /wp:group -->
				</div>
				<!-- /wp:group -->

				<!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|10"}}},"fontSize":"4xl"} -->
				<h2 class="wp-block-heading has-4-xl-font-size" style="margin-bottom:var(--wp--preset--spacing--10)"><?php echo esc_html__('Get cashback 25% on all items in our store'); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"className":"brandy-link-underline","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"brandy-primary-text"} -->
				<p class="brandy-link-underline has-brandy-primary-text-color has-text-color has-link-color"
					style="font-style:normal;font-weight:500"><a href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"><?php echo esc_html__( 'Shop Now', 'brandy-sites' ); ?> →</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":"33.33%"} -->
		<div class="wp-block-column" style="flex-basis:33.33%"><!-- wp:image {"sizeSlug":"large"} -->
			<figure class="wp-block-image size-large"><img
					src="http://img.wpbrandy.com/uploads/book-campaign-banner-5.png" alt="" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->