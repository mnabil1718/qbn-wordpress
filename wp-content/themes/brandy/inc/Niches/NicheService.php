<?php

namespace Brandy\Niches;

use Brandy\Admin\Pages\Dashboard\ImportService;
use Brandy\Core\Services\ButtonService;
use Brandy\Admin\PostEditor\PostMetaServices;
use Brandy\Core\Services\BreadcrumbService;
use Brandy\Core\Services\InputService;
use Brandy\Core\Services\ProductCatalogService;
use Brandy\Core\Services\SaleBadgeService;
use Brandy\Core\Services\SelectService;
use Brandy\Core\Services\WishlistService;
use Brandy\Niches\NicheLoader;
use Brandy\Traits\SingletonTrait;
use Brandy\Utils\Helpers;
use WP_REST_Request;

class NicheService {
	use SingletonTrait;

	public $niches;

	/**
	 * Contains importing service;
	 *
	 * @var ImportService
	 */
	public $import_service;

	/**
	 * Contains PostMetaServices service
	 *
	 * @var PostMetaServices
	 */
	public $post_meta_services;

	protected function __construct() {

		$this->import_service     = ImportService::get_instance();
		$this->post_meta_services = PostMetaServices::get_instance();
		$this->niches             = NicheLoader::get_instance()->get_niches();

	}

	public function install_niche( string $niche_id, array $allowed_content, $builder = 'gutenberg' ) {

		$result = array();

		if ( ! isset( $this->niches[ $niche_id ] ) ) {
			throw new \Error( 'Niche not found' );
		}

		update_option( 'brandy_current_niche', $niche_id );

		if ( in_array( 'posts', $allowed_content, true ) ) {
			$this->install_template( $niche_id );
			$this->reset_editor_settings();
			$this->reset_wp_templates();

			$result['posts'] = $this->import_posts( $niche_id, $builder );
		}

		if ( in_array( 'products', $allowed_content, true ) ) {
			$result['products'] = $this->import_sample_products( $niche_id );
		}

		if ( in_array( 'pages', $allowed_content, true ) ) {
			$result['pages'] = $this->import_pages( $niche_id, $builder );
		}

		if ( in_array( 'menus', $allowed_content, true ) ) {
			$result['menus'] = $this->import_menus( $niche_id );
		}

		if ( in_array( 'widgets', $allowed_content, true ) ) {
			$result['imported_widgets'] = $this->import_widgets( $niche_id );
		}

		return $result;
	}

	private function install_template( string $niche_id ) {

		if ( ! isset( $this->niches[ $niche_id ] ) ) {
			return;
		}

		do_action( 'brandy_before_' . $niche_id . '_installing_template_settings' );

		$selected_niche = $this->niches[ $niche_id ];

		if ( isset( $selected_niche['template'] ) ) {
			$this->override_template_settings( $niche_id, $selected_niche['template'] );
		}

		do_action( 'brandy_after_' . $niche_id . '_installing_template_settings' );
	}

	private function import_sample_products( $niche_id ) {
		if ( ! isset( $this->niches[ $niche_id ] ) ) {
			return array();
		}

		$selected_niche = $this->niches[ $niche_id ];

		if ( ! isset( $selected_niche['sample_products'] ) || ! file_exists( $selected_niche['sample_products'] ) ) {
			return array();
		}

		$csv_file = $selected_niche['sample_products'];

		$imported_products = $this->import_service::read_products_from_csv( $csv_file );

		$category_images_file = $selected_niche['sample_product_category_images'] ?? '';

		if ( file_exists( $category_images_file ) ) {
			try {
				$images_file_content = file_get_contents( $category_images_file );
				$images_data         = json_decode( $images_file_content );
				$images_data         = empty( $images_data ) ? array() : $images_data;
			} catch ( \Error $error ) {
				$images_data = array();
			}

			foreach ( $images_data as $cat_name => $img_source ) {
				$cat = get_term_by( 'name', $cat_name, 'product_cat' );
				if ( empty( $cat ) ) {
					continue;
				}
				if ( empty( $cat->term_id ) ) {
					continue;
				}

				if ( ! empty( \get_term_meta( $cat->term_id, 'thumbnail_id' ) ) ) {
					continue;
				}

				$image_id = media_sideload_image( $img_source, 0, '', 'id' );

				if ( ! is_wp_error( $image_id ) ) {
					\update_term_meta( $cat->term_id, 'thumbnail_id', absint( $image_id ) );
				}
			}
		}

		return $imported_products;
	}

