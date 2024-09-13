<?php
/**
 * Title: Brandy Popular Search
 * Slug: brandy/popular-search
 * Categories: banner, brandy, ebook
 * Viewport width: 600
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"var:preset|spacing|50"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="margin-top:var(--wp--preset--spacing--50)">
	<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","letterSpacing":"1.1px"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"extra_small"} -->
	<p class="has-brandy-secondary-text-color has-text-color has-link-color has-extra-small-font-size"
		style="font-style:normal;font-weight:500;letter-spacing:1.1px"><?php echo esc_html__('POPULAR SEARCH:', 'brandy-sites') ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:buttons {"style":{"spacing":{"blockGap":"12px"}}} -->
	<div class="wp-block-buttons">
		<!-- wp:button {"textColor":"brandy-primary-text","style":{"color":{"background":"#f6f8ff"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"border":{"radius":"12px"}}} -->
		<div class="wp-block-button"><a
				class="wp-block-button__link has-brandy-primary-text-color has-text-color has-background has-link-color wp-element-button"
				href="<?php echo home_url( '?s=strategy%20business' ); ?>" style="border-radius:12px;background-color:#f6f8ff"><?php echo esc_html__('Strategy Business', 'brandy-sites'); ?> <img class="wp-image-61"
					style="width: 14px;" src="http://img.wpbrandy.com/uploads/s-arrow.png"
					alt=""></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"textColor":"brandy-primary-text","style":{"color":{"background":"#f6f8ff"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"border":{"radius":"12px"}}} -->
		<div class="wp-block-button"><a
				class="wp-block-button__link has-brandy-primary-text-color has-text-color has-background has-link-color wp-element-button"
				href="<?php echo home_url( '?s=fiction%20books' ); ?>" style="border-radius:12px;background-color:#f6f8ff"><?php echo esc_html__('Fiction Books', 'brandy-sites'); ?> <img class="wp-image-61"
					style="width: 14px;" src="http://img.wpbrandy.com/uploads/s-arrow.png"
					alt=""></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"textColor":"brandy-primary-text","style":{"color":{"background":"#f6f8ff"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"border":{"radius":"12px"}}} -->
		<div class="wp-block-button"><a
				class="wp-block-button__link has-brandy-primary-text-color has-text-color has-background has-link-color wp-element-button"
				href="<?php echo home_url( '?s=reveal%20zodiac' ); ?>" style="border-radius:12px;background-color:#f6f8ff"><?php echo esc_html__(' Reveal Zodiac', 'brandy-sites' ); ?> <img class="wp-image-61"
					style="width: 14px;" src="http://img.wpbrandy.com/uploads/s-arrow.png"
					alt=""></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"textColor":"brandy-primary-text","style":{"color":{"background":"#f6f8ff"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"border":{"radius":"12px"}}} -->
		<div class="wp-block-button"><a
				class="wp-block-button__link has-brandy-primary-text-color has-text-color has-background has-link-color wp-element-button"
				href="<?php echo home_url( '?s=detective' ); ?>" style="border-radius:12px;background-color:#f6f8ff"><?php echo esc_html__( 'Detective', 'brandy-sites' ); ?> <img class="wp-image-61"
					style="width: 14px;" src="http://img.wpbrandy.com/uploads/s-arrow.png"
					alt=""></a></div>
		<!-- /wp:button -->

		<!-- wp:button {"textColor":"brandy-primary-text","style":{"color":{"background":"#f6f8ff"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"border":{"radius":"12px"}}} -->
		<div class="wp-block-button"><a
				class="wp-block-button__link has-brandy-primary-text-color has-text-color has-background has-link-color wp-element-button"
				href="<?php echo home_url( '?s=family%20and%20romance%20love' ); ?>" style="border-radius:12px;background-color:#f6f8ff"><?php echo esc_html__('Family and Romance Loves', 'brandy-sites' ); ?> <img
					class="wp-image-61" style="width: 14px;"
					src="http://img.wpbrandy.com/uploads/s-arrow.png" alt=""></a></div>
		<!-- /wp:button -->
	</div>
	<!-- /wp:buttons -->
</div>
<!-- /wp:group -->