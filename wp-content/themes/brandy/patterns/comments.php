<?php
/**
 * Title: Brandy Comments
 * Slug: brandy/comments
 * Categories: post, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:comments {"style":{"spacing":{"margin":{"top":"var:preset|spacing|70"}}}} -->
<div class="wp-block-comments" style="margin-top:var(--wp--preset--spacing--70)">
	<!-- wp:post-comments-form {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}}} /-->

	<!-- wp:comments-title {"showPostTitle":false,"level":3} /-->

	<!-- wp:comment-template {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}}}} -->
	<!-- wp:columns {"style":{"spacing":{"blockGap":{"top":"0","left":"var:preset|spacing|20"},"margin":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20"}}}} -->
	<div class="wp-block-columns"
		style="margin-top:var(--wp--preset--spacing--20);margin-bottom:var(--wp--preset--spacing--20)">
		<!-- wp:column {"width":"60px"} -->
		<div class="wp-block-column" style="flex-basis:60px">
			<!-- wp:avatar {"size":60,"isLink":true,"linkTarget":"_blank","style":{"border":{"radius":"100px"}}} /-->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column">
			<!-- wp:comment-author-name {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"0","bottom":"0"}}}} /-->

			<!-- wp:comment-content {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} /-->

			<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"blockGap":"var:preset|spacing|10"}},"layout":{"type":"flex"}} -->
			<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px">
				<!-- wp:comment-edit-link {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"fontSize":"small"} /-->

				<!-- wp:comment-reply-link {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"fontSize":"small"} /-->

				<!-- wp:comment-date {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-secondary-text","fontSize":"small"} /-->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
	<!-- /wp:comment-template -->

	<!-- wp:comments-pagination {"paginationArrow":"arrow","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"},":hover":{"color":{"text":"var:preset|color|brandy-primary-text"}}}}},"textColor":"brandy-secondary-text"} -->
	<!-- wp:comments-pagination-previous /-->

	<!-- wp:comments-pagination-numbers /-->

	<!-- wp:comments-pagination-next /-->
	<!-- /wp:comments-pagination -->
</div>
<!-- /wp:comments -->
