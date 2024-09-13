<?php
/**
 * Title: Brandy Post Author Card
 * Slug: brandy/post-author-card
 * Categories: post, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|40","bottom":"var:preset|spacing|40","left":"var:preset|spacing|40","right":"var:preset|spacing|40"}},"color":{"background":"#f9fafc"},"border":{"radius":"12px"}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group has-background" style="border-radius:12px;background-color:#f9fafc;padding-top:var(--wp--preset--spacing--40);padding-right:var(--wp--preset--spacing--40);padding-bottom:var(--wp--preset--spacing--40);padding-left:var(--wp--preset--spacing--40)"><!-- wp:avatar {"size":72,"isLink":true,"style":{"layout":{"selfStretch":"fit","flexSize":null},"border":{"radius":"100px"}}} /-->
	
	<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"layout":{"type":"flex","orientation":"vertical"}} -->
	<div class="wp-block-group"><!-- wp:paragraph {"style":{"typography":{"fontSize":"12px"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} -->
	<p class="has-brandy-secondary-text-color has-text-color has-link-color" style="font-size:12px"><?php echo esc_html__( 'WRITTEN BY', 'brandy' ); ?></p>
	<!-- /wp:paragraph -->
	
	<!-- wp:post-author-name {"style":{"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontSize":"large"} /-->
	
	<!-- wp:post-author-biography {"style":{"spacing":{"margin":{"top":"var:preset|spacing|10"}}}} /--></div>
	<!-- /wp:group --></div>
	<!-- /wp:group -->
