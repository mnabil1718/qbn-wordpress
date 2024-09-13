<?php
/**
 * Title: Brandy newest posts - grid layout - with title
 * Slug: brandy/newest-posts-grid
 * Categories: brandy, post, sidebar
 * Viewport width: 500
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group"
	style="margin-bottom:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"left","align":"wide","className":"wc-home-section-title wc-home__latest-posts__title","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"fontSize":"responsive_h2"} -->
	<h2 class="wp-block-heading alignwide has-text-align-left wc-home-section-title wc-home__latest-posts__title has-responsive-h-2-font-size"
		style="margin-bottom:var(--wp--preset--spacing--40)"><?php echo esc_html__( 'The latest and greatest news', 'brandy' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:query {"queryId":33,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"core/posts-list","align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"grid","columnCount":4}} -->
		<!-- wp:group {"style":{"border":{"radius":"10px"},"color":{"background":"var:preset|color|brandy-theme-secondary-background"},"spacing":{"margin":{"top":"0","bottom":"1rem"},"padding":{"top":"0","bottom":"0","left":"0","right":"0"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group has-background"
			style="border-radius:10px;background-color:var(--wp--preset--color--brandy-theme-secondary-background);margin-top:0;margin-bottom:1rem;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:post-featured-image {"isLink":true,"style":{"border":{"radius":"10px"}}} /--></div>
		<!-- /wp:group -->

		<!-- wp:post-date {"textAlign":"left","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"spacing":{"padding":{"bottom":"6px"}}},"textColor":"brandy-secondary-text","fontSize":"small"} /-->

		<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"className":"brandy-link-underline-to-child brandy-text-ellipsis-2","style":{"spacing":{"margin":{"top":"0","bottom":"10px"}},"typography":{"fontStyle":"normal","fontWeight":"500"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text"} /-->

		<!-- wp:group {"style":{"spacing":{"blockGap":"7px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
		<div class="wp-block-group"><!-- wp:avatar {"size":35,"style":{"border":{"radius":"50%"}}} /-->

			<!-- wp:post-author-name {"fontSize":"small"} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->