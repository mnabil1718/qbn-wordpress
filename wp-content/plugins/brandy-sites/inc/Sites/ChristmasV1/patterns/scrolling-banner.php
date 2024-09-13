<?php
/**
 * Title: Brandy Scrolling Banner
 * Slug: brandy/scrolling-banner
 * Categories: banner, brandy, scrolling
 * Viewport width: 1400
 */
?>


<!-- wp:group {"className":"brandy-scrolling-banner scroll-to-left","style":{"spacing":{"padding":{"top":"16px","bottom":"16px"}},"color":{"background":"#eceded4d"}},"layout":{"type":"default"}} -->
<div class="wp-block-group brandy-scrolling-banner scroll-to-left has-background"
	style="background-color:#eceded4d;padding-top:16px;padding-bottom:16px">
	<!-- wp:group {"className":"brandy-scrolling-banner__content","style":{"spacing":{"blockGap":"40px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
	<div class="wp-block-group brandy-scrolling-banner__content">
		<?php for ( $i = 0; $i < 6; $i++ ) : ?>
			<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"20px","height":"auto","scale":"contain","sizeSlug":"large"} -->
				<figure class="wp-block-image size-large is-resized"><img
						src="http://img.wpbrandy.com/uploads/christmas-tree-solid.png" alt=""
						style="object-fit:contain;width:20px;height:auto" /></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"}}}},"textColor":"brandy-accent","fontFamily":"chelsea-market"} -->
				<p class="has-brandy-accent-color has-text-color has-link-color has-chelsea-market-font-family"
					style="font-size:20px;font-style:normal;font-weight:500;text-transform:capitalize"><?php esc_html_e( 'Christmas sale', 'brandy' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:group {"style":{"spacing":{"blockGap":"10px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group">
				<!-- wp:image {"width":"20px","height":"auto","scale":"contain","sizeSlug":"large"} -->
				<figure class="wp-block-image size-large is-resized"><img
						src="http://img.wpbrandy.com/uploads/christmas-tree-outline.png" alt=""
						style="object-fit:contain;width:20px;height:auto" /></figure>
				<!-- /wp:image -->

				<!-- wp:paragraph {"className":"brandy-outline-text","style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize","fontSize":"20px"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-accent"}}}},"textColor":"brandy-accent","fontFamily":"chelsea-market"} -->
				<p class="brandy-outline-text has-brandy-accent-color has-text-color has-link-color has-chelsea-market-font-family"
					style="font-size:20px;font-style:normal;font-weight:500;text-transform:capitalize"><?php esc_html_e( 'Christmas sale', 'brandy' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->	
		<?php endfor; ?>
		
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->