	private function import_posts( $niche_id, $builder = 'gutenberg' ) {

		if ( ! isset( $this->niches[ $niche_id ] ) ) {
			return array();
		}

		$selected_niche = $this->niches[ $niche_id ];

		if ( ! isset( $selected_niche['sample_posts'][ $builder ] ) || ! file_exists( $selected_niche['sample_posts'][ $builder ] ) ) {
			return array();
		}

		$csv_file = $selected_niche['sample_posts'][ $builder ];

		$sample_posts = $this->import_service::read_posts_from_csv( $csv_file );

		do_action( 'brandy_before_import_posts', $niche_id, $sample_posts );

		$query = new \WP_Query(
			array(
				'post_type'     => 'post',
				'post_name__in' => array_map(
					function( $p ) {
						return $p['name'];
					},
					$sample_posts
				),
			)
		);

		$existed_posts_name = array_map(
			function( $p ) {
				return $p->post_name;
			},
			$query->have_posts() ? $query->posts : array()
		);

		$not_existed_posts = array_filter(
			$sample_posts,
			function( $post_info ) use ( $existed_posts_name ) {
				return ! in_array( $post_info['name'], $existed_posts_name, true );
			}
		);

		$inserted_posts = array();
		foreach ( $not_existed_posts as $post_info ) {
			$comment_status = isset( $post_info['comment_status'] ) ? ( empty( $post_info['comment_status'] ) ? 'closed' : 'open' ) : 'open';
			$comments       = isset( $post_info['comments'] ) ? $post_info['comments'] : array();
			$post_args      = array(
				'post_title'     => $post_info['title'],
				'post_type'      => 'post',
				'post_name'      => $post_info['name'],
				'post_content'   => $post_info['content'],
				'post_category'  => $post_info['post_category'],
				'tags_input'     => $post_info['tags_input'],
				'post_status'    => 'publish',
				'comment_status' => 'closed',
				'ping_status'    => 'closed',
				'post_author'    => 1,
				'menu_order'     => 0,
				'comment_status' => $comment_status,
			);
			$inserted_id    = wp_insert_post( $post_args );

			if ( 0 === $inserted_id || is_wp_error( $inserted_id ) ) {
				continue;
			}

			if ( ! empty( $page_info['post_meta'] ) ) {
				foreach ( $page_info['post_meta'] as $key => $value ) {
					update_post_meta( $inserted_id, $key, $value );
				}
			}

			foreach ( $comments as $comment ) {
				wp_insert_comment(
					array(
						'comment_post_ID' => $inserted_id,
						'comment_content' => $comment,
					)
				);
			}

			do_action( 'brandy_after_import_post', $niche_id, $builder, $inserted_id, $post_info );

			$inserted_posts[] = $inserted_id;

			$this->import_service::add_featured_image( $inserted_id, $post_info['featured_image'] ?? '', $post_info['name'] ?? '' );
		}

		do_action( 'brandy_after_import_posts', $niche_id, $inserted_posts );

		return $inserted_posts;
	}

