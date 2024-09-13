<?php
/**
 * Title: Brandy Testimonial two columns
 * Slug: brandy/testimonial-two-columns
 * Categories: text, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"color":{"background":"#fafafa"},"spacing":{"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30","top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"},"margin":{"top":"var:preset|spacing|60","bottom":"var:preset|spacing|60"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-background"
	style="background-color:#fafafa;margin-top:var(--wp--preset--spacing--60);margin-bottom:var(--wp--preset--spacing--60);padding-top:var(--wp--preset--spacing--60);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--60);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:heading {"textAlign":"center","fontSize":"responsive_h2"} -->
	<h2 class="wp-block-heading has-text-align-center has-responsive-h-2-font-size"><?php echo esc_html__( 'Why people choose us', 'brandy' ); ?></h2>
	<!-- /wp:heading -->

	<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text"} -->
	<p class="has-text-align-center has-brandy-secondary-text-color has-text-color has-link-color"><?php echo esc_html__( 'We take pride in delivering top-notch kitchen house products', 'brandy' ); ?><br><?php echo esc_html__( 'that not only enhance the functionality of your space but also bring joy to your daily cooking experiences.', 'brandy' ); ?></p>
	<!-- /wp:paragraph -->

	<!-- wp:columns {"align":"wide","style":{"spacing":{"margin":{"top":"3rem"}}}} -->
	<div class="wp-block-columns alignwide" style="margin-top:3rem"><!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"25px","left":"25px","top":"25px","bottom":"25px"},"blockGap":"25px"}},"backgroundColor":"brandy-theme-background","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group has-brandy-theme-background-background-color has-background"
				style="padding-top:25px;padding-right:25px;padding-bottom:25px;padding-left:25px">
				<!-- wp:image {"scale":"cover","sizeSlug":"large","style":{"layout":{"selfStretch":"fixed","flexSize":""}}} -->
				<figure class="wp-block-image size-large"><img
						src="http://img.wpbrandy.com/uploads/houseware-testimonial-avatar-1.png" alt=""
						style="object-fit:cover" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group"><!-- wp:paragraph -->
					<p>“ 
					<?php
					echo esc_html__( 'As a passionate home chef, I\'m always on the lookout for kitchen tools that make my life easier . The pans from “Houseware” did just that ! It\'s not only aesthetically pleasing but also incredibly functional. I highly recommend it to anyone who values quality in their kitchen', 'brandy' );
					?>
					”</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="font-style:normal;font-weight:600">Michael P. - Home Chef</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column -->
		<div class="wp-block-column">
			<!-- wp:group {"style":{"spacing":{"padding":{"right":"25px","left":"25px","top":"25px","bottom":"25px"},"blockGap":"25px"}},"backgroundColor":"brandy-theme-background","layout":{"type":"flex","flexWrap":"nowrap","verticalAlignment":"top"}} -->
			<div class="wp-block-group has-brandy-theme-background-background-color has-background"
				style="padding-top:25px;padding-right:25px;padding-bottom:25px;padding-left:25px">
				<!-- wp:image {"scale":"cover","sizeSlug":"large"} -->
				<figure class="wp-block-image size-large"><img
						src="http://img.wpbrandy.com/uploads/houseware-testimonial-avatar-2.png" alt=""
						style="object-fit:cover" /></figure>
				<!-- /wp:image -->

				<!-- wp:group {"style":{"spacing":{"blockGap":"20px"}},"layout":{"type":"flex","orientation":"vertical"}} -->
				<div class="wp-block-group"><!-- wp:paragraph -->
					<p>“ <?php echo esc_html__( 'Being a busy mom, I needed kitchen products that are durable and efficient. The [Product Name] from [Your Company Name] has been a game-changer for me. It\'s easy to clean, and its thoughtful design has made meal preparation a breeze. I\'m so glad I found this gem!', 'brandy' ); ?>”</p>
					<!-- /wp:paragraph -->

					<!-- wp:paragraph {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"fontSize":"small"} -->
					<p class="has-small-font-size" style="font-style:normal;font-weight:600">Emily G. - Busy Mom</p>
					<!-- /wp:paragraph -->
				</div>
				<!-- /wp:group -->
			</div>
			<!-- /wp:group -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->
