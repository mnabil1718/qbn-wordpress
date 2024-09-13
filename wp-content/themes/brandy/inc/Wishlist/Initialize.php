<?php

namespace Brandy\Wishlist;

use Brandy\Customizer\Panels\WishlistPanel;
use Brandy\Traits\SingletonTrait;

class Initialize {

	use SingletonTrait;

	const META_NAME = 'brandy_wishlist';

	protected function __construct() {
		$this->init_hooks();
	}

	public function init_hooks() {

		// if ( is_admin() ) {
		// 	return;
		// }

		add_action( 'woocommerce_before_shop_loop_item', array( __CLASS__, 'render_floating_section' ), 9 );
		add_action( 'woocommerce_single_product_summary', array( __CLASS__, 'render_add_to_wishlist' ), 41 );
		add_action( 'wp_ajax_brandy_add_to_wishlist', array( $this, 'ajax_atw' ) );
		add_action( 'wp_ajax_brandy_remove_wishlist_item', array( $this, 'ajax_remove_wishlist_item' ) );
		add_action( 'wp_ajax_nopriv_brandy_add_to_wishlist', array( $this, 'ajax_atw' ) );
		add_action( 'wp_ajax_nopriv_brandy_remove_wishlist_item', array( $this, 'ajax_remove_wishlist_item' ) );

		//Shortcode removed
	}

	public static function get_user_wishlist_items() {

		if ( ! is_wc_installed() ) {
			return array();
		}

		$list = self::get_wishlist_items();

		$new_list = array_filter(
			$list,
			function( $id ) {
				return ! empty( \wc_get_product( $id ) );
			}
		);

		if ( ! empty( array_diff( $list, $new_list ) ) ) {
			self::update_wishlist_items( $new_list );
		}

		return $new_list;
	}

	public static function render_floating_section() {

		global $product;

		if ( empty( $product ) ) {
			return;
		}

		self::render_floating_fragment( $product );
	}

	public static function render_floating_fragment( $product ) {
		$is_added = in_array( $product->get_id(), self::get_user_wishlist_items() );
		?>
		<div class="brandy-wishlist-floating-fragment" <?php self::render_product_attributes( $product ); ?>>
			<div class="brandy-wishlist-floating-icon <?php echo esc_attr( $is_added ? 'wishlisted' : 'brandy-add-to-wishlist-btn' ); ?>" <?php self::render_product_attributes(); ?>>
				<?php self::render_add_to_wishlist_icon( $is_added ); ?>
				<?php
					self::render_loading();
				?>
			</div>
		</div>
		<?php
	}
	public static function render_add_to_wishlist() {
		global $product;

		if ( empty( $product ) ) {
			return;
		}

		self::render_add_to_wishlist_fragment( $product );
		?>
		<?php
	}

	public static function render_add_to_wishlist_fragment( $product, $just_added = false ) {
		$is_added = in_array( $product->get_id(), self::get_user_wishlist_items() );
		?>
		<div class="brandy-add-to-wishlist-fragment" <?php self::render_product_attributes( $product ); ?>>
			<?php
			if ( $just_added ) :
				self::render_add_to_wishlist_icon( $just_added );
				self::render_added_text();
			elseif ( $is_added ) :
				self::render_add_to_wishlist_icon( $is_added );
				self::render_already_text();
			else :
				?>
			<div class="brandy-add-to-wishlist-btn <?php echo esc_attr( $is_added ? 'disabled' : '' ); ?>" <?php self::render_product_attributes( $product ); ?>>
				<?php self::render_add_to_wishlist_icon(); ?>
				<?php self::render_add_to_wishlist_text(); ?>
				<?php self::render_loading(); ?>
			</div>
			<?php endif; ?>
		</div>
		<?php
	}

	public static function render_product_attributes( $input_product = null ) {
		global $product;
		if ( is_null( $input_product ) ) {
			$input_product = $product;
		}

		if ( is_null( $input_product ) ) {
			return;
		}

		if ( ! $input_product instanceof \WC_Product ) {
			return;
		}

		$attributes = array(
			'data-product-id' => $input_product->get_id(),
		);

		echo esc_attr( brandy_print_dom_attributes( $attributes ) );
	}