	private function import_pages( $niche_id, $builder = 'gutenberg' ) {

		if ( ! isset( $this->niches[ $niche_id ] ) ) {
			return;
		}

		$selected_niche = $this->niches[ $niche_id ];

		if ( ! isset( $selected_niche['sample_pages'][ $builder ] ) || ! file_exists( $selected_niche['sample_pages'][ $builder ] ) ) {
			return array();
		}

		$csv_file = $selected_niche['sample_pages'][ $builder ];

		$sample_pages = $this->import_service::read_posts_from_csv( $csv_file );

		do_action( 'brandy_before_import_pages', $niche_id, $sample_pages );

		$query = new \WP_Query(
			array(
				'post_type'     => 'page',
				'post_name__in' => array_map(
					function( $p ) {
						return $p['name'];
					},
					$sample_pages
				),
			)
		);

		$existed_pages_name = array();
		$imported_pages     = array();
		if ( $query->have_posts() ) {
			foreach ( $query->posts as $p ) {
				$same_pages = array_filter(
					$sample_pages,
					function( $item ) use ( $p ) {
						return $p->post_name === $item['name'];
					}
				);
				$find_page  = end( $same_pages );
				$data       = array(
					'id'    => $p->ID,
					'name'  => $p->post_name,
					'title' => $p->post_title,
				);
				if ( $find_page ) {
					$data['post_meta'] = $find_page['post_meta'] ?? array();
				}
				$imported_pages[]     = $data;
				$existed_pages_name[] = $p->post_name;
			}
		}

		$not_existed_pages = array_filter(
			$sample_pages,
			function( $page_info ) use ( $existed_pages_name ) {
				return ! in_array( $page_info['name'], $existed_pages_name, true );
			}
		);

		$inserted_pages = array();

		foreach ( $not_existed_pages as $page_info ) {
			$post_args        = array_merge(
				array(
					'post_title'     => $page_info['title'],
					'post_type'      => 'page',
					'post_name'      => $page_info['name'],
					'post_content'   => $page_info['content'],
					'post_status'    => 'publish',
					'comment_status' => 'closed',
					'ping_status'    => 'closed',
					'post_author'    => 1,
					'menu_order'     => 0,
				),
				isset( $page_info['page_template'] ) ? array(
					'page_template' => $page_info['page_template'],
				) : array()
			);
			$new_post_id      = wp_insert_post( $post_args );
			$inserted_pages[] = $new_post_id;

			$imported_pages[] = array(
				'id'        => $new_post_id,
				'title'     => $page_info['title'],
				'name'      => $page_info['name'],
				'post_meta' => $page_info['post_meta'] ?? array(),
			);

			if ( 0 === $new_post_id || is_wp_error( $new_post_id ) ) {
				continue;
			}

			do_action( 'brandy_after_import_page', $niche_id, $builder, $new_post_id, $page_info );
		}

		foreach ( $imported_pages as $data ) {

			$matching_items = array_values(
				array_filter(
					$sample_pages,
					function( $item ) use ( $data ) {
						return $item['name'] == $data['name'];
					}
				)
			);

			if ( count( $matching_items ) < 1 ) {
				continue;
			}

			$page_info = $matching_items[0];

			$new_post_id = $data['id'];

			if ( ! empty( $page_info['page_display'] ) && 'front_page' === $page_info['page_display'] ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_on_front', $new_post_id );
			}

			if ( ! empty( $page_info['page_display'] ) && 'blogs_page' === $page_info['page_display'] ) {
				update_option( 'show_on_front', 'page' );
				update_option( 'page_for_posts', $new_post_id );
			}

			/**
			 * Remove old meta for pages
			 */
			foreach ( ( $this->post_meta_services->services ?? array() ) as $meta_service ) {
				delete_post_meta( $new_post_id, $meta_service::META_NAME );
			}

			if ( ! empty( $page_info['post_meta'] ) ) {
				foreach ( $page_info['post_meta'] as $key => $value ) {
					update_post_meta( $new_post_id, $key, $value );
				}
			}
		}

		do_action( 'brandy_after_import_pages', $niche_id, $imported_pages );

		return $inserted_pages;
	}

