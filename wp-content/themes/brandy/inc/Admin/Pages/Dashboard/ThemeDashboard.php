<?php

namespace Brandy\Admin\Pages\Dashboard;

use Brandy\I18n;
use Brandy\Niches\NicheLoader;
use Brandy\Niches\NicheService;
use Brandy\Traits\SingletonTrait;
use Error;

class ThemeDashboard {
	use SingletonTrait;

	/**
	 * Contains menu page ID
	 *
	 * @var string
	 */
	const PAGE_ID = 'brandy-dashboard-page';

	/**
	 * Contains menu capability
	 *
	 * @var string
	 */

	const CAP = 'switch_themes';
	/**
	 * Contains menu position
	 *
	 * @var string
	 */
	const POSITION = 60;

	/**
	 * Contains NONCE action for install niche
	 *
	 * @var string
	 */
	const INSTALL_NICHE_NONCE_ACTION = 'brandy_install_niche';

	/**
	 * Contains NONCE action for install plugin
	 *
	 * @var string
	 */
	const INSTALL_PLUGIN_NONCE_ACTION = 'brandy_install_plugin';

	/**
	 * Contains NONCE action for getting plugins information
	 *
	 * @var string
	 */
	const GET_PLUGINS_INFORMATION_NONCE_ACTION = 'brandy_get_plugins_information';

	protected function __construct() {

		add_action( 'admin_bar_menu', array( $this, 'add_dashboard_to_admin_bar' ), 100 );

		if ( ! is_admin() ) {
			return;
		}

		add_action( 'admin_menu', array( $this, 'add_theme_page' ) );
		add_action( 'wp_ajax_brandy_install_niche', array( $this, 'install_niche' ) );
		add_action( 'wp_ajax_brandy_install_plugin', array( $this, 'install_plugin' ) );
		add_action( 'wp_ajax_brandy_activate_plugin', array( $this, 'activate_plugin' ) );
		add_action( 'wp_ajax_brandy_get_plugins_information', array( $this, 'get_plugins_information' ) );
		$this->open_wizard();
	}

	/**
	 * Add dashboard menu page
	 */
	public function add_theme_page() {

		$page_title = __( 'Brandy', 'brandy' );

		// $icon = '';
		$icon = 'data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJMYXllcl8xIiB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHhtbG5zOnhsaW5rPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5L3hsaW5rIiB4PSIwcHgiIHk9IjBweCINCgkJICB2aWV3Qm94PSIwIDAgMjAgMjAiIHN0eWxlPSJlbmFibGUtYmFja2dyb3VuZDpuZXcgMCAwIDIwIDIwOyIgeG1sOnNwYWNlPSJwcmVzZXJ2ZSI+DQoJCTxzdHlsZSB0eXBlPSJ0ZXh0L2NzcyI+DQoJCSAuc3Qwe2ZpbGw6IzlBQTBBNTt9DQoJCTwvc3R5bGU+DQoJCTxnPg0KCQkgPHBhdGggY2xhc3M9InN0MCIgZD0iTTIuOSwxNC43VjMuNkMyLjksMi4yLDQuMSwxLDUuNSwxSDEwYzEsMCwyLDAuMiwyLjksMC43YzEuMSwwLjYsMi4zLDEuOCwyLjcsNGMwLjEsMC45LDAsMS44LTAuNCwyLjYNCgkJICAgICBjLTAuNCwwLjctMSwxLjYtMi4yLDIuMmMwLDAtMi4zLDEuNC00LjgsMkM4LjIsMTIuNSwzLjgsMTMuNiwyLjksMTQuN3oiLz4NCgkJIDxwYXRoIGNsYXNzPSJzdDAiIGQ9Ik0xNC43LDEwLjNjMCwwLTIuMywxLjgtNS45LDIuOGMwLDAtMy45LDEuMy00LjcsMS42YzAsMC0xLjQsMC43LTEuMiwyLjNjMCwwLDAuMiwxLjgsMi4yLDEuOWg3LjQNCgkJICAgICBjMCwwLDIuNCwwLjEsMy44LTJjMC42LTAuOSwwLjgtMS45LDAuOC0yLjlDMTcsMTIuOSwxNi41LDExLjQsMTQuNywxMC4zeiIvPg0KCQk8L2c+DQoJCTwvc3ZnPg==';

		$page_id = add_menu_page(
			$page_title,
			$page_title,
			self::CAP,
			self::PAGE_ID,
			array( $this, 'render_theme_page' ),
			$icon,
			self::POSITION
		);

		add_action( 'load-' . $page_id, array( $this, 'load_page_dependencies' ) );
	}

