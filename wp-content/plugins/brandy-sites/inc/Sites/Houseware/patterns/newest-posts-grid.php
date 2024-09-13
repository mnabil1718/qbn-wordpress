<?php
/**
 * Title: Brandy newest posts - grid layout - with title
 * Slug: brandy/newest-posts-grid
 * Categories: brandy, post, sidebar
 * Viewport width: 500
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|60"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group"
	style="margin-bottom:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"center","align":"wide","className":"wc-home-section-title wc-home__latest-posts__title","style":{"spacing":{"margin":{"bottom":"0"}}},"fontSize":"responsive_h2"} -->
	<h2 class="wp-block-heading alignwide has-text-align-center wc-home-section-title wc-home__latest-posts__title has-responsive-h-2-font-size"
		style="margin-bottom:0">New &amp; Event</h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"spacing":{"margin":{"bottom":"var:preset|spacing|30"}}},"textColor":"brandy-secondary-text"} -->
	<p class="has-text-align-center has-brandy-secondary-text-color has-text-color has-link-color"
		style="margin-bottom:var(--wp--preset--spacing--30)">We take pride in delivering top-notch kitchen house
		products<br>that not only enhance the functionality of your space but also bring joy to your daily cooking
		experiences.</p>
	<!-- /wp:paragraph -->

	<!-- wp:query {"queryId":33,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false},"namespace":"core/posts-list","align":"wide","layout":{"type":"default"}} -->
	<div class="wp-block-query alignwide">
		<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3}} -->
		<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20","margin":{"top":"0","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group" style="margin-top:0;margin-bottom:var(--wp--preset--spacing--30)">
			<!-- wp:post-featured-image {"isLink":true,"style":{"spacing":{"margin":{"top":"0","bottom":"var:preset|spacing|10"}},"border":{"radius":"18px"}}} /-->

			<!-- wp:group {"style":{"elements":{"link":{"color":{"text":"#b89d92"}}},"spacing":{"blockGap":"6px","margin":{"top":"0","bottom":"10px"}},"color":{"text":"#b89d92"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group has-text-color has-link-color" style="color:#b89d92;margin-top:0;margin-bottom:10px">
				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size">Posted by</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-author-name /-->

				<!-- wp:paragraph {"fontSize":"small"} -->
				<p class="has-small-font-size">on</p>
				<!-- /wp:paragraph -->

				<!-- wp:post-date {"textAlign":"left","fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->

			<!-- wp:post-title {"textAlign":"left","level":3,"isLink":true,"className":"brandy-link-underline-to-child brandy-text-ellipsis-2","style":{"spacing":{"margin":{"top":"0","bottom":"10px","left":"0","right":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-primary-text"} /-->

			<!-- wp:post-excerpt {"moreText":"Read more →","excerptLength":10,"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}} /-->
		</div>
		<!-- /wp:group -->
		<!-- /wp:post-template -->

		<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"layout":{"type":"flex","justifyContent":"center"}} -->
		<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
			<!-- wp:button {"className":"is-style-outline","fontSize":"base"} -->
			<div class="wp-block-button has-custom-font-size is-style-outline has-base-font-size"><a
					class="wp-block-button__link wp-element-button" href="https://brandy-dev.test?page_id=13">View
					more</a></div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->
	</div>
	<!-- /wp:query -->
</div>
<!-- /wp:group -->