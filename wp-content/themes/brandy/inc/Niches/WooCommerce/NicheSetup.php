<?php

namespace Brandy\Niches\WooCommerce;

use Brandy\Abstracts\AbstractNicheSetup;
use Brandy\Traits\SingletonTrait;

class NicheSetup extends AbstractNicheSetup {
	use SingletonTrait;

	public const NICHE_ID = 'woocommerce';

	public const ROOT_PATH = BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce';

	public const ROOT_URL = BRANDY_TEMPLATE_URL . '/inc/Niches/WooCommerce';

	protected const JSON_FILE = BRANDY_TEMPLATE_DIR . '/styles/woocommerce.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'woocommerce_main_header',
		'checkout' => 'woocommerce_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'woocommerce_main_footer',
		'checkout' => 'woocommerce_checkout_footer',
	);

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo WooCommerce store', 'brandy' ),
			'img'                            => 'http://img.wpbrandy.com/uploads/woo-site-thumbnail.png',
			'demo_url'                       => 'http://img.wpbrandy.com/uploads/woocommerce-preview.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_1',
					'product_thumb_size' => 'size_2',
				),
				'headers'     => array(
					'sample_header'   => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-header.json',
					'checkout_header' => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/checkout-header.json',
				),
				'footers'     => array(
					'sample_footer'   => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-footer.json',
					'checkout_footer' => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/checkout-footer.json',
				),
			),
			'sample_products'                => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-products.csv',
			'sample_product_category_images' => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-product-category-images.json',
			'sample_posts'                   => array(
				'gutenberg' => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-posts.json',
				'elementor' => '',
			),
			'sample_pages'                   => array(
				'gutenberg' => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-pages-gutenberg.json',
				'elementor' => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-pages-elementor.json',
			),
			'sample_menus'                   => array(
				array(
					'name'      => __( 'Shopping menu', 'brandy' ),
					'locations' => array( 'primary-menu', 'header-menu-1' ),
					'items'     => array(
						array(
							'title'  => __( 'Home', 'brandy' ),
							'status' => 'publish',
							'url'    => home_url(),
						),
						array(
							'title'       => __( 'Blog', 'brandy' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_blog_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Shop', 'brandy' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_shop_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Cart', 'brandy' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_cart_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Checkout', 'brandy' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_checkout_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'  => __( 'FAQ', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Contact us', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
					),
				),
				array(
					'name'  => __( 'Customer service', 'brandy' ),
					'items' => array(
						array(
							'title'  => __( 'Shipping & delivery', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Track your order', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Refund policy', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Terms and conditions', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'FAQ', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Contact us', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
					),
				),
				array(
					'name'  => __( 'Special sales menu', 'brandy' ),
					'items' => array(
						array(
							'title'  => __( 'Our best seller', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( '-50% off items', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Buy 3 and pay 2', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Custom order', 'brandy' ),
							'status' => 'publish',
							'url'    => '#',
						),
						'locations' => array( 'secondary-menu', 'header-menu-1' ),
					),
				),
			),
			'sample_widgets'                 => BRANDY_TEMPLATE_DIR . '/inc/Niches/WooCommerce/sample-data/sample-widgets.json',
		);
		return $data;
	}
}
