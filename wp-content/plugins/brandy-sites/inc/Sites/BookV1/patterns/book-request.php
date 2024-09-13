<?php
/**
 * Title: Brandy Book Request
 * Slug: brandy/book-request
 * Categories: banner, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group"
	style="margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:columns {"align":"wide","style":{"color":{"background":"#fff6e9"},"spacing":{"padding":{"right":"0","left":"0","top":"0","bottom":"0"},"blockGap":{"top":"var:preset|spacing|30","left":"var:preset|spacing|30"}},"border":{"radius":"15px"}}} -->
	<div class="wp-block-columns alignwide has-background"
		style="border-radius:15px;background-color:#fff6e9;padding-top:0;padding-right:0;padding-bottom:0;padding-left:0">
		<!-- wp:column {"width":""} -->
		<div class="wp-block-column">
			<!-- wp:image {"scale":"cover","sizeSlug":"large","style":{"border":{"radius":"15px"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img
					src="http://img.wpbrandy.com/uploads/book-request-img-left.png" alt=""
					style="border-radius:15px;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"","layout":{"type":"constrained","contentSize":"600px"}} -->
		<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"layout":{"type":"default"}} -->
			<div class="wp-block-group">
				<!-- wp:heading {"textAlign":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}},"typography":{"fontSize":"30px"}},"textColor":"brandy-primary-text"} -->
				<h2 class="wp-block-heading has-text-align-center has-brandy-primary-text-color has-text-color has-link-color"
					style="font-size:30px"><?php echo esc_html__('Don\'t find the books you want? Send us your specific request.', 'brandy-sites'); ?></h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph {"align":"center","className":"brandy-link-underline-to-child","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-primary-text"}}}},"textColor":"brandy-primary-text"} -->
				<p
					class="has-text-align-center brandy-link-underline-to-child has-brandy-primary-text-color has-text-color has-link-color">
					<a href="#"><?php echo esc_html__('Send request', 'brandy-sites'); ?> →</a></p>
				<!-- /wp:paragraph -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"width":""} -->
		<div class="wp-block-column">
			<!-- wp:image {"scale":"cover","sizeSlug":"large","style":{"border":{"radius":"15px"}}} -->
			<figure class="wp-block-image size-large has-custom-border"><img
					src="http://img.wpbrandy.com/uploads/book-request-img-right.png" alt=""
					style="border-radius:15px;object-fit:cover" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->