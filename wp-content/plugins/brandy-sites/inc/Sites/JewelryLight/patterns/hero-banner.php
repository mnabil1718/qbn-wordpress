<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:cover {"url":"http://img.wpbrandy.com/uploads/jewelry-light-hero-banner-img.png","id":121,"dimRatio":0,"isUserOverlayColor":true,"minHeight":1080,"contentPosition":"top center","isDark":false,"className":"brandy-hero-banner","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"0px","bottom":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-cover is-light has-custom-content-position is-position-top-center brandy-hero-banner has-brandy-primary-text-color has-text-color has-link-color"
	style="margin-bottom:var(--wp--preset--spacing--30);padding-top:0px;padding-right:var(--wp--preset--spacing--30);padding-bottom:0px;padding-left:var(--wp--preset--spacing--30);min-height:1080px">
	<span aria-hidden="true" class="wp-block-cover__background has-background-dim-0 has-background-dim"></span><img
		class="wp-block-cover__image-background wp-image-121" alt=""
		src="http://img.wpbrandy.com/uploads/jewelry-light-hero-banner-img.png"
		data-object-fit="cover" />
	<div class="wp-block-cover__inner-container">
		<!-- wp:group {"style":{"spacing":{"margin":{"top":"12.5rem"}}},"layout":{"type":"constrained","contentSize":"1000px"}} -->
		<div class="wp-block-group" style="margin-top:12.5rem">
			<!-- wp:heading {"textAlign":"center","level":1,"fontSize":"responsive_big_heading"} -->
			<h1 class="wp-block-heading has-text-align-center has-responsive-big-heading-font-size"><?php echo esc_html__( 'Jewelry with Standards', 'brandy-sites' ); ?></h1>
			<!-- /wp:heading -->

			<!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group"><!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center"><?php echo esc_html__( 'Embark on a Journey of Elegance with the Ideal Jewelry for Your Special Moment and Cherished Memories Beyond', 'brandy-sites' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->

			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"},"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)"><!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'EXPLORE NOW', 'brandy-sites' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
</div>
<!-- /wp:cover -->