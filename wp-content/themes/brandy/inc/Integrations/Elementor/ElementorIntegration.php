<?php

namespace Brandy\Integrations\Elementor;

use Brandy\Integrations\Elementor\Customizer\ElementorPanel;
use Brandy\Traits\SingletonTrait;

class ElementorIntegration {
	use SingletonTrait;

	/**
	 * Store instance of Kit service.
	 *
	 * @var KitService
	 */
	public $kit_service;

	/**
	 * Store instance of Kit service.
	 *
	 * @var ElementorService
	 */
	public $setting_service;

	protected function __construct() {
		if ( ! is_elementor_installed() ) {
			return;
		}

		$this->setting_service = ElementorService::get_instance();
		$this->kit_service     = KitService::get_instance();

		add_action( 'brandy_after_import_post', array( $this, 'initialize_elementor_data' ), 10, 4 );
		add_action( 'brandy_after_import_page', array( $this, 'initialize_elementor_data' ), 10, 4 );
		// add_action( 'elementor/init', array( $this->kit_service, 'register_global_colors' ) );
		add_filter( 'brandy_site_content_classes', array( $this, 'body_classes' ) );
		add_action( 'brandy_register_customizer_panels', array( $this, 'register_customizer_panel' ) );
		add_action( 'elementor/init', array( $this, 'sync_settings' ), PHP_INT_MAX );
	}

	public function register_customizer_panel() {
		ElementorPanel::get_instance();
	}

	public function initialize_elementor_data( $niche, $builder, $post_id, $post_info ) {

		if ( ! defined( 'ELEMENTOR_VERSION' ) ) {
			return;
		}

		if ( 'elementor' === $builder ) {
			update_post_meta( $post_id, '_elementor_version', ELEMENTOR_VERSION, true );
			update_post_meta( $post_id, '_elementor_edit_mode', 'builder', true );
			update_post_meta( $post_id, '_elementor_css', '', true );
			update_post_meta( $post_id, '_elementor_template_type', 'wp-page', true );
			update_post_meta( $post_id, '_elementor_data', wp_slash( $post_info['elementor_data'] ), true );
		}
	}

	public function body_classes( $classes ) {
		if ( ! is_elementor_installed() ) {
			return $classes;
		}

		$kit = $this->kit_service->get_current_kit();
		if ( empty( $kit ) ) {
			return $classes;
		}
		$classes[] = 'elementor-kit-' . $kit->get_main_id();
		return $classes;
	}

	public function sync_settings() {
		if ( ! ElementorService::get_sync_enabled() ) {
			return;
		}

		update_option( 'elementor_disable_color_schemes', 'yes' );
		update_option( 'elementor_disable_typography_schemes', 'yes' );

		// $this->kit_service->override_kit_settings( array( 'button' ) );
	}

}