	/**
	 * Load page dependencies
	 */
	public function load_page_dependencies() {
		ThemeDashboardVite::enqueue_vite( 'main.tsx', '3005' );
		wp_localize_script(
			'module/brandy-theme-dashboard/main.tsx',
			'brandyDashboardData',
			array_merge(
				array(
					'version'           => BRANDY_VERSION,
					'links'             => array(
						'dashboard' => admin_url( 'themes.php?page=' . self::PAGE_ID ),
						'customize' => admin_url( 'customize.php?return=/wp-admin/admin.php?page=' . self::PAGE_ID ),
					),
					'ajax'              => array(
						'path'   => admin_url( 'admin-ajax.php' ),
						'nonces' => array(
							'install_niche'           => wp_create_nonce( self::INSTALL_NICHE_NONCE_ACTION ),
							'install_plugin'          => wp_create_nonce( self::INSTALL_PLUGIN_NONCE_ACTION ),
							'get_plugins_information' => wp_create_nonce( self::GET_PLUGINS_INFORMATION_NONCE_ACTION ),
						),
					),
					'urls'              => array(
						'images' => BRANDY_TEMPLATE_URL . '/assets/images/',
						'admin'  => admin_url(),
					),
					'suggested_plugins' => PluginService::get_suggested_plugins(),
					'required_plugins'  => PluginService::get_required_plugins(),
					'i18n'              => I18n::get_translations(),
					'bts'               => array(
						'niches'              => NicheLoader::get_instance()->get_niches( true ),
						'is_plugin_installed' => is_bts_installed(),
					),
				),
				is_elementor_installed() ? array(
					'elementor' => array(
						'version' => ELEMENTOR_VERSION,
					),
				) : array()
			)
		);
	}

	/**
	 * Render dashboard page content
	 */
	public function render_theme_page() {

		global $pagenow;

		$is_theme_page = 'themes.php' == $pagenow;

		$is_dashboard_page = isset( $_GET['page'] ) && self::PAGE_ID === $_GET['page']; //phpcs:ignore.

		$is_wizard_screen = isset( $_GET['action'] ) && 'open-wizard' === $_GET['action']; //phpcs:ignore.

		if ( $is_theme_page && $is_dashboard_page && $is_wizard_screen ) {
			update_option( 'brandy_first_time_installed', 'no' );
		}

		echo '<section id="brandy-dashboard"></section>';

	}

	/**
	 * Check whether can open wizard on dashboard page
	 */
	private function can_open_wizard() {
		$option_value = get_option( 'brandy_first_time_installed', null );

		if ( 'no' == $option_value ) {
			return false;
		}
		return true;
	}

	/**
	 * Handle opening wizard
	 */
	public function open_wizard() {

		if ( defined( 'DOING_AJAX' ) && DOING_AJAX ) {
			return;
		}

		if ( ! $this->can_open_wizard() ) {
			return;
		}

		global $pagenow;

		if ( 'themes.php' == $pagenow && isset( $_GET['page'] ) && self::PAGE_ID === $_GET['page'] ) { //phpcs:ignore.
			return;
		}

		wp_safe_redirect( admin_url( 'themes.php?page=' . self::PAGE_ID . '&action=open-wizard#/wizard' ) );
	}

