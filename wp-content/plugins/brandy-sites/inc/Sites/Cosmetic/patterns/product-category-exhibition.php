<?php
/**
 * Title: Brandy Product Category Exhibition
 * Slug: brandy/product-category-exhibition
 * Categories: woocommerce, brandy
 * Viewport width: 1400
 */

 if ( ! \is_wc_installed() ) {
	\brandy_render_install_wc_notice();
	return;
}

?>

<!-- wp:group {"className":"brandy-cosmetic-gallery-exhibition","style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group brandy-cosmetic-gallery-exhibition"
	style="padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","className":"brandy-cosmetic-gallery-exhibition__layout","style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"layout":{"type":"grid","columnCount":3,"minimumColumnWidth":null}} -->
	<div class="wp-block-group alignwide brandy-cosmetic-gallery-exhibition__layout">
		<!-- wp:group {"className":"brandy-cosmetic-product-category-exhibition__intro","style":{"spacing":{"padding":{"top":"0","bottom":"0","left":"0","right":"0"},"margin":{"top":"0","bottom":"0"},"blockGap":"var:preset|spacing|20"}},"layout":{"type":"constrained"}} -->
		<div class="wp-block-group brandy-cosmetic-product-category-exhibition__intro"
			style="margin-top:0;margin-bottom:0;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
			<!-- wp:heading {"fontSize":"4xl"} -->
			<h2 class="wp-block-heading has-4-xl-font-size"><?php echo esc_html__('Shop By Categories', 'brandy'); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p><?php echo esc_html__('Made using clean, non-toxic ingredients, our products are designed for everyone.', 'brandy'); ?></p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|40"}}},"fontSize":"large"} -->
			<div class="wp-block-buttons has-custom-font-size has-large-font-size"
				style="margin-bottom:var(--wp--preset--spacing--40)"><!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link wp-element-button" href="<?php echo esc_url( \brandy_get_shop_page_url() ); ?>"><?php echo esc_html__('View All', 'brandy'); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"brandy-cosmetic-product-category-exhibition__card","style":{"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/cosmetic-makeup-cat.png","id":93,"source":"file","title":"cosmetic-makeup-cat"},"backgroundSize":"cover"},"dimensions":{"minHeight":"300px"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"bottom"}} -->
		<div class="wp-block-group brandy-cosmetic-product-category-exhibition__card"
			style="border-radius:20px;min-height:300px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
			<!-- wp:buttons {"className":"brandy-cosmetic-product-category-exhibition__card__name","layout":{"type":"flex","verticalAlignment":"bottom","justifyContent":"left","orientation":"horizontal"}} -->
			<div class="wp-block-buttons brandy-cosmetic-product-category-exhibition__card__name">
				<!-- wp:button {"className":"is-style-outline","style":{"color":{"text":"#fefefe","background":"#0000001f"},"elements":{"link":{"color":{"text":"#fefefe"}}},"border":{"width":"0px","style":"none"}}} -->
				<div class="wp-block-button is-style-outline"><a
						class="wp-block-button__link has-text-color has-background has-link-color wp-element-button"
						href="#"
						style="border-style:none;border-width:0px;color:#fefefe;background-color:#0000001f"><?php echo esc_html__('Makeup', 'brandy'); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"brandy-cosmetic-product-category-exhibition__card","style":{"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/cosmetic-hair-care-cat.png","id":93,"source":"file","title":"cosmetic-makeup-cat"},"backgroundSize":"cover"},"dimensions":{"minHeight":"300px"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"bottom"}} -->
		<div class="wp-block-group brandy-cosmetic-product-category-exhibition__card"
			style="border-radius:20px;min-height:300px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
			<!-- wp:buttons {"className":"brandy-cosmetic-product-category-exhibition__card__name","layout":{"type":"flex","verticalAlignment":"bottom","justifyContent":"left","orientation":"horizontal"}} -->
			<div class="wp-block-buttons brandy-cosmetic-product-category-exhibition__card__name">
				<!-- wp:button {"className":"is-style-outline","style":{"color":{"text":"#fefefe","background":"#0000001f"},"elements":{"link":{"color":{"text":"#fefefe"}}},"border":{"width":"0px","style":"none"}}} -->
				<div class="wp-block-button is-style-outline"><a
						class="wp-block-button__link has-text-color has-background has-link-color wp-element-button"
						href="#"
						style="border-style:none;border-width:0px;color:#fefefe;background-color:#0000001f"><?php echo esc_html__('Hair Care', 'brandy'); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"brandy-cosmetic-product-category-exhibition__card","style":{"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/cosmetic-skincare-cat.png","id":93,"source":"file","title":"cosmetic-makeup-cat"},"backgroundSize":"cover"},"dimensions":{"minHeight":"300px"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"bottom"}} -->
		<div class="wp-block-group brandy-cosmetic-product-category-exhibition__card"
			style="border-radius:20px;min-height:300px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
			<!-- wp:buttons {"className":"brandy-cosmetic-product-category-exhibition__card__name","layout":{"type":"flex","verticalAlignment":"bottom","justifyContent":"left","orientation":"horizontal"}} -->
			<div class="wp-block-buttons brandy-cosmetic-product-category-exhibition__card__name">
				<!-- wp:button {"className":"is-style-outline","style":{"color":{"text":"#fefefe","background":"#0000001f"},"elements":{"link":{"color":{"text":"#fefefe"}}},"border":{"width":"0px","style":"none"}}} -->
				<div class="wp-block-button is-style-outline"><a
						class="wp-block-button__link has-text-color has-background has-link-color wp-element-button"
						href="#"
						style="border-style:none;border-width:0px;color:#fefefe;background-color:#0000001f"><?php echo esc_html__('Skincare', 'brandy'); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"brandy-cosmetic-product-category-exhibition__card","style":{"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/cosmetic-fragrances-cat.png","id":93,"source":"file","title":"cosmetic-makeup-cat"},"backgroundSize":"cover"},"dimensions":{"minHeight":"300px"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"bottom"}} -->
		<div class="wp-block-group brandy-cosmetic-product-category-exhibition__card"
			style="border-radius:20px;min-height:300px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
			<!-- wp:buttons {"className":"brandy-cosmetic-product-category-exhibition__card__name","layout":{"type":"flex","verticalAlignment":"bottom","justifyContent":"left","orientation":"horizontal"}} -->
			<div class="wp-block-buttons brandy-cosmetic-product-category-exhibition__card__name">
				<!-- wp:button {"className":"is-style-outline","style":{"color":{"text":"#fefefe","background":"#0000001f"},"elements":{"link":{"color":{"text":"#fefefe"}}},"border":{"width":"0px","style":"none"}}} -->
				<div class="wp-block-button is-style-outline"><a
						class="wp-block-button__link has-text-color has-background has-link-color wp-element-button"
						href="#"
						style="border-style:none;border-width:0px;color:#fefefe;background-color:#0000001f"><?php echo esc_html__('Fragrances', 'brandy'); ?></a>
				</div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->

		<!-- wp:group {"className":"brandy-cosmetic-product-category-exhibition__card","style":{"background":{"backgroundImage":{"url":"http://img.wpbrandy.com/uploads/cosmetic-bath-and-body-cat.png","id":93,"source":"file","title":"cosmetic-makeup-cat"},"backgroundSize":"cover"},"dimensions":{"minHeight":"300px"},"border":{"radius":"20px"},"spacing":{"padding":{"top":"15px","bottom":"15px","left":"15px","right":"15px"}}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"left","verticalAlignment":"bottom"}} -->
		<div class="wp-block-group brandy-cosmetic-product-category-exhibition__card"
			style="border-radius:20px;min-height:300px;padding-top:15px;padding-right:15px;padding-bottom:15px;padding-left:15px">
			<!-- wp:buttons {"className":"brandy-cosmetic-product-category-exhibition__card__name","layout":{"type":"flex","verticalAlignment":"bottom","justifyContent":"left","orientation":"horizontal"}} -->
			<div class="wp-block-buttons brandy-cosmetic-product-category-exhibition__card__name">
				<!-- wp:button {"className":"is-style-outline","style":{"color":{"text":"#fefefe","background":"#0000001f"},"elements":{"link":{"color":{"text":"#fefefe"}}},"border":{"width":"0px","style":"none"}}} -->
				<div class="wp-block-button is-style-outline"><a
						class="wp-block-button__link has-text-color has-background has-link-color wp-element-button"
						href="#"
						style="border-style:none;border-width:0px;color:#fefefe;background-color:#0000001f"><?php echo esc_html__('Bath &amp; Body', 'brandy'); ?></a></div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:group -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->