	private function import_menus( $niche_id ) {

		if ( ! isset( $this->niches[ $niche_id ] ) ) {
			return;
		}

		$selected_niche = $this->niches[ $niche_id ];

		if ( ! isset( $selected_niche['sample_menus'] ) || ! is_array( $selected_niche['sample_menus'] ) ) {
			return array();
		}

		$sample_menus = $selected_niche['sample_menus'];

		do_action( 'brandy_before_import_menus', $niche_id, $sample_menus );

		$imported_menus = array();

		foreach ( $sample_menus as $menu_info ) {
			$menu_exists = wp_get_nav_menu_object( $menu_info['name'] );
			if ( $menu_exists ) {
				$imported_menus[] = array_merge(
					array( 'id' => $menu_exists->term_id ),
					$menu_info
				);
				continue;
			}
			$menu_id = wp_create_nav_menu( $menu_info['name'] );
			if ( is_wp_error( $menu_id ) ) {
				continue;
			}
			$imported_menus[] = array_merge(
				array( 'id' => $menu_id ),
				$menu_info
			);
			foreach ( $menu_info['items'] as $menu_item ) {
				wp_update_nav_menu_item(
					$menu_id,
					0,
					empty( $menu_item['object_id'] ) ?
					array(
						'menu-item-title'  => $menu_item['title'] ?? 'Sample item',
						'menu-item-url'    => $menu_item['url'] ?? '#',
						'menu-item-status' => $menu_item['status'] ?? 'publish',
					) : array(
						'menu-item-type'      => isset( $menu_item['item_type'] ) ? $menu_item['item_type'] : '',
						'menu-item-object-id' => $menu_item['object_id'],
						'menu-item-object'    => $menu_item['item_object'],
						'menu-item-status'    => $menu_item['status'],
					)
				);
			}
		}

		do_action( 'brandy_after_import_menus', $niche_id, $imported_menus );

		return $imported_menus;
	}

	private function import_widgets( $niche_id ) {
		update_option( 'brandy_sample_widgets', $niche_id );
	}

	public static function register_widgets() {

		$niche_id = get_option( 'brandy_sample_widgets' );

		$import_service = ImportService::get_instance();
		$niches         = NicheLoader::get_instance()->get_niches();

		if ( ! isset( $niches[ $niche_id ] ) ) {
			return;
		}

		$selected_niche = $niches[ $niche_id ];

		if ( ! isset( $selected_niche['sample_widgets'] ) || ! file_exists( $selected_niche['sample_widgets'] ) ) {
			return array();
		}

		$csv_file = $selected_niche['sample_widgets'];

		$sample_widgets = $import_service::read_widgets_from_csv( $csv_file );

		foreach ( $sample_widgets as $widget ) {
			register_sidebar(
				array(
					'name'          => $widget['title'],
					'id'            => $widget['id'],
					'description'   => esc_html__( 'Add widgets here:', 'brandy' ),
					'before_widget' => '<section id="%1$s" class="widget %2$s">',
					'after_widget'  => '</section>',
					'before_title'  => '<h2 class="widget-title">',
					'after_title'   => '</h2>',
				)
			);
		}
	}

	private function override_template_settings( $niche_id, $data ) {
		/**
		 * Override button
		 */
		$button_settings = ButtonService::get_default_settings();
		if ( isset( $data['button'] ) ) {
			$button_settings = Helpers::recursive_wp_parse_args( $data['button'], $button_settings );
		}
		$this->override_button_settings( $button_settings );

		/**
		 * Override input
		 */
		$input_settings = InputService::get_default_settings();
		if ( isset( $data['input'] ) ) {
			$input_settings = Helpers::recursive_wp_parse_args( $data['input'], $input_settings );
		}
		$this->override_input_settings( $input_settings );

		/**
		 * Override select
		 */
		$select_settings = SelectService::get_default_settings();
		if ( isset( $data['select'] ) ) {
			$select_settings = Helpers::recursive_wp_parse_args( $data['select'], $select_settings );
		}
		$this->override_select_settings( $select_settings );

		/**
		 * Override select
		 */
		$breadcrumb_settings = BreadcrumbService::get_default_settings();
		if ( isset( $data['breadcrumb'] ) ) {
			$breadcrumb_settings = Helpers::recursive_wp_parse_args( $data['breadcrumb'], $breadcrumb_settings );
		}
		$this->override_breadcrumb_settings( $breadcrumb_settings );

		/**
		 * Override woocommerce
		 */
		$woocommerce_settings = array(
			'product_layout'     => 'option_1',
			'product_thumb_size' => 'size_1',
			'sale_badge'         => SaleBadgeService::get_default_settings(),
		);
		if ( isset( $data['woocommerce'] ) ) {
			$woocommerce_settings = Helpers::recursive_wp_parse_args( $data['woocommerce'], $woocommerce_settings );
		}
		$this->override_woocommerce_settings( $woocommerce_settings );

		/**
		 * Override wishlist
		 */
		$wishlist_settings = WishlistService::get_default_settings();

		if ( isset( $data['wishlist'] ) ) {
			$wishlist_settings = Helpers::recursive_wp_parse_args( $data['wishlist'], $wishlist_settings );
		}
		$this->override_wishlist_settings( $wishlist_settings );

		/**
		 * Override builder settings
		 */
		if ( isset( $data['headers'] ) ) {
			$this->override_builder_settings( $niche_id, $data['headers'], 'header' );
		}

		if ( isset( $data['footers'] ) ) {
			$this->override_builder_settings( $niche_id, $data['footers'], 'footer' );
		}
	}

