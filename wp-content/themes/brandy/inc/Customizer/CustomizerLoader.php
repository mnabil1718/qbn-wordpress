<?php
/**
 * The CustomizerLoader class is responsible for loading and managing the customizer settings for the Brandy theme.
 *
 * @package Brandy/Customizer
 * @since 1.0.0
 */

namespace Brandy\Customizer;

use Brandy\Core\Services\BuilderService;
use Brandy\Core\Services\StringVariablesService;
use Brandy\Core\Services\WishlistService;
use Brandy\Customizer\Elements\ElementsLoader;
use Brandy\Customizer\Layouts\FooterRowSettings;
use Brandy\Customizer\Layouts\FooterSettings;
use Brandy\Customizer\Layouts\HeaderRowSettings;
use Brandy\Customizer\Layouts\HeaderSettings;
use Brandy\Customizer\Layouts\ToggleOffCanvasSettings;
use Brandy\Customizer\Panels\FooterPanel;
use Brandy\Customizer\Panels\General\GeneralPanel;
use Brandy\Customizer\Panels\HeaderPanel;
use Brandy\Customizer\Panels\WishlistPanel;
use Brandy\Customizer\Panels\WooCommerce\WooCommercePanel;
use Brandy\CustomizerVite;
use Brandy\I18n;
use Brandy\Traits\SingletonTrait;

/**
 * Declare class
 */
class CustomizerLoader {
	use SingletonTrait;

	/**
	 * Constructor
	 */
	protected function __construct() {

		$this->load_classes();

		add_action( 'customize_controls_print_scripts', array( $this, 'controls_enqueue_scripts' ) );

	}

	private function load_classes() {
		/**
		 * Require partials process
		 */
		PartialsLoader::get_instance();

		/**
		 * Register panels.
		 */
		HeaderPanel::get_instance();
		FooterPanel::get_instance();
		GeneralPanel::get_instance();
		WishlistPanel::get_instance();
		WooCommercePanel::get_instance();

		do_action( 'brandy_register_customizer_panels' );

		do_action( 'brandy_after_register_customizer_panels' );

		/**
		 * Require element process class
		 */
		ElementsLoader::get_instance();

		/**
		 * Require loading settings
		 */
		HeaderSettings::get_instance();
		HeaderRowSettings::get_instance();
		FooterSettings::get_instance();
		FooterRowSettings::get_instance();
		ToggleOffCanvasSettings::get_instance();
	}

	private function get_localize_data() {
		$exclude_pages = function_exists( 'wc_get_page_id' ) ? array(
			\wc_get_page_id( 'cart' ),
			\wc_get_page_id( 'checkout' ),
			\wc_get_page_id( 'myaccount' ),
		) : array();
		$pages         = get_pages(
			array(
				'post_type'   => 'page',
				'post_status' => 'publish,private,draft',
				'child_of'    => 0,
				'parent'      => -1,
				'exclude'     => $exclude_pages,
				'sort_order'  => 'asc',
				'sort_column' => 'post_title',
			)
		);
		$page_choices  = array(
			'' => array(
				'title' => __( 'No page set', 'brandy' ),//phpcs:ignore
				'link'  => '#',
			),
		)
		+ array_combine(
			array_map( 'strval', wp_list_pluck( $pages, 'ID' ) ),
			array_map(
				function( $p ) {
					return array(
						'title' => $p->post_title,
						'link'  => get_page_link( $p->ID ),
					);
				},
				$pages
			)
		);
		$data          = array(
			'ajax'              => array(
				'path'   => admin_url( 'admin-ajax.php' ),
				'nonces' => array(
					'override_elementor_settings' => wp_create_nonce( 'override_elementor_settings' ),
				),
			),
			'extra_panels'      => apply_filters( 'brandy_customizer_extra_panels', array() ),
			'paths'             => array(
				'nav_menu'         => admin_url( 'nav-menus.php' ),
				'wc_checkout_page' => brandy_get_checkout_page_url(),
				'wc_cart_page'     => brandy_get_cart_page_url(),
				'wc_shop_page'     => brandy_get_shop_page_url(),
			),
			'global_settings'   => wp_get_global_settings(),
			'colors'            => array(
				'icon' => array(
					'normal' => BRANDY_ICON_COLOR_NORMAL,
				),
			),
			'wishlist'          => array(
				'default_settings' => WishlistService::get_default_settings(),
			),
			'elements'          => apply_filters( 'brandy_elements', array() ),
			'settings_layouts'  => BuilderService::get_settings_layouts(),
			'default_settings'  => apply_filters( 'brandy_default_settings', array() ),
			'content_variables' => StringVariablesService::get_data(),
			'pages'             => $page_choices,
			'i18n'              => I18n::get_translations(),
		);

		return apply_filters( 'brandy_extra_localize', $data );
	}

	/**
	 * Enqueue scripts/styles for controller in customize page
	 */
	public function controls_enqueue_scripts() {
		wp_enqueue_style( 'dashicons' );
		wp_enqueue_media();
		wp_enqueue_editor();
		if ( is_admin() ) {
			\_WP_Editors::print_default_editor_scripts();
		}
		wp_add_inline_script(
			'wp-customize-widgets',
			'var customizeWidgetInitialize = wp.customizeWidgets.initialize;' .
			'wp.customizeWidgets = {initialize: function (a, b) {
				window.brandyWidgetsEditorName = a
				window.brandyWidgetsBlockEditorSettings = b

				customizeWidgetInitialize(a, b)
			}}'
		);
		CustomizerVite::enqueue_vite( 'main.tsx', '3003' );
		wp_localize_script( 'module/brandy/main.tsx', 'brandyCustomizerData', $this->get_localize_data() );
	}

}

CustomizerLoader::get_instance();