	public function ajax_atw() {
		try {
			$nonce = '';
			if ( isset( $_GET['nonce'] ) ) {
				$nonce = sanitize_text_field( $_GET['nonce'] );
			} elseif ( isset( $_POST['nonce'] ) ) {
				$nonce = sanitize_text_field( $_POST['nonce'] );
			}
			if ( ! wp_verify_nonce( $nonce, 'brandy_add_to_wishlist' ) ) {
				wp_send_json_error(
					array(
						'message' => __( 'Verify nonce failed', 'brandy' ),
					)
				);
			}

			if ( ! is_wc_installed() ) {
				throw new \Error( __( 'WooCommerce uninstalled', 'brandy' ) );
			}

			$product_id = isset( $_GET['product_id'] ) ? sanitize_text_field( $_GET['product_id'] ) : '';

			$product = \wc_get_product( $product_id );

			if ( empty( $product ) ) {
				throw __( 'Product not found', 'brandy' );
			}

			$current_wishlist = self::get_wishlist_items();

			if ( ! in_array( $product_id, $current_wishlist ) ) {
				$current_wishlist[] = $product_id;
			}

			self::update_wishlist_items( $current_wishlist );

			wp_send_json_success(
				array(
					'product_id' => $product_id,
					'message'    => __( 'Success', 'brandy' ), //PHPCS:ignore
					'fragments'  => self::get_fragments( $product, true ),
				)
			);
		} catch ( \Error $err ) {
			wp_send_json_error(
				array(
					'message' => $err->getMessage(),
				)
			);
		}
	}

	public function ajax_remove_wishlist_item() {
		try {

			$nonce = '';
			if ( isset( $_GET['nonce'] ) ) {
				$nonce = sanitize_text_field( $_GET['nonce'] );
			} elseif ( isset( $_POST['nonce'] ) ) {
				$nonce = sanitize_text_field( $_POST['nonce'] );
			}
			if ( ! wp_verify_nonce( $nonce, 'brandy_remove_wishlist_item' ) ) {
				wp_send_json_error(
					array(
						'message' => __( 'Verify nonce failed', 'brandy' ),
					)
				);
			}

			if ( ! is_wc_installed() ) {
				throw new \Error( __( 'WooCommerce uninstalled', 'brandy' ) );
			}

			$product_id = isset( $_GET['product_id'] ) ? sanitize_text_field( $_GET['product_id'] ) : '';

			$current_wishlist = self::get_wishlist_items();

			$pos = array_search( $product_id, $current_wishlist );

			if ( false !== $pos ) {
				array_splice( $current_wishlist, $pos, 1 );
			}

			self::update_wishlist_items( $current_wishlist );

			wp_send_json_success(
				array(
					'item_id'   => $product_id,
					'message'   => __( 'Removed', 'brandy' ),
					'fragments' => self::get_fragments( \wc_get_product( $product_id ) ),
				)
			);
		} catch ( \Error $err ) {
			wp_send_json_error(
				array(
					'message' => $err->getMessage(),
				)
			);
		}
	}

	public static function get_fragments( $product, $just_added = false ) {
		ob_start();
		self::render_floating_fragment( $product );
		$floating_button_fragment = ob_get_contents();
		ob_end_clean();
		self::render_add_to_wishlist_fragment( $product, $just_added );
		$atw_fragment = ob_get_contents();
		ob_end_clean();
		return array(
			'wishlist_shortcode'         => self::wishlist_shortcode(),
			'wishlist_floating_fragment' => $floating_button_fragment,
			'wishlist_atw_fragment'      => $atw_fragment,
			'count'                      => self::count(),
		);
	}

