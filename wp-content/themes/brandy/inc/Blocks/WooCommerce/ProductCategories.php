<?php

namespace Brandy\Blocks\WooCommerce;

use Brandy\Traits\SingletonTrait;

/**
 * Override WP latest posts block
 */
class ProductCategories
{
	use SingletonTrait;

	protected function __construct()
	{
		add_filter('block_type_metadata_settings', array($this, 'override_callback'), 10, 2);
		add_filter('brandy_blocks_data', array($this, 'add_block_data'));
	}

	/**
	 * Override block callback
	 */
	public function override_callback($settings, $metadata)
	{
		if ('woocommerce/product-categories' === $metadata['name']) {
			$settings['render_callback'] = array($this, 'render_callback');
		}
		return $settings;
	}

	/**
	 * Override Gutenberg code to render post featured image.
	 * Return placeholder when there is no featured image.
	 */
	public function render_callback($attributes, $content, $block)
	{

		$has_count       = $attributes['hasCount'];
		$has_empty       = $attributes['hasEmpty'];
		$has_image       = $attributes['hasImage'];
		$has_slider      = true;
		$has_navigation  = true;
		$container_class = '';
		if (isset($attributes['align']) && 'wide' === $attributes['align']) {
			$container_class .= ' alignwide';
		}
		if ($has_slider) {
			$container_class .= ' swiper';
		}

		$items = '';

		$item_markup = '
		<li class="wc-block-product-categories-list-item' . ($has_slider ? ' swiper-slide' : '') . '">
			<a href="%1s">
				<span class="wc-block-product-categories-list-item__image">
					%2s
				</span>
				<span class="wc-block-product-categories-list-item__content' . ($has_count ? ' has-count' : '') . '">
					<span class="wc-block-product-categories-list-item__name">%3s</span>'
			. ($has_count ? '<span class="brandy-product-categories-list-item-count">%4s</span>' : '') .
			'<span class="wc-block-product-categories-list-item-hidden-content">View products →</span>
				</span>
			</a>
		</li>
		';

		$categories = get_categories(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => ! $has_empty,
			)
		);

		foreach ($categories as $cat) {
			$thumbnail_id = get_term_meta($cat->term_id, 'thumbnail_id', true);
			$image        = wp_get_attachment_image($thumbnail_id, 800);
			$items       .= sprintf(
				$item_markup,
				get_category_link($cat),
				empty($image) ? \wc_placeholder_img(800) : $image,
				$cat->name,
				sprintf('%s %s', $cat->category_count, _n('item', 'items', $cat->category_count, 'brandy'))
			);
		}

		$navigation = $has_navigation ? '
		<div class="wc-block-product-categories-navigation">
				<span class="wc-block-product-categories-navigation--back"><svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 11L1 6L6 1" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
				<span class="wc-block-product-categories-navigation--next"><svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L1 11" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
			</div>
		' : '';

		$content = sprintf(
			'
		<div data-block-name="woocommerce/product-categories" class="wp-block-woocommerce-product-categories wc-block-product-categories brandy-product-categories-list %1$s">
			%2$s
			<ul class="wc-block-product-categories-list' . ($has_slider ? ' swiper-wrapper' : '') . '">
			%3$s
			</ul>
		</div>
		',
			$container_class,
			$navigation,
			$items
		);

		return apply_filters('brandy/woocommerce/product-categories', $content, $attributes, $block);
	}

	public function add_block_data($data)
	{
		$data['woocommerce/product-categories'] = array(
			'swiper' => array(
				'selector'     => '.brandy-product-categories-list:not(.block-editor-block-list__block)',
				'nextSelector' => '.wc-block-product-categories-navigation--next',
				'backSelector' => '.wc-block-product-categories-navigation--back',
				'data'         => array(
					'direction'    => 'horizontal',
					'spaceBetween' => 20,
					'navigation'   => array(
						'nextEl' => '.wc-block-product-categories-navigation--next',
						'prevEl' => '.wc-block-product-categories-navigation--back',
					),
					'breakpoints'  => array(
						'1200' => array(
							'slidesPerView' => 5,
						),
						'1000' => array(
							'slidesPerView' => 4,
						),
						'800'  => array(
							'slidesPerView' => 3,
						),
						'600'  => array(
							'slidesPerView' => 2,
						),
						'400'  => array(
							'slidesPerView' => 1,
						),
					),
				),
			),
		);
		return $data;
	}
}
