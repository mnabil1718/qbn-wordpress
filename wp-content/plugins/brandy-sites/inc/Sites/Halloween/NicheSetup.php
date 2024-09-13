<?php

namespace BrandySites\Sites\Halloween;

use BrandySites\Traits\SingletonTrait;

class NicheSetup extends \Brandy\Abstracts\AbstractNicheSetup {

	use SingletonTrait;

	public const NICHE_ID = 'halloween';

	public const ROOT_PATH = BRANDYSITES_PLUGIN_PATH . 'inc/Sites/Halloween';

	public const ROOT_URL = BRANDYSITES_PLUGIN_URL . 'inc/Sites/Halloween';

	protected const JSON_FILE = BRANDYSITES_PLUGIN_PATH . '/styles/halloween.json';

	protected const REPLACED_HEADERS = array(
		'main'     => 'halloween_main_header',
		'checkout' => 'halloween_checkout_header',
	);

	protected const REPLACED_FOOTERS = array(
		'main'     => 'halloween_main_footer',
		'checkout' => 'halloween_checkout_footer',
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
			$this->add_style_for_product_categories();

			add_filter( 'brandy_blocks_data', array( $this, 'change_categories_list_swiper_config' ) );

			\wp_enqueue_block_style(
				'core/tag-cloud',
				array(
					'handle' => 'brandy/wp-tag-clouds',
					'src'    => self::ROOT_URL . '/assets/wp-tag-cloud.css',
					'ver'    => BRANDYSITES_VERSION,
				)
			);

		}
	}

	public static function get_niche_data() {
		$data = array(
			'id'                             => self::NICHE_ID,
			'title'                          => __( 'Demo Halloween store', 'brandy-sites' ),
			'img'                            => 'http://img.wpbrandy.com/uploads/halloween-site-thumbnail-1.png',
			'demo_url'                       => 'http://img.wpbrandy.com/uploads/halloween-preview.png',
			'plan'                           => 'free',
			'tags'                           => array( 'ecommerce' ),
			'supports'                       => array( 'gutenberg', 'elementor' ),
			'template'                       => array(
				'woocommerce' => array(
					'product_layout'     => 'option_1',
					'product_thumb_size' => 'size_1',
					'sale_badge'         => array(
						'background_color' => '#7b1af9',
						'text_color'       => '#ffffff',
						'padding'          => array(
							'unit'   => 'px',
							'top'    => 2,
							'bottom' => 2,
							'left'   => 10,
							'right'  => 10,
						),
						'border'           => array(
							'radius' => array(
								'unit'  => 'px',
								'value' => 10,
								'min'   => 0,
								'max'   => 50,
							),
						),
					),
				),
				'button'      => array(
					'primary_hover_color'              => '#ffffff',
					'primary_hover_background_color'   => '#9A501E',
					'primary_box_shadow'               => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(226, 106, 15, .2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 25,
							'spread' => 0,
						),
					),
					'primary_hover_box_shadow'         => array(
						'enabled'      => true,
						'type'         => 'custom',
						'custom_value' => array(
							'color'  => 'rgba(154, 80, 30, 0.2)',
							'x'      => 0,
							'y'      => 7,
							'blur'   => 35,
							'spread' => 0,
						),
					),
					'outline_hover_color'              => '#000000',
					'outline_hover_background_color'   => 'var(--wp--preset--color--brandy-secondary-text)',
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
					'secondary_color'                  => '#0E1326',
					'secondary_background_color'       => '#E0E3EC',
					'secondary_border_color'           => '#E0E3EC',
					'secondary_box_shadow'             => array(
						'enabled'      => true,
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
						'value' => 0,
					),
					'secondary_border_style'           => 'solid',
					'secondary_hover_color'            => '#E0E3EC',
					'secondary_hover_background_color' => 'var(--wp--preset--color--brandy-accent)',
					'secondary_hover_border_color'     => '#E0E3EC',
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
				'input'       => array(
					'border'     => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
						),
						'color'  => array(
							'normal' => '#ffbd8a',
							'hover'  => '#ff9849',
							'focus'  => '#ff6f00',
						),
					),
					'text_color' => array(
						'normal' => '#0E1326',
						'hover'  => '#0E1326',
					),
				),
				'select'      => array(
					'border'     => array(
						'radius' => array(
							'unit'  => 'px',
							'value' => 12,
							'min'   => 0,
							'max'   => 100,
						),
						'color'  => array(
							'normal' => '#ffbd8a',
							'hover'  => '#ff9849',
							'focus'  => '#ff6f00',
						),
					),
					'text_color' => array(
						'normal' => '#0E1326',
						'hover'  => '#0E1326',
					),
				),
				'breadcrumb'  => array(
					'text_color' => array(
						'active' => 'var(--wp--preset--color--brandy-accent)',
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
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-posts-gutenberg.xml',
				'elementor' => self::ROOT_PATH . '/sample-data/sample-posts-elementor.xml',
			),
			'sample_pages'                   => array(
				'gutenberg' => self::ROOT_PATH . '/sample-data/sample-pages-gutenberg.xml',
				'elementor' => self::ROOT_PATH . '/sample-data/sample-pages-elementor.xml',
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
		wp_enqueue_style( 'brandy-halloween-site-style', self::ROOT_URL . '/assets/style.css', array(), time() );
		wp_enqueue_script( 'brandy-halloween-site-js', self::ROOT_URL . '/assets/script.js', array( 'jquery' ), time(), true );
	}

	public function woocommerce_product_categories( $content, $attributes, $block ) {
		$categories = get_categories(
			array(
				'taxonomy'   => 'product_cat',
				'hide_empty' => false,
			)
		);

		$container_class = $attributes['className'];

		if ( isset( $attributes['align'] ) && 'wide' === $attributes['align'] ) {
			$container_class .= ' alignwide';
		}

		$has_slider = true;

		if ( $has_slider ) {
			$container_class .= ' swiper';
		}

		$items = '';

		$item_markup = '
		<li class="wc-block-product-categories-list-item ' . ( $has_slider ? 'swiper-slide' : '' ) . '">
			<a href="%1$s" class="wc-block-product-categories-list-item__wrap-link">
			<div class="wc-block-product-categories-list-item__image">
			%2$s
			</div>
			<div class="wc-block-product-categories-list-item__content">
				<span class="wc-block-product-categories-list-item__name">%3$s</span>
				'
				. ( $attributes['hasCount'] ? '<p class="brandy-product-categories-list-item-count">%4$s</p>' : '' ) .
			'</div>
			</a>
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
				sprintf( '%s %s', $cat->category_count, _n( 'item', 'items', $cat->category_count, 'brandy' ) )
			);
		}

		$content = sprintf(
			'
		<div data-block-name="woocommerce/product-categories" class="wp-block-woocommerce-product-categories wc-block-product-categories brandy-product-categories-list %1$s ">'
			. ( $has_slider ? '<div class="wc-block-product-categories-navigation">
				<span class="wc-block-product-categories-navigation--back"></span>
				<span class="wc-block-product-categories-navigation--next"></span>
			</div>' : '' ) .
			'<ul class="wc-block-product-categories-list %2$s">
			%3$s
			</ul>
		</div>
		',
			$container_class,
			$has_slider ? 'swiper-wrapper' : '',
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

	public function change_categories_list_swiper_config( $localize_data ) {

		if ( isset( $localize_data['woocommerce/product-categories']['swiper']['data']['breakpoints'] ) ) {
			$localize_data['woocommerce/product-categories']['swiper']['data']['breakpoints'] = array(
				'1200' => array(
					'slidesPerView' => 6,
				),
				'1000' => array(
					'slidesPerView' => 5,
				),
				'800'  => array(
					'slidesPerView' => 4,
				),
				'600'  => array(
					'slidesPerView' => 3,
				),
				'300'  => array(
					'slidesPerView' => 2,
				),
			);
		}

		return $localize_data;
	}
}
