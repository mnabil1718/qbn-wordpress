<?php
/**
 * Title: Brandy Hero Banner
 * Slug: brandy/hero-banner
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/christmas-hero-banner.png","id":81,"source":"file","title":"christmas-hero-banner"},"backgroundPosition":"50% 0"},"dimensions":{"minHeight":""},"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","style":{"dimensions":{"minHeight":"750px"}},"layout":{"type":"flex","orientation":"vertical","verticalAlignment":"center"}} -->
	<div class="wp-block-group alignwide" style="min-height:750px">
		<!-- wp:group {"align":"wide","layout":{"type":"constrained","contentSize":"640px"}} -->
		<div class="wp-block-group alignwide">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"}}},"layout":{"type":"flex","flexWrap":"nowrap"}} -->
			<div class="wp-block-group" style="padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
				<!-- wp:group {"style":{"color":{"background":"#205e40"},"elements":{"link":{"color":{"text":"var:preset|color|brandy-theme-background"}}},"spacing":{"padding":{"top":"4px","bottom":"4px","left":"12px","right":"12px"}},"border":{"radius":"8px"}},"textColor":"brandy-theme-background","layout":{"type":"constrained"}} -->
				<div class="wp-block-group has-brandy-theme-background-color has-text-color has-background has-link-color"
					style="border-radius:8px;background-color:#205e40;padding-top:4px;padding-right:12px;padding-bottom:4px;padding-left:12px">
					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"uppercase","letterSpacing":"1.1px"}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="font-style:normal;font-weight:500;letter-spacing:1.1px;text-transform:uppercase">
						<?php esc_html_e( 'Sale up to 50%', 'brandy' ); ?>
					</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->

			<!-- wp:heading {"style":{"typography":{"fontSize":"3.25rem","fontStyle":"normal","fontWeight":"400"},"color":{"text":"#fefefe"},"elements":{"link":{"color":{"text":"#fefefe"}}},"spacing":{"margin":{"top":"20px"}}}} -->
			<h2 class="wp-block-heading has-text-color has-link-color"
				style="color:#fefefe;margin-top:20px;font-size:3.25rem;font-style:normal;font-weight:400">
				<?php _e( 'Limited-Time <br>Christmas Holiday Offer!', 'brandy' ); ?>
			</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"#ffffffa1"}}},"color":{"text":"#ffffffa1"},"typography":{"fontStyle":"normal","fontWeight":"300"}},"fontSize":"2xl"} -->
			<p class="has-text-color has-link-color has-2-xl-font-size" style="color:#ffffffa1;font-style:normal;font-weight:300">
				<?php esc_html_e( 'Your Chance to Upgrade Your Wardrobe with Versatile Styles and Flattering Fits Today', 'brandy' ); ?>
			</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"top":"var:preset|spacing|40"}}}} -->
			<div class="wp-block-buttons" style="margin-top:var(--wp--preset--spacing--40)">
				<!-- wp:button {"className":"is-style-fill brandy-secondary-button","style":{"border":{"radius":"22px"},"spacing":{"padding":{"top":"17px","bottom":"17px"}}},"fontSize":"base"} -->
				<div
					class="wp-block-button has-custom-font-size is-style-fill brandy-secondary-button has-base-font-size">
					<a class="wp-block-button__link wp-element-button"
						style="border-radius:22px;padding-top:17px;padding-bottom:17px">
						<?php esc_html_e( 'Shop Now', 'brandy' ); ?> ⇾
					</a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->