	public static function render_add_to_wishlist_icon( $wishlisted = false ) {
		$allowed_html = array(
			'svg'  => array(
				'xmlns'       => array(),
				'fill'        => array(),
				'viewbox'     => array(),
				'role'        => array(),
				'aria-hidden' => array(),
				'focusable'   => array(),
				'height'      => array(),
				'width'       => array(),
			),
			'path' => array(
				'd'    => array(),
				'fill' => array(),
			),
		);
		if ( $wishlisted ) :
			$wishlisted_icon = apply_filters( 'brandy_wishlisted_icon', '<svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 512 512" fill="#272829"><path d="M47.6 300.4L228.3 469.1c7.5 7 17.4 10.9 27.7 10.9s20.2-3.9 27.7-10.9L464.4 300.4c30.4-28.3 47.6-68 47.6-109.5v-5.8c0-69.9-50.5-129.5-119.4-141C347 36.5 300.6 51.4 268 84L256 96 244 84c-32.6-32.6-79-47.5-124.6-39.9C50.5 55.6 0 115.2 0 185.1v5.8c0 41.5 17.2 81.2 47.6 109.5z"></path></svg>' );
			?>
		<span class="brandy-add-to-wishlist-icon">
			<?php echo wp_kses( $wishlisted_icon, $allowed_html ); ?>
		</span>
			<?php
		else :
			$wishlist_icon = apply_filters( 'brandy_wishlist_normal_icon', '<svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 512 512"><path fill="currentColor" d="M225.8 468.2l-2.5-2.3L48.1 303.2C17.4 274.7 0 234.7 0 192.8v-3.3c0-70.4 50-130.8 119.2-144C158.6 37.9 198.9 47 231 69.6c9 6.4 17.4 13.8 25 22.3c4.2-4.8 8.7-9.2 13.5-13.3c3.7-3.2 7.5-6.2 11.5-9c0 0 0 0 0 0C313.1 47 353.4 37.9 392.8 45.4C462 58.6 512 119.1 512 189.5v3.3c0 41.9-17.4 81.9-48.1 110.4L288.7 465.9l-2.5 2.3c-8.2 7.6-19 11.9-30.2 11.9s-22-4.2-30.2-11.9zM239.1 145c-.4-.3-.7-.7-1-1.1l-17.8-20c0 0-.1-.1-.1-.1c0 0 0 0 0 0c-23.1-25.9-58-37.7-92-31.2C81.6 101.5 48 142.1 48 189.5v3.3c0 28.5 11.9 55.8 32.8 75.2L256 430.7 431.2 268c20.9-19.4 32.8-46.7 32.8-75.2v-3.3c0-47.3-33.6-88-80.1-96.9c-34-6.5-69 5.4-92 31.2c0 0 0 0-.1 .1s0 0-.1 .1l-17.8 20c-.3 .4-.7 .7-1 1.1c-4.5 4.5-10.6 7-16.9 7s-12.4-2.5-16.9-7z"></path></svg>' );
			?>
			<span class="brandy-add-to-wishlist-icon">
				<?php echo wp_kses( $wishlist_icon, $allowed_html ); ?>
			</span>
			<?php
		endif;
	}

	public static function render_add_to_wishlist_text() {
		?>
		<span class="brandy-add-to-wishlist-text"><?php echo esc_html( WishlistPanel::get_add_to_wishlist_text() ); //PHPCS:ignore. ?></span>
		<?php
	}

	public static function render_already_text() {
		?>
		<span class="brandy-wishlist-already-text"><?php echo esc_html( WishlistPanel::get_already_in_package_text() ); //PHPCS:ignore. ?><?php self::render_view_wishlist_link(); ?></span>
		<?php
	}

	public static function render_added_text() {
		?>
		<span class="brandy-wishlist-added-text"><?php echo esc_html( WishlistPanel::get_added_text() ); //PHPCS:ignore. ?><?php self::render_view_wishlist_link(); ?></span>
		<?php
	}

	public static function wishlist_shortcode() {
		$html = '';
		ob_start();
		get_template_part(
			'template-parts/wishlist/wishlist-shortcode',
			'',
			array(
				'wishlist_list' => self::get_user_wishlist_items(),
			)
		);
		$html = ob_get_contents();
		ob_end_clean();
		return $html;
	}

	public static function render_loading() {
		echo "<span class='brandy-loader brandy-wishlist-loading-icon'></span>";
	}

	public static function get_wishlist_url() {
		$page_id = WishlistPanel::get_wishlist_page();
		if ( empty( $page_id ) ) {
			$page_url = '#';
		} else {
			$page_url = get_page_link( $page_id );
		}
		return $page_url;
	}

	public static function render_view_wishlist_link() {
		$text = WishlistPanel::get_view_wishlist_text();
		?>
		<a class="brandy-view-wishlist" href="<?php echo esc_url( self::get_wishlist_url() ); ?>"><?php echo esc_html( $text ); //PHPCS:ignore ?></a>
		<?php
	}

	public static function count() {
		return count( self::get_user_wishlist_items() );
	}

	public static function get_wishlist_items() {

		if ( ! headers_sent() && ! session_id() ) {
			session_start();
		}

		$session_items = $_SESSION['brandy_wishlist_items'] ?? array();
		$user_items    = array();

		if ( is_user_logged_in() ) {
			$user_items = get_user_meta( get_current_user_id(), self::META_NAME, true );
			$user_items = empty( $user_items ) ? array() : $user_items;
		}

		$items = array_unique( array_merge( $session_items, $user_items ) );

		return $items;
	}

	public static function update_wishlist_items( $new_items = null ) {

		if ( is_null( $new_items ) ) {
			return;
		}

		if ( ! headers_sent() && ! session_id() ) {
			session_start();
		}

		if ( is_user_logged_in() ) {
			update_user_meta( get_current_user_id(), self::META_NAME, $new_items );
		}

		$_SESSION['brandy_wishlist_items'] = $new_items;

	}

}
