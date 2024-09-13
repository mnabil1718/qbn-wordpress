<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:cover {"url":"http://img.wpbrandy.com/uploads/plants-banner-background.png","id":177,"dimRatio":0,"isUserOverlayColor":true,"isDark":false,"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","layout":{"type":"constrained"}} -->
<div class="wp-block-cover is-light has-brandy-primary-text-color has-text-color has-link-color"><span aria-hidden="true"
		class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img
		class="wp-block-cover__image-background wp-image-177" alt=""
		src="http://img.wpbrandy.com/uploads/plants-banner-background.png" data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"layout":{"type":"constrained","contentSize":"730px","justifyContent":"center"}} -->
		<div class="wp-block-group">

			<!-- wp:pattern {"slug":"brandy/badge-with-shadow"} /-->

			<!-- wp:heading {"textAlign":"center","level":1,"style":{"typography":{"fontSize":"3.5rem"}}} -->
			<h1 class="wp-block-heading has-text-align-center" style="font-size:3.5rem"><?php echo esc_html__( 'Plants Make People Happy', 'brandy-sites' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"constrained","contentSize":"645px"}} -->
			<div class="wp-block-group">
				<!-- wp:paragraph {"align":"center","style":{"typography":{"fontSize":"18px"}}} -->
				<p class="has-text-align-center" style="font-size:18px"><?php echo esc_html__( 'We helps you discover the best plants for your space, delivers them to your door and helps you look after them.', 'brandy-sites' ); ?><?php echo esc_html__( '', 'brandy-sites' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}},"fontSize":"large"} -->
			<div class="wp-block-buttons has-custom-font-size has-large-font-size"
				style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Explore Now', 'brandy-sites' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->