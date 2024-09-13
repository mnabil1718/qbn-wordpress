<?php
/**
 * Title: Brandy newest posts - grid layout - with title
 * Slug: brandy/newest-posts-grid
 * Categories: brandy, post, sidebar
 * Viewport width: 500
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70","bottom":"var:preset|spacing|70"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--70);margin-bottom:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"left","align":"wide","style":{"typography":{"fontStyle":"normal","fontWeight":"700"},"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"className":"wc-home-section-title wc-home__latest-posts__title","fontSize":"responsive_h2"} -->
	<h2 class="wp-block-heading alignwide has-text-align-left wc-home-section-title wc-home__latest-posts__title has-responsive-h-2-font-size"
		style="margin-bottom:var(--wp--preset--spacing--40);font-style:normal;font-weight:700"><?php echo esc_html__( 'Blog make life richer', 'brandy-sites' ); ?>
	</h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":33,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"core/posts-list","align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":4}} -->
		<!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"bottom":"1rem"}},"border":{"radius":"10px"}}} /-->

		<!-- wp:post-date {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"spacing":{"padding":{"bottom":"6px"}},"typography":{"textTransform":"uppercase"}},"textColor":"brandy-secondary-text","fontSize":"extra_small"} /-->

		<!-- wp:post-title {"textAlign":"left","level":4,"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"}},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text","className":"brandy-link-underline-to-child brandy-text-ellipsis-2","fontFamily":"outfit"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group">
			<!-- wp:avatar {"size":34,"style":{"border":{"radius":"100px"},"spacing":{"margin":{"right":"12px"}}}} /-->

			<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"4px"}}},"fontSize":"small"} -->
			<p class="has-small-font-size" style="margin-right:4px"><?php echo esc_html__( 'Post by', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:post-author-name {"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"left"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
			<!-- wp:button {"className":"is-style-outline","fontSize":"base"} -->
			<div class="wp-block-button has-custom-font-size is-style-outline has-base-font-size"><a
					class="wp-block-button__link wp-element-button" href="<?php echo esc_url( \brandy_get_blog_page_url() ); ?>"><?php echo esc_html__( 'View more', 'brandy-sites' ); ?></a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->