	/**
	 * Callback for calling install niche AJAX
	 */
	public function install_niche() {

		$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';

		if ( ! wp_verify_nonce( $nonce, self::INSTALL_NICHE_NONCE_ACTION ) ) {
			throw new Error( __( 'Invalid nonce', 'brandy' ) );
		}

		$niche = isset( $_POST['niche'] ) ? $_POST['niche'] : '';

		if ( empty( $niche ) ) {
			throw new Error( __( 'Invalid data', 'brandy' ) );
		}

		$builder = isset( $_POST['builder'] ) ? $_POST['builder'] : 'gutenberg';

		$content_list = isset( $_POST['content_list'] ) ? $_POST['content_list'] : array();

		if ( empty( $niche ) ) {
			throw new Error( __( 'Invalid data', 'brandy' ) );
		}

		try {

			$result = NicheService::get_instance()->install_niche( $niche, $content_list, $builder );

			wp_send_json_success(
				array(
					'message'     => __( 'Import successfully', 'brandy' ),
					'import_data' => $result,
				)
			);
		} catch ( \Error $err ) {
			wp_send_json_success(
				array(
					'success' => false,
					'message' => $err->getMessage(),
				)
			);
		} finally {
			if ( in_array( BRANDY_LAST_SITE_CONTENT_INSTALATION, $content_list, true ) ) {
				do_action( "brandy_{$niche}_installed" );
			}
		}
	}

	/**
	 * Callback for calling install plugin AJAX
	 */
	public function install_plugin() {

		$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';

		if ( ! wp_verify_nonce( $nonce, self::INSTALL_PLUGIN_NONCE_ACTION ) ) {
			throw new Error( __( 'Invalid nonce', 'brandy' ) );
		}

		$plugin = isset( $_POST['plugin'] ) ? $_POST['plugin'] : '';

		if ( empty( $plugin ) || empty( $plugin['download_link'] ) ) {
			throw new Error( __( 'Invalid data', 'brandy' ) );
		}

		try {

			PluginService::install_and_activate_plugin( $plugin );

			wp_send_json_success(
				array(
					'message' => __( 'Install successfully', 'brandy' ),
					'plugin'  => $plugin,
				)
			);
		} catch ( \Error $err ) {
			wp_send_json_success(
				array(
					'success' => false,
					'message' => $err->getMessage(),
				)
			);
		}
	}

	/**
	 * Callback for calling activate plugin AJAX
	 */
	public function activate_plugin() {

		$nonce = isset( $_POST['nonce'] ) ? sanitize_text_field( $_POST['nonce'] ) : '';

		if ( ! wp_verify_nonce( $nonce, self::INSTALL_PLUGIN_NONCE_ACTION ) ) {
			throw new Error( __( 'Invalid nonce', 'brandy' ) );
		}

		$plugin = isset( $_POST['plugin'] ) ? $_POST['plugin'] : '';

		if ( empty( $plugin ) ) {
			throw new Error( __( 'Invalid data', 'brandy' ) );
		}

		try {
			PluginService::install_and_activate_plugin( $plugin );

			wp_send_json_success(
				array(
					'message' => __( 'Activate successfully', 'brandy' ),
					'plugin'  => $plugin,
				)
			);
		} catch ( \Error $err ) {
			wp_send_json_success(
				array(
					'success' => false,
					'message' => $err->getMessage(),
				)
			);
		}
	}

	/**
	 * Callback for calling get plugins information AJAX
	 */
	public function get_plugins_information() {

		try {
			$nonce = isset( $_GET['nonce'] ) ? sanitize_text_field( $_GET['nonce'] ) : '';

			if ( ! wp_verify_nonce( $nonce, self::GET_PLUGINS_INFORMATION_NONCE_ACTION ) ) {
				throw new Error( __( 'Invalid nonce', 'brandy' ) );
			}

			$plugins_information = PluginService::get_plugins_information();

			wp_send_json_success(
				array(
					'success'             => true,
					'plugins_information' => $plugins_information,
				)
			);
		} catch ( \Error $err ) {
			wp_send_json_success(
				array(
					'success' => false,
					'message' => $err->getMessage(),
				)
			);
		}

	}

	public function add_dashboard_to_admin_bar( $wp_admin_bar ) {

		if ( ! user_can( get_current_user_id(), self::CAP ) ) {
			return;
		}

		// Add an option to visit the store.
		$wp_admin_bar->add_node(
			array(
				'parent' => 'site-name',
				'id'     => 'brandy-dashboard',
				'title'  => __( 'Brandy dashboard', 'brandy' ),
				'href'   => admin_url( 'admin.php?page=' . self::PAGE_ID ),
			)
		);
	}

}
