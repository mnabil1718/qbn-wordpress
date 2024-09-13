<?php
/**
 * The ThemeEnqueue handle enqueueing script and styles for theme layout.
 *
 * @package Brandy\Core
 * @since 1.0
 */

namespace Brandy\Core;

use Brandy\FrontendVite;
use Brandy\Traits\SingletonTrait;
use Brandy\Wishlist\Initialize as Wishlist;

/**
 * Declare class
 */
class ThemeEnqueue {
	use SingletonTrait;

	/**
	 * Constructor
	 */
	protected function __construct() {

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_scripts' ) );
		add_editor_style( 'editor-style' );

		add_action(
			'enqueue_block_assets',
			function() {
				global $current_screen;
				if ( ! empty( $current_screen->is_block_editor ) ) {
					wp_enqueue_style( 'brandy-editor-style', BRANDY_TEMPLATE_URL . '/assets/css/admin/editor.min.css', array(), BRANDY_VERSION );
					$this->enqueue_libs();
				}
			}
		);

	}

	/**
	 * Enqueue callback
	 */
	public function enqueue_scripts() {
		/** Enqueue styles */
		wp_enqueue_script( 'wc-cart-fragments' );
		wp_enqueue_script( 'brandy-frontend', BRANDY_TEMPLATE_URL . '/assets/js/frontend.min.js', array( 'jquery', 'wp-data' ), time(), true );
		wp_localize_script(
			'brandy-frontend',
			'brandyData',
			$this->get_localize_data()
		);
		FrontendVite::enqueue_vite();
		$this->enqueue_libs();

		/* Enqueue styles */
		if ( is_customize_preview() ) {
			wp_enqueue_style( 'brandy-customize-preview-style', BRANDY_TEMPLATE_URL . '/assets/css/frontend/customize-preview.min.css', array(), BRANDY_VERSION );
		}
	}

	private function enqueue_libs() {
		wp_enqueue_script( 'brandy-swiper-script', BRANDY_TEMPLATE_URL . '/assets/lib/swiper/swiper.min.js', array(), time(), true );
		wp_enqueue_style( 'brandy-swiper-style', BRANDY_TEMPLATE_URL . '/assets/lib/swiper/swiper.min.css', array(), time() );
	}

	private function get_localize_data() {
		return array_merge(
			array(
				'ajax' => array(
					'path'   => admin_url( 'admin-ajax.php' ),
					'nonces' => array(
						'update_cart'          => wp_create_nonce( 'brandy_update_cart' ),
						'send_subscribe_mail'  => wp_create_nonce( 'send_subscribe_mail' ),
						'remove_wishlist_item' => wp_create_nonce( 'brandy_remove_wishlist_item' ),
						'add_wishlist_item'    => wp_create_nonce( 'brandy_add_to_wishlist' ),
					),
				),
			),
			is_brandy_blocks_installed() ? array(
				'brandy_blocks' => array(),
			) : array(),
			array(
				'urls'        => array(
					'wishlist' => Wishlist::get_wishlist_url(),
					'cart'     => brandy_get_cart_page_url(),
					'assets'   => BRANDY_TEMPLATE_URL . '/assets',
				),
				'blocks_data' => apply_filters(
					'brandy_blocks_data',
					array()
				),
			)
		);
	}

}
