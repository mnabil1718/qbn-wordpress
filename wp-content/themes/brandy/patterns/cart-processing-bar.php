<?php
/**
 * Title: Brandy Cart Processing bar
 * Slug: brandy/cart-processing-bar
 * Categories: brandy
 * Viewport width: 500
 */
?>

<!-- wp:group {"className":"brandy-processing-bar","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group brandy-processing-bar">
	<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group"><!-- wp:buttons {"style":{"layout":{"selfStretch":"fixed","flexSize":"30px"}}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"backgroundColor":"brandy-primary-black","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"11px","right":"11px","top":"5px","bottom":"5px"}},"typography":{"fontStyle":"normal","fontWeight":"700"},"color":{"text":"#fefefe"},"elements":{"link":{"color":{"text":"#fefefe"}}}},"fontSize":"large_to_small"} -->
			<div class="wp-block-button has-custom-font-size has-large-to-small-font-size"
				style="font-style:normal;font-weight:700"><a
					class="wp-block-button__link has-brandy-primary-black-background-color has-text-color has-background has-link-color wp-element-button"
					href="#"
					style="border-radius:100px;color:#fefefe;padding-top:5px;padding-right:11px;padding-bottom:5px;padding-left:11px"><strong>1</strong></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-black"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"brandy-primary-black","fontSize":"large_to_small"} -->
		<p class="has-brandy-primary-black-color has-text-color has-link-color has-large-to-small-font-size"
			style="font-style:normal;font-weight:600"><?php echo esc_html__( 'My cart', 'brandy' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"style":{"layout":{"selfStretch":"fixed","flexSize":"60px"},"color":{"background":"#d3dce580"}}} -->
	<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background"
		style="background-color:#d3dce580;color:#d3dce580" />
	<!-- /wp:separator -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"8px"}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group"><!-- wp:buttons {"style":{"layout":{"selfStretch":"fixed","flexSize":"30px"}}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"textColor":"brandy-secondary-text","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"10px","right":"10px","top":"5px","bottom":"5px"}},"typography":{"fontStyle":"normal","fontWeight":"700"},"color":{"background":"#f9f9f9"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"fontSize":"large_to_small"} -->
			<div class="wp-block-button has-custom-font-size has-large-to-small-font-size"
				style="font-style:normal;font-weight:700"><a
					class="wp-block-button__link has-brandy-secondary-text-color has-text-color has-background has-link-color wp-element-button"
					href="#"
					style="border-radius:100px;background-color:#f9f9f9;padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px"><strong>2</strong></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"brandy-secondary-text","fontSize":"large_to_small"} -->
		<p class="has-brandy-secondary-text-color has-text-color has-link-color has-large-to-small-font-size"
			style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Shipping detail', 'brandy' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->

	<!-- wp:separator {"style":{"layout":{"selfStretch":"fixed","flexSize":"60px"},"color":{"background":"#d3dce580"}}} -->
	<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background"
		style="background-color:#d3dce580;color:#d3dce580" />
	<!-- /wp:separator -->

	<!-- wp:group {"style":{"spacing":{"blockGap":"8px"},"layout":{"selfStretch":"fit","flexSize":null}},"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
	<div class="wp-block-group"><!-- wp:buttons {"style":{"layout":{"selfStretch":"fixed","flexSize":"30px"}}} -->
		<div class="wp-block-buttons">
			<!-- wp:button {"textColor":"brandy-secondary-text","style":{"border":{"radius":"100px"},"spacing":{"padding":{"left":"10px","right":"10px","top":"5px","bottom":"5px"}},"typography":{"fontStyle":"normal","fontWeight":"700"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"color":{"background":"#f9f9f9"}},"fontSize":"large_to_small"} -->
			<div class="wp-block-button has-custom-font-size has-large-to-small-font-size"
				style="font-style:normal;font-weight:700"><a
					class="wp-block-button__link has-brandy-secondary-text-color has-text-color has-background has-link-color wp-element-button"
					href="#"
					style="border-radius:100px;background-color:#f9f9f9;padding-top:5px;padding-right:10px;padding-bottom:5px;padding-left:10px"><strong>3</strong></a>
			</div>
			<!-- /wp:button -->
		</div>
		<!-- /wp:buttons -->

		<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}},"typography":{"fontStyle":"normal","fontWeight":"600"},"layout":{"selfStretch":"fit","flexSize":null}},"textColor":"brandy-secondary-text","fontSize":"large_to_small"} -->
		<p class="has-brandy-secondary-text-color has-text-color has-link-color has-large-to-small-font-size"
			style="font-style:normal;font-weight:600"><?php echo esc_html__( 'Complete', 'brandy' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->
