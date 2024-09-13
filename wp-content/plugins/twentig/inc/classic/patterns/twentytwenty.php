<?php 

twentig_register_block_pattern(
	'twentig/text-columns-and-image-at-the-bottom',
	array(
		'title'      => __( 'Text columns and image at the bottom', 'twentig' ),
		'categories' => array( 'text-image' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:columns {"align":"wide","className":"tw-mb-8","twGutter":"large","twStack":"md"} --><div class="wp-block-columns alignwide tw-mb-8 tw-gutter-large tw-cols-stack-md"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading --><h2>' . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent taciti sociosqu ad litora torquent per conubia. Maecenas laoreet sem tellus in fermentum.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:image {"align":"wide","className":"tw-mt-8"} --><figure class="wp-block-image alignwide tw-mt-8"><img src="' . twentig_get_pattern_asset( 'wide.jpg' ) . '" alt=""/></figure><!-- /wp:image --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/text-columns-and-image-at-the-top',
	array(
		'title'      => __( 'Text columns and image at the top', 'twentig' ),
		'categories' => array( 'text-image' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:image {"align":"wide","className":"tw-mb-8"} --><figure class="wp-block-image alignwide tw-mb-8"><img src="' . twentig_get_pattern_asset( 'wide.jpg' ) . '" alt=""/></figure><!-- /wp:image --><!-- wp:columns {"align":"wide","className":"tw-mt-8","twGutter":"large","twStack":"md"} --><div class="wp-block-columns alignwide tw-mt-8 tw-gutter-large tw-cols-stack-md"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading --><h2>' . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Class aptent taciti sociosqu ad litora torquent per conubia. Maecenas laoreet sem tellus in fermentum.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/heading-with-alternating-text-and-image',
	array(
		'title'      => __( 'Heading with alternating text and image', 'twentig' ),
		'categories' => array( 'text-image' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:media-text {"mediaType":"image","mediaWidth":49} --><div class="wp-block-media-text alignwide is-stacked-on-mobile" style="grid-template-columns:49% auto"><figure class="wp-block-media-text__media"><img src="' . twentig_get_pattern_asset( 'landscape1.jpg' ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"fontSize":"h4"} --><h3 class="has-h-4-font-size">' . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed ullamcorper at metus.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --><!-- wp:media-text {"mediaPosition":"right","mediaType":"image","mediaWidth":49} --><div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile" style="grid-template-columns:auto 49%"><figure class="wp-block-media-text__media"><img src="' . twentig_get_pattern_asset( 'landscape2.jpg' ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"fontSize":"h4"} --><h3 class="has-h-4-font-size">' . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Integer enim risus suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna eu congue velit. Proin varius libero sit amet tortor volutpat diam tincidunt.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/horizontal-cards',
	array(
		'title'      => __( 'Horizontal cards', 'twentig' ),
		'categories' => array( 'text-image' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:media-text {"mediaType":"image","imageFill":true,"className":"is-style-tw-shadow"} --><div class="wp-block-media-text alignwide is-stacked-on-mobile is-image-fill is-style-tw-shadow"><figure class="wp-block-media-text__media" style="background-image:url(' . twentig_get_pattern_asset( 'landscape1.jpg' ) . ');background-position:50% 50%"><img src="' . twentig_get_pattern_asset( 'landscape1.jpg' ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"fontSize":"h4"} --><h3 class="has-h-4-font-size">' . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed ullamcorper metus.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --><!-- wp:media-text {"mediaType":"image","imageFill":true,"className":"is-style-tw-shadow"} --><div class="wp-block-media-text alignwide is-stacked-on-mobile is-image-fill is-style-tw-shadow"><figure class="wp-block-media-text__media" style="background-image:url(' . twentig_get_pattern_asset( 'landscape2.jpg' ) . ');background-position:50% 50%"><img src="' . twentig_get_pattern_asset( 'landscape2.jpg' ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":3,"fontSize":"h4"} --><h3 class="has-h-4-font-size">' . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Integer enim risus suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna eu congue velit. Proin varius libero sit amet tortor volutpat diam tincidunt.</p><!-- /wp:paragraph --></div></div><!-- /wp:media-text --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/2-text-columns-and-image',
	array(
		'title'      => __( '2 text columns and image', 'twentig' ),
		'categories' => array( 'text-image' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:image {"align":"wide","className":"tw-mb-8 tw-mt-8"} --><figure class="wp-block-image alignwide tw-mb-8 tw-mt-8"><img src="' . twentig_get_pattern_asset( 'wide.jpg' ) . '" alt=""/></figure><!-- /wp:image --><!-- wp:columns {"align":"wide","className":"tw-mt-8","twGutter":"large"} --><div class="wp-block-columns alignwide tw-mt-8 tw-gutter-large"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"h5"} --><h3 class="has-h-5-font-size">' . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"h5"} --><h3 class="has-h-5-font-size">' . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Integer enim risus, suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna, eu congue velit. Integer enim risus suscipit eu iaculis sed, ullamcorper at metus. Proin varius libero sit amet tortor volutpat.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/3-text-columns-and-image/',
	array(
		'title'      => __( '3 text columns and image', 'twentig' ),
		'categories' => array( 'text-image' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:image {"align":"wide","className":"tw-mt-8 tw-mb-8"} --><figure class="wp-block-image alignwide tw-mt-8 tw-mb-8"><img src="' . twentig_get_pattern_asset( 'wide.jpg' ) . '" alt=""/></figure><!-- /wp:image --><!-- wp:columns {"align":"wide","className":"tw-mt-8"} --><div class="wp-block-columns alignwide tw-mt-8"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"h5"} --><h3 class="has-h-5-font-size">' . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"h5"} --><h3 class="has-h-5-font-size">' . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Integer enim risus, suscipit eu iaculis sed, ullamcorper at metus. Venenatis nec convallis magna, eu congue velit.</p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"h5"} --><h3 class="has-h-5-font-size">' . esc_html_x( 'Third item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien libero.</p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/testimonials-2-columns-x-2',
	array(
		'title'      => __( 'Testimonials 2 columns x 2', 'twentig' ),
		'categories' => array( 'testimonials' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'What our customers are saying about us', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:columns {"align":"wide","twGutter":"large"} --><div class="wp-block-columns alignwide tw-gutter-large"><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"align":"center","className":"is-style-tw-icon"} --><blockquote class="wp-block-quote has-text-align-center is-style-tw-icon"><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod tempor incididunt ut labore dolore.</p><cite>David Lin, ' . esc_html_x( 'Teacher', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"align":"center","className":"is-style-tw-icon"} --><blockquote class="wp-block-quote has-text-align-center is-style-tw-icon"><p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien.</p><cite>Emily Patel, ' . esc_html_x( 'Developer', 'Block pattern content - Referring to a woman', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:columns {"align":"wide","twGutter":"large"} --><div class="wp-block-columns alignwide tw-gutter-large"><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"align":"center","className":"is-style-tw-icon"} --><blockquote class="wp-block-quote has-text-align-center is-style-tw-icon"><p>Integer enim risus suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna eu congue velit.</p><cite>Richard Garcia, ' . esc_html_x( 'Photographer', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"align":"center","className":"is-style-tw-icon"} --><blockquote class="wp-block-quote has-text-align-center is-style-tw-icon"><p>Duis enim elit porttitor id feugiat at blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet.</p><cite>James Clark, ' . esc_html_x( 'Designer', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/testimonials-3-columns-x-2',
	array(
		'title'      => __( 'Testimonials 3 columns x 2', 'twentig' ),
		'categories' => array( 'testimonials' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'What our customers are saying about us', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:columns {"align":"wide","twStack":"sm"} --><div class="wp-block-columns alignwide tw-cols-stack-sm"><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Duis enim elit porttitor id feugiat.</p><cite>David Lin, ' . esc_html_x( 'Teacher', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Integer enim risus suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna eu congue velit.</p><cite>Emily Patel, ' . esc_html_x( 'Developer', 'Block pattern content - Referring to a woman', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien libero varius libero sit amet.</p><cite>James Clark, ' . esc_html_x( 'Designer', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --></div><!-- /wp:columns --><!-- wp:columns {"align":"wide","twStack":"sm"} --><div class="wp-block-columns alignwide tw-cols-stack-sm"><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet.</p><cite>Julie Miller, ' . esc_html_x( 'Developer', 'Block pattern content - Referring to a woman', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Fusce sed magna eu ligula commodo hendrerit fringilla ac purus. Integer sagittis efficitur rhoncus justo vehicula sapien.</p><cite>Eric Wilson, ' . esc_html_x( 'Designer', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Mauris dui tellus mollis quis varius sit amet ultrices in leo. Cras et purus sit amet velit congue convallis nec id diam.</p><cite>Richard Garcia, ' . esc_html_x( 'Photographer', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/testimonials-3-columns-card-with-icon',
	array(
		'title'      => __( 'Testimonials 3 columns: card with icon', 'twentig' ),
		'categories' => array( 'testimonials' ),
		'content'    => '<!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'What our customers are saying about us', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:columns {"align":"wide","twColumnStyle":"card-border"} --><div class="wp-block-columns alignwide tw-cols-card tw-cols-card-border"><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore et dolore. Duis enim elit porttitor id feugiat.</p><cite>David Lin, ' . esc_html_x( 'Teacher', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Integer enim risus suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna eu congue velit. Proin varius libero diam laoreet. </p><cite>Emily Patel, ' . esc_html_x( 'Developer', 'Block pattern content - Referring to a woman', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:quote {"className":"is-style-tw-icon"} --><blockquote class="wp-block-quote is-style-tw-icon"><p>Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien libero varius libero sit amet.</p><cite>Richard Garcia, ' . esc_html_x( 'Photographer', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group -->',
	)
);

twentig_register_block_pattern(
	'twentig/page-home-3',
	array(
		'title'      => _x( 'Page - Home', 'Block pattern category', 'twentig' ) . ' 3',
		'categories' => array( 'pages' ),
		'content'    => '<!-- wp:group {"align":"full","backgroundColor":"subtle-background"} --><div class="wp-block-group alignfull has-subtle-background-background-color has-background"><!-- wp:media-text {"mediaPosition":"right","mediaType":"image","twStackedMd":true,"twMediaBottom":true} --><div class="wp-block-media-text alignwide has-media-on-the-right is-stacked-on-mobile tw-stack-md tw-media-bottom"><figure class="wp-block-media-text__media"><img src="' . twentig_get_pattern_asset( 'landscape2.jpg' ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:heading {"level":1} --><h1>' . esc_html_x( 'Write the page title', 'Block pattern content', 'twentig' ) . '</h1><!-- /wp:heading --><!-- wp:paragraph {"fontSize":"large"} --><p class="has-large-font-size">Lorem ipsum dolor sit amet, commodo erat adipiscing elit. Sed do eiusmod ut tempor incididunt ut labore.</p><!-- /wp:paragraph --><!-- wp:buttons --><div class="wp-block-buttons"><!-- wp:button --><div class="wp-block-button"><a class="wp-block-button__link">' . esc_html_x( 'Get started', 'Block pattern content', 'twentig' ) . '</a></div><!-- /wp:button --></div><!-- /wp:buttons --></div></div><!-- /wp:media-text --></div><!-- /wp:group --><!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'Write a heading that captivates your audience', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:image {"align":"wide","className":"tw-mt-8 tw-mb-8"} --><figure class="wp-block-image alignwide tw-mt-8 tw-mb-8"><img src="' . twentig_get_pattern_asset( 'wide.jpg' ) . '" alt=""/></figure><!-- /wp:image --><!-- wp:columns {"align":"wide","className":"tw-mt-8"} --><div class="wp-block-columns alignwide tw-mt-8"><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"h5"} --><h3 class="has-h-5-font-size">' . esc_html_x( 'First item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Integer enim risus suscipit eu iaculis sed ullamcorper at metus. Venenatis nec convallis magna eu congue velit. Proin varius libero sit amet tortor volutpat diam tincidunt.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p><a href="#">' . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --><!-- wp:column --><div class="wp-block-column"><!-- wp:heading {"level":3,"fontSize":"h5"} --><h3 class="has-h-5-font-size">' . esc_html_x( 'Second item', 'Block pattern content', 'twentig' ) . '</h3><!-- /wp:heading --><!-- wp:paragraph --><p>Duis enim elit, porttitor id feugiat at, blandit at erat. Proin varius libero sit amet tortor volutpat diam laoreet. Fusce sed magna eu ligula commodo hendrerit fringilla ac purus.</p><!-- /wp:paragraph --><!-- wp:paragraph --><p><a href="#">' . esc_html_x( 'Learn more', 'Block pattern content', 'twentig' ) . '</a></p><!-- /wp:paragraph --></div><!-- /wp:column --></div><!-- /wp:columns --></div><!-- /wp:group --><!-- wp:group {"align":"full","backgroundColor":"subtle-background"} --><div class="wp-block-group alignfull has-subtle-background-background-color has-background"><!-- wp:media-text {"mediaType":"image","twStackedMd":true} --><div class="wp-block-media-text alignwide is-stacked-on-mobile tw-stack-md"><figure class="wp-block-media-text__media"><img src="' . twentig_get_pattern_asset( 'profile.jpg' ) . '" alt=""/></figure><div class="wp-block-media-text__content"><!-- wp:quote {"style":{"typography":{"lineHeight":"1.3","fontSize":"28px"}},"className":"is-style-plain"} --><blockquote class="wp-block-quote is-style-plain" style="font-size:28px;line-height:1.3"><p>"Aliquam tempus mi nulla porta luctus. Sed non neque at lectus bibendum blandit. Morbi fringilla sapien libero. Duis enim elit, porttitor id feugiat at."</p><cite>David Lin, ' . esc_html_x( 'Teacher', 'Block pattern content - Referring to a man', 'twentig' ) . '</cite></blockquote><!-- /wp:quote --></div></div><!-- /wp:media-text --></div><!-- /wp:group --><!-- wp:group {"align":"full"} --><div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center"} --><h2 class="has-text-align-center">' . esc_html_x( 'Latest posts', 'Block pattern content', 'twentig' ) . '</h2><!-- /wp:heading --><!-- wp:latest-posts {"align":"wide","className":"tw-mt-8 tw-img-ratio-3-2 tw-heading-size-medium tw-stretched-link","postsToShow":3,"displayPostDate":true,"postLayout":"grid","displayFeaturedImage":true,"featuredImageSizeSlug":"large"} /--></div><!-- /wp:group -->',
	)
);