	private function override_button_settings( $data ) {
		ButtonService::save_settings( $data );
	}

	private function override_input_settings( $data ) {
		InputService::save_settings( $data );
	}

	private function override_select_settings( $data ) {
		SelectService::save_settings( $data );
	}

	private function override_breadcrumb_settings( $data ) {
		BreadcrumbService::save_settings( $data );
	}

	private function override_wishlist_settings( $data ) {
		WishlistService::save_settings( $data );
	}

	private function override_builder_settings( $niche_id, $files, $builder = 'header' ) {

		$fn = "brandy_get_{$builder}_settings";

		if ( ! is_callable( $fn ) ) {
			return;
		}

		$builder_settings = call_user_func( $fn );
		$templates        = &$builder_settings['templates'];
		$imported_data    = array();

		foreach ( $files as $file ) {
			if ( ! file_exists( $file ) ) {
				continue;
			}

			$template_data = json_decode( file_get_contents( $file ), true ); //phpcs:ignore

			$template_exists = false;

			foreach ( $templates as $index => $template ) {
				if ( $template_data['id'] === $template['id'] ) {
					$template_exists                         = true;
					$builder_settings['templates'][ $index ] = $template_data;
					break;
				}
			}

			if ( ! $template_exists ) {
				$builder_settings['templates'][] = $template_data;
			}

			$imported_data[] = $template_data;
		}

		set_theme_mod( "{$builder}_settings", $builder_settings );

		do_action( "brandy_after_{$niche_id}_import_{$builder}", $imported_data );
	}

	private function override_woocommerce_settings( $data ) {
		$product_catalog_data = array();
		if ( isset( $data['product_layout'] ) ) {
			$product_catalog_data['product_layout'] = $data['product_layout'];
		}
		if ( isset( $data['product_thumb_size'] ) ) {
			$product_catalog_data['product_thumb_size'] = $data['product_thumb_size'];
		}
		ProductCatalogService::save_settings( $product_catalog_data );

		if ( isset( $data['sale_badge'] ) ) {
			SaleBadgeService::save_settings( $data['sale_badge'] );
		}
	}

	public function reset_wp_templates() {

		$post_names = array();

		$dir = new \DirectoryIterator( BRANDY_TEMPLATE_DIR . '/templates' );
		foreach ( $dir as $fileinfo ) {
			if ( ! $fileinfo->isDot() ) {
				$post_names[] = basename( $fileinfo->getFilename(), '.html' );
			}
		}
		$args  = array(
			'post_type'     => 'wp_template',
			'post_name__in' => $post_names,
		);
		$query = new \WP_Query( $args );

		if ( ! $query->have_posts() ) {
			return;
		}

		foreach ( $query->posts as $post ) {
			wp_delete_post( $post->ID );
		}
	}

	public function reset_editor_settings() {

		if ( ! class_exists( 'WP_Theme_JSON_Resolver' ) ) {
			return;
		}

		$id = \WP_Theme_JSON_Resolver::get_user_global_styles_post_id();

		if ( ! class_exists( 'WP_REST_Global_Styles_Controller' ) ) {
			return;
		}

		try {
			$wp_rest_global_styles = new \WP_REST_Global_Styles_Controller();

			$fake_request       = new WP_REST_Request(
				'post',
				'test',
				array(
					'id'       => $id,
					'settings' => array(),
					'styles'   => array(),
				)
			);
			$fake_request['id'] = $id;

			$wp_rest_global_styles->update_item( $fake_request );
		} catch ( \WP_Error $error ) {
			$trick_mode = 1;
			// This is silent
		} catch ( \Exception $exp ) {
			$trick_mode = 1;
			// This is silent
		}

	}

}
