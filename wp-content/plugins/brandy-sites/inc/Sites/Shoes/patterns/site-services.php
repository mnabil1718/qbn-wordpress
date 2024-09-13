<?php
/**
 * Title: Brandy site services
 * Slug: brandy/site-services
 * Categories: footer, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"spacing":{"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"},"padding":{"top":"25px","bottom":"25px","left":"25px","right":"25px"}},"border":{"width":"1px","style":"solid"},"shadow":"var:preset|shadow|brandy-shoes-shadow"},"borderColor":"brandy-primary-text"} -->
	<div class="wp-block-columns alignwide has-border-color has-brandy-primary-text-border-color"
		style="border-style:solid;border-width:1px;padding-top:25px;padding-right:25px;padding-bottom:25px;padding-left:25px;box-shadow:var(--wp--preset--shadow--brandy-shoes-shadow)">
		<!-- wp:column {"verticalAlignment":"stretch","width":"200px","style":{"color":{"text":"#ffffff"},"elements":{"link":{"color":{"text":"#ffffff"}}}},"backgroundColor":"brandy-accent"} -->
		<div class="wp-block-column is-vertically-aligned-stretch has-brandy-accent-background-color has-text-color has-background has-link-color"
			style="color:#ffffff;flex-basis:200px">
			<!-- wp:group {"style":{"dimensions":{"minHeight":"100%"},"spacing":{"blockGap":"0","padding":{"top":"30px","bottom":"30px","left":"30px","right":"30px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center","verticalAlignment":"center"}} -->
			<div class="wp-block-group"
				style="min-height:100%;padding-top:30px;padding-right:30px;padding-bottom:30px;padding-left:30px">
				<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}}} -->
				<p style="font-style:normal;font-weight:600"><?php echo esc_html__( 'REWARDS FOR', 'brandy-sites' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"style":{"typography":{"fontSize":"100px","lineHeight":"0.5"}},"fontFamily":"neonderthaw"} -->
				<p class="has-neonderthaw-font-family" style="font-size:100px;line-height:0.5"><?php echo esc_html__( 'you', 'brandy-sites' ); ?></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"align":"right","style":{"spacing":{"margin":{"top":"20px","left":"43px"}},"typography":{"fontSize":"12px"}}} -->
				<p class="has-text-align-right" style="margin-top:20px;margin-left:43px;font-size:12px"><?php echo esc_html__( 'AWESOMELY', 'brandy-sites' ); ?></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"width":"32px","height":"32px","scale":"cover","sizeSlug":"large"} -->
			<figure class="wp-block-image size-large is-resized"><img
					src="http://img.wpbrandy.com/uploads/money-recive.png" alt=""
					style="object-fit:cover;width:32px;height:32px" /></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"10px","bottom":"5px"}}}} -->
			<p style="margin-top:10px;margin-bottom:5px;font-style:normal;font-weight:600"><?php echo esc_html__( 'Cash Back', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"small"} -->
			<p class="has-brandy-secondary-text-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'You will receive a maximum refund of up to 25%', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"width":"32px","height":"32px","scale":"cover","sizeSlug":"large"} -->
			<figure class="wp-block-image size-large is-resized"><img
					src="http://img.wpbrandy.com/uploads/money-recive.png" alt=""
					style="object-fit:cover;width:32px;height:32px" /></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"10px","bottom":"5px"}}}} -->
			<p style="margin-top:10px;margin-bottom:5px;font-style:normal;font-weight:600"><?php echo esc_html__( 'Free Shipping', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"small"} -->
			<p class="has-brandy-secondary-text-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'No minimum, free express delivery on all orders.', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"width":"32px","height":"32px","scale":"cover","sizeSlug":"large"} -->
			<figure class="wp-block-image size-large is-resized"><img
					src="http://img.wpbrandy.com/uploads/money-recive.png" alt=""
					style="object-fit:cover;width:32px;height:32px" /></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"10px","bottom":"5px"}}}} -->
			<p style="margin-top:10px;margin-bottom:5px;font-style:normal;font-weight:600"><?php echo esc_html__( 'Birthday Gift', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"small"} -->
			<p class="has-brandy-secondary-text-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'We\'ll send a surprise gift on your special day.', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","style":{"spacing":{"blockGap":"0"}}} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:image {"width":"32px","height":"32px","scale":"cover","sizeSlug":"large"} -->
			<figure class="wp-block-image size-large is-resized"><img
					src="http://img.wpbrandy.com/uploads/money-recive.png" alt=""
					style="object-fit:cover;width:32px;height:32px" /></figure>
			<!-- /wp:image -->

			<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"spacing":{"margin":{"top":"10px","bottom":"5px"}}}} -->
			<p style="margin-top:10px;margin-bottom:5px;font-style:normal;font-weight:600"><?php echo esc_html__( 'Support 24/7', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"small"} -->
			<p class="has-brandy-secondary-text-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'Always satisfied with our fast support team.', 'brandy-sites' ); ?></p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center"} -->
		<div class="wp-block-column is-vertically-aligned-center">
			<!-- wp:buttons {"layout":{"type":"flex","justifyContent":"center"}} -->
			<div class="wp-block-buttons"><!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link wp-element-button"><?php echo esc_html__( 'Join Now', 'brandy-sites' ); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->