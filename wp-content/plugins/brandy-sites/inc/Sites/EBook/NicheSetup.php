<?php

namespace BrandySites\Sites\EBook;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {
	use SingletonTrait;

	public const NICHE_ID = 'ebook';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/ebook.json';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/EBook';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/EBook';

	protected const REPLACED_HEADERS = array(
		'main'     => 'ebook_main_header',
		'checkout' => 'ebook_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'ebook_main_footer',
		'checkout' => 'ebook_checkout_footer',
	);

	protected function __construct() {
		parent::__construct();

		if ( self::is_current_niche() ) {
			add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );

			add_action(
				'enqueue_block_assets',
				function () {
					global $current_screen;
					if ( ! empty( $current_screen->is_block_editor ) ) {
						$this->enqueue_scripts();
					}
				}
			);

			add_filter(
				'brandy_sites_query_product_layout',
				function () {
					return self::ROOT_PATH . '/views/query-product-layout.php';
				}
			);
			add_filter( 'brandy/woocommerce/product-categories', array( $this, 'woocommerce_product_categories' ), 100, 3 );
			add_filter( 'brandy_blocks_data', array( $this, 'add_block_data' ) );
			$this->add_style_for_product_categories();
		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo E-Book', 'brandy-sites' ),
			'img'                            => 'http://img.wpbrandy.com/uploads/ebook-site-thumb.png',
			'demo_url'                       => 'http://img.wpbrandy.com/uploads/ebook-preview.png',
			'plan'                           => 'free',
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_2',
					'product_thumb_size' => 'size_1',
				),
				'input'       => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 18,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'select'      => array(
					'border' => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 18,
							'min'   => 0,
							'max'   => 100,
						),
					),
				),
				'button'      => array(
					'primary_hover_color'              => '#ffffff',
					'primary_hover_background_color'   => 'var(--wp--preset--color--brandy-accent)',
					'primary_box_shadow'               => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => '#FF7F091A',
							'x'      => 0,
							'y'      => 5,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'primary_hover_box_shadow'         => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(0,0,0,.1)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'outline_hover_color'              => '#ffffff',
					'outline_hover_background_color'   => 'var(--wp--preset--color--brandy-primary-text)',
					'outline_box_shadow'               => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(47, 112, 179, .2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 25,
							'spread' => 0,
						),
					),
					'outline_hover_box_shadow'         => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(0,0,0,.1)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'secondary_color'                  => '#ffffff',
					'secondary_background_color'       => '#151617',
					'secondary_border_color'           => '#151617',
					'secondary_box_shadow'             => array(
						'enabled'      => false,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(47, 112, 179, .2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 25,
							'spread' => 0,
						),
					),
					'secondary_border_width'           => array(
						'unit'  => 'px',
						'min'   => 0,
						'max'   => 10,
						'value' => 2,
					),
					'secondary_border_style'           => 'solid',
					'secondary_hover_color'            => 'rgb(18, 41, 64)',
					'secondary_hover_background_color' => '#ffffff',
					'secondary_hover_border_color'     => 'rgb(18 41 64)',
					'secondary_hover_box_shadow'       => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(0, 0, 0, .1)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
				),
				'headers'     => array(
					self::ROOT_PATH . '/sample-data/sample-header.json',
					self::ROOT_PATH . '/sample-data/checkout-header.json',
				),
				'footers'     => array(
					self::ROOT_PATH . '/sample-data/sample-footer.json',
					self::ROOT_PATH . '/sample-data/checkout-footer.json',
				),
			),
			'sample_products'                => self::ROOT_PATH . '/sample-data/sample-products.csv',
			'sample_product_category_images' => self::ROOT_PATH . '/sample-data/sample-product-category-images.json',
			'sample_posts'                   => array(
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-posts.xml',
			),
			'sample_pages'                   => array(
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-pages-gutenberg.xml',
			),
			'sample_menus'                   => array(
				array(
					'name'      => __( 'Shopping menu', 'brandy-sites' ),
					'locations' => array( 'primary-menu', 'header-menu-1' ),
					'items'     => array(
						array(
							'title'  => __( 'Home', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => home_url(),
						),
						array(
							'title'       => __( 'Blog', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_blog_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Shop', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_shop_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Cart', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_cart_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'       => __( 'Checkout', 'brandy-sites' ),
							'status'      => 'publish',
							'object_id'   => brandy_get_checkout_page_id(),
							'item_object' => 'page',
							'item_type'   => 'post_type',
						),
						array(
							'title'  => __( 'FAQ', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Contact us', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
					),
				),
				array(
					'name'  => __( 'Customer service', 'brandy-sites' ),
					'items' => array(
						array(
							'title'  => __( 'Shipping & delivery', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Track your order', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Refund policy', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Terms and conditions', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'FAQ', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Contact us', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
					),
				),
				array(
					'name'  => __( 'Special sales menu', 'brandy-sites' ),
					'items' => array(
						array(
							'title'  => __( 'Our best seller', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( '-50% off items', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Buy 3 and pay 2', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						array(
							'title'  => __( 'Custom order', 'brandy-sites' ),
							'status' => 'publish',
							'url'    => '#',
						),
						'locations' => array( 'secondary-menu', 'header-menu-1' ),
					),
				),
			),
		);
		return $data;
	}

	public function enqueue_scripts() {
		wp_enqueue_style( 'brandy-book-site-style', self::ROOT_URL . '/assets/style.css', array(), time() );
		// wp_enqueue_script( 'brandy-book-site-script', self::ROOT_URL . '/assets/script.js', array('jquery'), time() );
	}

	public function woocommerce_product_categories( $content, $attributes, $block ) {
		$categories = get_categories(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => false,
			)
		);

		$items = '';

		$item_markup = '
		<li class="wc-block-product-categories-list-item swiper-slide">
			<a href="%1$s" class="wc-block-product-categories-list-item__images">
				<div class="wc-block-product-categories-list-item__image">%2$s</div>
				<div class="wc-block-product-categories-list-item__image">%5$s</div>
				<div class="wc-block-product-categories-list-item__image">%6$s</div>
				<div class="wc-block-product-categories-list-item__image">%7$s</div>
				<div class="wc-block-product-categories-list-item__image">%8$s</div>
			</a>
			<div class="wc-block-product-categories-list-item__content">
				<svg width="14" height="12" viewBox="0 0 14 12" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M0 8.37668V1.44824C0 0.486364 0.539 0.254934 1.197 0.93476L3.01 2.8079C3.283 3.08995 3.731 3.08995 3.997 2.8079L6.503 0.211541C6.776 -0.0705138 7.224 -0.0705138 7.49 0.211541L10.003 2.8079C10.276 3.08995 10.724 3.08995 10.99 2.8079L12.803 0.93476C13.461 0.254934 14 0.486364 14 1.44824V8.38391C14 10.5536 12.6 12 10.5 12H3.5C1.568 11.9928 0 10.3728 0 8.37668Z" fill="#FF991D"/>
				</svg>
				<div>
					<a href="%1$s">
					<h5 class="wc-block-product-categories-list-item__name">%3$s</h5>
					</a>
					<p class="brandy-product-categories-list-item-count">%4$s</p>
				</div>
			</div>
		</li>
		';

		foreach ( $categories as $cat ) {
			$thumbnail_id = get_term_meta( $cat->term_id, 'thumbnail_id', true );
			$image        = wp_get_attachment_image( $thumbnail_id, 800 );
			$items       .= sprintf(
				$item_markup,
				get_category_link( $cat ),
				empty( $image ) ? \wc_placeholder_img( 800 ) : $image,
				$cat->name,
				sprintf( '%s %s', $cat->category_count, _n( 'book', 'books', $cat->category_count, 'brandy' ) ),
				empty( $image ) ? \wc_placeholder_img( 800 ) : $image,
				empty( $image ) ? \wc_placeholder_img( 800 ) : $image,
				empty( $image ) ? \wc_placeholder_img( 800 ) : $image,
				empty( $image ) ? \wc_placeholder_img( 800 ) : $image,
			);
		}

		$content = sprintf(
			'
		<div data-block-name="woocommerce/product-categories" class="wp-block-woocommerce-product-categories wc-block-product-categories %1s brandy-product-categories-list swiper">
			<div class="wc-block-product-categories-navigation">
				<span class="wc-block-product-categories-navigation--back"><svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6 11L1 6L6 1" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
				<span class="wc-block-product-categories-navigation--next"><svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1 1L6 6L1 11" stroke="#D3DCE5" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg></span>
			</div>
			<ul class="wc-block-product-categories-list swiper-wrapper">
			%2s
			</ul>
		</div>
		',
			isset( $attributes['align'] ) && 'wide' === $attributes['align'] ? 'alignwide' : '',
			$items
		);
		return $content;
	}

	public function add_style_for_product_categories() {
		wp_enqueue_block_style(
			'woocommerce/product-categories',
			array(
				'handle' => 'brandy/wc-product-categories',
				'src'    => self::ROOT_URL . '/assets/wc-product-categories.css',
				'ver'    => BRANDYSITES_VERSION,
			)
		);
	}

	public function add_block_data( $data ) {
		$data['woocommerce/product-categories'] = array(
			'swiper' => array(
				'selector'     => '.brandy-product-categories-list:not(.block-editor-block-list__block)',
				'nextSelector' => '.wc-block-product-categories-navigation--next',
				'backSelector' => '.wc-block-product-categories-navigation--back',
				'data'         => array(
					'direction'    => 'horizontal',
					'spaceBetween' => 20,
					'navigation'   => array(
						'nextEl'    => '.wc-block-product-categories-navigation--next',
						'prevEl'    => '.wc-block-product-categories-navigation--back',
						'placement' => 'outside',
						'position'  => 'center',
					),
					'breakpoints'  => array(
						'1200' => array(
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
