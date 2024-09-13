<?php
/**
 * The Button Settings Section class is responsible for loading and
 * registering the customizer settings and controls for the Header Builder module.
 *
 * @package Brandy\Customizer
 * @since   1.0.0
 */

namespace Brandy\Customizer\Panels\General;

use Brandy\Abstracts\AbstractCustomizerModuleLoader;
use Brandy\Core\Services\BreadcrumbService;
use Brandy\Traits\SingletonTrait;

/**
 * Register Header stuffs
 * Header panel and section are registered here
 */
class BreadcrumbSettingsSection extends AbstractCustomizerModuleLoader {

	use SingletonTrait;

	public const SECTION_ID = 'breadcrumb_settings';

	protected function __construct() {
		add_filter(
			'brandy_general_sections',
			function( $sections ) {
				return array_merge(
					$sections,
					array_filter(
						self::get_configurations(),
						function( $item ) {
							return 'section' === $item['configuration_type'];
						}
					)
				);
			}
		);
		add_filter(
			'brandy_general_default_settings',
			function( $settings ) {
				$settings[ self::SECTION_ID ] = BreadcrumbService::get_default_settings();
				return $settings;
			}
		);
		parent::__construct();

		add_filter( 'woocommerce_breadcrumb_defaults', array( $this, 'wc_breadcrumb_defaults' ), PHP_INT_MAX );
		add_action( 'brandy_global_css_general_variables', array( $this, 'print_global_css' ) );
	}

	/**
	 * Returns module configurations
	 * Because this is the main loader, so return panel configurations
	 *
	 * @override
	 */
	public static function get_configurations() {
		$configurations[] = array(
			'configuration_type' => 'section',
			'id'                 => self::SECTION_ID,
			'title'              => __( 'Breadcrumb Settings', 'brandy' ),
			'panel'              => GeneralPanel::PANEL_ID,
			'type'               => 'brandy-section',
			'description_hidden' => true,
		);
		$configurations[] = array(
			'configuration_type' => 'control',
			'id'                 => self::SECTION_ID,
			'label'              => __( 'Breadcrumb Settings', 'brandy' ),
			'section'            => self::SECTION_ID,
			'type'               => 'brandy_settings',
			'input_attrs'        => array(
				'value' => '',
				'style' => 'display:none;',
			),
			'partial'            => false,
			'default'            => BreadcrumbService::get_default_settings(),
			'transport'          => 'postMessage',
		);

		return $configurations;
	}

	public function wc_breadcrumb_defaults( $args ) {
		$delimiter         = BreadcrumbService::get_current_delimiter_icon();
		$args['delimiter'] = $delimiter;
		return $args;
	}

	public function print_global_css() {
		BreadcrumbService::print_css();
	}
}
