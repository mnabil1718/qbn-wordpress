<?php
/**
 * Title: Brandy sidebar trending posts
 * Slug: brandy/sidebar-trending-posts
 * Categories: brandy, post, sidebar
 * Viewport width: 500
 */
?>

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|10"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:heading {"level":3} -->
		<h3 class="wp-block-heading"><?php echo esc_html__( 'Trending posts', 'brandy' ); ?></h3>
		<!-- /wp:heading -->

		<!-- wp:query {"queryId":39,"query":{"perPage":3,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
		<div class="wp-block-query">
			<!-- wp:post-template {"style":{"spacing":{"blockGap":"var:preset|spacing|30"}},"layout":{"type":"default","columnCount":3}} -->
			<!-- wp:separator {"opacity":"css"} -->
			<hr class="wp-block-separator has-css-opacity" />
			<!-- /wp:separator -->

			<!-- wp:columns {"verticalAlignment":"center","isStackedOnMobile":false,"style":{"spacing":{"blockGap":{"left":"15px"},"margin":{"top":"0","bottom":"0"}}}} -->
			<div class="wp-block-columns are-vertically-aligned-center is-not-stacked-on-mobile"
				style="margin-top:0;margin-bottom:0"><!-- wp:column {"verticalAlignment":"center","width":"92px"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:92px">
					<!-- wp:post-featured-image {"isLink":true,"height":"70px","align":"wide","style":{"border":{"radius":"7px"}}} /-->
				</div>
				<!-- /wp:column -->

				<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
				<div class="wp-block-column is-vertically-aligned-center">
					<!-- wp:post-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"},":hover":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"typography":{"fontStyle":"normal","fontWeight":"300"}},"textColor":"brandy-secondary-text","fontSize":"small"} /-->

					<!-- wp:post-title {"level":5,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"brandy-primary-text","className":"brandy-link-underline-to-child brandy-text-ellipsis-2"} /-->
				</div>
				<!-- /wp:column -->
			</div>
			<!-- /wp:columns -->
			<!-- /wp:post-template -->
		</div>
		<!-- /wp:query -->
	</div>
	<!-- /wp:group -->
