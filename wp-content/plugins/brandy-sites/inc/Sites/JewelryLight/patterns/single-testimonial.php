<?php
/**
 * Title: Brandy Single Testimonial
 * Slug: brandy/single-testimonial
 * Categories: testimonials, brandy
 * Viewport width: 1400
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|70"},"padding":{"right":"var:preset|spacing|30","left":"var:preset|spacing|30"}}},"className":"brandy-single-testimonial-pattern","layout":{"type":"constrained","contentSize":""}} -->
<div class="wp-block-group brandy-single-testimonial-pattern"
	style="margin-bottom:var(--wp--preset--spacing--70);padding-right:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)">
	<!-- wp:group {"align":"wide","style":{"color":{"background":"#f8f9fb"},"border":{"radius":"15px"},"spacing":{"padding":{"top":"var:preset|spacing|50","bottom":"var:preset|spacing|50","left":"var:preset|spacing|60","right":"var:preset|spacing|60"},"margin":{"bottom":"0"},"blockGap":"0rem"}},"layout":{"type":"flex","orientation":"vertical","justifyContent":"center"}} -->
	<div class="wp-block-group alignwide has-background"
		style="border-radius:15px;background-color:#f8f9fb;margin-bottom:0;padding-top:var(--wp--preset--spacing--50);padding-right:var(--wp--preset--spacing--60);padding-bottom:var(--wp--preset--spacing--50);padding-left:var(--wp--preset--spacing--60)">
		<!-- wp:image {"width":"65px","height":"65px","scale":"contain","sizeSlug":"large","style":{"color":[]},"className":"is-style-rounded"} -->
		<figure class="wp-block-image size-large is-resized is-style-rounded"><img
				src="http://img.wpbrandy.com/uploads/testimonial-avatar.png" alt=""
				style="object-fit:contain;width:65px;height:65px" /></figure>
		<!-- /wp:image -->

		<!-- wp:heading {"textAlign":"center","style":{"spacing":{"margin":{"bottom":"var:preset|spacing|30","top":"var:preset|spacing|30"}},"typography":{"lineHeight":"1.5","fontStyle":"normal","fontWeight":"400"}},"className":"brandy-single-testimonial-pattern__heading","fontSize":"responsive_h2","fontFamily":"outfit"} -->
		<h2 class="wp-block-heading has-text-align-center brandy-single-testimonial-pattern__heading has-outfit-font-family has-responsive-h-2-font-size"
			style="margin-top:var(--wp--preset--spacing--30);margin-bottom:var(--wp--preset--spacing--30);font-style:normal;font-weight:400;line-height:1.5"><?php echo esc_html__( 'Making a type specimen book, also the leap into electronic typesetting, remain essentially unchanged or avoids pleasure itself the master builder of lorem ipsum amet quist human happiness.', 'brandy-sites' ); ?></h2>
		<!-- /wp:heading -->

		<!-- wp:heading {"textAlign":"center","level":4,"style":{"spacing":{"margin":{"bottom":"6px"}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"fontFamily":"outfit"} -->
		<h4 class="wp-block-heading has-text-align-center has-outfit-font-family"
			style="margin-bottom:6px;font-style:normal;font-weight:500"><?php echo esc_html__( 'Thomas James', 'brandy-sites' ); ?></h4>
		<!-- /wp:heading -->

		<!-- wp:paragraph {"align":"center","style":{"elements":{"link":{"color":{"text":"var:preset|color|brandy-secondary-text"}}}},"textColor":"brandy-secondary-text","fontSize":"small"} -->
		<p
			class="has-text-align-center has-brandy-secondary-text-color has-text-color has-link-color has-small-font-size"><?php echo esc_html__( 'Customer feedback at Google Reviews', 'brandy-sites' ); ?></p>
		<!-- /wp:paragraph -->
	</div>
	<!-- /wp:group -->
</div>
<!-- /wp:group -->